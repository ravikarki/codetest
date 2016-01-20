<?php
include './backend/dbConn.inc';
if(isset($_SESSION['logged_in'])&&isset($_SESSION['t_id'])&&isset($_SESSION['t_name']))
{
	$team=$_SESSION['t_id'];
	$sql="SELECT `invalid`,`capt_asgnd`,`captain`,`tsize`,`max_tsize` FROM team WHERE `team_id`='$team'";
	$result=mysqli_query($conn,$sql);
	if(!$result)
	{
		echo "<h4> Sorry for the incovenience! <a href='./teampage.php'>Please try again</a></h4>";
		return;
	}
	else if(mysqli_num_rows($result)==0)
	{	
		session_destroy();
		echo "<meta http-equiv='refresh' content='0;url=./index.php'>";
	}
	else
	{
		$rs = mysqli_fetch_array($result);
		$inval= $rs['invalid'];
		$cnfr= $rs['tsize'];
		$total= $rs['max_tsize'];

	}
	$sql = "SELECT `fname`,`lname`,`gender`,`email`,`college`,`mobile`,`accomodation`,`activated` FROM user WHERE `team_id`='$team' AND `invalid`='no'";
	$result=mysqli_query($conn,$sql);
	if(!$result)
	{
		echo "<h4> Sorry for the incovenience! <a href='./teampage.php'>Please try again</a></h4>";
		return;
	}
	$flag = mysqli_num_rows($result);
	if($flag==0)
	{	
		$flag=-1;
		return;
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
			echo "<h4> Sorry for the incovenience! <a href='./teampage.php'>Please try again</a></h4>";
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
	$sql = "SELECT `fname` FROM user WHERE `team_id`='$team' AND `activated`='yes' AND `invalid`='no'";
	$res=mysqli_query($conn,$sql);
	if(!$res)
	{
		echo "<h4> Sorry for the incovenience! <a href='./teampage.php'>Please try again</a></h4>";
		return;
	}
	$count = mysqli_num_rows($res);
	?>
	<table>
	<tr><td id="td1">Team Status</td><td id="td2">:<?php echo $status; if($inval=='y'){?><br><span>(Add at least one more member to activate your team)</span><?php }?></td></tr>
	<tr><td id="td1">Team Captain</td><td id="td2">:<?php echo $cap_name?></td></tr>
	<tr><td id="td1">Total number of members</td><td id="td2">:<?php echo $flag?></td></tr>
	<tr><td id="td1">Number of activated members</td><td id="td2">:<?php echo $count?></td></tr>
	</table>
	<table >
	<tr>
		<th>Name</th>
		<th>Gender</th>
		<th>Email</th>
		<th>College</th>
		<th>Mobile</th>
		<th>Accommodation</th>
		<th>Activated</th>
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
  		$act = $row['activated'];
  	?>
  	<tr>
  		<td><?php echo htmlspecialchars($fname." ".$lname)?></td>
  		<td><?php echo htmlspecialchars($gen)?></td>
  		<td><?php echo htmlspecialchars($email)?></td>
  		<td><?php echo htmlspecialchars($clg)?></td>
  		<td><?php echo htmlspecialchars($mob)?></td>
  		<td><?php echo ucfirst(htmlspecialchars($acc))?></td>
  		<td><?php echo ucfirst(htmlspecialchars($act))?></td>
  	</tr>
	<?php
	}
	?>
 	</table>
<?php
}
else
{
	//echo "<meta http-equiv='refresh' content='0;url=./index.php'>";
	echo "<meta http-equiv='refresh' content='0;url=http://www.sankalan.info'>";
}
?>