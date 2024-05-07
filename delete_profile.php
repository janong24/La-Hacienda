    <!--DELETE FUNCTION-->
    <?php 
      if (($_SERVER["REQUEST_METHOD"] == "POST")) {
        //load contents of database
        $string_data = file_get_contents("users.php");
        //unserialize contents
        $users = unserialize($string_data);
        
        //isolate associative array from POST
        foreach ($_POST as $key => $val) {
            $array = $val;
        }
        //isolate key
        foreach ($array as $key => $val) {
            $name = $key;
        }
        //search key within database (i.e. name)
        $key = 2 + array_search($key, array_column($users, 'name'));
        //remove the item from the array
        unset($users[$key]);
        //write contents of array back into database
        file_put_contents("users.php", serialize($users));
        header("Location: customers.php");
      }
    ?>
    <!--END DELETE FUNC-->