<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <style>
        :root {
            --primary-color: #4285f4;
            --secondary-color: #f8f9fa;
            --accent-color: #4CAF50;
            --border-color: #dfe1e5;
            --text-color: #202124;
            --text-light: #5f6368;
            --error-color: #d93025;
            --success-color: #34a853;
            --shadow-light: rgba(0, 0, 0, 0.1);
            --shadow-dark: rgba(0, 0, 0, 0.2);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e7eb 100%);
            color: var(--text-color);
            line-height: 1.6;
            min-height: 100vh;
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .product-form-container {
            width: 100%;
            margin: 40px auto;
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px var(--shadow-light);
            transition: transform 0.3s ease;
        }

        .product-form-container:hover {
            transform: translateY(-5px);
        }

        .form-header {
            margin-bottom: 35px;
            padding-bottom: 20px;
            border-bottom: 2px solid var(--border-color);
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
            position: relative;
        }

        .form-header::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100px;
            height: 2px;
            background: var(--primary-color);
            transition: width 0.3s ease;
        }

        .form-header:hover::after {
            width: 200px;
        }

        .form-title {
            font-size: 2rem;
            margin-bottom: 10px;
            color: var(--primary-color);
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .form-subtitle {
            color: var(--text-light);
            font-size: 1rem;
            font-style: italic;
        }

        .form-columns-container {
            display: flex;
            gap: 50px;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .form-left-column {
            flex: 0 0 70%;
            min-width: 0;
            animation: slideUp 0.5s ease-out;
        }

        .form-right-column {
            flex: 0 0 30%;
            background: var(--secondary-color);
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px var(--shadow-light);
            min-width: 0;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-group {
            margin-bottom: 30px;
            position: relative;
            transition: all 0.3s ease;
        }

        .form-label {
            display: block;
            margin-bottom: 12px;
            font-weight: 600;
            color: var(--text-color);
            font-size: 1rem;
            position: relative;
            transition: color 0.3s;
        }

        .form-label.required:after {
            content: " *";
            color: var(--error-color);
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="url"],
        select,
        textarea {
            width: 100%;
            padding: 14px 18px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
            box-shadow: inset 0 1px 3px var(--shadow-light);
        }

        textarea {
            min-height: 160px;
            resize: vertical;
        }

        input[type="file"] {
            width: 100%;
            padding: 12px;
            border: 2px dashed var(--border-color);
            border-radius: 8px;
            background: var(--secondary-color);
            transition: border-color 0.3s ease;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: inset 0 1px 3px var(--shadow-light);
            transform: scale(1.01);
        }

        .file-input-container {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
            transition: all 0.3s ease;
        }

        .file-input-button {
            border: 2px solid var(--border-color);
            border-radius: 8px;
            padding: 14px 25px;
            background: linear-gradient(45deg, var(--secondary-color), #fff);
            color: var(--text-light);
            font-size: 1rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .file-input-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(66, 133, 244, 0.1);
            transition: all 0.4s ease;
        }

        .file-input-button:hover::before {
            left: 0;
        }

        .file-input-button:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
            transform: translateY(-2px);
        }

        .file-input {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .file-name {
            margin-top: 10px;
            font-size: 0.9rem;
            color: var(--text-light);
            font-style: italic;
        }

        .image-preview-container {
            margin-top: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px; /* Reduced gap for smaller images */
            animation: fadeIn 0.5s ease-in;
        }

        .image-preview-wrapper {
            position: relative;
            transition: all 0.3s ease;
        }

        .image-preview {
            max-width: 100px; /* Reduced from 220px to make images smaller */
            max-height: 100px; /* Reduced from 220px to make images smaller */
            border: 1px solid var(--border-color);
            border-radius: 8px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .image-preview-wrapper:hover .image-preview {
            transform: scale(1.05);
        }

        .delete-image-btn {
            position: absolute;
            top: -8px; /* Adjusted for smaller images */
            right: -8px; /* Adjusted for smaller images */
            background: var(--error-color);
            color: white;
            border: none;
            border-radius: 50%;
            width: 20px; /* Reduced from 25px */
            height: 20px; /* Reduced from 25px */
            font-size: 0.8rem; /* Reduced from 0.9rem */
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px var(--shadow-dark);
        }

        .delete-image-btn:hover {
            background: #b71c1c;
            transform: scale(1.1);
        }

        .custom-select {
            position: relative;
            width: 100%;
            margin-bottom: 25px;
            transition: all 0.3s ease;
        }

        .select-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 20px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            cursor: pointer;
            background: white;
            min-height: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px var(--shadow-light);
        }

        .select-header:hover {
            border-color: var(--primary-color);
            box-shadow: 0 4px 15px var(--shadow-light);
        }

        .selected-items {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            flex-grow: 1;
        }

        .selected-tag {
            background: var(--primary-color);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
            animation: tagAppear 0.2s ease-in;
        }

        @keyframes tagAppear {
            from {
                transform: scale(0);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        .selected-tag:hover {
            background: #3367d6;
        }

        .remove-tag {
            margin-left: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: transform 0.3s ease;
        }

        .remove-tag:hover {
            transform: scale(1.2);
        }

        .dropdown-icon {
            margin-left: 12px;
            transition: transform 0.3s ease;
            color: var(--primary-color);
            font-size: 1.2rem;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            border: 1px solid var(--border-color);
            border-radius: 0 0 8px 8px;
            background: white;
            z-index: 100;
            box-shadow: 0 6px 15px var(--shadow-dark);
            margin-top: -1px;
            max-height: 320px;
            overflow-y: auto;
            animation: dropdownAppear 0.2s ease-out;
        }

        @keyframes dropdownAppear {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .dropdown-content.show {
            display: block;
            border-top: none;
        }

        .add-new {
            padding: 15px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            background: var(--secondary-color);
            border-radius: 8px 8px 0 0;
        }

        .add-new input {
            flex-grow: 1;
            padding: 10px 15px;
            border: 1px solid var(--border-color);
            border-radius: 6px 0 0 6px;
            border-right: none;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .add-new button {
            padding: 10px 20px;
            background: var(--accent-color);
            color: white;
            border: none;
            border-radius: 0 6px 6px 0;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .add-new button:hover {
            background: #3d8b40;
            transform: translateY(-2px);
        }

        .option-item {
            padding: 14px 20px;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .option-item:hover {
            background: var(--secondary-color);
            transform: translateX(5px);
        }

        .option-item input {
            margin-right: 12px;
            accent-color: var(--primary-color);
            transform: scale(1.2);
        }

        .placeholder {
            color: var(--text-light);
            font-style: italic;
        }

        .form-checkbox-group {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            padding: 10px;
            border-radius: 6px;
            transition: background 0.3s ease;
        }

        .form-checkbox-group:hover {
            background: var(--secondary-color);
        }

        .form-checkbox {
            width: 20px;
            height: 20px;
            margin-right: 12px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .form-checkbox:hover {
            transform: scale(1.1);
        }

        .form-actions {
            margin-top: 50px;
            text-align: right;
            padding-top: 25px;
            border-top: 1px solid var(--border-color);
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        .submit-btn {
            background: linear-gradient(45deg, var(--primary-color), #64b5f6);
            color: white;
            padding: 14px 30px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 1.1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            box-shadow: 0 4px 15px rgba(66, 133, 244, 0.3);
        }

        .submit-btn:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 6px 20px rgba(66, 133, 244, 0.4);
            background: linear-gradient(45deg, #3367d6, var(--primary-color));
        }

        .success-message {
            background: linear-gradient(45deg, #e6f4ea, #f1f9f3);
            color: var(--success-color);
            padding: 15px 20px;
            border-radius: 8px;
            margin-bottom: 25px;
            border-left: 5px solid var(--success-color);
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
            animation: slideIn 0.5s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: swell translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .error-message {
            color: var(--error-color);
            font-size: 0.9rem;
            margin-top: 8px;
            padding: 5px 10px;
            background: rgba(217, 48, 37, 0.1);
            border-radius: 4px;
            animation: shake 0.3s ease;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        @media (max-width: 768px) {
            .product-form-container {
                margin: 20px;
                padding: 20px;
            }

            .form-columns-container {
                flex-direction: column;
                gap: 30px;
                padding: 0;
            }

            .form-left-column,
            .form-right-column {
                flex: 0 0 100%;
            }

            .form-right-column {
                padding: 20px;
            }

            .form-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <x-layout>
        <x-nav>
            <div class="product-form-container">
                <div class="form-header">
                    <h1 class="form-title">Update Product</h1>
                    <span class="form-subtitle">Modify existing product details</span>
                </div>
    
                @if(session('success'))
                    <div class="success-message">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div class="error-message">{{ session('error') }}</div>
                @endif
    
                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="product-form" id="productForm">
                    @csrf
                    @method('PUT')
                    <div class="form-columns-container">
                        <div class="form-left-column">
                            <div class="form-group">
                                <label class="form-label required">Product Name</label>
                                <input type="text" name="product_name" id="productName" value="{{ old('product_name', $product->product_name) }}" class="form-control" placeholder="Write product name here" required>
                                @error('product_name')<span class="error-message">{{ $message }}</span>@enderror
                            </div>
    
                            <div class="form-group">
                                <label class="form-label required">Product Description</label>
                                <textarea name="product_description" id="productDescription" class="form-control textarea-control" placeholder="Write Description here" required>{{ old('product_description', $product->product_description) }}</textarea>
                                @error('product_description')<span class="error-message">{{ $message }}</span>@enderror
                            </div>
    
                            <div class="form-group">
                                <label class="form-label">Product Color</label>
                                <input type="text" name="product_color" id="productColor" value="{{ old('product_color', $product->product_color) }}" class="form-control" placeholder="Enter product color">
                                @error('product_color')<span class="error-message">{{ $message }}</span>@enderror
                            </div>
    
                            <div class="form-group">
                                <label class="form-label">Product Link</label>
                                <input type="url" name="product_link" id="productLink" value="{{ old('product_link', $product->product_link) }}" class="form-control" placeholder="Enter product URL">
                                @error('product_link')<span class="error-message">{{ $message }}</span>@enderror
                            </div>
    
                            <div class="form-group">
                                <label class="form-label required">Main Image</label>
                                <div class="file-input-container">
                                    <div class="file-input-button">
                                        <span class="icon">📁</span> Choose File
                                    </div>
                                    <input type="file" name="product_image" id="mainImage" class="file-input" accept="image/*">
                                </div>
                                <div class="file-name" id="mainImageFileName">No file chosen</div>
                                <div class="image-preview-container" id="mainImagePreviewContainer" style="display: flex"></div>
                                @error('product_image')<span class="error-message">{{ $message }}</span>@enderror
                            </div>
    
                            <div class="form-group">
                                <label class="form-label">Additional Images</label>
                                <div class="file-input-container">
                                    <div class="file-input-button">
                                        <span class="icon">📁</span> Choose Files
                                    </div>
                                    <input type="file" name="product_list_image[]" id="additionalImages" class="file-input" multiple accept="image/*">
                                </div>
                                <div class="file-name" id="additionalImagesFileName">No files chosen</div>
                                <div class="image-preview-container" id="additionalImagesPreviewContainer"></div>
                                @error('product_list_image')<span class="error-message">{{ $message }}</span>@enderror
                            </div>
                        </div>
    
                        <div class="form-right-column">
                            <div class="form-right-top">
                                <div class="form-group">
                                    <label class="form-label required">Categories</label>
                                    <div class="custom-select" id="categorySelect">
                                        <div class="select-header" onclick="toggleDropdown('categorySelect')">
                                            <div class="selected-items" id="categorySelectedItems">
                                                <span class="placeholder">Select categories...</span>
                                            </div>
                                            <span class="dropdown-icon">▼</span>
                                        </div>
                                        <div class="dropdown-content" id="categoryDropdown">
                                            <div class="add-new">
                                                <input type="text" id="newCategoryInput" placeholder="Add new category">
                                                <button type="button" onclick="addNewCategory()">+</button>
                                            </div>
                                            <div class="options-list" id="categoryOptions"></div>
                                        </div>
                                    </div>
                                    @error('product_category')<span class="error-message">{{ $message }}</span>@enderror
                                </div>
    
                                <div class="form-group">
                                    <label class="form-label required">Brand</label>
                                    <div class="custom-select" id="brandSelect">
                                        <div class="select-header" onclick="toggleDropdown('brandSelect')">
                                            <div class="selected-items" id="brandSelectedItems">
                                                <span class="placeholder">Select brand...</span>
                                            </div>
                                            <span class="dropdown-icon">▼</span>
                                        </div>
                                        <div class="dropdown-content" id="brandDropdown">
                                            <div class="add-new">
                                                <input type="text" id="newBrandInput" placeholder="Add new brand">
                                                <button type="button" onclick="addNewBrand()">+</button>
                                            </div>
                                            <div class="options-list" id="brandOptions"></div>
                                        </div>
                                        <input type="hidden" name="product_brand" id="brandInput" class="hidden-input" value="{{ old('product_brand', $product->product_brand) }}">
                                    </div>
                                    @error('product_brand')<span class="error-message">{{ $message }}</span>@enderror
                                </div>
    
                                <div class="form-group">
                                    <label class="form-label required">Sizes</label>
                                    <div class="custom-select" id="sizeSelect">
                                        <div class="select-header" onclick="toggleDropdown('sizeSelect')">
                                            <div class="selected-items" id="sizeSelectedItems">
                                                <span class="placeholder">Select sizes...</span>
                                            </div>
                                            <span class="dropdown-icon">▼</span>
                                        </div>
                                        <div class="dropdown-content" id="sizeDropdown">
                                            <div class="add-new">
                                                <input type="text" id="newSizeInput" placeholder="Add new size">
                                                <button type="button" onclick="addNewSize()">+</button>
                                            </div>
                                            <div class="options-list" id="sizeOptions"></div>
                                        </div>
                                    </div>
                                    @error('product_sizes')<span class="error-message">{{ $message }}</span>@enderror
                                </div>
                            </div>
    
                            <div class="form-right-bottom">
                                <div class="form-group">
                                    <label class="form-label required">Price</label>
                                    <input type="number" name="product_price" id="productPrice" value="{{ old('product_price', $product->product_price) }}" class="form-control" step="0.01" placeholder="0.00" required>
                                    @error('product_price')<span class="error-message">{{ $message }}</span>@enderror
                                </div>
    
                                <div class="form-group">
                                    <label class="form-label required">Quantity</label>
                                    <input type="number" name="product_qty" id="productQuantity" value="{{ old('product_qty', $product->product_qty) }}" class="form-control" placeholder="0" required>
                                    @error('product_qty')<span class="error-message">{{ $message }}</span>@enderror
                                </div>
    
                                <div class="form-checkbox-group">
                                    <label class="form-checkbox-label">
                                        <input type="checkbox" name="product_is_enable" id="productEnable" value="1" class="form-checkbox" {{ old('product_is_enable', $product->product_is_enable) ? 'checked' : '' }}>
                                        Enable
                                    </label>
                                </div>
    
                                <div class="form-checkbox-group">
                                    <label class="form-checkbox-label">
                                        <input type="checkbox" name="product_comming_soon" id="productSoon" value="1" class="form-checkbox" {{ old('product_comming_soon', $product->product_comming_soon) ? 'checked' : '' }}>
                                        Coming Soon
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="form-actions">
                        <button type="submit" class="submit-btn">
                            <span class="icon">💾</span> Update Product
                        </button>
                    </div>
                </form>
            </div>
        </x-nav>
    </x-layout>

    <script>
        const initialCategories = [
            { id: 1, name: "Men's Clothing", selected: false },
            { id: 2, name: "Women's Clothing", selected: false },
            { id: 3, name: "Accessories", selected: false },
            { id: 4, name: "Footwear", selected: false }
        ];

        const initialBrands = [
            { id: 1, name: "Nike", selected: false },
            { id: 2, name: "Adidas", selected: false },
            { id: 3, name: "Puma", selected: false },
            { id: 4, name: "Under Armour", selected: false }
        ];

        const initialSizes = [
            { id: 1, name: "XS", selected: false },
            { id: 2, name: "S", selected: false },
            { id: 3, name: "M", selected: false },
            { id: 4, name: "L", selected: false },
            { id: 5, name: "XL", selected: false },
            { id: 6, name: "XXL", selected: false }
        ];

        let categories = JSON.parse(JSON.stringify(initialCategories));
        let brands = JSON.parse(JSON.stringify(initialBrands));
        let sizes = JSON.parse(JSON.stringify(initialSizes));
        let selectedBrand = null;

        document.addEventListener('DOMContentLoaded', function() {
            renderCategoryOptions();
            renderBrandOptions();
            renderSizeOptions();

            document.getElementById('mainImage').addEventListener('change', function(e) {
                const file = e.target.files[0];
                const previewContainer = document.getElementById('mainImagePreviewContainer');
                previewContainer.innerHTML = '';

                if (file) {
                    document.getElementById('mainImageFileName').textContent = file.name;
                    const wrapper = document.createElement('div');
                    wrapper.className = 'image-preview-wrapper';
                    const preview = document.createElement('img');
                    preview.className = 'image-preview';
                    preview.alt = 'Main Image Preview';
                    const deleteBtn = document.createElement('button');
                    deleteBtn.className = 'delete-image-btn';
                    deleteBtn.textContent = 'Delete';
                    deleteBtn.onclick = function() {
                        removeMainImagePreview(wrapper);
                        return false;
                    };

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        wrapper.appendChild(preview);
                        wrapper.appendChild(deleteBtn);
                        previewContainer.appendChild(wrapper);
                    }
                    reader.readAsDataURL(file);
                } else {
                    document.getElementById('mainImageFileName').textContent = 'No file chosen';
                }
            });

            document.getElementById('additionalImages').addEventListener('change', function(e) {
                const files = e.target.files;
                const fileCount = files.length;
                const fileName = fileCount > 0 ? `${fileCount} file${fileCount > 1 ? 's' : ''} selected` : 'No files chosen';
                document.getElementById('additionalImagesFileName').textContent = fileName;
                const previewContainer = document.getElementById('additionalImagesPreviewContainer');
                previewContainer.innerHTML = '';

                if (fileCount > 0) {
                    for (let i = 0; i < fileCount; i++) { // Removed Math.min to show all images
                        const file = files[i];
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            const wrapper = document.createElement('div');
                            wrapper.className = 'image-preview-wrapper';
                            const preview = document.createElement('img');
                            preview.className = 'image-preview';
                            preview.src = e.target.result;
                            const deleteBtn = document.createElement('button');
                            deleteBtn.className = 'delete-image-btn';
                            deleteBtn.textContent = 'Delete';
                            deleteBtn.onclick = function() {
                                removeImagePreview(wrapper, i);
                                return false;
                            };
                            wrapper.appendChild(preview);
                            wrapper.appendChild(deleteBtn);
                            previewContainer.appendChild(wrapper);
                        }
                        reader.readAsDataURL(file);
                    }
                }
            });

            document.getElementById('productForm').addEventListener('submit', function(e) {
                prepareFormData();
                if (!validateForm()) {
                    e.preventDefault();
                }
            });

            document.addEventListener('click', function(event) {
                if (!event.target.closest('.custom-select')) {
                    document.querySelectorAll('.dropdown-content').forEach(dropdown => {
                        dropdown.classList.remove('show');
                    });
                }
            });
        });

        function removeMainImagePreview(wrapper) {
            wrapper.remove();
            const input = document.getElementById('mainImage');
            input.value = '';
            document.getElementById('mainImageFileName').textContent = 'No file chosen';
        }

        function removeImagePreview(wrapper, index) {
            wrapper.remove();
            const input = document.getElementById('additionalImages');
            const files = Array.from(input.files);
            files.splice(index, 1);
            const dataTransfer = new DataTransfer();
            files.forEach(file => dataTransfer.items.add(file));
            input.files = dataTransfer.files;
            const fileCount = input.files.length;
            document.getElementById('additionalImagesFileName').textContent = 
                fileCount > 0 ? `${fileCount} file${fileCount > 1 ? 's' : ''} selected` : 'No files chosen';
            updateAdditionalImagesPreview(); // Update preview after removal
        }

        function updateAdditionalImagesPreview() {
            const input = document.getElementById('additionalImages');
            const files = input.files;
            const fileCount = files.length;
            const previewContainer = document.getElementById('additionalImagesPreviewContainer');
            previewContainer.innerHTML = '';

            if (fileCount > 0) {
                for (let i = 0; i < fileCount; i++) {
                    const file = files[i];
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const wrapper = document.createElement('div');
                        wrapper.className = 'image-preview-wrapper';
                        const preview = document.createElement('img');
                        preview.className = 'image-preview';
                        preview.src = e.target.result;
                        const deleteBtn = document.createElement('button');
                        deleteBtn.className = 'delete-image-btn';
                        deleteBtn.textContent = 'Delete';
                        deleteBtn.onclick = function() {
                            removeImagePreview(wrapper, i);
                            return false;
                        };
                        wrapper.appendChild(preview);
                        wrapper.appendChild(deleteBtn);
                        previewContainer.appendChild(wrapper);
                    }
                    reader.readAsDataURL(file);
                }
            }
        }

        function prepareFormData() {
            document.querySelectorAll('input[name="product_category[]"]').forEach(el => el.remove());
            document.querySelectorAll('input[name="product_sizes[]"]').forEach(el => el.remove());

            const selectedCategories = categories.filter(cat => cat.selected);
            selectedCategories.forEach(category => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'product_category[]';
                input.value = category.name;
                document.getElementById('productForm').appendChild(input);
            });

            const selectedSizes = sizes.filter(size => size.selected);
            selectedSizes.forEach(size => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'product_sizes[]';
                input.value = size.name;
                document.getElementById('productForm').appendChild(input);
            });
        }

        function validateForm() {
            const selectedCategories = categories.filter(cat => cat.selected);
            if (selectedCategories.length === 0) {
                alert('Please select at least one category');
                return false;
            }

            const selectedBrand = brands.find(brand => brand.selected);
            if (!selectedBrand) {
                alert('Please select a brand');
                return false;
            }

            const selectedSizes = sizes.filter(size => size.selected);
            if (selectedSizes.length === 0) {
                alert('Please select at least one size');
                return false;
            }

            return true;
        }

        function toggleDropdown(selectId) {
            const dropdown = document.getElementById(selectId.replace('Select', 'Dropdown'));
            dropdown.classList.toggle('show');
            document.querySelectorAll('.dropdown-content').forEach(dd => {
                if (dd.id !== dropdown.id) {
                    dd.classList.remove('show');
                }
            });
        }

        // Category Functions
        function renderCategoryOptions() {
            const optionsContainer = document.getElementById('categoryOptions');
            optionsContainer.innerHTML = '';

            categories.forEach(category => {
                const optionItem = document.createElement('div');
                optionItem.className = 'option-item';
                optionItem.innerHTML = `
                    <input type="checkbox" id="cat_${category.id}" 
                        ${category.selected ? 'checked' : ''} 
                        onchange="toggleCategorySelection(${category.id})">
                    <label for="cat_${category.id}">${category.name}</label>
                `;
                optionsContainer.appendChild(optionItem);
            });

            updateSelectedCategoriesDisplay();
        }

        function toggleCategorySelection(categoryId) {
            categories = categories.map(cat => 
                cat.id === categoryId ? { ...cat, selected: !cat.selected } : cat
            );
            renderCategoryOptions();
        }

        function addNewCategory() {
            const input = document.getElementById('newCategoryInput');
            const newCategoryName = input.value.trim();

            if (newCategoryName === '') {
                alert('Please enter a category name');
                return;
            }

            if (categories.some(cat => cat.name.toLowerCase() === newCategoryName.toLowerCase())) {
                alert('This category already exists');
                return;
            }

            const newId = categories.length > 0 ? Math.max(...categories.map(c => c.id)) + 1 : 1;
            categories.push({
                id: newId,
                name: newCategoryName,
                selected: true
            });

            input.value = '';
            renderCategoryOptions();
            document.getElementById('categoryDropdown').classList.remove('show');
        }

        function updateSelectedCategoriesDisplay() {
            const selectedContainer = document.getElementById('categorySelectedItems');
            const selectedCategories = categories.filter(cat => cat.selected);

            if (selectedCategories.length === 0) {
                selectedContainer.innerHTML = '<span class="placeholder">Select categories...</span>';
                return;
            }

            selectedContainer.innerHTML = '';
            selectedCategories.forEach(category => {
                const tag = document.createElement('span');
                tag.className = 'selected-tag';
                tag.innerHTML = `
                    ${category.name}
                    <span class="remove-tag" onclick="removeCategoryTag(${category.id}, event)">×</span>
                `;
                selectedContainer.appendChild(tag);
            });
        }

        function removeCategoryTag(categoryId, event) {
            event.stopPropagation();
            toggleCategorySelection(categoryId);
        }

        // Brand Functions
        function renderBrandOptions() {
            const optionsContainer = document.getElementById('brandOptions');
            optionsContainer.innerHTML = '';

            brands.forEach(brand => {
                const optionItem = document.createElement('div');
                optionItem.className = 'option-item';
                optionItem.innerHTML = `
                    <input type="radio" name="brandRadio" id="brand_${brand.id}" 
                        ${brand.selected ? 'checked' : ''} 
                        onchange="selectBrand(${brand.id})">
                    <label for="brand_${brand.id}">${brand.name}</label>
                `;
                optionsContainer.appendChild(optionItem);
            });

            updateSelectedBrandDisplay();
            updateBrandHiddenInput();
        }

        function selectBrand(brandId) {
            brands = brands.map(brand => ({
                ...brand,
                selected: brand.id === brandId
            }));
            selectedBrand = brands.find(brand => brand.id === brandId);
            renderBrandOptions();
        }

        function addNewBrand() {
            const input = document.getElementById('newBrandInput');
            const newBrandName = input.value.trim();

            if (newBrandName === '') {
                alert('Please enter a brand name');
                return;
            }

            if (brands.some(b => b.name.toLowerCase() === newBrandName.toLowerCase())) {
                alert('This brand already exists');
                return;
            }

            const newId = brands.length > 0 ? Math.max(...brands.map(b => b.id)) + 1 : 1;
            brands.push({
                id: newId,
                name: newBrandName,
                selected: true
            });

            selectedBrand = brands.find(brand => brand.id === newId);
            input.value = '';
            renderBrandOptions();
            document.getElementById('brandDropdown').classList.remove('show');
        }

        function updateSelectedBrandDisplay() {
            const selectedContainer = document.getElementById('brandSelectedItems');
            const selected = brands.find(brand => brand.selected);

            if (!selected) {
                selectedContainer.innerHTML = '<span class="placeholder">Select brand...</span>';
                return;
            }

            selectedContainer.innerHTML = '';
            const tag = document.createElement('span');
            tag.className = 'selected-tag';
            tag.innerHTML = `
                ${selected.name}
                <span class="remove-tag" onclick="removeBrandTag(event)">×</span>
            `;
            selectedContainer.appendChild(tag);
        }

        function updateBrandHiddenInput() {
            const selected = brands.find(brand => brand.selected);
            document.getElementById('brandInput').value = selected ? selected.name : '';
        }

        function removeBrandTag(event) {
            event.stopPropagation();
            brands = brands.map(brand => ({
                ...brand,
                selected: false
            }));
            selectedBrand = null;
            renderBrandOptions();
        }

        // Size Functions
        function renderSizeOptions() {
            const optionsContainer = document.getElementById('sizeOptions');
            optionsContainer.innerHTML = '';

            sizes.forEach(size => {
                const optionItem = document.createElement('div');
                optionItem.className = 'option-item';
                optionItem.innerHTML = `
                    <input type="checkbox" id="size_${size.id}" 
                        ${size.selected ? 'checked' : ''} 
                        onchange="toggleSizeSelection(${size.id})">
                    <label for="size_${size.id}">${size.name}</label>
                `;
                optionsContainer.appendChild(optionItem);
            });

            updateSelectedSizesDisplay();
        }

        function toggleSizeSelection(sizeId) {
            sizes = sizes.map(size => 
                size.id === sizeId ? { ...size, selected: !size.selected } : size
            );
            renderSizeOptions();
        }

        function addNewSize() {
            const input = document.getElementById('newSizeInput');
            const newSizeName = input.value.trim();

            if (newSizeName === '') {
                alert('Please enter a size');
                return;
            }

            if (sizes.some(s => s.name.toLowerCase() === newSizeName.toLowerCase())) {
                alert('This size already exists');
                return;
            }

            const newId = sizes.length > 0 ? Math.max(...sizes.map(s => s.id)) + 1 : 1;
            sizes.push({
                id: newId,
                name: newSizeName,
                selected: true
            });

            input.value = '';
            renderSizeOptions();
            document.getElementById('sizeDropdown').classList.remove('show');
        }

        function updateSelectedSizesDisplay() {
            const selectedContainer = document.getElementById('sizeSelectedItems');
            const selectedSizes = sizes.filter(size => size.selected);

            if (selectedSizes.length === 0) {
                selectedContainer.innerHTML = '<span class="placeholder">Select sizes...</span>';
                return;
            }

            selectedContainer.innerHTML = '';
            selectedSizes.forEach(size => {
                const tag = document.createElement('span');
                tag.className = 'selected-tag';
                tag.innerHTML = `
                    ${size.name}
                    <span class="remove-tag" onclick="removeSizeTag(${size.id}, event)">×</span>
                `;
                selectedContainer.appendChild(tag);
            });
        }

        function removeSizeTag(sizeId, event) {
            event.stopPropagation();
            toggleSizeSelection(sizeId);
        }
    </script>
</body>
</html>