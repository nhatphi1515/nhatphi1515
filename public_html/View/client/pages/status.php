<div class="row">
	<span style="width: 30px; height: 30px; margin-bottom: 10px; cursor: pointer;" onclick="change('manage');"><img src="Public/client/img/back-arrow-svgrepo-com.svg"></span>
	<?php if (empty($news)) echo"<p>Chưa có ai thuê xe này.</p>"; else{ ?>
		<table class="col-12" style="text-align: center;">
			<tr>
				<th>Người thuê</th>
				<th>Ngày thuê</th>
				<th>Ngày trả</th>
				<th>Trạng thái</th>
				<th>Cho thuê</th>
			</tr>
			<?php foreach ($news as $key ): $icon = $this->getIcon($key['condtn']);?>
				<tr>
					<td><a href="?controller=profile&id=<?=$key['iduser']  ?>"><?=$key['name']  ?></a></td>
					<td><?=$key['rent_date']  ?></td>
					<td><?=$key['return_date']  ?></td>
					<td><?=$key['status']?></td>
					<?php if ($key['condtn'] == 'chưa xác nhận') { ?>
					<td><img style="width: 20px;height: 20px; cursor: pointer;" id="condition<?=$key['idbill']?>" onclick="permiss(<?=$key['idbill']?>)" src="Public/client/img/icons8-general-mandatory-action-40.png"></td>
					<?php }else{ ?>
					<td><img style="width: 20px;height: 20px;" src="Public/client/img/<?=$icon?>"></td>
					<?php } ?>
				</tr>
			<?php endforeach ?>
		<?php } ?>
	</table>
</div>
<div class="modal fade" id="confirm" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header" style="display: inherit;">
				<h5 class="modal-title" id="exampleModalLongTitle">xác nhận  cho thuê xe</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<input type='hidden' value='' id='idbill'>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" onclick="dismiss()">không cho thuê</button>
				<button type="button" class="btn btn-primary" onclick="agree()">cho thuê</button>
			</div>
		</div>
	</div>
</div>	