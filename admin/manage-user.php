<!doctype html> 
    <html> 
        <head>  
            <title>Manage User Accounts</title>  
            <meta charset = "UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="Author: May Phyu Sin Thant, Capital E-Commerce Website">

             <link rel="stylesheet" href="css1/style1.css"> 
            <h1>User Account Management</h1>
            
            <!--<link rel="stylesheet" href="css1/style1.css">-->
            <?php 
            include("conf/auth.php"); 
            include("admin-header.php");  ?>
        </head> 

<body>
   
    <?php  include("conf/config.php");    
       
        $users = "SELECT * FROM customerinfo";
        $rows = $conn->query($users);   
       
        ?> 
    
   
    <div class = "main  mx-3 my-3">
        <div>
            <h3>User Account Management</h3> 
            
        </div>
        
        <ul class="list row products "> 
            
             <?php foreach( $rows as $row ) {  ?>   
                <li class = "card col-lg-3 col-md-3  col-sm-12"> 
                    <div class = "card-header">
                        <b><?php echo $row['customerID']."  ".$row['email'] ?></b>  
                    </div>

                    <div class = "card-body">    
                        <b> Name :</b><?php echo $row['customer'] ?> <br>
                        <b> Phone Number: </b><?php echo $row['phone'] ?> <br>   
                        <b> Living Address: </b><?php echo htmlspecialchars($row['address'])?> <br>  
                        <b> City | Country :</b><?php echo $row['city'].$row['country'] ?> <br> 
                        <b> Postal Code:</b><?php echo $row['postalCode'] ?> <br>
                        <b> Status Remark:</b><?php echo $row['status'] ?> <br>
                    </div>    

                    <div class = "card-footer">  
                        <?php if($row['status'] == null): ?>
                        [ <a href="ban-user-acc.php?id=<?php echo $row['customerID'] ?>&status='blacklist'"  class = 'del'>Ban Account</a>]
                        <?php else: ?>
                        [ <a href="ban-user-acc.php?id=<?php echo $row['customerID'] ?>&status=''"  class = 'del'>Unban</a> ]
                        <?php endif; ?> 
                           
                        <?php if($row['email'] != null): ?>
                        [ <a href="delete-user-acc.php?id=<?php echo $row['customerID'] ?>&email=''" onClick="return confirm('WARNING!!! Are you sure? Once the user account has been deleted, it cannot be undo. Please becareful before conforming this action!!')">Delete Account</a>]
                        <?php else : ?>
                        <b>[ <a href="" style = "pointer-events: none; cursor: default;">DELETED ACCOUNT</a>]</b>
                        <?php endif; ?>
                    </div>
                </li>  
            <?php } ?>
           
        </ul> 
    </div>
    <p class = "text-muted"> &copy; 2022, Capital Company Limited, May Phyu Sin Thant</p>

</body>



