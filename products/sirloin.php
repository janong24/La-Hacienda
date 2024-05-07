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
    <script src="/bootstrap/js/bootstrap-input-spinner.js"></script>
    <script>
        $("input[type='number']").inputSpinner()
    </script>
    <!---->

    <!--GOOGLE FONT APIS-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bodoni+Moda">
    <!---->

    <!--EXTERNAL STYLESHEET & JS-->
    <link rel="stylesheet" href="../lahacienda.css">
<script src="../lahacienda.js"></script>
    <script>
function increaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 1 : value;
    if (value >= 10) {
        value = 10;
    }
    else {
        value++;
    }
    
    document.getElementById('number').value = value;
}
  
function decreaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 1 : value;
    if (value <= 1) {
        value = 1;
    }
    else {
        value--;
    }
    document.getElementById('number').value = value;
}
</script>
    <!---->

</head>
<body>
    <!--START PAGE HEADER-->
    <div class="topnav" id="myTopnav">
        <a href="/index.php"><img src="../assets/logo-white.png" style="width:150px; float:left" class="m-1 mx-2 p-1"></a>
        <a href="#" class="element" style="float:left">
          <?php if(isset($_SESSION['session_username'])) { ?>
          <?php echo "Welcome " . $_SESSION['session_username']; ?>
          <?php } ?>
        </a>        <a href="javascript:void(0);" class="icon element" onclick="myFunction()"><i class="fa fa-bars"></i></a>
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

    <!--START PRODUCT INFO-->
<?php $string_data = file_get_contents("../products.php"); ?>
    <?php $products = unserialize($string_data); ?>
    <?php $key = 1 + array_search("Sirloin Steak", array_column($products, 'name')); ?>
    <div class="container" style="margin-top:30px">
        <div class="row">
            <div class="col-sm-5">
                <img class="card-img-top img-fluid" src="<?php echo $products[$key]['image']; ?>" alt="<?php echo $products[$key]['name']; ?>" />
            </div>
            <div class="col-sm-7">
                <h2 class="mb-4"><?php echo $products[$key]['name']; ?></h2>
                <h7 class="font-italic font-weight-light"><?php echo $products[$key]['vendor']; ?></h7>
                <h6 class="font-weight-bold">
                $<?php echo $products[$key]['price']; ?>
                </h6>
				<p><?php echo $products[$key]['description']; ?></p>
                <p><?php echo $products[$key]['subtext']; ?></p>
                <button class="btn btn-light dropdown-toggle mb-2" data-toggle="collapse" data-target="#demo">Who's The Supplier?</button>
                    <div id="demo" class="collapse">
                        <p><?php echo $products[$key]['vendor_desc1']; ?></p>
						<p><?php echo $products[$key]['vendor_desc2']; ?></p>
                    </div> 
            </div>
        </div>
        <!--END PRODUCT INFO-->
        <!--START CONTROLS-->
        <div class="row mt-2">
            <div class="col-sm-5"></div>
            <div class="col-sm-7">
                <div class="row mb-3 justify-content-center">
                    <form method="post" action="session_actions.php">
                        <div class="center">
                            <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                            <input type="text" id="number" name="quantity" value="1" />
                            <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
                        </div>
                        <input class="btn btn-light btn-block btn-outline-secondary" name="<?php echo $products[$key]['name']; ?>" type="submit" value="ADD TO CART">
                    </form>
            </div>
        </div>
        <!--END CONTROLS-->
    </div>
    <br />
    <!--FOOTER-->
    <footer class="blog-footer pt-3">
        <div class="row">
            <div class="col-sm-4 text-center">
                <a href="../about.php">About Us</a>
                <a href="../contact.php">Contact Us</a>
                <a href="../shipping.html">Shipping & Returns</a>
                <a href="../privacy.html">Privacy Policy</a>
            </div>
            <div class="col-sm-4 text-center">
                <a href="../careers.html">Join Our Team</a>
                <a href="../supplier.html">Become a Supplier</a>
                <a href="../recipes.html">Recipes</a>
                <a href="../employee.php">Employee Login</a>
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
