<?php
session_start();
if(isset($_SESSION['logged_in'])&&isset($_SESSION['t_id'])&&isset($_SESSION['t_name']))
{
  echo '<link rel="shortcut icon" href="./images/favicon.ico">';
  echo '<meta content="Sankalan 2015, Annual technical festival of Department of Computer Science, University of Delhi, Event Details" name="description">';
  echo '<meta content="events, event list, Sankalan, DUCSS, DUCS, Delhi University Computer Science Society, Sankalan 2015, annual fest, Department of Computer Science, University of Delhi, Annual fest of DUCS, Conference Centre, North Campus" name="keywords">';
  echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
  echo '<title> Sankalan 2015 - Annual Technical Festival of Department of Computer Science, University of Delhi</title>  ';
  echo "<script type='text/javascript' src='src/jquery-1.10.2.min.js'></script>";
  echo "<script type='text/javascript' src='src/addchk.js'></script>";
  echo '<link rel="stylesheet" href="styles/form.css" />';
  echo "<script type='text/javascript' src='src/add.js'></script>";
  echo "<div align='right'><a href='./backend/logoutbk.php'>Logout</a></div>";
   echo "<center> <a href='../index.php' style='font-size:50px; font-weight:bold;'>
    SANKALAN  2015
    </a></center>
    <div id='sub'>COMPILING INNOVATIONS</div>";    
  echo "<h1 align='center'> :::::::: Welcome ".$_SESSION['t_name']." ::::::::</h1>";
  echo "<center>";
  echo "<h2> Add Team Members</h2>";
  echo "<a href='./teampage.php'>Home</a>";
  echo "<h3> ACCOMMODATION HAS BEEN CLOSED!</h3>";
  echo "<h3> Member Details</h3>";
?>
<form action="" method="post" id="add_form" name="add_form" > 
  <table center>
      
      <tr><td id="td"><label>First Name:</label></td><td><input type="text" name="m_fname" id="m_fname" size="14" placeholder="first name" autofocus></td></tr>
      <tr><td id="td"><label>Last Name:</label></td><td><input type="text" name="m_lname" id="m_lname" size="14" placeholder="last name"></td></tr>
      <tr><td id="td"><label>Gender:</label></td><td><input class="gender" type="radio" name="m_gender" value="m" checked>Male</input>&nbsp&nbsp<input class="gender" type="radio" name="m_gender" value="f">Female</input></td></tr>
      <tr><td id="td"><label>Email-ID:</label></td><td><input type="text" name="m_email" id="m_email"size="14" placeholder="abc@ayz.xyz"><td></tr>
      <br><tr><td></td></tr>
      <tr><td id="td"><label>Mobile Number:</label></td><td><input  type="tel" name="m_mobile" id="m_mobile" size="14"maxlength="10" placeholder="mobile number"></td></tr>
      <tr><td id="td"><label>College Name:</label></td><td><input  type="text" name="m_clg" id="m_clg"size="14" placeholder="college name"></td></tr>
      <tr><td id="td"><label>Accommodation:</label></td><td><select disabled name="m_acc" id="m_acc">
        <option value="no" selected>No</option>
        <option value="yes">Yes</option>
      </select></td>
      <td></td></tr><tr><td></td><td></td></tr><tr><td></td><td></td></tr><tr><td></td><td></td></tr>
    <tr><td><center><input type="reset" name="clear" value="  Clear  " style="margin-top:0px;" id="clear"></center></td>
    <td><center><input type="submit" name="add" value="   Add   " style="margin-top:0px;" id="add"></center></td></tr>
  </table>
</form>
<div id="foot2">
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