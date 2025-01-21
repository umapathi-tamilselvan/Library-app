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
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-left: 25%; padding-top: 20px;">
            <div class="tab-pane fade show active" id="borrowers" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Borrowers</h3>
                    </div>
                    <div class="card-body">
                        <!-- Borrowers Table -->
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile Number</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($borrowers as $borrower)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $borrower->name }}</td>
                                    <td>{{ $borrower->email }}</td>
                                    <td>{{ $borrower->mobile_no }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm">View</button>
                                        <button class="btn btn-danger btn-sm">Remove</button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">No borrowers found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <!-- Add Borrower Button -->
                        <a href="{{ url('borrower/add') }}" class="btn btn-success mt-3">Add New Borrower</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
