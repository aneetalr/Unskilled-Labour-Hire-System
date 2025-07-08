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
	include("headworker.html");
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
    <th>From Date</th><th>To Date</th><th>Full Address</th><th>Supervisor Name</th><th>Phone Number</th><th>Email</th><th>Accept</th>
    </tr>
	<?php
     session_start();
     $un = $_SESSION["wid"];
	$qw="select customer.*,customerbookings.* from  customer inner join customerbookings on customer.cid=customerbookings.cid where customerbookings.status='accepted'";
	$re=mysqli_query($conn,$qw);
	while($data=mysqli_fetch_assoc($re))
	{
       
        $bookid=$data["bookid"];
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
        $sid=$data['sid'];
        $qw1="select supervisor.*,customerbookings.* from  supervisor inner join customerbookings on supervisor.sid=customerbookings.sid where customerbookings.sid='$sid'";
    $re1=mysqli_query($conn,$qw1);
    // echo $qw1;
	$data1=mysqli_fetch_assoc($re1);
        $sna=$data1["uname"];
        $sph=$data1["phone"];
        $sem=$data1["email"];
        $supid=$data1["sid"];
        $wid=$data['wid'];
        $wid1=$data['wid1'];
        $wid2=$data['wid2'];
        $wid3=$data['wid3'];
        
   
        if($wid==0 or $wid1==0 or $wid2==0 or $wid3==0)
        {
        if($wid!=$un and $wid1!=$un and $wid2!=$un and $wid3!=$un )
    
        {
            if($supid>0)
            {
        echo "<tr><div><td>$sn</td><td>$ad</td><td>$dis</td><td>$ph</td><td>$em</td><td>$ser</td>
        <td>$fdate</td><td>$tdate</td>
        <td>$pl</td>
        <td>$sna</td><td>$sph</td><td>$sem</td>
        <td><div><a href='worker accept request.php?id=$bookid'>Accept</a></td></div>
       
        </tr>";
        }
    
   
else{

    echo "<tr><div><td>$sn</td><td>$ad</td><td>$dis</td><td>$ph</td><td>$em</td><td>$ser</td>
    <td>$fdate</td><td>$tdate</td>
    <td>$pl</td>
    <td>$sna</td><td>$sph</td><td>$sem</td>
</tr>";
}
}
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