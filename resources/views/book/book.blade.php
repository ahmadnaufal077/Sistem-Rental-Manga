@extends('layouts.main')

@section('title', 'Books')

@section('content')
    <h1>Book List</h1>

    <div class="mt-3">
        @if (session('message'))
            <div class="alert {{ session('alert-class') }}">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <div class="table-responsive p-5 rounded shadow" style="background: white">
        <div class="d-flex">
            <a href="/book-deleted" class="btn btn-secondary rounded-0"><i class="bi bi-trash2"></i> Book Temp</a>
            <a href="/book-add" class="btn btn-primary rounded-0"><i class="bi bi-plus"></i> Add Book</a>
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
                @foreach ($books as $book)
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
                            <a href="book-edit/{{ $book->slug }}"><i class="btn btn-success bi bi-pencil-square"></i></a>
                            <a href="book-delete/{{ $book->slug }}"><i class="btn btn-danger bi bi-trash3"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
