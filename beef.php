<?php session_start() ?>
<!DOCTYPE HTML>
<html lang="en-CA">
<head>
    <title>La Hacienda - From Farm to Fork</title>
    <meta name="description" content="La Hacienda delivers farm fresh organic food straight from the producer and onto your fork. All meat and produce sold is sustainably grown with utmost respect for animals and care for the future of our planet. La Hacienda is your local farmers market hooked up to the digital world, bringing your the freshest to your fingertips.">
    <meta name="keywords" content="organic food, sustainable, farm fresh, fresh">
    <meta name="author" content="Jan Mikhail Alexei Ong (SID: 40154849)">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <!-- BOOTSTRAP LIBRARIES -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <script src="https://kit.fontawesome.com/6ebd7b3ed7.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
    <!---->

    <!--GOOGLE FONT APIS-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bodoni+Moda">
    <!---->

    <!--EXTERNAL STYLESHEET-->
    <link rel="stylesheet" href="lahacienda.css">
    <!---->

</head>
<body>
    <!--START PAGE HEADER-->
    <div class="topnav" id="myTopnav">
        <a href="/index.php"><img src="assets/logo-white.png" style="width:150px; float:left" class="m-1 mx-2 p-1"></a>
        <a href="#" class="element" style="float:left">
          <?php if(isset($_SESSION['session_username'])) { ?>
          <?php echo "Welcome " . $_SESSION['session_username']; ?>
          <?php } ?>
        </a>
        <a href="javascript:void(0);" class="icon element" onclick="myFunction()"><i class="fa fa-bars"></i></a>
        <a href="/cart.php" class="element">Cart</a>
        <a href="/login.php" class="element">Register/Login</a>
        <a href="/about.php" class="element">About</a>
        <a href="/contact.php" class="element">Contact</a>
        <a href="/market.php" class="active element">Shop the Market!</a>
      </div>
    <script>
        function myFunction() {
          var x = document.getElementById("myTopnav");
          if (x.className === "topnav") {
            x.className += " responsive";
          } else {
            x.className = "topnav";
          }
        }
    </script>
    <!--END PAGE HEADER-->

    <!--CONTENT-->
    <div class="hero-container">
        <img src="/assets/hero_beef.jpg" style="width:100%;">
        <div class="centered">
            <h1 style="font-size: 100px;">Beef</h1>
        </div>
    </div> 
    <div class="container">
        <div class="row pt-5 pb-3">
            <div class="col-sm-3 text-center" style="margin-top: 1%">
                13 products
            </div>
            <div class="col-sm"></div>
            <div class="col-sm-3">
                <form action="#">
                    <select name="sort" id="sort">
                        <option value="default">Sort</option>
                        <option value="alphaaz">Alphabetical A-Z</option>
                        <option value="alphaza">Alphabetical Z-A</option>
                        <option value="pricelowhigh">Price Low to High</option>
                        <option value="pricehighlow">Price High to Low</option>
                    </select>
                  </form>
            </div>
            <div class="col-sm-1"></div>
        </div>
        <?php $string_data = file_get_contents("products.php"); ?>
        <?php $products = unserialize($string_data); ?>
        <div class="row container-fluid pt-2 py-2">
            <div class="col-sm-4 text-center">
                <?php $key = 1 + array_search("Burger Patties", array_column($products, 'name')); ?>
                <?php $discount = number_format($products[$key]['price'] * (1 - $products[$key]['promo_amt']), "2"); ?>
                <a href="<?php echo $products[$key]['file']; ?>">
                    <img class="img-fluid pb-3" style="width:75%;" src="<?php echo $products[$key]['image']; ?>"/>
                    <h5 style="text-transform: uppercase;"><?php echo $products[$key]['name']; ?></h5>
                    <p><?php echo $products[$key]['vendor']; ?><br/>$<?php echo $discount; ?></p>
                </a>
            </div>
            <div class="col-sm-4 text-center">
            <?php $key = 1 + array_search("Ground Beef", array_column($products, 'name')); ?>
                <?php $discount = number_format($products[$key]['price'] * (1 - $products[$key]['promo_amt']), "2"); ?>
                <a href="<?php echo $products[$key]['file']; ?>">
                    <img class="img-fluid pb-3" style="width:75%;" src="<?php echo $products[$key]['image']; ?>"/>
                    <h5 style="text-transform: uppercase;"><?php echo $products[$key]['name']; ?></h5>
                    <p><?php echo $products[$key]['vendor']; ?><br/>$<?php echo $discount; ?></p>
                </a>
            </div>
            <div class="col-sm-4 text-center">
            <?php $key = 1 + array_search("T-Bone Steak", array_column($products, 'name')); ?>
                <?php $discount = number_format($products[$key]['price'] * (1 - $products[$key]['promo_amt']), "2"); ?>
                <a href="<?php echo $products[$key]['file']; ?>">
                    <img class="img-fluid pb-3" style="width:75%;" src="<?php echo $products[$key]['image']; ?>"/>
                    <h5 style="text-transform: uppercase;"><?php echo $products[$key]['name']; ?></h5>
                    <p><?php echo $products[$key]['vendor']; ?><br/>$<?php echo $discount; ?></p>
                </a>
            </div>
        </div>
        <div class="row container-fluid pt-2 py-2">
            <div class="col-sm-4 text-center">
            <?php $key = 1 + array_search("Stew Beef", array_column($products, 'name')); ?>
                <?php $discount = number_format($products[$key]['price'] * (1 - $products[$key]['promo_amt']), "2"); ?>
                <a href="<?php echo $products[$key]['file']; ?>">
                    <img class="img-fluid pb-3" style="width:75%;" src="<?php echo $products[$key]['image']; ?>"/>
                    <h5 style="text-transform: uppercase;"><?php echo $products[$key]['name']; ?></h5>
                    <p><?php echo $products[$key]['vendor']; ?><br/>$<?php echo $discount; ?></p>
            </div>
            <div class="col-sm-4 text-center">
            <?php $key = 1 + array_search("New York Strip Steak", array_column($products, 'name')); ?>
                <?php $discount = number_format($products[$key]['price'] * (1 - $products[$key]['promo_amt']), "2"); ?>
                <a href="<?php echo $products[$key]['file']; ?>">
                    <img class="img-fluid pb-3" style="width:75%;" src="<?php echo $products[$key]['image']; ?>"/>
                    <h5 style="text-transform: uppercase;"><?php echo $products[$key]['name']; ?></h5>
                    <p><?php echo $products[$key]['vendor']; ?><br/>$<?php echo $discount; ?></p>
            </div>
            <div class="col-sm-4 text-center">
            <?php $key = 1 + array_search("Rib Roast", array_column($products, 'name')); ?>
                <?php $discount = number_format($products[$key]['price'] * (1 - $products[$key]['promo_amt']), "2"); ?>
                <a href="<?php echo $products[$key]['file']; ?>">
                    <img class="img-fluid pb-3" style="width:75%;" src="<?php echo $products[$key]['image']; ?>"/>
                    <h5 style="text-transform: uppercase;"><?php echo $products[$key]['name']; ?></h5>
                    <p><?php echo $products[$key]['vendor']; ?><br/>$<?php echo $discount; ?></p>
            </div>
        </div>
        <div class="row container-fluid pt-2 py-2 justify-content-center">
                <div class="pagination py-5 center">
                    <a href="#">&laquo;</a>
                    <a class="active" href="#">1</a>
                    <a href="beef2.php">2</a>
                    <a href="beef3.php">3</a>
                    <a href="beef2.php">&raquo;</a>
                  </div> 
        </div>
    </div>
    <!--END CONTENT-->

    <!--FOOTER-->
    <footer class="blog-footer pt-3">
        <div class="row">
            <div class="col-sm-4 text-center">
                <a href="about.php">About Us</a>
                <a href="contact.php">Contact Us</a>
                <a href="shipping.html">Shipping & Returns</a>
                <a href="privacy.html">Privacy Policy</a>
            </div>
            <div class="col-sm-4 text-center">
                <a href="careers.html">Join Our Team</a>
                <a href="supplier.html">Become a Supplier</a>
                <a href="recipes.html">Recipes</a>
                <a href="employee.php">Employee Login</a>
            </div>
            <div class="col-sm-4 text-center">
              <form action="#">
                  <label for="email" style="color: #f2f2f2;">Subscribe to us for exclusive offers!</label><br/>
                  <input type="text" id="email" name="email" style="width:50%;" placeholder="Your e-mail address...">
            </div> 
        </div>
    </footer>

    <!--BOTTOM BAR-->
    <footer class="container-fluid text-center pt-3">
        <p style="font-family: 'Bodoni Moda'; color: #f2f2f2; font-size:small;">&#169; La Hacienda - Farm to Fork | All Rights Reserved.</p>
    </footer>
    <!--END FOOTER-->
</body>
</html>
