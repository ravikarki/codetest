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

		if(!mysqli_query($conn,"START TRANSACTION"))
		{
			echo "2"; //MYSQL DB Error Occurred
			return;
		}
		$sql = "DELETE FROM user WHERE `team_id`='$t' AND `activated`='no' AND `invalid` = 'no' AND `id`='$i' AND `email`='$em'";
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
		$sql = "SELECT `max_tsize` FROM `team` WHERE `team_id`='$t'";
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
		$msz -= 1;
		if($msz<0)
		{
			mysqli_query($conn,"ROLLBACK");
			echo "1"; //MYSQL DB Error Occurred
			return;
		}
		else if($msz==0)
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
			echo "6"; //MYSQL DB Error Occurred
			return;
		}
		else if($msz==1)
		{
			$sql = "UPDATE team SET `max_tsize`='$msz',`invalid`='y' WHERE `team_id`='$t'";
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
			echo "7"; //MYSQL DB Error Occurred
			return;
		}
		$sql = "UPDATE team SET `max_tsize`='$msz' WHERE `team_id`='$t'";
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
	echo "1";
	return;
}
else
{
	echo'5';
	return;
}