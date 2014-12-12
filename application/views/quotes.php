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
			<h1 class="col-md-10">Welcome<?php if(!empty($name)) { echo ', '.$name; } ?>!</h1>
			<a href="logout"><button>Logout</button></a>
		</div>
		<div class="row">
			<div class="col-md-6" id="quotable">
				<h2>Quotable Quotes</h2>
<?php 	if(!empty($quotes)) {
			foreach($quotes as $quote) { ?>
				<div class="quotes">
					<p><?php echo $quote['quoted_by'] ?>:</p>
					<p><?php echo $quote['quote'] ?></p>
					<p><?php echo $quote['alias'] ?></p>
					<form action="/add_to" method="post">
						<input type="hidden" name="quote_id" value="<?php echo $quote['id'] ?>">
						<input type="submit" value="Add to My List">
					</form>
				</div>
<?php	}
				} ?>
			</div>
			<div class="col-md-6" id="favorites">
				<h2>Favorite Quotes</h2>
<?php 	if(!empty($favorites)) {
			foreach($favorites as $favorite) { ?>
				<div class="quotes">
					<p><?php echo $favorite['quoted_by'] ?>:</p>
					<p><?php echo $favorite['quote'] ?></p>
					<p><?php echo $favorite['alias'] ?></p>
					<form action="/remove_from" method="post">
						<input type="hidden" name="quote_id" value="<?php echo $favorite['id'] ?>">
						<input type="submit" value="Remove From My List">
					</form>
				</div>
<?php		}
		} ?>
			</div>
		</div>
		<div class="row">
			<form class="col-md-offset-2" action="/add" method="post">
				<h2>Contribute a Quote:</h2>
<?php 			if(!empty($quote_errors)) { echo $quote_errors; } ?>
				<p>Quoted By: <input type="text" name="quoted_by" placeholder="Quoted By"></p>
				<p>Quote: <input type="text" name="quote" placeholder="Quote Goes Here..."></p>
				<input type="submit" value="quote" name="Submit">
			</div>
		</div>
	</div>
</body>
</html>