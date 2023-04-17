<header class="header">
    <nav class="navbar navbar-main navbar-expand-lg navbar-light" id="navbar-main">
        <div class="container">
            <!-- Brand-->
            <a class="navbar-brand" href="/">
                <img src="{{ Vite::asset('resources/vendor/jk-network-static/img/logo.png') }}" alt="logo">
            </a>
            <!-- Toggler-->
            <button class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbar-main-collapse"
                aria-controls="navbar-main-collapse"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Collapse-->
            <div class="collapse navbar-collapse navbar-collapse-overlay" id="navbar-main-collapse">
                <!-- Toggler-->
                <div class="position-relative">
                    <button class="navbar-toggler"
                        type="button"
                        data-toggle="collapse"
                        data-target="#navbar-main-collapse"
                        aria-controls="navbar-main-collapse"
                        aria-expanded="false"
                        aria-label="Toggle navigation">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            width="1em"
                            height="1em"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <!-- Main navigation-->
                <ul class="navbar-nav ml-lg-auto">
                    <li class="nav-item nav-item-spaced d-none d-lg-block">
                        <a class="nav-link"
                            href="#">
                            Home
                        </a>
                    </li>
                    <!-- About Menu-->
                    <li class="nav-item nav-item-spaced dropdown dropdown-animate" data-toggle="hover">
                        <a class="nav-link"
                            data-toggle="dropdown"
                            href="#"
                            aria-haspopup="true"
                            aria-expanded="false">
                            About
                        </a>
                    </li>
                    <!-- Blogs menu-->
                    <li class="nav-item nav-item-spaced dropdown dropdown-animate" data-toggle="hover">
                        <a class="nav-link"
                            href="#"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                            Blogs
                        </a>
                    </li>
                    <!-- FAQ menu-->
                    <li class="nav-item nav-item-spaced dropdown dropdown-animate" data-toggle="hover">
                        <a class="nav-link"
                            href="#"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                            FAQ
                        </a>
                    </li>
                    <!-- Employer Menu-->
                    <li class="nav-item nav-item-spaced dropdown dropdown-animate" data-toggle="hover">
                        <a class="nav-link"
                            href="#"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                            Employer
                        </a>
                    </li>
                    <!-- Jobseeker Menu-->
                    <li class="nav-item nav-item-spaced dropdown dropdown-animate" data-toggle="hover">
                        <a class="nav-link"
                            data-toggle="dropdown"
                            href="#"
                            aria-haspopup="true"
                            aria-expanded="false">
                            Jobseeker
                        </a>
                    </li>
                </ul>
                <!-- Right navigation-->
                <ul class="navbar-nav align-items-lg-center d-none d-lg-flex ml-lg-auto">
                    <li class="nav-item">
                        <a class="button"
                            href="{{ route('login') }}">
                            <span class="btn-inner--text">Log in / Register</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>