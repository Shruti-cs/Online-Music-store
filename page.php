<?php
    session_start();

    
    if(isset($_SESSION['logged'])){
        
        if($_SESSION['user']['username'] == 'admin'){
            header('Location: admin.php');
        }else{
            header('Location: home page.html');
        }
    }


    if(isset($_POST['login-btn'])){


        $servername = "localhost";
        $databaseName = "my_login";
      
        $conn = mysqli_connect($servername, 'root', '', $databaseName);
        if($conn){
            
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM `users` WHERE username='$username'";
            
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
            
                $sql = "SELECT * FROM `users` WHERE username='$username' AND password='$password'";
                $result = mysqli_query($conn, $sql);



                if (mysqli_num_rows($result) > 0) {

                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['logged'] = "true";
                    $_SESSION['user'] = $row;

                    if($row['username'] == "admin"){
                        header('Location: admin.php');
                    }
                    else{
						
                        header('Location: home page.html');
                    }

                }else{
                    echo "<div class=\"error\"> Invalid Password! </div>";
                }

            }
             else {
            header('Location: register.html');
            }
        }else{
        
            echo "<div class=\"error\"> Connection Error!! </div>";

        
        }
    


    }


?>


