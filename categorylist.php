<?php
    session_start();
    include 'category.php';
    $c=new category();
   $result=$c->retriveAll();
   include "header.php";
?>


    <title>Book CRUD</title>
   <?php include "navbar.php";?>
</div>
</div>
</nav>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Categories List
                            <a href="createcategory.php" class="btn btn-primary float-end">Add Category</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        foreach($result as $category)
                                        {
                                    
                                            ?>
                                            <tr>
                                             <td><?= $category['id']; ?></td>
                                                <td><?= $category['name']; ?></td>
                                                 <td>
                                                 <a  href="editcategory.php?id=<?=$category['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="deletecategory.php?id=<?=$category['id']; ?>" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_category" value="<?=$category['id'];?>" class="btn btn-danger btn-sm">Delete</button>
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
    <?php include "footer.php";?>