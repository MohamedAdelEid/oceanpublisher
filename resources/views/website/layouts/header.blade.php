    <!-- ======= Header =======  bg-white -->
    <header id="header" class="header fixed-top bg-white header-scrolled">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="{{ route('/') }}" class="logo d-flex align-items-center">
                <img src="{{ $data['lookup']->logo }}" alt="logo">
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link @yield('li_home')" href="{{ route('/') }}">Home</a></li>
                    <li class="dropdown @yield('li_categories')">
                        <a href="javascript:;" class="@yield('li_categories')">
                            <span>Categories</span>
                            <i class="bi bi-chevron-down"></i>
                        </a>
                        <ul>
                            @foreach ($data['menu_categories'] as $menu_cat)
                                <li><a href="{{ route('showCategory', $menu_cat->slug) }}">{{ $menu_cat->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a class="nav-link @yield('li_about')" href="{{ route('aboutUs') }}">About Us</a></li>
                    <li><a class="nav-link @yield('li_career')" href="{{ route('career') }}">Career</a></li>
                    <li><a class="nav-link @yield('li_contact')" href="{{ route('contactUs') }}">Contact Us</a></li>
                    @auth
                        @if (auth()->user()->is_admin)
                            <li><a class="getstarted" href="{{ route('dashboard') }}">Dashboard</a></li>
                        @endif
                        <li><a class="getstarted" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @else
                        <li><a class="getstarted" href="{{ route('login') }}">Login</a></li>
                    @endauth
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
