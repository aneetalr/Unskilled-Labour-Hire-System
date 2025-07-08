<?php


$tr="select count(*) as cnt from login where uname='$un'";
	$fd=mysql_query($tr);
	$da=mysql_fetch_array($fd);
	$cn=$da['cnt'];
if($cn==0)
	{
		echo "<script>alert('Successfully Registered')</script>";
	}
	else if($cn>0)
	{
		echo "Username already selected... Try another username";
	}
	else
	{
		echo "<script>alert('Registration Failed.. Try Again')</script>";
	}	


?>