<h1>Create Agent</h1>
<form method="POST" action="{{ route('admin.agents.store') }}">
    @csrf
    <label>Name</label>
    <input type="text" name="name" required>

    <label>Email</label>
    <input type="email" name="email" required>

    <label>Password</label>
    <input type="password" name="password" required>

    <button type="submit">Create Agent</button>
</form>
