<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{asset('assets/image/profile.jpg')}}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ auth()->user()->username }}
                            <span class="user-level">{{ auth()->user()->role }}</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="/profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('logout') }}">
                                    <span class="link-collapse">Log out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item @if(Route::is('dashboard') ) {{ __('active')}} @endif">
                    <a href="/">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>

                    </a>

                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Menu</h4>
                </li>
                <li class="nav-item @if(Route::is('artikel') ) {{ __('active')}} @endif">
                    <a href="/artikel">
                        <i class="fas fa-newspaper"></i>
                        <p>Menu Artikel</p>
                    </a>
                </li>
                <li class="nav-item @if(Route::is('challenge') ) {{ __('active')}} @endif">
                    <a href="/challenge">
                        <i class="fas fa-tasks"></i>
                        <p>Menu Challenge</p>

                    </a>
                </li>
                <li class="nav-item @if(Route::is('question') ) {{ __('active')}} @endif">
                    <a href="{{url('/question')}}">
                        <i class="fas fa-tasks"></i>
                        <p>Qusetions</p>

                    </a>
                </li>

                <li class="nav-item @if(Route::is('membership') ) {{ __('active')}} @endif">
                    <a href="/membership">
                        <i class="fas fa-users"></i>
                        <p>Membership</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
