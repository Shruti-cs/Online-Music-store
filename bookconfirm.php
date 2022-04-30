<?php 
    session_start();
    
	if(!isset($_SESSION['logged'])){
        header('Location: firstpg.html');

    }
    else if(!isset($_SESSION['book'])){
        header('Location: booking.php');

    }
	else if(isset($_POST['logout-btn'])){
        session_unset();
        header('Location: firstpg.html');
    
    }

    
    if(isset($_POST['confirm-btn'])){
        
        $servername = "localhost";
        $databaseName = "my_login";
        
        $conn = mysqli_connect($servername, 'root', '', $databaseName);
        

        if($conn){
	$bookid=rand(100000,9999999);
            $nameOnCard = $_POST['cardname'];
            $cardNumber = $_POST['cardnumber'];
            $expiryDate = $_POST['expmonth'];
            $expiryYear = $_POST['expyear'];
            $cvv = $_POST['cvv'];
			$address=$_POST['address'];
			$city=$_POST['city'];
			$zip=$_POST['zip'];
            $sql = "INSERT INTO `payments`(`bookid`,  `nameOnCard`, `cardNumber`, `expiryDate`, `expiryYear`, `cvv`, `address`, `city`, `zip`) VALUES ( '$bookid', '$nameOnCard', '$cardNumber', '$expiryDate', '$expiryYear', '$cvv', '$address', '$city', '$zip')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header('Location: thankyou1.php');
                
            }else{
            echo "<div class=\"error\"> SOMETHING WENT WRONG!! </div>";
                
            }

        }else{
            echo "<div class=\"error\"> Connection Error!! </div>";

        }

    }



?>


<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Booking confirm Form</title>
    <style>
    body {
        font-family: Arial;
        font-size: 17px;
        padding: 8px;
    }

    * {
        box-sizing: border-box;
    }

    .row {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin: 0 -16px;
    }

    .col-25 {
        -ms-flex: 25%;
        flex: 25%;
    }

    .col-50 {
        -ms-flex: 50%;
        flex: 50%;
    }

    .col-75 {
        -ms-flex: 75%;
        flex: 75%;
    }
    .col-25,.col-50, .col-75 {
        padding: 0 16px;
    }

    .container {
        background-color: #ffc;
        padding: 5px 20px 15px 20px;
        border: 1px solid lightgrey;
        border-radius: 3px;
    }

    input[type=text],
    input[type=number],
    select {
        width: 100%;
        margin-bottom: 20px;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    label {
        margin-bottom: 10px;
        display: block;
    }

    .icon-container {
        margin-bottom: 20px;
        padding: 7px 0;
        font-size: 24px;
    }

    .btn {
        background-color:fuchsia;
        color: white;
        padding: 12px;
        margin: 10px 0;
        border: none;
        width: 100%;
        border-radius: 3px;
        cursor: pointer;
        font-size: 17px;
		font-family:lucida calligraphy;
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
	
    .btn:hover {
        background-color: #45a049;
    }

    a {
        color: #2196F3;
    }

    hr {
        border: 1px solid lightgrey;
    }

    span.price {
        float: right;
        color: grey;
    }

    

    @media (max-width: 800px) {
        .row {
            flex-direction: column-reverse;
        }

        .col-25 {
            margin-bottom: 20px;
        }
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

    .error {
        padding: 10px 10px;
        margin: 10px 10px;
        background-color: red;
        color: white;
        border-radius: 10px;
    }
    </style>
</head>

<body>

    <form class="log-form" action="" method="POST">
        <h3><b>booking Registration</b></h3>
        <h3>
            Welcome,
            <?php echo $_SESSION['user']['username']; ?>!
        </h3>
        <input type="submit" value="Logout" class="btn" name="logout-btn">
		<button onclick='window.print()'>PRINT</button>
    </form>

    <div class="row">
        <div class="col-75">
            <form action="" onsubmit="return check()" method="POST">
                <div class="container">

                    <div class="row">
                        <div class="col-50">
                            <h3>Billing process</h3>
                            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                            <input type="text" id="fname" name="firstname"
                                value="<?php echo $_SESSION['book']['firstname']." ".$_SESSION['book']['lastname']; ?>"
                                readonly>
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="text" id="email" name="email" value="<?php echo $_SESSION['book']['email']; ?>"
                                readonly>
							
                            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                            <input type="text" id="adr" name="address" placeholder="Enter Your area" required>
                                <label for="city"><i class="fa fa-institution"></i> City</label>
                            <input type="text" id="city" name="city" placeholder="Enter Your City" required>

                            <div class="row">
                                <div class="col-50">
                                    <label for="state">State</label>
                                    <input type="text" id="state" name="state" value="<?php echo $_SESSION['book']['state']; ?>" readonly />
									
                                </div>
                                <div class="col-50">
                                    <label for="zip">Zip</label>
                                    <input type="text" id="zip" name="zip" placeholder="Enter Your Pincode" required>
                                </div>
                            </div>
							<label for="amt">Amount</label>
							<input type="text" id="amt" name="amount" value="<?php echo $_SESSION['book']['amount']; ?>" readonly>
                        </div>

                        <div class="col-50">
                            <h3>Payment</h3>
                            <label>Accepted Cards</label>
                            <div class="icon-container">
                                <i class="fa fa-cc-visa" style="color:navy;"></i>
                                <i class="fa fa-cc-amex" style="color:blue;"></i>
                                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                <i class="fa fa-cc-discover" style="color:orange;"></i>
                            </div>
                            <label for="cname">Name on Card</label>
                            <input type="text" id="cname" name="cardname" placeholder="John Doe" required>
                            <label for="ccnum">Credit card number</label>
                            <input type="text" id="ccnum" name="cardnumber" placeholder="002266559988" required>
                            <label for="expmonth">Exp Month</label>
                            <select id="expmonth" name="expmonth" required>
                                <option value="0" disabled selected>Select</option>
                                <option value='Janaury'>Janaury</option>
                                <option value='February'>February</option>
                                <option value='March'>March</option>
                                <option value='April'>April</option>
                                <option value='May'>May</option>
                                <option value='June'>June</option>
                                <option value='July'>July</option>
                                <option value='August'>August</option>
                                <option value='September'>September</option>
                                <option value='October'>October</option>
                                <option value='November'>November</option>
                                <option value='December'>December</option>
                            </select>
                            <div class="row">
                                <div class="col-50">
                                    <label for="expyear">Exp Year</label>
                                    <input type="number" id="expyear" min="2020" max="2035" name="expyear"
                                        placeholder="2025" required>
                                </div>
                                <div class="col-50">
                                    <label for="cvv">CVV</label>
                                    <input type="number" id="cvv" min="100" max="999" name="cvv" placeholder="569"
                                        required>
                                </div>
                            </div>
                        </div>

                    </div>

                    <label for="agree">
                        <input type="checkbox" id="agree" name="agree"> Above given details are well
                        checked</label>
                    <input type="submit" name="confirm-btn" class="btn" value="Check Out">
                </div>
            </form>
        </div>
    </div>


    <script>
    function check() {


        var cname = document.getElementById("cname").value.trim();
        var ccnum = document.getElementById("ccnum").value.trim();
        var expmonth = document.getElementById("expmonth").value.trim();
        var expyear = document.getElementById("expyear").value.trim();
        var cvv = document.getElementById("cvv").value.trim();
        var agree = document.getElementById("agree").checked;

        console.log(cname);
        console.log(ccnum);
        console.log(expmonth);
        console.log(expyear);
        console.log(cvv);
        console.log(agree);

        if (isEmpty(cname) || isEmpty(ccnum) || isEmpty(expmonth) || isEmpty(expyear)) {

            alert("Please enter all values!");
            return false;

        } else if (expmonth == '0') {

            alert("Please select a month!!");
            return false;

        } else if (!agree) {

            alert("Please accept all details are correct!");
            return false;

        } else {

            return true;

        }

    }


    function isEmpty(str) {
        return (str.length === 0 || !str.trim());
    }
    </script>

</body>

</html>
