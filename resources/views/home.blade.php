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
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-left: 25%; padding-top: 20px;">
            <div class="py-4">
                <!-- Stats Cards -->
                <div class="row g-4">
                    <!-- Total Books Card -->
                    <div class="col-md-3 col-sm-6">
                        <div class="card bg-light-success hoverable">
                            <div class="card-body text-center">
                                <h5 class="text-primary fw-bold"><i class="bi bi-book-fill"></i> Total Books</h5>
                                <p class="fs-3 fw-bold">{{ $bookCount }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Borrowers Card -->
                    <div class="col-md-3 col-sm-6">
                        <div class="card bg-light-info hoverable">
                            <div class="card-body text-center">
                                <h5 class="text-success fw-bold"><i class="bi bi-people-fill"></i> Borrowers</h5>
                                <p class="fs-3 fw-bold">{{ $borrowerCount }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
