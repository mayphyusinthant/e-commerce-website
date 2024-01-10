<?php

    session_start();
    include("admin/conf/config.php");  
     
            if(isset($_POST['email']) AND isset($_POST['password'])) {
                
                $email = $_POST['email'];
                $password = $_POST['password'];

                $query = "SELECT * FROM customerinfo WHERE email = ?  ";
                $stmt = $conn->prepare($query);
                $stmt->execute([$email]);
            
                $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $count= $stmt->rowCount();  
                //When registered user does NOT exist
                if($count != 1 ){
                    $_SESSION['userauth'] = FALSE;
                    header('location: userLogin.php?incorrect=1');
                } 
                //When registered user exists
                if($count = 1) {
                    foreach($users as $row) {
                        if($row['status'] != "blacklist"){
                            //decode the hashed password '$row['upassword'] and match with input_password
                            if(password_verify($password, $row['upassword']))  
                            {
                                $_SESSION['userauth'] = TRUE;
                                $_SESSION['email'] = $row['email'];
                                //echo $password;
                                //echo $row['upassword'];
                                //echo password_verify($password, $row['upassword']);
                                header("location: index.php");  
                            }else {
                                $_SESSION['userauth'] = false;
                                //echo $password;
                                //echo $row['upassword']."done";
                                //echo "this answer".password_verify($password, $row['upassword']);
                                header('location: userLogin.php?incorrect=1');  
                            }
                        } else {
                            $_SESSION['userauth'] = FALSE;
                            header('location: userLogin.php?invalid=1');
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
        <title>User Login Form</title>
        <!--External Css File-->
        <link rel = "stylesheet" href = "admin/LoginStyle.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    </head>

    </header>

    <body class = "container  mx-auto">
    
        <div class= "container shadow-lg col-lg-4 col-md-8 col-sm-10 col-xs-10 " >
            <form id = "form" class = "form card"  method = "POST">
                <div class = "card-body">
                    <h3>User Login</h3><br>
                    <?php if (isset($_GET['incorrect'])){ ?>
                            <div class = "alert alert-warning text-center">
                                Incorrect Email or Password
                            </div>
                    <?php  } else if(isset($_GET['invalid'])) { ?>
                            <div class = "alert alert-warning text-center">
                                This account is  temporarily unavailable. For More Info, Please Contact to Admin Team.
                                <b>Possilbe Issue : Banned Account</b>
                            </div>
                    <?php  } ?>
                </div>
                <div class = "form-control card-body">
                    <label for = "username">Email</label>
                    <input type = "email" id = "email" name = "email" placeholder = "Enter email" required>
                </div>
                <div class = "form-control card-body">
                    <label for = "password">Password</label>
                    <input type = "password" id = "password" name = "password" required placeholder = "Enter Password">
                </div>
                    <button  type="submit" class = "card-footer" value="submit">Submit</button>
            </form>
        </div>
  
       </body>
</html>