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
<h1 align="center">Supervisor Registration</h1>
<br>
<br>
<form method="post"  enctype="multipart/form-data">
	<table align="center" height="450" width="500" >
		<tr>
			<td>Name</td><td><input type="text" name="name1" required pattern="[A-Za-z-\s]+" title="enter characters only"/></td>
		</tr>
		<tr>
			<td>Address</td><td><input type="text" name="addr" required pattern="[A-Za-z-\s.,/():-;0-9]+" title="enter characters,digits and symbols only"/></td>
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
			<td>Email</td><td><input type="email" name="email" required/></td>
		</tr>
		<tr>
			<td>Phone No</td><td><input type="text" name="phno" required pattern="[0-9]{10}" title="enter 10 digits only"/></td>
		</tr>
		<tr>
			<td>Qualification</td><td><select name="quali"> 
						<option value="plus one">SSLC</option>
                        <option value="plus two">Plus two</option>
                        <option value="above">Above</option>
                    </select>
			</td>
		</tr>
		<tr>
			<td>Experience</td><td><input type="text" name="exp" required pattern="[0-9]{1,2}" title="enter 2 digits only" placeholder="number of years"/></td>
		</tr>
		<tr>
			<td>Aadhaar Number</td>
			<td><input type="text" name="regno" required pattern="[0-9]{12}" title="enter 12 digits only"/></td>
		</tr>
		
		<tr>
			<td>Photo</td>
			<td><input type="file" name="i"></td>
		</tr>
		<tr><td>Certificate</td>
			<td><input type="file" name="c"></td>
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
//	$gen=$_REQUEST["r1"];
//	$dob=$_REQUEST["date1"];
	$email=$_REQUEST["email"];
	$phno=$_REQUEST["phno"];
	$qua=$_REQUEST["quali"];
	$exp=$_REQUEST["exp"];
	$dep=$_REQUEST["regno"];
	// $special=$_REQUEST["special"];
	$un=$_REQUEST["un"];
	$pwd=$_REQUEST["pwd"];
	$b=$_FILES['i'];
	$file_name=$b['name'];
	$file_type=$b['type'];
	$file_size=$b['size'];
	$file_path=$b['tmp_name'];
	$b1=$_FILES['c'];
	$file_name1=$b1['name'];
	$file_type1=$b1['type'];
	$file_size1=$b1['size'];
	$file_path1=$b1['tmp_name'];
	$da=date('Y-m-d');
	$tr="select count(*) as cnt from login where uname='$un'";
	$fd=mysqli_query($conn,$tr);
	$da=mysqli_fetch_array($fd);
	$cn=$da['cnt'];
	if($cn==0)
	{
	// echo $file_name.$file_name1;
	if(move_uploaded_file($file_path,'images/'.$file_name))
	{


	}
	if(move_uploaded_file($file_path1,'images/'.$file_name1))
	{
	}
	
	$que="insert into supervisor(uname,addr,district,idno,phone,email,image,qualification,experience,username,password,status,certificate) values('$na','$addr','$dis','$dep','$phno','$email','$file_name','$qua','$exp','$un','$pwd','0','$file_name1')";
	$qq="insert into supervisor(uname,addr,district,idno,phone,email,image,qualification,experience,username,password,status,certificate) values('$na','$addr','$dis','$dep','$phno','$email','$file_name','$qua','$exp','$un','$pwd','0','$file_name1')";
	
	
	$res=mysqli_query($conn,$qq);
	// echo $qq;
	$we="insert into login(uname,pass,utype,status) values('$un','$pwd','supervisor','0')";
	$sa=mysqli_query($conn,$we);
//	echo $we;
	echo "<script>alert('Successfully Registered')</script>";
	}

	else if($cn>0)
	{
		echo "<script>window.alert('Username already selected... Try another username')</script>";
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