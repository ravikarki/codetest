<?php

include("dbConn.inc");

if(isset($_POST['email']))
{
       if($_POST["email"]=="")
	{
		echo "1";
		return 1;
	}
       if (!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL))
        {
		echo "1";
		return 1;
	}
}

if(isset($_POST["message"]))
{
	if($_POST["message"]=="")
	{
		echo "2";
		return 2;
	}
}
if(isset($_POST["email"]) && isset($_POST["message"]))
{
	if(get_magic_quotes_gpc())
	{
		$_POST["email"]=stripslashes(trim($_POST["email"]));
		$_POST["message"]=stripslashes($_POST["message"]);
	}
	
	$email=$_POST["email"];
	$message=$_POST["message"];
	$email=strip_tags($email);
	$message=strip_tags($message);
	$email=trim($email);

	if ( filter_var($email,FILTER_VALIDATE_EMAIL))
	{
		$sql="INSERT INTO contact_us (user_email,message) VALUES ('$email','$message')";
		
		if(!$result=mysqli_query($conn,$sql)) 
		{
			echo "3";
			return 3;
		}

		echo "0";
		return 0;
	}
		
	else
	{
		echo "1 ";
		return 1;
	}
}
/*else
{
	echo "Please enter a message!";
	return 2;
}*/
?>