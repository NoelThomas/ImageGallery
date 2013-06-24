<html>
<body>

Welcome <?php echo $_POST["name"]; ?>!<br>
Your email <?php echo $_POST["email"]; ?>.<br>
Your message is <?php echo $_POST["message"];?>.
<?php
$to = "aarathi@qburst.com";
$subject = "Test mail";
$message = "Hello! This is a simple email message.";
$from = "noel@qburst.com";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);
echo "Mail Sent.";
?>

</body>
</html> 
