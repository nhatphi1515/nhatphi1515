<style>
    /*.area-inner{*/
    /*    margin: 30px auto 0;*/
    /*}*/
</style>
<div class="container" >
	<h1>Đăng tin</h1>
	<form method="POST"  enctype="multipart/form-data" >
		<div class="row">
			<div class="group" style="width: 100%">
				<label>Chọn thông tin</label>
				<div class="row">
					<select class="col-2" name="type" id="type" onchange="categoryOption()" style="margin-right: 20px">
						<option>Loại xe</option>
						<?php foreach ($typecar as $key): ?>
							<option value="<?php echo $key['id'] ?>"><?php echo $key['name'] ?></option>
						<?php endforeach ?>
					</select>
					<select class="col-2" id="brand" name="brand" style="margin-right: 20px">
						<option>Hãng xe</option>
					</select>
					<select class="col-2"  name="color" style="margin-right: 20px">
						<?php foreach ($colorcar as $key): ?>
							<option value="<?php echo $key['id'] ?>"><?php echo $key['color'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="group" style="width: 100%">
				<label>Tiêu đề</label>
				<div class="row">
					<input class="col-6" type="" name="title" style="margin-right: 20px">
				</div>
			</div>
			<div class="group" style="width: 100%">
				<label>Giá</label>
				<div class="row">
					<input  class="col-3" type="" name="price" style="margin-right: 20px">
				</div>
			</div>
			<div class="group" style="width: 100%">
				<label>Địa chỉ</label>
				<div class="row">
					<select class="col-2"  name="province" id="province" onchange="provinceOption()" style="margin-right: 20px">
						<option>Tỉnh</option>
						<?php foreach ($province as $key): ?>
							<option value="<?php echo $key['id'] ?>"><?php echo $key['_name'] ?></option>
						<?php endforeach ?>
					</select>
					<select class="col-2"  name="district" id="district" style="margin-right: 20px">
						<option>Quận/huyện</option>
					</select>
					<input  placeholder="số nhà" class="col-3" type="" name="address">
				</div>
			</div>
			<div class="group" style="width: 100%">
				<label>Mô tả chi tiết</label>
				<div class="row">
					<textarea name="descript" id="editor"></textarea> 
				</div>
			</div>
			<div class="group">
				<label>Ảnh</label>
				<input style="margin-top: 30px;" class="col-12" type="file"  accept=".jpg,.jpeg,.png"  name="img"> <br>
			</div>
			<p class="col-12">phí tin đăng: 15 000 vnd</p>
			<button>Đăng tin</button>
		</div>
	</form>
</div>
<script src="Public/client/js/ckeditor.js"></script>
<script type="text/javascript">
	function categoryOption(type) {
		var id = $('#type').val();
		$.post("Ajax/brandcar.php", {id:id}, function(result){
			$('#brand').html(result);
		});
	}
	function provinceOption(type) {
		var id = $('#province').val();
		$.post("Ajax/district.php", {id:id}, function(result){
			$('#district').html(result);
		});
	}

</script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>