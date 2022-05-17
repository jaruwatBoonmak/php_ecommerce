<?php
  require_once '../function/connect.php';
  session_start();
  $totalPri = 0;
  if (isset($_SESSION['user_email'])) {
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
                        <a class="nav-link" href="#">ตรวจสอบ order</a>
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
            <table class="table">
            <thead>
                <tr>
                <th scope="col">รายการสินค้า</th>
                <th scope="col">สถานะสินค้า</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $res=mysqli_query($link, "SELECT * FROM orderproduct");
                    while($row=mysqli_fetch_array($res))
                    {
                        if($_SESSION['user_email'] == $row['cus_id']){
                            ?>
                                <tr>
                                <td><?php echo $row['order_detail']; ?></td>
                                <td><?php echo $row['order_status']; ?></td>
                                </tr>
                            <?php
                        }
                    }
                ?>
    
            </tbody>
            </table>
        </div>
        
        
    </body>
    </html>
    <?php
    include '../function/checkoutFunc.php';
}else{
    header("Location: ../login.php");
}
?>