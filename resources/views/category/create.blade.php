@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
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
        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-left: 25%; padding-top: 20px;">
            
            <div class="py-4">
                <div class="container" style="max-width: 600px;">
                    <div class="card shadow-lg mb-4">
                        <div class="card-header">
                            <h3 class="mb-0">Add New Category</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/category') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="name" class="form-label">Category</label>
                                    <input type="text" class="form-control" id="name"  value="{{ old('name') }}"  name="name" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
