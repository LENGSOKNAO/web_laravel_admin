<style>
    .sidebar-menu {
        background: rgb(20, 24, 36);
        margin: 0;
        width: 15%;
        list-style: none;
        border-right: 1px solid rgba(255, 255, 255, 0.1);
        min-height: 100vh;
        padding: 20px 0;
    } 
    .sidebar-menu li {
        margin: 5px 0;
    }
    .sidebar-menu li a {
        font-size: 0.7rem;
        padding: 7px 20px;
        text-decoration: none;
        color: white;
        display: block;
        transition: all 0.1s ease-in-out;
        cursor: pointer;  
    }
    .sidebar-menu a:hover {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 4px;
    }
    .sidebar-menu a.active {
        background: rgba(255, 255, 255, 0.15);
        border-left: 3px solid #ffffff;
        padding-left: 17px;
        padding: 7px 20px;
    }
    .sidebar-menu a {
        text-transform: capitalize;
        letter-spacing: 0.5px;
    }
    .sidebar-menu li a i{
        padding: 0 3px ;
    }
    /* Hide submenu by default */
.submenu {
    display: none;
    padding-left: 20px; /* Indent submenu items */
}

/* Show submenu when the parent has the 'active' class */
.has-submenu.active .submenu {
    display: block;
}

/* Optional: Add a caret icon to indicate dropdown */
.has-submenu .submenu-toggle::after {
    content: "▸";
    float: right;
    transition: transform 0.3s;
}

.has-submenu.active .submenu-toggle::after {
    transform: rotate(90deg);
}
</style>

<ul class="sidebar-menu">
    <li   >
        <a href="#" class="submenu-toggle"><i class="fa-brands fa-slack"></i> Admin</a>
  
    </li>
    <li class="has-submenu"><a href=" "class="submenu-toggle"><i class="fa-brands fa-yahoo"></i> Logo</a>
        <ul class="submenu">          
            <li><a href="{{ route('logo.index') }}"><i class="fa-brands fa-yahoo"></i> Logo</a></li>    
            <li><a href="{{ route('logo.create') }}"><i class="fa-solid fa-plus"></i> Add Logo</a></li>
        </ul>
    </li>
    <li class="has-submenu" ><a href="" class="submenu-toggle"><i class="fa-solid fa-sliders"></i> Sliders</a>
        <ul class="submenu">                
            <li><a href="{{ route('slider.index') }}"><i class="fa-solid fa-sliders"></i> All Sliders</a></li>
            <li><a href=""><i class="fa-solid fa-person"></i>  Men Sliders</a></li>
            <li><a href=""><i class="fa-solid fa-person-dress"></i> Women Sliders</a></li>
            <li><a href=""><i class="fa-solid fa-child"></i> kids Sliders</a></li>
            <li><a href="{{ route('slider.create') }}"><i class="fa-solid fa-circle-plus"></i>Add Sliders</a></li>
        </ul>        
    </li>
    <li class="has-submenu"><a href=" " class="submenu-toggle"  ><i class="fa-solid fa-image"></i>Banners   </a>   
        <ul class="submenu">                         
            <li><a href="{{ route('banner.index') }}"><i class="fa-solid fa-image"></i> All Banners</a></li>
            <li><a href=""><i class="fa-solid fa-person"></i>  Men Banner</a></li>
            <li><a href=""><i class="fa-solid fa-person-dress"></i> Women Banner</a></li>
            <li><a href=""><i class="fa-solid fa-child"></i> kids Banner</a></li>
            <li><a href="{{ route('banner.create') }}"><i class="fa-solid fa-images"></i>Add Banners</a></li>
        </ul>        
  </li>
    <li class="has-submenu"><a href="" class="submenu-toggle"><i class="fa-solid fa-dumpster"></i>Products</a>    
        <ul class="submenu">                         
            <li><a href="{{ route('products.index') }}"><i class="fa-solid fa-dumpster"></i>All Products</a></li>
            <li><a href=""><i class="fa-solid fa-person"></i>  Men Product</a></li>
            <li><a href=""><i class="fa-solid fa-person-dress"></i> Women Product</a></li>
            <li><a href=""><i class="fa-solid fa-child"></i> kids Product</a></li>
            <li><a href="{{ route('products.create') }}"><i class="fa-solid fa-cart-plus"></i>Add Products</a></li>
        </ul>  
    </li>
    <li><a href="#"><i class="fa-solid fa-camera-rotate"></i>Order</a></li>
    <li><a href="#"><i class="fa-solid fa-user-plus"></i>Customer</a></li>
    <li><a href="#"><i class="fa-solid fa-people-carry-box"></i>Refund</a></li>
    <li><a href="#"><i class="fa-solid fa-gear"></i>Setting</a></li>
</ul>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebarLinks = document.querySelectorAll('.sidebar-menu a');
        
        // Set initial active state based on current URL
        const currentPath = window.location.pathname;
        sidebarLinks.forEach(link => {
            if (link.getAttribute('href') === currentPath) {
                link.classList.add('active');
            }
        });

        // Handle click events
        sidebarLinks.forEach(link => {
            link.addEventListener('click', function() {
                // Remove active class from all links
                sidebarLinks.forEach(item => item.classList.remove('active'));
                // Add active class to clicked link
                this.classList.add('active');
                // Link will navigate normally to the href destination
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const submenuToggles = document.querySelectorAll('.has-submenu .submenu-toggle');

    submenuToggles.forEach(function (toggle) {
        toggle.addEventListener('click', function (e) {
            e.preventDefault();
            const parentListItem = this.closest('.has-submenu');
            parentListItem.classList.toggle('active');
        });
    });
});
</script>
{{ $slot }}