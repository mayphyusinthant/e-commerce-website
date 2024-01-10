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
        <title>Products Showcase</title>
         <meta charset = "UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Author: May Phyu Sin Thant, Capital E-Commerce Website">

        <link rel = "stylesheet" href = "css/index-style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    </head>
          <!--Required CDN: Bootstrap | Popper | Jquery to Work Boostrap Collapse Properly-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>  
         
         <?php 
        //header is implemented separately
        include("header-navigation.php");
        ?>
    </head>

    <body>
        <div class = "col-lg-8 col-md-8 col-sm-12 mx-auto" style = "text-align: center; ">
           <h1 >About Capital <h4> Since 1993 </h4></h1>
            <p class = "aboutus">We believe that high-quality grocery products complete a meal. 
                Our goal is to hygiene grocery products and bring them to you !
                We are here for you every step of the way making sure you in preparing perfect delicious
                meals.</p>  
        </div>

         <div class = "container  my-3 "  style = "margin: 0 auto; text-align: center; "> 
            <h1 >Our Leaders </h1>
            <figure class="snip1560"><img src="image\sylvie.jpg" alt="pr-sample24" />
            <figcaption>
                <h2>Sylvie</h2>
                <h3>Customer Service & Marketing Executive</h3>
            </figcaption>
            <a href="#" class="link"></a>
            </figure>

            <figure class="snip1560">
            <img src="image\emilycooper.jpg" alt="pr-sample23" />
            <figcaption>
                <h2>Emily Cooper </h2>
                <h3>Chief Executive Officer</h3>
            </figcaption>
            <a href="#" class="link"></a>
            </figure>
            <figure class="snip1560"><img src="image\camille.jpg" alt="pr-sample25" />
            <figcaption>
                <h2>Camille</h2>
                <h3>Chief Operating Officer</h3>
            </figcaption>
            <a href="#" class="link"></a>
            </figure>
        </div>

         <div class = "col-lg-8 col-md-8 col-sm-12 mx-auto" style = "text-align: center; ">
            <h1> Our History <h4> Founders of Capital Company</h4></h1>
            <br>
            <img class="img2" src="image/madeline.jpg" alt=" "/>
         
            <p class = "aboutus">In 1993, Emily's Mother _ Ms. Madeline owned a small grocery store
                near Bogyoke Market, Yangon. Her shop received good feedbacks and 
                because of her neighborhood, the shop's reputation grew year by year.
                In 2000, she started to distribute organic vegetables from her farm and sell 
                homemade dairy produces. In 2012, Ms Emily Cooper, inherited and followed her 
                mother's guidance. Now in 2022, our company 'Capital' Company is now 
                started to establish the emergin E-Commerce strategy and 
                implement E-Commerce website to catch up the modern business trend of 21 Century.
            </p>  
         </div>

        <div class = "col-lg-8 col-md-8 col-sm-12 mx-auto" style = "text-align: center; ">
            <h1> Our Motto </h1>
            <p class = "aboutus">Your Happiness is Our Satisfaction. We Serve Differently.</p>  
         </div>

        <div class = "container  my-5 "  style = "margin: 0 auto; text-align: center; "> 
        <h1> We Sell Healthy Organic Foods</h1>
            <figure class="snip1584"><img src="image\bg Healthy Grap Breakfast.jpg" alt="image"/>
            <figcaption>
                <h5>Healthy Breakfast</h5>
            </figcaption><a href="#"></a>
            </figure>

             <figure class="snip1584"><img src="image/bg-vegetables.jpg" alt="image"/>
            <figcaption>
                <h5>Organic Vegetables</h5>
            </figcaption><a href="#"></a>
            </figure>

            <figure class="snip1584"><img src="image/bg-grains.jpg" alt="image"/>
            <figcaption>
                <h5>Grains</h5>
            </figcaption><a href="#"></a>
            </figure>

              <figure class="snip1584"><img src="image/bg-meat.jpg" alt="image"/>
            <figcaption>
                <h5>Fresh & Juicy Meat</h5>
            </figcaption><a href="#"></a>
            </figure>

             <figure class="snip1584"><img src="image/bg-dairy-produce.jpg" alt="image"/>
            <figcaption>
                <h5>Dairy Produces</h5>
            </figcaption><a href="#"></a>
            </figure>
            
            <figure class="snip1584"><img src="image\bg-Rainbow-Beverages.png" alt="image"/>
            <figcaption>
                <h5>Beverages</h5>
            </figcaption><a href="#"></a>
            </figure>

        </div>
        <hr>
         <div class = "col-lg-8 col-md-8 col-sm-12 mx-auto" style = "text-align: center; ">
           <h1 >Our Partnership Companies </h1>
            <p class = "aboutus">
              <img class = "logos" src = "image\maymyo-fresh.jpg" alt = "img" width= "50" height = auto >
              <img src = "image\htoo-orange-farm.jpg" alt = "img" width= "100" height = auto >
              <img class = "logos" src = "image\sithar-coffee.jpg" alt = "img" width= "50" height = auto >  
              <img class = "logos" src = "image\salween.jpg" alt = "img" width= "50" height = auto >  
              <img class = "logos" src = "image\foodpanda.jpg" alt = "img" width= "50" height = auto >
              <img class = "logos" src = "image\grab_food.jpg" alt = "img" width= "50" height = auto > </p> 

        </div>
        <div class = "col-lg-8 col-md-8 col-sm-12 mx-auto" style = "text-align: center; ">
           <h1 >Verifed Payment Methods </h1>
            <p class = "aboutus">
              <img class = "logos" src = "image\Visa.jpg" alt = "img" width= "50" height = auto > 
              <img src = "image\mastercard.jpg" alt = "img" width= "50" height = auto >
              <img class = "logos" src = "image\paypal.jpg" alt = "img" width= "50" height = auto >
              <img class = "logos" src = "image\kpay.jpg" alt = "img" width= "50" height = auto >
              <img class = "logos" src = "image\cb-bank.jpg" alt = "img" width= "50" height = auto >
              <img class = "logos" src = "image\unionpay.jpg" alt = "img" width= "50" height = auto >  
              <img class = "logos" src = "image\AYAbank.jpg" alt = "img" width= "50" height = auto ></p> 

        </div>
    </body>
    <footer>
        <?php 
            //footer is implemented separately
            include("footer.php");
        ?>    
    </footer> 
</html>
<style>
@import url(https://fonts.googleapis.com/css?family=Raleway);

img.logos{
  width: 70px; 
  height: auto;
  padding-right: 10px;
}
 .img2 {
        margin-top: -40px;
        border-radius: 50%;
        font-family: serif;
        position: relative;
        display: inline-block;
        overflow: hidden;
        width: 20%;
        color: #e8b563;
        text-align: center;
        font-size: 14px;
        box-shadow: none !important;
        padding: 10px;
        border: 2px solid #e8b563;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
      }

    h1, h4 {
    color: #6e092f;
    font-family:  serif;
    padding: 6px;
    }

    p.aboutus{
    padding-left: 5px;
    text-align: center;
    border-style: solid;
    border-width: 1px;
    margin: 15px;
    padding: 20px 10px 20px 10px;
    font-family: serif;
    }
        
   .snip1584 {
    font-family: serif;
    position: relative;
    display: inline-block;
    overflow: hidden;
    margin: 15px;
    min-width: 230px;
    max-width: 315px;
    width: 100%;
    color: #ffffff;
    font-size: 16px;
    text-align: left;
}
    .snip1584 * {
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    -webkit-transition: all 0.25s ease;
    transition: all 0.25s ease;
    }
    .snip1584:before {
    position: absolute;
    top: 10px;
    bottom: 10px;
    left: 10px;
    right: 10px;
    top: 100%;
    content: '';
    background-color: rgba(232, 153, 166, 0.9);
    -webkit-transition: all 0.25s ease;
    transition: all 0.25s ease;
    -webkit-transition-delay: 0.25s;
    transition-delay: 0.25s;
    }
    .snip1584 img {
    vertical-align: top;
    max-width: 100%;
    padding-left: 10px;
    width: 450px;
    height: 220px;
    backface-visibility: hidden;
    border-radius:100%;
    }
    .snip1584 figcaption {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 1;
    align-items: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    }
    .snip1584 h3,
    .snip1584 h5 {
    margin: 0;
    opacity: 0;
    letter-spacing: 1px;
    }
  
    .snip1584 h5 {
    font-weight: normal;
    background-color:#520624;
    padding: 3px 10px;
    -webkit-transform: translateY(-100%);
    transform: translateY(-100%);
    -webkit-transition-delay: 0s;
    transition-delay: 0s;
    }
    .snip1584 a {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 1;
    }
    .snip1584:hover:before,
    .snip1584.hover:before {
    top: 10px;
    -webkit-transition-delay: 0s;
    transition-delay: 0s;
    }
    .snip1584:hover h3,
    .snip1584.hover h3,
    .snip1584:hover h5,
    .snip1584.hover h5 {
    -webkit-transform: translateY(0);
    transform: translateY(0);
    opacity: 1;
    }
    .snip1584:hover h3,
    .snip1584.hover h3 {
    -webkit-transition-delay: 0.3s;
    transition-delay: 0.3s;
    }
    .snip1584:hover h5,
    .snip1584.hover h5 {
    -webkit-transition-delay: 0.2s;
    transition-delay: 0.2s;
    }

@import url(https://fonts.googleapis.com/css?family=Open+sans:700);
@import url(https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css);
@import url(https://fonts.googleapis.com/css?family=Playfair+Display);
.snip1560 {
  font-family: serif;
  position: relative;
  display: inline-block;
  overflow: hidden;
  min-width: 200px;
  max-width: 315px;
  width: 100%;
  color: #e8b563;
  text-align: center;
  font-size: 14px;
  box-shadow: none !important;
 
  padding: 10px;
  border: 2px solid #e8b563;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
 
}

  
.snip1560:before {
  content: '';
  background-color: #000000;
  position: absolute;
  top: 10px;
  bottom: 10px;
  left: 10px;
  right: 10px;
  z-index: -1;
}

.snip1560 * {
  -webkit-transition: all 0.35s ease;
  transition: all 0.35s ease;
}

.snip1560 img {
  max-width: 100%;
  vertical-align: top;
  background-image: linear-gradient(#000000, #ffffff);
 
}

.snip1560 figcaption,
.snip1560 .link {
  position: absolute;
  top: 20px;
  bottom: 20px;
  left: 20px;
  right: 20px;
}

.snip1560 h2,
.snip1560 h3,
.snip1560 h4 {
  margin: 0px;
  position: absolute;
  width: 100%;
  text-transform: uppercase;
}

.snip1560 h2 {
  top: 50%;
  -webkit-transform: translateY(-50%);
  transform: translateY(-50%);
  font-size: 2em;
  font-family: serif;
}


.snip1560 h3 {
  font-size: 1.3em;
  bottom: 0;
  font-weight: 700;
  letter-spacing: 2px;
}

.snip1560 h4 {
  top: 0;
  font-size: 1.2em;
  letter-spacing: 1px;
  font-weight: 400;
  opacity: 0.9;
  font-family: serif;
}

.snip1560:hover img,
.snip1560.hover img {
  opacity: 0.35;
}

</style>
<script>
    var snippet = [].slice.call(document.querySelectorAll('.hover'));
    if (snippet.length) {
    snippet.forEach(function (snippet) {
        snippet.addEventListener('mouseout', function (event) {
        if (event.target.parentNode.tagName === 'figure') {
            event.target.parentNode.classList.remove('hover')
        } else {
            event.target.parentNode.classList.remove('hover')
        }
        });
    });
    }
</script>