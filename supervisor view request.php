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
	include("headsupervisor.html");
	include("connect.php");
	?>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form>

<br>
<h2 align="center">CUSTOMER REQUEST</h2>
<br>
<table width="1200" height="200" border="1.5" align="center" class="customers">
	<tr><th>Customer Name</th><th>Address</th><th>District</th><th>Ph No</th><th>Email</th><th>Service</th>
    <th>From Date</th><th>To Date</th><th>Address</th><th>Status</th><th>Accept</th>
    </tr>
	<?php
	$qw="select customer.*,customerbookings.* from  customer inner join customerbookings on customer.cid=customerbookings.cid where customerbookings.status='forwarded'";
	$re=mysqli_query($conn,$qw);
	while($data=mysqli_fetch_assoc($re))
	{
        $sid=$data["bookid"];
		$cid=$data["cid"];
		$sn=$data["uname"];
		$ad=$data["addr"];
		$dis=$data["district"];
        $pl=$data["place"];
		$em=$data["email"];
        $ph=$data["phone"];
        $ser=$data["service"];
        $fdate=$data["fromdate"];
        $tdate=$data["todate"];
        $st=$data["status"];
		
        echo "<tr><div><td>$sn</td><td>$ad</td><td>$dis</td><td>$ph</td><td>$em</td><td>$ser</td>
        <td>$fdate</td><td>$tdate</td>
        <td>$pl</td><td>$st</td><td><div><a href='supervisor accept request.php?id=$sid'>Accept</a></td></div>
       
        </tr>";
		
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