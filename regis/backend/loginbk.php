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
require_once('recaptchalib.php');
$privatekey = "6LfOcQETAAAAAMjLBT-zFRReV5C0GDDlYiKF38HU";
$resp = recaptcha_check_answer ($privatekey,$_SERVER["REMOTE_ADDR"],$_POST["recaptcha_challenge_field"],$_POST["recaptcha_response_field"]);

if (!$resp->is_valid)
{
	echo "5";       
	return;
} 
else
{

	if(isset($_POST['tname']) && isset($_POST['pass']))
	{
		if(($_POST['tname']=="") || ($_POST['pass']==""))
		{
			echo "4"; //blank fields
			return;
		}
		
		if (!get_magic_quotes_gpc())							//SQL Injection
		{
			$tname=htmlspecialchars($_POST['tname']);
			$pass=htmlspecialchars($_POST['pass']);
		}
	
		$sql="SELECT * FROM team WHERE tname='$tname'";
	
		$result=mysqli_query($conn,$sql);
	
		if(!$result)
		{
			echo "1"; //MYSQL DB Error Occurred
			return;
		}
	
		$num_rows=mysqli_num_rows($result);
	
		if($num_rows==0)
		{
			echo "2"; //Team not registered
			return;
		}
	
		$rs = mysqli_fetch_array($result);
		$ps = $rs['password'];
		$ps = '$2a$11$'.$ps;
		
		if($ps===crypt($pass, $ps))
		//if(password_verify($pass,$ps))
		{
			$_SESSION['logged_in']=true;
			$_SESSION['t_id']=$rs['team_id'];
			$_SESSION['t_name']=$tname;
			echo '0'; //success
			//echo "<meta http-equiv='refresh' content='0;url=../teampage.php'>";
			return;
		}
	
		else
		{
			echo '3'; //wrong password
			return;
		}
			
	}
	else
	{
		echo "4"; //Info missing
		return;
	} 
}
?>