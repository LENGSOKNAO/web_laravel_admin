<x-layout>
    <x-nav>
        <div class="container">
            <!-- Success Message -->
            @if (session('success'))
                <p class="success-message">{{ session('success') }}</p>
            @endif
            @if (session('error'))
                <p class="error-message">{{ session('error') }}</p>
            @endif

            <form action="{{ route('slider.update', $slider->id) }}" method="post" enctype="multipart/form-data" class="form-container custom-form">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="slide_name">Slide Name:</label>
                    <input type="text" id="slide_name" name="slide_name" value="{{ old('slide_name', $slider->slide_name) }}" required>
                    @error('slide_name')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="slide_brand">Slide Brand:</label>
                    <input type="text" id="slide_brand" name="slide_brand" value="{{ old('slide_brand', $slider->slide_brand) }}">
                    @error('slide_brand')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="slide_category">Slide Category:</label>
                    <input type="text" id="slide_category" name="slide_category" value="{{ old('slide_category', $slider->slide_category) }}">
                    @error('slide_category')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="slide_image">Slide Image:</label>
                    <input type="file" id="slide_image" name="slide_image" accept="image/*">
                    <div class="image-preview-container">
                        @if($slider->slide_image)
                            <img src="{{ asset('storage/' . $slider->slide_image) }}" id="slide_image_preview" class="image-preview">
                            <!-- Delete Button for Old Image -->
                            <button type="button" class="btn-delete" id="deleteSlideImage">Delete Image</button>
                        @else
                            <img id="slide_image_preview" class="image-preview" style="display: none;" />
                        @endif
                    </div>
                    @error('slide_image')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="slide_small_image">Slide Small Image:</label>
                    <input type="file" id="slide_small_image" name="slide_small_image" accept="image/*">
                    <div class="image-preview-container">
                        @if($slider->slide_small_image)
                            <img src="{{ asset('storage/' . $slider->slide_small_image) }}" id="slide_small_image_preview" class="image-preview">
                            <!-- Delete Button for Small Image -->
                            <button type="button" class="btn-delete" id="deleteSlideSmallImage">Delete Small Image</button>
                        @else
                            <img id="slide_small_image_preview" class="image-preview" style="display: none;" />
                        @endif
                    </div>
                    @error('slide_small_image')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="slide_description">Slide Description:</label>
                    <textarea id="slide_description" name="slide_description">{{ old('slide_description', $slider->slide_description) }}</textarea>
                    @error('slide_description')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="slide_is_enable">Enable Slide:</label>
                    <select id="slide_is_enable" name="slide_is_enable">
                        <option value="1" {{ $slider->slide_is_enable ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ !$slider->slide_is_enable ? 'selected' : '' }}>No</option>
                    </select>
                    @error('slide_is_enable')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="submit-btn">Update</button>
            </form>
        </div>
    </x-nav>
</x-layout>

<script>
    // Function to handle image preview and delete
    function handleImagePreview(inputId, previewId, deleteBtnId) {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(previewId);
        const deleteBtn = document.getElementById(deleteBtnId);

        // Preview image when selected
        input.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    deleteBtn.style.display = 'inline-block';
                }
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
                deleteBtn.style.display = 'none';
                preview.src = '';
            }
        });

        // Delete image when button clicked
        deleteBtn.addEventListener('click', function() {
            input.value = '';
            preview.style.display = 'none';
            deleteBtn.style.display = 'none';
            preview.src = '';
            // Optionally, you may also delete the image on the server by making an AJAX request here.
        });
    }

    // Initialize previews and delete buttons
    document.addEventListener('DOMContentLoaded', function() {
        handleImagePreview('slide_image', 'slide_image_preview', 'deleteSlideImage');
        handleImagePreview('slide_small_image', 'slide_small_image_preview', 'deleteSlideSmallImage');
    });
</script>

<style>
    /* Container Styles */
    .container {
        width: 100%;  
        padding: 15px;
        background: rgb(15,17,26);
        min-height: 100vh;
    }

    /* Success Message */
    .success-message {
        color: #28a745;
        font-size: 0.8rem; 
        margin-bottom: 15px;
        text-align: center;
    }

    /* Form Styles */
    .form-container {
        width: 98%;
        padding: 20px;
        background: rgb(20,24,36);
        border-radius: 4px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .form-container label {
        display: block;
        color: rgb(159,166,188);
        font-size: 0.7rem; 
        font-weight: 500;
        margin-bottom: 5px;
        margin-top: 15px; 
    }

    .form-container input[type="text"],
    .form-container input[type="file"],
    .form-container textarea,
    .form-container select {
        width: 100%;
        padding: 8px 12px; 
        background: rgb(25, 29, 41);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 4px; 
        color: rgb(185, 193, 218);
        font-size: 0.8rem; 
        transition: border-color 0.2s ease;
    }

    .form-container input[type="text"]:focus,
    .form-container input[type="file"]:focus,
    .form-container textarea:focus,
    .form-container select:focus {
        outline: none;
        border-color: #4dabf7;
    }

    .form-container textarea {
        min-height: 80px; 
        resize: vertical;
    }

    .form-container select {
        background: rgb(25, 29, 41);
        cursor: pointer;
    }

    /* Button Styles */
    .form-container button[type="submit"] {
        padding: 8px 24px; 
        border-radius: 4px; 
        background: transparent;
        border: 1px solid #4dabf7;
        color: #4dabf7;
        font-size: 0.8rem; 
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
        margin-top: 20px;
        width: 100%;
    }

    .form-container button[type="submit"]:hover {
        background: rgba(77, 171, 247, 0.1);
        color: #ffffff;
        border-color: #ffffff;
        transform: translateY(-1px);
    }

    .form-container button[type="submit"]:active {
        transform: translateY(0);
        background: rgba(77, 171, 247, 0.2);
    }

    /* Image Preview Styles */
    .image-preview-container {
        margin-top: 8px; 
        display: flex;
        align-items: center;
        gap: 12px; 
    }

    .image-preview {
        max-width: 120px; 
        max-height: 120px; 
        object-fit: cover;
        border-radius: 4px;
        display: block; /* By default, set it to display */
    }

    .btn-delete {
        padding: 5px 12px; 
        border-radius: 4px; 
        background: transparent;
        border: 1px solid #ff6b6b;
        color: #ff6b6b;
        font-size: 0.7rem; 
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
        display: none;
    }

    .btn-delete:hover {
        background: rgba(255, 107, 107, 0.1);
        color: #ffffff;
        border-color: #ffffff;
        transform: translateY(-1px);
    }

    .btn-delete:active {
        transform: translateY(0);
        background: rgba(255, 107, 107, 0.2);
    }
</style>
