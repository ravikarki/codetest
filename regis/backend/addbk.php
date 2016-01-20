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
if(isset($_SESSION['t_id']) && isset($_SESSION['t_name']) && isset($_SESSION['logged_in']))
{
	if(isset($_POST['m_fname']) && isset($_POST['m_lname']) && isset($_POST['m_email']) &&
			isset($_POST['m_clg']) && isset($_POST['m_mobile']) && isset($_POST['m_gender']))
	{
		if(($_POST['m_fname']=="") || ($_POST['m_lname']=="") || ($_POST['m_email']=="") ||
			($_POST['m_clg']=="") || ($_POST['m_mobile']=="") || ($_POST['m_gender']==""))
		{
			echo "3";
			return;
		}
		if (!filter_var($_POST['m_email'],FILTER_VALIDATE_EMAIL))
    	{
			echo "4";
			return ;
		}
		if ((strcmp($_POST['m_gender'],"m")!=0)&&(strcmp($_POST['m_gender'],"f")!=0))
    	{
			echo "3";
			return ;
		}
		if((preg_match('/[0-9!@#$%^&*()_+\-=\s\[\]{};\':"\\|,.<>\/?]/', $_POST['m_fname']))||
			(preg_match('/[0-9!@#$%^&*()_+\-=\s\[\]{};\':"\\|,.<>\/?]/', $_POST['m_lname']))||
			(preg_match('/[0-9!@#$%^&*()_+\-=\[\]{};\':"\\|,.<>\/?]/', $_POST['m_clg'])))
		{
			echo "11";
			return;
		}
	}
	else
	{
		echo "3";
		return;
	}
	$t = $_SESSION['t_id'];
	$tname = $_SESSION['t_name'];
	$fname = htmlspecialchars($_POST['m_fname']);
	$lname = htmlspecialchars($_POST['m_lname']);
	$gender= htmlspecialchars($_POST['m_gender']);
	$email = htmlspecialchars($_POST['m_email']);
	$mob   = htmlspecialchars($_POST['m_mobile']);
	$clg   = htmlspecialchars($_POST['m_clg']);
	//$acc   = htmlspecialchars($_POST['m_acc']);
	$sql = "SELECT `id` FROM user WHERE (`email`='$email' AND `activated`='yes') OR (`email`='$email' AND `invalid`='no' AND `activated`='no' AND `team_id`='$t')";
	$result=mysqli_query($conn,$sql);
	if(!$result)
	{
		//echo "Error description on select1: " . mysqli_error($conn);
		echo "1"; //MYSQL DB Error Occurred
		return;
	}
	$num_rows=mysqli_num_rows($result);
	if($num_rows>0)
	{
		//echo "Error description on select no user: " .$i." team : ". $t. mysqli_error($conn);
		echo "2"; //No such user registered
		return;
	}
	if(!mysqli_query($conn,"START TRANSACTION"))
	{
		//echo "second";
		echo "1"; //MYSQL DB Error Occurred
		return;
	}
	$sql="INSERT INTO user(`fname`,`lname`,`gender`,`email`,`college`,`mobile`,`accomodation`,`team_id`,`t_name`) VALUES('$fname','$lname','$gender','$email','$clg','$mob','no','$t','$tname')";
	if(!mysqli_query($conn,$sql))
	{
		//echo "Error description on user insert: " . mysqli_error($conn);
		mysqli_query($conn,"ROLLBACK");
		echo "1"; //MYSQL DB Error Occurred
		return ;
	}

	$id = mysqli_insert_id($conn);
	$u = uniqid($id);
	$u_id = substr($u,4,3).substr($u,0,4).substr($u,10,3).substr($u,7,3);

	$activ_code = substr(md5(substr($u_id,2,6).substr($t,4,5)),0,15);
	$sql = "UPDATE user SET `user_id`='$u_id', `activation_code`='$activ_code' WHERE `id`='$id'";// `team_id`='$t_id' AND `email`='$email'";

	if(!mysqli_query($conn,$sql))
	{
		//echo "Error description on update: " . mysqli_error($conn);
		mysqli_query($conn,"ROLLBACK");
		echo "1"; //MYSQL DB Error Occurred
		return;
	}
	$sql = "SELECT `max_tsize` FROM `team` WHERE `team_id`='$t'";
	$result=mysqli_query($conn,$sql);
	if(!$result)
	{
		//echo "Error description on select2: " . mysqli_error($conn);
		mysqli_query($conn,"ROLLBACK");
		echo "1"; //MYSQL DB Error Occurred
		return;
	}
	$rs = mysqli_fetch_array($result);
	$msz= $rs['max_tsize'];
	$msz += 1;
	if($msz>6)
	{
		mysqli_query($conn,"ROLLBACK");
		echo "5"; //MYSQL DB Error Occurred
		return;
	}
	$sql = "UPDATE team SET `max_tsize`='$msz', `invalid`='n' WHERE `team_id`='$t'";
	$result=mysqli_query($conn,$sql);
	if(!$result)
	{
		//echo "Error description on update: " . mysqli_error($conn);
		mysqli_query($conn,"ROLLBACK");
		echo "1"; //MYSQL DB Error Occurred
		return;
	}
	if(mysqli_affected_rows($conn)!=1)
	{
		mysqli_query($conn,"ROLLBACK");
		echo '1'; //Team size not updated
		return;
	}

	$to = $email; // Send email to our user
	$subject = 'Activation: Sankalan 2015, The Annual Technical Festival of Department of Computer Science, University of Delhi';
	$message = "
	<html>
	<body>
	<p>
	Hi ".$fname." ".$lname.",
	<br>
	<p>Greetings from Team Sankalan!
	<br>Thank you for signing up for Sankalan 2015 ~ Compiling Innovations.
	<p>
	You have been registered with the team <strong><i>".$tname."</i><strong>.
	<br>To activate yourself in <strong><i>".$tname."</i><strong>, use the activation code given below:
	<br><br> 
	-----------------------------------------------------------------------
	<br><strong>Your Team 		: <i>".$tname."</i>
	<br>Your Activation Code 	: <i>".$activ_code."</i><strong>
	<br>-----------------------------------------------------------------------
	<br>
	<p><strong>HOW TO ACTIVATE YOUSELF IN YOUR TEAM:-
	<br>
	<br>1. Visit <i><a target='blank' href='http://www.sankalan.info/regis/'>Sankalan 2015 ~ Compiling Innovations</a></i>.
	<br>
	<br>2. Login with your team credentials.
	<i>(The team member who registered the team has the team login credentials)</i>
	<br>
	<br>3. Click on the '<i>Activate Members</i>' tab.
	<br>
	<br>4. Enter your Activation Code in the space provided for it, against your name.
	<br>
	<br>5. Click on '<i>Activate</i>'.
	<br>
	<br>If you don't want to be registered with the team <strong><i>".$tname."</i><strong>, follow the above 3 steps and then Click on '<i>Remove</i>' against your name.
	</strong>
	<p><strong>NOTE:</strong><i> Do not share your Activation Code with anyone, except your team members.</i>
	<br>
	<br>For any queries you may reach us at webmaster@sankalan.info.</strong>

	<br>Regards,
	<br>Sankalan 2015
	<br>~ Compiling Innovations
	<br>The Annual Technical Festival of Department of Computer Science
	<br>University of Delhi
	<p>
	<div>Copyright &copy; 2015 |  Department of Computer Science, University of Delhi.</div>
	<br><p>
	<i>This is an auto-generated email, please do not reply to this email.</i>
	</body>
	</html>
	";
	$from = "Sankalan 2015<Sankalan@sankalan.info>";
	$replyto = "no-reply@sankalan.info";
	$headers = "Content-type: text/html; charset=iso-8859-1" . "\r\n";
	$headers .= "From:".$from;
	ini_set("SMTP","ftp.sankalan.info");
	ini_set("SMTP_PORT", 21); 
	$retval=mail($to, $subject, $message, $headers); // Send our email
	if( $retval == true )
	{
		//echo "Success"; // Mail sent
	}
	else
	{
		//echo "Error description on mail: " . mysqli_error($conn);
		mysqli_query($conn,"ROLLBACK");
		echo "4"; //Error in sending Mail
		return;
	}
	//ALL SUCCESSFULLY DONE
	if(!mysqli_query($conn,"COMMIT"))
	{
		mysqli_query($conn,"ROLLBACK");
		echo '1';
		return;
	}
	echo "0";
	return;
}
else
{
	echo '6';
	return;
}
?>