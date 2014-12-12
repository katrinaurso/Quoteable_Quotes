	<?php
$datetime1 = new DateTime('2008-10-11, 20:10:00');
$datetime2 = new DateTime('2009-10-13, 21:20:10');
$interval = $datetime1->diff($datetime2);
echo $interval->format('%R%a days').'<br>';
echo $interval->format('%Y years');
echo $interval->format('%i minute(s)');

function date_from($date) {
	$datetime1 = $date;
	var_dump($datetime1);
	$datetime2 = date('Y-m-d H:i:s');
	var_dump($datetime2);
	die();
	$interval = $datetime1->diff($datetime2);
	return $interval->format('%i minute(s) ago');
}

?>
	<div class="container">
		<div class="row">
			<h1 class="col-md-4"><?php echo $user_info['first_name'].' '.$user_info['last_name'] ?></h1>
		</div>
		<p>Registered on: <?php echo $user_info['created'] ?></p>
		<p>User ID: <?php echo $user_info['id'] ?></p>
		<p>Email Address: <?php echo $user_info['email'] ?></p>
		<p>Description: <?php echo $user_info['description'] ?></p>
		<h1>Leave a message for <?php echo $user_info['first_name'] ?></h1>
		<form role="form" action="/post_message/<?php echo $user_info['id'] ?>" method="post">
			<textarea class="form-control" rows="3" name="message"></textarea>
			<input class="col-md-2 col-md-offset-10 btn btn-success" type="submit" name="submit" value="Post">
		</form>
<?php	if(!empty($messages)) { 
			foreach($messages as $message) { ?>
		<div class="row">
			<p class="col-md-10"><a href="#"><?php echo $message['message_name'] ?></a> wrote</p>
			<p class="col-md-2 text-right"><?php echo date_from($message['created_at']) ?></p>
		</div>
		<div class="outline message"><?php echo $message['message'] ?></div>
<?php 			if(!empty($comments)) {
					foreach ($comments as $comment) {
						if($comment['message_id'] == $message['id']) { ?>
		<div class="row">
			<p class="col-md-9 col-md-offset-1"><a href="#"><?php echo $comment['comment_name'] ?></a> wrote</p>
			<p class="col-md-2 text-right"><?php echo $comment['created_at'] ?></p>
		</div>
		<div class="outline col-md-11 col-md-offset-1 message"><?php echo $comment['comment'] ?></div>		
<?php 					}
					}
				} ?>
		<form class="col-md-offset-1" action="/post_comment/<?php echo $message['id'] ?>" method="post">
			<textarea class="form-control" name="comment">WRITE A COMMENT HERE</textarea>
			<input type="hidden" name="user" value="<?php echo $user_info['id'] ?>">
			<input class="col-md-2 col-md-offset-10 btn btn-success" type="submit" name="submit" value="post">
		</form>
<?php	 	}
		} ?>
</body>
</html>