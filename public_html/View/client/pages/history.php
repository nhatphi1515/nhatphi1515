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
	}
	.description{
		width: 300px;
		overflow: hidden;
		white-space: nowrap; 
		text-overflow: ellipsis;
		margin-top: 5px;
	}
	.receive{
		padding: 0 19 !important;
		margin-top: 5px !important;
	}
</style>
<div id="history">
	<h3 style="text-align: center; margin-bottom: 20px;">Lịch sử giao dịch</h3>
	<?php if (empty($bills)) echo "<p style='margin-top:20px;'>Bạn chưa thực hiện giao dịch nào.<p>"; else{ ?>
		<div class="row">
			<table class="col-12" style="text-align: center;">
				<?php  foreach ($bills as $key ): ?>
					<?php  $status = $this->getStatus2($key['rent_date'],$key['status']); ?>	
					<tr>
						<td><a href="?controller=detail&id=<?php echo $key['id'] ?>"><img style="width: 110px; height: 60px" src="Public/client/img/<?php echo $key['img'] ?>"></a></td>
						<input type="hidden" id="price<?php echo $key['id'] ?>" value="<?php echo $key['price'] ?>">
						<input type="hidden" id="iduser<?php echo $key['id'] ?>" value="<?php echo $key['iduser'] ?>">
						<td><?php echo $key['title'] ?> <br> <div style="margin-top: 10px">Ngày thuê: <div class="rent_date<?php echo $key['id'] ?>" style="display: inline-block;"><?php echo formatDate($key['rent_date']); ?></div>. Số ngày thuê: <div style="display: inline-block;" class="total_date<?php echo $key['id'] ?>"><?php echo dateDifference($key['rent_date'],$key['return_date']); ?></div></div></td>
						<?php if ($key['condtn'] == 'cho thuê') { ?>
						<td id="status_<?php echo $key['id'] ?>">
							<?php if($status=="huỷ xe"){?>
								đã đặt xe<br>
								<button class='btn receive btn-warning' onclick="cancel(<?php echo $key['id'] ?>)">Huỷ xe</button>
							<?php }else if($status == "Chưa nhận xe") {?>
								<?php echo $status ?><br>
								<button class='btn receive btn-success' onclick="receive(<?php echo $key['id'] ?>)" >Nhận xe</button>
							<?php }else if($status == "Đã huỷ xe"){ ?>
								đã đặt xe<br>
								<div class='status'><?=$status ?></div>
							<?php }else{ ?>
							đã đặt xe<br>
								<div class='status'><?=$status ?></div>
							<?php } ?>
						</td>
						<?php } else{ ?>
							<td>trạng thái <br>
								<div class='status'><?=$key['condtn']?></div>
							</td>
						<?php } ?>
					</tr>
				<?php endforeach ?>
			</table>
		</div>
	<?php } ?>
</div>
<div class="modal fade" id="cancelorder" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Thông báo</h5>
			</div>
			<div class="modal-body">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
				<button type="button" class="btn btn-primary" id="cancel">Xác nhận huỷ thuê xe</button>
			</div>
		</div>
	</div>
</div>	
