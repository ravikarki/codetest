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
	echo "<script type='text/javascript' src='src/jquery-1.10.2.min.js'></script>";
	echo '<link rel="stylesheet" href="styles/form.css" />';

	echo "<div align='right'><a href='./backend/logoutbk.php'>Logout</a></div>";
    echo "<center> <a href='../index.php' style='font-size:50px; font-weight:bold;'>
    SANKALAN  2015
    
    </a></center>
    <div id='sub'>COMPILING INNOVATIONS</div>";   
    echo "<h1 align='center'> :::::::: Welcome ".$_SESSION['t_name']." ::::::::</h1>";
    echo "<center>";
    echo "<a href='./teampage.php'>Home</a>";
    require ("./backend/captainteambk.php");?>
    <center><h4>Team Status:&nbsp&nbsp&nbsp&nbsp<?php echo $status; if($inval=='y'){?><br>&nbsp&nbsp&nbsp&nbsp&nbsp<span>(Add at least one more member to activate your team)</span><?php }?></h4></center>
<?php
    if($flag==-2)
	{
		echo "<h4>No Activated Team Member!<br>Activate at least 2 members to assign Captain.</h4>"; ?>
		<div id="foot1">
			<div style="color:#f3b602">For any queries related to registration/login, you may contact us at webmaster@sankalan.info</div>
			<div style="color:#ffa500">Copyright &copy; 2015 |  Department of Computer Science, University of Delhi</div>
		</div>
	<?php
	}
	else if($flag==-3)
	{
		echo "<h4>Only 1 Activated Team Member!<br>Activate at least 1 more members to assign Captain.</h4>"; ?>
		<div id="foot1">
			<div style="color:#f3b602">For any queries related to registration/login, you may contact us at webmaster@sankalan.info</div>
			<div style="color:#ffa500">Copyright &copy; 2015 |  Department of Computer Science, University of Delhi</div>
		</div>
	<?php 
	}
    else if($flag>0)
    {
    	if($cap==1)
    	{
    		echo "<script type='text/javascript' src='src/captc.js'></script>";
    		echo "<h2> Change Team Captain</h2>";?>
    		<center><h4>Team Captain:&nbsp&nbsp&nbsp&nbsp<?php echo $cap_name?></h4></center>
    	<?php
    	}
    	if($cap==0)
    	{
    		echo "<script type='text/javascript' src='src/capt.js'></script>";
    		echo "<h2> Assign Team Captain</h2>";
    	}
    	$x=0;
?>
		<form method="post"name="a_form"id="a_form">
		<table >
		<tr>
			<th>Name</th>
			<th>Gender</th>
			<th>Email</th>
			<th>College</th>
			<th>Mobile</th>
			<th>Accommodation</th>
			<th>Action</th>
		</tr>
		<?php
		while($row = mysqli_fetch_array($result))
		{
			$fname = $row['fname'];
			$lname = $row['lname'];
			$gen=((strcmp($row['gender'],"m")==0)?"Male":"Female");
			$email = $row['email'];
			$clg = $row['college'];
			$mob = $row['mobile'];
			$acc = $row['accomodation'];
			$id =$row['id'];
		?>
			<tr>
				<td><?php echo htmlspecialchars($fname." ".$lname)?></td>
				<td><?php echo htmlspecialchars($gen)?></td>
				<td><span id='<?php echo$x?>'><?php echo htmlspecialchars($email)?></span></td>
				<td><?php echo htmlspecialchars($clg)?></td>
				<td><?php echo htmlspecialchars($mob)?></td>
				<td><?php echo ucfirst(htmlspecialchars($acc))?></td>
				<td>
					<?php if($row['captain']=='yes'){?><button readonly disabled class='cap'type='button'id='captain<?php echo$x?>'>Assign Captain</button>
					<?php }else {?><button style="border:3px solid #38b0de; background: #38b0de;" readonly class='cap'type='button'id='captain<?php echo$x?>'>Assign Captain</button><?php }?>
					<span class='u'hidden id='u<?php echo$x?>' unselectable='true' contenteditable='false'><?php echo $id ?></span>
				</td>
				
				
			</tr>
	<?php
		$x++;
		}
	?>
		</table>
		</form>
	<div id="foot1">
<div style="color:#f3b602">For any queries related to registration/login, you may contact us at webmaster@sankalan.info</div>

<div style="color:#ffa500">Copyright &copy; 2015 |  Department of Computer Science, University of Delhi</div>
</div>
	<?php
    }
    else
    {
    	echo "<h4> Sorry for the incovenience! <a href='./activateteam.php'>Please try again</a></h4>"; ?>
		<div id="foot1">
			<div style="color:#f3b602">For any queries related to registration/login, you may contact us at webmaster@sankalan.info</div>
			<div style="color:#ffa500">Copyright &copy; 2015 |  Department of Computer Science, University of Delhi</div>
		</div>
	<?php 

    }
    echo "</center>";
}
else
{
	//echo "<meta http-equiv='refresh' content='0;url=./index.php'>";
	echo "<meta http-equiv='refresh' content='0;url=http://www.sankalan.info'>";
}
?>