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
	if(isset($_POST['em']) && isset($_POST['u']) && isset($_POST['stat']))
	{
		if(($_POST['em']=="") || ($_POST['u']=="") || ($_POST['stat']==""))
		{
			echo "1";
			return;
		}
		$t = $_SESSION['t_id'];
		$i = (int)$_POST['u'];
		$mode= htmlspecialchars($_POST['stat']);
		$em= htmlspecialchars($_POST['em']);

		if(strcmp($mode,"n")==0)
		{
			$sql = "SELECT `user_id` FROM user WHERE `id`='$i' AND `team_id`='$t' AND `email`='$em'";
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
			$cid= $rs['user_id'];
			if(!mysqli_query($conn,"START TRANSACTION"))
			{
				//echo "Error description on TRANSACTION: " . mysqli_error($conn);
				echo "2"; //MYSQL DB Error Occurred
				return;
			}
			$sql = "UPDATE user SET `captain`='yes' WHERE `team_id`='$t' AND `activated`='yes' AND `invalid` = 'no' AND `id`='$i' AND `email`='$em'";
			$result=mysqli_query($conn,$sql);
			if(!$result)
			{
				//echo "Error description on update first: " . mysqli_error($conn);
				echo "2"; //MYSQL DB Error Occurred
				return;
			}
			if(mysqli_affected_rows($conn)!=1)
			{
				echo '1';
				return;
			}
			$sql = "UPDATE team SET `captain`='$cid',`capt_asgnd`='y' WHERE `capt_asgnd`='n' AND `invalid` = 'n' AND `team_id`='$t'";
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
			echo "0";
			return;
		}

		if(strcmp($mode,"c")==0)
		{
			$sql = "SELECT `user_id` FROM user WHERE `id`='$i' AND `team_id`='$t' AND `email`='$em'";
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
			$uid= $rs['user_id'];
			$sql = "SELECT `captain` FROM team WHERE `team_id`='$t'";
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
			$cid= $rs['captain'];
			if(strcmp($uid,$cid)==0)
			{
				echo '7';
				return;
			}
			if(!mysqli_query($conn,"START TRANSACTION"))
			{
				//echo "Error description on TRANSACTION: " . mysqli_error($conn);
				echo "2"; //MYSQL DB Error Occurred
				return;
			}
			$sql = "UPDATE user SET `captain`='yes' WHERE `captain`='no' AND `team_id`='$t' AND `activated`='yes' AND `invalid` = 'no' AND `id`='$i' AND `email`='$em'";
			$result=mysqli_query($conn,$sql);
			if(!$result)
			{
				//echo "Error description on update first: " . mysqli_error($conn);
				echo "2"; //MYSQL DB Error Occurred
				return;
			}
			if(mysqli_affected_rows($conn)!=1)
			{
				//echo "Error description on update first: " . mysqli_error($conn);
				echo '1'; //Activation code not matched
				return;
			}
			$sql = "UPDATE team SET `captain`='$uid' WHERE `capt_asgnd`='y' AND `invalid` = 'n' AND `team_id`='$t'";
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
				echo ' 1'; //Team size not updated
				return;
			}
			$sql = "UPDATE user SET `captain`='no' WHERE `captain`='yes' AND `user_id`='$cid' AND `activated`='yes' AND `invalid` = 'no'";
			$result=mysqli_query($conn,$sql);
			if(!$result)
			{
				//echo "Error description on update first: " . mysqli_error($conn);
				echo "2"; //MYSQL DB Error Occurred
				return;
			}
			if(mysqli_affected_rows($conn)!=1)
			{
				//echo "Error description on update first: " . mysqli_error($conn);
				echo '1'; //Activation code not matched
				return;
			}
			if(!mysqli_query($conn,"COMMIT"))
			{
				mysqli_query($conn,"ROLLBACK");
				echo '2';
				return;
			}
			echo "0";
			return;
		}
	}
	echo "1";
	return;
}
else
{
	echo'5';
	return;
}
?>