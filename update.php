<?php 
    include users.php;
    include orders.php;
    if (isset($_POST['submit']) && array_key_exists($_POST['ordernum'], array_column($accounts, 'id'))){
	//add id field in users.php
	$key = array_search($_POST['ordernum'], array_column($accounts, 'id'));
    $from = "support@lahacienda.com";
    $to = $accounts[key]['email'];
    $name = $accounts[key]['name'];
    $subject = "Order Update";
	$original = $_POST['orders'];
	$changes = $_POST['remarks'];
    $message = "Good day!" . "\n\n" . "Your order has been changed from:" . "\n" . $original . "\n\n" . "to the following, as requested: " . $changes . "\n\n" . "If you have any concern, please don't hesitate to contact us by replying to this e-mail." . "\n\n" . "La Hacienda";
    $message2 = "The following order" . $_POST['ordernum'] . "has been changed from:" . "\n" . $original . "\n\n" . "to the following, as requested: " . $changes . "\n\n" . "If you have any concern, please don't hesitate to contact us by replying to this e-mail." . "\n\n" . "La Hacienda";

    $headers = "From:" . $from;
    $headers2 = "From:" . $from;
    mail($to,$subject,$message,$headers); // mails to client
    mail($from,$subject,$message2,$headers2); // mails copy to self
    echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
    }
?>