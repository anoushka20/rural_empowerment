<?php
$error='Could not connect';
$mysql_host='localhost';
$mysql_user='root';
$mysql_pass='';
$mysql_db='rural';
if(!@mysql_connect($mysql_host,$mysql_user,$mysql_pass)|| !@mysql_select_db($mysql_db) )
{
	echo $error;
}
else
{
	echo 'Connected to database! <br><br>';
}

if(isset($_POST['name'])&&isset($_POST['contact'])&&isset($_POST['email'])&&isset($_POST['state'])&&isset($_POST['city'])&&isset($_POST['address'])&&isset($_POST['msg']))
{
	 $name=$_POST['name'];
	 $contact=$_POST['contact'];
	 $email=$_POST['email'];
	 $msg=$_POST['msg'];
	 $city=$_POST['city'];
	 $state=$_POST['state'];
	 $address=$_POST['address'];

	 if(!empty($name)&&!empty($contact)&&!empty($email)&&!empty($msg)&&!empty($city)&&!empty($state)&&!empty($address))
	{
	 $query="insert into `complaint` values ('','$name','$contact','$email','$state','$city','$address','$msg')";	
		if($query_run=mysql_query($query))
					echo 'Inserted into DB';
				else
					echo 'Cannot insert into DB<br>';	
	}
}
	else 
	{
		echo 'Please go back fill all the fields in the Contact Form!';

	}
	
	
//MESSAGING:
		if(!empty($_POST['first_name'])&&!empty($_POST['last_name'])&&!empty($_POST['email'])&&!empty($_POST['msg'])&&!empty($_POST['phone']))
				$to='anoushka.20jul@gmail.com';
				$sub='Contact Form Submitted';
				$body=$msg;
				$header='From: '.$email;
				if(mail($to,$sub,$body,$header))
				{
				echo 'Thanks for contacting us. We will be in touch soon';
				}
				else
				{
				echo 'Sorry, Error in sending mail. Please try again later!';
				}

?>



<!DOCTYPE html>
<html lang="en">
	 <link rel="stylesheet" href="head.css">
	 <meta charset="utf-8"> 
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	

<body style="background-color: #bdd2ed;" id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<div class="container">
	<div class="jumbotron">

<form action="complaint.php" method="POST">
		<div class="row">
			<div class="column">
				Name:<br>
				<input  type="text" name="name" id="name" maxlength="50" size="30">
				<br>
				Contact Number:<br>
				<input  type="text" name="contact" id="phone" maxlength="50" size="30">
				<br>
				Email Address:<br>
				<input  type="text" name="email" id="email"maxlength="50" size="30"><br>
			</div>
			
			
			<div class="column">
				State:<br>
				<input  type="text" name="state" id="sate"maxlength="50" size="30">
				<br>
				City:<br>
				<input  type="text" name="city" id="city"maxlength="50" size="30">
				<br>
				Address:<br>
				<input  type="text" name="address" id="address"maxlength="50" size="30">
							<br>
			</div>
		</div>
				Type your Complaint here:<br>
				<textarea  name="msg" id="msg" maxlength="1000" cols="100" rows="6"></textarea><br><br>
				<input type="submit" value="Submit" >  
		
	</form>
</div>
</div>	
	</body>
	</head>