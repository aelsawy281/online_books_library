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

    <title>Book CRUD</title>
</head>
<body>
  
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Book Details
                            <a href="createbook.php" class="btn btn-primary float-end">Add Book</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>book Name</th>
                                    <th>price</th>
                                    <th>cover</th>
                                    <th>Action</th>
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
                                                <td>
                                                    <a href="bookview.php?id=<?=$book['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="editbook.php?id=<?=$book['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="deletebook.php?id=<?=$book['id']; ?>" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_book" value="<?=$book['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
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