<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ url('public/assets/images/download.png')}}" alt="Logo" style="width:100% ;">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ url('public/assets/images/download.png')}}" alt="Logo" style="width:100% ;">
                    </span>
                </a>

                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ url('public/assets/images/download.png')}}" alt="Logo" style="width:100% ; margin-top: 15px;">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ url('public/assets/images/download.png')}}  " alt="Logo" style="width:100% ; margin-top: 15px;">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>

            <div class="d-none d-sm-block ms-2">
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>

        <!-- Search input -->
        <div class="search-wrap" id="search-wrap">
            <div class="search-bar">
                <input class="search-input form-control" placeholder="Search">
                <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                    <i class="mdi mdi-close-circle"></i>
                </a>
            </div>
        </div>

        <div class="d-flex">

            <div class="dropdown d-none d-lg-inline-block me-2">
                <button type="button" class="btn header-item toggle-search noti-icon waves-effect" data-target="#search-wrap">
                    <i class="mdi mdi-magnify"></i>
                </button>
            </div>

            <div class="dropdown d-none d-lg-inline-block me-2">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen"></i>
                </button>
            </div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{url('public/assets/images/users/avatar-1.jpg')}}" alt="Header Avatar">
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="#">   {{ __('Manage Account') }}</a>
                    <a class="dropdown-item" href="{{ route('profile.show') }}">{{ __('Profile') }}</a>
                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <a class="dropdown-item" href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                    </a>
                            @endif
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                 <a class="dropdown-item" href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                    </a>
                                   
                            </form>
                </div>
                </div> 

        </div>
    </div>
</header>