<div class="content-wrapper" style="min-height: 365px;">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Trang chủ</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Admin</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-info">
						<div class="inner">
							<h4>Đơn thuê</h4>
							<h3><?=$countbill ?></h3>
						</div>
						<div class="icon">
							<i class="ion ion-bag"></i>
						</div>
						
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-success">
						<div class="inner">
							<h4>Doanh thu</h4>
							<h3><?=$total?>vnđ</h3>
						</div>
						<div class="icon">
							<i class="ion ion-stats-bars"></i>
						</div>
						
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-warning">
						<div class="inner">
							<h4 style="color: #fff">THÀNH VIÊN</h4>
							<h3><?=$countuser?></h3>
						</div>
						<div class="icon">
							<i class="ion ion-person-add"></i>
						</div>
						
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-danger">
						<div class="inner">
							<h4>Bài đăng</h4>
							<h3><?=$countnews?></h3>
						</div>
						<div class="icon">
							<i class="ion ion-pie-graph"></i>
						</div>
					
					</div>
				</div>
				<!-- ./col -->
			</div>
		</div>