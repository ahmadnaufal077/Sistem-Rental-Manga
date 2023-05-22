@extends('layouts.main')

@section('title', 'Deleted Category')

@section('content')
    <h1>Category Temp List</h1>

    <div class="mt-3">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="table-responsive p-5 rounded shadow" style="background: white">
        <div class="d-flex">
            <a href="/category" class="btn btn-primary rounded-0"><i class="bi bi-backspace"></i> Back</a>
        </div>

        <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $ctg)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ctg->name }}</td>
                        <td>
                            <a href="/category-restore/{{ $ctg->slug }}"><i class="btn btn-warning bi bi-recycle"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
