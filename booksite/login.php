<?php

    error_reporting(0);
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    error_reporting(E_ALL);
    ini_set("error_reporting", E_ALL);
    error_reporting(E_ALL & ~E_NOTICE);

session_start();
if($_SESSION['uid'])
{
    header('location:profile.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style type="text/css">
	body{
		background-image: url('wall.jpg');
		background-size: cover; 
	}
</style>
<body>

<?php include('phpaddition/navbar.php'); ?>
<!-------------------------------login--------------------------------------->

<style type="text/css">
	.formlogin
	{
	height: 100vh;
    position: fixed;
    background: #504242b0;
    width: 100vw;
    z-index: 3;
	}
	.formlogin form
	{
		margin-top: 34vh;
		border: 2px solid;
    width: 60vw;
    background-color: #bba58545;
	}
	.formlogin form input
	{
    width: 55vw;
    height: 7vh;
    font-size: 30px;
	}
	.formlogin form p
	{
		font-size: 30px;
		color: black;
	}
	.formlogin form p:hover
	{
		color: red;
	}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<div class="formlogin">
	<center>
		<form action="loginmember.php" method="post">
			<br>
		<input type="text" required maxlength="10" placeholder="Mobile Number" name="Mnum"><br><br>
		<input type="password" required placeholder="password" name="pass"><br><br>
		<input type="submit" value="Login" name="">
		<input type="hidden" value="login" name="check">

		<p id="logg">Create new account</p>
	    </form>
	</center>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#logg').click(function(){
			$('.formlogin').hide();
		});
	});
</script>
<!------------------------------------------------------------------------------------------->
<style type="text/css">
	#reg form input{
		    height: 5vh;
    width: 50vw;
	}
	#reg form input:focus-within
	{
		box-shadow: 1px 1px 1px 2px orange;
	}
	#reg form label{
	    font-size: 20px;
	}
	#reg form 
	{
	border: 2px solid black;
    border-radius: 30px;
    width: 54vw;
    box-shadow: 4px 3px 5px 1px black;
    height: 60vh;
    margin-top: 30px;
    background: #f3ca937a;
	}
</style>
<div id="reg">
	<center>
  <form action="register.php" method="post">
	<h2>Create Account</h3><br>
	<label>Your name</label><br>
	<input type="text" required name="usrname" max="10"><br><br>
	<label>Mobile Number</label><br>
	<input type="text" required name="monum"><br><br>
	<label>Email</label><br>
	<input type="Email" name="email"><br><br>
	<label>Password</label><br>
	<input type="password" required name="passcode"><br><br>
	<input type="submit" name=""><br><br>
	<input type="hidden" value="regis" name="check">
  </form>
    <br><br>
	</center>
</div>





<?php include('phpaddition/footer.php'); ?>


</body>
</html>