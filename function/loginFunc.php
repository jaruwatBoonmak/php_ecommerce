<?php
    require_once 'connect.php';
    session_start();
    if(isset($_GET['action'])){
        if($_GET['action']=="login"){
            if(isset($_POST['username']) && isset($_POST['password'])){
                $uname = $_POST['username'];
                $pass = $_POST['password'];
                $sql = "SELECT * FROM user WHERE user_email='$uname' AND user_pass='$pass'";
                $result = mysqli_query($link, $sql);
                
                if (mysqli_num_rows($result) === 1){
                    $row = mysqli_fetch_assoc($result);
                    if ($row['user_email'] === $uname && $row['user_pass'] === $pass){
                        $_SESSION['user_email'] = $row['user_email'];
                        $_SESSION['user_name'] = $row['user_name'];

                        header("Location: index.php");

                    }else{
                        header("Location: login.php");
                    }

                }else{
                    header("Location: login.php");
                }           
            }
        }else{
            header("Location: login.php");
        }
    }
?>