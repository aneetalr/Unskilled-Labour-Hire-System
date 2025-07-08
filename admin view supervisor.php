<!doctype html>
<html>
<head>
<?php
	include("headadmin.html");
	include("connect.php");
	?>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form>
<style>

.customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 80%;
}

.customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

.customers tr:nth-child(even){background-color: #f2f2f2;}

.customers tr:hover {background-color: #ddd;}

.customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #54B6F4;
  color: white;
}


</style>
<br>
<h2 align="center"><b>SUPERVISOR DETAILS</b></h2>
<br>
<table width="1200" height="150" border="1.5" align="center" class="customers">
	<tr><th>Name</th><th>Address</th><th>District</th><th>ID Number</th><th>Phone Number</th><th>Email</th><th>Qualification</th><th>Experience</th><th>Image</th><th>Certificate</th><th>Approve</th><th>Reject</th></tr>
	<?php
	$qw="select * from supervisor where status='0'";
	$re=mysqli_query($conn,$qw);
	while($data=mysqli_fetch_assoc($re))
	{
		
	$sid=$data["sid"];
		$sn=$data["uname"];
		$ad=$data["addr"];
		$dis=$data["district"];
		$gen=$data["idno"];
		$dob=$data["phone"];
		$em=$data["email"];
		$img=$data["image"];
		$qu=$data["qualification"];
		// $sp=$data["specialization"];
		$exp=$data["experience"];
		$cer=$data['certificate'];
		$unam=$data['username'];
		$sta=$data["status"];
		// echo $unam;
		echo "<tr><div><td>$sn</td><td>$ad</td><td>$dis</td><td>$gen</td><td>$dob</td><td>$em</td><td>$qu</td><td>$exp</td>
		<td><a><img src='images/$img' alt='' style='display: block; max-width: 70%; max-height:70%;'></a></td>
		<td><a href='images/$cer'>View Certificate</a></td>
		<td><div><a href='admin accept supervisor.php?id=$sid & unm=$unam'>Accept</a></td></div>
		<td><div><a href='admin reject supervisor.php?id=$sid & unm=$unam'>Reject</a></td></div></div></tr>";
		
	}
	?>
</table>
<br>
<br>
</form>
<?php
	include("Common Page Footer.php");
	
	?>

</body>
</html>