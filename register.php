<?php 
session_start();
?>
<html>
    <head>
        <style>
            * {box-sizing: border-box}

/* Add padding to containers */
.container {
  padding: 16px;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit/register button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity:1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
        </style>
    </head>
    <body>
<form action="handelregister.php" method="post">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="email"><b>First Name</b></label>
    <input type="text" name="firstname" placeholder="Enter First Name" id="email" required class="form-control" value="<?php 
                                if(isset($_SESSION['fname'])){
                                echo $_SESSION['fname'];}?>">
                                <?php if (isset($_SESSION['fnameErr'])){?>
                                    <span class="error">* <?php echo $_SESSION['fnameErr'];?></span> <?php }?>
    <label for="email"><b>Last Name</b></label>
    <input type="text" name="lastname" placeholder="Enter Last Name" id="email" required class="form-control" value="<?php 
                                if(isset($_SESSION['lname'])){
                                echo $_SESSION['lname'];}?>">
                                <?php if (isset($_SESSION['lnameErr'])){?>
                                    <span class="error">* <?php echo $_SESSION['lnameErr'];?></span> <?php }?><br>
    <label for="email"><b>Email</b></label>
    <input type="text" name="email" placeholder="Enter Email" id="email" required class="form-control" value="<?php 
                                if(isset($_SESSION['email'])){
                                echo $_SESSION['email'];}?>">
                                <?php if (isset($_SESSION['emailErr'])){?>
                                    <span class="error">* <?php echo $_SESSION['emailErr'];?></span> <?php }?><br>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="psw" required>
    <?php if (isset($_SESSION['passwordErr'])){?>
                                    <span class="error">* <?php echo $_SESSION['passwordErr'];?></span> <?php }?><br>
    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
    <hr>

    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <button type="submit" class="registerbtn" name="save_user">Register</button>
  </div>

  <div class="container signin">
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  </div>
</form>
</body>
<?php 
session_destroy();
?>
</html>