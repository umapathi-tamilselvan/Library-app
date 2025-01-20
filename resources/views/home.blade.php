@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">{{ __('Library Dashboard') }}</div>
                <div class="row  justify-content-center">
                    <div class="col-md-4 mt-4">
                        <div class="card shadow border-0">
                            <div class="card-body text-center">
                                <h5 class="card-title text-primary"><i class="bi bi-book-fill"></i> Total Books</h5>
                                <p class="card-text fs-4">{{$bookCount}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-4">
                        <div class="card shadow border-0">
                            <div class="card-body text-center">
                                <h5 class="card-title text-success"><i class="bi bi-people-fill"></i> Borrowers</h5>
                                <p class="card-text fs-4"></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Tabs Navigation -->
            <ul class="nav nav-tabs mb-3" id="libraryTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="books-tab" data-bs-toggle="tab" data-bs-target="#books" type="button" role="tab" aria-controls="books" aria-selected="true">
                        Books
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="borrowers-tab" data-bs-toggle="tab" data-bs-target="#borrowers" type="button" role="tab" aria-controls="borrowers" aria-selected="false">
                        Borrowers
                    </button>
                </li>
            </ul>

            <!-- Tabs Content -->
            <div class="tab-content" id="libraryTabsContent">
                <!-- Books Section -->
                <div class="tab-pane fade show active" id="books" role="tabpanel" aria-labelledby="books-tab">
                    <div class="card mb-4">
                        <div class="card-header">{{ __('Books') }}</div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($books as $book)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{ $book->name }}</td>
                                        <td>{{ $book->author }}</td>

                                        <td>
                                            <a href="{{ url('/book/edit', $book->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ url('/book/delete', $book->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">No books found.</td>
                                    </tr>
                                @endforelse

                                </tbody>
                            </table>
                            <a href="{{url('book/add')}}" class="btn btn-primary">Add Book</a>
                        </div>
                    </div>
                </div>

                <!-- Borrowers Section -->
                <div class="tab-pane fade" id="borrowers" role="tabpanel" aria-labelledby="borrowers-tab">
                    <div class="card">
                        <div class="card-header">{{ __('Borrowers') }}</div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Book Borrowed</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Example data -->
                                    <tr>
                                        <td>1</td>
                                        <td>John Doe</td>
                                        <td>john@example.com</td>
                                        <td>The Great Gatsby</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">View</button>
                                            <button class="btn btn-danger btn-sm">Remove</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Jane Smith</td>
                                        <td>jane@example.com</td>
                                        <td>1984</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm">View</button>
                                            <button class="btn btn-danger btn-sm">Remove</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button class="btn btn-success">Add New Borrower</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
