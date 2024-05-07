    <!--ADD TO DATABASE-->
    <?php
        if(($_SERVER["REQUEST_METHOD"] == "POST")) {
            $string_data = file_get_contents("users.php");
            $users = unserialize($string_data);      
            foreach ($_POST as $key => $val) {
                $array = $val;
            }
            foreach ($array as $key => $val) {
                $name = $key;
            }
            $key = 1 + array_search($key, array_column($users, 'username'));
            print_r(($key));
                $users[$key]['username'] = $_POST['username'];
                $users[$key]['password'] = $_POST['psw'];
                $users[$key]['email'] = $_POST['email'];
                $users[$key]['type'] = "user";
                $users[$key]['fullname'] = $_POST['name'];
                $users[$key]['street'] = $_POST['address'];
                $users[$key]['city'] = $_POST['city'];
                $users[$key]['state'] = $_POST['state'];
                $users[$key]['postalcode'] = $_POST['postal'];
                $users[$key]['phone'] = $_POST['phone'];

            serialize($users);
            header ("Location: customers.php");
            die();
        }
    ?>
    <!---->