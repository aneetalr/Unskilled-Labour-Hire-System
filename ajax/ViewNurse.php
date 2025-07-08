<?php
include("../connect.php");
$dept_name = $_REQUEST['snm'];

$qry="select nurname from nursereg where status='1' and department='$dept_name'";
$result_nurse = mysql_query($qry);

echo "<select name='vnm'>";
while($row_nurse = mysql_fetch_array($result_nurse))
{
    echo "<option value='".$row_nurse['nurname']."'>".$row_nurse['nurname']."</option>";
}
echo "</select>";


?>