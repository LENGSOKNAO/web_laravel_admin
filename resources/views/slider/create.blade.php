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
        font-size: 0.8rem; /* Slightly larger */
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
        font-size: 0.7rem; /* Increased from 0.6rem */
        font-weight: 500;
        margin-bottom: 5px;
        margin-top: 15px; /* Increased spacing */
    }

    .form-container input[type="text"],
    .form-container input[type="file"],
    .form-container textarea,
    .form-container select {
        width: 100%;
        padding: 8px 12px; /* Increased from 6px 8px */
        background: rgb(25, 29, 41);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 4px; /* Slightly larger */
        color: rgb(185, 193, 218);
        font-size: 0.8rem; /* Increased from 0.6rem */
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
        min-height: 80px; /* Increased from 60px */
        resize: vertical;
    }

    .form-container select {
        background: rgb(25, 29, 41);
        cursor: pointer;
    }

    /* Button Styles */
    .form-container button[type="submit"] {
        padding: 8px 24px; /* Increased from 6px 20px */
        border-radius: 4px; /* Slightly larger */
        background: transparent;
        border: 1px solid #4dabf7;
        color: #4dabf7;
        font-size: 0.8rem; /* Increased from 0.6rem */
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
        margin-top: 20px; /* Increased spacing */
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
        margin-top: 8px; /* Increased from 5px */
        display: flex;
        align-items: center;
        gap: 12px; /* Increased from 10px */
    }

    .image-preview {
        max-width: 120px; /* Increased from 100px */
        max-height: 120px; /* Increased from 100px */
        object-fit: cover;
        border-radius: 4px;
        display: none;
    }

    .btn-delete {
        padding: 5px 12px; /* Increased from 3px 10px */
        border-radius: 4px; /* Slightly larger */
        background: transparent;
        border: 1px solid #ff6b6b;
        color: #ff6b6b;
        font-size: 0.7rem; /* Increased from 0.6rem */
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

<x-layout>
    <x-nav>
        <div class="container">
            @if(session('success'))
                <p class="success-message">{{ session('success') }}</p>
            @endif
            
            <div class="form-container">
                <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                
                    <label>Slide Name:</label>
                    <input type="text" name="slide_name" required>
                
                    <label>Slide Brand:</label>
                    <input type="text" name="slide_brand">

                    <label>Slide Category:</label>
                    <input type="text" name="slide_category">
                
                    <label>Slide Image:</label>
                    <input type="file" name="slide_image" id="slideImageInput" accept="image/*" required>
                    <div class="image-preview-container">
                        <img id="slideImagePreview" class="image-preview" alt="Slide Image Preview">
                        <button type="button" id="deleteSlideImage" class="btn-delete">Delete</button>
                    </div>
                
                    <label>Slide Small Image:</label>
                    <input type="file" name="slide_small_image" id="slideSmallImageInput" accept="image/*">
                    <div class="image-preview-container">
                        <img id="slideSmallImagePreview" class="image-preview" alt="Slide Small Image Preview">
                        <button type="button" id="deleteSlideSmallImage" class="btn-delete">Delete</button>
                    </div>
                
                    <label>Slide Description:</label>
                    <textarea name="slide_description"></textarea>
                
                    <label>Enable Slide:</label>
                    <select name="slide_is_enable">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                
                    <button type="submit">Submit</button>
                </form>
            </div>
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
        });
    }

    // Initialize previews and delete buttons
    document.addEventListener('DOMContentLoaded', function() {
        handleImagePreview('slideImageInput', 'slideImagePreview', 'deleteSlideImage');
        handleImagePreview('slideSmallImageInput', 'slideSmallImagePreview', 'deleteSlideSmallImage');
    });
</script>