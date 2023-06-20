@extends('layouts.main')

@section('title', 'Edit User')

@section('content')

    <h1>Edit User</h1>

    <div class="mt-3">
        @if (session('message'))
            <div class="alert {{ session('alert-class') }}">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <div class="row">
        <div class="col-12" style="margin-left: 0.9%">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">KTP</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @if ($users->cover != '')
                                        <div style="display: flex; justify-content: center;">
                                            <img src="{{ asset('storage/cover/' . $users->cover) }}" alt=""
                                                width="100%">
                                        </div>
                                    @else
                                        <img src="{{ asset('images/default.jpg') }}" alt="" width="40%">
                                    @endif
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="card-body">
                    <form action="/user-edit/{{ $users->slug }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            @if ($users->cover != '')
                                <div style="display: flex; justify-content: center;">
                                    <img src="{{ asset('storage/cover/' . $users->cover) }}" alt="" width="20%">
                                </div>
                                <div style="display: flex; justify-content: center;">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Lihat
                                    </button>
                                </div>
                            @else
                                <img src="{{ asset('images/default.jpg') }}" alt="" width="20%">
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="username"
                                value="{{ $users->username }}">
                        </div>
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="password" value="{{ $users->password }}">
                        </div>
                        <div class="mb-3">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="phone"
                                value="{{ $users->phone }}">
                        </div>
                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="address"
                                value="{{ $users->address }}">
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-success" type="submit"> Save </button>
                        </div>
                    </form>
                    <div class="my-2">
                        <a href="/user-reset/{{ $users->slug }}" class="btn btn-info">Reset Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
