<?php
	include 'connect.php';
	$sid = $_REQUEST['id'];
	$un = $_REQUEST['unm'];
	$query = "update workers set status = '1' where wid = '$sid'";
	$result = mysqli_query($conn,$query);
	$qwe = "update login set status='1' where uname='$un'";
	$as = mysqli_query($conn,$qwe);
	if($result === TRUE){
		echo "<script type = \"text/javascript\">
					alert(\"Successfully Accepted\");
					window.location = (\"admin view worker.php\")
				</script>";
	}
?>