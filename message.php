<!DOCTYPE html>
<html lang="en">
<head>
	<style>
			body{
				background-image=url("");
				background-size:cover;
				background-position:center;
				font-family:lucida calligraphy;
				text-align:center;
				font-weight:bold;
				font-size:15px;
				}

			input[type=text]
			{
				width: 100%;
				padding: 15px;
				margin: 5px 0 22px 0;
				border: none;
				background: #ddd;
			}

			input[type=text]:focus
			{
				background-color: #ffc;
				outline: none;
			}

			input[type=submit] {
				background-color:fuchsia;
				color: white;
				padding: 16px 20px;
				border: none;
				cursor: pointer;
				width: 100%;
				opacity: 0.9;
				font-family:lucida calligraphy;
			}	

			input[type=submit]:hover {
				opacity: 1;
			}

	</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
		MOBILE NUMBER:
        <input type="text" name="number" placeholder="enter number"/><br /><br />
		MESSAGE:
        <input type="text" name="text" placeholder="enter message"/><br /><br />
        <input type="submit" value="send" name="submit">
    </form>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    $number=$_POST['number'];
    $text=$_POST['text'];

$url="www.way2sms.com/api/v1/sendCampaign";
$message = urlencode($text);
$curl = curl_init();
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, "apikey=GI5C79AQSU608WEWFUXDF9TGSFMH6VEA&secret=NT3ZV43JWQ9J8WIU&usetype=stage&phone=$number&senderid=shrutics.star@gmail.com&message=$message");

curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);
echo $result;


}
?>
