$(document).ready(()=>{
	var DOMAIN="http://localhost:8080/comment-box/";
	var userName=$("#userName").val();
	$("#post").on("click",()=>{
		postBtnClick();
	});
	$(".comment-list").load(DOMAIN+"includes/comments.php",()=>{
		$.ajax({
			method: "POST",
			data: {"userName":userName},
			url: DOMAIN+"ajax.php",
			error: function(error){
				console.log(error);
			},
			success: function(data){
				loadComments(jQuery.parseJSON(data));
			}
		})
	})
	


	function postBtnClick() {
		var text=$(".input").val();
		var userId=$("#userId").val();
		var userName=$("#userName").val();
		if(text.length > 0 && userId !=null){
			$.ajax({
			method: "POST",
			data: {"userId":userId,"userName":userName,"comment":text},
			url: DOMAIN+"ajax.php",
			error: function(error){
				console.log(error);
			},
			success: function(data){
				$(".input").val("");
				comment_insert(jQuery.parseJSON(data));
				}
		          });
		}
	}
	function comment_insert(item){

		var result=`
		<li class="comment-holder" data-id=${item.textcommentId}>
				<div class="pic-holder"><img src="${item.user.profileImage}" class="pic"></div>
				<div class="comment">
					<h4>${item.user.userName}</h4>
					${item.text.comment}
				</div>
			</li>
		`;
		$(".comment-list").prepend(result);
	}
	function loadComments(comments){
		$(comments).each((index,item)=>{
			var result=`
		<li class="comment-holder" data-id=${item.comentId}>
				<div class="pic-holder"><img src="${item.profileImage}" class="pic"></div>
				<div class="comment">
					<h4>${item.userName}</h4>
					${item.comment}
				</div>
			</li>
		`;
		$(".comment-list").prepend(result);
		})
	}
	


})