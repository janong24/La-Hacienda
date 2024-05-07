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
    <div class="content-container-lg">
      <div class="pb-3" style="float:left">
        <a href="/add_order.php"><input type="submit" value="Add Order"></a>
      </div>
      <div class="pb-3" style="float:right">
        <form action="#">
          <select name="sort" id="sort">
              <option value="default">Sort</option>
              <option value="recent">Date Received</option>
              <option value="shipped">Not Yet Shipped</option>
          </select>
        </form>
      </div>
      <table class="inventory" width="100%">
        <tr>
          <th>Order #</th>
          <th>Date Ordered</th>
          <th>Items</th>
          <th>Shipped?</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
        <?php $string_data = file_get_contents("orderlist.php"); ?>
        <?php $orderlist = unserialize($string_data); ?>
        <?php foreach($orderlist as $list) { ?>
          <tr>
            <!--iterate through entire users DB and print it out-->
            <?php if(isset($list['ordernum'])){ ?>
                <td><?php echo $list['ordernum']; ?></td>
                <td><?php echo $list['date']; ?></td>
                <td>
                    <?php echo $list['prod1']; ?>&nbsp;|&nbsp;<?php echo $list['quantity1']; ?>x<br/>
                    <?php echo $list['prod2']; ?>&nbsp;|&nbsp;<?php echo $list['quantity2']; ?>x<br/>
                    <?php echo $list['prod3']; ?>&nbsp;|&nbsp;<?php echo $list['quantity3']; ?>x<br/>
                </td>
                <td>No</td>
                <td><form action="edit_order.php" method="POST">
                <input type="submit" value="Edit" name="user[<?php echo $list['ordernum']; ?>]"/>
                </form></td>
                <td><form action="delete_order.php" method="POST">
                <input type="submit" value="Delete" name="user[<?php echo $list['ordernum']; ?>]"/>
                </form></td>
            <?php } ?>
            </tr>
        <?php } ?>
      </table>
    </div>
    <!--END CONTENT-->

    <!--BOTTOM BAR-->
    <footer class="container-fluid text-center pt-3">
        <p style="font-family: 'Bodoni Moda'; color: #f2f2f2; font-size:small;">&#169; La Hacienda - Farm to Fork | All Rights Reserved.</p>
    </footer>
    <!--END FOOTER-->
</body>
</html>
