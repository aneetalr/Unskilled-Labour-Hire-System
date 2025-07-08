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
<h2 align="center">Service Details</h2>
<br>
<table width="1200" height="200" border="1.5" align="center" class="customers">
	<tr><th>Service Name</th><th>No Of Days</th><th>From Date </th><th>To Date</th><th>Address</th><th>Status</th>
	
	<?php
	session_start();
	$ci=$_SESSION["cid"];
	$qw="select * from customerbookings where cid='$ci'";
	$re=mysqli_query($conn,$qw);
	// echo $qw;
	while($data=mysqli_fetch_assoc($re))
	{
		$sid=$data["cid"];
		$sn=$data["service"];
		$ad=$data["nod"];
		$dis=$data["fromdate"];
		$gen=$data["todate"];
		
		$em=$data["place"];
		$ph=$data["bdate"];
		$p=$data["status"];
		if($p=='forwarded')
		{
		echo "<tr><div><td>$sn</td><td>$ad</td><td>$dis</td><td>$gen</td><td>$em</td><td>Pending</td></tr>";
		}
		elseif($p=='not approved')
		{
		echo "<tr><div><td>$sn</td><td>$ad</td><td>$dis</td><td>$gen</td><td>$em</td><td>Not Approved</td></tr>";
		}
		

	}
	?>
</table>
<br>
<br>
</form>
<?php
	include("footer.html");
	
	?>
</body>
</html>