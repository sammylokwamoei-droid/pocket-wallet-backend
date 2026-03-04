<h1>All Withdrawals</h1>
<table border="1">
    <tr>
        <th>ID</th><th>User</th><th>Amount</th><th>Status</th>
    </tr>
    @foreach($withdrawals as $withdrawal)
    <tr>
        <td>{{ $withdrawal->id }}</td>
        <td>{{ $withdrawal->user->name }}</td>
        <td>{{ $withdrawal->amount }}</td>
        <td>{{ $withdrawal->status }}</td>
    </tr>
    @endforeach
</table>
