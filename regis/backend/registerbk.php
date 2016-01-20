<?php

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
	echo "7";       
	return;
} 
else
{

	if(isset($_POST['size']) && ($_POST['size']!=""))
	{
		$sz = (int)$_POST['size'];
		if(($sz<2)||($sz>6))
		{
			echo "6";
			return;
		}
	}
	function has_dupes($array)
	{
		if(count($array) !== count(array_unique($array)))
			return true;
		return false;
	}

	if(isset($_POST['tname']) && isset($_POST['pass']) && isset($_POST['cpass']))
	{
		if(($_POST['tname']=="") || ($_POST['pass']=="") || ($_POST['cpass']==""))
		{
			echo "3";
			return;
		}
		if((strlen($_POST['tname'])<4) || (strlen($_POST['tname'])>30))
		{
			echo "8";
			return;
		}
		if((strlen($_POST['pass'])<6) || (strlen($_POST['cpass'])<6))
		{
			echo "9";
			return;
		}
		if(strcmp($_POST['pass'],$_POST['cpass'])!=0)
		{
			echo "10";
			return;
		}
		$arr=array();
		for($i=0; $i<$sz; $i++)
		{
			if(isset($_POST['m_fname'.$i]) && isset($_POST['m_lname'.$i]) && isset($_POST['m_email'.$i]) &&
				isset($_POST['m_clg'.$i]) && isset($_POST['m_mobile'.$i]) && isset($_POST['m_gender'.$i]))
			{
				if(($_POST['m_fname'.$i]=="") || ($_POST['m_lname'.$i]=="") || ($_POST['m_email'.$i]=="") ||
					($_POST['m_clg'.$i]=="") || ($_POST['m_mobile'.$i]=="") || ($_POST['m_gender'.$i]==""))
				{
					echo "3";
					return;
				}
				if (!filter_var($_POST['m_email'.$i],FILTER_VALIDATE_EMAIL))
	        		{
					echo "4";
					return ;
				}
				if ((strcmp($_POST['m_gender'.$i],"m")!=0)&&(strcmp($_POST['m_gender'.$i],"f")!=0))
		    		{
					echo "3";
					return ;
				}
				if((preg_match('/[0-9!@#$%^&*()_+\-=\s\[\]{};\':"\\|,.<>\/?]/', $_POST['m_fname'.$i]))||
					(preg_match('/[0-9!@#$%^&*()_+\-=\s\[\]{};\':"\\|,.<>\/?]/', $_POST['m_lname'.$i]))||
					(preg_match('/[0-9!@#$%^&*()_+\-=\[\]{};\':"\\|,.<>\/?]/',$_POST['m_clg'.$i])))
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
			$arr[$i]=$_POST['m_email'.$i];
		}
		
		if(has_dupes($arr))
		{
			echo '5';
			return;
		}
		
		if (!get_magic_quotes_gpc())							//SQL Injection
		{
			//$tname=addslashes(trim($_POST['tname']));
			$tname=htmlspecialchars($_POST['tname']);
			//$pass=addslashes(trim($_POST['pass']));		
			$pass=htmlspecialchars($_POST['pass']);
		}

		$sql="SELECT * FROM team WHERE tname='$tname'";

		$result=mysqli_query($conn,$sql);

		if(!$result)
		{
			//echo "first";
			echo "1"; //MYSQL DB Error Occurred
			return;
		}

		$num_rows=mysqli_num_rows($result);

		if($num_rows>0)
		{
			echo "2"; //Team Already Present
			return;
		}

	    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789./";
	    $salt_ap = array(); //remember to declare $salt_ap as an array
	    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	    for ($i = 0; $i < 22; $i++)
	    {
	    	$n = rand(0, $alphaLength);
	    	$salt_ap[] = $alphabet[$n];
	    }
	    $salt_app=implode($salt_ap); //turn the array into a string
		$salt = '$2a$11$'.$salt_app; //generate salt

		$password_hash = crypt($pass, $salt);
		$password_hash = substr($password_hash, 7);
		if(!mysqli_query($conn,"START TRANSACTION"))
		{
			//echo "second";
			echo "1"; //MYSQL DB Error Occurred
			return;
		}

		$sql = "INSERT INTO team(`tname`,`password`,`max_tsize`) VALUES('$tname','$password_hash','$sz')";

		if(!mysqli_query($conn,$sql))
		{
			//echo "third";
			//echo "Error description on team insert: " . mysqli_error($conn);
			echo "1"; //MYSQL DB Error Occurred
			return ;
		}

		$id = mysqli_insert_id($conn);
		$t = uniqid($id);
		$t_id = substr($t,4,3).substr($t,0,4).substr($t,10,3).substr($t,7,3);

		$sql = "UPDATE team SET `team_id`='$t_id' WHERE `tname`='$tname'";

		if(!mysqli_query($conn,$sql))
		{
			//echo "fourth";
			//echo "Error description on team update: " . mysqli_error($conn);
			mysqli_query($conn,"ROLLBACK");
			echo "1"; //MYSQL DB Error Occurred
			return;
		}

		for($x=0; $x<$sz; $x++)
		{
			if (!get_magic_quotes_gpc())							//SQL Injection
			{	
				/*$fname =addslashes(trim($_POST['m_fname'.$x]));			
				$lname =addslashes(trim($_POST['m_lname'.$x]));
				$email =addslashes(trim($_POST['m_email'.$x]));
				$mob   =(is_numeric($_POST['m_mobile'.$x])?(int)$_POST['m_mobile'.$x]:0);
				$clg   =addslashes(trim($_POST['m_clg'.$x]));
				$acc   =addslashes(trim($_POST['m_acc'.$x]));*/
				$fname =htmlspecialchars($_POST['m_fname'.$x]);
				$lname =htmlspecialchars($_POST['m_lname'.$x]);
				$gender= htmlspecialchars($_POST['m_gender'.$x]);
				$email =htmlspecialchars($_POST['m_email'.$x]);
				$mob   = htmlspecialchars($_POST['m_mobile'.$x]);
				$clg   =htmlspecialchars($_POST['m_clg'.$x]);
				//$acc   =htmlspecialchars($_POST['m_acc'.$x]);
			}

			$sql= "SELECT `id` FROM user WHERE `email`='$email' and `activated`='yes'";
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
				mysqli_query($conn,"ROLLBACK");
				if($x==0)
					echo "40";
				else if($x==1)
					echo "41";
				else if($x==2)
					echo "42";
				else if($x==3)
					echo "43";
				else if($x==4)
					echo "44";
				else if($x==5)
					echo "45";
				return;
			}


			$sql="INSERT INTO user(`fname`,`lname`,`gender`,`email`,`college`,`mobile`,`accomodation`,`team_id`,`t_name`) VALUES('$fname','$lname','$gender','$email','$clg','$mob','no','$t_id','$tname')";

			if(!mysqli_query($conn,$sql))
			{
				//echo "fifth";
				//echo "Error description on user insert: " . mysqli_error($conn);
				mysqli_query($conn,"ROLLBACK");
				echo "1"; //MYSQL DB Error Occurred
				return ;
			}

			$id = mysqli_insert_id($conn);
			$u = uniqid($id);
			$u_id = substr($u,4,3).substr($u,0,4).substr($u,10,3).substr($u,7,3);

			$activ_code = substr(md5(substr($u_id,2,6).substr($t_id,4,5)),0,15);
			$sql = "UPDATE user SET `user_id`='$u_id', `activation_code`='$activ_code' WHERE `id`='$id'";// `team_id`='$t_id' AND `email`='$email'";
			if(!mysqli_query($conn,$sql))
			{
				//echo "Error description on update: " . mysqli_error($conn);
				mysqli_query($conn,"ROLLBACK");
				echo "1"; //MYSQL DB Error Occurred
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
			$replyto= "no-reply@sankalan.info";
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
		}

		//ALL SUCCESSFULLY DONE
		if(!mysqli_query($conn,"COMMIT"))
		{
			mysqli_query($conn,"ROLLBACK");
			//echo "seven";
			echo '1';
			return;
		}
		echo "0";
		return;
	}

	else
	{
		echo "3"; //Info missing
		return;
	}
} 
?>