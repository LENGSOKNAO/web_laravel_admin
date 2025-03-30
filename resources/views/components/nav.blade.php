<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled Sidebar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .red-text {
            color: rgb(56,138,255);
        }
        
        body {
            margin: 0;
            padding: 0;
        }
        a,li {
            text-decoration: none;
            list-style: none;
        }
        .flex {
            display: flex;
        }
        
        .sidebar {
            width: 270px;
            height: 88.7vh;
            background-color: white;
            border-right: 1px solid rgb(203,208,221);
            color: rgb(55, 65, 81);
            font-size: 0.875rem;
            padding: 1rem;
            margin: 0;
        }
        
        .sidebar li {
            padding: 0.5rem 1rem;
            border-radius: 0.125rem;
            cursor: pointer;
        }
        
        .sidebar li:hover {
            background-color: rgb(229, 231, 235);
            transition: background-color 300ms;
        }
        
        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .sidebar-link i {
            width: 1.25rem;
            text-align: center;
        }
        .sidebar-link i ,a {
            color: rgb(37, 36, 36);
        }
    </style>
    <script>
        function toggleRed(element) {
            // Remove red-text class from all links
            document.querySelectorAll('.sidebar-link').forEach(link => {
                link.classList.remove('red-text');
            });

            // Find the anchor tag inside the clicked <li> and add the red-text class
            const anchor = element.querySelector('.sidebar-link');
            if (anchor) {
                anchor.classList.add('red-text');
            }
        }
    </script>
</head>
<body>
    <div class="flex">
        <!-- Sidebar -->
        <ul class="sidebar">
            <li class="tb" onclick="toggleRed(this)">
                <a class="sidebar-link">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="tb" onclick="toggleRed(this)">
                <div class="sidebar-link">
                    <i class="fas fa-image"></i>
                    <a href="{{ route( 'logo.index') }}">Logo</a>
                </div>
            </li>
            <li class="tb" onclick="toggleRed(this)">
                <div class="sidebar-link">
                    <i class="fas fa-sliders-h"></i>
                    <a href="{{ route('slider.index') }}">Slider</a>
                </div>
            </li>
            <li class="tb" onclick="toggleRed(this)">
                <div class="sidebar-link">
                    <i class="fas fa-ad"></i>
                    <a href="{{ route('banner.index') }}">Banner</a>
                </div>
            </li>
            <li class="tb" onclick="toggleRed(this)">
                <div class="sidebar-link">
                    <i class="fas fa-box"></i>
                    <a href="{{ route( 'products.index') }}">Product</a>
                </div>
            </li>
            <li class="tb" onclick="toggleRed(this)">
                <a class="sidebar-link">
                    <i class="fas fa-users"></i>
                    <span>Customer</span>
                </a>
            </li>
            <li class="tb" onclick="toggleRed(this)">
                <a class="sidebar-link">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Order</span>
                </a>
            </li>
            <li class="tb" onclick="toggleRed(this)">
                <a class="sidebar-link">
                    <i class="fas fa-undo"></i>
                    <span>Refund</span>
                </a>
            </li>
            <li class="tb" onclick="toggleRed(this)">
                <a class="sidebar-link">
                    <i class="fas fa-cog"></i>
                    <span>Setting</span>
                </a>
            </li>
        </ul>
        
        {{ $slot }}
    </div>
</body>
</html>