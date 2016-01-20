<?php
session_start();
if(isset($_SESSION['t_id']) && isset($_SESSION['t_name']) && isset($_SESSION['logged_in']))
{
  echo "<meta http-equiv='refresh' content='0;url=./teampage.php'>";
}
else
{
echo '<link rel="shortcut icon" href="./images/favicon.ico">';
?>
<hmtl>
<head>
<link rel="shortcut icon" href="./images/favicon.ico">
<meta content="Sankalan 2015, Annual technical festival of Department of Computer Science, University of Delhi, Event Details" name="description">
<meta content="events, event list, Sankalan, DUCSS, DUCS, Delhi University Computer Science Society, Sankalan 2015, annual fest, Department of Computer Science, University of Delhi, Annual fest of DUCS, Conference Centre, North Campus" name="keywords">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Sankalan 2015 - Annual Technical Festival of Department of Computer Science, University of Delhi</title>  
<link rel="stylesheet" href="styles/form.css" />
<script type="text/javascript" src="src/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="src/onload.js"></script>
<script async type="text/javascript" src="src/register.js"></script>
<script async type="text/javascript" src="src/validate.js"></script></head>
<script async type="text/javascript" src="src/login.js"></script>
<script type="text/javascript">
var RecaptchaOptions = {
theme : 'white'
//theme : 'red'
//theme : 'clean'
//theme : 'blackglass'
};
</script>
<style>
span {
    display: none;
  }
  </style>
<body>
  <div id="info" align='right'><a href="http://www.sankalan.info/downloads/registration.pdf" target="blank">How To Register</a></div>
  <center>
    <a href="../index.php" style="  font-size:50px; font-weight:bold;">
  SANKALAN  2015
    
    </a>
  </center>
  <div id="sub">COMPILING INNOVATIONS</div>
<center>
<div id="buttons">
<button id="button1"><b>LOGIN</b></button>
<button id="button2"><b>REGISTER NEW TEAM</b></button>
</div>
</center>
<form action="" method="post" name="login_form" id="login_form"> 
<center>
    <table >
        <tr><td id="td"><label><b>Team Name:</b></label></td><td><input required type="text" id="tname" name="tname" size="14" placeholder="team name"/></td></tr>
        <tr><td id="td"><label><b> Password:</b></label></td><td><input type="password" name="pass" id="pass"  size="14" required placeholder="password"></input></td></tr>
       
    </table>
  <div id="login_recaptcha_sank">
    <div id="recaptcha_sank">
    <center>
  <?php
     require_once('recaptchalib.php');
     $publickey = "6LfOcQETAAAAAAwFju-n1tf91s5eiTf6oL4Y1rk1";
     echo recaptcha_get_html($publickey);
  ?>
    </center>
    </div>
  </div>
     <input type="submit" name="login" value="    Login    " id="login">  
     <input type="reset" name="clear" value="    Clear    " style="margin-top:0px;" id="clear">
 
</center>


<div id="foot">
<div style="color:#f3b602">For any queries related to registration/login, you may contact us at webmaster@sankalan.info</div>

<div style="color:#ffa500">Copyright &copy; 2015 |  Department of Computer Science, University of Delhi</div>
</div>

</form>

<form action="" method="post" id="register_form" name="register_form" > 
<center>
<table>
<tr> <div id="green"><h2>ACCOMMODATION HAS BEEN CLOSED!!</h2> </div></tr>
<tr> <div id="green">(all fields are mandatory) </div></tr>
<tr ><div id="orange"><b>Team Details:</b></div></tr>
  <tr><td id="td"> <label><b>Team Name:</b></label></td><td><input required size="15" type="text" id="r_tname" name="r_tname" placeholder="(minimum 4 characters)"/></td></tr>
  <tr><td id="td"><label><b>Password:</b></label></td><td><input required size="15" type="password" name="r_pass" id="r_pass"  placeholder="(minimum 6 characters)"></input></td></tr>
  <tr><td id="td"><label><b>Confirm Password:</b></label></td><td><input  required size="15" type="password" name="r_cpass" id="r_cpass"  placeholder="confirm password"></input></td></tr>
</table></center>
<br>
  <center><table><td><div id="orange"><b>Member Details:</b></div></td></table></center><br>
  <div class="input_fields_wrap" >
    <div class="input_fields" >
      
    </div>
  </div>
  <div id="regis_recaptcha_sank"> </div>
  <div align='center'>
    <input type='button' readonly class="add_field_button" value="Add More Members">
    <input type="submit" name="register" value="    Register    " style="margin-top:0px;" id="register">  
    <input type="reset" name="clear" value="    Clear    " style="margin-top:0px;" id="r_clear">  
  </div>
 </center>
 <center>
 <div style="color:#f3b602">For any queries related to registration/login, you may contact us at webmaster@sankalan.info</div>

<div style="color:#ffa500">Copyright &copy; 2015 |  Department of Computer Science, University of Delhi</div>
</center>
</form>
</body>
</hmtl>
<?php
}
?>