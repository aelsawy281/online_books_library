<?php
include 'category.php';
$id=$_POST['delete_category'];
$c=new Category();
$c->delete($id);
header('location:categorylist.php')


?>