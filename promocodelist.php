<?php
    session_start();
    include 'promocode.php';
    $p=new Promocode();
   $result=$p->retriveAll();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Promocode list</title>
</head>
<body>
  
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Promocode List
                            <a href="createpromocode.php" class="btn btn-primary float-end">add</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>code</th>
                                    <th>type</th>
                                    <th>value</th>
                                    <th>Book Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        foreach($result as $promocode)
                                        {
                                    
                                            ?>
                                            <tr>
                                                <td><?= $promocode['id']; ?></td>
                                                <td><?= $promocode['code']; ?></td>
                                                <td><?= $promocode['type']; ?></td>
                                                <td><?= $promocode['value']; ?></td>
                                                <td><?= $promocode['bookname']; ?></td>
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