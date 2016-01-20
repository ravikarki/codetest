$(document).ready(function(){
	$(".act").bind('change',function(){"location.href='./activateteam.php'"});
    $(".u").bind('change',function(){"location.href='./activateteam.php'"});
});
$(function(){
    $.ajaxSetup({cache: false});
    $(".act").click(function(e)
    {
    	var tbi= ($(this).attr('id')).substr(8,1);
    	e.preventDefault();
    	$flag=correct(tbi);
    	if($flag==true)
    	{
    		var act=document.getElementById("activ_"+tbi);
    		var u=document.getElementById("u"+tbi);
    		var em=document.getElementById(tbi);
    		dataString = "code="+act.value+"&em="+em.innerHTML+"&u="+u.innerHTML+"tbi="+tbi;
    	
    		$.ajax(
        	{
        	type: "POST",   
            url: "./backend/activatebk.php",   
            data: dataString,   
            success: function(html)
            {
            	if(html=='0')
            	{
            		alert("Successfully Activated!");
            		window.location="./activateteam.php";
            	}
            	else if(html=='1')
                {
                    alert("Some error occurred!\n      We regret the inconvenience caused. Please try after sometime.");
                    window.location="./teampage.php";
                }             		
            	else if(html=='2'){                    
            		alert("Some error occurred!\n      We regret the inconvenience caused. Please try again.");
                }            	
            	else if(html=='4')
            	{	alert("Please enter the correct activation code");
            		act.value="";
            		act.focus();
            	}
                else if(html=='5')
                    window.location="../index.php";
            
            	else
            		alert("Some error occurred!\n      We regret the inconvenience caused. Please try again.");
            },
        	});
    	}
    	return false;
    });
    $(".rmv").click(function(e)
    {
    	var tbi= ($(this).attr('id')).substr(4,1);
    	if(confirm("Are you sure you want to remove this member ? \n Click 'Ok' to proceed. "))
    	{	
    		e.preventDefault();
    		var u=document.getElementById("u"+tbi);    	
    		var em=document.getElementById(tbi);    		
    		dataString="em="+em.innerHTML+"&u="+u.innerHTML+"tbi="+tbi;    		
    		$.ajax(
        	{
        	type: "POST",   
            url: "./backend/removembk.php",   
            data: dataString,   
            success: function(html)
            {
            	if(html=='0')
                {
                    alert("Successfully Removed!");
                    window.location="./activateteam.php";
                }
                else if(html=='1')
                {
                    alert("Some error occurred!\n      We regret the inconvenience caused. Please try after sometime.");
                    window.location="./teampage.php";
                }
                else if(html=='2'){                    
                    alert("Some error occurred!\n      We regret the inconvenience caused. Please try again.");
                }
                else if(html=='5')
                    window.location="../index.php";
                else if(html=='6')
                {
                    alert("All members of the team have been removed!\nThe team has been deleted!\n\nYou will have to register your team again.\nThank you for your involvement with Sankalan'15!")
                    window.location="./backend/logoutbk.php";
                }
                else if(html=='7')
                {
                    alert("The team has only 1 member left!\n The team has been deactivated!\n\n Add at least 1 more member to activate it again.");
                    window.location="./teampage.php";
                }
            	else
            		alert("Some error occurred!\n      We regret the inconvenience caused. Please try again.");
            },
        	});
    	}
    	return false;
    });
});   		
    	