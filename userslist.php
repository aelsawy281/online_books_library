<?php
    session_start();
    include 'user.php';
    $u=new User();
   $result=$u->retriveAll();
    include "header.php";
?>

<?php include "navbar.php"?>
</div>
</div>
</nav>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Users List
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

    <?php include "footer.php"?>