@extends('layouts.main')

@section('title', 'Users')

@section('content')
    <h1>New Registered User</h1>

    <div class="table-responsive p-5 rounded shadow" style="background: white">
        <div class="d-flex">
            <a href="/users" class="btn btn-primary rounded-0"><i class="bi bi-person-check-fill"></i> Approved Users List</a>
        </div>
    
            <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Username</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registered as $usr)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $usr->username }}</td>
                            <td>
                                @if ($usr->phone)
                                    {{ $usr->phone }}
                                @else
                                    Not listed
                                @endif
                            </td>
                            <td>
                                <?php
                                $num_char = 20;
                                $text = $usr->address;
                                echo substr($text, 0, $num_char) . '...';
                                ?>
                            </td>
                            <td>{{ $usr->status }}</td>
                            <td>
                                <a href="/user-detail/{{ $usr->slug }}"><i class="btn btn-info bi bi-list-nested"></i></a>
                                <a href="/user-delete/{{ $usr->slug }}"><i class="btn btn-danger bi bi-trash3"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    
@endsection
