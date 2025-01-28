@extends('layouts.app')

@section('content')
<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-row">
        <!-- Sidebar -->
        <nav class="card-body col-md-3 col-lg-2 p-0 mt-0  shadow-lg" style="background-color: #f5f5f5; position: fixed; top: 0; left: 0; width: 300px; height: 100vh; border-right: 1px solid #e0e0e0;">
            <a href="{{ url('/home') }}" class="d-block text-center fw-bold mb-4" style="background-color: #ffffff; padding: 15px; border-bottom: 1px solid #ddd; text-decoration: none;">
                <h4 class="mb-0">Library Menu</h4>
            </a>
            <ul class="nav flex-column px-3">
                @foreach([
                    ['url' => '/home', 'icon' => 'bi-house-door', 'label' => 'Dashboard'],
                    ['url' => '/books', 'icon' => 'bi-book', 'label' => 'Books'],
                    ['url' => '/borrowers', 'icon' => 'bi-people', 'label' => 'Borrowers'],
                    ['url' => '/category', 'icon' => 'bi-folder', 'label' => 'Category']
                ] as $menuItem)
                    <li class="nav-item mb-2">
                        <a class="nav-link d-flex align-items-center {{ request()->is(ltrim($menuItem['url'], '/')) ? 'active bg-primary text-white' : 'text-dark' }}"
                           href="{{ url($menuItem['url']) }}"
                           style="padding: 12px 15px; border-radius: 8px; font-size: 14px;">
                            <i class="bi {{ $menuItem['icon'] }} me-2 fs-5"></i>
                            <span>{{ $menuItem['label'] }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>


        <!-- Main Content -->
        <div class="col-md-9 offset-md-3 col-lg-10 offset-lg-2 px-md-4" style="margin-left: 300px; padding-top: 20px;">
            <div class="card">
                <div class="d-flex justify-content-center mb-4" style="position: fixed; top: 10px; left: 50%; transform: translateX(-50%); z-index: 999; width: 500px;">
                    <form action="{{ url('/search') }}" method="GET" class="w-100">
                        <div class="input-group">
                            <input type="text" name="query" class="form-control" placeholder="Search..." value="{{ request('query') }}" style="min-width: 200px;">
                            <button class="btn btn-outline-primary" type="submit">
                                <i class="bi bi-search fs-5"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Books</h3>
                    <a href="{{ url('book/add') }}" class="btn btn-primary btn-sm">Add Book</a>
                </div>

                <div class="card-body">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="booksGrid">
                        @forelse ($books as $book)
                            <div class="col">
                                <div class="card shadow-sm border-0 rounded-3 hover-shadow-lg" style="transition: all 0.3s ease;">
                                    <img src="{{ asset($book->image ? 'storage/' . $book->image : 'images/default-book.png') }}" class="card-img-top" alt="{{ $book->name }}" width="150" height="200">
                                    <div class="card-body">
                                        <h5 class="card-title text-dark fs-5">{{ $book->name }}</h5>
                                        <p class="card-text text-muted"><strong>Author:</strong> {{ $book->author }}</p>
                                        <p class="card-text text-muted"><strong>Category:</strong> {{ $book->category->name }}</p>
                                        <p class="card-text text-muted"><strong>Total Copies:</strong> {{ $book->total_copies }}</p>
                                        <p class="card-text text-muted"><strong>Available Copies:</strong> {{ $book->available_copies }}</p>
                                        <div class="d-flex justify-content-between">
                                            <form action="{{ url('/book/delete', $book->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <p class="text-center text-muted">No books found.</p>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-4">
                        {!! $books->withQueryString()->links('pagination::bootstrap-5') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
