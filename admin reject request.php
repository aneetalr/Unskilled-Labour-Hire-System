<?php
	include 'connect.php';
	$sid = $_REQUEST['id'];
	// $un = $_REQUEST['unm'];
	$query = "delete from customerbookings where bookid = '$sid'";
	$result = mysqli_query($conn,$query);
	
	
		echo "<script type = \"text/javascript\">
					alert(\"Successfully Rejected\");
                    window.location = (\"admin view booking request.php\")
				</script>";
	
?>