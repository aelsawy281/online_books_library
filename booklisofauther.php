<?php
    session_start();
    include 'book.php';
    $b=new book();
    $name=$_GET['name'];
   $result=$b->retriveBookOfAuther($name);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Book CRUD</title>
</head>
<body>
  
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>book List of <?php echo $_GET['name'];?>
                            <a href="booklist.php" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Book Name</th>
                                    <th>Price</th>
                                    <th>Cover</th>
                                    <th>Category Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
     
                                    foreach($result as $book)
                                        {
                                    
                                            ?>
                                            <tr>
                                                <td><?= $book['id']; ?></td>
                                                <td><?= $book['bookname']; ?></td>
                                                <td><?= $book['price']; ?></td>
                                                <td width=200 hight=200><img src="images/<?php echo $book['cover']; ?>" hight=100% width=100% alt="no photo found"></td>
                                                <td><?= $book['category_name']; ?></td>
                                            <?php
                                        }
                                    
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>