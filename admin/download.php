<?php
session_start();
if(isset($_SESSION["admin"]))
{
$xls_filename = 'output.xls'; // Define Excel (.xls) file name
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
require_once('func.php');
$conn=get_connection();
$sql="SELECT `registration`.`name`,`registration`.`cname`,`registration`.`email`,`registration`.`phone`,`events`.`eventname`,`registration`.`hdyfu` FROM `registration` LEFT JOIN `events` ON `registration`.`eventid`=`events`.`eventid`";
$result=$conn->query($sql);
$sep = "\t"; // tabbed character
echo "NAME\tCOLLEGE NAME\tEMAIL\tPHONE\tEVENT NAME\tHow Did You Find Us?\n";
while($row=$result->fetch_assoc())
{
	$name=$row["name"];
	$cname=$row["cname"];
	$email=$row["email"];
	$phone=$row["phone"];
	$eventname=$row["eventname"];
	$h=$row["hdyfu"];
	echo $name."\t".$cname."\t".$email."\t".$phone."\t".$eventname."\t".$h."\n";
}
}
else
	echo "Please Login to Dowload the Excel File</br>";
?>
