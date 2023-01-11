<?php
session_start();
$id=$_GET['id'];
$_SESSION['id']=$id;
include 'book.php';
include "category.php";
$b=new Book();
$book_edit=$b->retrive($id);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Book Edit</title>
</head>
<body>
  
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Book Edit 
                            <a href="booklist.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="handeleditbook.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                                <input type="text" hidden name="id" class="form-control" value=<?php echo $id?>>
                            </div>

                            <div class="mb-3">
                                <label>Book Name</label>
                                <input type="text" name="name" class="form-control" value="<?php 
                                
                                echo $book_edit['bookname']?>">
                                <?php if (isset($_SESSION['nameErr'])){?>
                                    <span class="error">* <?php echo $_SESSION['nameErr'];?></span>
                               <?php }?>
                            </div>
                            <div class="mb-3">
                                <label>Book Price</label>
                                <input type="number" name="price" class="form-control" value="<?php 
                               echo $book_edit['price']?>">
                                <?php if (isset($_SESSION['priceErr'])){?>
                                    <span class="error">* <?php echo $_SESSION['priceErr'];?>
                               <?php }?>
                            </div>
                            <div class="mb-3">
                                <label>Choose a Book Cover:</label>
                                <input type="file" name="cover" class="form-control" accept=".jpg, .jpeg, .png">
                            </div>
                            <div class="mb-3">
                            <label>Choose a Book File:</label>
                                <input type="file" name="file" class="form-control">
                            </div>
                            <div class="mb-3">
                            <label>Choose a Book category:</label>
                            <select  name="bookcategory" required class="form-control bookcategory">
                                <option value="" >choose book category</option>

                                <?php
                                $c=new category();
                                $result=$c->retriveAll();
                                        foreach($result as $category)
                                        {
                                    
                                            ?>
                                    <option  value="<?php echo $category['name'];?>"><?php echo $category['name'];?></option>
                                   <?php }?>
                               </select>
                            
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update_book" class="btn btn-primary">Update book</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 

?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>