<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Product Management</title>
        <style>
            .blue-text {
                color: rgb(29, 30, 31);
            }
            .products {
                font-size: 12px;
                font-weight: 500;
                color: rgb(58, 59, 61);
                border: 1px solid #ccc;
                border-radius: 4px;
            }
            select:not(:last-child) {
                padding: 10px;
                border-right: 1px solid #ccc;
            }
            select:focus {
                outline: none;
            }
            option:checked {
                color: rgb(29, 30, 31);
            }
            li {
                list-style: none;
            }
            .add-btn {
                display: inline-block;
                padding: 8px 16px;
                background-color: rgb(56, 116, 255);
                color: white;
                text-decoration: none;
                border-radius: 4px;
                font-size: 14px;
                font-weight: 500;
                transition: background-color 0.3s ease;
            }
            .add-btn:hover {
                background-color: rgb(45, 93, 204);
            }
            .add-btn:active {
                background-color: rgb(34, 70, 153);
            }
            tr th {
                padding: 10px;
                border-bottom: 1px solid rgb(203, 208, 221);
            }
            tr td {
                padding: 10px;
                text-align: center;
                border-bottom: 1px solid rgb(203, 208, 221);
            
            }
         
            .hidden {
                display: none;
            }
            .dropdown-menu {
                z-index: 1000;
            }
            .pagination {
                display: flex;
                justify-content: center;
            }
            .pagination .page-link {
                background: linear-gradient(to right, #4f46e5, #9333ea);
                color: white;
                border: none;
                border-radius: 50%;
                padding: 0.75rem 1.25rem;
                margin: 0 0.5rem;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                transition: all 0.3s ease;
            }
            .pagination .page-item.active .page-link {
                background: linear-gradient(to right, #4338ca, #7e22ce);
            }
            .pagination .page-link:hover {
                background: linear-gradient(to right, #3b82f6, #a855f7);
            }
            .pagination .disabled .page-link {
                background: #e5e7eb;
                color: #6b7280;
                box-shadow: none;
            }
            .custom-pagination {
                display: flex;
                justify-content: center;
                margin-top: 2rem;
            }
            .custom-pagination a,
            .custom-pagination span {
                padding: 0.75rem 1.25rem;
                margin: 0 0.5rem;
                border-radius: 50%;
                text-decoration: none;
                font-size: 1rem;
                transition: all 0.3s ease;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            .custom-pagination a {
                background: linear-gradient(to right, #4f46e5, #9333ea);
                color: white;
            }
            .custom-pagination a:hover {
                background: linear-gradient(to right, #3b82f6, #a855f7);
                box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
            }
            .custom-pagination span {
                background: #e5e7eb;
                color: #6b7280;
            }
            .custom-pagination .current {
                background: linear-gradient(to right, #4338ca, #7e22ce);
                color: white;
                font-weight: bold;
            }
            .btn-create {
                background-color: transparent;
                padding: 6px 14px;
                text-decoration: none;
                font-size: 13px;
                font-weight: 600;
                display: inline-flex;
                align-items: center;
                gap: 6px;
                border-bottom: 2px solid transparent;
                transition: all 0.2s ease-in-out;
            }
            .btn-create i {
                font-size: 12px;
            }
            .btn-create:hover {
                border-color: #1e7e34;
            }
            .h {
                background: rgb(255, 255, 255);
                width: 100%;
                display: flex;
                justify-content: center;
                border-top: rgb(143, 146, 135) 1px solid;
            }
           
        </style>
    </head>
    <body>
        <x-layout>
            <x-nav>
                <div style="background-color: rgb(245, 247, 250); width: 100%">
                    <div style="padding: 30px">
                        <h2 style="font-size: 1.875rem; font-weight: 600; padding: 0 0 15px 0;">
                            Products
                        </h2>
                        <div style="font-size: 12px; padding-top: 0.75rem; padding-bottom: 0.75rem; display: flex; gap: 0.75rem; font-weight: 500; color: rgb(56, 116, 255);">
                            <a href="{{ route('products.index') }}" style="color: rgb(56, 116, 255)">All ({{ $products->count() }})</a>
                            <a href="" style="color: rgb(56, 116, 255)">Enabled ({{ $products->where('product_is_enable', true)->count() }})</a>
                            <a href="" style="color: rgb(56, 116, 255)">Disabled ({{ $products->where('product_is_enable', false)->count() }})</a>
                        </div>

                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div style="display: flex; align-items: center; gap: 2.5rem;">
                                <!-- Search Bar -->
                                <div style="display: flex; align-items: center; border: 1px solid rgb(203, 208, 221); border-radius: 0.125rem;">
                                    <svg style="margin: 0 0.5rem" xmlns="http://www.w3.org/2000/svg" height="17px" viewBox="0 -960 960 960" width="24px" fill="rgb(117,124,145)">
                                        <path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
                                    </svg>
                                    <input id="universal-search" style="width: 350px; font-size: 13px; outline: none; padding: 10px; border: none;" type="text" placeholder="Search products..." />
                                </div>

                                <div class="products">
                                    <select name="products" id="brandFilter" style="font-size: 12px; width: 150px; font-weight: 500; border: none;">
                                        <option value="">Brand</option>
                                        <option value="Nike">Nike</option>
                                        <option value="Newbalance">NewBalance</option>
                                        <option value="Anta">Anta</option>
                                        <option value="Qiaodan">Qiaodan</option>
                                        <option value="Salomon">Salomon</option>
                                    </select>
                                    
                                    <select name="products" id="categoryFilter" style="font-size: 12px; width: 150px; font-weight: 500; border: none;" id=" ">
                                        <option value="">Category</option>
                                        <option value="Men">Men</option>
                                        <option value="Women">Women</option>
                                        <option value="Kids">Kids</option>
                                        <option value="Sport">Sport</option>
                                        <option value="T-Shirt">T-Shirt</option>
                                        <option value="Terry">Terry</option>
                                        <option value="Pant">Pant</option>
                                        <option value="Basketball-Jersey">Basketball-Jersey</option>
                                    </select>
                                    <select name="products" id="SizeFilter" style="font-size: 12px; width: 150px; font-weight: 500; border: none;">
                                        <option value="">Sizes</option>
                                        <option value="XS">XS</option>
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        <option value="3Xl">3Xl</option>
                                        <option value="6">6</option>
                                        <option value="6.5">6.5</option>
                                        <option value="7">7</option>
                                        <option value="7.5">7.5</option>
                                        <option value="8">8</option>
                                        <option value="8.5">8.5</option>
                                        <option value="9">9</option>
                                        <option value="9.5">9.5</option>
                                        <option value="10">10</option>
                                        <option value="10.5">10.5</option>
                                        <option value="11">11</option>
                                        <option value="11.5">11.5</option>
                                        <option value="12">12</option>
                                        <option value="12.5">12.5</option>
                                        <option value="13">13</option>
                                        <option value="13.5">13.5</option>
                                        <option value="14.5">14.5</option>
                                        <option value="15">15</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <a class="add-btn" href="{{ route('products.create') }}">+ Add product</a>
                            </div>
                        </div>
                    </div>

                    <div style="background-color: white; display: flex; justify-content: center; border-top: 1px solid rgb(203, 208, 221); padding: 0 0 15px 0; border-color: rgb(203, 208, 221); ">
                        <table style="width: 95%">
                            <thead>
                                <tr style="font-size: 11px; width: 100%; border-bottom: 1px solid rgb(203, 208, 221);">
                                    <th>PRODUCT NAME</th>
                                    <th>PRODUCT PRICE</th>
                                    <th>PRODUCT BRAND</th>
                                    <th>PRODUCT CATEGORY</th>
                                    <th>PRODUCT SIZES</th>
                                    <th>PRODUCT ON</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;" id="products-table-body">
                                @foreach($products as $item)
                                    <tr class="product-row" 
                                        style="border-bottom: 1px solid rgb(203, 208, 221);"
                                        data-name="{{ strtolower($item->product_name) }}"
                                        data-brand="{{ strtolower($item->product_brand) }}"
                                        data-category="{{ is_array($item->product_category) ? implode(' ', array_map('strtolower', $item->product_category)) : strtolower($item->product_category) }}"
                                        data-sizes="{{ is_array($item->product_sizes) ? implode(' ', array_map('strtolower', $item->product_sizes)) : strtolower($item->product_sizes) }}"
                                        data-date="{{ strtolower($item->created_at->format('M j, g:i A')) }}"
                                    >
                                        <td style="display: flex; align-items: center; gap: 1.25rem;">
                                            <img style="width: 50px; height: 50px; object-fit: contain; border-radius: 5px; border: 1px solid #d1d5db;" 
                                                 src="{{ asset('/storage/' . $item->product_image) }}" 
                                                 alt="" />
                                            <a href="#" style="font-size: 0.875rem; color: rgb(56, 116, 255);">{{ $item->product_name }}</a>
                                        </td>
                                        <td>
                                            <h3 style="font-size: 0.875rem; font-weight: 600; color: rgb(46, 47, 49);">${{ $item->product_price }}</h3>
                                        </td>
                                        <td>
                                            <h3 style="font-size: 0.875rem; font-weight: 600; color: rgb(138, 139, 143);">{{ $item->product_brand }}</h3>
                                        </td>
                                        <td>
                                            <div style="width: 150px">
                                                <div style="display: flex; flex-wrap: wrap; gap: 0.25rem;">
                                                    @if(is_array($item->product_category))
                                                        @foreach($item->product_category as $category)
                                                            <span style="padding: 0.5rem 0.25rem; font-size: 11px; font-weight: 500; color: #4b5563; background-color: #e5e7eb; border-radius: 0.375rem;">
                                                                {{ $category }}
                                                            </span>
                                                        @endforeach
                                                    @elseif(is_string($item->product_category))
                                                        <span style="padding: 0.5rem 0.25rem; font-size: 11px; font-weight: 500; color: #4b5563; background-color: #e5e7eb; border-radius: 0.375rem;">
                                                            {{ $item->product_category }}
                                                        </span>
                                                    @else
                                                        N/A
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="width: 150px">
                                                <div style="display: flex; flex-wrap: wrap; gap: 0.25rem;">
                                                    @if(is_array($item->product_sizes))
                                                        @foreach($item->product_sizes as $size)
                                                            <span style="padding: 0.5rem 0.25rem; font-size: 11px; font-weight: 500; color: #4b5563; background-color: #e5e7eb; border-radius: 0.375rem;">
                                                                {{ $size }}
                                                            </span>
                                                        @endforeach
                                                    @elseif(is_string($item->product_sizes))
                                                        <span style="padding: 0.5rem 0.25rem; font-size: 11px; font-weight: 500; color: #4b5563; background-color: #e5e7eb; border-radius: 0.375rem;">
                                                            {{ $item->product_sizes }}
                                                        </span>
                                                    @else
                                                        N/A
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td style="font-size: 0.875rem; color: rgb(66, 68, 70);">
                                            {{ $item->created_at->format('M j, g:i A') }}
                                        </td>
                                        <td>
                                            <div style="position: relative">
                                                <button class="dropdown-btn" style="color: #6b7280; background: transparent; border: none;  padding: 0.25rem 0.75rem; cursor: pointer; font-size: 13px;">
                                                    •••
                                                </button>
                                                <div class="dropdown-menu hidden" style="position: absolute; right: 70px; width: 10rem; background-color: white; border: 1px solid #d1d5db;  border-radius: 0.5rem;  ">
                                                    <ul style="padding: 0.25rem 0; color: #4b5563; margin: 0;">
                                                        <li>
                                                            <a href="#" style="display: block; padding: 0.5rem 1rem; cursor: pointer; text-decoration: none; color: #4b5563;">View</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('products.edit', $item->id) }}" style="display: block; padding: 0.5rem 1rem; cursor: pointer; text-decoration: none; color: #4b5563; border-bottom: 1px solid #d1d5db;">Edit</a>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('products.destroy', $item->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" style="display: block; padding: 0.5rem 1rem; width: 100%; cursor: pointer; color: #ef4444; border: none; background: none; text-align: center;">
                                                                    Remove
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $products->links('pagination::bootstrap-4') }}
                </div>
            </x-nav>
        </x-layout>

         <script>
            document.addEventListener("DOMContentLoaded", function () {
            // Universal Search Functionality
            const searchInput = document.getElementById("universal-search");
            const brandFilter = document.getElementById("brandFilter");
            const categoryFilter = document.getElementById("categoryFilter");
            const SizeFilter = document.getElementById("SizeFilter");
            const productRows = document.querySelectorAll(".product-row");

            function filterProducts() {
                const searchTerm = searchInput.value.toLowerCase().trim();
                const selectedBrand = brandFilter.value.toLowerCase();
                const selectedCategory = categoryFilter.value.toLowerCase();
                const selectedSize = SizeFilter.value.toLowerCase();

                productRows.forEach((row) => {
                    const productName = row.getAttribute("data-name");
                    const productBrand = row.getAttribute("data-brand");
                    const productCategory = row.getAttribute("data-category");
                    const productSizes = row.getAttribute("data-sizes");
                    const productDate = row.getAttribute("data-date");

                    const matchesSearch = searchTerm === "" || 
                        (productName && productName.includes(searchTerm)) ||
                        (productBrand && productBrand.includes(searchTerm)) ||
                        (productCategory && productCategory.includes(searchTerm)) ||
                        (productSizes && productSizes.includes(searchTerm)) ||
                        (productDate && productDate.includes(searchTerm));

                    const matchesBrand = selectedBrand === "" || 
                        (productBrand && productBrand.includes(selectedBrand));

                    const matchesCategory = selectedCategory === "" || 
                        (productCategory && productCategory.includes(selectedCategory));

                    const matchesSize = selectedSize === "" || 
                        (productSizes && productSizes.includes(selectedSize));

                    row.style.display = (matchesSearch && matchesBrand && matchesCategory && matchesSize) ? "" : "none";
                });
            }

            // Add event listeners
            searchInput.addEventListener("input", filterProducts);
            brandFilter.addEventListener("change", filterProducts);
            categoryFilter.addEventListener("change", filterProducts);
            SizeFilter.addEventListener("change", filterProducts);

            // Rest of your dropdown code remains the same...
            // Dropdown Menu Functionality
            const dropdownBtns = document.querySelectorAll(".dropdown-btn");
            dropdownBtns.forEach((btn) => {
                btn.addEventListener("click", function(e) {
                    e.stopPropagation();
                    const menu = this.nextElementSibling;
                    const isHidden = menu.classList.contains("hidden");
                    
                    // Hide all other menus
                    document.querySelectorAll(".dropdown-menu").forEach(m => {
                        if (m !== menu) m.classList.add("hidden");
                    });
                    
                    // Toggle current menu
                    if (isHidden) {
                        menu.classList.remove("hidden");
                    } else {
                        menu.classList.add("hidden");
                    }
                });
            });

            // Close dropdowns when clicking outside
            document.addEventListener("click", function() {
                document.querySelectorAll(".dropdown-menu").forEach(menu => {
                    menu.classList.add("hidden");
                });
            });

            // Prevent dropdown from closing when clicking inside
            document.querySelectorAll(".dropdown-menu").forEach(menu => {
                menu.addEventListener("click", function(e) {
                    e.stopPropagation();
                });
            });               
        });
         </script>
    </body>
</html>