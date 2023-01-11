<?php
session_start();
include 'promocode.php';
include 'bookuser.php';
$error="";
$_SESSION['book_id']=$_GET['id'];
if(isset($_POST['buy'])){
    $price=$_POST['price'];
    if (isset($_POST['promocode']) and !empty($_POST['promocode'])){
        $code=$_POST['promocode']; 
        if(strlen($code)>4){
        $error="code is not correct";
        $_SESSION['error']=$error;
        header("location:userbooklist.php");

                          }
         else{
          $p=new Promocode();
          $result=$p->retrive($code);
            if($result==null or $result['book_id']!= $_GET['id']){
             $error="code is not correct";
             $_SESSION['error']=$error;
            header("location:userbooklist.php");
                             }
            else if($result['book_id']==$_GET['id']){
         
             if($result['type']=='fixed'){
             $newprice= $price-$result['value']; 
             
                                         }
            else{
            $discound=(($result['value'])/100)*$price;
            if($discound >$result ['max_discound']){
                $discound=$result['max_discound'];  
                           }
            $newprice=$price-$discound;
              
                 }


                 
                 $userbook=new Bookuser();
                 $bookId=$_GET['id'];
                 $userId=$_SESSION['user_id'];
                 $data=['user_id'=>$userId,'book_id'=>$bookId,'price'=>$newprice];
                 $userbook->insert($data);
                 header("location:userbooklist.php");
                }
              }
            }
            else{

                $newprice=$_POST['price'];
                $userbook=new Bookuser();
                $bookId=$_GET['id'];
                $_SESSION['book_id']=$bookId;
                $userId=$_SESSION['user_id'];
                $data=['user_id'=>$userId,'book_id'=>$bookId,'price'=>$newprice];
                $userbook->insert($data);
                header("location:userbooklist.php");   
            }
             
}

    else{
       
        header("location:userbooklist.php");
      
    }



?>