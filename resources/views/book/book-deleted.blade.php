@extends('layouts.main')

@section('title', 'Book Deleted')

@section('content')
    <h1>Book Temp List</h1>

    <div class="mt-3">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>
    
    <div class="table-responsive p-5 rounded shadow" style="background: white">
        <div class="d-flex">
            <a href="/books" class="btn btn-primary rounded-0"><i class="bi bi-backspace"></i> Back</a>
        </div>

        <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Code</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($book as $book)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $book->book_code }}</td>
                        <td>{{ $book->title }}</td>
                        <td>
                            {{-- {{ $book->categories }} --}}
                            @foreach ($book->categories as $ctg)
                                "{{ $ctg->name }}"
                            @endforeach
                        </td>
                        <td>{{ $book->status }}</td>
                        <td>
                            <a href="/book-restore/{{ $book->slug }}"><i class="btn btn-warning bi bi-recycle"></i></a>
                            <a href="/book-delpermanent/{{ $book->slug }}"><i class="btn btn-danger bi bi-trash3"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
