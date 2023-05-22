@extends('layouts.main')

@section('title', 'Delete Category')

@section('content')
<h2>Are you sure to delete category <b>{{ $category->name }}</b></h2>
<div class="mt-5">
    <a href="/category-destroy/{{ $category->slug }}" class="btn btn-danger">Sure</a>
    <a href="/category" class="btn btn-info">Cancel</a>
</div>
@endsection
