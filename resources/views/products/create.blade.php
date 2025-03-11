 <style>
    /* Global Styles */
    body {
        font-family: 'Roboto', sans-serif;
        background-color: rgb(15, 17, 26);
        color: rgb(185, 193, 218);
        margin: 0;
        padding: 0;
    }

    /* Form Container */
    .h {
        width: 100%;
        padding: 20px;
        background-color: rgb(20, 24, 36);
        min-height: 100vh;
    }

    /* Form Styles */
    form {
        width: 90%;
        max-width: 1200px;
        padding: 20px;
        background-color: rgb(25, 29, 41);
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        margin: 20px auto;
    }

    /* Label */
    label {
        font-size: 0.9rem;
        font-weight: 600;
        color: rgb(159, 166, 188);
        margin-bottom: 8px;
    }

    /* Input Fields */
    .form-control {
        width: 100%;
        padding: 12px;
        margin: 8px 0;
        background: rgb(40, 45, 55);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 6px;
        color: rgb(185, 193, 218);
        font-size: 0.9rem;
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        border-color: #4dabf7;
        outline: none;
    }

    textarea.form-control {
        min-height: 100px;
        resize: vertical;
    }

    /* Error Messages */
    .invalid-feedback {
        font-size: 0.8rem;
        color: #ff6b6b;
        margin-top: 5px;
    }

    /* Dropdown Styles */
    .dropdown-container {
        position: relative;
    }

    .dropdown-toggle {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px;
        background-color: rgb(40, 45, 55);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 6px;
        cursor: pointer;
        color: rgb(185, 193, 218);
    }

    .dropdown-list {
        display: none;
        position: absolute;
        width: 100%;
        background: rgb(25, 29, 41);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 6px;
        color: rgb(185, 193, 218);
        max-height: 200px;
        overflow-y: auto;
        z-index: 1000;
    }

    .dropdown-item {
        padding: 12px;
        cursor: pointer;
    }

    .dropdown-item:hover {
        background: rgba(77, 171, 247, 0.1);
    }

    /* Button Styling */
    .btn button {
        width: 100%;
        padding: 12px;
        border-radius: 6px;
        background: #4dabf7;
        border: none;
        color: #fff;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn button:hover {
        background: #3688d0;
    }

    /* Image Preview */
    .image-preview-container {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-top: 10px;
    }

    #imagePreview {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 6px;
    }

    .delete-btn {
        background: none;
        border: 1px solid #ff6b6b;
        color: #ff6b6b;
        padding: 6px 12px;
        font-size: 0.8rem;
        cursor: pointer;
        border-radius: 6px;
    }

    .delete-btn:hover {
        background: rgba(255, 107, 107, 0.1);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .h {
            padding: 15px;
        }

        form {
            width: 100%;
            padding: 15px;
        }

        .dropdown-toggle {
            font-size: 0.9rem;
        }
    }

 </style>

<x-layout>
    <x-nav>
        <div class="h">
            <h1>Create New Product</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf
            
               <div class="" style="display:flex; gap:40px ">
                    <div class="" style="width: 70%" >
                          <!-- Product Name -->
                       
                            <label for="product_name">Product Name *</label> <br>
                            <input type="text" class="form-control @error('product_name') is-invalid @enderror" 
                                id="product_name" name="product_name" value="{{ old('product_name') }}" maxlength="256">
                            @error('product_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                       
                    
                        <!-- Product Description -->
                        <div class="d">
                            <label for="product_description">Description</label> <br>
                            <textarea class="form-control @error('product_description') is-invalid @enderror" 
                                    id="product_description" name="product_description">{{ old('product_description') }}</textarea>
                            @error('product_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <!-- Product Image Input -->
                        <div class="d">
                            <label for="product_image">Product Image *</label>
                            <input type="file" class="form-control @error('product_image') is-invalid @enderror" 
                                id="product_image" name="product_image" onchange="previewImage(event)">
                            @error('product_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    
                            <!-- Image Preview and Delete Button -->
                            <div id="imagePreviewContainer" class="image-preview-container" style="display: none;">
                                <img id="imagePreview" src="" alt="Image Preview" style="max-width: 100px; max-height: 100px;">
                                <button type="button" id="deleteImageBtn" class="delete-btn" onclick="deleteImage()">Delete</button>
                            </div>
                            </div>
                        
                            <!-- Product List Images (Multiple Files) -->
                            <div class="d">
                                <label for="product_list_image">List Images * (multiple files allowed)</label>
                                <input type="file" class="form-control @error('product_list_image') is-invalid @enderror" 
                                    id="product_list_image" name="product_list_image[]" multiple>
                                @error('product_list_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                    </div>
                    <div class="">
                        <div class="">
                              <!-- Product Category (Sizes) -->
                                <div class="size-selector">
                                    <label for="product_category">Category *</label>
                                    <div class="dropdown-container">
                                        <div class="dropdown-toggle" onclick="toggleDropdown('categoryDropdown')">
                                            <span id="selectedCategoryText">Select Category</span>
                                            <i class="arrow-down"></i>
                                        </div>
                                        <div class="dropdown-list" id="categoryDropdown">
                                            <div id="categoryOptions">
                                                @foreach (['electronics', 'clothing', 'accessories', 'home', 'sports'] as $category)
                                                    <label class="dropdown-item">
                                                        <input type="checkbox" name="product_category[]" value="{{ $category }}" 
                                                            onchange="updateSelectedCategories()" 
                                                            {{ in_array($category, old('product_category', [])) ? 'checked' : '' }}>
                                                        <span class="custom-checkbox"></span> {{ $category }}
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div id="selectedCategoryTags" class="selected-tags"></div>
                                    @error('product_category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            
                                <!-- Product Sizes -->
                                <div class="size-selector">
                                    <label for="product_sizes">Sizes *</label>
                                    <div class="dropdown-container">
                                        <div class="dropdown-toggle" onclick="toggleDropdown('sizeDropdown')">
                                            <span id="selectedSizesText">Select Sizes</span>
                                            <i class="arrow-down"></i>
                                        </div>
                                        <div class="dropdown-list" id="sizeDropdown">
                                            <div id="sizeOptions">
                                                @foreach (['XS', 'S', 'M', 'L', 'XL', 'XXL'] as $size)
                                                    <label class="dropdown-item">
                                                        <input type="checkbox" name="product_sizes[]" value="{{ $size }}" 
                                                            onchange="updateSelectedSizes()" 
                                                            {{ in_array($size, old('product_sizes', [])) ? 'checked' : '' }}>
                                                        <span class="custom-checkbox"></span> {{ $size }}
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div id="selectedSizesTags" class="selected-tags"></div>
                                    @error('product_sizes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            
                                <!-- Product Brand -->
                                <div class="d">
                                    <label for="product_brand">Brand *</label>
                                    <input type="text" class="form-control @error('product_brand') is-invalid @enderror" 
                                        id="product_brand" name="product_brand" value="{{ old('product_brand') }}" maxlength="256">
                                    @error('product_brand')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            
                                <!-- Product Price -->
                                <div class="d">
                                    <label for="product_price">Price *</label>
                                    <input type="number" step="0.01" class="form-control @error('product_price') is-invalid @enderror" 
                                        id="product_price" name="product_price" value="{{ old('product_price') }}">
                                    @error('product_price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                        </div>
                        <div class="">
                              <!-- Product Quantity -->
                                    <div class="d">
                                        <label for="product_qty">Quantity *</label>
                                        <input type="number" class="form-control @error('product_qty') is-invalid @enderror" 
                                            id="product_qty" name="product_qty" value="{{ old('product_qty') }}">
                                        @error('product_qty')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                
                                    <!-- Product Color -->
                                    <div class="d">
                                        <label for="product_color">Color</label>
                                        <input type="text" class="form-control @error('product_color') is-invalid @enderror" 
                                            id="product_color" name="product_color" value="{{ old('product_color') }}">
                                        @error('product_color')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                
                                    <!-- Product Link -->
                                    <div class="d">
                                        <label for="product_link">Product Link</label>
                                        <input type="url" class="form-control @error('product_link') is-invalid @enderror" 
                                            id="product_link" name="product_link" value="{{ old('product_link') }}">
                                        @error('product_link')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                
                                    <!-- Enable/Disable Product -->
                                    <div class="brand">
                                        <input type="checkbox" id="product_is_enable" name="product_is_enable" value="1" 
                                            {{ old('product_is_enable') ? 'checked' : '' }}>
                                        <label for="product_is_enable">Enabled</label>
                                    </div>
                                
                                    <!-- Coming Soon Option -->
                                    <div class="brand">
                                        <input type="checkbox" id="product_comming_soon" name="product_comming_soon" value="1" 
                                            {{ old('product_comming_soon') ? 'checked' : '' }}>
                                        <label for="product_comming_soon">Coming Soon</label>
                                    </div>
                        </div>
                    </div>
               </div>
                <!-- Submit Button -->
                <div class="btn">
                    <button type="submit">Create Product</button>
                </div>
            </form>
            
        </div>
    </x-nav>
</x-layout>

<script>
    function previewImage(event) {
        var file = event.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').src = e.target.result;
                document.getElementById('imagePreviewContainer').style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    }

    function deleteImage() {
        document.getElementById('product_image').value = "";
        document.getElementById('imagePreviewContainer').style.display = 'none';
    }
</script>
<script>
    // Toggle dropdown for categories and sizes
    function toggleDropdown(dropdownId) {
        var dropdown = document.getElementById(dropdownId);
        var arrow = dropdown.previousElementSibling.querySelector(".arrow-down");
        if (dropdown.style.display === "block") {
            dropdown.style.display = "none";
            arrow.style.transform = "rotate(45deg)";
        } else {
            dropdown.style.display = "block";
            arrow.style.transform = "rotate(-135deg)";
        }
    }

    // Update the selected categories
    function updateSelectedCategories() {
        var selectedCategories = [];
        var checkboxes = document.querySelectorAll("input[name='product_category[]']:checked");
        checkboxes.forEach((checkbox) => selectedCategories.push(checkbox.value));

        var displayText = selectedCategories.length > 0 ? selectedCategories.join(", ") : "Select Category";
        document.getElementById("selectedCategoryText").innerText = displayText;

        updateSelectedTags();
    }

    // Update the selected sizes
    function updateSelectedSizes() {
        var selectedSizes = [];
        var checkboxes = document.querySelectorAll("input[name='product_sizes[]']:checked");
        checkboxes.forEach((checkbox) => selectedSizes.push(checkbox.value));

        var displayText = selectedSizes.length > 0 ? selectedSizes.join(", ") : "Select Sizes";
        document.getElementById("selectedSizesText").innerText = displayText;

        updateSelectedTags();
    }

    // Update selected tags for both categories and sizes
    function updateSelectedTags() {
        var sizeTagContainer = document.getElementById("selectedSizesTags");
        sizeTagContainer.innerHTML = "";

        var categoryTagContainer = document.getElementById("selectedCategoryTags");
        categoryTagContainer.innerHTML = "";

        // Add size tags
        var sizeCheckboxes = document.querySelectorAll("input[name='product_sizes[]']:checked");
        sizeCheckboxes.forEach((checkbox) => {
            var tag = document.createElement("div");
            tag.classList.add("tag");
            tag.innerHTML = `${checkbox.value} <button onclick="removeTag('${checkbox.value}')">×</button>`;
            sizeTagContainer.appendChild(tag);
        });

        // Add category tags
        var categoryCheckboxes = document.querySelectorAll("input[name='product_category[]']:checked");
        categoryCheckboxes.forEach((checkbox) => {
            var tag = document.createElement("div");
            tag.classList.add("tag");
            tag.innerHTML = `${checkbox.value} <button onclick="removeTag('${checkbox.value}')">×</button>`;
            categoryTagContainer.appendChild(tag);
        });
    }

    // Remove tag when clicked
    function removeTag(value) {
        var checkboxes = document.querySelectorAll("input[name='product_sizes[]'], input[name='product_category[]']");
        checkboxes.forEach((checkbox) => {
            if (checkbox.value === value) {
                checkbox.checked = false;
            }
        });

        updateSelectedTags();
    }

    // Preview image
    function previewImage(event) {
        var file = event.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').src = e.target.result;
                document.getElementById('imagePreviewContainer').style.display = 'flex';
            };
            reader.readAsDataURL(file);
        }
    }

    // Clear image preview without deleting the file input
    function clearImagePreview() {
        document.getElementById('imagePreviewContainer').style.display = 'none';
        document.getElementById('imagePreview').src = '';
    }
</script>

