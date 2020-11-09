<!DOCTYPE html>
<html>
<head>
	<title>comment-box</title>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"?t=<?php echo time();?>></script>
	<script type="text/javascript" src="js/classes.js"></script>
	<link rel="stylesheet" type="text/css" href="css/aa.css">
</head>
<body>
<?php require_once "defines.php"?>
	<div class="container">
		<div id="input-holder">
			<h4>User feedback....</h4>
			<div id="comment-bar">
				<span class="user">says..<label>peter</label></span>
			<button type="submit" id="post">post</button>
			</div>
			<textarea class="input"></textarea>
		</div>
		<ul class="comment-list">
			<?php require_once INCLUDES . DS . "comments.php"?>
		</ul>
	</div>
	<input type="hidden" id="userId" value="7">
	<input type="hidden" id="userName" value="mike">
</body>
</html>