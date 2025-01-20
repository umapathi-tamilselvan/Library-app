@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mb-4">
                <div class="card-header text-center fs-4">{{ __('Library Dashboard') }}</div>
                <div class="card-body">

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                    <div class="row d-flex justify-content-around">
                        <!-- Total Books Card -->
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="card shadow border-0">
                                <div class="card-body text-center">
                                    <h5 class="card-title text-primary"><i class="bi bi-book-fill"></i> Total Books</h5>
                                    <p class="card-text fs-4">{{ $bookCount }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- Borrowers Card -->
                        <div class="col-md-3 col-sm-6 mb-4">
                            <div class="card shadow border-0">
                                <div class="card-body text-center">
                                    <h5 class="card-title text-success"><i class="bi bi-people-fill"></i> Borrowers</h5>
                                    <p class="card-text fs-4">{{ $borrowerCount ?? 0 }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabs Navigation -->
            <ul class="nav nav-tabs mb-3 justify-content-center" id="libraryTabs" role="tablist">
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
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($books as $book)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $book->name }}</td>
                                        <td>{{ $book->author }}</td>
                                        <td>
                                            @if($book->image)
                                                <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->name }}" width="50" height="75">
                                            @else
                                                <img src="{{ asset('images/default-book.png') }}" alt="Default Book Image" width="50" height="75">
                                            @endif
                                        </td>

                                        <td>
                                            <form action="{{ url('/book/delete', $book->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">No books found.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <a href="{{ url('book/add') }}" class="btn btn-primary mt-3">Add Book</a>
                        </div>
                    </div>
                </div>

                <!-- Borrowers Section -->
                <div class="tab-pane fade" id="borrowers" role="tabpanel" aria-labelledby="borrowers-tab">
                    <div class="card">
                        <div class="card-header">{{ __('Borrowers') }}</div>
                        <div class="card-body">
                            <table class="table table-striped text-center">
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
                                    @forelse ($borrowers as $borrower)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $borrower->name }}</td>
                                        <td>{{ $borrower->email }}</td>
                                        <td>{{ $borrower->book_borrowed }}</td>
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
                            <a href="{{ url('borrower/add') }}" class="btn btn-success mt-3">Add New Borrower</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
