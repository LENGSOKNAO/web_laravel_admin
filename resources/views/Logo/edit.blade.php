<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Logo Management</title>
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
                padding: 6.5px 0;
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
            .badge {
                padding: 4px 8px;
                border-radius: 12px;
                font-size: 0.8rem;
                color: white;
            }
            .bg-success { 
                background: #28a745; 
            }
            .bg-danger { 
                background: #ff6b6b; 
            }
            .btn-primary {
                padding: 5px 10px;
                border-radius: 4px;
                background: transparent;
                border: 1px solid #4dabf7;
                color: #4dabf7;
                text-decoration: none;
                font-size: 0.7rem;
                font-weight: 500;
                display: inline-block;
                transition: all 0.2s ease;
            }
            .btn-primary:hover {
                background: rgba(77, 171, 247, 0.1);
                color: #ffffff;
                border-color: #ffffff;
                transform: translateY(-1px);
            }
            .btn-danger {
                padding: 5px 10px;
                border-radius: 4px;
                background: transparent;
                border: 1px solid #ff6b6b;
                color: #ff6b6b;
                text-decoration: none;
                font-size: 0.7rem;
                font-weight: 500;
                cursor: pointer;
                transition: all 0.2s ease;
            }
            .btn-danger:hover {
                background: rgba(255, 107, 107, 0.1);
                color: #ffffff;
                border-color: #ffffff;
                transform: translateY(-1px);
            }
        </style>
    </head>
    <body>
        <x-layout>
            <x-nav>
                <div style="background-color: rgb(245, 247, 250); width: 100%">
                    <div style="padding: 30px">
                        <h2 style="font-size: 1.875rem; font-weight: 600; padding: 0 0 15px 0;">
                            Logos
                        </h2>
                        <div style="font-size: 12px; padding-top: 0.75rem; padding-bottom: 0.75rem; display: flex; gap: 0.75rem; font-weight: 500; color: rgb(56, 116, 255);">
                            <a href="{{ route('logo.index') }}" style="color: rgb(56, 116, 255)">All ({{ $logos->count() }})</a>
                            <a href="" style="color: rgb(56, 116, 255)">Enabled ({{ $logos->where('logo_is_enable', true)->count() }})</a>
                            <a href="" style="color: rgb(56, 116, 255)">Disabled ({{ $logos->where('logo_is_enable', false)->count() }})</a>
                        </div>

                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div style="display: flex; align-items: center; gap: 2.5rem;">
                                <!-- Search Bar -->
                                <div style="display: flex; align-items: center; border: 1px solid rgb(203, 208, 221); border-radius: 0.125rem;">
                                    <svg style="margin: 0 0.5rem" xmlns="http://www.w3.org/2000/svg" height="17px" viewBox="0 -960 960 960" width="24px" fill="rgb(117,124,145)">
                                        <path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
                                    </svg>
                                    <input id="universal-search" style="width: 350px; font-size: 13px; outline: none; padding: 5px; border: none;" type="text" placeholder="Search logos..." />
                                </div>
                            </div>
                            <div>
                                <a class="add-btn" href="{{ route('logo.create') }}">+ Add Logo</a>
                            </div>
                        </div>
                    </div>

                    <div style="background-color: white; display: flex; justify-content: center; border-top: 1px solid rgb(203, 208, 221); padding: 0 0 15px 0; border-color: rgb(203, 208, 221);">
                        <table style="width: 95%">
                            <thead>
                                <tr style="font-size: 11px; width: 100%; border-bottom: 1px solid rgb(203, 208, 221);">
                                    <th>IMAGE</th>
                                    <th>STATUS</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;" id="products-table-body">
                                @foreach($logos as $logo)
                                    <tr class="product-row" 
                                        style="border-bottom: 1px solid rgb(203, 208, 221);"
                                        data-name="{{ strtolower($logo->logo_name ?? '') }}"
                                        data-status="{{ $logo->logo_is_enable ? 'enabled' : 'disabled' }}"
                                    >
                                        <td style="display: flex; align-items: center; justify-content: center; gap: 1.25rem;">
                                            <img style="width: 80px; height: 80px; object-fit: contain; border-radius: 5px; border: 1px solid #d1d5db;" 
                                                 src="{{ asset('/storage/' . $logo->logo_image) }}" 
                                                 alt="Logo" />
                                        </td>
                                        <td>
                                            <span class="badge {{ $logo->logo_is_enable ? 'bg-success' : 'bg-danger' }}">
                                                {{ $logo->logo_is_enable ? 'Enabled' : 'Disabled' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div style="display: flex; gap: 10px; justify-content: center;">
                                                <a href="{{ route('logo.edit', $logo->id) }}" class="btn-primary">Edit</a>
                                                <form action="{{ route('logo.destroy', $logo->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $logos->links('pagination::bootstrap-4') }}
                </div>
            </x-nav>
        </x-layout>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                // Universal Search Functionality
                const searchInput = document.getElementById("universal-search");
                const productRows = document.querySelectorAll(".product-row");

                function filterProducts() {
                    const searchTerm = searchInput.value.toLowerCase().trim();

                    productRows.forEach((row) => {
                        const productName = row.getAttribute("data-name");
                        const productStatus = row.getAttribute("data-status");

                        const matchesSearch = searchTerm === "" || 
                            (productName && productName.includes(searchTerm)) ||
                            (productStatus && productStatus.includes(searchTerm));

                        row.style.display = matchesSearch ? "" : "none";
                    });
                }

                // Add event listener
                searchInput.addEventListener("input", filterProducts);

                // Dropdown Menu Functionality (if you add dropdowns later)
                const dropdownBtns = document.querySelectorAll(".dropdown-btn");
                if (dropdownBtns) {
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
                }
            });
        </script>
    </body>
</html>