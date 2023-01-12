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
if (isset($_POST['update_auther'])){
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    $_SESSION['nameErr']=$nameErr;
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

  
  $id=$_POST['id'];
if($nameErr !=""){
   header("location:editauther.php?id=$id");
}
else{
    $data=['name'=>$name];
    $a=new auther();
    $a->update($id,$data);
    header("location:autherlist.php") ;
}


  

?>