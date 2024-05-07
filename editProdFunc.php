
    <!--UPDATE DATABASE-->
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
    echo "<script type='text/javascript'>alert('Product edited succesfully!');
    window.location.href='inventory.php';
    </script>";
    }
    ?>
    <!---->