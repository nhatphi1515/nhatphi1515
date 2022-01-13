<div class="comment">
	<div class="avt">
		<img src="Public/client/img/<?php echo $key['avatar'] ?>">
	</div>
	<div class="infor">
		<ul>
			<li><?=$key['name']?></li>
			<li><i><?=$this->formatDateTime($key['time_created']);?></i></li>
		</ul>
		<p><?=$key['content']?></p>
	</div>
</div>