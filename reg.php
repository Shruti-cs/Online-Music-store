<?php
   
if(isset($_POST['register-btn'])){


    $servername = "localhost";
    $databaseName = "my_login";
    $conn = mysqli_connect($servername, 'root', '', $databaseName);
    if($conn){
    
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $sql = "SELECT * FROM `users` WHERE username='$username'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
           
            echo "<div class=\"error\"> Username already exists! </div>";
        
        }
        else{

            $sql = "INSERT INTO `users`(`username`, `email`, `password`) VALUES ('$username','$email','$password')";
        
            $result = mysqli_query($conn, $sql);
    
            if (($result)) {
                
                header('Location: firstpg.html');
    
              } else {
               
                echo "<div class=\"error\"> Registration Failed! </div>";
    
            }

        }

        

    }else{
        echo "<div class=\"error\"> Connection Error!! </div>";
    }



}


?>


