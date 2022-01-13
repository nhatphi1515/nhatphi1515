<!-- <form class="profile" method="POST" enctype="multipart/form-data"> -->
	<h3 style="text-align: center; margin-bottom: 20px; ">Thông tin cá nhân</h3>
	<div class="group">
		<label style="width:100%">Họ và tên</label>
		<input style="width:100%" type="text" name="fullname" disabled value="<?php echo $user['name'] ?>">
	</div>
	<div class="group">
		<div class="row">
			<div class="col-5" style="padding-bottom: 0px;">
				<label style="width:100%">Ngày sinh</label>
				<input style="width:100%" type="text" name="dob" disabled value="<?php echo $user['dayofbirth'] ?>">
			</div>
			<div class="col-2" style="padding-bottom: 0px;"></div>
			<div class="col-5" style="padding-bottom: 0px;">
				<label style="width:100%" name="sex">giới tính</label>
				<input style="width:20%" type="text" name="email" disabled value="<?php echo $user['sex'] ?>">
				<!-- <select style="width:100%">
					<option>Nam</option>
					<option>Nữ</option>
				</select> -->
			</div>
		</div>
	</div>
	<div class="group">
		<div class="row">
			<div class="col-5" style="padding-bottom: 0px;">
				<label style="width:100%">Email</label>
				<input style="width:100%" type="text" name="email" disabled value="<?php echo $user['email'] ?>">
			</div>
			<div class="col-2" style="padding-bottom: 0px;"></div>
			<div class="col-5" style="padding-bottom: 0px;">
				<label style="width:100%">Số điện thoại</label>
				<input style="width:100%" type="text" name="phonenumber" disabled value="<?php echo $user['phonenumber'] ?>">
			</div>
		</div>
	</div>
	<?php if (isset($_SESSION['user'])  && ($iduser == $_SESSION['user']['id'] || $_SESSION['user']['role'] =='admin')) {?>
	<div class="group">
		<label>ảnh CMND mặt trước</label>
		<div class="imgid">
			<!-- <input type="file" name="frontID" id="frontID"  /> -->
			<label for="frontID"><img src="Public/client/img/<?php echo  $user['frontID'] ?>" id="ifid" for="frontID" class="id"  ></label>
			<label id="fid"  ></label>
		</div>
	</div>
	<div class="group">
		<label >ảnh CMND mặt sau</label>
		<div class="imgid">
			<!-- <input type="file" name="backID" id="backID" /> -->
			<label for="backID"><img src="Public/client/img/<?php echo  $user['backID'] ?>"  id="ibid" class="id"  ></label>
			<label id="bid" ></label>
		</div>
	</div>
<?php } ?>
<!-- </form> -->
