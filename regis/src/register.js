$(function(){
    $.ajaxSetup({cache: false});
    $("#register").click(function(e)
    {
        e.preventDefault();
        $check=validateForm1();
        if($check==true)
        {
        	var tname=$('#r_tname').val();
        	var pass = $('#r_pass').val();
        	var cpass = $('#r_cpass').val();
          var recaptcha_challenge_field = Recaptcha.get_challenge();
          var recaptcha_response_field =Recaptcha.get_response();
        	var dataString = "tname=" + tname +"&pass="+pass +"&cpass="+ cpass+"&recaptcha_response_field="+recaptcha_response_field+"&recaptcha_challenge_field="+recaptcha_challenge_field;
        	var m1=document.forms["register_form"]["m_fname[]"];
		      var m2=document.forms["register_form"]["m_lname[]"];
		      var m3=document.forms["register_form"]["m_email[]"];
		      var m4=document.forms["register_form"]["m_mobile[]"];
		      var m5=document.forms["register_form"]["m_clg[]"];
		      //var m6=document.forms["register_form"]["m_acc[]"];
		    for(i=0;i<m1.length;i++)
		    {
			    var m_fname  = m1[i].value;
			    var m_lname  = m2[i].value;
			    var m_email  = m3[i].value;
			    var m_mobile = m4[i].value;
			    var m_clg	 = m5[i].value;
			    //var m_acc	 = m6[i].value;
          var m_gender= gender();
          function gender()
          {
            var m7=document.getElementsByName("m_gender"+i);
            var gndr;
            var z=0;
            while(z<m7.length)
            {
              if(m7[z].checked)
              {
                gndr=m7[z].value;
                break;
              }
              z++;
            }
            return gndr;
          }
			    dataString   = dataString + "&m_fname"+i+"="+m_fname + "&m_lname"+i+"="+m_lname + "&m_gender"+i+"="+m_gender + "&m_email"+i+"="+m_email + "&m_mobile"+i+"="+m_mobile + "&m_clg"+i+"="+m_clg;
		    }
        	dataString = dataString + "&size="+i
        
        $.ajax(
        {
            type: "POST",   
            url: "./backend/registerbk.php",   
            data: dataString,   
            success: function(html)
            {
                if(html=='0')
                {                    
                    alert("Your team has been sucessfully registered!");
                    if(confirm("Do you want to login now? \n Click 'Ok' to proceed; or 'Cancel' to login later. "))
                      window.location="./index.php";
                    else
                      window.location="../index.php";

                }
                else if(html=='1')
                {
                    //alert(html);
                    alert("Some error occurred!\n      We regret the inconvenience caused. Please try again.");
                    Recaptcha.reload();
                    
                }
                else if(html=='2')
                {
                    alert("Team name already taken!\n      Choose a different team name.");
                    Recaptcha.reload();
                    
                    document.forms["register_form"]["r_tname"].value="";
                    $('#r_tname').focus();
                }
                else if(html=='3')
                {   
                    alert("Some details are missing!\n      Please enter all the details.");
                    
                    var first=0;
                    if(tname == null || tname == "")
                    {
                      $("#r_tname").css("border","3px solid red");
                      if(first==0)
                      {
                        $("#r_tname").focus();
                        first=1;
                      }
                    }
                    else
                    {
                      $("#r_tname").css("border","3px solid #acbfa5");  
                    }

                    if(pass == null || pass == "")
                    {
                      $("#r_pass").css("border","3px solid red");
                      if(first==0)
                      {
                        $("#r_pass").focus();
                        first=1;
                      }
                    }
                    else
                    {
                      $("#r_pass").css("border","3px solid #acbfa5");  
                    }

                    if(cpass == null || cpass == "")
                    {
                      $("#r_cpass").css("border","3px solid red");
                      if(first==0)
                      {
                        $("#r_cpass").focus();
                        first=1;
                      }
                    }
                    else
                    {
                      $("#r_cpass").css("border","3px solid #acbfa5");  
                    }
                    var x;
                    for(x=0;x<m1.length;x++)
                    {
                      if(m1[x].value == null||m1[x].value == "")
                      {
                        if(first==0)
                        {
                          m1[x].focus();
                          first=1;  
                        }
                        m1[x].style.borderColor="red";
                      }
                      else
                      {
                        m1[x].style.borderColor="#acbfa5";
                      }
                      
                      if(m2[x].value == null||m2[x].value == "")
                      {
                        if(first==0)
                        {
                          m2[x].focus();
                          first=1;  
                        }
                        m2[x].style.borderColor="red";       
                      }
                      else
                      {
                        m2[x].style.borderColor="#acbfa5";
                      }

                      if(m3[x].value == null||m3[x].value == "")
                      {
                        if(first==0)
                        {
                          m3[x].focus();
                          first=1;  
                        }
                        m3[x].style.borderColor="red";       
                      }
                      else
                      {
                        m3[x].style.borderColor="#acbfa5";
                      }

                      if(m4[x].value == null||m4[x].value == "")
                      {
                        if(first==0)
                        {
                          m4[x].focus();
                          first=1;  
                        }
                        m4[x].style.borderColor="red";       
                      }
                      else
                      {
                        m4[x].style.borderColor="#acbfa5";
                      }

                      if(m5[x].value == null||m5[x].value == "")
                      {
                        if(first==0)
                        {
                          m5[x].focus();
                          first=1;  
                        }
                        m5[x].style.borderColor="red";       
                      }
                      else
                      {
                        m5[x].style.borderColor="#acbfa5";
                      }
                    }
                    Recaptcha.reload();
                    
                }
                else if(html =='4')
                {
                    alert("One or all of the email addresses are invalid!\n      Please provide valid email addresses.");
                    var x;
                    var first=0;
                    for(x=0;x<m3.length;x++)
                    {
                      m3[x].value="";
                      if(first==0)
                      {
                        m3[x].focus();
                        first=1;
                      }
                    }
                    Recaptcha.reload();
                    
                }
                else if(html =='5')
                {
                    alert("All the email addresses should be unique!\n      Please provide valid email addresses.");
                    var x;
                    var first=0;
                    for(x=0;x<m3.length;x++)
                    {
                      m3[x].value="";
                      if(first==0)
                      {
                        m3[x].focus();
                        first=1;
                      }
                    }
                    Recaptcha.reload();
                    
                }
                else if(html=='6')
                {
                    alert("Some error occurred!\n      We regret the inconvenience caused. Please try after sometime.");
                    window.location="../index.php";
                }
                else if(html=='7')
                {
                      alert("Incorrect CAPTCHA answer!\n      Please enter the correct answer!");
                      Recaptcha.reload();
                }
                else if(html=='8')
                {
                  alert("Choose a Team name of length between 4 to 30 ");
                  Recaptcha.reload();
                  document.forms["register_form"]["r_tname"].value="";
                  $('#r_tname').focus();
                }
                else if(html=='9')
                {
                  alert("Password should be of minimum six characters");
                  Recaptcha.reload();
                  document.forms["register_form"]["r_pass"].value="";
                  document.forms["register_form"]["r_cpass"].value="";
                  $('#r_pass').focus();
                }
                else if(html=='10')
                {
                  alert("Password does not match");
                  Recaptcha.reload();
                  document.forms["register_form"]["r_pass"].value="";
                  document.forms["register_form"]["r_cpass"].value="";
                  $('#r_pass').focus();
                }
                else if(html=='11')
                {
                  alert("Names should have alphabets only!");
                  Recaptcha.reload();
                }
                else if((html=='40')||(html=='41')||(html=='42')||(html=='43')||(html=='44')||(html=='45'))
                {
                    var id=html-40;
                    var m=document.forms["register_form"]["m_email[]"];
                    var em=m[id].value;
                    alert("The email '"+em+"' is already registered with some other team!\n      Please use a different email ID.");                    
                    Recaptcha.reload();
                    m[id].value="";
                    m[id].focus();                    
                }
                else 
                {
                    //alert(html);
                    alert("Some error occurred!\n      We regret the inconvenience caused. Please try again.");
                    Recaptcha.reload();
                    
                }
            },
        });
		}
        return false;
    });
});