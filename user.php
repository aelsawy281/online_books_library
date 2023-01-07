<?php
include_once 'db.php';
class User{
    private $fname;
    private $lname;
    private $password;
    private $email;
    private $db;
    private $nameOfDb = "use ad";
    public function __construct(){
  
     $this->db=new DataBase('localhost','root','');
   }
    public function delete($id){
        $query = "DELETE FROM user WHERE id = $id";
        if ($this->db->runquery($this->nameOfDb) === TRUE) {
            $this->db->runquery($query);
         
                                              }
 
    }
    public function update($id,$data){
    foreach($data as $key=>$value){
       // die("UPDATE user SET $key = '$value'  WHERE id =$id");
        $query="UPDATE user SET $key = '$value'  WHERE id =$id";
        if ($this->db->runquery($this->nameOfDb) === TRUE) {
            $this->db->runquery($query);
            echo "ok";
         
                                              }
        else{
            echo 'error';
             }
 
                                      }
      }
      public function retriveAll(){
        $query = "SELECT * FROM user WHERE email != 'admin@gmail.com'";
        if ($this->db->runquery($this->nameOfDb) === TRUE) {
          $result=$this->db->runqueryforlist($query);
         return $result;
                                              }
  
    }
      

      public function retrive($email){
        $query = "SELECT * FROM user WHERE email = '$email'";
        if ($this->db->runquery($this->nameOfDb) === TRUE) {
          $result=$this->db->runqueryforedit($query);
         return $result;
                                              }
  
    }
      }
       
                                              
/*
$u=new User();
$result=$u->retrive('admin@gmail.com');
print_r($result);*/
?>