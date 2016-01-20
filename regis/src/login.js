$(function(){

    $.ajaxSetup({cache: false});
    $("#login").click(function(e)
    {
        e.preventDefault();
        $check=validateForm2();
        if($check==true)
        {
            var tname=$('#tname').val();
            var pass = $('#pass').val();
	    	var recaptcha_challenge_field = Recaptcha.get_challenge();
            var recaptcha_response_field =Recaptcha.get_response();
            var dataString = 'tname=' + tname +'&pass='+pass+"&recaptcha_response_field="+recaptcha_response_field+"&recaptcha_challenge_field="+recaptcha_challenge_field;

            $.ajax({
	            type: "POST",   
	            url: "backend/loginbk.php",   
	            data: dataString,   
	            success: function(html)
	            {
	                if(html=='0')
	                {                    
	                    alert("Successful Login:: "+tname);
	                    window.location = "./teampage.php";
	                }
	                else if(html=='1')
	                {
	                    alert("Some error occurred!\n      We regret the inconvenience caused. Please try again.");
	                    Recaptcha.reload();
	                    
	                }
	                else if(html=='2')
	                {
	                    alert("Team name not registered!\n      Please enter a registered team name!");
	                    Recaptcha.reload();
	                    
	                    document.forms["login_form"]["tname"].value="";
	                    document.forms["login_form"]["pass"].value="";
	                    $('#tname').focus();
	                }
	                else if(html=='3')
	                {
	                    alert("Wrong Password!\n      Please enter the correct password!");
	                    Recaptcha.reload();
	                    
	                    document.forms["login_form"]["pass"].value="";
	                    $('#pass').focus();
	                }
	                else if(html=='4')
	                {
	                    alert("Please enter Team name and password!");
	                    Recaptcha.reload();
	                    
	                    $('#tname').focus();
	                }
	                else if(html=='5')
	                {
	                    alert("Incorrect CAPTCHA answer!\n      Please enter the correct answer!");
	                    Recaptcha.reload();
	                    document.forms["login_form"]["pass"].value="";
	                    $('#pass').focus();
	                }
	                else
	                {
	                    //alert(html);
	                    alert("Some error occurred!\n      We regret the inconvenience caused. Please try again.");
	                    Recaptcha.reload();
	                    document.forms["login_form"]["tname"].value="";
	                    document.forms["login_form"]["pass"].value="";
	                    $('#tname').focus();
	                    
	                }
	            },
            });
        }
        
        return false;
        
    });
});