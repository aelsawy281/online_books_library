<?php
include_once 'db.php';
class Book {
    private $bookname;
    private $price;
    private $cover;
    private $path;
    private $db;
    private $nameOfDb = "use library";
    public function __construct(//$bookname, $price,$cover,$path
        ){
    /* $this->bookname=$bookname;
     $this->price=$price;
     $this->cover=$cover;
     $this->path=$path;*/
     $this->db=new DataBase('localhost','root','');
   }
    public function insert($data){ 
         $query = "INSERT INTO book (";            
         $query .= implode(",", array_keys($data)) . ') VALUES (';            
         $query .= "'" . implode("','", array_values($data)) . "')";
 
         if ($this->db->runquery($this->nameOfDb) === TRUE) {
           $this->db->runquery($query);

        
                                             }

        }
    public function delete($id){
        $query = "DELETE FROM book WHERE id = $id";
        if ($this->db->runquery($this->nameOfDb) === TRUE) {
            $this->db->runquery($query);
         
                                              }
 
    }
    public function retrive($id){
      $query = "SELECT * FROM book WHERE id = $id";
      if ($this->db->runquery($this->nameOfDb) === TRUE) {
        $result=$this->db->runqueryforedit($query);
       return $result;
                                            }

  }
  public function retrivebyname($name){
    $query = "SELECT * FROM book WHERE bookname = '$name'";
    if ($this->db->runquery($this->nameOfDb) === TRUE) {
      $result=$this->db->runqueryforedit($query);
     return $result;
                                          }
                                        }
  public function retriveAll(){
    $query = "SELECT * FROM book";
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
$data=['bookname'=>'gvgvx','price'=>43,'cover'=>'kjfc','pathoffile'=>'dfgk'];
$b=new Book();
//$b->insert($data,'bn');
$b->update(3,['file'=>'kkmlhgg']);
//$result=$b->retrive(2);
//print_r($result);*/
?>