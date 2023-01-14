<?php
    session_start();
    include "book.php";
    include "auther.php";
    $b=new Book();
    $name=$_GET["name"];
    $books=$b->search($name);
    $a=new Auther();
    $authers=$a->search($name);

    include "header.php";
?>

    <title>Book CRUD</title>
<?php include "navbar.php" ?>
</div>
</div>
</nav>
  
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
                                 
                                    foreach($books as $book)
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



    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>auther of <?php echo $_GET['name'];?>
                            <a href="booklist.php" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                 
                                    foreach($authers as $auther)
                                        {
                                         
                                    
                                            ?>
                                            <tr>
                                                <td><?= $auther['id']; ?></td>
                                                <td><?= $auther['name']; ?></td>
                                               
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