<!-- Navbar Header -->
<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				
    <div class="container-fluid">
        
        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">						
            <li class="nav-item dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                    <div class="avatar-sm">
                        <img src="{{asset('assets/image/profile.jpg')}}" alt="..." class="avatar-img rounded-circle">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                        <li>
                            <div class="user-box">
                                <div class="avatar-lg"><img src="{{asset('assets/image/profile.jpg')}}" alt="image profile" class="avatar-img rounded"></div>
                                <div class="u-text">
                                    <h4>{{ auth()->user()->username }}</h4>
                                    <p class="text-muted">{{ auth()->user()->email }}</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/user">Account Setting</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout')}}">Logout</a>

                        </li>
                    </div>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<!-- End Navbar -->
