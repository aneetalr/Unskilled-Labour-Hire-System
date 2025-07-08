<!doctype html>
<html>
<head>
<?php
	include("headlogreg.html");
	include("connect.php");
	?>
<meta charset="utf-8">
<title>ULHS</title>
</head>

<body>
<h1 align="center"> Customer Registration</h1>
<br>
<br>
<form method="POST">
	<table align="center" height="450" width="700" >
		<tr>
			<td>Name</td><td><input type="text" name="name1" pattern="[A-Za-z\s]+" title="enter characters only" required /></td>
		</tr>
		<tr>
			<td>Address<td><input type="text" name="addr" required pattern="[A-Za-z-\s.,/():-;0-9]+" title="enter characters only"/></td>
		</tr>
		<tr>
			<td>District</td><td> <select name="dis">
			<option value="alapuzha">Alappuzha</option>
			<option value="ernakulam">Ernakulam</option>
			<option value="idukki">Idukki</option>
			<option value="kannur">Kannur</option>
			<option value="kasargod">Kasargod</option>
			<option value="kollam">Kollam</option>
			<option value="kottayam">Kottayam</option>
			<option value="kozhikode">Kozhikode</option>
			<option value="malapuram">Malapuram</option>
			<option value="palakkad">Palakkad</option>
			<option value="pathanamthitta">Pathanamthitta</option>
			<option value="thiruvananthapuram">Thiruvananthapuram</option>
			<option value="thrissur">Thrissur</option>
			<option value="wayanad">Wayanad</option>

			
			</select></td>
		</tr>
		<tr>
			<td>Gender</td><td><input type="radio" name="r1" value="male" />Male<input type="radio" name="r1" value="female"/> Female</td>
		</tr>
		
		<tr>
			<td>Email</td><td><input type="email" name="email" required/></td>
		</tr>
		<tr>
			<td>Phone No</td><td><input type="text" name="phno" required pattern="[0-9]{10}" title="enter 10 digits only"/></td>
		</tr>
		
		
		<tr>
			<td>Username</td><td><input type="text" name="un" required/></td>
		</tr>
		<tr>
			<td>Password</td><td><input type="password" name="pwd" required pattern="[A-Za-z$#@0-9]{6,}" title="enter atleast 6 characters"/></td>
		</tr>
		<br>
		
		<tr>
			<td><input type="submit" name="sub" value="Submit"/></td>
		</tr>
	
	</table>
</form>
<br>
<br>
<br>
</body>
</html>
<?php
if(isset($_REQUEST["sub"]))
{
	$na=$_REQUEST["name1"];
	$addr=$_REQUEST["addr"];
	$dis=$_REQUEST["dis"];
	$gen=$_REQUEST["r1"];
	
	$email=$_REQUEST["email"];
	$phno=$_REQUEST["phno"];
	
	$un=$_REQUEST["un"];
	$pwd=$_REQUEST["pwd"];
	$que="insert into customer(uname,addr,district,gender,phone,email,username,password,status) values('$na','$addr','$dis','$gen','$phno','$email','$un','$pwd','1')";
	$res=mysqli_query($conn,$que);
	$we="insert into login(uname,pass,utype,status) values('$un','$pwd','customer','1')";
	$sa=mysqli_query($conn,$we);
	echo "<script>alert('Successfully Registered')</script>";
}
?>
<?php
include("footer.html");
?>