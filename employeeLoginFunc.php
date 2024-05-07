    <!--LOGIN-->
    <?php 
    session_start();
    $string_data = file_get_contents("users.php");
    $users = unserialize($string_data);
    
    if(isset($_POST['submit'])){
        $valid = false;
        foreach($users as $user) {
            if($_POST['username'] == $user['username'] && $_POST['password'] == $user['password']){
                if($user['type'] == 'admin') {
                    $valid == true;
                    echo "<script type='text/javascript'>alert('Admin access granted.');
                    window.location.href='inventory.php';
                    </script>";
                    break;
                } else {
                $valid == true;
                session_name($_POST['username']);
                $_SESSION['cart'] = '';
                $_SESSION['session_username']=$_POST['username'];
                echo "<script type='text/javascript'>alert('Restricted Access!');
                window.location.href='index.php';
                </script>";
                break;
                }
            }
            else if($_POST['username'] == $user['username'] && $_POST['password'] != $user['password']){
                $valid == true;
                echo "<script type='text/javascript'>alert('Incorrect password!');
                window.location.href='employee.php';
                </script>";
                break;
            }
        }
        if($valid == false) {
            echo "<script type='text/javascript'>alert('No user found!');
            window.location.href='index.php';
            </script>";
        }
    }
    ?>
    <!---->