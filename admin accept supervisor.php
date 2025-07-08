<?php
	include 'connect.php';
	$sid = $_REQUEST['id'];
	$un = $_REQUEST['unm'];
	$query = "update supervisor set status = '1' where sid = '$sid'";
	$result = mysqli_query($conn,$query);
	//echo $query;
	$qwe = "update login set status = '1' where uname='$un'";
	$as = mysqli_query($conn,$qwe);
	//echo $qwe;
	if($result === TRUE){
		echo "<script type = \"text/javascript\">
					alert(\"Successfully Accepted\");
					window.location = (\"admin view supervisor.php\")
				</script>";
	}
?>