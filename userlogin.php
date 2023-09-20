<?php
session_start();
include("head.php");
if (isset($_POST['submit']))
{
	$conn = mysqli_connect("localhost:3306","root","root","railwaysystem");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
$name=$_POST['name'];
$pw=$_POST['pw'];
$sql = "SELECT * FROM passengers WHERE p_name = '$name' AND password = '$pw';";
$sql_result = mysqli_query ($conn, $sql) or die ('request "Could not execute SQL query" '.$sql);
		$user = mysqli_fetch_assoc($sql_result);
		if(!empty($user)){
			$_SESSION['user_info'] = $user['name'];
			$message='Logged in successfully';
            header("location: userhome.php");
		}
		else{
			$message = 'Wrong name or password.';
		}
	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<script type="text/javascript">
	function validate()	{
		var EmailId=document.getElementById("name");
		var pw=document.getElementById("pw");
   		if(pw.value.length< 8)
		{
			alert("Password consists of atleast 8 characters");
			pw.focus();
			return false;
		}
		return true;
	}
</script>
<style type="text/css">
	#loginarea{
		background-color: rgba(0,0,0,0.6);
		width: 30%;
		margin: auto;
		border-radius: 25px;
		border: 2px grey;
		margin-top: 100px;
		background-color: rgba(0,0,0,0.3);
	    box-shadow: inset -2px -2px rgba(0,0,0,0.5);
	    padding: 50px;
	    font-family:sans-serif;
		font-size: 20px;
		color: black;
	}
	html { 
		background: url(https://c0.wallpaperflare.com/preview/94/952/914/india-pollachi-background-nature.jpg) no-repeat center center fixed; 
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}
	#submit	{
		border-radius: 5px;
		background-color: rgba(0,0,0,0);
		padding: 7px 7px 7px 7px;
		box-shadow: inset -1px -1px rgba(0,0,0,0.5);
		font-family:"Comic Sans MS", cursive, sans-serif;
		font-size: 17px;
		margin:auto;
		margin-top: 20px;
  		display:block;
  		color: rgba(0,0,0,1.4);
	}
	#logintext	{
		text-align: center;
	}
	.data	{
		color: white;
	}
</style>
<body>
	<?php 
     ?>
	<div id="loginarea">
	<form id="login" action="userlogin.php" onsubmit="return validate()" method="post" name="login">
	<div id="logintext">User Login!</div><br/><br/>
	<table>
		<tr><td><div class="data">Enter name ID:</div></td><td><input type="text" id="name" size="30" maxlength="30" name="name"/></td></tr>
		<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
		<tr><td><div class="data">Enter Password:</div></td><td><input type="password" id="pw" size="30" maxlength="30" name="pw"/></td></tr>
		<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
	</table>
	<INPUT TYPE="Submit" value="Submit" name="submit" id="submit" class="button"><br>
    <center>
    <a href=userregister.php>Signup!</a>
    </center>
	</form></div>
</body>
</html>