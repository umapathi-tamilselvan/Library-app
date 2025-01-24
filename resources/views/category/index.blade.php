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
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="py-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Category</h3>
                    <a href="{{ url('category/add') }}" class="btn btn-primary">Add Category</a>
                </div>
                <div class="container" style="max-width: 600px;">
                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <form action="{{ url('category/delete', $category->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">No categories available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
