<?php
session_start();
//echo $_SESSION['email'];
if(isset($_SESSION['email'])){
    session_destroy();
    header("location:login.php");
}

?>