<?php
session_start();
include 'book.php';
include 'category.php';
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $nameErr = $priceErr ="";
if (isset($_POST['update_book'])){
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    $_SESSION['nameErr']=$nameErr;
  } else {
    $name = test_input($_POST["name"]);
    $_SESSION['name']=$name;
  }

  if (empty($_POST["price"])) {
    $priceErr = "price is required";
    $_SESSION['priceErr']=$priceErr;
  } else {
    $price = test_input($_POST["price"]);
    $_SESSION['price']=$price;
  }
    if (empty($_FILES["cover"])) {
      $cover = "";
    } else {
      $cover=$_FILES['cover']['name'];
      $temcover=$_FILES['cover']['tmp_name'];
      $folder="images/$cover";
      move_uploaded_file($temcover, $folder);
    }
  
    if (empty($_FILES["file"])) {
      $file = "";
    } else {
      $file=$_FILES['file']['name'];
      $temfile=$_FILES['file']['tmp_name'];
      $folder="files/$file";
      move_uploaded_file($temfile, $folder);
    }
    if (empty($_POST["bookcategory"])) {
      $categoryErr = "book category is required";
      $_SESSION['categoryErr']=$categoryErr;
    } else {
      $category = test_input($_POST["bookcategory"]);
      $_SESSION['bookcategory']=$category;
    }

}
  
  $id=$_POST['id'];
if( $priceErr !="" or  $nameErr !=""){
   header("location:editbook.php?id=$id");
}
else{
  $category=$_POST['bookcategory'];
  $c=new Category();
  $result=$c->retrivebyname($category);
 $category_id=$result['id'];
 $data=['bookname'=>$name,'price'=>$price,'cover'=>$cover,'pathoffile'=>$file,'category_id'=>$category_id];
$b=new Book();
$b->update($id,$data);
header("location:booklist.php");
}


  

?>