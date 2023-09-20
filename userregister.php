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
$mob=$_POST['mob'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$pw=$_POST['pw'];
$cpw=$_POST['cpw'];
$sql = "INSERT INTO passengers (p_name,p_contact, p_gender, email, password) VALUES ('$name', '$mob', '$gender', '$email', '$pw');";
	if(mysqli_query($conn, $sql))
{  
	$message = "You have been successfully registered";
    header("location: userhome.php");
}
else
{  
	$message = "Could not insert record"; 
}
	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
<HTML>
<HEAD>
<TITLE>Register on Indian Railways</TITLE>
<LINK REL="STYLESHEET" HREF="STYLE.CSS">
<style type="text/css">
*	{
	color: #222;
}
#register_form	{
	background-color: rgba(0,0,0,0.2);
	width: 40%;
	margin: auto;
	border-radius: 25px;
	border: grey; 
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
	background-size: cover;
}
</style>
<SCRIPT src="validate.js"></SCRIPT>
</HEAD>
<BODY  background="img/wallpaper1.jpg" link="grey" alink="white" vlink="white" width="1024" height="768">
<?php 
 ?>
<div id="register_form" align="center" height="200" width="200">
<FORM name="register" method="post" action="userregister.php" onsubmit="return validate()">
<TABLE border="0">
<CAPTION><FONT size="6" color="WHITE"><br/>Enter your details:</FONT></CAPTION>
<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
<TR class="left">
<TD><FONT size="5" color="WHITE">First name:</FONT></TD>
<TD><INPUT name="name" type="TEXT" placeholder="Enter your name" size="30" maxlength="30" align="center" id="name"></TD>
</TR><tr></tr><tr></tr>
<TR class="left">
<TD><FONT size="5" color="WHITE">Mobile Number:</FONT></TD>
<TD><INPUT type="TEXT" name="mob" size="30" maxlength="10" placeholder="Enter your mobile number" id="mob"></TD>
</TR><tr></tr><tr></tr>
<TR class="left">
<TR class="left">
<TD><FONT size="5" color="WHITE">Gender:</FONT></TD>
<TD>&nbsp;&nbsp;
<INPUT type="radio" name="gender" value="Male" align="center" id="gender">Male
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="gender" value="Female" align="center" id="gender">Female
</TD>
</TR><tr></tr><tr></tr>
<TR class="left">
<TD><FONT size="5" color="WHITE">E-Mail ID:</FONT></TD>
<TD><INPUT name="email" type="TEXT" id="email" placeholder="Enter your E-Mail ID" size="30" maxlength="30"></TD>
</TR><tr></tr><tr></tr>
<TR class="left">
<TD><FONT size="5" color="WHITE">Password:</FONT></TD>
<TD><INPUT type="PASSWORD" name="pw" size="30"  id="pw"></TD>
</TR><tr></tr><tr></tr>
<TR class="left">
<TD><FONT size="5" color="WHITE">Confirm Password:</FONT></TD>
<TD><INPUT type="PASSWORD" name="cpw" size="30" id="cpw"></TD>
</TR><tr></tr><tr></tr><tr></tr><tr></tr>
<tr></tr><tr></tr><tr></tr>
</TABLE>
<P><INPUT TYPE="Submit" value="Submit" name="submit" id="submit" class="button" onclick="if(!this.form.tc.checked){alert('You must agree to the terms first.');return false}">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<INPUT TYPE="Reset" value="Reset" id="reset" class="button"></P></FORM><br/>
<HR width="450" style="border-color: blue;display: block;" noshade>
<FORM action="userregister.php">
<P align="CENTER" id="logintext"><FONT size="6" color="white" face="Arial">
Already have an account with us?<BR/></FONT></FONT><br>
</P>
<a herf="userlogin.php">click here?</a></div
</FORM>
</BODY>
</HTML>