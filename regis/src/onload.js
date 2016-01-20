$( document ).ready(function() {

  
  $("#button1").css("opacity","0.6");
  Recaptcha.reload();
  Recaptcha.focus_response_field = function(){return false;};
 $("#tname").focus();  
 $("#info").css("visibility","hidden");

  $("#button1").click(function() {

        $("#login_form").css("visibility","visible");
        $("#info").css("visibility","hidden");
        $("#register_form").css("visibility","hidden");
        $("#recaptcha_sank").css("visibility","visible");
        document.getElementById("login_recaptcha_sank").appendChild(document.getElementById("recaptcha_sank"));
        $(this).css("opacity","0.6");
        $("#button2").css("opacity","1");
        $("#button2").prop("disabled",false);
        $(".add_field_button").css("visibility","hidden");
        Recaptcha.reload();
        Recaptcha.focus_response_field = function(){return false;};
        $("#tname").focus();
        document.getElementById("login_form").reset();
        $(".input_fields_wrap").empty();  
  });

    var first=0;

  $("#button2").click(function() {
  $("#info").css("visibility","visible");
    $("#register_form").css("visibility","visible");
    $("#login_form").css("visibility","hidden");
    $("#recaptcha_sank").css("visibility","visible");
    document.getElementById("regis_recaptcha_sank").appendChild(document.getElementById("recaptcha_sank"));
    
    $(this).css("opacity","0.6");
    $("#button1").css("opacity","1");
    $(".add_field_button").css("visibility","visible");
    document.getElementById("register_form").reset();
    $(".input_fields_wrap").append('<div class="input_fields"><label>First Name:</label><input type="text" size="14" name="m_fname[]" id="m_fname[]" placeholder="first name"><label>Last Name:</label><input type="text" size="14" name="m_lname[]" id="m_lname[]" placeholder="last name"><label>Gender:</label> <input type="radio" name="m_gender0"  id="m_gender0" value="m"  class="gender" checked>Male</input><input type="radio" name="m_gender0" id="m_gender0" value="f"  class="gender" >Female</input><label>Email-ID:</label><input type="text" size="14" name="m_email[]" id="m_email[]"placeholder="abc@ayz.xyz"><br><label>Mobile Number:</label><input  type="tel" size="14" name="m_mobile[]" id="m_mobile[]" maxlength="10" placeholder="mobile number"><label>College Name:</label><input  type="text" size="14" name="m_clg[]" id="m_clg[]"placeholder="college name"><label>Accommodation:</label> <select disabled name="m_acc[]" id="m_acc[]"><option value="no" selected>No</option><option value="yes">Yes</option></select></div>'); //add input box
    $(".input_fields_wrap").append('<div class="input_fields"><label>First Name:</label><input type="text" size="14" name="m_fname[]" id="m_fname[]" placeholder="first name"><label>Last Name:</label><input type="text" size="14" name="m_lname[]" id="m_lname[]" placeholder="last name"><label>Gender:</label> <input type="radio" name="m_gender1"  id="m_gender1" value="m"  class="gender" checked>Male</input><input type="radio" name="m_gender1" id="m_gender1" value="f"  class="gender" >Female</input><label>Email-ID:</label><input type="text" size="14" name="m_email[]" id="m_email[]"placeholder="abc@ayz.xyz"><br><label>Mobile Number:</label><input  type="tel" size="14" name="m_mobile[]" id="m_mobile[]" maxlength="10" placeholder="mobile number"><label>College Name:</label><input  type="text" size="14" name="m_clg[]" id="m_clg[]"placeholder="college name"><label>Accommodation:</label> <select disabled name="m_acc[]" id="m_acc[]"><option value="no" selected>No</option><option value="yes">Yes</option></select></div>');       

    x=1;
     $(this).prop("disabled",true);
    Recaptcha.reload();
    Recaptcha.focus_response_field = function(){return false;};
    $("#r_tname").focus();
  });

   

  
 
 $("#clear").click(function() {
    

Recaptcha.reload();
Recaptcha.focus_response_field = function(){return false;};
               $("#tname").focus();
     });

$("#r_clear").click(function() {
   

Recaptcha.reload();
Recaptcha.focus_response_field = function(){return false;};
$("#r_tname").focus();
               
     });
   
       var max_fields      = 5; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x ; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="input_fields"><label>First Name:</label><input type="text" size="14" name="m_fname[]" id="m_fname[]" placeholder="first name"><label>Last Name:</label><input type="text" size="14" name="m_lname[]" id="m_lname[]" placeholder="last name"><label>Gender:</label> <input type="radio" name="m_gender'+x+'"  id="m_gender'+x+'" value="m"  class="gender" checked>Male</input><input type="radio" name="m_gender'+x+'" id="m_gender'+x+'" value="f"  class="gender" >Female</input><label>Email-ID:</label><input type="text" size="14" name="m_email[]" id="m_email[]"placeholder="abc@ayz.xyz"><br><label>Mobile Number:</label><input  type="tel" size="14" name="m_mobile[]" id="m_mobile[]" maxlength="10" placeholder="mobile number"><label>College Name:</label><input  type="text" size="14" name="m_clg[]" id="m_clg[]"placeholder="college name"><label>Accommodation:</label> <select disabled name="m_acc[]" id="m_acc[]"><option value="no" selected>No</option><option value="yes">Yes</option></select>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="button" class="remove_field" value="Remove member"></div>'); //add input box
        }
        if(x==max_fields)
        {
          $(".add_field_button").css("visibility","hidden");
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); 
      
        x--;
        $(".add_field_button").css("visibility","visible");
    })
});

   
   
   
