 <?php error_reporting(0); ?>
 <div class="container box" >
 	<div class="row-left bg-black" >
 		<div class="inner">
 			<img style="width: 100%; height: 523px" src="Public/client/img/<?php echo $blog['images'] ?>">
 			<div class="detail">
 				<h1 class="title-detail"><?php echo $blog['title'] ?></h1>
 				<p class="post-time"><?=$datetime?></p>
 				<div class="line-break"></div>
 				<div class="box-title">
 					<h2 class="title">Đánh giá chi tiết:</h2>
 				</div>
 				<div><?php echo $blog['content'] ?></div>
 			</div>
 		</div>
 		<div class="comments inner">
 			<h3>Đánh giá bài viết</h3>
 			<div id="comments">
 				<?php if(!empty($comment))
 						foreach ($comment as $key)
 				 			require 'View/client/pages/comment.php'; ?>
 				</div>
 				<?php if(isset($_SESSION['user'])){ ?>
 				<textarea name="message" id="content"></textarea>
 				<button class="btn send" onclick="send()">Bình luận</button>
 			<?php }else echo '<p>Đăng nhập để bình luận bài viết này</p>' ?>

 		</div>
 	</div>
 	<div class="row-right bg-black">
 		<div class="inner">
 			<div class="title">
 				<h2>Bài viết nổi bật</h2>
 			</div>
 			<div class="list-item">
 				<?php foreach ($blogs as $key): ?>
 					<div class="item">
 						<a href="?controller=blog&id=<?=$key['id'] ?>">
 							<img class="img-right" src="Public/client/img/<?=$key['images'] ?>">
 						</a>
 						<div class="item-in4">
 							<a  href="?controller=blog&id=<?=$key['id'] ?>"><h3><?=$key['title'] ?></h3></a>
 						</div>
 					</div>
 				<?php endforeach ?>
 			</div>
 		</div>
 	</div>
 </div>
 <script type="text/javascript">
 	function send() {
 		var iduser = <?=$_SESSION['user']['id'] ?>;
 		var content = $('#content').val();
 		var idblog = <?=$id ?>;
 		$.get("Ajax/?controller=comment", {iduser:iduser,content:content,idblog:idblog,idnews:0}, function(result){
 			$('#comments').append(result);
 		});
 	}
 </script>
