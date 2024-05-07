<?php
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

?>