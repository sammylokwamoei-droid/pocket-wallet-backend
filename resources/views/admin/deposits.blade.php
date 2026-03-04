<h1>All Deposits</h1>
<table border="1">
    <tr>
        <th>ID</th><th>User</th><th>Amount</th><th>Status</th>
    </tr>
    @foreach($deposits as $deposit)
    <tr>
        <td>{{ $deposit->id }}</td>
        <td>{{ $deposit->user->name }}</td>
        <td>{{ $deposit->amount }}</td>
        <td>{{ $deposit->status }}</td>
    </tr>
    @endforeach
</table>
