<style type="text/css">
	td{
		padding: 10px;
		border: 1px solid black;
	}
	tr{
		margin-bottom: 10px;
	}
	.center{
		padding-top: 30px;
		margin: auto;
		width: 60%;
	}
	.status{
		border: 1px solid black;
		margin-top: 5px;
		cursor: pointer;
	}
	.description{
		width: 300px;
		height: 21px;
	    overflow: hidden;
	    white-space: nowrap; 
	    text-overflow: ellipsis;
	    margin-top: 5px;
	}
</style>
<h3 style="text-align: center; margin-bottom: 20px;">Quản lý tin</h3>
<div id="managerental">
	<?php if (empty($news)) echo "<p style='margin-top:20px;'>Bạn chưa đăng tin nào.<p>"; else{ ?>
    <div class="row">
	    <table class="col-12" style="text-align: center;">	
	    	<?php $id = -1; ?>
	    	<?php foreach ($news as $key ): ?>
	    		<?php if ($key['id'] != $id): ?>
	    	<tr>
	    		<td style=" padding: 0;width: 80px; height: 50px;"><a href="?controller=detail&id=<?php echo $key['id'] ?>"><img style="width: 100%; height: 100%" src="Public/client/img/<?php echo $key['img'] ?>"></a></td>
	    		<td><a href="?controller=detail&id=<?=$key['id'] ?>"><?php echo $key['title'] ?></a> <br></td>
	    		<td>tình trạng xe <br><div onclick="manageRental(<?=$key['id'] ?>)" class="status"><?php echo $this->getStatus($key); ?></div></td>
	    	</tr>
	    		<?php endif ?>
	    		<?php $id = $key['id']; ?>
	    	<?php endforeach ?>
	    </table>
    </div>
	<?php } ?>
 </div>