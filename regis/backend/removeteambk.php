<?php
include './backend/dbConn.inc';
if(isset($_SESSION['logged_in'])&&isset($_SESSION['t_id'])&&isset($_SESSION['t_name']))
{
	$team=$_SESSION['t_id'];
	$sql="SELECT `invalid` FROM team WHERE `team_id`='$team'";
	$result=mysqli_query($conn,$sql);
	if(!$result)
	{
		echo "<h4> Sorry for the incovenience! <a href='./removeteam.php'>Please try again</a></h4>";
		return;
	}
	else if(mysqli_num_rows($result)==0)
	{	
		session_destroy();
		echo "<meta http-equiv='refresh' content='0;url=./index.php'>";
	}
	else
	{
		$rs = mysqli_fetch_array($result);
		$inval= $rs['invalid'];
	}
	if($inval=='y')
		$status = "Deactivated";
	else 
		$status = "Active";
	$sql = "SELECT `id`,`fname`,`lname`,`gender`,`email`,`college`,`mobile`,`accomodation`, `activated` FROM user WHERE `team_id`='$team' AND `invalid` = 'no'";
	$result=mysqli_query($conn,$sql);
	
	if($result)
	{
		$flag=1;
		//echo "1"; //MYSQL DB Error Occurred
		if(mysqli_num_rows($result)==0)
			$flag=-1;
		else
			$flag=mysqli_num_rows($result);
		return;
	}
	else
	{
		$flag=-1;
		echo "<h4> Sorry for the incovenience! <a href='./removeteam.php'>Please try again</a></h4>";
		return;
	}
	//$num = mysqli_num_rows($result);
	
}
else
{
	//echo "<meta http-equiv='refresh' content='0;url=./index.php'>";
	echo "<meta http-equiv='refresh' content='0;url=http://www.sankalan.info'>";
}
?>