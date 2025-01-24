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
                <div class="container" style="max-width: 600px;">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-0">Add New Book</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/book') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <!-- Book Name -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Book Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Author -->
                                <div class="mb-3">
                                    <label for="author" class="form-label">Author</label>
                                    <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{ old('author') }}" required>
                                    @error('author')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Category -->
                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Category</label>
                                    <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                                        <option value="" disabled selected>Select a Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Total Copies -->
                                <div class="mb-3">
                                    <label for="total_copies" class="form-label">Total Copies</label>
                                    <input type="number" class="form-control @error('total_copies') is-invalid @enderror" id="total_copies" name="total_copies" value="{{ old('total_copies') }}" required>
                                    @error('total_copies')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Available Copies -->
                                <div class="mb-3">
                                    <label for="available_copies" class="form-label">Available Copies</label>
                                    <input type="number" class="form-control @error('available_copies') is-invalid @enderror" id="available_copies" name="available_copies" value="{{ old('available_copies') }}" required>
                                    @error('available_copies')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Book Image -->
                                <div class="mb-3">
                                    <label for="image" class="form-label">Book Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary w-100">Add Book</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
