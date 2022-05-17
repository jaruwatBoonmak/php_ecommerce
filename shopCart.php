<?php
  require_once './function/connect.php';
  $sql="select * from product";
  $res=mysqli_query($link, $sql);
  include './function/cart.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/styleIndex.css">
    <title>Cart</title>
</head>
<body>
    <div class="headBar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="index.php"><img src="./src/image/รูปหน้าหลัก/logo.png" alt="" width="70%" height="70%"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./user/checkOrder.php">ตรวจสอบ order</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./admin/adminLogin.php">สำหรับพนักงาน</a>
                  </li>
                </ul>
                <form class="d-flex">
                    <?php
                      if (isset($_SESSION['user_email'])) {
                        ?>
                        <a class="nav-link active" aria-current="page" href="#"><?php echo $_SESSION['user_email'];?></a>
                        <a href="#"><button type="button" class="btn btn-primary btn-sm" style="margin: 10px;">ตะกร้า <?php $_SESSION["sum_cart"]?></button></a>
                        <a href="./function/logout.php"><button type="button" class="btn btn-secondary btn-sm" style="margin: 10px;">Log Out</button></a>
                        <?php
                      }else{
                        ?>
                          <a href="./login.php"><button type="button" class="btn btn-primary btn-sm" style="margin: 10px;">Login</button></a>
                          <button type="button" class="btn btn-secondary btn-sm" style="margin: 10px;">Register</button>
                        <?php
                      }
                    ?>
                    
                </form>
              </div>
            </div>
          </nav>
    </div>
    <div class="sliderPage">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="./src/image/รูปหน้าหลัก/home1.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="./src/image/รูปหน้าหลัก/home2.png" class="d-block w-100" alt="..." id="imageOntop2" >
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </div>
    <div class="onTop">
        <div class="container-fluid p-5 bg-primary text-white text-center">
            <h1>Thongthoon Shop</h1>
            <p></p> 
        </div>
    </div>
    <div class="tableTotal" style="padding:20px;">
    <?php
      if(!empty($_SESSION["shopping_cart"]) || !empty($_SESSION["shopping_packet"])){
        ?>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">สินค้า</th>
                <th scope="col">จำนวน</th>
                <th scope="col">ราคา</th>
                <th scope="col">รวม</th>
                <th scope="col">ดำเนินการ</th>
              </tr>
            </thead>
            <tbody>
        <?php
              $totalPacket = "";
              $totalPrice=0;
              if(isset($_SESSION["shopping_cart"])){
                foreach($_SESSION["shopping_cart"] as $key => $value){
        ?>
                  <tr>
                    <th scope="row"><?php echo $value['item_name'];?></th>
                    <td><?php echo $value['item_quantity'];?></td>
                    <td><?php echo $value['item_price'];?></td>
                    <td><?php echo $value['item_quantity']*$value['item_price'];?></td>
                    <td><a href="index.php?action=delete&id=<?php echo $value['item_id'];?>">ลบสินค้า</a></td>
                  </tr>
                  
                <?php 
                } 
              }?>
    
              </tbody>
            </table>
            <table class="table">
            <thead>
              <tr>
                <th scope="col">สินค้าจัดชุด</th>
                <th scope="col">จำนวน</th>
                <th scope="col">รวม</th>
                <th scope="col">ดำเนินการ</th>
              </tr>
            </thead>
            <tbody>
        <?php
            if(isset($_SESSION["shopping_packet"])){
              $totalPacket = "";
              $totalPrice=0;
              $idPacket = 0;
              foreach($_SESSION["shopping_packet"] as $key => $value){
                $totalPacket .= $value['item_name']." x ".$value['item_quantity']."<br>";
                $totalPrice = $totalPrice + ($value['item_quantity']*$value['item_price']);
                $idPacket+=1;
              }
              ?>
                <tr>
                    <th scope="row"><?php echo $totalPacket;?></th>
                    <td>1</td>
                    <td><?php echo $totalPrice;?></td>
                    <td><a href="index.php?action=delete&id=AA">ลบสินค้า</a></td>
                </tr>
              <?php
            }
        ?>
            
              </tbody>
            </table>
          <a href="./user/checkout.php"><button type="button" class="btn btn-primary btn-sm" style="margin: 10px; float: right;">จ่ายเงิน</button></a>
        <?php
      }
    ?>
    </div>
    
    <?php include 'footer.php'?>
</body>
</html>