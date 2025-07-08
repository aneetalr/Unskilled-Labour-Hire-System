<!doctype html>
<html>
<head>
<?php
	include("headsupervisor.html");
	include("connect.php");
	?>
<meta charset="utf-8">
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
<h2 align="center"><b>WORKER DETAILS</b></h2>
<br>
<table width="1200" height="150" align="center" class="customers">
	<tr><th>Worker Name</th><th>Address</th><th>District</th><th>Gender</th><th>ID CARD</th><th>Phone Number</th>
    <th>Email</th><th>Experience</th></tr>
	<?php
	$qw="select * from workers where status='1'";
	$re=mysqli_query($conn,$qw);
	while($data=mysqli_fetch_assoc($re))
	{
		$sid=$data["wid"];
		$sn=$data["uname"];
		$ad=$data["addr"];
		$dis=$data["district"];
		$gen=$data["gender"];
		$id=$data["idcard"];
		
		$dob=$data["phone"];
		$em=$data["email"];
		$doc=$data["experience"];
		$un=$data["username"];
		
		
        echo "<tr><div><td>$sn</td><td>$ad</td><td>$dis</td><td>$gen</td><td>$id</td><td>$dob</td><td>$em</td>
        <td>$doc</td></tr>";
		
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