<h3>Hello, {{ $user->user->name }}</h3>
<h6>The information about you</h6>
<p>Login: {{ $user->login }}</p>
<p>Name: {{ $user->user->name }}</p>
<p>Email: {{ $user->user->email }}</p>
<p>Role: {{ $user->role->name }}</p>