<header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light navigation">
                    <a class="navbar-brand" href="index.html">
                        <img src="images/logo.png" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto main-nav ">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{url('/')}}">Home</a>
                            </li>
                            <li class="nav-item dropdown dropdown-slide @@dashboard">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown"
                                    href="#!">Dashboard<span><i class="fa fa-angle-down"></i></span>
                                </a>

                                <!-- Dropdown list -->
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item @@dashboardPage"
                                            href="dashboard.html">Dashboard</a></li>
                                    <li><a class="dropdown-item @@dashboardMyAds"
                                            href="dashboard-my-ads.html">Dashboard My Ads</a></li>
                                    <li><a class="dropdown-item @@dashboardFavouriteAds"
                                            href="dashboard-favourite-ads.html">Dashboard Favourite Ads</a></li>
                                    <li><a class="dropdown-item @@dashboardArchivedAds"
                                            href="dashboard-archived-ads.html">Dashboard Archived Ads</a></li>
                                    <li><a class="dropdown-item @@dashboardPendingAds"
                                            href="dashboard-pending-ads.html">Dashboard Pending Ads</a></li>

                                    <li class="dropdown dropdown-submenu dropright">
                                        <a class="dropdown-item dropdown-toggle" href="#!" id="dropdown0501"
                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">Sub Menu</a>

                                        <ul class="dropdown-menu" aria-labelledby="dropdown0501">
                                            <li><a class="dropdown-item" href="index.html">Submenu 01</a></li>
                                            <li><a class="dropdown-item" href="index.html">Submenu 02</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown dropdown-slide @@pages">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    Pages <span><i class="fa fa-angle-down"></i></span>
                                </a>
                                <!-- Dropdown list -->
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item @@about" href="about-us.html">About
                                            Us</a></li>
                                    <li><a class="dropdown-item @@contact"
                                            href="contact-us.html">Contact Us</a></li>
                                    <li><a class="dropdown-item @@profile" href="user-profile.html">User
                                            Profile</a></li>
                                    <li><a class="dropdown-item @@404" href="404.html">404 Page</a>
                                    </li>
                                    <li><a class="dropdown-item @@package"
                                            href="package.html">Package</a></li>
                                    <li><a class="dropdown-item @@singlePage" href="single.html">Single
                                            Page</a></li>
                                    <li><a class="dropdown-item @@store" href="store.html">Store
                                            Single</a></li>
                                    <li><a class="dropdown-item @@blog" href="blog.html">Blog</a>
                                    </li>
                                    <li><a class="dropdown-item @@singleBlog" href="single-blog.html">Blog
                                            Details</a></li>
                                    <li><a class="dropdown-item @@terms"
                                            href="terms-condition.html">Terms &amp; Conditions</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown dropdown-slide @@listing">
                                <a class="nav-link dropdown-toggle" href="#!" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    Listing <span><i class="fa fa-angle-down"></i></span>
                                </a>
                                <!-- Dropdown list -->
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item @@category" href="category.html">Ad-Gird
                                            View</a></li>
                                    <li><a class="dropdown-item @@listView"
                                            href="ad-list-view.html">Ad-List View</a></li>

                                    <li class="dropdown dropdown-submenu dropleft">
                                        <a class="dropdown-item dropdown-toggle" href="#!" id="dropdown0201"
                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">Sub Menu</a>

                                        <ul class="dropdown-menu" aria-labelledby="dropdown0201">
                                            <li><a class="dropdown-item" href="index.html">Submenu 01</a></li>
                                            <li><a class="dropdown-item" href="index.html">Submenu 02</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto mt-10">
                            @if (Auth::guest())
                                <li class="nav-item">
                                    <a class="nav-link login-button" href="{{ route('login') }}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white add-button" href="{{route('register.page')}}"><i
                                            class="fa fa-plus-circle"></i> Get Registered</a>
                                </li>
                               
                            @else
                                <a class="nav-link login-button" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">Logout
                                    
                                    <i class="fas fa-sign-out-alt"></i>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @endif

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
