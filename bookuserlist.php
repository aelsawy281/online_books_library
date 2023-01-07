<?php
    session_start();
    include 'bookuser.php';
    $b=new Bookuser();
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

    <title>list of user that buy book</title>
</head>
<body>
  
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Users List that buy book
                            <a href="booklist.php" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>email</th>
                                    <th>Book Name</th>
                                    <th>price</th>
                                    <th>cover</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        foreach($result as $user)
                                        {
                                    
                                            ?>
                                            <tr>
                                                <td><?= $user['id']; ?></td>
                                                <td><?= $user['firstname']; ?></td>
                                                <td><?= $user['lastname']; ?></td>
                                                <td><?= $user['email']; ?></td>
                                                <td><?= $user['bookname']; ?></td>
                                                <td><?= $user['price']; ?></td>
                                                <td><img src="images/<?php echo $user['cover']; ?>" hight=100 width=30% alt="no photo found"></td>
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