<table class="table table-responsive" id="restaurants-table">
    <thead>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Contact No</th>
        <th>Address</th>
    </thead>
    <tbody>
    @foreach($users as $user)
        @if($user->type == "User")
            <tr>
                <td>{!! $user->id !!}</td>
                <td>{!! $user->name !!}</td>
                <td>{!! $user->email !!}</td>
                <td>{!! $user->phone !!}</td>
                <td>{!! $user->address !!}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>