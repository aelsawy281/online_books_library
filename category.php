<?php
include_once 'db.php';
class Category {
    private $name;
    private $db;
    private $nameOfDb = "use ad";
    public function __construct(){
     $this->db=new DataBase('localhost','root','');
   }
    public function insert($data){ 
         $query = "INSERT INTO category (";            
         $query .= implode(",", array_keys($data)) . ') VALUES (';            
         $query .= "'" . implode("','", array_values($data)) . "')";
 
         if ($this->db->runquery($this->nameOfDb) === TRUE) {
           $this->db->runquery($query);

        
                                             }

        }
    public function delete($id){
        $query = "DELETE FROM category WHERE id = $id";
        if ($this->db->runquery($this->nameOfDb) === TRUE) {
            $this->db->runquery($query);
         
                                              }
 
    }
    public function retrive($id){
      $query = "SELECT * FROM category WHERE id = $id";
      if ($this->db->runquery($this->nameOfDb) === TRUE) {
        $result=$this->db->runqueryforedit($query);
       return $result;
                                            }

  }
  public function retrivebyname($name){
    $query = "SELECT * FROM category WHERE name = '$name'";
    if ($this->db->runquery($this->nameOfDb) === TRUE) {
      $result=$this->db->runqueryforedit($query);
     return $result;
                                          }
                                        }
  public function retriveAll(){
    $query = "SELECT * FROM category";
    if ($this->db->runquery($this->nameOfDb) === TRUE) {
      $result=$this->db->runqueryforlist($query);
     return $result;
                                          }

}
  
    public function update($id,$data){
    foreach($data as $key=>$value){
        $query="UPDATE category SET $key = '$value'  WHERE id = $id";
        if ($this->db->runquery($this->nameOfDb) === TRUE) {
            $this->db->runquery($query);
         
                                              }
 
                                      }
      }
       
                                              }
 /*
$data=['name'=>'gvgvx'];
$b=new Category();
$b->insert($data);
//$b->update(3,['file'=>'kkmlhgg']);
//$result=$b->retrive(2);
//print_r($result);*/
?>