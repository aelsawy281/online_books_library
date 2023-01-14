<?php
    session_start();
    include 'comment.php';
    include 'rate.php';
    $c=new Comment();
    $r=new Rate();
     $name=$_GET['bookname'];
     $_SESSION['book_name']=$name; 
    // echo $name; 
     $book_id=$_GET['id'];
     $_SESSION['book_id']=$book_id; 
   $comments=$c->retriveAll($name);
   $avrate=$r->avrageRate($book_id);
   $avrate= (int)$avrate['AverageRate'];
    include "header.php";
?>
<title>Comments And Rates List </title>
</head>
<body> 
<div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Comments List
                            <a href="userbooklist.php" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                       <div class="rate">
                        Average Rate Of <?php echo"$name :  $avrate";?>
                       </div>
                       <?php
                       foreach($comments as $comment){?>
                       <div class="comment">
                         <?php $name= $comment['firstname']." ".$comment['lastname'];?>
                          <span>User Name:<?php echo $name;?></span><br>
                          <span>Comment: <span><?php echo $comment['comment'];?></span><h3>
                       </div>
                       <hr>
                      <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Comment And Rate</h4>
                    </div>
                    <div class="card-body">
                        <form action="handeladdcommentandrate.php" method="POST" >

                            <div class="mb-3">
                                <label>Comment</label>
                                <input type="text" name="comment" class="form-control" value="<?php 
                                if(isset($_SESSION['comment'])){
                                echo $_SESSION['comment'];}?>">
                                <?php if (isset($_SESSION['commentErr'])){?>
                                    <span class="error">* <?php echo $_SESSION['commentErr'];?></span>
                               <?php }?>
                            </div>
                            <div class="mb-3">
                                <label>Rate</label>
                                <input type="number" name="rate" class="form-control" step=1 min=0 max=5 value="<?php if(isset($_SESSION['rate'])){
                                echo $_SESSION['rate'];}?>">
                                <?php if (isset($_SESSION['rateErr'])){?>
                                    <span class="error">* <?php echo $_SESSION['rateErr'];?>
                               <?php }?>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_comment" class="btn btn-primary">Save</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php

unset($_SESSION['comment'],$_SESSION['rate'],$_SESSION['rateErr'],$_SESSION['commentErr']);
     include "footer.php"?>