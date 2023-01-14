<?php
include_once 'db.php';
class Rate {
    private $rate;
    private $user_id;
    private $book_id;
    private $db;
    private $nameOfDb = "use library";
    public function __construct(
        ){
    
     $this->db=new DataBase('localhost','root','');
   }
    public function insert($data){ 
         $query = "INSERT INTO rate (";            
         $query .= implode(",", array_keys($data)) . ') VALUES (';            
         $query .= "'" . implode("','", array_values($data)) . "')";
 
         if ($this->db->runquery($this->nameOfDb) === TRUE) {
           $this->db->runquery($query);

        
                                             }

        }
    public function delete($id){
        $query = "DELETE FROM rate WHERE id = $id";
        if ($this->db->runquery($this->nameOfDb) === TRUE) {
            $this->db->runquery($query);
         
                                              }
 
    }
    public function retrive($id){
      $query = "SELECT * FROM rate WHERE id = $id";
      if ($this->db->runquery($this->nameOfDb) === TRUE) {
        $result=$this->db->runqueryforedit($query);
       return $result;
                                            }

  }
  public function retrivebyname($name){
    $query = "SELECT * FROM rate WHERE rate = '$name'";
    if ($this->db->runquery($this->nameOfDb) === TRUE) {
      $result=$this->db->runqueryforedit($query);
     return $result;
                                          }
                                        }
 public function avrageRate($book_id){
    $query = "SELECT AVG(rate) AS AverageRate from rate WHERE book_id= $book_id";
    if ($this->db->runquery($this->nameOfDb) === TRUE) {
        $result=$this->db->runqueryforedit($query);
       return $result;
                                            }

 }

    public function update($id,$data){
    foreach($data as $key=>$value){
        $query="UPDATE rate SET $key = '$value'  WHERE id = $id";
        if ($this->db->runquery($this->nameOfDb) === TRUE) {
            $this->db->runquery($query);
         
                                              }
 
                                      }
      }
       
                                              }

?>