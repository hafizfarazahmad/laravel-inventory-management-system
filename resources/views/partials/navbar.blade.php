<nav class="app-header navbar navbar-expand bg-body">
    <div class="container-fluid"> <!-- Left Side -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button" aria-label="Toggle sidebar">
                    <i class="bi bi-list"></i>
                </a>
            </li>
        </ul>

        <!-- Right Side -->
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <li class="user-footer">
                        <a href="{{ route('profile.edit') }}" class="btn btn-outline-secondary">
                            Profile
                        </a>

                        <form action="{{ route('logout') }}" method="POST" class="d-inline float-end">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">
                                Sign out
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>

    </div>
</nav>
