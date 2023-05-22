@extends('layouts.main')

@section('title', 'Detail User')

@section('content')

    <h1>Detail User</h1>

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
                    <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="code">Username</label>
                            <input type="text" name="book_code" id="code" class="form-control"
                                placeholder="Book Code" readonly value="{{ $users->username }}">
                        </div>
                        <div class="mb-3">
                            <label for="code">Phone</label>
                            <input type="text" name="book_code" id="code" class="form-control"
                                placeholder="Book Code" readonly value="{{ $users->phone }}">
                        </div>
                        <div class="mb-3">
                            <label for="code">Address</label>
                            <input type="text" name="book_code" id="code" class="form-control"
                                placeholder="Book Code" readonly value="{{ $users->address }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
