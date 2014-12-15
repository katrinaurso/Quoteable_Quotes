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
			<form class="col-md-5" action="/register" method="post">
				<h2>Register</h2>
				<?php if(!empty($registration_errors)) { echo $registration_errors; } ?>
				<p><input type="text" name="first_name" placeholder="First Name"></p>
				<p><input type="text" name="last_name" placeholder="Last Name"></p>
				<p><input type="text" name="alias" placeholder="Alias"></p>
				<p><input type="text" name="email" placeholder="Email"></p>
				<p><input type="password" name="password" placeholder="Password"></p>
				<p><input type="password" name="password2" placeholder="Re-enter Password"></p>
				<p>Birthdate:</p>
				<p><input type="date" name="birthdate"></p>
				<input class="btn btn-primary" type="submit" name="register" value="Register">
			</form>
			<form class="col-md-5" action="/login" method="post">
				<h2>Login</h2>
				<?php if(!empty($login_errors)) { echo $login_errors; } ?>
				<p><input type="text" name="email" placeholder="Email"></p>
				<p><input type="password" name="password" placeholder="Password"></p>
				<input class="btn btn-primary" type="submit" name="login" value="Login">
			</form>
		</div>
	</div>
</body>
</html>