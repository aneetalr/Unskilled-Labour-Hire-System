
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
<form method="post">
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
<tr><th>Worker Name</th><th>Address</th><th>District</th><th>Gender</th><th>ID CARD</th><th>Phone Number</th>
	<th>Email</th><th>Experience</th> <th>Feedback worker</th><th>Add Feedback</th></tr>
</tr>
	<?php
	session_start();
    $ci=$_SESSION["cid"];
    $bid=$_REQUEST["id"];
    $status=$_REQUEST["st"];
	$qw="select workers.wid as workid,workers.*,customerbookings.* from  workers inner join customerbookings on workers.wid=customerbookings.wid or workers.wid=customerbookings.wid1 or workers.wid=customerbookings.wid2 or workers.wid=customerbookings.wid3 where customerbookings.bookid='$bid'";
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
		$wid=$data['wid'];
            $wid1=$data['wid1'];
            $wid2=$data['wid2'];
            $wid3=$data['wid3'];
            // echo $status."sttttttttttttt";
		if($status=='accepted' or $status=='work pending')
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
                // echo $status."pend";
                    $wn=$data['uname'];
                    $wi=$data['idcard'];
                    $ph=$data['phone'];
                    $wid=$data['workid'];
                    echo "<tr><div><td>$sn</td><td>$ad</td><td>$dis</td><td>$gen</td><td>$id</td><td>$dob</td><td>$em</td>
                    <td>$doc</td></div>
                    <td><div><a href='customer view feedback worker.php?id=$wid'>View Feedback</a></td></div>
                
            
            </tr>";

                
            }
            elseif($status=='completed')
            {
              $sn=$data["uname"];
              $ad=$data["addr"];
              $dis=$data["district"];
              $gen=$data["gender"];
              $id=$data["idcard"];
              
              $dob=$data["phone"];
              $em=$data["email"];
              $doc=$data["experience"];
              $un=$data["username"];
                    $wn=$data['uname'];
                    $wi=$data['idcard'];
                    $ph=$data['phone'];
                    $wid=$data['workid'];
                    echo "<tr><div><td>$sn</td><td>$ad</td><td>$dis</td><td>$gen</td><td>$id</td><td>$dob</td><td>$em</td>
                    <td>$doc</td></div>
                    <td><div><a href='customer view feedback worker.php?id=$wid'>View Feedback</a></td></div>
                <td><div><a href='customer add feedback worker.php?id=$wid'>Add Feedback For Worker</a></td></div>
                  
             </tr></div>";

                
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

















