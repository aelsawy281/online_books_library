<?php 
session_start();
include 'authentication.php';
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $fnameErr= $lnameErr= $passwordErr=$emailErr="";
if (isset($_POST['save_user'])){
    if (!preg_match ("/^[a-zA-z]*$/", $_POST['firstname']) ) {  
        $fnameErr = "Only alphabets and whitespace are allowed.";  
        $_SESSION['fnameErr']=$fnameErr;    
    } else {  
        $fname = test_input($_POST["firstname"]);
        $_SESSION['fname']=$fname;
    }  
    if (!preg_match ("/^[a-zA-z]*$/", $_POST['lastname']) ) {  
        $lnameErr = "Only alphabets and whitespace are allowed.";  
        $_SESSION['lnameErr']=$lnameErr;    
    } else {  
        $lname = test_input($_POST["lastname"]);
        $_SESSION['lname']=$lname;
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {  
        $emailErr = "Invalid email format";  
        $_SESSION['emailErr']=$emailErr;
     
            
    } else {  
        $email= test_input($_POST["email"]);
        $_SESSION['email']=$email;
    }
  if ($_POST["password"] == $_POST["psw-repeat"]) {
    $password = test_input($_POST["password"]);
        $_SESSION['password']=$password;
  } else {
    $passwordErr="password is not the same as confirm password";
    $_SESSION['passwordErr']=$passwordErr;
}


}

if( $fnameErr !="" or$passwordErr !="" or  $lnameErr !=""){
    header('location:register.php');
}

else{
$data=['firstname'=>$fname,'lastname'=>$lname,'email'=>$email,'password'=>$password];
$a=new Authentication();
$a->register($data);
header("location:login.php");
}

?>
