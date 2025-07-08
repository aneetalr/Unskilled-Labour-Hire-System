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
<h1 align="center">Add Your Service</h1>
<br>
<br>
<form method="post"  enctype="multipart/form-data">
	<table align="center" height="200" width="500" >
		<tr>
			<td>Service Name</td><td><select name="name1">
			<option value="cleaning">Cleaning</option>
			<option value="farm work">Farm work</option>
			<option value="painting">Painting</option>
			<option value="well cleaning">Well cleaning</option>
			<option value="tank cleaning">tank cleaning</option>
			<option value="building well">For building well</option>
			<option value="making ponds">For making ponds</option>
			<option value="house shifting">House shifting</option>
			<option value="construction">Construction labour</option>
			</select></td>
		</tr>
		<tr>
			<td>No of Days</td><td><input type="text" name="addr" required/></td>
		</tr>
		<tr>
			<td>From Date</td><td><input type="date" name="dis" id="deptname" required onChange="msg()" /></td>
		</tr>
		
		
		
		<tr>
			<td>Full Address</td><td><input type="text" name="phno"  required pattern="[A-Za-z-\s.,/():-;0-9]+" title="enter Characters only"/></td>
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
<script>
			function msg()
			{
				var a=document.getElementById("deptname").value;
				
//                alert(progId)
                obj = (window.XMLHttpRequest) ? new XMLHttpRequest() : ((window.ActiveXObject) ? new ActiveXObject(Microoft.XMLHTTP) : null);

                if (obj != null)
                {
                    obj.onreadystatechange = function ()
                    {
                        if (obj.readyState == 4 && obj.status == 200)
                        {
                            document.getElementById('doctor').innerHTML = obj.responseText;
                        }
                    };
                    obj.open('post', 'admintableviewattendance.php?snm='+ a, true);
                    obj.send(null);
                }
            
			 [ / 

//				window.location="ajax/ViewNurse.php?snm="+a;
//				alert(a);
			}
			
//			function msg1()
//			{
//				var a=document.getElementById("deptname").value;
//				var b=document.getElementById("vnm").value;
//			//	window.location="adminaddjobnurse.php?snm="+a+"&vty="+b;
//				//alert();
//			}
			
			</script>
<?php
if(isset($_REQUEST["sub"]))
{
	$na=$_REQUEST["name1"];
	$addr=$_REQUEST["addr"];
	$dis=$_REQUEST["dis"];
//	$gen=$_REQUEST["r1"];
//	$dob=$_REQUEST["date1"];
	// $email=$_REQUEST["email"];
	$phno=$_REQUEST["phno"];
	// $fg=$dis+$addr;
	$email=date('Y-m-d', strtotime($dis. ' + '.$addr.'  days'));
	// echo $fg;
	$da=date('Y-m-d');
	session_start();
	$cid=$_SESSION["cid"];
	$que="insert into customerbookings(cid,service,nod,fromdate,todate,place,bdate,status) values('$cid','$na','$addr','$dis','$email','$phno','$da','not approved')";
	
	$res=mysqli_query($conn,$que);
	// echo $que;
//	echo $qq;
//	$sa=mysql_query($we);
//	echo $we;
	echo "<script>alert('Successfully Added Service')</script>";
	
		
}
?>
<?php
include("footer.html");
?>