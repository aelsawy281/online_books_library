<?php
session_start();
include "category.php";
include "auther.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Book Create</title>
    
</head>
<body>
  
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Book Add 
                            <a href="booklist.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="handelbook.php" method="POST" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label>book Name</label>
                                <input type="text" name="name" class="form-control" value="<?php 
                                if(isset($_SESSION['name'])){
                                echo $_SESSION['name'];}?>">
                                <?php if (isset($_SESSION['nameErr'])){?>
                                    <span class="error">* <?php echo $_SESSION['nameErr'];?></span>
                               <?php }?>
                            </div>
                            <div class="mb-3">
                                <label>Book Price</label>
                                <input type="number" name="price" class="form-control" value="<?php if(isset($_SESSION['price'])){
                                echo $_SESSION['price'];}?>">
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
                            <select  name="bookcategory" required class="form-control ">
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
                            <label>Choose a Book Auther:</label>
                            <select  name="bookauther" required class="form-control ">
                                <option value="" >choose book auther</option>

                                <?php
                                $a=new Auther();
                                $result=$a->retriveAll();
                                        foreach($result as $auther)
                                        {
                                    
                                            ?>
                                    <option  value="<?php echo $auther['name'];?>"><?php echo $auther['name'];?></option>
                                   <?php }?>
                               </select>
                            
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="save_book" class="btn btn-primary">Save book</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
session_destroy();
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
