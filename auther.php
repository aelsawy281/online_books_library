<?php
include_once 'db.php';
class Auther {
    private $name;
    private $db;
    private $nameOfDb = "use library";
    public function __construct(){
     $this->db=new DataBase('localhost','root','');
   }
    public function insert($data){ 
         $query = "INSERT INTO auther (";            
         $query .= implode(",", array_keys($data)) . ') VALUES (';            
         $query .= "'" . implode("','", array_values($data)) . "')";
 
         if ($this->db->runquery($this->nameOfDb) === TRUE) {
           $this->db->runquery($query);

        
                                             }

        }
    public function delete($id){
        $query = "DELETE FROM auther WHERE id = $id";
        if ($this->db->runquery($this->nameOfDb) === TRUE) {
            $this->db->runquery($query);
         
                                              }
 
    }
    public function retrive($id){
      $query = "SELECT * FROM auther WHERE id = $id";
      if ($this->db->runquery($this->nameOfDb) === TRUE) {
        $result=$this->db->runqueryforedit($query);
       return $result;
                                            }

  }
  public function retrivebyname($name){
    $query = "SELECT * FROM auther WHERE name = '$name'";
    if ($this->db->runquery($this->nameOfDb) === TRUE) {
      $result=$this->db->runqueryforedit($query);
     return $result;
                                          }
                                        }
  public function retriveAll(){
    $query = "SELECT * FROM auther";
    if ($this->db->runquery($this->nameOfDb) === TRUE) {
      $result=$this->db->runqueryforlist($query);
     return $result;
                                          }

}
  
    public function update($id,$data){
    foreach($data as $key=>$value){
        $query="UPDATE auther SET $key = '$value'  WHERE id = $id";
        if ($this->db->runquery($this->nameOfDb) === TRUE) {
            $this->db->runquery($query);
         
                                              }
 
                                      }
      }
       
                                              }
 /*
$data=['name'=>'gvgvx'];
$b=new Auther();
$b->insert($data);
//$b->update();
//$result=$b->retrive(2);
//print_r($result);*/
?>