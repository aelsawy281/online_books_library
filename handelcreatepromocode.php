<?php
session_start();
include 'promocode.php';
include 'book.php';
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $typeErr =$valueErr =$booknameErr ="";
if (isset($_POST['save'])){
  if (empty($_POST["type"])) {
    $typeErr = "type is required";
    $_SESSION['typeErr']=$typeErr;
  } else {
    $type = test_input($_POST["type"]);
    $_SESSION['type']=$type;
  }

  if (empty($_POST["value"])) {
    $valueErr = "value is required";
    $_SESSION['valueErr']=$valueErr;
  } else {
    $value = test_input($_POST["value"]);
    $_SESSION['value']=$value;
   
  }
  
    if (empty($_POST["bookname"])) {
        $booknameErr = "bookname is required";
        $_SESSION['booknameErr']=$booknameErr;
      } else {
        $bookname = test_input($_POST["bookname"]);
        $_SESSION['bookname']=$bookname;}
}

if( $typeErr !="" or $valueErr!="" or $booknameErr !=""){
    header('location:createpromocode.php');
}
else{
$b=new Book();
$book=$b->retrivebyname($bookname);
$data=['type'=>$type,'value'=>$value,'book_id'=>$book['id']];
$p=new Promocode();
$p->insert($data);
header("location:booklist.php");
}
?>
