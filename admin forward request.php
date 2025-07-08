<?php
	include 'connect.php';
	$sid = $_REQUEST['id'];
	// $un = $_REQUEST['unm'];
	$query = "update customerbookings set status = 'forwarded' where bookid = '$sid'";
	$result = mysqli_query($conn,$query);
	//echo $query;
	if($result === TRUE){
		echo "<script type = \"text/javascript\">
					alert(\"Successfully Forwarded\");
                    window.location = (\"admin view booking request.php\")
				</script>";
	}
?>