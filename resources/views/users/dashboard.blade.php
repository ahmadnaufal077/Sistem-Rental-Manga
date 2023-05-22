@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

    <div class="row ml-1">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                User</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $category }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-person fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Books</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $book }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-journal-bookmark fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Category</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $category }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-tag fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Rental Log</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $rentlog }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-box-arrow-in-right fa-2x text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div>
        <x-rent-log-table :rentlog='$rentlogs' />
    </div>
    
@endsection
