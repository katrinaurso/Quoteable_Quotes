<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome</title>
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/bootstrap-theme.min.css">
	<script src="/assets/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/assets/css/styles.css">
</head>
<body>
	<div class="container">
		<h1>Welcome!</h1>
		<div class="row">
			<form class="col-md-5" action="#" method="post">
				<h2>Register</h2>
				<p>(ERRORS)</p>
				<p>First Name: <input type="text" name="first_name" placeholder="John"></p>
				<p>Last Name: <input type="text" name="last_name" placeholder="Doe"></p>
				<p>Alias: <input type="text" name="alias" placeholder="JohnDoe"></p>
				<p>Email: <input type="text" name="email" placeholder="johndoe@example.com"></p>
				<p>Password: <input type="password" name="password"></p>
				<p>Confirm Password: <input type="password" name="password2"></p>
				<input type="submit" name="register" value="Register">
			</form>
			<form class="col-md-5" action="#" method="post">
				<h2>Login</h2>
				<p>(ERRORS)</p>
				<p>Email: <input type="text" name="email" placeholder="johndoe@example.com"></p>
				<p>Password: <input type="password" name="password"></p>
				<input type="submit" name="login" value="Login">
			</form>
		</div>
	</div>
</body>
</html>