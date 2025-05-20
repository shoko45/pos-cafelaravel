<h2>Edit User</h2>
<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $user->name }}" required><br>
    <input type="email" name="email" value="{{ $user->email }}" required><br>
    <select name="role" required>
        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="kasir" {{ $user->role == 'kasir' ? 'selected' : '' }}>Kasir</option>
    </select><br>
    <button type="submit">Update</button>
</form>
