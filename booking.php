<?php

    session_start();

 
    if(!isset($_SESSION['logged'])){
        header('Location: firstpg.html');

    }
    
    if(isset($_POST['logout-btn'])){
        session_unset();
        header('Location: firstpg.html');
    
    }


    if(isset($_POST['next-btn'])){
		$_SESSION['book']=$_POST;

		$host="localhost";
		$user="root";
		$password="";
		$conn=mysqli_connect($host,$user,$password,"my_login");
		if($conn)
		{
			$firstname = $_POST["firstname"];
			$lastname=$_POST["lastname"];
			$id = rand(100000,9999999);
			$country=$_POST["country"];
			$state=$_POST["state"];
			$email=$_POST["email"];
			$phone = $_POST["phone"];
			$concerts=$_POST["concerts"];
			$amount=$_POST["amount"];
			$sql="INSERT INTO `books` (`firstname`, `lastname`,`id`, `country`, `state`, `email`, `phone`, `concerts`, `amount`) VALUES ('$firstname','$lastname', '$id', '$country', '$state', '$email', '$phone', '$concerts', '$amount')";
			$result = mysqli_query($conn, $sql);
			if ($result){
				header('Location: bookconfirm.php');
			}
			else{
				echo "<div class=\"error\"> SOMETHING WENT WRONG!! </div>";
					
				}

			}else{
				echo "<div class=\"error\"> Connection Error!! </div>";

			}

		}




		
        
       


    




?>


<!DOCTYPE html>
<html>
<title>Booking Details</title>
<style>
input[type=text],
input[type=email],
input[type=tel],
select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.error {
    padding: 10px 10px;
    margin: 10px 10px;
    background-color: red;
    color: white;
    border-radius: 10px;
}

form {
    padding: 20px;
}

form div {
    margin-bottom: 20px;
}

textarea {
    margin: 10px 0px;
    width: 100%;
    height: 100px;
}

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

input[type=submit] {
    width: 100%;
    background-color: fuchsia;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
	font-family:lucida calligraphy;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.group {
    display: flex;
    justify-content: space-evenly;
}

.main {
    border-radius: 5px;
    background-color: rgba(242, 242, 242, 0.8);
}

.log-form {
    display: flex;
    margin: 10px 0px;
    justify-content: space-evenly;
    align-items: center;
}

.log-form input {
    width: 10%;
    border-radius: 10px;
}

.bg {
    border-radius: 15px;
    background-image: url('https://previews.123rf.com/images/vlastas/vlastas1302/vlastas130200020/17895940-music-background-in-the-light-color.jpg');
    background-size: cover;
}
</style>



<body>


    <form class="log-form" action="" method="POST">
        <h3><b>Booking Registration</b></h3>
        <h3>
            Welcome,
            <?php echo $_SESSION['user']['username']; ?>!
        </h3>
        <input type="submit" value="Logout" class="btn" name="logout-btn">
		<button onclick='window.print()'>Print</button>
    </form>
    <div class="bg">

        <div class="main">
            <form action="" method="POST" onsubmit="return check()">

                <div class="group">
                    <div style="width: 40%;">First Name<br />
                        <input type="text" id="first-name" name="firstname" placeholder="John" required />
                    </div>
                    <div style="width: 40%;">Last Name<br />
                        <input type="text" id="last-name" name="lastname" placeholder="Doe" required />
                    </div>
                </div>

                <div>
                    <label for="country">Country</label>
                    <select id="country" name="country" required>
                        <option value="India">India</option>
                    </select>
                </div>
				
				<div>
                    <label for="state">State</label>
                    <select id="state" name="state" required>
                        <option value="TamilNadu">TamilNadu</option>
						<option value="AndhraPradesh">AndhraPradesh</option>
                    </select>
                </div>


                <div>Email<br />
                    <input type="email" id="email" name="email" value="<?php echo $_SESSION['user']['email']; ?>"
                        placeholder="yourname@email.com" readonly />
                </div>
                <div>Phone<br />
                    <input type="tel" id="phone" name="phone" placeholder="9876543210" pattern="[7-9]{1}[0-9]{9}"
                        required><br><br>

                

                       <div style="width: 40%;">
                        <label for="concerts">Concerts</label>
                        <select id="concerts" onchange="change(this.value)" name="concerts" required>
                            <option value="POP-CONCERT" selected>POP-CONCERT</option>
                            <option value="HOUSE-CONCERT">HOUSE-CONCERT</option>
                            <option value="SING-ALONG CONCERT">SING-ALONG CONCERT</option>
                            <option value="CLASSICAL MUSIC-CONCERT">CLASSICAL MUSIC-CONCERT</option>
							<option value="OPERA AND DANCE-CONCERT">OPERA AND DANCE-CONCERT</option>
							<option value="RECITAL-CONCERT">RECITAL-CONCERT</option>
						</select></div>
						<span id='price-display'></span><br />
                    <input id="amount" value="" name="amount" hidden>
                    <p><b>*These concert amounts are the final amounts including GST and other taxes!!*</b>
                <input type="submit" name="next-btn" value="Next">
            </form>
        </div>
    </div>

<script>
    function change(amount) {

        var amounts = {
            "POP-CONCERT": "50,000/-",
            "HOUSE-CONCERT": "20,000/-",
            "SING-ALONG CONCERT": "19,000/-",
            "CLASSICAL MUSIC-CONCERT": "30,000/-",
			"OPERA AND DANCE-CONCERT":"53,000/-",
			"RECITAL-CONCERT":"15,000/-"
        };

        document.getElementById("price-display").innerHTML = "You have selected <b>" + amount + "</b>: Rs. " +
            amounts[
                amount];
        document.getElementById("amount").value = amounts[amount];

    }
</script>


</body>

</html>
