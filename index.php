<?php
session_start();
include 'bookuser.php';
if(!isset($_SESSION['email']) or $_SESSION['email']!='admin@gmail.com'){
    header("location:login.php");
}
$bu=new Bookuser();
include "header.php"
?>

    <title>count</title>
<?php include "navbar.php"?>
</div>
</div>
</nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>count users &total price
                            <a href="logout.php" class="btn btn-danger float-end">logout</a>
                        </h4>
                    </div>
                    <div class="card-body d-flex">
                        <div class="col-md-6 col-lg-4 border border-light">
                           <?php $result=$bu->countusers();
                           echo "Number of users that bought = " .$result['countusers'] ;
                           ?>
                        </div>
                        <div class="col-md-6 col-lg-4 border border-light">
                           <?php $result=$bu->countbooks();
                          echo "Number of books that had bought = " .$result['countbooks'] ;
                           ?>
                        </div>
                        <div class="col-md-6 col-lg-4 border border-light">
                           <?php $result=$bu->totalprice();
                           echo "total price = " .$result['totalprice'] ;
                           ?>
                        </div>
</div>
</div>
</div>
</div>
</div>
  <?php include "footer.php"?>