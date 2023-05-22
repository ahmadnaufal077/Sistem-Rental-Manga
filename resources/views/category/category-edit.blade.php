@extends('layouts.main')

@section('title', 'Edit Category')

@section('content')

    <h1>Update Category</h1>

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
                    <h6 class="m-0 font-weight-bold text-primary">Category Data</h6>
                </div>
                <div class="card-body">
                    <form action="/category-edit/{{ $category->slug }}" method="post">
                        @csrf
                        @method('put')
                        <div>
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Category Name" value="{{ $category->name }}">
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-success" type="submit" style="padding: 0.4% 2%"> Update </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
