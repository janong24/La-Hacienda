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

    <!--CONTENT-->
    <div class="content-container">       
        <h1>ADD PRODUCT</h1>
        <br />
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter product name" required>
        
            <label for="category">Category</label>
            <select id="category" name="category" placeholder="Enter product category" required>
                <option value="Mushrooms">Mushrooms</option>
                <option value="Grains">Grains</option>
                <option value="Dairy">Dairy</option>
                <option value="Beef">Beef</option>
                <option value="Chicken">Chicken</option>
                <option value="Lamb">Lamb</option>
                <option value="Vegetables">Vegetables</option>
                <option value="Fruits">Fruits</option>
                <option value="Snacks">Snacks</option>
            </select>

            <label for="vendor">Vendor Name</label>
            <input type="text" id="vendor" name="vendor" placeholder="Enter vendor name" required>

            <label for="vendor_desc1">Vendor Description</label>
            <textarea id="vendor_desc1" name="vendor_desc1" placeholder="Enter vendor description" style="height:200px" required></textarea>

            <label for="vendor_desc2">Additional Vendor Description</label>
            <textarea id="vendor_desc2" name="vendor_desc2" placeholder="Enter additional vendor description" style="height:200px" required></textarea>

            <label for="price">Price</label>
            <input type="text" id="price" name="price" placeholder="Enter product price" required>

            <label for="description">Product Description</label>
            <textarea id="description" name="description" placeholder="Enter product description" style="height:200px" required></textarea>
            
            <label for="subtext">Subtext</label>
            <textarea id="subtext" name="subtext" placeholder="Enter subtext" style="height:100px" required></textarea>

            <label for="image">Upload product image</label>
            <br />
            <input type="file" id="image" name="image">
            <br />
            <br />
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
        </form>
    </div>
    <!--END CONTENT-->

    <!--ADD TO DATABASE-->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //load database
    $string_data = file_get_contents("products.php");
    //unserialize database
    $array = unserialize($string_data);
    
    //structure information as new array
    $newProd = array(
        "name" => $_POST['name'],
        "category" => $_POST['category'],
        "promo_amt" => 0,
        "price" => $_POST['price'],
        "description" => $_POST['description'],
        "subtext" => $_POST['subtext'],
        "vendor" => $_POST['vendor'],
        "vendor_desc1" => $_POST['vendor_desc1'],
        "vendor_desc2" => $_POST['vendor_desc2'],
        "image" => $_POST['image'],
        "file" => "/products/" . $_POST['name'] . ".php"
    );

    //create new file for new product
    $newContent = file_get_contents("template.php");
    $newContent = '<?php $prodName="' . $_POST['name'] . '" ?>' . $newContent;
    if (!file_exists($_POST['name'] . '.php')) { 
        $handle = fopen('products/' . $_POST['name'] . '.php','w+'); 
        fwrite($handle,$newContent); 
        fclose($handle); 
    }

    //push new product array into database
    array_push($array, $newProd);
    //seriailize new array with new product and write to file
    file_put_contents("products.php", serialize($array));
    echo "<script type='text/javascript'>alert('Product added succesfully!');</script>";
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
