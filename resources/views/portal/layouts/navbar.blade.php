<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="{{ route('/') }}">
            <img src="{{ asset('panel/images/logo.png') }}" class="mr-2" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="{{ route('/') }}">
            <img src="{{ asset('panel/images/logo.png') }}" alt="logo" />
        </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                    <i class="icon-bell mx-0"></i>
                    @if (count(auth_user()->unreadNotifications) > 0)
                        <span class="count"></span>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                    aria-labelledby="notificationDropdown">
                    <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                    @if (count(auth_user()->unreadNotifications) > 0)
                        @foreach (auth_user()->unreadNotifications as $notify)
                            <a class="dropdown-item preview-item" href="{{ URL::to('readNotifications/' . $notify->id) }}">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-{{ $notify->data['color'] }}">
                                        <i class="{{ $notify->data['icon'] }} mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal">{{ $notify->data['body'] }}</h6>
                                    <p class="font-weight-light small-text mb-0 text-muted">
                                        {{ $notify->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <a class="dropdown-item preview-item">You don't have any notifications yet!</a>
                    @endif
                </div>
            </li>
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                    <img src="{{ auth_user()->image }}" alt="profile" />
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item">
                        <i class="ti-user text-primary"></i>
                        Profile
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="ti-power-off text-primary"></i>
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="icon-menu"></span>
        </button>
    </div>
</nav>