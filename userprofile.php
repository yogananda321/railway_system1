<?php
session_start();
include("head.php");
$conn = mysqli_connect("localhost:3306","root","root","railwaysystem");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
if (isset($_POST['submit']))
{
$name=$_POST['name'];
$name1=$_post['$name1'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$sql = "UPDATE passengers SET p_name='$name1',p_contact='$mobile', email='$email') WHERE p_name=$name";
if($conn->query($sql)=== TRUE)
{  
	$message = "You have been successfully updated";
    header("location: userhome.php");
}
else
{  
	$message = "Could not insert record"; 
}
	echo "<script type='text/javascript'>alert('$message');</script>";
}

?>
<?php 
session_start();
include("head.php"); ?>
<HTML>
<HEAD>
<TITLE>Register on Indian Railways</TITLE>
<LINK REL="STYLESHEET" HREF="STYLE.CSS">
<style type="text/css">
*	{
	color: #222;
}
#register_form	{
	background-color: white;
	width: 40%;
	margin: auto;
	border-radius: 25px;
	border: 2px solid blue; 
	margin-top: 25px;
}
#nav	{
	color: rgba(0,0,0,0.5);
}
#logintext	{
	margin-top: 10px;
}
#login	{
	margin-top: 10px;
	margin-bottom: 20px;
}
body{
    background-image: url(https://c0.wallpaperflare.com/preview/94/952/914/india-pollachi-background-nature.jpg);
}
</style>
</HEAD>
</body>
<div id="loginarea">
	<form id="login" action="userprofile.php" onsubmit="return validate()" method="post" name="login">
	<div id="logintext">User profile update!</div><br/><br/>
	<table>
		<tr><td><div class="data">Enter name :</div></td><td><input type="text" id="name" size="30" maxlength="30" name="name"/></td></tr>
		<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
		<tr><td><div class="data">Enter Phno:</div></td><td><input type="mob" id="mob" size="10" maxlength="30" name="phone"/></td></tr>
		<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
        <tr><td><div class="data">Enter email:</div></td><td><input type="text" id="email" size="50" maxlength="30" name="email"/></td></tr>
		<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
	</table>
	<INPUT TYPE="Submit" value="Submit" name="submit" id="submit" class="button"><br>
    <center>
    <a href=userregister.php>Signup!</a>
    </center>
	</form></div>
</body>
</HTML>

