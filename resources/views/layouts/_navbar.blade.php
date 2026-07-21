<header class="navbar navbar-expand-md navbar-light d-none d-lg-flex shadow-sm"
    style="background: white; border-bottom:1px solid #e2e8f0;">

    <div class="container-xl">

        <!-- Left -->
        <div class="d-flex align-items-center">

            <h3 class="mb-0 fw-bold"
                style="color:#0f172a; font-size:22px;">

                Dashboard SmartStock UMKM

            </h3>

        </div>

        <!-- Right -->
        <div class="navbar-nav flex-row order-md-last">

            <div class="nav-item dropdown">

                <a href="#"
                    class="nav-link d-flex align-items-center text-reset p-0"
                    data-toggle="dropdown">

                    <!-- Avatar -->
                    <img src="{{ Auth::user()->avatar }}"
                        class="avatar rounded-circle"
                        style="border:2px solid #10b981;" />

                    <!-- User Info -->
                    <div class="d-none d-xl-block pl-3">

                        <div style="font-weight:600; color:#0f172a;">

                            {{ Auth::user()->name }}

                        </div>

                        <div class="small text-muted">

                            {{ Auth::user()->roles->pluck('name')[0] }}

                        </div>

                    </div>

                </a>

                <!-- Dropdown -->
                <div class="dropdown-menu dropdown-menu-right shadow border-0"
                    style="border-radius:12px;">

                    <div class="px-3 py-2 border-bottom">

                        <div class="fw-bold">

                            {{ Auth::user()->name }}

                        </div>

                        <div class="small text-muted">

                            {{ Auth::user()->email }}

                        </div>

                    </div>

                    <a class="dropdown-item py-2"
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">

                        <i class="fas fa-sign-out-alt mr-2 text-danger"></i>

                        Logout

                        <form id="logout-form"
                            action="{{ route('logout') }}"
                            method="POST"
                            class="d-none">

                            @csrf

                        </form>

                    </a>

                </div>

            </div>

        </div>

    </div>
</header>
