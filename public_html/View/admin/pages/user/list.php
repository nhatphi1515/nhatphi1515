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
                    <h1>Danh sách người dùng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Danh sách người dùng</li>
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
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Tên tài khoản</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Số coin</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Cấp quyền</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Nạp tiền</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Xóa</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody id="product">
                                        <?php
                                        $stt = 0;
                                        foreach ($datauser as $user) {?>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1"><?=++$stt?></td>
                                                <td><a href="../../../../?controller=profile&id=<?=$user['id']?>" target="_blank"><?=$user['name']?></a></td>
                                                <td class="sorting_1"><?=$user['account']?></td>
                                                <td class="sorting_1"><?=$user['coin']?></td>
                                                <td style="text-align: center;">
                                                    <span class="badge bg-primary" <?php if($user['role']=='admin') echo'style="cursor:no-drop"'; ?> id="role" data-id="<?=$user['id']?>" >
                                                        <?=$user['role'] ?>
                                                    </span>
                                                </td>
                                                <td style="text-align: center;">
                                                    <span class="badge bg-success">
                                                        <a href="javascript:;" data-id="<?=$user['id']?>"  data-name="<?=$user['name']?>" id="topup">
                                                            <img src="../../Public/client/img/icons8-get-cash-20.png">
                                                        </a>
                                                    </span>
                                                </td>
                                                <td style="text-align: center;">
                                                    <span class="badge bg-danger">
                                                        <a href="javascript:;" data-id="<?=$user['id']?>"  id="del">
                                                            <ion-icon name="trash-outline"></ion-icon>
                                                        </a>
                                                    </span>
                                                </td>
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
<script type="text/javascript">
    $(document).on('click','#role',function(){
        var id = $(this).attr('data-id');
        var role = $(this).text();
        if (role.indexOf("visitor") != -1){
            role = 'customer';
            $(this).text(role);
        } 
        else{
            role = 'visitor';
            $(this).text(role);
        } 
        $.ajax({
            url: '?controller=permission',
            method:"POST",
            data:{id:id, role:role},
            success:function(){
            }
        });
    });
    $(document).on('click','#del',function(){
        var id = $(this).attr('data-id');
        $.ajax({
            url: '?controller=delUser',
            method:"POST",
            data:{id:id},
            success:function(data){
                $(this).closest('tr').remove();
            }
        });
    });
    $(document).on('click','#topup',function(){
        var id = $(this).attr('data-id');
        var name = $(this).attr('data-name');
        $('.content-wrapper').html(`<div style="margin:100px;">
            Nạp tiền cho tài khoản `+name+`
            <form method='POST'>
                <label>Nhập số tiền muốn nạp</label>
                <input type="hidden" name="id" value="`+id+`">
                <input type="text" name="coin">
                <select name="type">
                <option value="add">nạp tiền</option>
                <option value="minus">trừ tiền</option>
                </select>
                <button type='submit'>đồng ý</button>
            </form></div>
            `);
    });
</script>

