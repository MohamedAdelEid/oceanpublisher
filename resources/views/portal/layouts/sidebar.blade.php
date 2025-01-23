<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item @yield('li_dashboard')">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item @yield('li_products')">
            <a class="nav-link" href="{{ route('products.index') }}">
                <i class="icon-book menu-icon"></i>
                <span class="menu-title">Products</span>
            </a>
        </li>
        <li class="nav-item @yield('li_serials')">
            <a class="nav-link" href="{{ route('serials.index') }}">
                <i class="icon-command menu-icon"></i>
                <span class="menu-title">Serials</span>
            </a>
        </li>
        <li class="nav-item @yield('li_categories')">
            <a class="nav-link" href="{{ route('categories.index') }}">
                <i class="icon-layers menu-icon"></i>
                <span class="menu-title">Categories</span>
            </a>
        </li>
        <li class="nav-item @yield('li_sliders')">
            <a class="nav-link" href="{{ route('sliders.index') }}">
                <i class="icon-image menu-icon"></i>
                <span class="menu-title">Sliders</span>
            </a>
        </li>
        <li class="nav-item @yield('li_faqs')">
            <a class="nav-link" href="{{ route('faqs.index') }}">
                <i class="icon-help menu-icon"></i>
                <span class="menu-title">FAQs</span>
            </a>
        </li>
        <li class="nav-item @yield('li_testimonials')">
            <a class="nav-link" href="{{ route('testimonials.index') }}">
                <i class="icon-share menu-icon"></i>
                <span class="menu-title">Testimonials</span>
            </a>
        </li>
        <li class="nav-item @yield('li_messages')">
            <a class="nav-link" href="{{ route('messages.index') }}">
                <i class="ti-email menu-icon"></i>
                <span class="menu-title">Messages</span>
            </a>
        </li>
        <li class="nav-item @yield('li_newsletters')">
            <a class="nav-link" href="{{ route('newsletters.index') }}">
                <i class="icon-link menu-icon"></i>
                <span class="menu-title">Newsletters</span>
            </a>
        </li>
        <li class="nav-item @yield('li_lookups')">
            <a class="nav-link" href="{{ route('lookups.index') }}">
                <i class="ti-settings menu-icon"></i>
                <span class="menu-title">Lookups</span>
            </a>
        </li>
        <li class="nav-item @yield('li_users')">
            <a class="nav-link" href="{{ route('users.index') }}">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Users</span>
            </a>
        </li>

    </ul>
</nav>
