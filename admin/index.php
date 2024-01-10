<?php
    session_start();
    include("conf/config.php");  
   
        
    if(isset($_POST['name']) AND isset($_POST['password'])) {

        $name = $_POST['name'];
        //password_hash method "CRYPT_Blowfish" algorithm is used to protect
        //password for security
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $sql = "SELECT * FROM admin_role WHERE adminName = ? ";
        $validate = $conn->prepare($sql);
        $validate->execute([$name]);
      
        $count = $validate->fetchAll(PDO::FETCH_ASSOC);
        $duplication= $validate->rowCount();
        if($duplication > 0) {
            $_SESSION['auth'] = false;
            header('location: index.php?incorrect=1');
           
        }
        else {
           //insert row into customerinfo table
            //NOTICE: Email is the primary key, if user submits an email which is already exists,
            //warn an error message. Need a validation !
            $sql1 = "INSERT INTO admin_role( adminName, upassword)  
            VALUES (?, ?)";
            $result = $conn->prepare($sql1);
            $result->execute([ $name , $password]);
            $_SESSION['auth'] = true;
            
            header("location: login.php"); 
           
        }
    }
?> 


<!DOCTYPE html>
<html>
    <header>
        <meta charset = "UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Author: May Phyu Sin Thant, Capital E-Commerce Website">

        <title>User Registration Form</title>
        <!--External Css File-->
        <link rel = "stylesheet" href = "LoginStyle.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">   

    </header>
   
    </style>
     <body class = "container  mx-auto">
         <div class= "container shadow-lg col-lg-4 col-md-6 col-sm-10 col-xs-10 " >
            <form id = "form" class = "form card "  method = "POST">
                <div class = "card-header text-center"  >
                    <h3>Admin Registration</h3>
                     <?php if (isset($_GET['incorrect'])){ ?>
                            <div class = "alert alert-warning text-center">
                                This UserName has already been registered !
                            </div>
                    <?php  } ?>
                    <small class = "text-muted">Have Already Registered !
                        <a href = "login.php" class = "btn btn-danger">Log In</a>
                    </small>
                   
                    <br>
                </div>
                <div class = "form-control card-body">
                    <label for = "name">UserName</label>
                    <input type = "text" id = "name" name = "name" placeholder = "Enter Admin Name" required>
                   
                </div>
                <div class = "form-control card-body">
                    <label for = "password">Password</label>
                    <input type = "password" id = "password" name = "password" required placeholder = "Enter Password">
                
                </div>
                  <button  type="submit" class = "card-footer" value="register">Submit</button>
            </form>
        </div>
  
       </body>
</html>