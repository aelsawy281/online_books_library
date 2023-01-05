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
    $data['password']= password_hash($data['password'],PASSWORD_DEFAULT);
    $query = "INSERT INTO user (";            
    $query .= implode(",", array_keys($data)) . ') VALUES (';            
    $query .= "'" . implode("','", array_values($data)) . "')";
    if ($this->db->runquery($this->nameOfDb) === TRUE) {
        $this->db->runquery($query);
                                          }

    }
public function login($data){
    $email=$data['email'];
    $query="SELECT * FROM book WHERE email=$email";
    $result=$this->db->runqueryforedit($query);
    print_r($result) ;
}

}

$data=['firstname'=>'gsw','lastname'=>'jkdci','email'=>'skmlxmo','password'=>'1298'];
$u=new Authentication();
$u->register($data);


?>