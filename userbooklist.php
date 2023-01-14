<?php
    session_start();
    if (!isset($_SESSION['email'])){
      header("location:login.php");
    }
    include 'book.php';
      include 'bookuser.php';
      include 'user.php';
      $u=new User();
      $result=$u->retrive($_SESSION['email']);
      $userId=$result['id'];
      $_SESSION['user_id']=$userId;
      $b=new book();
     $result=$b->retriveAll();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Book list</title>
</head>
<body>
  
    <div class="container mt-4">
        <div class="row d-flex ">
                    <div class="card-header ">
                        <h4>Books List
                            <a href="logout.php" class="btn btn-primary float-end">logout</a>
                        </h4>
                    </div>
                    <?php
                        foreach($result as $book){?>
                    <div class="card col-md-4 col-sm-6 py-3 mb-2">
                    <img src="images/<?php echo $book['cover']; ?>" hight=100% width=100% alt="no photo found">
                        <div class="card-body">
                      <h5 class="card-title">Book Name:<?= $book['bookname']; ?>
                                               
                       <p class="card-text"> Price:<td><?= $book['price']; ?></p>

                       <form class="mb-3" action="handeluserbooklist.php?id=<?= $book['id']; ?>" method="post" >
                             <input type="text" name="promocode" placeholder="promocode">
                             <input type=number hidden name="price" value="<?= $book['price']; ?>" step=.0000001><br>
                             <?php if (isset($_SESSION['error']) and isset($_SESSION['book_id']) ){
                              if($_SESSION['book_id']==$book['id']){

                              
                              ?>
                             <span  style="color:red"><?php echo $_SESSION['error'];?></span><br>
                             <?php }
                             }?>
                             <?php
                            $bookUser=new Bookuser();
                           $result=$bookUser->retrive($userId,$book['id']);
                        if(!isset($result['book_id'])){?>
                        <input type="submit" name="buy" class="btn btn-primary" value="Buy Now">
                        </form>
                      <?php }
                      else{
                       ?>
                       </form>
                        <a class="mb-3 btn btn-danger" href="addcommentandrate.php?id=<?php echo $book['id'].'&bookname='.$book['bookname'];?>" >you bought this book</a>
                      
                     <?php }
                       ?>
                       
                       
                       
                         
                         </div>
                        </div><?php
                     }
                     ?>
                      

                    </div>
                </div>
          
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
<?php unset($_SESSION["error"])?>
</html>