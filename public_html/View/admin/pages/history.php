<style type="text/css">
    .badge {
        cursor: pointer;
    }
</style>
<div class="content-wrapper" style="min-height: 1203.6px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lịch sử nạp tiền</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Lịch sử nạp tiền</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"></div>
                            <div class="col-sm-12 col-md-6"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <?php  
                                if (isset($_SESSION['thongbao'])) {?>
                                    <div class="form-group alert alert-primary">
                                        <?=$_SESSION['thongbao']?>
                                        <?php unset($_SESSION['thongbao']); ?>
                                    </div>
                                <?php }
                                ?>
                                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">STT</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Tên người dùng</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Số tiền</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Cách thức nạp</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Thời gian</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody id="product">
                                        <?php
                                        $stt = 0;
                                        foreach ($bill as $history) {?>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1"><?=++$stt?></td>
                                                <td><?=$history['name']?></td>
                                                <?php if ($history['idbank']==0) { ?>
                                                <td style="text-align: center;"><?=$history['amount']?></td>
                                                <td style="text-align: center;">Chuyển khoản</td>
                                                <?php }else if ($history['idbanking']==0) {?>
                                                <td style="text-align: center;"><?=$history['price']?></td>
                                                <td style="text-align: center;">Nạp thẻ điện thoại</td>
                                                <?php } ?>
                                                <td style="text-align: center;"><?=$history['time_created']?></td>
                                            </tr>
                                        <?php }
                                        ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


