$(document).ready(function(){
	$(".act").bind('change',function(){"location.href='./activateteam.php'"});
    $(".u").bind('change',function(){"location.href='./activateteam.php'"});
});
function correct(tbi)
{
    var act = document.getElementById("activ_"+tbi);
        if(act.value == null|| act.value == "")
        {
            alert("Please enter the activation code");
            act.focus();
            return false;
        }

        else if(act.value.length!=15)
    	{
    		alert("Please enter the correct activation code");
            act.value="";
            act.focus();
            return false;
    	}
    	else if(/^[a-zA-Z0-9]*$/.test(act.value) == false)
    	{
    		alert("Please enter the correct activation code");
            act.value="";
            act.focus();
            return false;
    	}
    	else
        	return true;
}