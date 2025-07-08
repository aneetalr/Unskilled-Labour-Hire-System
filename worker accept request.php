<?php
	include 'connect.php';
	$sid = $_REQUEST['id'];
	session_start();
    $un = $_SESSION["wid"];
    $query = "select * from customerbookings where bookid = '$sid'";
    $result = mysqli_query($conn,$query);
    //echo $query;
    $data=mysqli_fetch_array($result);
    $wid=$data['wid'];
    $wid1=$data['wid1'];
    $wid2=$data['wid2'];
    $wid3=$data['wid3'];
    
    if($wid==$un or $wid1==$un or $wid2==$un or $wid3==$un )
    {
        echo "<script type = \"text/javascript\">
        alert(\"You Have Already Added\");
        window.location = (\"worker view request.php\")
     
    </script>";
    }
    else{
     //   echo $wid.$un;
    if($wid==0 and $wid!=$un)
    {
    $query = "update customerbookings set wid='$un' where bookid = '$sid'";
  //  echo $query;
    $result = mysqli_query($conn,$query);
    }
    elseif($wid1==0 and $wid1!=$un)
    {
	$query = "update customerbookings set wid1='$un' where bookid = '$sid'";
    $result = mysqli_query($conn,$query);
    }
    elseif($wid2==0 and $wid2!=$un)
    {
	$query = "update customerbookings set wid2='$un' where bookid = '$sid'";
    $result = mysqli_query($conn,$query);
    }
    elseif($wid3==0 and $wid3!=$un)
    {
	$query = "update customerbookings set wid3='$un' where bookid = '$sid'";
    $result = mysqli_query($conn,$query);
    }


	// echo $query;window.location = (\"worker view request.php\")
	if($result === TRUE){
		echo "<script type = \"text/javascript\">
					alert(\"Successfully Accepted\");
                    
                    window.location = (\"worker view request.php\")
				</script>";
    }
}

   
      
    
    
?>