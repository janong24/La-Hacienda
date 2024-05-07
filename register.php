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

    <!--EXTERNAL STYLESHEET & JS-->
    <link rel="stylesheet" href="lahacienda.css">
    <script src="lahacienda.js"></script>
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
    <div class="content-container">       
        <h1>Register for an Account</h1>
        <br />
        <hr>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <label for="email">Email</label>
            <input type="text" placeholder="Enter Email" name="email" id="email" pattern="^\S+@\S+$" required>
            <label for="username">Username</label>
            <input type="text" placeholder="Enter Username" name="username" id="username" required>
            <label for="psw">Password (minimum 8 characters, at least one letter and one number)</label>
            <input type="password" placeholder="Enter Password" 
            name="psw" id="psw" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" required>
            <label for="psw-repeat">Repeat Password</label>
            <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" onkeyup="checkPW();" required>
            <span id='message'></span><br/>
            <label for="showPW">Show Password</label>
            <input type="checkbox" id="showPW" onclick="showPassword()">
            <hr>
            <label for="name">Full Name</label>
            <input type="text" placeholder="Enter Full Name" name="name" id="name" required>
            <label for="street">Street Address</label>
            <input type="text" placeholder="Enter Street Address" name="address" id="address" required>
            <label for="city">City</label>
            <input type="text" placeholder="Enter City" name="city" id="city" required>
            <label for="state">State</label>
            <input type="text" placeholder="Enter State" name="state" id="state" required>
            <label for="postal">Postal Code (i.e. A1A 1A1)</label>
            <input type="text" placeholder="Enter Postal Code" name="postal" id="postal" 
            pattern="^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$" required>
            <label for="phone">Phone Number (i.e. 123-456-7890)</label>
            <input type="text" placeholder="Enter Phone Number" name="phone" id="phone" 
            pattern="^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$" required>          
            <hr>
            <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
            <input type="submit" value="Register">
            <br \>
            <br \>
            <p>Already have an account? <a href="login.php">Sign in</a>.</p>
        </form>
    </div>
    <!--END CONTENT-->

    <!--ADD TO DATABASE-->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $string_data = file_get_contents("users.php");
    $array = unserialize($string_data);
    
    $newAccount = array(
        "username" => $_POST['username'],
        "password" => $_POST['psw'],
        "email" => $_POST['email'],
        "type" => "user",
        "fullname" => $_POST['name'],
        "street" => $_POST['address'],
        "city" => $_POST['city'],
        "state" => $_POST['state'],
        "postalcode" => $_POST['postal'],
        "phone" => $_POST['phone']
    );

    array_push($array, $newAccount);
    file_put_contents("users.php", serialize($array));
    echo "<script type='text/javascript'>alert('Registration succesful!');</script>";
    }
    ?>
    <!---->

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
