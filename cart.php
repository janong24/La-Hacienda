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
    <script language="JavaScript" type="text/javascript" src="lahacienda.js"></script>
    <!---->

    <!--CUSTOME STYLESHEET FOR CART ONLY-->
    <style>
        .row {
            display: -ms-flexbox; /* For IE10 */
            display: flex;
            -ms-flex-wrap: wrap; /* For IE10 */
            flex-wrap: wrap;
            margin: 20px;
        }

        .col-25 {
        -ms-flex: 25%; /* For IE10 */
        flex: 25%;
        }

        .col-50 {
        -ms-flex: 50%; /* For IE10 */
        flex: 50%;
        }

        .col-75 {
        -ms-flex: 75%; /* For IE10 */
        flex: 75%;
        }

        .col-25,
        .col-50,
        .col-75 {
        padding: 0 16px;
        }

        .container {
        background-color: #f2f2f2;
        padding: 20px;
        border: 1px solid lightgrey;
        border-radius: 3px;
        }

        input[type=text] {
        width: 100%;
        margin-bottom: 20px;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 3px;
        }

        label {
        margin-bottom: 10px;
        display: block;
        }

        .icon-container {
        margin-bottom: 20px;
        padding: 7px 0;
        font-size: 24px;
        }

        .btn {
        background-color: #4CAF50;
        color: white;
        padding: 12px;
        margin: 10px 0;
        border: none;
        width: 100%;
        border-radius: 3px;
        cursor: pointer;
        font-size: 17px;
        }

        .btn:hover {
        background-color: #45a049;
        }

        span.price {
        float: right;
        color: grey;
        }

        @media (max-width: 800px) {
            .row {
                flex-direction: column-reverse;
            }
            .col-25 {
                margin-bottom: 20px;
            }
        }
    </style>

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
    function updatePrices2() {
    var table = document.getElementById("cart");
    for (var i = 0, cell; cell = table.cells[i]; i++) {
        if(cell.id = "pricedata") {
            var price = document.getElementById("pricedata").value;
        }
        if(cell.id = "qtdata") {
            var qt = document.getElementById("qtdata").value;
        }
        if(cell.id= "subtotaldata") {
        document.getElementById("subtotaldata").innerHTML = "$" + (price*qt);
    }
   }
}
</script>
    <!---->
</head>

<body onload="updatePrices2()">
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
    <div class="row">
    <div class="container">
      <h4>Your Shopping Cart</h4>
      <table class="inventory" width=100% id="cart">
        <tr>
          <th style="width: 30%;"></th>
          <th style="width: 25%;">Items</th>
          <th style="width: 15%;">Quantity</th>
          <th style="width: 15%;">Price</th>
          <th style="width: 15%;">Subtotal</th>
        </tr>
        
        
        <?php  foreach ($_SESSION['cart'] as $item) { ?>  
        <?php  foreach ($item as $key => $val) { ?>
        <?php  $array = $key; ?>
        <?php  } ?>
        <?php  $array = str_replace("_", " ", $array) ?>
        <?php  $string_data = file_get_contents("products.php"); ?>
        <?php  $products = unserialize($string_data); ?>
        <?php  $key = 1 + array_search($array, array_column($products, 'name')); ?>
        
        <tr>
          <td>
            <a href="<?php echo $products[$key]['file']; ?>"><img src="<?php echo $products[$key]['image']; ?>" style="width: 75%; float: right;"></a>
          </td>
          <td>
            <a href="<?php echo $products[$key]['file']; ?>"><b><?php echo $products[$key]['name']; ?></b></a>
            <p><?php echo $products[$key]['subtext']; ?></p>
            <input type="reset" value="Delete Item" name="<?php echo $products[$key]['name']; ?>" onclick="removeRow(this); updatePrices(); delete_cart.php">
          </td>
          <td id="qtdata">
          <div class="center">
            <div class="value-button" id="decrease" onclick="decreaseValue(); updatePrices2()" value="Decrease Value">-</div>
            <input type="text" id="number" name="quantity" value="1" />
            <div class="value-button" id="increase" onclick="increaseValue(); updatePrices2()" value="Increase Value">+</div>
          </div>
          </td>
          <td id="pricedata">
            <span id="price">$<?php echo $products[$key]['price']; ?></span>
          </td>
          <td id = "subtotaldata">
            <span id="subtotal1" style="float:right;">$15</span>
          </td>
        </tr>
        <?php } ?>
      </table>
      <hr>
      <p>
          Sub-Total 
          <span id="subtotal" style="color:black; font-weight: bold; float:right;">$18</span>
      </p>
      <p>
          GST (5%)
          <span id="gst" style="color:black; font-weight: bold; float:right;">$0.90</span>
      </p>
      <p>
          PST (9.975%)
          <span id="pst" style="color:black; font-weight: bold; float:right;">$1.80</span>
      </p>
      <p>
          Grand Total 
          <span id="grandtotal" style="color:black; font-weight: bold; float:right;">$20.70</span>
      </p>
    </div>
  </div>

    <div class="row">
          <div class="container">
            <form action="#">
              <div class="row">
                <div class="col-50">
                  <h3>Billing Address</h3>
                  <label for="fname"> Full Name</label>
                  <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
                  <label for="email"> Email</label>
                  <input type="text" id="email" name="email" placeholder="john@example.com">
                  <label for="adr"> Address</label>
                  <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
                  <label for="city"> City</label>
                  <input type="text" id="city" name="city" placeholder="New York">
      
                  <div class="row">
                    <div class="col-50">
                      <label for="state">State</label>
                      <input type="text" id="state" name="state" placeholder="NY">
                    </div>
                    <div class="col-50">
                      <label for="zip">Zip</label>
                      <input type="text" id="zip" name="zip" placeholder="10001">
                    </div>
                  </div>
                </div>
      
                <div class="col-50">
                  <h3>Payment</h3>
                  <label for="cname">Name on Card</label>
                  <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                  <label for="ccnum">Credit card number</label>
                  <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                  <label for="expmonth">Exp Month</label>
                  <input type="text" id="expmonth" name="expmonth" placeholder="September">
      
                  <div class="row">
                    <div class="col-50">
                      <label for="expyear">Exp Year</label>
                      <input type="text" id="expyear" name="expyear" placeholder="2018">
                    </div>
                    <div class="col-50">
                      <label for="cvv">CVV</label>
                      <input type="text" id="cvv" name="cvv" placeholder="352">
                    </div>
                  </div>
                </div>
      
              </div>
              <label>
                <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
              </label>
            </form>
            <input type="submit" value="Continue to Checkout" class="btn" onclick="location.href='checkout.html';">
            <input type="submit" value="Continue Shopping" class="btn" onclick="location.href='market.php';">
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
