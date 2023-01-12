<?php
/*$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
 $sql = "CREATE DATABASE library";


if ($conn->query($sql)) {



$sql2 = "use library";

if ($conn->query($sql2) === TRUE) {
    //create user table
    $sql1 = "CREATE TABLE `user` (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(255) NOT NULL,
        lastname VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        `password` VARCHAR(255) NOT NULL
         )";
         $conn->query($sql1);
       //create book table
       $sql = "CREATE TABLE `book` (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            bookname VARCHAR(255) NOT NULL,
            price float NOT NULL,
            cover VARCHAR(255) ,
            pathoffile VARCHAR(255) 
            )";
            $conn->query($sql);
            //create pivote table
      $sql = "CREATE TABLE book_user (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11) UNSIGNED NOT NULL,
    book_id INT(11) UNSIGNED NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(id),
    FOREIGN KEY (book_id) REFERENCES book(id)
    )";
    $conn->query($sql);
    //create promocode table
    $sql = "CREATE TABLE promocode (
       id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
       code VARCHAR(255) NOT NULL,
       `type` VARCHAR(255) NOT NULL,
       book_id INT(11) UNSIGNED ,
       FOREIGN KEY (book_id) REFERENCES book(id)
    )";
    $conn->query($sql);
  } 
  else {
    echo "Error creating table: " . $conn->error;
  }

}
*/
class DataBase {

    private $conn;
    private $host, $username, $password, $database;

    public function __construct($host, $username, $password, //$database
    ){
        $this->host        = $host;
        $this->username    = $username;
        $this->password    = $password;
        //$this->database    = $database;

        $this->conn = new mysqli($this->host, $this->username, $this->password);
        if ($this->conn->connect_error) {
          die("Connection failed: " . $this->conn->connect_error);
        }
        return true;
    }


      public function getconn(){
        return $this->conn;
      }

      public function runquery($query){
        if ($this->conn->query($query) === TRUE) {
          return true;
      }
      else{
        return $this->conn->error;
           }     
      }

      public function runqueryforlogin($query){
        $query_run = mysqli_query($this->conn, $query);
        
        $row = mysqli_fetch_array($query_run);  
        $count = mysqli_num_rows($query_run);
        return $count;
      }
      public function runqueryforedit($query){
        $query_run = mysqli_query($this->conn, $query);

        if(mysqli_num_rows($query_run) > 0)
        {
            $result = mysqli_fetch_array($query_run);
            return $result;
        } 
      }
        public function runqueryforlist($query){
          $query_run = mysqli_query($this->conn, $query);
          return $query_run;

      }

    public function create_db($database){
      $sql = "CREATE  DATABASE IF NOT EXISTS $database";
       $this->runquery($sql);
    }


    public function create_table($database) {
     $sql2 = "use $database";
 
     if ($this->runquery($sql2) === TRUE) {
     //create user table
     $sql1 = "CREATE TABLE IF NOT EXISTS `user` (
         id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
         firstname VARCHAR(255) NOT NULL,
         lastname VARCHAR(255) NOT NULL,
         email VARCHAR(255) NOT NULL UNIQUE,
         `password` VARCHAR(255) NOT NULL
          )";
          $this->runquery($sql1);

          //create category table
     $sql = "CREATE TABLE IF NOT EXISTS category (
      id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(255) NOT NULL
     
   )";
   $this->runquery($sql);

   //create auther table
   $sql = "CREATE TABLE IF NOT EXISTS auther (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
   
 )";
 $this->runquery($sql);
        //create book table
        $sql = "CREATE TABLE IF NOT EXISTS `book` (
             id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
             bookname VARCHAR(255) NOT NULL,
             price float NOT NULL,
             cover VARCHAR(255) ,
             pathoffile VARCHAR(255) ,
             category_id INT(11) UNSIGNED NOT NULL,
             auther_id INT(11) UNSIGNED NOT NULL,
             FOREIGN KEY (category_id) REFERENCES category(id),
             FOREIGN KEY (auther_id) REFERENCES auther(id)
             )";
            $this->runquery($sql);
             //create pivote table
       $sql = "CREATE TABLE IF NOT EXISTS book_user (
     id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
     user_id INT(11) UNSIGNED NOT NULL,
     book_id INT(11) UNSIGNED NOT NULL,
     price INT(11) UNSIGNED NOT NULL,
     FOREIGN KEY (user_id) REFERENCES user(id),
     FOREIGN KEY (book_id) REFERENCES book(id)
     )";
    $this->runquery($sql);
     //create promocode table
     $sql = "CREATE TABLE IF NOT EXISTS promocode (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        code VARCHAR(255) NOT NULL,
        `type` VARCHAR(255) NOT NULL,
        `value` float UNSIGNED NOT NULL,
        max_discound INT(11) UNSIGNED,
        book_id INT(11) UNSIGNED ,
        FOREIGN KEY (book_id) REFERENCES book(id)
     )";
     $this->runquery($sql);
     
   } 
   else {
     echo "Error creating table: " . $this->conn->error;
   
    }

}

   public function __destruct() {
        mysqli_close($this->conn)
            OR die("There was a problem disconnecting from the database.");
    }
    
}  

 $db=new DataBase('localhost','root','') ;
   $db->create_db('library');
   $db->create_table('library');