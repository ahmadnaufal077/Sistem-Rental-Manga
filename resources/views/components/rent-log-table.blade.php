<div class="content">
    <div class="table-responsive p-5 rounded shadow" style="background: white">
        <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Book</th>
                    <th>Rent Date</th>
                    <th>Return Date</th>
                    <th>Actual Return Date</th>
                    <th>status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rentlog as $rent)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $rent->user->username }}</td>
                        <td>{{ $rent->book->title }}</td>
                        <td>{{ $rent->rent_date }}</td>
                        <td>{{ $rent->return_date }}</td>
                        <td>{{ $rent->actual_return_date }}</td>
                        <td>
                            @if ($rent->return_date)
                                @if ($rent->actual_return_date == null)
                                    <p class="badge rounded-pill bg-warning -bottom-3">
                                        Proses
                                    </p>
                                @endif

                                @if ($rent->actual_return_date)
                                    @if ($rent->actual_return_date > $rent->return_date)
                                        <p class="badge rounded-pill bg-danger -bottom-3">
                                            Terlambat
                                        </p>
                                    @else
                                        <p class="badge rounded-pill bg-success -bottom-3">
                                            Selesai
                                        </p>
                                    @endif
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
