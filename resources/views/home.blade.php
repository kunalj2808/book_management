@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Books List') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="GET" action="{{ route('home') }}" class="mb-4">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search by title or author" value="{{ request('search') }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>

                    @if($books->isNotEmpty())
                        <ul class="list-group mb-4">
                            @foreach($books as $book)
                                <li class="list-group-item">
                                    <strong>{{ $book->title }}</strong> by {{ $book->author }} <br>
                                    <small>{{ $book->description }}</small> <br>
                                    
                                    <!-- Rating functionality -->
                                    <form method="POST" action="{{ route('books.rate', $book->id) }}">
                                        @csrf
                                        <div class="form-group mt-2">
                                            <label for="rating">Rate this book:</label>
                                            <select name="rating" id="rating" class="form-control w-auto d-inline-block">
                                                <option value="">Choose</option>
                                                @for ($i = 0.9; $i <= 5.0; $i += 0.1)
                                                <option value="{{ number_format($i, 1) }}" {{ number_format($book->rating, 1) == number_format($i, 1) ? 'selected' : '' }}>
                                                    {{ number_format($i, 1) }}
                                                </option>
                                            @endfor
                                            
                                            </select>
                                            <button type="submit" class="btn btn-sm btn-success">Rate</button>
                                        </div>
                                    </form>

                                    <!-- Display current rating -->
                                    <p>Current Rating: {{ $book->rating }} / 5</p>

                                    <!-- Comment section -->
                                    <h5>Comments</h5>
                                    @if($book->comments->isNotEmpty())
                                        <ul class="list-group mb-3">
                                            @foreach($book->comments as $comment)
                                                <li class="list-group-item">
                                                    <strong>{{ $comment->user->name }}</strong>: {{ $comment->content }} <br>
                                                    <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>No comments yet</p>
                                    @endif

                                    <!-- Add a new comment -->
                                    <form method="POST" action="{{ route('books.comment', $book->id) }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="comment">Leave a comment:</label>
                                            <textarea name="comment" id="comment" class="form-control" rows="3" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit Comment</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center">
                            {{ $books->links() }}
                        </div>
                    @else
                        <p>No books found</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
