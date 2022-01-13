<style type="text/css">
	.center{
		padding-top: 30px;
		margin: auto;
		width: 60%;
	}
	.coin{
		border: 1px solid black;
		width: 70%;
		margin-bottom: 20px;
		padding: 5px;
		margin-left: 40px; 
		text-align: center;
	}
	.vertical-line{
		border-left: 1px solid black;
		height: 250px;
		position: absolute;
		left: 50%;
		margin-left: -3px;
		top: 130px;
	}
	.title .top-up{
		display: inline-block;
		margin-left: 140px;
	}
	.title .top-up span{
		margin-right: 20px;
		color: #9B9B9B;
		cursor: pointer;
	}
	.title .top-up span.active{
		border-bottom: 2px solid green;
		color: black;
		cursor: default;
	}
	#wllt p{
		width: 100%;
	}
</style>
<h3 style="text-align: center; margin-bottom: 20px;">Ví cá nhân</h3>
<div id="wllt" style="height: 323px">
	<p class="coin">số dư trong tài khoản: <?php echo $user['coin']+$coin ?>vnđ </p>
	<div class="title" style="border-bottom: none">
		<h2 style="margin-bottom: 30px">Nạp tiền vào tài khoản:</h2>
		<div class="top-up">
			<span class="active" id="card" onclick="topUp(this.id)">Thẻ điện thoại</span>
			<span id="bank" onclick="topUp(this.id)">thẻ ngân hàng</span>
		</div>
	</div>
	<div class="row" id="topup">
		<table class="col-5" >
			<tr>
				<th>Mệnh giá</th>
				<th>Quy đổi</th>
			</tr>
			<tr>
				<td>20.000 vnđ</td>
				<td>phí 10%</td>
			</tr>
			<tr>
				<td>50.000 vnđ</td>
				<td>phí 10%</td>
			</tr>
			<tr>
				<td>100.000 vnđ</td>
				<td>phí 10%</td>
			</tr>
			<tr>
				<td>200.000 vnđ</td>
				<td>phí 10%</td>
			</tr>
		</table>
		<div class="col-1 "></div>
		<div class="vertical-line"></div>
		<form  method="POST" class="col-6"  style="padding-top: 0px">
			<label>Số seri:</label>
			<input type="text" name="seri" placeholder="số seri">
			<label>Mã thẻ:</label>
			<input type="text" name="code" placeholder="mã thẻ">
			<div class="center">
				<button>Xác nhận</button>
			</div>
		</form>
	</div>
</div>