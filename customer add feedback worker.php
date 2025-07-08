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
<h1 align="center">Add Your Feedback</h1>
<br>
<br>
<form method="post"  enctype="multipart/form-data">
	<table align="center" height="200" width="500" >
		<tr>
			<td>Feedback</td><td><input type="text" name="name1" required pattern="[A-Za-z-\s]+" title="enter characters only"/></td>
		</tr>
		
		
		<br>
		
		<tr>
			<td><input type="submit" name="sub" value="Submit"/></td>
		</tr>
	
	</table>
	
</form>
<br>
<br>
<br>
</body>
</html>
<?php
if(isset($_REQUEST["sub"]))
{
    $sid=$_REQUEST["id"];
	$na=$_REQUEST["name1"];

	
	$da=date('Y-m-d');
	session_start();
	$cid=$_SESSION["cid"];
	$que="insert into feedbackworker(cid,wid,feedbackdesc) values('$cid','$sid','$na')";
	
	$res=mysqli_query($conn,$que);
	//echo $que;
//	echo $qq;
//	$sa=mysqli_query($conn,$we);
//	echo $we;
echo "<script type = \"text/javascript\">
alert(\"Successfully Added Feedback\");
window.location = (\"customer view accepted work status.php\")
</script>";
		
}
?>
<?php
include("footer.html");
?>