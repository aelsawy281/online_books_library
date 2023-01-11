<?php
session_start();
include 'category.php';

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $nameErr ="";
if (isset($_POST['save_category'])){
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
    header('location:createcategory.php');
  }

  

if( $nameErr !="" ){
    header('location:createcategory.php');
}
else{
$c=new category();
$data=["name"=>"$name"];
$c->insert($data);
header("location:categorylist.php");
}

?>
