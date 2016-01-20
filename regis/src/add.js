$(function(){
    $.ajaxSetup({cache: false});
    $("#add").click(function(e)
    {
    	e.preventDefault();
    	$flag=validate();
    	if($flag)
    	{
    		var m1=document.getElementById("m_fname");
		    var m2=document.getElementById("m_lname");
		    var m3=document.getElementById("m_email");
		    var m4=document.getElementById("m_mobile");
		    var m5=document.getElementById("m_clg");
		    //var m6=document.getElementById("m_acc");
            var m7=document.getElementsByName("m_gender");
            $gender = gender();
			var dataString   = "m_fname="+m_fname.value + "&m_lname="+m_lname.value + "&m_gender="+$gender + "&m_email="+m_email.value + "&m_mobile="+m_mobile.value + "&m_clg="+m_clg.value;
    		
    		$.ajax(
        	{
            	type: "POST",   
            	url: "./backend/addbk.php",   
            	data: dataString,   
            	success: function(html)
            	{
            		if(html=='0')
            		{
            			alert("Successfully Added!\n Use the activation code mailed to activate.");
            			window.location="./teampage.php";
            		}
            		else if(html=='1')
                    	alert("Some error occurred!\n      We regret the inconvenience caused. Please try again.");
                    else if(html=='2')
                	{
                    	alert("This email ID already belongs to some team!\n      Please use any other email ID.");
                    	m3.value="";
                    	m3.focus();
                    }
                    else if(html=='3')
                    	alert("Some details are missing!\n      Please enter all the details.");
                    else if(html=='4')
                	{
                    	alert("This email ID is invalid!\n      Please provide a valid email ID.");
                    	m3.value="";
                    	m3.focus();
                    }
                    else if(html=='5')
                    	alert("Team Size is already maximum!\n To add a new member, first remove an old member.");
                    else if(html=='6')
                    	window.location="../index.php";
                    else if(html=='11')
                    {
                      alert("Names should have alphabets only!");                      
                    }
                    else
                    	alert("Some error occurred!\n      We regret the inconvenience caused. Please try again.");
            	},
            });
    	}
    	return false;
    });
});