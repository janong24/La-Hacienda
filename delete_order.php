    <!--DELETE FUNCTION-->
    <?php 
      if (($_SERVER["REQUEST_METHOD"] == "POST")) {
        //load contents of database
        $string_data = file_get_contents("orderlist.php");
        //unserialize contents
        $orders = unserialize($string_data);
        
        //isolate associative array from POST
        foreach ($_POST as $key => $val) {
            $array = $val;
        }
        //isolate key
        foreach ($array as $key => $val) {
            $name = $key;
        }
        //search key within database (i.e. name)
        $key = array_search($key, array_column($orders, 'ordernum'));
        //remove the item from the array
        unset($orders[$key]);
        //write contents of array back into database
        file_put_contents("orderlist.php", serialize($orders));
        header("Location: orders.php");
      }
    ?>
    <!--END DELETE FUNC-->