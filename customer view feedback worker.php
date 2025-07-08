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
<h2 align="center"><b>WORKER FEEDBACK</b></h2>
<br>
<table width="1200" height="150" border="1.5" align="center" class="customers">
	<tr><th> Customer Name</th><th>Phone Number</th><th>Email</th>
   <th>Feeback</th></tr>
	<?php
    $supid=$_REQUEST['id'];
	$qw="select customer.*,feedbackworker.* from customer inner join feedbackworker on feedbackworker.cid=customer.cid where  feedbackworker.wid='$supid'";
	$re=mysqli_query($conn,$qw);
	// echo $qw;
	while($data=mysqli_fetch_assoc($re))
	{
		
	// $sid=$data["sid"];
		$sn=$data["uname"];
		$ad=$data["phone"];
		$dis=$data["email"];
		 $gen=$data["feedbackdesc"];
		// $dob=$data["phone"];
		// $em=$data["email"];
		// $img=$data["image"];
		// $qu=$data["qualification"];
		// // $sp=$data["specialization"];
		// $exp=$data["experience"];
		// $cer=$data['certificate'];
		// $sta=$data["status"];
		echo "<tr><div><td>$sn</td><td>$ad</td><td>$dis</td><td>$gen</td></div>

        </tr>";
		
	}
	?>
</table>
<br>

<br>
<br>
<?php
if(isset($_REQUEST["sub"]))
{
   
echo "<script type = \"text/javascript\">

window.location = (\"customer view accepted work status.php\")
</script>";
		
}
?>
</form>
<?php
	include("Common Page Footer.php");
	
	?>

</body>
</html>