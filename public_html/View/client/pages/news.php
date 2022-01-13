<div class="inner">
	<div class="title">
		<h2>Tin mới nhất</h2>
	</div>
	<?php if(empty($news)) echo "<p style='margin-top:20px;'>Không có bài đăng nào.<p>"; else{?>
		<div class="list-item">
			<?php foreach ($news as $key ): ?>
				<div class="item">
					<a href="?controller=detail&id=<?php echo $key['id'] ?>">
						<img class="img-left" src="Public/client/img/<?php echo $key['img'] ?>">
					</a>
					<div class="item-in4">
						<a href="?controller=detail&id=<?php echo $key['id'] ?>"><h3><?php echo $key['title'] ?></h3></a>
						<p class="price"><?= number_format($key['price']);?>đ/ngày</p>
						<p class="location"><?php echo $key['address'] ?></p>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	<?php } ?>
</div>

