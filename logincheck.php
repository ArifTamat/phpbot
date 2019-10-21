<?php
session_start();

            $_SESSION["login_error"] = ""; 
            if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
				
               if ($_POST['username'] == 'Admin' && 
                  $_POST['password'] == '451031225') {

                    $_SESSION["username"] = $_POST;
                    header("Location: home.php");
                    
                    exit();    
               }else {
                  $_SESSION["login_error"] = "กรุณาตรวจสอบข้อมูลอีกครั้ง";
               }
            }
            header("Location: login.php");
            ?>
  