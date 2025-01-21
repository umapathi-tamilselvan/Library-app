@extends('layouts.app')
@section('content')
<div class="card align-items-center" style="min-height: 100vh;">
    <div class="card" style="width: 50%; max-width: 500px;">
        <h5 class="card-header text-center">Add Borrower</h5>
        <div class="card-body p-4">
            
            <form action="{{ url('/borrower') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Borrower Name</label>
                    <input type="text" class="form-control" id="name"  value="{{ old('name') }}"  name="name" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="mobile_no" class="form-label">Mobile Number</label>
                    <input type="number" class="form-control @error('mobile_no') is-invalid @enderror" id="mobile_no" name="mobile_no" value="{{ old('mobile_no') }}" required>
                    @error('mobile_no')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">Add Borrower</button>
            </form>
        </div>
    </div>
</div>
@endsection
