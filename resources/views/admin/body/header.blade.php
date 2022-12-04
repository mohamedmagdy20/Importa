  <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="logo-sm" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('backend/assets/images/logo-dark.png') }}" alt="logo-dark" height="20">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="logo-sm-light" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('backend/assets/images/logo-light.png') }}" alt="logo-light" height="20">
                                </span>
                            </a>
                        </div>

    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
        <i class="ri-menu-2-line align-middle"></i>
    </button>

    
</div>

<div class="d-flex">


    <div class="dropdown d-inline-block lang-dropdown">
        <button type="button" class="btn header-item waves-effect" id="page-header-lang-dropdown"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{-- <img class="rounded-circle header-profile-user" src="{{ url('upload/no_image.jpg') }}"
                alt="Header Avatar"> --}}
                {{-- <a class="text-danger fs-4 mt-2">Language</a> --}}
            <span class="d-none d-xl-inline-block ms-1 text-danger">Langauage</span>
            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
            <!-- item-->
            <a class="dropdown-item" href="{{route('set.lang','ar')}}"> Arabic</a>
            <a class="dropdown-item" href="{{route('set.lang','en')}}">English</a>
            <div class="dropdown-divider"></div>

           
        </div>
    </div>


    <div class="dropdown d-inline-block user-dropdown">
        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="rounded-circle header-profile-user" src="{{ url('upload/no_image.jpg') }}"
                alt="Header Avatar">
            <span class="d-none d-xl-inline-block ms-1">admin</span>
            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
            <!-- item-->
            <a class="dropdown-item" href=""><i class="ri-user-line align-middle me-1"></i> الحساب</a>
            <a class="dropdown-item" href=""><i class="ri-wallet-2-line align-middle me-1"></i> تغير كلمه المرور</a>
            <div class="dropdown-divider"></div>

            <a class="dropdown-item text-danger" href=""><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
        </div>
    </div>
    <div class="dropdown d-none d-lg-inline-block ms-1">
        <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
            <i class="ri-fullscreen-line"></i>
        </button>
    </div>

    {{-- @php
    $id = Auth::user()->id;
    $adminData = App\Models\User::find($id);
    @endphp --}}

    

                        
            
                    </div>
                </div>
            </header>