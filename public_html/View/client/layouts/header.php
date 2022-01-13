<?php session_start();
$tag = "javascript:ask();";
?>
<title>Rent for Run</title>
<head>
  <link href="Public/client/css/bootstrap.css" rel='stylesheet' type='text/css' />
  <link href="Public/client/css/all.min.css" rel='stylesheet' type='text/css' />
  <script src="Public/client/js/jquery-2.2.3.min.js"></script>
  <script src="Public/client/js/bootstrap.js"></script>
  <link href="Public/client/css/style.css" rel='stylesheet' type='text/css' />

</head>
<header class="bg-black">
  <div class="container">
   <nav class="navbar navbar-expand-lg row black  " >
    <a class="navbar-brand col-1" href="./" style="color: #3d581b !important; font-size: 30px "><img src="Public/client/img/logo.png" style="width: 80px; height: 80px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="col-1"></div>
    <form class="form-inline my-2 my-lg-0 col-6" method="GET">
      <input class="form-control" type="search" name="find" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <div class="col-1"></div>
    <span class="navbar-text black col-3  ">
      <?php if (isset($_SESSION['user'])){ if($_SESSION['user']['role'] == 'admin'){ ?>
        <a href="View/admin" style="color: #28a745"><?php echo $_SESSION['user']['name'] ?></a> | <a href="?controller=logout">Đăng xuất</a>
    <?php } else{ $tag = "?controller=post"?> 
     <div class="dropdown" >
      <div class="dropbtn" style="color: #28a745"><?php echo $_SESSION['user']['name'] ?></div>
      <div class="dropdown-content">
        <a href="?controller=profile&id=<?=$_SESSION['user']['id'] ?>">Thông tin cá nhân</a>
        <a href="?controller=profile&type=manage&id=<?=$_SESSION['user']['id'] ?>">Quản lý tin đăng</a>
        <a href="?controller=logout">Đăng xuất</a>
      </div>
    </div>
    <a href="<?php echo $tag ?>">đăng tin</a>
    <?php  }} else{ ?><a href="?controller=signin">đăng nhập</a>  |
    <a href="<?php echo $tag ?>">đăng tin</a>
    <?php } ?>
  </span>
</nav>
</div>
</header>
<section class="sticky">
  <div class="container">
    <div class="sticky" id="sticky" >
      <div class="area-inner">
        <div class="area-content">
          <div class="list-menu">
            <h2 class="item-menu">
              <a href="?controller=home&type=4">
                <span >xe điện</span>
              </a>
            </h2>
            <h2 class="item-menu">
              <a href="?controller=home&type=1">xe máy</a>
            </h2>
            <h2 class="item-menu">
              <a class="menu-link" href="?controller=home&type=2">
                <span>xe 4 chỗ</span>
              </a>
            </h2>
            <h2 class="item-menu">
              <a href="?controller=home&type=3">xe 7 chỗ</a>
            </h2>
            <h2 class="item-menu">
              <a href="?controller=home&type=5">xe du lịch</a>
            </h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php if(!isset($_GET['controller']) || $_GET['controller']=='home') {?>
  <div class="container">
    <img  style="height: 400px; width: 1100px" class="banner" src="Public/client/img/banner.png">
  </div>
<?php } ?>
  }
  window.onscroll = function(){
    var x = $(window).scrollTop();
    if(x>115){
     $('.sticky').css({                   
      position: 'sticky',
    });
   }
   else  $('.sticky').css({                   
    position: 'static',
  });
 }
 function ask(){
  if (confirm("Bản phải đăng nhập để thực hiện thao tác này")) window.location.href = "?controller=signin";
}
</script>