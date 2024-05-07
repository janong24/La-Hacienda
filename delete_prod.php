    <!--DELETE FUNCTION-->
    <?php 
      if (($_SERVER["REQUEST_METHOD"] == "POST")) {
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
        //remove the item from the array
        unset($products[$key]);
        //write contents of array back into database
        file_put_contents("products.php", serialize($products));
        header("Location: inventory.php");
      }
    ?>
    <!--END DELETE FUNC-->