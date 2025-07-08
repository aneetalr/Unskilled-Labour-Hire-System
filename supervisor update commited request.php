<?php
	include 'connect.php';
	$sid = $_REQUEST['id'];
	session_start();
	$un = $_SESSION["sid"];
	$query = "update customerbookings set status = 'completed' where bookid = '$sid'";
	$result = mysqli_query($conn,$query);
	//echo $query;
	if($result === TRUE){
		echo "<script type = \"text/javascript\">
					alert(\"Successfully Updated\");
                    window.location = (\"supervisor view commited works.php\")
				</script>";
	}
?>