<?php
include 'book.php';
$id=$_POST['delete_book'];
$b=new Book();
$b->delete($id);
header('location:booklist.php')



?>