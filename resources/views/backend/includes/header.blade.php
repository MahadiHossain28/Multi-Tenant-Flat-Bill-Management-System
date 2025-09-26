@php
    $navItems = collect([
        [
            'title' => 'Dashboard',
            'route' => route('dashboard'),
            'active' => request()->is('dashboard*'),
            'roles' => 'admin|house_owner',
        ],
        [
            'title' => 'House Owner',
            'route' => route('owner.index'),
            'active' => request()->is('house/owner*'),
            'roles' => 'admin',
        ],
        [
            'title' => 'Flat',
            'route' => route('flat.index'),
            'active' => request()->is('flat*'),
            'roles' => 'admin|house_owner',
        ],
        [
            'title' => 'Tenant',
            'route' => route('tenant.index'),
            'active' => request()->is('tenant*'),
            'roles' => 'admin',
        ],
        [
            'title' => 'Bill Category',
            'route' => route('bill-category.index'),
            'active' => request()->is('bill-category*'),
            'roles' => 'admin|house_owner',
        ],
    ])->map(fn($item) => (object) $item);
@endphp

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid w-100 justify-content-between px-4">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img class="system_logo" src="{{ asset('assets/img/logo.png') }}" alt="logo" width="50">
            <h1 class="ms-3 mb-0 fs-4">{{ config('app.name') }}</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @auth
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    @foreach($navItems as $item)
                        @hasanyrole($item->roles)
                            <li class="nav-item">
                                <a class="nav-link {{ $item->active ? 'active' : ''  }}" href="{{ $item->route }}">{{ $item->title }}</a>
                            </li>
                        @endhasanyrole
                    @endforeach
                </ul>
            </div>
            <ul class="navbar-nav ms-3">
                <li class="nav-item dropdown-center">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('assets/img/admin.jpg') }}" alt="" class="profile_img rounded-circle" width="40" height="40">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        @endauth
    </div>
</nav>
