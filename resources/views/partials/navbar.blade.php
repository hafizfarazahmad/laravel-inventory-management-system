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
            {{-- <li class="c-header-nav-item dropdown d-md-down-none mr-2">
                <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="bi bi-bell" style="font-size: 20px;"></i>
                    <span class="badge badge-pill badge-danger">
                        @php
                            $low_quantity_products = \App\Models\Product::select('id','stock','minimum_stock',)
                                ->whereColumn('stock', '<=', 'minimum_stock')
                                ->get();
                            echo $low_quantity_products->count();
                        @endphp
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg pt-0">
                    <div class="dropdown-header bg-light">
                        <strong>{{ $low_quantity_products->count() }} Notifications</strong>
                    </div>
                    @forelse($low_quantity_products as $product)
                        <a class="dropdown-item" href="{{ route('product.show', $product->id) }}">
                            <i class="bi bi-hash mr-1 text-primary"></i> Product: "{{ $product->product_name }}" is low
                            in quantity!
                        </a>
                    @empty
                        <a class="dropdown-item" href="#">
                            <i class="bi bi-app-indicator mr-2 text-danger"></i> No notifications available.
                        </a>
                    @endforelse
                </div>
            </li> --}}
            <li class="nav-item dropdown">
                <a class="nav-link" data-bs-toggle="dropdown" href="#" aria-label="Notifications: 15 unread">
                    <i class="bi bi-bell-fill"></i>

                    <span class="navbar-badge badge text-bg-warning">
                        @php
                            $low_quantity_products = \App\Models\Product::select('id', 'name', 'stock', 'minimum_stock')
                                ->whereColumn('stock', '<=', 'minimum_stock')
                                ->get();
                            echo $low_quantity_products->count();
                        @endphp
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <div class="dropdown-header bg-light">
                        <strong>{{ $low_quantity_products->count() }} Notifications</strong>
                    </div>
                    <div class="dropdown-divider"></div>
                    @forelse($low_quantity_products as $product)
                        <a class="dropdown-item" href="{{ route('product.show', $product->id) }}">
                            <i class="bi bi-hash mr-1 text-primary"></i> Product: "{{ $product->name }}" is low
                            in quantity!
                        </a>
                    @empty
                        <a class="dropdown-item" href="#">
                            <i class="bi bi-app-indicator mr-2 text-danger"></i> No notifications available.
                        </a>
                    @endforelse
                </div>
            </li>

            <li class="nav-item dropdown user-menu">
                @php
                    $setting = \App\Models\CompanySetting::first();
                @endphp
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img src="{{ asset('uploads/logos/' . $setting->logo) }}" class="user-image img-circle elevation-2"
                        alt="User Image" style="width: 30px; height: 30px; object-fit: cover;">
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
