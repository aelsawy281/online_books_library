<?php
session_start();
$id=$_GET['id'];
$_SESSION['id']=$id;
include 'auther.php';
$a=new Auther();
$auther_edit=$a->retrive($id);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Auther Edit</title>
</head>
<body>
  
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Auther Edit 
                            <a href="autherlist.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="handeleditauther.php" method="POST">
                        <div class="mb-3">
                                <input type="text" hidden name="id" class="form-control" value=<?php echo $id?>>
                            </div>

                            <div class="mb-3">
                                <label>auther Name</label>
                                <input type="text" name="name" class="form-control" value="<?php 
                                
                                echo $auther_edit['name']?>">
                                <?php if (isset($_SESSION['nameErr'])){?>
                                    <span class="error">* <?php echo $_SESSION['nameErr'];?></span>
                               <?php }?>
                            </div>
                            
                            <div class="mb-3">
                                <button type="submit" name="update_auther" class="btn btn-primary">Update auther</button>
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