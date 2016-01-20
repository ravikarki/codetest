<?php
session_start();

$isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND 
          strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

if(!$isAjax)
{
	//echo "<meta http-equiv='refresh' content='0;url=../index.php'>";
	echo "<meta http-equiv='refresh' content='0;url=http://www.sankalan.info'>";
	return;
}

require ("dbConn.inc");

if(isset($_POST['tbi']) && ($_POST['tbi']!=""))
{
	$tbi = (int)$_POST['tbi'];
	if(($tbi<0)||($tbi>5))
	{
		echo "1";
		return;
	}
}
if(isset($_SESSION['t_id']) && isset($_SESSION['t_name']) && isset($_SESSION['logged_in']))
{
	if(isset($_POST['em']) && isset($_POST['u']))
	{
		if(($_POST['em']=="") || ($_POST['u']==""))
		{
			echo "1";
			return;
		}
		$t = $_SESSION['t_id'];
		$i = (int)$_POST['u'];
		$em= htmlspecialchars($_POST['em']);

		$sql = "SELECT `activated`,`captain` FROM user WHERE `id`='$i' AND `team_id`='$t' AND `email`='$em'";
		$result=mysqli_query($conn,$sql);
		if(!$result)
		{
			//echo "Error description on select1: " . mysqli_error($conn);
			echo "2"; //MYSQL DB Error Occurred
			return;
		}
		$num_rows=mysqli_num_rows($result);
		if($num_rows==0)
		{
			//echo "Error description on select no user: " .$i." team : ". $t. mysqli_error($conn);
			echo "1"; //No such user registered
			return;
		}
		$rs = mysqli_fetch_array($result);
		$status = $rs['activated'];
		$capt = $rs['captain'];
		if(!mysqli_query($conn,"START TRANSACTION"))
		{
			echo "2"; //MYSQL DB Error Occurred
			return;
		}
		$sql = "DELETE FROM user WHERE `team_id`='$t' AND `invalid` = 'no' AND `id`='$i' AND `email`='$em'";
		$result=mysqli_query($conn,$sql);
		if(!$result)
		{
			//echo "Error description on update first: " . mysqli_error($conn);
			echo "2"; //MYSQL DB Error Occurred
			return;
		}
		if(mysqli_affected_rows($conn)!=1)
		{
			echo '1'; //credentials not matched
			return;
		}
		$sql = "UPDATE user SET `invalid`='no' WHERE `activated`='no' AND `invalid` = 'yes' AND `email`='$em'";
		$result=mysqli_query($conn,$sql);
		if(!$result)
		{
			//echo "Error description on update: " . mysqli_error($conn);
			mysqli_query($conn,"ROLLBACK");
			echo "2"; //MYSQL DB Error Occurred
			return;
		}
		$sql = "SELECT `max_tsize`,`tsize` FROM `team` WHERE `team_id`='$t'";
		$result=mysqli_query($conn,$sql);
		if(!$result)
		{
			//echo "Error description on select2: " . mysqli_error($conn);
			mysqli_query($conn,"ROLLBACK");
			echo "2"; //MYSQL DB Error Occurred
			return;
		}
		$rs = mysqli_fetch_array($result);
		$msz= $rs['max_tsize'];
		$tsz= $rs['tsize'];
		$msz -= 1;
		if(strcmp($status,"yes")==0)
			$tsz-= 1;
		if(strcmp($capt,"yes")==0)
		{
			if($rs['tsize']>1)
			{
				mysqli_query($conn,"ROLLBACK");
				echo 'x';
				return;
			}
		}
		
		if(($tsz<0)||($tsz>$msz)||($msz<0))
		{
			mysqli_query($conn,"ROLLBACK");
			echo "1"; //MYSQL DB Error Occurred
			return;
		}
		else if(($msz==0)&&($tsz==0))
		{
			$sql = "DELETE FROM team WHERE `team_id`='$t'";
			$result=mysqli_query($conn,$sql);
			if(!$result)
			{
				//echo "Error description on delete team: " . mysqli_error($conn);
				mysqli_query($conn,"ROLLBACK");
				echo "2"; //MYSQL DB Error Occurred
				return;
			}
			if(mysqli_affected_rows($conn)!=1)
			{
				mysqli_query($conn,"ROLLBACK");
				echo '1'; //credentials not matched
				return;
			}
			mysqli_query($conn,"COMMIT");
			echo "6";//team delete
			return;
		}
		else if($msz==1)
		{
			if(strcmp($capt,"yes")==0)
				$sql = "UPDATE team SET `max_tsize`='$msz',`tsize`='$tsz',`capt_asgnd`='n',`invalid`='y' WHERE `team_id`='$t'";
			else
				$sql = "UPDATE team SET `max_tsize`='$msz',`tsize`='$tsz',`invalid`='y' WHERE `team_id`='$t'";
			
			$result=mysqli_query($conn,$sql);
			if(!$result)
			{
				//echo "Error description on update: " . mysqli_error($conn);
				mysqli_query($conn,"ROLLBACK");
				echo "2"; //MYSQL DB Error Occurred
				return;
			}
			if(mysqli_affected_rows($conn)!=1)
			{
				mysqli_query($conn,"ROLLBACK");
				echo '1'; //Team size not updated
				return;
			}
			mysqli_query($conn,"COMMIT");
			echo "7"; //team has 1 member
			return;
		}
		if(strcmp($capt,"yes")==0)
			$sql = "UPDATE team SET `max_tsize`='$msz',`tsize`='$tsz',`capt_asgnd`='n' WHERE `team_id`='$t'";
		else
			$sql = "UPDATE team SET `max_tsize`='$msz',`tsize`='$tsz' WHERE `team_id`='$t'";
		$result=mysqli_query($conn,$sql);
		if(!$result)
		{
			//echo "Error description on update: " . mysqli_error($conn);
			mysqli_query($conn,"ROLLBACK");
			echo "2"; //MYSQL DB Error Occurred
			return;
		}
		if(mysqli_affected_rows($conn)!=1)
		{
			mysqli_query($conn,"ROLLBACK");
			echo '1'; //Team size not updated
			return;
		}
		if(!mysqli_query($conn,"COMMIT"))
		{
			mysqli_query($conn,"ROLLBACK");
			echo '2';
			return;
		}
		if(strcmp($capt,"yes")==0)
		{
			echo 'c';
			return;
		}
		echo "0";
		return;
	}
	echo "1";
	return;
}
else
{
	echo'5';
	return;
}