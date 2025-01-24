@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-3 col-lg-2 text-dark sidebar p-0" style="position: fixed; top: 0; bottom: 0; height: 100vh; background-color: #d3d3d3;">
            <div class="py-3">
                <h4 class="text-center text-uppercase fw-bold mb-3" style="background-color: white;">Library Menu</h4>
                <ul class="nav flex-column">
                    <li class="nav-item mb-3">
                        <a class="nav-link text-dark {{ request()->is('/') ? 'active bg-primary rounded' : '' }}" href="{{ url('/home') }}">
                            <i class="bi bi-house-door fw-bold me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="nav-link text-dark {{ request()->is('books') ? 'active bg-primary rounded' : '' }}" href="{{ url('/books') }}">
                            <i class="bi bi-book me-2"></i> Books
                        </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="nav-link text-dark {{ request()->is('borrowers') ? 'active bg-primary rounded' : '' }}" href="{{ url('/borrowers') }}">
                            <i class="bi bi-people me-2"></i> Borrowers
                        </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="nav-link text-dark {{ request()->is('category') ? 'active bg-primary rounded' : '' }}" href="{{ url('/category') }}">
                            <i class="bi bi-people me-2"></i> Category
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="col-md-9 offset-md-3 col-lg-10 offset-lg-2">
            <div class="tab-pane fade show active" id="books" role="tabpanel">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">Books</h3>
                        <a href="{{ url('book/add') }}" class="btn btn-primary">Add Book</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Total Copies</th>
                                    <th>Available Copies</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($books as $book)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $book->name }}</td>
                                        <td>{{ $book->author }}</td>
                                        <td>{{ $book->category->name }}</td>
                                        <td>{{ $book->total_copies }}</td>
                                        <td>{{ $book->available_copies }}</td>
                                        <td>
                                            <img src="{{ asset($book->image ? 'storage/' . $book->image : 'images/default-book.png') }}"
                                                 alt="{{ $book->name }}" width="50" height="75">
                                        </td>
                                        <td>
                                            <form action="{{ url('/book/delete', $book->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center text-muted">No books found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {!! $books->withQueryString()->links('pagination::bootstrap-5') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
