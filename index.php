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
    <title>Main</title>
</head>
<body>
    <div class="headBar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="#"><img src="./src/image/รูปหน้าหลัก/logo.png" alt="" width="70%" height="70%"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
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
                        <a href="shopCart.php"><button type="button" class="btn btn-primary btn-sm" style="margin: 10px;">ตะกร้า <?php echo $_SESSION["sum_cart"];?></button></a>
                        <a href="./function/logout.php"><button type="button" class="btn btn-secondary btn-sm" style="margin: 10px;">Log Out</button></a>
                        <?php
                      }else{
                        ?>
                          <a href="shopCart.php"><button type="button" class="btn btn-primary btn-sm" style="margin: 10px;">ตะกร้า</button></a>
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
            <p>ร้านแม่ทองฑูรย์ สังฆภัณฑ์ น้อมบูชาสังฆทานคุณภาพแด่พระสงฆ์เพราะการถวายสังฆทานเป็นการถวายทานโดยไม่เลือกระบุเฉพาะเจาะจงพระสงฆ์รูปใดรูปหนึ่ง จึงมีอานิสงส์มาก การทำบุญให้เป็นสังฆทานที่มีคุณภาพโดยแท้จริงควรซื้อหาสินค้าโดยพิจารณาจากความต้องการและประโยชน์ของพระสงฆ์เป็นหลัก</p> 
        </div>
    </div>
    
    <div class="shop">
      <div class="row row-cols-1 row-cols-md-4 g-3">
        <?php
          while($row=mysqli_fetch_array($res)){
            ?>
              <form method="post" action="index.php?action=add&id=<?php echo $row['id'];?>">
                <div class="col">
                  <div class="card">
                    <img src="<?php echo $row['path_img'];?>" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $row['pro_name'];?></h5>
                      <p class="card-text"><?php echo $row['pro_price'];?> บาท</p>
                      <input type="text" name="quantity" class="form-control" value="1">
                      <input type="hidden" name="hidden_name" value="<?php echo $row['pro_name'];?>">
                      <input type="hidden" name="hidden_price" value="<?php echo $row['pro_price'];?>">
                      <input type="submit" name="add_product" style="margin-top: 5px; padding: 10px; background-color: aqua" class="btn btn-succes" value="เพิ่มลงตะกร้า">
                      <input type="submit" name="add_packet" style="margin-top: 5px; padding: 10px; background-color: aqua" class="btn btn-succes" value="จัดใส่ชุด">
                    </div>
                  </div>
                </div>
              </form>
            <?php
          } 
        ?>
      </div>   
    </div>
    <?php include 'footer.php'?>
</body>
</html>