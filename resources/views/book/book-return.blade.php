@extends('layouts.main')

@section('title', 'Book Return')

@section('content')
    <div class="row">
        <div class="col-12" style="margin-left: 0.9%">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Return Form</h6>
                </div>

                <div class="card-body">

                    <div class="mt-3">
                        @if (session('message'))
                            <div class="alert {{ session('alert-class') }}">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>

                    <form action="book-return" method="post">
                        @csrf

                        {{-- SELECT --}}
                        <div class="mb-3">
                            <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap"
                                rel="stylesheet">

                            <link rel="stylesheet"
                                href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.css">
                            <link rel="stylesheet" href="select2/css/style.css" />
                            <label for="user_id" class="form-label">User</label>
                            <select name="user_id" id="user" data-placeholder="Choosen User"
                                class="chosen-select w-100 h-50" tabindex="6" multiple>
                                @foreach ($users as $usr)
                                    <option value="{{ $usr->id }}">{{ $usr->username }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="mb-3">
                            <label for="book_id" class="form-label">Book</label>
                            <select name="book_id" id="book" data-placeholder="Choosen book"
                                class="chosen-select tes w-100" tabindex="1" multiple>
                                @foreach ($books as $book)
                                    <option value="{{ $book->id }}">
                                        {{ $book->book_code }} &nbsp; || &nbsp;
                                        {{ $book->title }} &nbsp; || &nbsp;
                                        @if ($book->status == 'in stock')
                                            <div class="clearfix mb-2">
                                                <span
                                                    class="float-start badge rounded-pill bg-success">{{ $book->status }}</span>
                                            </div>
                                        @else
                                            <div class="clearfix mb-2">
                                                <span
                                                    class="float-start badge rounded-pill bg-danger">{{ $book->status }}</span>
                                            </div>
                                        @endif
                                    </option>
                                @endforeach
                            </select>

                            <script src="select2/js/jquery.min.js"></script>
                            <script src="select2/js/popper.js"></script>
                            <script src="select2/js/bootstrap.min.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.js"></script>
                            <script src="select2/js/main.js"></script>
                            {{-- SELECT END --}}
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
            @endsection
