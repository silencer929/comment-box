<?php
require_once "defines.php";
require_once MODEL ."comments.php";
require_once MODEL . "subscribers.php";
if(isset($_POST['userId']) && $_POST['comment']==true){
	$userId=(int)$_POST['userId'];
	$text=addslashes(str_replace("\n","<br>",$_POST['comment']));
	$std=new stdClass();
	$std->user=null;
	$std->text=null;
	$std->error=null;
	if(class_exists('comment') && class_exists('subscribers')){
		$subscribers=new subscribers();
		$comment=new comment();
		$userInfo=$subscribers->getSubscribers($userId);
		if($userId == null){
			$std->error=true;
		}
		$commentInfo=$comment->insert($text,$userId);
		if($commentInfo == null){
			$std->error=true;
		}
		$std->user=$userInfo;
		$std->text=$commentInfo;
		echo json_encode($std);
	}
	exit();
}
if($_POST['userName']==true){
	$comment=new comment();
	$comments=$comment->getComments();
	echo json_encode($comments);
	exit();
}
else{
echo "string";
}

?>