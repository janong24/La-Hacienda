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
        <?php 

        //load contents of database
        $string_data = file_get_contents("users.php");
        //unserialize contents
        $users = unserialize($string_data);
                
        //search key within database (i.e. name)
        $value = array_search($_POST['email'], array_column($users, 'email'));
        if ($value == null) {
            echo "<script type='text/javascript'>alert('Account not found!');
            window.location.href='contact.php';
            </script>";
        } 
        ?>


    <div class="content-container">       
        <h1>CONTACT US</h1>
        <br />
        <p>Thank your for getting in touch with us. <br />We will get back to you as soon as we can.</p>
        <p>Please enter the information below to pull up your order.</p>
        <br />
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="<?php echo $_POST['email']; ?>"disabled>
            
            <label for="order">Order #</label>
            <input type="text" id="order" name="order" value="<?php echo $_POST['order']; ?>" disabled>

            <label for="orderlist">Your Orders</label>
            <textarea id="orderlist" name="orderlist" style="height:150px" disabled>
<?php $string_data = file_get_contents("orderlist.php"); ?>
<?php $orderlist = unserialize($string_data); ?>
<?php foreach($orderlist as $list) { ?>
<?php if($list['ordernum'] == $_POST['order']){ ?>
<?php echo $list['prod1']; ?>&nbsp;|&nbsp;<?php echo $list['quantity1']; ?>x
<?php echo $list['prod2']; ?>&nbsp;|&nbsp;<?php echo $list['quantity2']; ?>x
<?php echo $list['prod3']; ?>&nbsp;|&nbsp;<?php echo $list['quantity3']; ?>x
                <?php } ?>
            <?php } ?>
            </textarea>

            <label for="questions">Questions</label>
            <textarea id="questions" name="questions" placeholder="What do you want us to know..." style="height:150px" required></textarea>
        
            <input type="submit" value="Send">
        </form>
    </div>
    <!--END CONTENT-->

    <!--EMAIL SENDER-->
    <?php
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;
        require './PHPMailer-master/src/PHPMailer.php';
        require './PHPMailer-master/src/SMTP.php';
        require './PHPMailer-master/src/Exception.php';
        $body = $_POST['questions'];
        try {
            if (($_SERVER["REQUEST_METHOD"] == "POST")) {
                $body = "
                Hi!\n\n
                This is an e-mail from La Hacienda.\n
                Below is a copy of your message to us.\n
                Rest assured, we will reply as soon as possible.\n\n

                ". $body;
                $username = 'janong24@gmail.com';
                $password = 'Nickelshark24!';

                $mail = new PHPMailer(true);
                $mail->IsSMTP();
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 587;
                $mail->IsHTML(true);
                $mail->Username = $username;
                $mail->Password = $password;
                $mail->SetFrom('janong24@gmail.com', 'Jan Ong');
                $mail->addReplyTo('janong24@gmail.com', 'Jan Ong');
                $mail->Subject = 'La Hacienda - A copy of your message';
                $mail->Body = $body;
                $mail->AddAddress($_POST['email']);
                $mail->send();
            } 
        }catch (Exception $e) {
            echo "<script type='text/javascript'>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
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
