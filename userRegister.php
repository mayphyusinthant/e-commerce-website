<?php
    session_start();
    include("admin/conf/config.php");  
   
        
    if(isset($_POST['email']) AND isset($_POST['password'])) {

        $email = $_POST['email'];
        //password_hash method "CRYPT_Blowfish" algorithm is used to protect
        //password for security
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $sql = "SELECT * FROM customerinfo WHERE email = ? ";
        $validate = $conn->prepare($sql);
        $validate->execute([$email]);
      
        $count = $validate->fetchAll(PDO::FETCH_ASSOC);
        $duplication= $validate->rowCount();
        if($duplication > 0) {
            $_SESSION['userauth'] = false;
            header('location: userRegister.php?incorrect=1');
           
        }
        else {
           //insert row into customerinfo table
            //NOTICE: Email is the primary key, if user submits an email which is already exists,
            //warn an error message. Need a validation !
            $sql1 = "INSERT INTO customerinfo( customer, email, upassword, 
            phone, `address`, city, country, postalCode, status)  
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $result = $conn->prepare($sql1);
            $result->execute([ null, $email , $password, null, null, null, null, null, null]);
        
            $_SESSION['userauth'] = true;
            
            header("location: userLogin.php"); 
           
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
        <link rel = "stylesheet" href = "admin/LoginStyle.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">   

    </header>
   
    </style>
     <body class = "container  mx-auto">
         <div class= "container shadow-lg col-lg-4 col-md-6 col-sm-10 col-xs-10 " >
            <form id = "form" class = "form card "  method = "POST">
                <div class = "card-header text-center"  >
                    <h3>User Registration</h3>
                     <?php if (isset($_GET['incorrect'])){ ?>
                            <div class = "alert alert-warning text-center">
                                This Email has already been registered !
                            </div>
                    <?php  } ?>
                    <small class = "text-muted">Have Already Registered !
                        <a href = "userLogin.php" class = "btn btn-danger">Log In</a>
                    </small>
                   
                    <br>
                </div>
                <div class = "form-control card-body">
                    <label for = "username">Email</label>
                    <input type = "email" id = "email" name = "email" placeholder = "Enter email" required>
                   
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