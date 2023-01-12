<?php
session_start();
include 'auther.php';

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $nameErr ="";
if (isset($_POST['save_auther'])){
  if (empty($_POST["name"])) {
    $nameErr = "type is required";
    $_SESSION['typeErr']=$nameErr;
  } else {
    if (!preg_match ("/^[a-zA-z]*$/", $_POST['name']) ) {  
        $nameErr = "Only alphabets and whitespace are allowed.";  
        $_SESSION['nameErr']=$nameErr;    
    } else {  
        $name = test_input($_POST["name"]);
        $_SESSION['name']=$name;
    }   
  }
}
  else{
    header('location:createauther.php');
  }

  

if( $nameErr !="" ){
    header('location:createauther.php');
}
else{
$a=new Auther();
$data=["name"=>"$name"];
$a->insert($data);
header("location:autherlist.php");
}

?>
