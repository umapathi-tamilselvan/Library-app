@extends('layouts.app')
@section('content')
<div class="card align-items-center" style="min-height: 100vh;">
    <div class="card" style="width: 50%; max-width: 500px;">
        <h5 class="card-header text-center">Add Book</h5>
        <div class="card-body p-4">
            <form action="{{ url('/book') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Book Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" class="form-control" id="author" name="author" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Book Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100">Add Book</button>
            </form>
        </div>
    </div>
</div>
@endsection
