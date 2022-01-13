<style type="text/css">
    .info{
        margin-top: 30px;
    }
    table td, table th{
        text-align: center;
        border: 1px solid;
        padding: 10px;
    }
    .actived{
        background-color: grey;
    }
    .avatar{
        width: 80px;
        height: 80px;
        display: block;
        margin-right: auto;
        margin-left: auto;
        margin-bottom: 5px;
    }
    #option td{
        cursor: pointer;
    }
    .imgid{
        border: 1px solid black;
    }
    .imgid input{
        display: none;
    }
    .id{
        width: 100px;
        height: 100px;
    }
    .submit{
        margin-top: 30px;
        padding: 5px;
        display: block;
        margin-left: auto;
        margin-right: auto;
        font-size: 20px;
        width: 200px;
    }
    table{
        border-collapse: collapse;
        text-align: center;
    }
    textarea{
        width: 100%;
        height: 100px;
    }
</style>
<body>
    <div class="container">
        <div class="row" style="margin-top: 50px; margin-left: 30px;margin-bottom: 30px">
            <div class="col-2 info" >
                <img class="avatar" src="Public/client/img/<?= $user['avatar'] ?>">
                <hr>
                <table id="option">
                    <tr><td id="infor" <?php if(!isset($_GET['type'])) echo 'class="actived"'; ?>   onclick="change(this.id);">Thông tin cá nhân</td></tr>
                    <?php if (isset($_SESSION['user'])  && $iduser == $_SESSION['user']['id']) {?>
                    <tr><td id="wallet" onclick="change(this.id)">Ví cân nhân</td></tr>
                    <tr><td id="history" onclick="change(this.id);">Lịch sử giao dịch</td></tr>
                    <tr><td id="manage" <?php if(isset($_GET['type'])) echo 'class="actived"'; ?> onclick="change(this.id);">Quản Lí tin</td></tr>
                     <?php } ?>
                </table>
            </div>
            <div class="col-1"></div>
            <div class="col-7" id="in4">
                <?php if(isset($_GET['type'])) require $_GET['type'].'.php'; else require 'infor.php' ?>
            </div>
        </div>
    </div>
</body>
<?php if (isset($_SESSION['user'])  && $iduser == $_SESSION['user']['id']) {?>
<script type="text/javascript">
    function change(id) {
        var x = document.getElementById(id);
        var y = document.getElementById('in4');
        $('.actived').toggleClass('actived');
        switch(id){
            case'wallet': y.innerHTML = `<?php require 'wallet.php'; ?>`;
            break;
            case'manage': y.innerHTML = `<?php require 'manage.php'; ?>`;
            break;
            case'infor': y.innerHTML = `<?php require 'infor.php'; ?>`;
            break;
            case'history': y.innerHTML = `<?php require 'history.php'; ?>`;
            break;
        }
        x.className = "actived";

    }
    function topUp(id){
        var x = document.getElementById(id);
        var y = document.getElementById('topup');
        $('.active').toggleClass('active');
        if(id == 'bank')
            y.innerHTML = `<p>Chuyển tiền vào số tài khoản: 54010006513989</p><p>ngân hàng: BIDV</p><p>tên người thụ hưởng: Trần Nhật Phi</p><p>nội dung chuyển khoản: "Nạp tiền vào tài khoản - tên đăng nhập - số tiền"</p><p>Phí quy đổi: 0%</p>`;
        else change('wallet');
        x.className = "active";
    }
</script>
<script type="text/javascript">
    function receive(id){
        var iduser = $('#iduser'+id).val();
        var iduser2 = <?php echo $_SESSION['user']['id'] ?>;
        var total_date = $('.total_date'+id).text();
        var price =  $('#price'+id).val();
        var total_price = price*total_date;
        if(confirm("Bạn có chắc là bạn đã nhận xe ?"))
            changestatus(id,"Đã nhận xe","",iduser,total_price,iduser2);
    }
    function cancel(id) {
        var iduser = $('#iduser'+id).val();
        var rent_date = $('.rent_date'+id).text();
        var total_date = $('.total_date'+id).text();
        var price =  $('#price'+id).val();
        var total_price = price*total_date;
        var message = 'Bạn đã chọn thuê xe vào ngày ' + rent_date+'  với đơn giá '+price+'vnđ/ngày, số ngày thuê '+total_date+
        ' ngày. Sau khi hủy tiền sẽ được trả về tài khoản tuy nhiên bạn sẽ chịu'+
        ' 10% chi phí để hủy đơn đặt xe này. Hãy điền lý do vì sao hủy đặt xe:'+
        '<textarea id="reason"></textarea>'+
        '<input type="hidden" id="iduser" value="'+iduser+'">'+
        '<input type="hidden" id="total_price" value="'+total_price+'">'+
        '<input type="hidden" id="id" value="'+id+'">';
        $(".modal-body").html(message);
        $('#cancelorder').modal('show');
    }
    $(document).on("click", "#cancel", function () {
        var reason = $('#reason').val();
        var id = $('#id').val();
        var iduser = $('#iduser').val();
        var iduser2 = <?php echo $_SESSION['user']['id'] ?>;
        var total_price = $('#total_price').val();
        if(confirm("Bạn có chắc là bạn muốn huỷ đặt xe này?")){
            changestatus(id,"Đã huỷ xe",reason,iduser,total_price,iduser2);
            $('#cancelorder').modal('hide');
        }
    });
    function changestatus(id,status,reason,iduser,total_price,iduser2){
        $.post("Ajax/?controller=order", {id:id, status:status, reason:reason, iduser:iduser, total_price:total_price, iduser2:iduser2}, function(result){
            $('#status_'+id).html(result);
        });
    }
    function manageRental(id){
        $.post("Ajax/?controller=manage", {id:id}, function(result){
            $('#managerental').html(result);
        });
    }
    function permiss(id){
        $('#idbill').attr('value',id);
        $('#confirm').modal('show');
    }
    function agree(){
        var idbill = $('#idbill').val();
        if(confirm("Bạn có chắc là muốn cho người này thuê?")){
            $.post("Ajax/?controller=permissrent", {idbill:idbill,condition:'cho thuê'}, function(result){
                $('#condition'+idbill).attr('src','Public/client/img/'+result);
                $('#condition'+idbill).removeAttr('onclick');
                $('#condition'+idbill).css('cursor','auto');
                $('#confirm').modal('hide');
            });
         }
    }
     function dismiss(){
        var idbill = $('#idbill').val();
        if(confirm("Bạn có chắc là không muốn cho người này thuê?")){
            $.post("Ajax/?controller=permissrent", {idbill:idbill,condition:'không cho thuê'}, function(result){
                $('#condition'+idbill).attr('src','Public/client/img/'+result);
                $('#condition'+idbill).removeAttr('onclick');
                $('#condition'+idbill).css('cursor','auto');
                $('#confirm').modal('hide');
            });
        }
    }
</script>
 <?php }else echo $iduser ?>
