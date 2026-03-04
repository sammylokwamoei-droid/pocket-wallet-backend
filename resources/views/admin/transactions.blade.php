<h1>All Transactions</h1>
<table border="1">
    <tr>
        <th>ID</th>
        <th>User</th>
        <th>Type</th>
        <th>Amount</th>
        <th>Status</th>
        <th>Date</th>
    </tr>
    @foreach($transactions as $txn)
    <tr>
        <td>{{ $txn->id }}</td>
        <td>{{ $txn->user->name ?? '-' }}</td>
        <td>{{ $txn->type }}</td>
        <td>{{ $txn->amount }}</td>
        <td>{{ $txn->status }}</td>
        <td>{{ $txn->date }}</td>
    </tr>
    @endforeach
</table>
