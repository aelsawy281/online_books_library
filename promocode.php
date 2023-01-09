<?php
include_once 'db.php';
class Promocode {
    private $code;
    private $type;
    private $book_id;
    private $db;
    private $nameOfDb = "use ad";
    public function __construct(){
     $this->db=new DataBase('localhost','root','');
   }
   public function generateCode(){
    $length = 4;
    $this->code = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIGKLMNOPQRSTUVWSYZ123456789"), 0, $length);
    return $this->code;
   }
    public function insert($data){
        $result=1;
        while($result>0){
            $code=$data['code']= $this->generateCode();
            $query = "SELECT * FROM promocode WHERE code = '$code'";
            if ($this->db->runquery($this->nameOfDb) === TRUE) {
                $result=$this->db->runqueryforlogin($query);
                
        }
    }
         $query = "INSERT INTO promocode (";            
         $query .= implode(",", array_keys($data)) . ') VALUES (';            
         $query .= "'" . implode("','", array_values($data)) . "')";
 
         if ($this->db->runquery($this->nameOfDb) === TRUE) {
           $this->db->runquery($query);

                                             }
        }
    public function delete($id){
        $query = "DELETE FROM promocode WHERE id = $id";
        if ($this->db->runquery($this->nameOfDb) === TRUE) {
            $this->db->runquery($query);
         
                                              }
 
    }
    public function retrive($code){
      $query = "SELECT * FROM promocode WHERE code = $code";
      if ($this->db->runquery($this->nameOfDb) === TRUE) {
        $result=$this->db->runqueryforedit($query);
       return $result;
                                            }

  }
  public function retriveAll(){
    $query = "SELECT promocode.id,code,`type`,`value`,bookname FROM promocode
    INNER JOIN book
     ON book.id = promocode.book_id ";
    if ($this->db->runquery($this->nameOfDb) === TRUE) {
      $result=$this->db->runqueryforlist($query);
     return $result;
                                          }

}
  
    public function update($id,$data){
    foreach($data as $key=>$value){
        $query="UPDATE book SET $key = '$value'  WHERE id = $id";
        if ($this->db->runquery($this->nameOfDb) === TRUE) {
            $this->db->runquery($query);
         
                                              }
 
                                      }
      }
    }
/*
     $p=new Promocode();
     $data=['type'=>'fixed','value'=>'10'];
     $p->insert($data);  */
?>