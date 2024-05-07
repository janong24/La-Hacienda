   <!--EMAIL SENDER-->
   <?php
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;
        require './PHPMailer-master/src/PHPMailer.php';
        require './PHPMailer-master/src/SMTP.php';
        require './PHPMailer-master/src/Exception.php';
        $content = $_POST['changes'];
        try {
            if (($_SERVER["REQUEST_METHOD"] == "POST")) {
                $body = "
                Hi!\n\n
                This is an e-mail from La Hacienda.\n
                Below is a list of changes to be made on your order.\n
                Please let us know if you have any concerns.\n\n
                " . $content;
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
                echo "<script type='text/javascript'>alert('Email sent!');</script>";
            } 
        }catch (Exception $e) {
            echo "<script type='text/javascript'>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
        }
        
    ?>
    <!---->
