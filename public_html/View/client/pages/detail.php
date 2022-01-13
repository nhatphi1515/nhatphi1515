 <style type="text/css">
 	.popover__wrapper {
 		position: relative;
 		margin-top: 1.5rem;
 		display: inline-block;
 	}
 	.popover__content {
 		opacity: 0;
 		visibility: hidden;
 		position: absolute;
 		left: -100px;
 		top: 55px;
 		transform: translate(0, 10px);
 		background-color: white;
 		padding: 1.5rem;
 		box-shadow: 0 2px 5px 0 rgb(0 0 0 / 26%);
 		width: 300px;
 	}
 	.popover__content:before {
 		position: absolute;
 		z-index: -1;
 		content: "";
 		right: calc(50% - 10px);
 		top: -8px;
 		border-style: solid;
 		border-width: 0 10px 10px 10px;
 		border-color: transparent transparent white transparent;
 		transition-duration: 0.3s;
 		transition-property: transform;
 	}
 	.popover__wrapper:hover .popover__content {
 		z-index: 10;
 		opacity: 1;
 		visibility: visible;
 		transform: translate(0, -20px);
 		transition: all 0.5s cubic-bezier(0.75, -0.02, 0.2, 0.97);
 	}
 	.popover__message {
 		text-align: center;
 	}
 </style>
 <?php error_reporting(0); ?>
 <div class="container box" >
 	<div class="row-left bg-black" >
 		<div class="inner">
 			<img style="width: 100%; height: 523px" src="Public/client/img/<?php echo $news['img'] ?>">
 			<div class="detail">
 				<h1 class="title-detail"><?php echo $news['title'] ?></h1>
 				<p class="post-time"><?=$datetime?></p>
 				<p class="detail-price">giá: <span><?php echo number_format($news['price'])?>đ</span></p>
 				<p class="detail-location">Địa chỉ: <span><?php echo $news['address'] ?></span></p>
 				<div class="line-break"></div>
 				<div class="box-title">
 					<h2 class="title">Mô tả chi tiết:</h2>
 				</div>
 				<div class="descript">
 					<div><?php echo $news['descript'] ?></div>
 				</div>
 			</div>
 			<?php if($news['iduser']!=$_SESSION['user']['id']): ?>
 			<form method="POST" id="rent">
 				<div class="form-group">
 					Chọn ngày thuê:&nbsp;&nbsp;&nbsp;&nbsp;<input type="date"  min="<?php echo getCurrentDate(); ?>" name="rentdate" id="rentdate" onchange="checkStartDate()">
 					<div style="float: right;">
 						Chọn ngày trả:&nbsp;&nbsp;&nbsp;&nbsp;<input  type="date" id="returndate" onchange="checkEndDate()" name="returndate">
 					</div>
 				</div>
 			</form>
 			<div style="display: inline-block;width: 100%">
 				
 				<div class="popover__wrapper">
 					<button  disabled class="btn  btn-success order" >Đặt xe</button>
 					<div class="popover__content">
 						<div class="popover__message"><?php if(!isset($_SESSION['user'])) echo 'Bạn cần đăng nhập để tiếp tục'; else echo 'bạn cần chọn ngày thuê và ngày trả' ?></div>
 					</div>
 				</div>
 				<div style="color: red;margin-top: 5px">*Quý khách vui lòng chọn khoảng thời gian thuê xe khác các ngày dưới đây</div>

 			</div>
 			<?php endif ?>
 			<div class="history" >
 				<?php if (!empty($history)) { ?>
 				<h3>Các ngày đã được đặt</h3>
 				<table class="table">
 					<tr>
 						<th>STT</th>
 						<th>Ngày thuê</th>
 						<th>Ngày trả</th>
 					</tr>
 					<?php $stt = 0; foreach ($history as $key ): $stt++?>
 					<?php $rangeordered[] = array(strtotime($key['rent_date']), strtotime($key['return_date'])); ?>
 					<tr>
 						<td><?php echo $stt ?></td>
 						<td ><?php echo $key['rent_date'] ?></td>
 						<td><?php echo $key['return_date'] ?></td>
 					</tr>
 				<?php endforeach ?>
 			</table>
 		<?php } ?>
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
 			<?php }else echo '<p>Đăng nhập để bình luận bài viết này</p>' ;?>

 		</div>
 </div>

 <div class="modal fade" id="exampleModalCenter" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 	<div class="modal-dialog modal-dialog-centered" role="document">
 		<div class="modal-content">
 			<div class="modal-header">
 				<h5 class="modal-title" id="exampleModalLongTitle">Thông báo</h5>
 			</div>
 			<div class="modal-body">
 			</div>
 			<div class="modal-footer">
 				<button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
 				<button type="button" class="btn btn-primary" onclick="submit()">Xác nhận thuê xe</button>
 			</div>
 		</div>
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
 							<a href="?controller=blog&id=<?=$key['id'] ?>"><h3><?=$key['title'] ?></h3></a>
 						</div>
 					</div>
 				<?php endforeach ?>
 			</div>
 		</div>
 	</div>
</div>
<script type="text/javascript">
	var Difference_In_Days;
	function checkStartDate() {
		var currentday = new Date(new Date().toJSON().slice(0,10).replace(/-/g,'/'));
		var rentday = $('#rentdate').val();
		var start_day = new Date(rentday);
		var Difference_In_Time = start_day.getTime() - currentday.getTime();
		var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
		if (Difference_In_Days < 0) alert('Ngày thuê không hợp lệ');
		else $('#returndate').attr('min',rentday);
	}
	function checkEndDate() {
		var rentday = $('#rentdate').val();
		if(rentday!=''){
			var start_day = new Date(rentday);
			var end_day = new Date($('#returndate').val());
			var Difference_In_Time = end_day.getTime() - start_day.getTime();
			Difference_In_Days = (Difference_In_Time / (1000 * 3600 * 24))+1;
			if (Difference_In_Days < 0) alert('Ngày trả không hợp lệ');
			else if (Difference_In_Days > 20){
				alert('Bạn chỉ được thuê xe trong 20 ngày');
				$('#returndate').val(rentday);
			}
			else{
				$('.order').prop("disabled", false);
				$('.popover__wrapper').attr('class','');
			} 
		}
		else{
			$('#returndate').val('');
			alert('Bạn phải chọn ngày thuê trước');
		} 
	}
	$(document).on("click", ".order", function () {
		<?php if(!isset($_SESSION['user'])) echo "alert('Bạn cần đăng nhập để đặt xe');"; else{?>
			var rentday = $('#rentdate').val();
			var total = Math.floor(Difference_In_Days)*<?php echo $news['price'] ?>;
			var message = 'Bạn đã chọn thuê xe vào ngày ' + rentday+'  với đơn giá <?php echo $news['price'] ?>đ/ngày, số ngày thuê '+Math.floor(Difference_In_Days)+
			' ngày. Bạn hảy đảm bảo trong ví của bạn có đủ '+total+' vnđ để xác nhận đặt xe';
			$(".modal-body").append(message);
			$('#exampleModalCenter').modal('show');
		<?php } ?>

		
	});
	function submit(){
		$('#rent').submit();
	}
 	function send() {
 		var iduser = <?=$_SESSION['user']['id'] ?>;
 		var content = $('#content').val();
 		var idnews = <?=$id ?>;
 		$.get("Ajax/?controller=comment", {iduser:iduser,content:content,idblog:0,idnews:idnews}, function(result){
 			$('#comments').append(result);
 		});
 	}

</script>
