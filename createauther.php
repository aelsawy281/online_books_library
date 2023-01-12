<?php
session_start();

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>auther Create</title>
</head>
<body>
  
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Auther Add 
                            <a href="autherlist.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="handelcreateauther.php" method="POST">

                            <div class="mb-3">
                                <label>Auther Name</label>
                                <input type="text" name="name" class="form-control">
                                <?php if (isset($_SESSION['nameErr'])){?>
                                    <span class="error">* <?php echo $_SESSION['nameErr'];?></span>
                               <?php }?>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_auther" class="btn btn-primary">Save Auther</button>
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