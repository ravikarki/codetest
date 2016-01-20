<?php
session_start();
if(isset($_SESSION['logged_in'])&&isset($_SESSION['t_id'])&&isset($_SESSION['t_name']))
{
	echo '<link rel="shortcut icon" href="./images/favicon.ico">';
    echo '<meta content="Sankalan 2015, Annual technical festival of Department of Computer Science, University of Delhi, Event Details" name="description">';
    echo '<meta content="events, event list, Sankalan, DUCSS, DUCS, Delhi University Computer Science Society, Sankalan 2015, annual fest, Department of Computer Science, University of Delhi, Annual fest of DUCS, Conference Centre, North Campus" name="keywords">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
    echo '<meta http-equiv="refresh" content="120">';
  echo '<title> Sankalan 2015 - Annual Technical Festival of Department of Computer Science, University of Delhi</title>  ';
    echo '<link rel="stylesheet" href="styles/form.css" />';
    echo "<div align='right'><a href='./backend/logoutbk.php'>Logout</a></div>";
     echo "<center> <a href='../index.php' style='font-size:50px; font-weight:bold;'>
   SANKALAN  2015
    </a></center>
    <div id='sub'>COMPILING INNOVATIONS</div>";   
    echo "<h1 align='center'> :::::::: Welcome ".$_SESSION['t_name']." ::::::::</h1>";
    echo "<center>";
    echo "<h2> Team Information:</h2>";
    require ("./backend/teampagebk.php");
    if($flag==-1)
      	echo "<script type='text/javascript'>alert('No member in team!'); window.location='./backend/logoutbk.php';</script>";
    else
    {
?>
<html>
<body>
	<br><br>
	<?php if($cnfr!=$total){?><button style="border:3px solid #38b0de; background: #38b0de;" readonly onclick="location.href='./activateteam.php'">Activate Members</button><?php }?>
    <?php if(($flag<6)&&($flag>0)){?><button style="border:3px solid #38b0de; background: #38b0de;" readonly onclick="location.href='./addteam.php'">Add New Member</button><?php }?>
	<button style="border:3px solid #38b0de; background: #38b0de;" readonly onclick="location.href='./removeteam.php'">Remove Members</button>
	<?php if(($cap==0)&&($count>1)){?><button style="border:3px solid #38b0de; background: #38b0de;" readonly onclick="location.href='./captainteam.php'">Assign Team Captain</button><?php }?>
    <?php if(($inval=='n')&&($cap==1)){?><button style="border:3px solid #38b0de; background: #38b0de;" readonly onclick="location.href='./captainteam.php'">Change Team Captain</button><?php }?>    
</body>
</html>
<?php
    echo "</center>";
    }
?>
<div id="foot1">
<div style="color:#f3b602">For any queries related to registration/login, you may contact us at webmaster@sankalan.info</div>

<div style="color:#ffa500">Copyright &copy; 2015 |  Department of Computer Science, University of Delhi</div>
</div>
<?php
}
else
{
	//echo "<meta http-equiv='refresh' content='0;url=./index.php'>";
	echo "<meta http-equiv='refresh' content='0;url=http://www.sankalan.info'>";
}
?>