<?php
 require_once '../function/connect.php';
 $orderAll="";
 if(isset($_POST['submit1'])){
        $dir= "transf_proof/";
        $filename = $dir . basename($_FILES['file']['name']);

        if(move_uploaded_file($_FILES['file']['tmp_name'], $filename))
        {
            $order_bank = $_POST['bank'];
            $order_date = $_POST['date'];
            $order_time = $_POST['time'];
            $comm = "INSERT INTO tranfermoney VALUES (NULL, '$filename','$order_bank','$order_date','$order_time')";
            mysqli_query($link, $comm);

            foreach($_SESSION["shopping_cart"] as $key => $value){
                $orderAll .= $value['item_name']." x ".$value['item_quantity']."<br>";
    
            }
            date_default_timezone_set("Asia/Bangkok");
            $dateToday = date("Y/m/d");
            $timeNow = date("h:i:sa");
            $comm2 = "INSERT INTO orderproduct VALUES (NULL, '$dateToday','$timeNow','รอพิจารณา','$_SESSION[user_email]', '$orderAll')";
            mysqli_query($link, $comm2);

            unset($_SESSION["shopping_cart"]);
            echo '<script>alert("สินค้าส้่งซื้อ")</script>';
            echo '<script>window.location="../index.php"</script>';
        }
}
?>