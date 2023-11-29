<li class="dropdown notification-list topbar-dropdown">
    <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown"
       href="#" role="button" aria-haspopup="false" aria-expanded="false">
        <img src="{{ asset('backend/assets/images/users/user-1.jpg') }}" alt="user-image"
             class="rounded-circle">
        <span class="pro-user-name ms-1">
                                    {{ \Illuminate\Support\Facades\Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                                </span>
    </a>
    <div class="dropdown-menu dropdown-menu-end profile-dropdown ">


        <!-- item-->
        <a href="javascript:void(0);" class="dropdown-item notify-item">
            <i class="fe-user"></i>
            <span>حساب من</span>
        </a>


        <div class="dropdown-divider"></div>

        <!-- item-->
        <a href="{{ route('logout') }}" class="dropdown-item notify-item">
            <i class="fe-log-out"></i>
            <span>Logout</span>
        </a>

    </div>
</li>
