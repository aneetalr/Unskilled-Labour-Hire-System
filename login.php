<!doctype html>
<html>
<head>
<?php
	include("headlogreg.html");
	include("connect.php");
	?>
<meta charset="utf-8">
<title>ULHS login</title>
</head>

<body>
<form id="form1" name="form1" method="post">
  <table width="400" height="200" align="center" border="1.5">
    <tbody>
      <tr>
        <th>&nbsp;&nbsp;&nbsp;UserName</th>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="textfield" id="textfield" align="middle" required></td>
      </tr>
      <tr>
        <th>&nbsp;&nbsp;&nbsp;Password</th>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="textfield2" id="textfield2" required></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" id="submit" value="Submit"></td>
      </tr>
      
    </tbody>
  </table>
  <br>
  <br>
</form>
<?php
if(isset($_REQUEST['submit']))
{
$a=$_REQUEST["textfield"];
$b=$_REQUEST["textfield2"];

$que="select utype from login where uname='$a' and pass='$b' and status='1'";
	$rs=mysqli_query($conn,$que);
	$ad=mysqli_fetch_assoc($rs);
	$type=$ad["utype"];
	if($type=='worker')
	{
		$ew="select * from workers where username='$a'  and status='1'";
		$ds=mysqli_query($conn,$ew);
		$vc=mysqli_fetch_assoc($ds);
		$dname=$vc["uname"];
		$did=$vc["wid"];
		session_start();
		$_SESSION["uname"]=$dname;
		$_SESSION["wid"]=$vc["wid"];
		header("Location:workerhome.php");
	}
	else if($type=='admin')
	{
		header("location:adminhome.php");
	}
	else if($type=='supervisor')
	{
		$ew="select * from supervisor where username='$a'  and status='1'";
		$ds=mysqli_query($conn,$ew);
		$vc=mysqli_fetch_assoc($ds);
		$dname=$vc["uname"];
		$did=$vc["sid"];
		session_start();
		$_SESSION["uname"]=$dname;
		$_SESSION["sid"]=$did;
		header("location:supervisorhome.php");
	}
	else if($type=='customer')
	{
		$ew="select * from customer where username='$a' and password='$b' and status='1'";
		$ds=mysqli_query($conn,$ew);
		$vc=mysqli_fetch_assoc($ds);
		$dname=$vc["uname"];
		$did=$vc["cid"];
		session_start();
		$_SESSION["uname"]=$dname;
		$_SESSION["cid"]=$did;
		
		header("location:customerhome.php");
	}
	else
	{
		echo"<script>alert('invalid username or password')</script>";
		
		
	}
	
}
?>
</body>
<?php
	include("footer.html");
	?>
</html>