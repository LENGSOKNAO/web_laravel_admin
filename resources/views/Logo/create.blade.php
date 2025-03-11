<x-layout>
    <x-nav>
        <div class="container">
            <form action="{{ route('logo.store') }}" method="post" enctype="multipart/form-data" class="form-container">
                @csrf
                
                <label for="logo_image">Add Image</label>
                <input type="file" name="logo_image" id="logo_image" onchange="previewImage(event)">
                
                <div class="image-preview-container">
                    <img id="image-preview" class="image-preview" style="display:none;">
                    <button type="button" id="btn-delete" class="btn-delete" onclick="removeImage()" style="display:none;">Delete</button>
                </div>
                
                <label for="logo_is_enable">Enable</label>
                <input type="checkbox" name="logo_is_enable" id="logo_is_enable" value="1">
                
                <button type="submit">Create Image</button>
            </form>
        </div>
    </x-nav>
</x-layout>

<style>
    .container {
        width: 100%;  
        padding: 15px;
        background: rgb(15,17,26);
        min-height: 100vh;
    }

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
        display: none;
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
</style>

<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById("image-preview");
        const deleteBtn = document.getElementById("btn-delete");
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = "block";
                deleteBtn.style.display = "inline-block";
            };
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    function removeImage() {
        const preview = document.getElementById("image-preview");
        const deleteBtn = document.getElementById("btn-delete");
        const fileInput = document.getElementById("logo_image");
        
        preview.src = "";
        preview.style.display = "none";
        deleteBtn.style.display = "none";
        fileInput.value = "";
    }
</script>