<html>
<head>
<title>SAMPLE MAIL</title>
</head>
<body>
<?PHP
	$img="https://st2.depositphotos.com/4446567/6584/i/950/depositphotos_65841281-stock-photo-have-a-nice-day.jpg";
	$to="shrutics.star@gmail.com" ;
	$sub="WEB TECHNOLOGY LAB | SAMPLE MAIL";
	$msg="<b>Hi!!!! HAVE A NICE DAY!!</b>,<br><img src='$img'>" ;
	$headers="\n MIME-Version: 1.0\n";
	$headers="Content-type: text/html; charset=iso-8859-1\r\n";

if(mail($to,$sub,$msg,$headers))
{
	echo "MESSAGE SENT";
	
}
else
{
	echo "Error: MESSAGE NOT SENT";
}
?>
</body>
</html>