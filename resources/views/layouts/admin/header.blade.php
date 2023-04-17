<header class="bg-neutral" id="header-main">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg shadow navbar-light" id="navbar-main">
        <div class="container">
            <!-- Brand -->
            <a href="#">
                <img src="{{ Vite::asset('resources/vendor/jk-network-static/img/logo.svg') }}" alt="logo">
            </a>
            <!-- Avatar menu -->
            <div class="order-lg-4 ml-lg-3">
                @auth('admin')
                <div>
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        @method('POST')
                        {{ auth()->user()->fullname }}
                        <span class="divider-vertical pl-1">
                            <button class="btn btn-facebook py-0 px-2" type="submit">
                                {{ __('Logout') }}
                            </button>
                        </span>
                    </form>
                </div>
                @else
                <a href="{{ route('admin.login') }}">
                    {{ __('Login') }}
                </a>
                @endauth
            </div>
        </div>
    </nav>
</header>
