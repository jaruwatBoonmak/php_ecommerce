<?php
$_SESSION["sum_cart"] = 0;
session_start();
if(isset($_POST["add_product"]))
{
  if(isset($_SESSION["shopping_cart"]))
  {
    $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
    if(!in_array($_GET["id"], $item_array_id))
    {
      $count = count($_SESSION["shopping_cart"]);
      $item_array = array(
        "item_id" => $_GET["id"],
        "item_name" => $_POST["hidden_name"],
        "item_price" => $_POST["hidden_price"],
        "item_quantity" => $_POST["quantity"]
      );
      $_SESSION["shopping_cart"][$count] = $item_array;
      $_SESSION["sum_cart"] += 1;

    }
    else{
      echo '<script>alert("สินค้าถูกเพิ่มแล้ว")</script>';
      echo '<script>window.location="index.php"</script>';
    }
  }else{
    $item_array = array(
      "item_id" => $_GET["id"],
      "item_name" => $_POST["hidden_name"],
      "item_price" => $_POST["hidden_price"],
      "item_quantity" => $_POST["quantity"]
    );
    $_SESSION["shopping_cart"][0] = $item_array;
    $_SESSION["sum_cart"] += 1;
  }
}
elseif(isset($_POST["add_packet"]))
{
  if(isset($_SESSION["shopping_packet"]))
  {
    $item_array_id = array_column($_SESSION["shopping_packet"], "item_id");
    if(!in_array($_GET["id"], $item_array_id))
    {
      $count = count($_SESSION["shopping_packet"]);
      $item_array1 = array(
        "item_id" => $_GET["id"],
        "item_name" => $_POST["hidden_name"],
        "item_price" => $_POST["hidden_price"],
        "item_quantity" => $_POST["quantity"]
      );
      $_SESSION["shopping_packet"][$count] = $item_array1;
      $_SESSION["sum_cart"] += 1;

    }
    else{
      echo '<script>alert("สินค้าถูกเพิ่มแล้ว")</script>';
      echo '<script>window.location="index.php"</script>';
    }
  }else{
    $item_array1 = array(
      "item_id" => $_GET["id"],
      "item_name" => $_POST["hidden_name"],
      "item_price" => $_POST["hidden_price"],
      "item_quantity" => $_POST["quantity"]
    );
    $_SESSION["shopping_packet"][0] = $item_array1;
    $_SESSION["sum_cart"] += 1;

  }
}

if(isset($_GET['action'])){
    if($_GET['action']=="delete"){
        if($_GET['id']=="AA"){
          unset($_SESSION["shopping_packet"]);
          echo '<script>alert("สินค้าถูกลบแล้ว")</script>';
          echo '<script>window.location="index.php"</script>';
        }else{
          foreach($_SESSION["shopping_cart"] as $key => $value){
            if($value['item_id']==$_GET['id']){
                unset($_SESSION["shopping_cart"][$key]);
                echo '<script>alert("สินค้าถูกลบแล้ว")</script>';
                echo '<script>window.location="index.php"</script>';
            }
        }
        }
        $_SESSION["sum_cart"] -= 1;
    }
}


?>
