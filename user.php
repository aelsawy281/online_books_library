<?php
include 'db.php';
class User{
    private $fname;
    private $lname;
    private $password;
    private $email;
    private $db;
    private $nameOfDb = "use ad";
    public function __construct(){
  
     $this->db=new DataBase('localhost','root','');
   }/*
    public function insert($data){ 
         $query = "INSERT INTO book (";            
         $query .= implode(",", array_keys($data)) . ') VALUES (';            
         $query .= "'" . implode("','", array_values($data)) . "')";
 
         if ($this->db->runquery($this->nameOfDb) === TRUE) {
           $this->db->runquery($query);
        
                                             }

        }*/
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
       
                                              }

$u=new User();
$u->update(2,['email'=>'a']);
?>