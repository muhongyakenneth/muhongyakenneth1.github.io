<?php 

		include("inc/db.php");
		$query=$con->prepare("select *from contact where con_id='".$_COOKIE['userid']."'");
		
		$query->execute();
		$row=$query->fetch();
		

		// Import PHPMailer classes into the global namespace
		// These must be at the top of your script, not inside a function
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;
		echo !extension_loaded('openssl')?"Not Available":"Available";
		//Load Composer's autoloader
		require 'vendor/autoload.php';

		$mail = new PHPMailer(); // create a new object
		$mail->IsSMTP(); // enable SMTP
		$mail->SMTPDebug = 2; // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true; // authentication enabled
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 465; // or 587
		$mail->IsHTML(true);
		$mail->Username = "muhongyakenneth1@gmail.com";
		$mail->Password = "bridgetken12";
		$mail->SetFrom("muhongyakenneth1@gmail.com","E-Learing");
		$mail->Subject = "Payment Details E- Learning";
		$mail->Body = "Hi dear Student the account details of admin name - xxxxx  and Account Number - 123xxxxxxx455 to transfer the amount of us dollars. ".$_GET['amount']." copy the transacttion id , to send to the admin of Gelegenheit website";
		
		$mail->AddAddress("".$row['email']."");

		 if(!$mail->Send()) {
			echo"Mailer Error: " . $mail->ErrorInfo;
		 } else {
			echo "Message has been sent";
			
			echo"<script>alert('Details sent to email successfully')</script>";
			echo"<script>window.open('delete_cart_after_buy.php','_self')</script>";
			
			
		 }
/*
else
{
		
		echo"<script>alert('!...email is Invalid...')</script>";
		echo"<script>window.open('index.php','_selt')</script>";
			
}*/
?>