<h1>Admin Dashboard</h1>
<p>Welcome, {{ auth()->user()->name }}</p>
<a href="{{ route('admin.users') }}">Manage Users</a>
<a href="{{ route('admin.agents.create') }}">Create Agent</a>
<a href="{{ route('admin.transactions') }}">Transactions</a>
