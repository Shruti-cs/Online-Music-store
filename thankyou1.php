<?php

    session_start();
    
    $name = $_SESSION['book']['firstname']." ".$_SESSION['book']['lastname'];
    $concerts=$_SESSION['book']['concerts'];
	$amount=$_SESSION['book']['amount'];
	
	$image = "https://en.pimg.jp/057/768/066/1/57768066.jpg";
	

    $sub = "Your Booking is Successful | SSS MUSIC STORE";
    $msg = "Hi $name,<br><img src='$image'> <br> Your Booking has been registered successfully!<br>Booking Details:<br><b>--------------------</b><br>CONCERT:<b>$concerts</b><br>AMOUNT:<b>$amount</b><br> Thanks for choosing our store!<br>Have a wonderfull concert";
    $rec = $_SESSION['user']['email'];
    $headers = "MIME-Version: 1.0\r\n";
    $headers = "Content-type: text/html; charset=iso-8859-1\r\n";
    mail($rec,$sub,$msg,$headers); 
	
	
	
    $phone=$_SESSION['book']['phone'];
	$name = $_SESSION['book']['firstname']." ".$_SESSION['book']['lastname'];
    $text="Hi!!! $name, Payment successfull..        Thanks for choosing our store!!!,Have a MUSICAL WORLD around U!!"
	;

$url="www.way2sms.com/api/v1/sendCampaign";
$message = urlencode($text);
$curl = curl_init();
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, "apikey=GI5C79AQSU608WEWFUXDF9TGSFMH6VEA&secret=NT3ZV43JWQ9J8WIU&usetype=stage&phone=$phone&senderid=shrutics.star@gmail.com&message=$message");

curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);




	
	

	if(!isset($_SESSION['logged'])){
        header('Location: firstpg.html');
    } else if(!isset($_SESSION['book'])){
        header('Location: booking.php');
    } else if(!isset($_SESSION['book'])){
        header('Location: bookconfirm.php');
    } else{
        session_unset();
    } 
    
?>


<!DOCTYPE html>

<html>

<head>

    <title>Thank You!</title>
    <meta http-equiv="refresh" content="10;URL='firstpg.html'" />
    <style>
    body {
        background-image: url("https://i.pinimg.com/originals/00/7b/8e/007b8ec3e77280a2e4de7eae0dc5f493.jpg");
        background-color:#ffc;
        min-height: 500px;
        background-position: center;
        background-repeat: no-repeat;
        position: relative;
    }
    </style>
</head>

<body>

    <h1><b>THANK YOU FOR BOOKING IN SSS MUSIC STORE!!</b></h1>

    <p>Your booking has been registered successfully!!</p>

    

    
    <p><i><B>The details of the booking and other informaion about your booking will be mailed you soon!!</B></i></p>
    <br>
    <p>Wait for few seconds.. You will redirected to our login page!</p>
    <br>
    <p><b>THANK YOU!!</b></p>
    

</body>

</html>
