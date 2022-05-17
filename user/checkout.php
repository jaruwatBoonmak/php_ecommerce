<?php
  require_once '../function/connect.php';
  include '../function/cart.php';
  if (isset($_SESSION['user_email']) && isset($_SESSION['shopping_cart'])) {
    $userEmail = $_SESSION['user_email'];
    $sql = "SELECT * FROM user WHERE user_email='$userEmail'";
    $result = mysqli_query($link, $sql);

    $row = mysqli_fetch_assoc($result);
    $uadd = $row["user_add"];


    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../style/styleIndex.css">
        <title>Check Out</title>
    </head>
    <body>
        <div class="headBar">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                <a class="navbar-brand" href="../index.php"><img src="../src/image/รูปหน้าหลัก/logo.png" alt="" width="70%" height="70%"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./checkOrder.php">ตรวจสอบ order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/adminLogin.php">สำหรับพนักงาน</a>
                    </li>
                    </ul>
                    <form class="d-flex">
                        <?php
                        if (isset($_SESSION['user_email'])) {
                            ?>
                                <a class="nav-link active" aria-current="page" href="#"><?php echo $_SESSION['user_email'];?></a>
                                <a href="../shopCart.php"><button type="button" class="btn btn-primary btn-sm" style="margin: 10px;">ตะกร้า <?php $_SESSION["sum_cart"]?></button></a>
                                <a href="../function/logout.php"><button type="button" class="btn btn-primary btn-sm" style="margin: 10px;">Log Out</button></a>
                            <?php
                        }else{
                            ?>
                                <a href="../login.php"><button type="button" class="btn btn-primary btn-sm" style="margin: 10px;">Login</button></a>
                                <button type="button" class="btn btn-secondary btn-sm" style="margin: 10px;">Register</button>
                            <?php
                        }
                        ?>
                        
                    </form>
                </div>
                </div>
            </nav>
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
                        $totalPrice = $totalPrice + ($value['item_quantity']*$value['item_price']); 
                    } ?>
        
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
                  foreach($_SESSION["shopping_packet"] as $key => $value){
                    $totalPacket .= $value['item_name']." x ".$value['item_quantity']."<br>";
                    $totalPrice = $totalPrice + ($value['item_quantity']*$value['item_price']);
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
                
                <h2>รวม <?php echo number_format($totalPrice,2);?> บาท</h2>
                <form style="width: 40%; padding: 20px; " method="post" action="checkout.php" enctype="multipart/form-data">
                    <h2>หลักฐานการโอน</h2>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">ธนาคาร</label>
                        <input name="bank" type="text" class="form-control" id="exampleFormControlInput1" >
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">วันที่โอน</label>
                        <input name="date" type="date" class="form-control" id="exampleFormControlInput1" >
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">เวลาโอน</label>
                        <input name="time" type="time" class="form-control" id="exampleFormControlInput1">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">ที่อยู่จัดส่ง</label>
                        <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="3" ><?php echo $uadd;?></textarea>
                      </div>

                      <div class="form-group" style="padding: 20px;">
                        <label for="exampleFormControlFile1"> สลิปโอนเงิน : </label>
                        <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>

                    <div class="d-flex justify-content-center">
                        <input type="submit" name="submit1" class="btn btn-success btn-lg text-body"></input>
                    </div>
                </form>
            <?php
        }
        ?>
        </div>
        
        
    </body>
    </html>
    <?php
    include '../function/checkoutFunc.php';
}else{
    header("Location: ../index.php");
}
?>