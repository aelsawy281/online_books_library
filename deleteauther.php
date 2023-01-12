<?php
include 'auther.php';
$id=$_POST['delete_auther'];
$a=new Auther();
$a->delete($id);
header('location:autherlist.php')


?>