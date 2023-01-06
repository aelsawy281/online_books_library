<?php 
session_start();
include 'authentication.php';
$password=$_POST['password'];
// die($password);
$email=$_POST['email'];
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $emailErr="";
if (isset($_POST['login'])){
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {  
        $emailErr = "Invalid email format";  
        $_SESSION['emailErr']=$emailErr;
        header("location:login.php");}

else{
$a=new Authentication();
$result=$a->login($email,$password);
if($result>0){
    $_SESSION['email']=$email;
    $_SESSION['password']=$password;
    if($email=='admin@gmail.com'){
        header("location:booklist.php"); 
    } 
    else{
        header("location:userbooklist.php");
    } 
}
else{
     
    $_SESSION['error']='email or password is not correct';
    header("location:login.php");  
}
}
}

?>
