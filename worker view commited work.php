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
    <th>From Date</th><th>To Date</th><th>Full Address</th><th>Supervisor Name</th><th>Phone Number</th><th>Email</th>
    <th>Status</th>
    </tr>
	<?php
    session_start();
    $un = $_SESSION["wid"];
	$qw="select customer.*,customerbookings.*,customerbookings.status as bstatus from  customer inner join customerbookings on customer.cid=customerbookings.cid where customerbookings.status='accepted' or customerbookings.status='work pending' or customerbookings.status='completed'";
	$re=mysqli_query($conn,$qw);
	while($data=mysqli_fetch_assoc($re))
	{
        $sid=$data['sid'];
        $qw1="select supervisor.*,customerbookings.* from  supervisor inner join customerbookings on supervisor.sid=customerbookings.sid where customerbookings.sid='$sid'";
    $re1=mysqli_query($conn,$qw1);
    // echo $qw1;
	$data1=mysqli_fetch_assoc($re1);
        $sna=$data1["uname"];
        $sph=$data1["phone"];
        $sem=$data1["email"];
        $wid=$data['wid'];
        $wid1=$data['wid1'];
        $wid2=$data['wid2'];
        $wid3=$data['wid3'];
        
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
      
        $bsta=$data["bstatus"];
        if($wid==$un or $wid1==$un or $wid2==$un or $wid3==$un and $bsta=='accepted')
        {
       
        echo "<tr><div><td>$sn</td><td>$ad</td><td>$dis</td><td>$ph</td><td>$em</td><td>$ser</td>
        <td>$fdate</td><td>$tdate</td>
        <td>$pl</td>
        <td>$sna</td><td>$sph</td><td>$sem</td><td>$bsta</td>
        </div>
       
        </tr>";
        }
        elseif($wid==$un or $wid1==$un or $wid2==$un or $wid3==$un and $bsta=='work pending')
        {
       
        echo "<tr><div><td>$sn</td><td>$ad</td><td>$dis</td><td>$ph</td><td>$em</td><td>$ser</td>
        <td>$fdate</td><td>$tdate</td>
        <td>$pl</td>
        <td>$sna</td><td>$sph</td><td>$sem</td><td>$bsta</td>
        </div>
       
        </tr>";
        }
        elseif($wid==$un or $wid1==$un or $wid2==$un or $wid3==$un and $bsta=='completed')
        {
       
        echo "<tr><div><td>$sn</td><td>$ad</td><td>$dis</td><td>$ph</td><td>$em</td><td>$ser</td>
        <td>$fdate</td><td>$tdate</td>
        <td>$pl</td>
        <td>$sna</td><td>$sph</td><td>$sem</td><td>$bsta</td>
        </div>
       
        </tr>";
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