<x-layout>
      <x-nav>
          <div class="container">
              <h2>Create Banner</h2>
  
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
  
              <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data" class="table form" id="bannerForm">
                  @csrf
  
                  <div class="form-group">
                      <label for="banner_name">Banner Name:</label>
                      <input type="text" name="banner_name" id="banner_name" value="{{ old('banner_name') }}" class="form-control" required>
                  </div>
  
                  <div class="form-group">
                      <label for="banner_description">Description:</label>
                      <textarea name="banner_description" id="banner_description" class="form-control">{{ old('banner_description') }}</textarea>
                  </div>
  
                  <div class="form-group">
                      <label for="banner_image">Banner Image:</label>
                      <input type="file" name="banner_image" id="banner_image" class="form-control" accept="image/*" required>
                      <div class="image-preview" id="bannerImagePreview">
                          <!-- Image preview will be inserted here -->
                      </div>
                  </div>
  
                  <div class="form-group">
                      <label for="banner_small_image">Small Image:</label>
                      <input type="file" name="banner_small_image" id="banner_small_image" class="form-control" accept="image/*" required>
                      <div class="image-preview" id="bannerSmallImagePreview">
                          <!-- Image preview will be inserted here -->
                      </div>
                  </div>
  
                  <div class="form-group">
                      <label for="banner_is_enable">Enable Banner:</label>
                      <input type="checkbox" name="banner_is_enable" id="banner_is_enable" value="1" class="form-checkbox">
                  </div>
  
                  <div class="form-group">
                      <label for="banner_link">Banner Link:</label>
                      <input type="text" name="banner_link" id="banner_link" value="{{ old('banner_link') }}" class="form-control">
                  </div>
  
                  <button type="submit" class="btn-primary">Create Banner</button>
              </form>
          </div>
      </x-nav>
</x-layout>
     
<script>
          function handleImagePreview(inputId, previewId) {
              const input = document.getElementById(inputId);
              const preview = document.getElementById(previewId);
  
              input.addEventListener('change', function() {
                  preview.innerHTML = ''; // Clear existing preview
                  if (this.files && this.files[0]) {
                      const file = this.files[0];
                      const reader = new FileReader();
  
                      reader.onload = function(e) {
                          const img = document.createElement('img');
                          img.src = e.target.result;
                          img.className = 'preview-image';
  
                          const deleteBtn = document.createElement('button');
                          deleteBtn.textContent = 'Delete';
                          deleteBtn.className = 'btn-danger preview-delete';
                          deleteBtn.onclick = function() {
                              preview.innerHTML = '';
                              input.value = ''; // Clear the file input
                          };
  
                          const wrapper = document.createElement('div');
                          wrapper.className = 'preview-wrapper';
                          wrapper.appendChild(img);
                          wrapper.appendChild(deleteBtn);
                          preview.appendChild(wrapper);
                      };
                      reader.readAsDataURL(file);
                  }
              });
          }
  
          // Initialize previews for both inputs
          handleImagePreview('banner_image', 'bannerImagePreview');
          handleImagePreview('banner_small_image', 'bannerSmallImagePreview');
</script>

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
      display: block; /* Changed from inline-block to block for form layout */
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
      padding: 3px; /* Adjust padding for file inputs */
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

      /* Existing Table Styles (for reference) */
      .table {
      width: 100%;
      border-collapse: collapse;
      background: rgb(20,24,36);
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      }

      .table th {
      padding: 8px;
      text-align: center;
      font-weight: 600;
      color: rgb(159,166,188);
      border-bottom: 2px solid rgba(255, 255, 255, 0.1);  
      background: rgb(25, 29, 41);
      font-size: 0.5rem;
      }

      .table td {
      padding: 6px 8px;
      vertical-align: middle;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);  
      color: rgb(185, 193, 218);
      font-size: 0.6rem;
      text-align: center;
      }

      .table-striped tbody tr:nth-child(odd) {
      background: rgb(25, 29, 41);
      }

      .table tr:hover {
      background: rgb(30, 34, 46);
      }

      /* Image Styles */
      .table img {
      width: 50px;
      object-fit: cover;
      border-radius: 4px;
      }

      /* Badge Styles */
      .badge {
      padding: 3px 6px;
      border-radius: 10px;
      font-size: 0.65rem;
      color: white;
      }

      .bg-success { 
      background: #28a745; 
      }

      .bg-danger { 
      background: #ff6b6b; 
      }

      /* Button Styles (for reference) */
      .btn-danger {
      padding: 3px 12px;
      border-radius: 3px;
      background: transparent;
      border: 1px solid #ff6b6b;
      color: #ff6b6b;
      text-decoration: none;
      font-size: 0.6rem;
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

      .btn-danger:active {
      transform: translateY(0);
      background: rgba(255, 107, 107, 0.2);
      }
  </style>