$(function(){
    $.ajaxSetup({cache: false});
    $("#sendMsg").click(function()
    {
        $("#popup").css("visibility","hidden");
        var email=$('#email_id').val();
        var message = $('#messageText').val();
        var dataString = 'email=' + email +'&message='+message;

        $.ajax(
        {
            type: "POST",   
            url: "./scripts/feedback.php",   
            data: dataString,   
            success: function(html)
            {
                //alert(html);
                if(html=='0')
                {                    
                    alert("Thanks for your valuable feedback!\n        Your thoughts will help us to improve.");
                    hidePopup();
                    //window.location.assign("./index.html");
                }
                else if(html=='1')
                {
                    alert("Please enter a valid email!");                
                    document.getElementById("email_id").value="";
                    showPopup();
                    document.getElementById("email_id").focus();
                }
                else if(html=='2')
                {
                    alert("Please enter a message!");
                    document.getElementById("messageText").value="";
                    showPopup();
                    document.getElementById("messageText").focus();
                }
                else
                {
                    alert("Some error occurred!\n      We regret the inconvenience caused. Please try again.");
                    document.getElementById("email_id").value="";
                    showPopup();
                    document.getElementById("email_id").focus();
                    document.getElementById("messageText").value="";
                }
            },
        });
        //return false;
    });
});

