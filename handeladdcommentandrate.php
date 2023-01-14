<?php
session_start();
include 'comment.php';
include 'rate.php';


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $commentErr =$rateErr="";
if (isset($_POST['save_comment'])){
  if (empty($_POST["comment"])) {
    $commentErr = "comment is required";
    $_SESSION['commentErr']=$commentErr;
  } else {
    if (!preg_match ("/^[a-zA-z0-9]*$/", $_POST['comment']) ) {  
        $commentErr = "Only alphabetsand numbers and whitespace are allowed.";  
        $_SESSION['commentErr']=$commentErr;    
    } else {  
        $comment = test_input($_POST["comment"]);
        $_SESSION['comment']=$comment;
    }   
  }

  if (empty($_POST["rate"])) {
    $rateErr = "rate is required";
    $_SESSION['rateErr']=$rateErr;
  } else {
    if ( $_POST["rate"]>=0 and  $_POST["rate"]<6 ) {  
        $rate = test_input($_POST["rate"]);
        $_SESSION['rate']=$rate;
       
    } else {  
        $rateErr = "Only integer number from 1 to 5 are allowed.";  
        $_SESSION['rateErr']=$rateErr;    
    }   
  }
}
  else{
    $bbokname=$_SESSION['bookname'];
    $bookid=$_SESSION['book_id'];
    header("location:addcommentandrate.php?id=$bookid&bookname=$bookid");
  }

  

if( $commentErr !="" or $rateErr ){
    $bbokname=$_SESSION['bookname'];
    $bookid=$_SESSION['book_id'];
    header("location:addcommentandrate.php?id=$bookid&bookname=$bookid");
}
else{
$c=new Comment();
$r=new Rate();
$user_id=$_SESSION['user_id'];
$book_id=$_SESSION['book_id'];
$data1=["user_id"=>$user_id,"book_id"=>$book_id,"comment"=>$comment];
$c->insert($data1);
$data2=["user_id"=>$user_id,"book_id"=>$book_id,"rate"=>$rate];
$r->insert($data2);
header("location:userbooklist.php");
}

?>
