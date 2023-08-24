<!--header-->
<header class="top-header">
    <nav class="navbar navbar-expand">
        <div class="left-topbar d-flex align-items-center">
            <a href="javascript:;" class="toggle-btn"> <i class="bx bx-menu"></i>
            </a>
        </div>
        <div class="flex-grow-1 search-bar">
            <h4>@yield('title')</h4>
        </div>
        @php
            $nama_user = auth()
                ->guard('user')
                ->user()->nama_user;
        @endphp
        <div class="right-topbar ms-auto">
            <ul class="navbar-nav">
                <li class="nav-item dropdown dropdown-user-profile">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                        data-bs-toggle="dropdown">
                        <div class="d-flex user-box align-items-center">
                            <div class="user-info">
                                <p class="user-name mb-0">{{ $nama_user }}</p>
                                <p class="designattion mb-0"><small
                                        class="bx bxs-circle me-1 chart-online"></small>Online</p>
                            </div>
                            <div class="chat-user-online">
                                <img src="/assets/images/icons/user.png" class="user-img rounded-circle"
                                    alt="user avatar">
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        {{-- <div class="dropdown-divider mb-0"></div> --}}
                        <a class="dropdown-item" href="{{ route('landing.proses.logout') }}"><i
                                class="bx bx-log-out"></i><span>Logout</span></a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!--end header-->
