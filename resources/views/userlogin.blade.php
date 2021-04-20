<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>User Login</h1>
	<form action="user" method="POST">
		@csrf
		<input type="text" name="username" placeholder="Enter username"><br><br>
		<input type="password" name="password" placeholder="Enter Password"><br><br>
		<button type="submit" name="submit">Login</button>
	</form>
</body>
</html>