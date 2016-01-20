<?php
include './backend/dbConn.inc';
if(isset($_SESSION['logged_in'])&&isset($_SESSION['t_id'])&&isset($_SESSION['t_name']))
{
	$team=$_SESSION['t_id'];
	$sql="SELECT `invalid`,`capt_asgnd`,`captain` FROM team WHERE `team_id`='$team'";
	$result=mysqli_query($conn,$sql);
	if(!$result)
	{
		echo "<h4> Sorry for the incovenience! <a href='./captainteam.php'>Please try again</a></h4>";
		return;
	}
	else if(mysqli_num_rows($result)==0)
	{	
		session_destroy();
		echo "<meta http-equiv='refresh' content='0;url=./index.php'>";
		//echo "<meta http-equiv='refresh' content='0;url=http://www.sankalan.info'>";
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
	if(strcmp($rs['capt_asgnd'],'y')==0)
	{
		$cn= $rs['captain'];
		$cap = 1 ;
		$sql="SELECT `fname`,`lname` FROM user WHERE `team_id`='$team' AND `activated`='yes' AND `user_id`='$cn'";
		$capt=mysqli_query($conn,$sql);
		if(!$capt)
		{
			echo "<h4> Sorry for the incovenience! <a href='./captainteam.php'>Please try again</a></h4>";
			return;
		}
		$rs = mysqli_fetch_array($capt);
		$cap_name=$rs['fname']." ".$rs['lname'];
	}
	else
	{
		$cap = 0;
		$cap_name="Not Assigned";
	}
	$sql = "SELECT `id`,`fname`,`lname`,`gender`,`email`,`college`,`mobile`,`accomodation`, `activated`, `captain` FROM user WHERE `team_id`='$team' AND `activated`='yes' AND `invalid` = 'no'";
	$result=mysqli_query($conn,$sql);
	
	if($result)
	{
		$flag=1;
		//echo "1"; //MYSQL DB Error Occurred
		if(mysqli_num_rows($result)==0)
			$flag=-2;
		else if (mysqli_num_rows($result)==1)
			$flag=-3;
		else
			$flag=mysqli_num_rows($result);
		return;
	}
	else
	{
		$flag=-1;
		echo "<h4> Sorry for the incovenience! <a href='./captainteam.php'>Please try again</a></h4>";
		return;
	}
	
}
else
{
	//echo "<meta http-equiv='refresh' content='0;url=./index.php'>";
	echo "<meta http-equiv='refresh' content='0;url=http://www.sankalan.info'>";
}
?>