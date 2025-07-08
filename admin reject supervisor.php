<?php
	include 'connect.php';
	$sid = $_REQUEST['id'];
	$un = $_REQUEST['unm'];
	$query = "delete from supervisor  where sid = '$sid'";
	$result = mysqli_query($conn,$query);
	$qwe = "delete from login where uname='$un'";
	$as = mysqli_query($conn,$qwe);
	if($result === TRUE){
		echo "<script type = \"text/javascript\">
					alert(\"Successfully Rejected\");
					window.location = (\"admin view supervisor.php\")
				</script>";
	}
?>