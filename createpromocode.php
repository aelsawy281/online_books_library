<?php
session_start();
include 'book.php';
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

    <title>Book Create</title>
</head>
<body>
  
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Promocode Add 
                            <a href="promocodelist.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="handelcreatepromocode.php" method="POST">

                            <div class="mb-3">
                                <label>Promocode type</label>
                                <select  name="type" required>
                                    <option  value="">choose type</option>
                                    <option   value="fixed">fixed</option>
                                   <option  value="percentage">percentage</option>
                                   
                               </select>

                               <?php if(isset($_SESSION['typeErr'])){?>
                                  <span> <?php echo $_SESSION['typeErr'];}?></span>
                            </div>
                            <div class="mb-3">
                                <label>Promocode Value</label>
                                <input type="number" name="value" required step=.000000001 class="form-control" value="<?php if(isset($_SESSION['value'])){
                                echo $_SESSION['value'];}?>">
                                <?php if (isset($_SESSION['valueErr'])){?>
                                    <span class="error">* <?php echo $_SESSION['valueErr'];?>
                               <?php }?>
                            </div>
                            <div class="mb-3">
                                <label>Choose a Book to Add Promocode to it:</label>
                                <select  name="bookname" required>
                                <option value="" >choose book</option>

                                <?php
                                        foreach($result as $book)
                                        {
                                    
                                            ?>
                                    <option  value="<?php echo $book['bookname'];?>"><?php echo $book['bookname'];?></option>
                                   <?php }?>
                               </select>
                               <?php if (isset($_SESSION['booknameErr'])){?>
                                    <span class="error">* <?php echo $_SESSION['booknameErr'];?>
                               <?php }?>
                            </div>
                            
                                <button type="submit" name="save" class="btn btn-primary">Save</button>
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
