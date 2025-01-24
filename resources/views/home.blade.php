@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-3 col-lg-2 text-dark sidebar p-0" style="position: fixed; top: 0; bottom: 0; height: 100vh; background-color: #d3d3d3;">
            <div class="py-3">
                <h4 class="text-center text-uppercase fw-bold mb-3" style="background-color: white;">Library Menu</h4>
                <ul class="nav flex-column">
                    @foreach([
                        ['url' => '/home', 'icon' => 'bi-house-door', 'label' => 'Dashboard'],
                        ['url' => '/books', 'icon' => 'bi-book', 'label' => 'Books'],
                        ['url' => '/borrowers', 'icon' => 'bi-people', 'label' => 'Borrowers'],
                        ['url' => '/category', 'icon' => 'bi-people', 'label' => 'Category']
                    ] as $menuItem)
                    <li class="nav-item mb-3">
                        <a class="nav-link text-dark {{ request()->is(ltrim($menuItem['url'], '/')) ? 'active bg-primary rounded' : '' }}" href="{{ url($menuItem['url']) }}">
                            <i class="bi {{ $menuItem['icon'] }} fw-bold me-2"></i> {{ $menuItem['label'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-left: 25%; padding-top: 20px;">
            <div class="py-4">
                <!-- Stats Cards -->
                <div class="row g-4">
                    @foreach([
                        ['bgClass' => 'bg-light-success', 'icon' => 'bi-book-fill', 'title' => 'Total Books', 'count' => $bookCount, 'textClass' => 'text-primary'],
                        ['bgClass' => 'bg-light-warning', 'icon' => 'bi-book-half', 'title' => 'Available Books', 'count' => $availableBookCount, 'textClass' => 'text-info'],
                        ['bgClass' => 'bg-light-info', 'icon' => 'bi-people-fill', 'title' => 'Borrowers', 'count' => $borrowerCount, 'textClass' => 'text-success']
                    ] as $card)
                    <div class="col-md-3 col-sm-6">
                        <div class="card {{ $card['bgClass'] }} hoverable">
                            <div class="card-body text-center">
                                <h5 class="{{ $card['textClass'] }} fw-bold"><i class="bi {{ $card['icon'] }}"></i> {{ $card['title'] }}</h5>
                                <p class="fs-3 fw-bold">{{ $card['count'] }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Category-wise Books -->
                <div class="row g-4 mt-4">
                    @foreach($categories as $category)
                    <div class="col-md-3 col-sm-6">
                        <div class="card bg-light-primary hoverable">
                            <div class="card-body text-center">
                                <h5 class="text-dark fw-bold"><i class="bi bi-folder-fill"></i> {{ $category->name }}</h5>
                                <p class="fs-3 fw-bold">
                                    {{ $category->books ? $category->books->count() : 0 }}
                                </p>
                                <small class="text-muted">Books in this category</small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
