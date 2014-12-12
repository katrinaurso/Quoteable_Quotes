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
		<div class="row">
			<h1 class="col-md-10">Welcome<?php if($name) { echo ', '.$name; } ?>!</h1>
			<a href="logout"><button>Logout</button></a>
		</div>
		<div class="row">
			<form class="col-md-6" id="quotable" action="#" method="post">
				<h2>Quotable Quotes</h2>
				<div class="quotes">
					<p>Random quote from random person that is not already in favorites quote list</p>
					<p>Posted by (NAME OF POSTER)</p>
					<input type="hidden" name="quote_id" value="(QUOTE ID)">
					<input type="submit" value="add" name="Add to My List">
				</div>
				<div class="quotes">
					<p>Random quote from random person that is not already in favorites quote list</p>
					<p>Posted by (NAME OF POSTER)</p>
					<input type="hidden" name="quote_id" value="(QUOTE ID)">
					<input type="submit" value="add" name="Add to My List">
				</div>
				<div class="quotes">
					<p>Random quote from random person that is not already in favorites quote list</p>
					<p>Posted by (NAME OF POSTER)</p>
					<input type="hidden" name="quote_id" value="(QUOTE ID)">
					<input type="submit" value="add" name="Add to My List">
				</div>
			</form>
			<form class="col-md-6" id="favorites" action="3" method="post">
				<h2>Favorite Quotes</h2>
				<div class="quotes">
					<p>Random quote from random person that is not already in favorites quote list</p>
					<p>Posted by (NAME OF POSTER)</p>
					<input type="hidden" name="quote_id" value="(QUOTE ID)">
					<input type="submit" value="add" name="Remove From My List">
				</div>
				<div class="quotes">
					<p>Random quote from random person that is not already in favorites quote list</p>
					<p>Posted by (NAME OF POSTER)</p>
					<input type="hidden" name="quote_id" value="(QUOTE ID)">
					<input type="submit" value="add" name="Remove From My List">
				</div>
			</form>
		</div>
		<div class="row">
			<form class="col-md-offset-2" action="#" method="post">
				<h2>Contribute a Quote:</h2>
				<p>(ERRORS)</p>
				<p>Quoted By: <input type="text" name="quoted_by" placeholder="Quoted By"></p>
				<p>Quote: <input type="text" name="quote" placeholder="Quote Goes Here..."></p>
				<input type="submit" value="quote" name="Submit">
			</form>
		</div>
	</div>
</body>
</html>