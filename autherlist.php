<?php
    session_start();
    include 'auther.php';
    $a=new Auther();
   $result=$a->retriveAll();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Auther CRUD</title>
</head>
<body>
  
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Auther List
                            <a href="createauther.php" class="btn btn-primary float-end">Add Auther</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Auther Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        foreach($result as $auther)
                                        {
                                    
                                            ?>
                                            <tr>
                                             <td><?= $auther['id']; ?></td>
                                                <td><?= $auther['name']; ?></td>
                                                 <td>
                                                 <a  href="editauther.php?id=<?=$auther['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="deleteauther.php?id=<?=$auther['id']; ?>" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_auther" value="<?=$auther['id'];?>" class="btn btn-danger btn-sm">Delete</button>
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