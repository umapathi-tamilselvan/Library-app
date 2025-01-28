@extends('layouts.app')

@section('content')
<div class="container-fluid" style="min-height: 100vh;">
    <div class="row">
        <!-- Sidebar -->
        <nav class="card-body col-md-3 col-lg-2 p-0 mt-0 shadow-lg" style="background-color: #f5f5f5; position: fixed; top: 0; left: 0; width: 300px; height: 100vh; border-right: 1px solid #e0e0e0;">
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
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-left: 25%; padding-top: 20px;">
                    <!-- Search Bar on Top (Fixed) -->
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
            <div class="tab-pane fade show active" id="borrowers" role="tabpanel">

                <div class="card shadow-lg">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">Borrower</h3>
                        <a href="{{ url('borrower/add') }}" class="btn btn-success mt-3">Add New Borrower</a>
                    </div>

                    <div class="card-body">
                        <!-- Borrowers Table -->
                        <div class="table-responsive">
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
                                            <form action="{{ url('/borrower/delete', $borrower->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">No borrowers found.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {!! $borrowers->withQueryString()->links('pagination::bootstrap-5') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
