

@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="container bg-light sidebar shadow-sm">
            <h2 class="text-center">Add book</h2>
            <form action="{{url('/book')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Book Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" class="form-control" id="author" name="author" required>
                </div>

                <button type="submit" class="btn btn-primary">Add Book</button>
            </form>

        </div>
    </div>


    </div>
</div>



@endsection
