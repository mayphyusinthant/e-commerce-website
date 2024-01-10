<?php

  session_start();
  include("conf/config.php");  

    if(isset($_POST['username']) AND isset($_POST['password'])) {
      $username = strip_tags(trim($_POST["username"]));
	    $password = strip_tags(trim($_POST["password"]));  

      $query = "SELECT * FROM admin_role WHERE adminName = ?  ";
      $stmt = $conn->prepare($query);
      $stmt->execute([$username]);

      $admin = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $count= $stmt->rowCount();  
      //When registered user does NOT exist
      if($count != 1 ){
          $_SESSION['auth'] = FALSE;
          header('location: login.php?incorrect=1');
      } 
      //When registered user exists
      if($count = 1) {   
         foreach($admin as $row) {
           //decode the hashed password '$row['upassword'] and match with input_password
          if(password_verify($password, $row['upassword']))  
            {
              $_SESSION['auth'] = TRUE;
              $_SESSION['username'] = $row['adminName'];
              //echo $password;
              //echo $row['upassword'];
              //echo password_verify($password, $row['upassword']);
              header("location: product-list.php");  
            }
            else {
              $_SESSION['auth'] = false;
              //echo $password;
              //echo $row['upassword']."done";
              //echo "this answer".password_verify($password, $row['upassword']);
              header('location: login.php?incorrect=1');  
              }
         }
      }
    }
  ?>

<!DOCTYPE html>
<html>
    <header>
        <meta charset = "UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Author: May Phyu Sin Thant, Capital E-Commerce Website">

        <title>Admin Login Form</title>
        <!--External Css File-->
        <link rel = "stylesheet" href = "LoginStyle.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    


    </header>


   
    <body class = "container  mx-auto">

            <div class= "container shadow-lg col-lg-4 col-md-6 col-sm-10 col-xs-10 " >

                <form id = "form" class = "form card " action = "login.php" method = "POST">
                    <div class = "card-body">
                        <h3>Login into Administration</h3><br>
                        <?php if (isset($_GET['incorrect'])){ ?>
                                <div class = "alert alert-warning text-center">
                                    Login Invalid! 
                                </div>
                        <?php  } ?>
                    </div>
                    <div class = "form-control card-body">
                        <label for = "username">Username</label>
                        <input type = "text" id = "username" name = "username" placeholder = "Enter Username">
                    
                    </div>
                    <div class = "form-control card-body">
                        <label for = "password">Password</label>
                        <input type = "password" id = "password" name = "password" placeholder = "Enter Password">
                    
                    </div>
                    <button  type="submit" class = "card-footer" value="Admin Login">Submit</button>
                </form>
            </div>
       
    </body>
</html>