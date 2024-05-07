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

    <!--LOAD ITEM-->
    <?php 
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //load contents of database
        $string_data = file_get_contents("products.php");
        //unserialize contents
        $products = unserialize($string_data);
        
        //isolate associative array from POST
        foreach ($_POST as $key => $val) {
            $array = $val;
        }
        //isolate key
        foreach ($array as $key => $val) {
            $name = $key;
        }
        //search key within database (i.e. name)
        $key = 1 + array_search($key, array_column($products, 'name'));
      }
    ?>
    <!---->

    <!--CONTENT-->
    <div class="content-container">       
        <h1>EDIT PRODUCT</h1>
        <br />
        <form action="editProdFunc.php" method="POST">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?php echo $products[$key]['name']; ?>" required>
        
            <label for="category">Category</label>
            <input type="text" id="category" name="category" value="<?php echo $products[$key]['category']; ?>" required>

            <label for="vendor">Vendor Name</label>
            <input type="text" id="vendor" name="vendor" value="<?php echo $products[$key]['vendor']; ?>" required>

            <label for="vendor_desc1">Vendor Description</label>
            <textarea id="vendor_desc1" name="vendor_desc1" style="height:200px" required><?php echo $products[$key]['vendor_desc1']; ?></textarea>

            <label for="vendor_desc2">Additional Vendor Description</label>
            <textarea id="vendor_desc2" name="vendor_desc2" style="height:200px" required><?php echo $products[$key]['vendor_desc2']; ?></textarea>

            <label for="price">Price</label>
            <input type="text" id="price" name="price" value="<?php echo $products[$key]['price']; ?>" required>

            <label for="description">Product Description</label>
            <textarea id="description" name="description" style="height:200px" required><?php echo $products[$key]['description']; ?></textarea>
            
            <label for="subtext">Subtext</label>
            <textarea id="subtext" name="subtext" style="height:100px" required><?php echo $products[$key]['subtext']; ?></textarea>

            <div class="row container-fluid pt-2 py-2">
                <div class="col-sm-2 text-center"></div>
                <div class="col-sm-4 text-center">
                    <img class="img-fluid pb-3" style="width:100%;" src="<?php echo $products[$key]['image']; ?>"/>
                </div>
                <div class="col-sm-4 text-center">
                <br /><br /><br />
                    <label for="image">Upload new product image</label>
                    <br />
                    <input type="file" id="image" name="image">
                </div>
                <div class="col-sm-2 text-center"></div>
            </div>
            <br />
            <br />
            <input type="submit" value="Submit">
        </form>
        <br />
        <a href="/inventory.php"><input type="reset" value="Cancel"></a>
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
