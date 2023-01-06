<?php
    session_start();
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
                       <?php
                       $bookUser=new Bookuser();
                       $result=$bookUser->retrive($userId,$book['id']);
                        if(isset($result['book_id'])){?>
                        <a class="btn btn-danger">you bought this book</a>
                      <?php }
                      else{
                       ?> <a href="buybook.php?id=<?= $book['id']; ?>" class="btn btn-primary">Buy Now</a>
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
</html>