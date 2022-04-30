<?php

    session_start();
    if(!isset($_SESSION['logged'])){
        header('Location: firstpg.html');
    }

    if(isset($_POST['logout-btn'])){
        session_unset();
        header('Location: firstpg.html');
    
    }


    $servername = "localhost";
    $databaseName = "my_login";
  
    $conn = mysqli_connect($servername, 'root', '', $databaseName);
    
    $users = array();
    $customers = array();
    
    echo "<h2><center> ADMIN DASHBOARD </center></h2>";
	echo "<button onclick='window.print()'>PRINT</button>";
    if($conn){


        echo "<h3>USERS DETAILS:</h3>";

        $sql = "SELECT * FROM `users` WHERE NOT username = 'admin'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

            echo "<table><tr><th>Username</th><th>Email</th></tr>";
            while($row = mysqli_fetch_assoc($result)) {
       
       
                echo "<tr>";
                $username = $row['username'];
                $email = $row['email'];

                $sql = "SELECT COUNT(*) as purchased FROM `trips` WHERE username='$username' ";
                $query = mysqli_query($conn, $sql);
                echo "<td>$username</td>";
                echo "<td>$email</td>";
                
              
                echo "</tr>";
            
            }
            echo "</table>";
		
			
        }
		
		
		 echo "<h3>PURCHASE DETAILS:</h3>";

        $sql = "SELECT * FROM `purch` WHERE NOT firstname = 'admin'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

            echo "<table><tr><th>Purchase Id</th><th>Name</th><th>Email</th><th>Instrument</th><th>Type</th><th>Amount</th></tr>";
            while($row = mysqli_fetch_assoc($result)) {
       
       
                echo "<tr>";
				$id=$row['id'];
                $name = $row['firstname']." ".$row['lastname'];
                $email = $row['email'];
				$instruments=$row['instruments'];
				$type=$row['type'];
				$amount=$row['amount'];

                $sql = "SELECT COUNT(*) as purchased FROM `purch` WHERE name='$name' ";
                $query = mysqli_query($conn, $sql);
				echo "<td>$id</td>";
                echo "<td>$name</td>";
                echo "<td>$email</td>";
                echo "<td>$instruments</td>";
				echo "<td>$type</td>";
				echo "<td>$amount</td>";
              
                echo "</tr>";
            
            }
            echo "</table>";


			
			
			
			
        }
		
		
		echo "<h3>BOOKING DETAILS:</h3>";

        $sql = "SELECT * FROM `books` WHERE NOT firstname = 'admin'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

            echo "<table><tr><th>Booking Id<th>Name</th><th>Email</th><th>Concert</th><th>Amount</th></tr>";
            while($row = mysqli_fetch_assoc($result)) {
       
       
                echo "<tr>";
				$id=$row['id'];
                $name = $row['firstname']." ".$row['lastname'];
                $email = $row['email'];
				$concerts=$row['concerts'];
				$amount=$row['amount'];

                $sql = "SELECT COUNT(*) as purchased FROM `books` WHERE name='$name' ";
                $query = mysqli_query($conn, $sql);
				echo "<td>$id</td>";
                echo "<td>$name</td>";
                echo "<td>$email</td>";
                echo "<td>$concerts</td>";
				echo "<td>$amount</td>";
              
                echo "</tr>";
            
            }
            echo "</table>";


			
			
			
			
        }
		
		
        else{
            echo "<div class=\"error\"> No Users Found! </div>";

        }

       





        echo '<form action="" method="POST"> <input type="submit" value="Logout" class="btn" name="logout-btn"> </form>';


    }else{
        
        echo "<div class=\"error\"> Connection Error! </div>";


    }



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>ADMIN DASHBOARD</title>



    <style>
	button{
		background-color:fuchsia;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 10%;
        border-radius: 10px;
        opacity: 0.9;
		font-family:lucida calligraphy;
	}
    .btn {
        background-color:fuchsia;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 10%;
        border-radius: 10px;
        opacity: 0.9;
		font-family:lucida calligraphy;
    }

    form {
        display: flex;
        width: 100%;
        margin: 50px 0px;
        justify-content: center;
    }

    .btn:hover {
        opacity: 1;
    }

    table {
        font-family: californian FB, lucida calligraphy;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid black;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color:orange;
    }

    .error {
        padding: 10px 10px;
        margin: 10px 10px;
        background-color: red;
        color: white;
        border-radius: 10px;
    }

    .success {
        padding: 10px 10px;
        margin: 10px 10px;
        background-color: green;
        color: white;
        border-radius: 10px;
    }
    </style>
</head>

<body>



</body>

</html>
