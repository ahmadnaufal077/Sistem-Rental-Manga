@extends('layouts.main')

@section('title', 'Edit Book')

@section('content')

    <h1>Edit Book</h1>

    @if ($errors->any())
        <div class="alert alert-danger" style="width: 50%">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-12" style="margin-left: 0.9%">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Book Data</h6>
                </div>

                <div class="card-body">
                    <form action="/book-edit/{{ $book->slug }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="code">Code</label>
                            <input type="text" name="book_code" id="code" class="form-control"
                                placeholder="Book Code" readonly value="{{ $book->book_code }}">
                        </div>

                        <div class="mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Book Name"
                                value="{{ $book->title }}">
                        </div>


                        {{-- SELECT --}}
                        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

                        <link rel="stylesheet"
                            href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.css">
                        <link rel="stylesheet" href="{{ asset('select2/css/style.css') }}" />
                        <label for="title">Category</label>
                        <select name="categories[]" id="category"
                            data-placeholder="@foreach ($book->categories as $category) {{ $category->name }} @endforeach"
                            class="chosen-select w-100" multiple tabindex="6">
                            @foreach ($categories as $ctg)
                                <option value="{{ $ctg->id }}">{{ $ctg->name }}</option>
                            @endforeach
                        </select>

                        <script src="{{ asset('select2/js/jquery.min.js') }}"></script>
                        <script src="{{ asset('select2/js/popper.js') }}"></script>
                        <script src="{{ asset('select2/js/bootstrap.min.js') }}"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.js"></script>
                        <script src="{{ asset('select2/js/main.js') }}"></script>
                        {{-- SELECT END --}}

                        <div class="mb-3">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control"
                                placeholder="Book Image">
                        </div>
                        <div>
                            <label for="category" style="display: block">Current Image</label>
                            @if ($book->cover != '')
                                <img src="{{ asset('storage/cover/' . $book->cover) }}" alt="" width="40%">
                                
                            @else
                                <img src="{{ asset('images/default.jpg') }}" alt="" width="40%">
                            @endif
                        </div>


                        <div class="mt-3">
                            <button class="btn btn-success" type="submit" style="padding: 0.4% 2%"> Save </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="mt-3 w-50">
        <form action="/book-edit/{{ $book->slug }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="code">Code</label>
                <input type="text" name="book_code" id="code" class="form-control" placeholder="Book Code"
                    value="{{ $book->book_code }}">
            </div>

            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Book Name"
                    value="{{ $book->title }}">
            </div>

            <div class="mb-3">
                <label for="category">Category</label>
                <select name="categories[]" id="category" class="form-control select-multiple" multiple>
                    @foreach ($categories as $ctg)
                        <option value="{{ $ctg->id }}">{{ $ctg->name }}</option>
                    @endforeach
                </select>

            </div>

            <div>
                <label for="category">Current Category</label>
                <ul>
                    @foreach ($book->categories as $category)
                        <li>{{ $category->name }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="mb-3">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control" placeholder="Book Image">
            </div>

            <div>
                <label for="category" style="display: block">Current Image</label>
                @if ($book->cover != '')
                    <img src="{{ asset('storage/cover/' . $book->cover) }}" alt="" width="40%">
                @else
                    <img src="{{ asset('images/default.jpg') }}" alt="" width="40%">
                @endif
            </div>

            <div class="mt-3">
                <button class="btn btn-success" type="submit" style="padding: 1% 5%"> Save </button>
            </div>
        </form>
    </div> --}}

@endsection
