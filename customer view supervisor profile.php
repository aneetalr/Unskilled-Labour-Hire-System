<!doctype html>
<html>
<head>
<?php
	include("headcustomer.html");
	include("connect.php");
	?>
<meta charset="utf-8">
<title>ULHS</title>
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
<h2 align="center"><b>SUPERVISOR PROFILE</b></h2>
<br>
<table width="1200" height="150" border="1.5" align="center" class="customers">
	<tr><th>Name</th><th>Address</th><th>District</th><th>ID Number</th><th>Phone Number</th><th>Email</th>
    <th>Qualification</th><th>Experience</th><th>Photo</th><th>Certificate</th><th>Feeback</th></tr>
	<?php
    $supid=$_REQUEST['id'];
	$qw="select * from supervisor where status='1' and sid='$supid'";
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
		

		$sta=$data["status"];
		echo "<tr><div><td>$sn</td><td>$ad</td><td>$dis</td><td>$gen</td><td>$dob</td><td>$em</td><td>$qu</td><td>$exp</td>
		<td><a><img src='images/$img' alt='' style='display: block; max-width: 70%; max-height:70%;'></a></td>
		<td><a href='images/$cer'>View Certificate</a></td>
        <td><div><a href='customer view feedback.php?id=$sid'>View Feedback</a></td></div>

        </tr>";
		
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