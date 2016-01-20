$(document).ready(function(){
    $(".u").bind('change',function(){"location.href='./captainteam.php'"});
});
$(function(){
    $.ajaxSetup({cache: false});
    $(".cap").click(function(e)
    {
    	var tbi= ($(this).attr('id')).substr(7,1);
    	if(confirm("Are you sure you want to assign this member as captain? \n Click 'Ok' to proceed. "))
    	{	
    		e.preventDefault();
    		var u=document.getElementById("u"+tbi);
    		var em=document.getElementById(tbi);
    		dataString="em="+em.innerHTML+"&u="+u.innerHTML+"&tbi="+tbi+"&stat=n";
    		$.ajax(
        	{
        	type: "POST",   
            url: "./backend/captainbk.php",   
            data: dataString,   
            success: function(html)
            {
            	if(html=='0')
                {
                    alert("Captain Successfully Assigned!");
                    window.location="./teampage.php";
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
                else
                    alert("Some error occurred!\n      We regret the inconvenience caused. Please try again.");            	
            },
        	});
    	}
    	return false;
    });
});