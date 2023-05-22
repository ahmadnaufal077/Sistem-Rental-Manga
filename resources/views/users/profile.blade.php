@extends('layouts.main')

@section('title', 'Profile')

@section('content')
    <h1 class="mt-3 mb-3">Your's Rent Log</h1>
    <div class=" w-100">
        <x-rent-log-table :rentlog='$rentlogs' />
    </div>
@endsection
