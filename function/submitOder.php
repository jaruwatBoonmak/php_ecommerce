<?php
    require_once 'connect.php';
    if(isset($_POST['yes'])){
        mysqli_query($link,"UPDATE orderproduct SET order_status='ยืนยัน' WHERE order_id='$_GET[order_id]'");
        // echo '<script>window.location="dashbord.php"</script>';
    }else{

        mysqli_query($link,"UPDATE orderproduct SET order_status='ยกเลิก' WHERE order_id='$_GET[order_id]'");
        // echo '<script>window.location="dashbord.php"</script>';
    }
?>