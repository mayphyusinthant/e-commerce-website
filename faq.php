<?php  session_start();
    $cart = 0;
    if(isset($_SESSION['cart'])){
            //session cart are stored in the cart var as product qty.
            foreach($_SESSION['cart'] as $qty){
                $cart += $qty;
            }
        }
    ?>
 
 

<!DOCTYPE html>

<html>
    <head>
        <title> </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    </head>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
         <!--Required CDN: Bootstrap | Popper | Jquery to Work Boostrap Collapse Properly-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>  
         <!--Boostrap JS bundle-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
         <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Author: May Phyu Sin Thant, Capital E-Commerce Website">

        <?php 
        //header is implemented separately
        include("header-navigation.php");
        ?>

    <style>
        h1, h3 {
            color: #6e092f;
            font-family:  serif;
            padding: 6px;
        }
        h5 {
            padding-bottom: 3px;
            padding-left: 3px;
            color: #eb78a2;
            font-family: serif;
           
        }
        p {
            padding-left: 5px;
            text-align: justify;
            font-family: serif;
            
        }

    
     
    </style>
    <body>
        <h1 style = "text-align: center; ">Frequently Asked Questions</h1>
        <section class = "container mx-auto ">
            <div class = "row  ">  
               
                <div class = "col-lg-6 col-md-6 col-sm-12 col-xs-12 my-3 ">
                    <h3> <i class="fas fa-info-circle"></i> Delivery & Order Issue </h3>   
                    <a data-toggle="collapse" href="#item1" role="button" aria-expanded="false" aria-controls="item1">
                        <h5> Can I change delivery address after submiting order? </h5>
                    </a>
                    <div class="collapse" id="item1">
                        <p>There is no way to change the delivery address once you have submitted the order.
                            If you submitted a unexisted/invalid address, the delivery team will
                            automatically cancel your order. In case, if you 
                            submitted other wrong addresses, please call the <b> customer service center  </b> as soon as possible
                            to cancel your order before delivery time reaches. But please do not worry.
                            We always confirm the receiver whether he/she ordered it or not. If we detect
                            he/she did not order the parcel, we will send it right to you within next few days.
                            Plus, you will need to pay for extra shipping fees. YNext time, do not forget to double check
                            the order form before submitting.
                        </p>
                    </div>

                     <a data-toggle="collapse" href="#item2" role="button" aria-expanded="false" aria-controls="item2">
                       <h5> I have been ordered for a couple of weeks and delivery is not coming yet! </h5>
                    </a>
                     <div class="collapse" id="item2">
                        <p>
                            Our delivery team apologize for your inconvenience. Depending on transportation and geographical
                            location, delivery waiting time may vary. Please do not hestitate to 
                            contact our <b> customer service team </b> . Tell your issue and let them know when did you ordered
                            and delivery address too. Our delivery team will send your parcel as soon as possible.
                        </p>
                    </div>

                    <a data-toggle="collapse" href="#item3" role="button" aria-expanded="false" aria-controls="item3">
                       <h5> One of my products that has been ordered is not included along with delivery.
                        Can I get it back with free shipping? </h5>
                    </a>
                     <div class="collapse" id="item3">
                        <p>
                            Our delivery team apologize for your inconvenience. Please do not hestitate to contact
                            our <b> customer service team </b> and let them know your issue. They will send it back your order 
                            within next 1 - 2 office days with free shipping.
                        </p>
                    </div>
                    
                    <a data-toggle="collapse" href="#item4" role="button" aria-expanded="false" aria-controls="item4">
                        <h5> Can I cancel order after submiting order? </h5>
                    </a>
                    <div class="collapse" id="item4">
                        <p>If you want to cancel order, you need to contact to our <b> customer service team</b> as soon as possible
                       before delivery time. Once, delivery has already reached to you, you cannot either cancel the order or get refund. 
                        </p>
                    </div>

                    <br>
                    <h3> <i class="fas fa-info-circle"></i> Customer Service Issue</h3>
                     <a data-toggle="collapse" href="#item11" role="button" aria-expanded="false" aria-controls="item11">
                       <h5>  I am upset with the customer service <br> - My problem did not solve out after talking with customer service team .<br>
                        - Service center did not reply my email after waiting for about 1 week. <br>
                        - I am upset with the way the customer service team treats me. <br> </h5>
                    </a>
                    <div class="collapse" id="item11">
                        <p>
                            If you encounter any problem with customer service team, I suggest you to contact 
                            the <b> Admin Team :  +95 911 111 111 </b> or contact directly to our 
                            <b> Manager : + 95 933 333 333 - emilycooper_manager@servicedept.com</b>. Please do not hestitate to call us. 
                            We are happy to help you. We love to hear feedback and complaints from you. 
                        </p>
                    </div>
                    <br>
                     <h3> <i class="fas fa-info-circle"></i> Product Quality</h3>
                    <a data-toggle="collapse" href="#item12" role="button" aria-expanded="false" aria-controls="item12">
                      <h5> Packaging (box, bottles) were damaged. </h5>
                    </a>
                    <div class="collapse" id="item12">
                        <p>
                           Our  team apologize for your inconvenience. For this case, please send an email to our customer service team attaching an photo(s) as a proof. They will send you to fill 
                           a <b> return request form </b>. This form will allow you to get back a return or to exchange with 
                           a new one. For further information, please read our return & refurn policy.
                        </p>
                    </div>

                    <a data-toggle="collapse" href="#item13" role="button" aria-expanded="false" aria-controls="item13">
                     <h5> Product quality is not what I expected. </h5>
                    </a>
                    <div class="collapse" id="item13">
                        <p>
                          For this case, please kindly call our customer service phone number, and let them know the detail 
                           problem. 
                        </p>
                    </div>

                   <a data-toggle="collapse" href="#item14" role="button" aria-expanded="false" aria-controls="item14">
                   <h5>  Vegetables are rotten. </h5>
                    </a>
                    <div class="collapse" id="item14">
                        <p>
                            Our  team apologize for your inconvenience. For this case,  please send an email to our customer service team attaching an photo(s) as a proof.
                            They will send you to fill 
                            a <b> return request form </b>. Once you have submitted the form, they will 
                            verify it and our team will deliver your orders with free of charge (if the request form meet return policy). For further information, please read our return & refurn policy.
                        </p>
                    </div>
                </div>

                <div class = "col-lg-6 col-md-6 col-sm-12 col-xs-12 my-3 "> 
                    <h3> <i class="fas fa-info-circle"></i> Account Issue </h3>   
                    <a data-toggle="collapse" href="#item01" role="button" aria-expanded="false" aria-controls="item01">
                      <h5>  How to permanently delete my account  ? </h5>
                    </a>
                    <div class="collapse" id="item01">
                        <p>Please send an email to <b> capital@servicedept.com </b> and admin team will delete your
                            account as soon as they see your mail.
                        </p>
                    </div>

                     <a data-toggle="collapse" href="#item02" role="button" aria-expanded="false" aria-controls="item02">
                      <h5> How to update my address and payment information ? </h5>
                    </a>
                     <div class="collapse" id="item02">
                        <p>
                            You do not need to update your information since you will need to fill 
                            the <b> order form </b> again when you order next time. That will automatically 
                            update your profile information _ address and payment information too.
                        </p>
                    </div>

                    <a data-toggle="collapse" href="#item03" role="button" aria-expanded="false" aria-controls="item03">
                       <h5> I cannot login to my account. The error says - "This account is temporarily unavailable. For More Info, Please Contact to Admin Team. Possilbe Issue : Banned Account"
                        </h5></a>
                     <div class="collapse" id="item03">
                        <p>
                           Please contact to Our <b> Admin Team</b> for this issue. If you cannot get back 
                           into your account, you will need to register with another email address.
                        </p>
                    </div>
                    
                    <br>
                    <h3><i class="fas fa-info-circle"></i> Return & Refund Policy</h3>
                     <a data-toggle="collapse" href="#item15" role="button" aria-expanded="false" aria-controls="item15">
                      <h5> If consumer faces any issues regarding to - </h5>
                    </a>
                    <div class="collapse" id="item15">
                        <h6></h6>
                        <p> 
                        <i class="fas fa-info-circle"></i> low product quality ( unfresh vegeatables, expired products, variation between product description provided on website & real quality... )
                        <br><i class="fas fa-info-circle"></i> late delivery (  shipping delay more than 7 days after promised date)
                        <br><i class="fas fa-info-circle"></i> unexpected errors (  damanged packaging, damaged products due to several unexpected shipping conditions)
                        <br>For the above issues, we have two solutions - <b> Return & Refund </b> or <b>Exchange with new products.</b>
                        </p>
                    </div>

                     <a data-toggle="collapse" href="#item16" role="button" aria-expanded="false" aria-controls="item16">
                      <h5> Details of Return & Refurn Policy </h5>
                    </a>
                    <div class="collapse" id="item16">

                            <p> - First you will need to contact to our customer service team.<br>
                            - Send Email attaching photographs of products as a proof <br>
                            - Fill the Return & Refurn Request Form <br>
                            - Our Delivery Team will come to you to get back our products ( + it may take about  about 1 - 3 office days depend on country you live).
                            <br>- As soon as our company gets back the return, you will get back the refurn within 1 office day. <i class="fas fa-check-circle"></i> 
                            
                        </p>
                </div>
                 <a data-toggle="collapse" href="#item17" role="button" aria-expanded="false" aria-controls="item17">
                            <h5> Details of Exchange Policy </h5>
                        </a>
                        <div class="collapse" id="item17">
                            <p>  - First you will need to contact to our customer service team.<br>
                                - Send Email attaching photographs of products as a proof <br>
                                - Fill the Exchange Request Form <br>
                                - You can exchange new products exactly the same that you have been ordered. (You Cannot exchange with different items)
                                - Our Delivery Team will come to you to get back damaged products and exchange with new ones. <br> ( + it may take about  about 1 - 3 office days depend on country you live).
                                - In this case, there will be <b> delivery charges </b>.<i class="fas fa-check-circle"></i> 
                            </p>
                        </div>
            </div>
        </section>
    </body>
    <footer>
        <?php 
            //footer is implemented separately
            include("footer.php");
        ?>    
    </footer> 
</html>

                   