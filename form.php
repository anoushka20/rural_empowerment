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

if(isset($_POST['first_name'])&&isset($_POST['last_name'])&&isset($_POST['email'])&&isset($_POST['msg'])&&isset($_POST['phone']))
{
	 $first_name=$_POST['first_name'];
	 $last_name=$_POST['last_name'];
	 $email=$_POST['email'];
	 $msg=$_POST['msg'];
	 $phone=$_POST['phone'];

	 if(!empty($first_name)&&!empty($last_name)&&!empty($email)&&!empty($msg)&&!empty($phone))
	{
	 $query="insert into `contact` values ('','$first_name','$last_name','$email','$phone','$msg')";	
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

<form action="form.php" method="POST">
		<div class="row">
			<div class="column">
				<label for="first_name">First Name:</label>
				<input  type="text" name="first_name" id="first_name" maxlength="50" size="30">
				<label for="last_name">Last Name:</label>
				<input  type="text" name="last_name" id="last_name" maxlength="50" size="30">
				<label for="email">Email Address:</label>
				<input  type="text" name="email" id="email"maxlength="80" size="30">
			</div>
			
			<div class="column">
				<label for="telephone">Telephone Number:</label>
				<input  type="text" name="phone" id="phone" maxlength="30" size="30">
				<label for="comments">Message:</label><br>
				<textarea  name="msg" id="msg" maxlength="1000" cols="100" rows="6"></textarea><br>
				<input type="submit" value="Submit" >  
				
			</div>
		</div>
	</form>
</div>
</div>	
	</body>
	</head>