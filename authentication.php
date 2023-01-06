<?php
include 'db.php';
class Authentication{
    private $db;
    private $nameOfDb = "use ad";

    public function __construct(){
     $this->db=new DataBase('localhost','root','');
   }
   public function register($data){
    //encrypt password
    //$data['password']= password_hash($data['password'],PASSWORD_DEFAULT);
    $query = "INSERT INTO user (";            
    $query .= implode(",", array_keys($data)) . ') VALUES (';            
    $query .= "'" . implode("','", array_values($data)) . "')";
    if ($this->db->runquery($this->nameOfDb) === TRUE) {
        $this->db->runquery($query);
                                          }

    }
public function login($email,$password){
    //$password= password_hash(12345,PASSWORD_DEFAULT);
    $query="SELECT * FROM user WHERE email='$email' and password='$password'";
    if ($this->db->runquery($this->nameOfDb) === TRUE) {
    $result=$this->db->runqueryforlogin($query);
    return $result;
    
    }
}
}





?>