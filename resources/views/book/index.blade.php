@extends('layouts.main')

@section('title', 'Books List')

<link rel="stylesheet" href="{{ asset('css/book-list.css') }}">

@section('content')
    <h1>Books List</h1>

    <div class="my-3">
        <div class="row p-2 round shadow" style="background: white">
            <form action="" class="my-4">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Book Title" name="title">
                            <button class="btn btn-outline-primary" type="submit" id="button-addon2">Button</button>
                        </div>
                    </div>
                </div>
            </form>
            <style>
                .fas.fa-heart:hover {
                    color: #f44336 !important;
                }

                .fas.fa-share-alt:hover {
                    color: #0d47a1 !important;
                }
            </style>
            @foreach ($books as $book)
                <section class="col-xl-2 col-lg-4 col-md-5 mb-3 ">

                    <div class="card">
                        <div class="bg-image hover-overlay ripple rounded-0" data-mdb-ripple-color="light">
                            @if ($book->cover != '')
                                <img class="img-fluid rounded-top" src="{{ asset('storage/cover/' . $book->cover) }}"
                                    alt="Card image cap" style="width: 400px; height: 200px;" />
                            @else
                                <img class="img-fluid rounded-top" src="{{ asset('images/default.jpg') }}" alt="Card image cap"
                                    style="width: 400px; height: 200px;" />
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                @if ($book->status == 'in stock')
                                    <div class="clearfix mb-2">
                                        <span class="float-start badge rounded-pill bg-success">{{ $book->status }}</span>
                                    </div>
                                @else
                                    <div class="clearfix mb-2">
                                        <span class="float-start badge rounded-pill bg-danger">{{ $book->status }}</span>
                                    </div>
                                @endif
                            </div>
                            <h5 class="card-title">{{ $book->title }}</h5>
                        </div>
                    </div>

                </section>
            @endforeach
            <div class="d-flex justify-content-center">
                {{ $books->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>

@endsection
