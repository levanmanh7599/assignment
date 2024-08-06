<h1>Profile</h1>
<form method="POST" action="/profile">
    @csrf
    <input type="text" name="fullname" value="{{ $user->fullname }}" required>
    <input type="text" name="username" value="{{ $user->username }}" required>
    <input type="email" name="email" value="{{ $user->email }}" required>
    <input type="text" name="avatar" value="{{ $user->avatar }}">
    <button type="submit">Update Profile</button>
</form>

<h2>Change Password</h2>
<form method="POST" action="/change-password">
    @csrf
    <input type="password" name="old_password" placeholder="Old Password" required>
    <input type="password" name="password" placeholder="New Password" required>
    <input type="password" name="password_confirmation" placeholder="Confirm New Password" required>
    <button type="submit">Change Password</button>
</form>
