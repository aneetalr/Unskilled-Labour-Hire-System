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
	<tr><th>Service Name</th><th>No Of Days</th><th>From Date </th><th>To Date</th><th>Place</th><th>Booked Date</th><th>Status</th>
	<th>Supervisor Name</th><th>Address</th>
    <th>ID Number</th><th>Supervisor Profile</th><th>View Workers</th><th>Feedback supervisor</th>
	<?php
	session_start();
	$ci=$_SESSION["cid"];
	$qw="select supervisor.*,customerbookings.* from  supervisor inner join customerbookings on supervisor.sid=customerbookings.sid where customerbookings.sid>0 and customerbookings.cid='$ci'";
	$re=mysqli_query($conn,$qw);
	//  echo $qw;
	while($data=mysqli_fetch_assoc($re))
	{
        $sid=$data["cid"];
        $bid=$data['bookid'];
        $supid=$data['sid'];
		$sn=$data["service"];
		$ad=$data["nod"];
		$dis=$data["fromdate"];
		$gen=$data["todate"];
		
		$em=$data["place"];
		$ph=$data["bdate"];
		$p=$data["status"];
        // echo $p;
		if($p=='accepted')
		{
            
			// echo $qw1;
            $sun=$data['uname'];
            $superid=$data['sid'];
            $sad=$data['addr'];
            $sidno=$data['idno'];
            $wid=$data['wid'];
            $wid1=$data['wid1'];
            $wid2=$data['wid2'];
            $wid3=$data['wid3'];
            $st='accepted';
           if($supid>0)
           {
			echo "<tr><div><td>$sn</td><td>$ad</td><td>$dis</td><td>$gen</td><td>$em</td><td>$ph</td><td>$p</td>
            <td>$sun</td><td>$sad</td><td>$sidno</td>
            <td><div><a href='customer view supervisor profile.php?id=$superid'>View Profile</a></td></div>

            <td><div><a href='customer view service worker.php?id=$bid & st=$st'>View Worker</a></td></div>

            </tr>";
           }
           
           
        }
        if($p=='work pending')
		{
            
			// echo $qw1;
            $sun=$data['uname'];
            $superid=$data['sid'];
            $sad=$data['addr'];
            $sidno=$data['idno'];
            $wid=$data['wid'];
            $wid1=$data['wid1'];
            $wid2=$data['wid2'];
            $wid3=$data['wid3'];
            $st='work pending';
           if($supid>0)
           {
			echo "<tr><div><td>$sn</td><td>$ad</td><td>$dis</td><td>$gen</td><td>$em</td><td>$ph</td><td>$p</td>
            <td>$sun</td><td>$sad</td><td>$sidno</td>
            <td><div><a href='customer view supervisor profile.php?id=$superid'>View Profile</a></td></div>

            <td><div> <a href='customer view service worker.php?id=$bid & st=$st'>View Worker</a></td></div>

            </tr>";
           }
           
           
        }
        if($p=='completed')
		{
          
			// echo $qw1;
            $sun=$data['uname'];
            $superid=$data['sid'];
            $sad=$data['addr'];
            $sidno=$data['idno'];
            $wid=$data['wid'];
            $wid1=$data['wid1'];
            $wid2=$data['wid2'];
            $wid3=$data['wid3'];
            
           
			echo "<tr><div><td>$sn</td><td>$ad</td><td>$dis</td><td>$gen</td><td>$em</td><td>$ph</td><td>$p</td>
            <td>$sun</td><td>$sad</td><td>$sidno</td>
            <td><div><a href='customer view supervisor profile.php?id=$superid'>View Profile</a></td></div>

            <td><div><a href='customer view service worker.php?id=$bid & st=$p'>View Worker</a></td></div>
            <td><div><a href='customer add feedback.php?id=$superid'>Add Feedback for supervisor</a></td></div>

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