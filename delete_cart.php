    <!--DELETE FUNCTION-->
    <?php  
    foreach ($_SESSION['cart'] as $item) { 
          foreach ($item as $key => $val) { 
              $array = $val; 
          } 
          $key = 1 + array_search($key, array_column($products, 'name'));
        }
    ?>