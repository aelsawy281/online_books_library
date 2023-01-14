<?php
session_start();
include 'book.php';
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
 $name=$nameErr="";
if (isset($_POST['save_search'])){
  if (empty($_POST["search"])) {
    $nameErr = "name is required";
    $_SESSION['nameErr']=$nameErr;
  } else {
    $name = test_input($_POST["search"]);
    $_SESSION['name']=$name;
    
  }

  
if($nameErr !=""){
    header('location:booklist.php');
}
else{

header("location:resultOfSearch.php?name=$name");
}

}
?>