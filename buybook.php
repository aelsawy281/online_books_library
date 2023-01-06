<?php
 session_start();
 include 'bookuser.php';
$bookId=$_GET['id'];
$userId=$_SESSION['user_id'];
$data=['user_id'=>$userId,'book_id'=>$bookId];
$bookUser=new Bookuser();
$result=$bookUser->retrive($userId,$bookId);
if($result==null){
    $bookUser->insert($data);
    
}

header("location:userbooklist.php");

?>