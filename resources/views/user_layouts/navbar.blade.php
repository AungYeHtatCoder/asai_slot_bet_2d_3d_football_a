<!-- navbar section -->
<div id="navbar" class="fixed-top">
    <div class="row">
        <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3 col-12 py-2 nav-border-purple" id="top-nav">
            <div class="row">
                <div class="col-4">
                    <a href="{{ url('/') }}" class="text-decoration-none">
                        <div class="d-flex">
                            <img src="{{ asset('assets/img/logo.png') }}" class="d-block img-fluid" width="50px" alt="">
                        </div>
                    </a>
                </div>
                <div class="col-4">
                    <a href="{{ url('/') }}" class="text-decoration-none">
                        <div class="d-flex justify-content-center">
                            <span class="text-warning fw-bold ms-2" style="margin-top: 10px;font-family:Source Sans Pro, sans-serif; font-size: 22px; text-shadow: 2px 3px 4px #545454;">DELIGHT</span>
                        </div>
                    </a>
                </div>
                <div class="col-4">
                    <div class="d-flex justify-content-end">
                        @guest
                        <div class="mt-2">
                            <a href="{{ route('login') }}" class="btn btn-sm btn-purple text-white me-2">
                                <i class="fas fa-unlock me-2"></i>
                                LOGIN
                            </a>
                        </div>
                        @endguest
                        @auth
                        <div class="mt-2">
                            <i class="fas text-white fa-bell me-1"></i>
                            <button class="btn sidebarToggle">
                                <i class="fas fa-bars text-white"></i>
                            </button>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
            {{-- <div class="d-flex justify-content-between px-3">
                <div></div>
                <a href="{{ url('/') }}" class="text-decoration-none">
            <div class="d-flex">
                <img src="{{ asset('assets/img/logo-v.png') }}" width="150px" alt="">
            </div>
            </a>
            @guest
            <div class="mt-2">
                <a href="{{ route('login') }}" class="btn btn-sm btn-purple text-white me-2">
                    <i class="fas fa-unlock me-2"></i>
                    LOGIN
                </a>
            </div>
            @endguest
            @auth
            <div class="mt-2">
                <i class="fas text-white fa-bell me-1"></i>
                <button class="btn sidebarToggle">
                    <i class="fas fa-bars text-white"></i>
                </button>
            </div>
            @endauth
        </div> --}}
    </div>
</div>
</div>
<!-- offcanvas start -->
@auth
<div class="sidebar" id="sidebar" style="padding-top: 70px;">
    <div class="container-fluid py-3 rounded-4 shadow">
        <!-- after login view -->
        <div class="d-flex justify-content-between">
            @if (Auth::user()->profile)
            <img src="{{ Auth::user()->profile }}" alt="">
            @else
            <i class="fa-regular fa-user-circle text-purple fa-2x"></i>
            @endif

            <div>
                <a href="#" class="login-btn">
                    {{ Auth::user()->name }}
                </a>
               
                <small class="text-purple">
                    <i class="fas fa-wallet text-purple"></i> :  MMK 
                </small>
            </div>
        </div>
        <!-- after login -->
    </div>
    <!-- nav-links -->
    <div class="nav-links" id="sideLink">
        @can('user_access')
        <a href="{{ route('home') }}" class="link shadow">
            <div class="d-flex">
                <i class="fas fa-dashboard d-block me-2"></i>
                <p class="py-0">Admin Dashboard</p>
            </div>
        </a>
        @endcan
        <a href="#" class="link shadow">
            <div class="d-flex">
                <i class="fas fa-award d-block me-2"></i>
                <p class="py-0">ကံထူးရှင်များ</p>
            </div>
        </a>
        <a href="#" class="link shadow">
            <div class="d-flex">
                <i class="fas fa-award d-block me-2"></i>
                <p class="py-0">SlotGame</p>
            </div>
        </a>
        <a href="./sidebar/twoDthreeDhistory.html" class="link shadow">
            <div class="d-flex">
                <i class="fas fa-list d-block me-2"></i>
                <p class="py-0">ထွက်ဂဏန်းများ</p>
            </div>
        </a>
        <a href="#" class="link shadow">
            <div class="d-flex">
                <i class="fas fa-calendar d-block me-2"></i>
                <p class="py-0">3D ထီထိုးမှတ်တမ်း</p>
            </div>
        </a>
        <a href="#" class="link shadow">
            <div class="d-flex">
                <i class="fas fa-tower-broadcast d-block me-2"></i>
                <p class="py-0">2D Live</p>
            </div>
        </a>
        <a href="#" class="link shadow">
            <div class="d-flex">
                <i class="fas fa-calendar d-block me-2"></i>
                <p class="py-0">2D Calendar</p>
            </div>
        </a>
        <a href="#" class="link shadow">
            <div class="d-flex">
                <i class="fas fa-calendar d-block me-2"></i>
                <p class="py-0">2D Holiday</p>
            </div>
        </a>
        <a href="{{ url('/user/three-d-play-index') }}" class="link shadow">
            <div class="d-flex">
                <i class="fas fa-tower-broadcast d-block me-2"></i>
                <p class="py-0">3D Live</p>
            </div>
        </a>

        <a href="" class="link shadow" onclick="event.preventDefault();
     document.getElementById('logout-form').submit();">
            <div class="d-flex">
                <i class="fas fa-right-from-bracket d-block me-2"></i>
                <p class="py-0">အကောင့်ထွက်ရန်</p>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </a>
    </div>
    <!-- nav-links -->
</div>
@endauth
<!-- offcanvas end -->
<!-- navbar section -->
