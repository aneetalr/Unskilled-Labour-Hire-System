<!doctype html>
<html>
<head>
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
<?php
	include("headadmin.html");
	include("connect.php");
	?>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form>

<br>
<h2 align="center">Customer Details</h2>
<br>
<table width="1200" height="200" border="1.5" align="center" class="customers">
	<tr><th>Customer Name</th><th>Address</th><th>District</th><th>Gender</th><th>Email</th><th>Ph No</th></tr>
	<?php
	$qw="select * from customer where status='1'";
	$re=mysqli_query($conn,$qw);
	while($data=mysqli_fetch_assoc($re))
	{
		$sid=$data["cid"];
		$sn=$data["uname"];
		$ad=$data["addr"];
		$dis=$data["district"];
		$gen=$data["gender"];
		
		$em=$data["email"];
		$ph=$data["phone"];
		
		echo "<tr><div><td>$sn</td><td>$ad</td><td>$dis</td><td>$gen</td><td>$em</td><td>$ph</td></tr>";
		
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