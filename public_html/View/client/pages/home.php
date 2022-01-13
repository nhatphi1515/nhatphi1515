<!DOCTYPE html>
<html>
<head>
	<title>Car</title>
</head>
<style type="text/css">
	.item-menu{
		margin:0; 
	}
</style>
<body>
	<?php if (isset($_GET['type'])) { ?>
		<div class="container">
			<p class="breadcumb">Trang chủ | <?php echo $type['name'] ?></p>
		</div>
		<div class="container box" >
			<form method="POST" class="row bg-black" onchange="filter()" style="margin-left: 0px; margin-right: 0px; margin-bottom: 30px; width: 100%">
				<select id="city" class="col" name="city" style="margin-right: 20px">
					<option value="0">Tỉnh/thành phố</option>
					<?php foreach ($province as $key ): ?>
						<option value="<?php echo $key['id'] ?>"><?php echo $key['_name'] ?></option>
					<?php endforeach ?>
				</select>
				<select  id="brand" class="col" name="brand" style="margin-right: 20px">
					<option value="0">hãng xe</option>
					<?php foreach ($brand as $key ): ?>
						<option value="<?php echo $key['id'] ?>"><?php echo $key['name'] ?></option>
					<?php endforeach ?>
				</select>
				<select  id="price" class="col" name="price" style="margin-right: 20px">
					<option value="1">giá</option>
					<option value="0-100000">< 100.000đ</option>
					<option value="100000-200000"> 100.000đ - 200.000đ</option>
					<option value="200000-500000"> 200.000đ - 500.000đ</option>
					<option value="500000-1000000"> 500.000đ - 1.000.000đ</option>
					<option value="1000000">> 1.000.000đ</option>
				</select>
				<select  id="color" class="col" name="color">
					<option value="0">màu sắc</option>
					<?php foreach ($color as $key ): ?>
						<option value="<?php echo $key['id'] ?>"><?php echo $key['color'] ?></option>
					<?php endforeach ?>
				</select>
			</form>
		</div>
	<?php } ?>
	<div class="container box" >
		<div class="row-left bg-black" id="news">
			<?php require 'news.php'; ?>	
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
</body>
</html>
<script type="text/javascript">
	function filter() {
		var city = document.getElementById("city").value;
		var brand = document.getElementById("brand").value;
		var price = document.getElementById("price").value;
		var color = document.getElementById("color").value;
		var category = <?php echo $_GET['type'] ?>;
		$.post("Ajax/?controller=filter", {city:city, brand:brand, price:price, color:color, category:category}, function(result){
			$('#news').html(result);
		});
	}
</script>