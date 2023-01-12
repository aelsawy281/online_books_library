<?php
session_start();
$id=$_GET['id'];
$_SESSION['id']=$id;
include 'book.php';
include 'category.php';
include 'auther.php';
$b=new Book();
$book=$b->retrive($id);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Book View</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Book Details 
                            <a href="booklist.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                                
                                    <div class="mb-3">
                                        <label>Book Name</label>
                                        <p class="form-control">
                                            <?=$book['bookname'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>price</label>
                                        <p class="form-control">
                                            <?=$book['price'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Book Cover</label><br>
                                        <img src="images/<?php echo $book['cover']; ?>" hight=100 width=30% alt="no photo found">
                                    </div>
                                    <div class="mb-3">
                                       
                                            <?php   
                                             $category_id=$book['category_id'];
                                              $c=new category();
                                              $result=$c->retrive($category_id);
                                              if($result!=null){?>
                                                <label>Category name</label>
                                                <p class="form-control">
                                                 <?php echo $result['name'];?>
                                                 </p>
                                            <?php  }?>
                                                
                                       
                                    </div>
            
                                    <div class="mb-3">
                                       
                                       <?php   
                                        $auther_id=$book['auther_id'];
                                         $a=new Auther();
                                         $result=$c->retrive($auther_id);
                                         if($result!=null){?>
                                           <label>Auther name</label>
                                           <p class="form-control">
                                            <?php echo $result['name'];?>
                                            </p>
                                       <?php  }?>
                                           
                                  
                               </div>
                          
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>