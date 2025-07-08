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
<h1 align="center"> Worker Registration</h1>
<br>
<br>
<form>
	<table align="center" height="450" width="700" >
		<tr>
			<td>Name</td><td><input type="text" name="name1" required pattern="[A-Za-z-\s]+" title="enter characters only"/></td>
		</tr>
		<tr>
			<td>Address<td><input type="text" name="addr"  required pattern="[A-Za-z-\s.,/():-;0-9]+" title="enter characters only"/></td>
		</tr>
		<tr>
			<td>District</td><td><select name="dis">
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
			
			</td>
		</tr>
		<tr>
			<td>Gender</td><td><input type="radio" name="r1" value="male" />Male<input type="radio" name="r1" value="female" tequired/> Female</td>
		</tr>
		<tr>
			<td>Aadhar Number</td><td><input type="text" name="idno" pattern="[0-9]{12}" title="enter 12 digits  only" required/></td>
		</tr>
		<tr>
			<td>Email</td><td><input type="email" name="email" required/></td>
		</tr>
		<tr>
			<td>Phone No</td><td><input type="text" name="phno" required pattern="[0-9]{10}" title="enter 10 digits only"/></td>
		</tr>
		
		<tr>
			<td>Experience</td><td><input type="text" name="exp" required pattern="[0-9]{1,2}" title="enter 2 digits only" placeholder="number of years"/></td>
		</tr>
		
		<tr>
			<td>Username</td><td><input type="text" name="un" /></td>
		</tr>
		<tr>
			<td>Password</td><td><input type="password" name="pwd" pattern="[A-Za-z$#@0-9]{6,}" title="enter atleast 6 characters"/></td>
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
	$dob=$_REQUEST["idno"];
	$email=$_REQUEST["email"];
	$phno=$_REQUEST["phno"];
	
	$exp=$_REQUEST["exp"];
	
	$un=$_REQUEST["un"];
	$pwd=$_REQUEST["pwd"];
	$tr="select count(*) as cnt from login where uname='$un'";
	$fd=mysqli_query($conn,$tr);
	$da=mysqli_fetch_array($fd);
	$cn=$da['cnt'];
	if($cn==0)
	{
	$que="insert into workers(uname,addr,district,gender,idcard,phone,email,username,password,experience,status) values('$na','$addr','$dis','$gen','$dob','$phno','$email','$un','$pwd','$exp','0')";
	$res=mysqli_query($conn,$que);
	//echo $que;
	
	$we="insert into login(uname,pass,utype,status) values('$un','$pwd','worker','0')";
	$sa=mysqli_query($conn,$we);
	echo "<script>alert('Successfully Registered')</script>";
	}
	else if($cn>0)
	{
		echo "<script>alert('Username already selected... Try another username')</script>";
	}
	else
	{
		echo "<script>alert('Registration Failed.. Try Again')</script>";
	}	
}
?>
<?php
include("footer.html");
?>