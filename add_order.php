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
        <a href="/index.php" class="active element">Return to Storefront</a>
        <a href="/orders.php" class="element">Orders</a>
        <a href="/customers.php" class="element">Customers</a>
        <a href="/add_prod.php" class="element">Add Product</a>
        <a href="/inventory.php" class="element">Inventory</a>
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
        <h1>ADD ORDER</h1>
        <br />
        <hr>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <?php $string_data = file_get_contents("products.php"); ?>
        <?php $products = unserialize($string_data); ?>
            <label for="ordernum">Order #</label>
            <input type="text" placeholder="Enter Order #" name="ordernum" id="ordernum" required>
            <label for="date">Date Ordered</label><br/>
            <input type="date" placeholder="Enter Date Ordered" name="date" id="date" required>
            <br/>
            <hr>
            <label for="item1">Items Ordered</label>
            <select id="prod1" name="prod1">
                <option selected="selected">Choose one</option>
                <?php foreach($products as $prod) { ?>
                    <option name="prod1" value="<?php echo $prod['name']; ?>"><?php echo $prod['name']; ?></option>";
                <?php } ?>
            </select>
            <input type="number" placeholder="Enter Quantity" name="quantity1" id="quantity1" required>
            <select id="prod2" name="prod2">
                <option selected="selected">Choose one</option>
                <?php foreach($products as $prod) { ?>
                    <option name="prod2" value="<?php echo $prod['name']; ?>"><?php echo $prod['name']; ?></option>";
                <?php } ?>
            </select>
            <input type="number" placeholder="Enter Quantity" name="quantity2" id="quantity2" required>
            <select id="prod3" name="prod3">
                <option selected="selected">Choose one</option>
                <?php foreach($products as $prod) { ?>
                    <option name="prod3" value="<?php echo $prod['name']; ?>"><?php echo $prod['name']; ?></option>";
                <?php } ?>
            </select>
            <input type="number" placeholder="Enter Quantity" name="quantity3" id="quantity3" size="5" required>
            <br/>
            <input type="submit" value="Submit">
        </form>
    </div>
    <!--END CONTENT-->

    <!--ADD TO DATABASE-->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contents = file_get_contents("orderlist.php");
    $array = unserialize($contents);
    print_r($_POST);

    $newOrder = array(
        "ordernum" => $_POST['ordernum'],
        "date" => $_POST['date'],
        "prod1" => $_POST['prod1'],
        "quantity1" => $_POST['quantity1'],
        "prod2" => $_POST['prod2'],
        "quantity2" => $_POST['quantity2'],
        "prod3" => $_POST['prod3'],
        "quantity3" => $_POST['quantity3']
    );

    array_push($array, $newOrder);
    file_put_contents("orderlist.php", serialize($array));
    echo "<script type='text/javascript'>alert('Order added succesfully!');</script>";
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
