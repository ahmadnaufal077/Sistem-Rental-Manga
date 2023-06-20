@extends('layouts.main')

@section('title', 'Detail Users')

@section('content')

    <h1>Detail User</h1>

    <div class="mt-3">
        @if (session('message'))
            <div class="alert {{ session('alert-class') }}">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">User Detail</h6>
                </div>

                <div class="card-body">

                    <!-- Modal -->
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
                    <div class="mb-3">
                        @if ($users->cover != '')
                            <div style="display: flex; justify-content: center;">
                                <img src="{{ asset('storage/cover/' . $users->cover) }}" alt="" width="40%">
                            </div>
                            <div style="display: flex; justify-content: center;">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Lihat
                                </button>
                            </div>
                        @else
                            <img src="{{ asset('images/default.jpg') }}" alt="" width="40%">
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="">Username</label>
                        <input type="text" class="form-control" readonly value="{{ $users->username }}">
                    </div>
                    <div class="mb-3">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" readonly value="{{ $users->phone }}">
                    </div>
                    <div class="mb-3">
                        <label for="">Address</label>
                        <textarea name="" id="" cols="30" rows="5" readonly class="form-control"
                            style="resize: none">{{ $users->address }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Status</label>
                        @if ($users->status == 'active')
                            <input type="text" class="form-control text-success fw-bold" readonly
                                value="{{ $users->status }}">
                        @else
                            <input type="text" class="form-control text-danger fw-bold" readonly
                                value="{{ $users->status }}">
                        @endif
                    </div>
                    <div class="mb-3 d-flex">
                        @if ($users->status == 'inactive')
                            <div style="margin-right: 3%;">
                                <a href="/user-approve/{{ $users->slug }}" class="btn btn-info">Approved User</a>
                            </div>
                        @endif

                        <div>
                            <a href="/users" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">User Rental</h6>
                </div>

                <div class="card-body">
                    <x-rent-log-table :rentlog='$rentlogs' />
                </div>
            </div>
        </div>
    </div>
@endsection
