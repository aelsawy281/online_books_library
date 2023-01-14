<?php
include_once 'db.php';
class Comment {
    private $comment;
    private $user_id;
    private $book_id;
    private $db;
    private $nameOfDb = "use library";
    public function __construct(
        ){
 
     $this->db=new DataBase('localhost','root','');
   }
    public function insert($data){ 
         $query = "INSERT INTO comment (";            
         $query .= implode(",", array_keys($data)) . ') VALUES (';            
         $query .= "'" . implode("','", array_values($data)) . "')";
 
         if ($this->db->runquery($this->nameOfDb) === TRUE) {
           $this->db->runquery($query);

        
                                             }

        }
    public function delete($id){
        $query = "DELETE FROM Comment WHERE id = $id";
        if ($this->db->runquery($this->nameOfDb) === TRUE) {
            $this->db->runquery($query);
         
                                              }
 
    }
    public function retrive($id){
      $query = "SELECT * FROM comment WHERE id = $id";
      if ($this->db->runquery($this->nameOfDb) === TRUE) {
        $result=$this->db->runqueryforedit($query);
       return $result;
                                            }

  }
  public function retrivebyname($name){
    $query = "SELECT * FROM comment WHERE comment= '$name'";
    if ($this->db->runquery($this->nameOfDb) === TRUE) {
      $result=$this->db->runqueryforedit($query);
     return $result;
                                          }
                                        }
  public function retriveAll($name){
    $query = "SELECT book.bookname,user.firstname,user.lastname,comment FROM comment
    INNER JOIN book
     ON comment.book_id = book.id 
     INNER JOIN user
     ON comment.user_id = user.id
     where book.bookname='$name'" ;
   
    if ($this->db->runquery($this->nameOfDb) === TRUE) {
      $result=$this->db->runqueryforlist($query);
     return $result;
                                          }

}
public function retriveBookOfAuther($name){
  $query = "SELECT book.id,book.bookname,book.price,book.cover,category.name as category_name FROM book
  INNER JOIN category
  ON book.category_id = category.id 
  INNER JOIN auther
   ON book.auther_id = auther.id
   where auther.name='$name'" ;
 
  if ($this->db->runquery($this->nameOfDb) === TRUE) {
    $result=$this->db->runqueryforlist($query);
   return $result;
                                        }


}
public function search($name){
  $query = "SELECT book.id,book.bookname,book.price,book.cover,category.name as category_name FROM book
  INNER JOIN category
  ON book.category_id = category.id 
   where book.bookname LIKE '%$name%'" ;
  
   
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