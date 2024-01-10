<?php
    session_start();
    $cart = 0;
    
    if(isset($_SESSION['cart'])){
        //session cart are stored in the cart var as product qty.
        foreach($_SESSION['cart'] as $qty){
            $cart += $qty;
        }
    }
    //if there is no product in cart, redirect to index.php
    if(!isset($_SESSION['cart'])){
      header("location: showcase.php");
       exit();
    }

    include("admin/conf/config.php");    

   
?>
<!doctype html>
<html>
    <head>
        <title> View Cart </title>
        <link rel = "stylesheet" href = "css/index-style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Author: May Phyu Sin Thant, Capital E-Commerce Website">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    </head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
         <!--Required CDN: Bootstrap | Popper | Jquery to Work Boostrap Collapse Properly-->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>   
       
    </head>
    <body>
         <?php 
        //header is implemented separately
        include("header-navigation.php");
        ?>
        <section>
        <div class = "row ">
         <!--navigation or side bar-->
        <aside class = "sidebar mx-3 my-3 col-lg-2 col-md-2 col-sm-12 col-xs-12 border">
            <ul class = "cats list-group">
                <li class = "py-3 list-group-item">
                    <b><a href = "showcase.php"  style = "text-decoration:none;" > Continue Shopping</a></b>
                </li>
                <li class = "py-3 list-group-item">
                    <b><a href = "clear-Cart.php"  style = "text-decoration:none;" > Clear Cart</a></b>
                </li>
              
            </ul>
        </aside> 
     

        <main class = "main mx-3 my-3 col-lg-5 col-md-5 col-sm-12 col-xs-12 px-1 py-3 mx-auto border">
          
            <table class= "table table-border ">
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Price</th>
                </tr>
                <?php 
                $total = 0;
                foreach($_SESSION['cart'] as $id => $qty):
                    $result = "SELECT productName, price FROM product_info where productID = $id";
                    $rows = $conn->query($result);
                    foreach( $rows as $row ) :
                        $total += $row['price'] * $qty;      
                ?>
                <tr>
                    <td><?php echo $row['productName']?></td>
                    <td>             
                        <input  onblur = "save(this);" size = "2" step = "1" type = "number" name = "qty" id="<?php echo $id?>" value = "<?php echo $qty ?>" >
                        <script>
                           function save(obj){
                             
                               var quantity = $(obj).val();
                               var code = $(obj).attr("id");
                               $.ajax({
                                   url: "update-cart-qty.php",
                                   type: "POST",
                                   data: 'code='+code+'&quantity='+quantity,
                                   success:function(data){}
                               });
                               setInterval('location.reload()', 50);
                           }
                        </script>
                
                    </td>
                    <td><?php echo $row['price']?></td>
                    <td><?php echo $row['price'] * $qty?></td>
                  
                    <td>
                        <a href = "del-cart-item.php?id=<?php echo $id ?>" >
	                    <i class="fas fa-times-circle fas "></i></a>
                    </td>
                  
                </tr>
            <?php endforeach; 
            endforeach; ?>
                <tr>
                    <td colspan ="3">Sub Total :</td>
                    <td><?php echo $total ?></td>
                </tr>
                <tr>
                    <td colspan ="3">Delivery Fees : <p class = 'text-muted'>Customers who live in other cities except Yangon will be charged  Additional Shipping Fees to Delivery Company. </p></td>
                    <td><?php echo $deliFee = 1000 ?></td>
                </tr>
                <tr>
                    <td colspan ="3">Sale Tax 5.0 % :</td>
                    <td><?php  
                    $taxExcluded = $total / ((5 /100) + 1 ) ;
                    $tax = $total - $taxExcluded;
                    echo number_format($tax, 2);
                    ?></td>
                </tr>
                
                <tr>   
                    <td colspan ="3">Total (MMK):</td>
                    <td><?php echo  number_format($total + $deliFee + $tax , 2);?></td>
                </tr>

        </table>
        </main>
        <!--order form-->
        <main class = "main mx-3 my-3 col-lg-4 col-md-4 col-sm-12 px-3 py-3 mx-auto border">
            <div class = "order-form">
                <h2>Order Now</h2>  
                <h5>
                    <?php if(!isset($_SESSION['userauth'])){echo "Please Log In or Register First Before Order!";}
                    else{ echo $_SESSION['email']; }?>
                </h5>   

                <form id="form" class="form form-control" action="submit-order.php" method="post" onsubmit = "return validateForm();">        
 
                    <hr><h6>Customer Information</h6>
                   
                     <div class="form-control">
                        <label for="uname">Your Full Name</label>        
                        <input  onblur = "return validateLetter(uname, 3, 25); "  type="text" name="uname" id="uname" required 
                        placeholder = "Enter Your Full Name" >   
                        <small>Error Message</small>      
                    </div>

                    <div class="form-control">
                        <label for="email">Email</label>       
                        <input type="text" name="email" id="email" required
                        disabled value = <?php if(!isset($_SESSION['userauth'])){echo "";}
                        else{ echo $_SESSION['email']; }?> >
                    </div>

                    <div class="form-control">
                        <label for="phone">Phone</label>        
                        <input  onblur = " validateNum(phone, 9, 12); "   type="text" name="phone" id="phone" required 
                        placeholder = "Enter A Valid Phone Number" >   
                        <small>Error Message</small>      
                    </div>

                    <div class="form-control">
                        <label for="address">Your Current Address</label>        
                        <textarea name="address" id="address" required
                        placeholder = "Enter Your Current Living Address"></textarea> 
                        <small>Error Message</small>  
                    </div>

                    <div class="form-control">
                        <label for="city">City</label>        
                        <input onblur = "validateLetter(city, 3, 25); " type = "text" name="city" id="city" required
                        placeholder = "Enter Your Current City">
                        <small>Error Message</small>  
                    </div>

                    <div class="form-control">
                        <label for="country">Country</label>        
                        <input onblur = "validateLetter(country, 3, 15); "  type = "text" name="country" id="country" required
                        placeholder = "Enter Your Current Country">
                        <small>Error Message</small>  
                    </div>

                    <div class="form-control">
                        <label for="postalcode">Postal Code</label>        
                        <input onblur = "validateNum(postalcode, 0, 6);" type = "text" name="postalcode" id="postalcode" 
                        placeholder ="Enter the postal code (Optional)" >
                        <small>Error Message</small>  
                    </div>

                    <hr><h6>Delivery Information</h6>
                    <div class="form-control">
                        <label for="deliveryAddress">Shipping/Delivery Address<span class = "faded"></span></label>       
                        <textarea   name="deliveryAddress" id="deliveryAddress" 
                        placeholder = "Enter Shipping Address." required></textarea> 
                        <small>Error Message</small>  
                    </div>

                    <hr><h6>Payment Information</h6>
                    <label for="payment">Payment Method</label>
                    <select name= "payment" id="payment" required="required" > 
                        <option value = "" > --Choose--</option>
                        <option value = "Visa Card" > --Visa Card--  </option>
                        <option value = "Master Card" > --Master Card-- </option>
                        <option value = "KBZ Bank Card" > --KBZ Bank Card--</option>
                        <option value = "CB Visa Card" > --CB Visa Card-- </option>
                        <option value = "AYA Debit Card" > --AYA Union Pay Debit Card--</option>
                        <option value = "AYA Visa Card" > --AYA Visa Card--</option>

                    </select>

                     <div class="form-control">
                        <label for="nameoncard">Name On Card</label>        
                        <input onblur = "validateLetter(nameoncard, 3, 25); " type = "text" name="nameoncard" id="nameoncard" required> 
                        <small>Error Message</small>  
                    </div>

                     <div class="form-control">
                        <label for="cardNo">Card Number</label>        
                        <input onblur = "validateNum(cardNo, 8, 19); " type = "text" name="cardNo" id="cardNo" required 
                        placeholder = "Enter A Valid Card Number"> 
                        <small>Error Message</small>  
                    </div>

                    <div class="form-control">
                        <label for="securityCode">Security Code</label>        
                        <input onblur = "validateNum(securityCode, 5, 6); " type = "password" name="securityCode" id="securityCode" required 
                        placeholder = "Enter A Valid Code"> 
                        <small>Error Message</small>  
                    </div>
                    <br><br> 
                    <?php if(!isset($_SESSION['userauth'])) { ?>       
                        <button  class = "btn btn-danger" name="submitOrder" disabled>Submit Order</button>
                    <?php } else { ?>   
                        <button type="submit" class = "btn btn-danger" name="submitOrder" >Submit Order</button>
                    <?php }  ?> 
                    
                </form>                      
            </div>
        </main>
        </div>
    </section>

     <footer>
            <?php 
             //footer is implemented separately
                include("footer.php");
            ?>
            
        </footer> 
    </body>

</html>

    <script >
               // Show input error message
                function showError(input, message) {
                    const formControl = input.parentElement;
                    formControl.className = "form-control error";
                    const small = formControl.querySelector("small");
                    small.innerText = message;
                    
                }
                // Show success outline
                function showSuccess(input) {
                    const formControl = input.parentElement;
                    formControl.className = "form-control success";
                    
                }

                // Get fieldname
                function getFieldName(input) {
                    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
                }

                // Check input length
                function validateLetter(input, min, max) {
                    var letters = /^[A-Za-z\s]+$/;
                    if (!input.value.match(letters)) {
                    showError(
                        input,
                        `${getFieldName(input)} must be only letters. `
                        );
                    return false;

                    }else if (input.value.length < min) {
                        showError(
                        input,
                        `${getFieldName(input)} must be at least ${min} characters`
                        );
                    return false;

                    } else if (input.value.length > max) {
                        showError(
                        input,
                        `${getFieldName(input)} must be less than ${max} characters`
                        );
                    return false;   

                    } else {
                        showSuccess(input);
                        return true;
                    }
                }

                // Check input length
                function validateNum(input, min, max) {
                    if(isNaN(input.value)){
                        showError(
                        input,
                        `${getFieldName(input)} must be numbers only.`
                        );  
                        return false;
                    }else if (input.value.length < min) {
                        showError(
                        input,
                        `${getFieldName(input)} must be at least ${min} characters`
                        );
                        return false;
                    } else if (input.value.length > max) {
                        showError(
                        input,
                        `${getFieldName(input)} must be less than ${max} characters`
                        );
                        return false;
                    } else {
                        showSuccess(input);
                        return true;
                        }
                }

            const username = document.getElementById("uname");
            const phone = document.getElementById("phone");
            const city = document.getElementById("city");
            const country  = document.getElementById("country");
            const postalcode = document.getElementById("postalcode");
            const nameoncard = document.getElementById("nameoncard");
            const cardNo = document.getElementById("cardNo");
            const securityCode = document.getElementById("securityCode");

            function validateForm(){
                // Set error catcher
                var error = 0;
                if(!validateLetter(username, 3, 25)){
                    error++;
                }
                if(!validateNum(phone, 9, 12)){
                    error++;
                }
                if(!validateLetter(city, 3, 25)){
                    error++;
                }
                if(!validateLetter(country, 3, 15)){
                    error++;
                }
                if(!validateNum(postalcode, 0, 6)){
                    error++;
                }
                if(!validateLetter(nameoncard, 3, 25)){
                    error++;
                }
                if(!validateNum(cardNo, 8, 19)){
                    error++;
                }
                if(!validateNum(securityCode, 5, 6)){
                    error++;
                }
                // Don't submit form if there are errors
                if(error > 0){
                    return false;
                }
            }     
            
        </script>
<style>
    h6 {
        margin: 10px 0 10px 0;
        padding: 0 0 5px 0;
        border-bottom: 1px solid #ddd;
        font-size: 14px;
        font-weight: bold;
        color: #c0392b;
        
    }

    @import url("https://fonts.googleapis.com/css?family=Open+Sans&display=swap");

    :root {
        --success-color: #2ecc71;
        --error-color: #e74c3c;
    }

    * {
        box-sizing: border-box;
    }

    .form-control {
        margin-bottom: 10px;
        padding-bottom: 20px;
        position: relative;
    }

    .form-control input {
        border-radius: 4px;
        display: block;
        width: 100%;
        padding: 10px;
        font-size: 14px;
    }

    .form-control input:focus {
        outline: 0;
        border-color: #777;
    }

    .form-control.success input {
        border-color: var(--success-color);
    }

    .form-control.error input {
        border-color: var(--error-color);
    }

    .form-control small {
        color: var(--error-color);
        position: absolute;
        bottom: 0;
        left: 0;
        visibility: hidden;
    }

    .form-control.error small {
        visibility: visible;
    }

    .form button {
        cursor: pointer;
        background-color: #3498db;
        border: 2px solid #3498db;
        border-radius: 4px;
        color: #fff;
        display: block;
        font-size: 16px;
        padding: 10px;
        margin-top: 20px;
        width: 100%;
    }

</style>

