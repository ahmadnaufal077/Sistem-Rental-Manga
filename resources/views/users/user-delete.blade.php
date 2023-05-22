@extends('layouts.main')

@section('title', 'Delete User')

@section('content')
    <h2>Are you sure to delete book <b>{{ $users->username }}</b></h2>
    <div class="mt-5">
        <a href="/user-destroy/{{ $users->slug }}" class="btn btn-danger">Sure</a>
        <a href="/users" class="btn btn-info">Cancel</a>
    </div>
@endsection
