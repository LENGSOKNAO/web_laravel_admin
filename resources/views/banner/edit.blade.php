<x-layout>
    <x-nav>
        <div class="container">
            <h2>Edit Banner</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data" class="table form" id="bannerForm">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="banner_name">Banner Name:</label>
                    <input type="text" name="banner_name" id="banner_name" value="{{ old('banner_name', $banner->banner_name) }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="banner_description">Description:</label>
                    <textarea name="banner_description" id="banner_description" class="form-control">{{ old('banner_description', $banner->banner_description) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="banner_image">Banner Image:</label>
                    <input type="file" name="banner_image" id="banner_image" class="form-control" accept="image/*,video/*" onchange="previewImage(event)">
                    <div class="image-preview" id="bannerImagePreview">
                        @if ($banner->banner_image)
                            <img src="{{ asset('storage/' . $banner->banner_image) }}" width="100" alt="Banner Image">
                        @else
                            <p>No image uploaded.</p>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="banner_small_image">Small Image:</label>
                    <input type="file" name="banner_small_image" id="banner_small_image" class="form-control" accept="image/*" onchange="previewSmallImage(event)">
                    <div class="image-preview" id="bannerSmallImagePreview">
                        @if ($banner->banner_small_image)
                            <img src="{{ asset('storage/' . $banner->banner_small_image) }}" width="100" alt="Small Banner Image">
                        @else
                            <p>No small image uploaded.</p>
                        @endif
                    </div>
                </div>

               

                <div class="form-group">
                    <label for="banner_brand">Banner  Brand:</label>
                    <input type="text" name="banner_brand" id="banner_brand" value="{{ old('banner_brand', $banner->banner_link) }}" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="banner_link">Banner Link:</label>
                    <input type="text" name="banner_link" id="banner_link" value="{{ old('banner_link', $banner->banner_link) }}" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="banner_category">Banner Category:</label>
                    <input type="text" name="banner_category" id="banner_category" value="{{ old('banner_category', $banner->banner_link) }}" class="form-control">
                </div>

                <div class="form-group" style="display: flex; align-items: center;">
                    <label for="banner_is_enable">Enable Banner:</label>
                    <input type="checkbox" name="banner_is_enable" id="banner_is_enable" value="1" class="form-checkbox" 
                        {{ $banner->banner_is_enable ? 'checked' : '' }}>
                </div>
                
                <button type="submit" class="btn-primary">Update Banner</button>
            </form>
        </div>
    </x-nav>
</x-layout>

<style>
    /* Container Styles */
    .container {
        width: 100%;
        padding: 15px;
        background: rgb(15,17,26);
        min-height: 100vh;
    }

    h2 {
        color: #ffffff;
        font-size: 1.2rem;
        margin-bottom: 15px;
    }

    /* Alert Styles */
    .alert {
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 4px;
    }

    .alert-danger {
        background: rgba(255, 107, 107, 0.1);
        color: #ff6b6b;
        border: 1px solid #ff6b6b;
    }

    .alert ul {
        margin: 0;
        padding-left: 20px;
        font-size: 0.7rem;
    }

    /* Form Styles */
    .table.form {
        margin: 0;
        display: block;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        color: rgb(185, 193, 218);
        font-size: 0.7rem;
        display: block;
        margin-bottom: 5px;
    }

    .form-control {
        width: 99%;
        padding: 6px 8px;
        background: rgb(25, 29, 41);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 3px;
        color: rgb(185, 193, 218);
        font-size: 0.6rem;
        transition: border-color 0.2s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: #4dabf7;
        background: rgb(30, 34, 46);
    }

    .form-control[type="file"] {
        padding: 3px;
    }

    .form-checkbox {
        margin-right: 5px;
        vertical-align: middle;
    }

    textarea.form-control {
        min-height: 80px;
        resize: vertical;
    }

    /* Button Styles */
    .btn-primary {
        padding: 3px 12px;
        border-radius: 3px;
        background: transparent;
        border: 1px solid #4dabf7;
        color: #4dabf7;
        text-decoration: none;
        font-size: 0.6rem;
        font-weight: 500;
        display: inline-block;
        transition: all 0.2s ease;
        cursor: pointer;
    }

    .btn-primary:hover {
        background: rgba(77, 171, 247, 0.1);
        color: #ffffff;
        border-color: #ffffff;
        transform: translateY(-1px);
    }

    .btn-primary:active {
        transform: translateY(0);
        background: rgba(77, 171, 247, 0.2);
    }

    /* Image Preview Styles */
    .image-preview img {
        width: 100px;
        object-fit: cover;
    }

    .image-preview p {
        color: #ccc;
        font-size: 0.8rem;
    }
</style>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.createElement('img');
            output.src = reader.result;
            var previewContainer = document.getElementById('bannerImagePreview');
            previewContainer.innerHTML = '';  // Clear previous image
            previewContainer.appendChild(output);
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    function previewSmallImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.createElement('img');
            output.src = reader.result;
            var previewContainer = document.getElementById('bannerSmallImagePreview');
            previewContainer.innerHTML = '';  // Clear previous image
            previewContainer.appendChild(output);
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
