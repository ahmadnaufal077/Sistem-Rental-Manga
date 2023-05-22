@extends('layouts.main')

@section('title', 'Category')

@section('content')
    <h1>Category List</h1>

    <div class="mt-3">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="table-responsive p-5 rounded shadow" style="background: white">
        <div class="d-flex">
            <a href="/category-deleted" class="btn btn-secondary rounded-0"><i class="bi bi-trash2"></i> Category Temp</a>
            <a href="/category-add" class="btn btn-primary rounded-0"><i class="bi bi-plus"></i> Add Category</a>
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
                @foreach ($categories as $ctg)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ctg->name }}</td>
                        <td>
                            <a href="category-edit/{{ $ctg->slug }}"><i class="btn btn-success bi bi-pencil-square"></i></a>
                            <a href="category-delete/{{ $ctg->slug }}"><i class="btn btn-danger bi bi-trash3"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
