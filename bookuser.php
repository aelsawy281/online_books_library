<?php
include_once 'db.php';
class Bookuser {
    private $bookId;
    private $UserId;
    private $db;
    private $nameOfDb = "use ad";
    public function __construct(){
     $this->db=new DataBase('localhost','root','');
   }
    public function insert($data){ 
         $query = "INSERT INTO book_user (";            
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
    public function retrive($id,$book_id){
      $query = "SELECT * FROM book_user WHERE user_id = $id and book_id=$book_id";
      if ($this->db->runquery($this->nameOfDb) === TRUE) {
        $result=$this->db->runqueryforedit($query);
       return $result;
                                            }

  }
  public function retriveAll(){
    $query = "SELECT book_user.id,bookname,price,cover,firstname,lastname,email FROM book_user
    INNER JOIN user
     ON user.id = book_user.user_id 
     INNER JOIN book
     ON book.id = book_user.book_id" ;
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
      public function countbooks(){
        $query = "SELECT count(DISTINCT(book_id)) as countbooks FROM book_user";
        if ($this->db->runquery($this->nameOfDb) === TRUE) {
          $result=$this->db->runqueryforedit($query);
         return $result;
                                              }
  
    }
    public function countusers(){
      $query = "SELECT count(DISTINCT(user_id)) as countusers FROM book_user
      group by user_id";
      if ($this->db->runquery($this->nameOfDb) === TRUE) {
        $result=$this->db->runqueryforedit($query);
       return $result;
                                            }

  }
  public function totalprice(){
    $query = "SELECT sum(price) as totalprice FROM book_user";
    if ($this->db->runquery($this->nameOfDb) === TRUE) {
      $result=$this->db->runqueryforedit($query);
     return $result;
                                          }
                                              }
                                            }
// $data=['bookname'=>'gvgvx','price'=>43,'cover'=>'kjfc','pathoffile'=>'dfgk'];
//$b=new Bookuser();
// print_r($b->totalprice());
// //$b->insert($data,'bn');
// $b->update(3,['file'=>'kkmlhgg']);
// //$result=$b->retrive(2);
// //print_r($result);
?>