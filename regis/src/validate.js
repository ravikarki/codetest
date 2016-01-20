var test=0;
function validateForm1() {
  var a = document.forms["register_form"]["r_tname"].value;
  var b = document.forms["register_form"]["r_pass"].value;
  var c = document.forms["register_form"]["r_cpass"].value;
  var m1 = document.forms["register_form"]["m_fname[]"];
  var m2 = document.forms["register_form"]["m_lname[]"];
  var m3 = document.forms["register_form"]["m_email[]"];
  var m4 = document.forms["register_form"]["m_mobile[]"];
  var m5 = document.forms["register_form"]["m_clg[]"];
  //var m6 = document.forms["register_form"]["m_acc[]"];
  var x;
  
  if (a== null || a== "") {
        alert("Team name must be filled out");
        
         Recaptcha.reload();
         Recaptcha.focus_response_field = function(){return false;};
          document.forms["register_form"]["r_tname"].focus();
         
        return false;
  }

   else if(a.length < 4 || a.length > 30)
{
      alert("Choose a Team name of length between 4 to 30 ");
      document.forms["register_form"]["r_tname"].value="";
      
      Recaptcha.reload();
      Recaptcha.focus_response_field = function(){return false;};
      document.forms["register_form"]["r_tname"].focus();
      
      return false;
}
  else  if (b == null || b == "") {
        alert("Password must be filled out");
        
      Recaptcha.reload();
      Recaptcha.focus_response_field = function(){return false;};
      document.forms["register_form"]["r_pass"].focus();
        return false;
  }
  
  else if (/\s/.test(b)) {
        alert("Password should not have spaces");
        document.forms["register_form"]["r_pass"].value="";
        document.forms["register_form"]["r_cpass"].value="";
       
        
      Recaptcha.reload();
      Recaptcha.focus_response_field = function(){return false;};
       document.forms["register_form"]["r_pass"].focus();
      
        return false;    
  }

  else  if (b.length<6) {
        alert("Password should be of minimum six characters");
        document.forms["register_form"]["r_pass"].value="";
        document.forms["register_form"]["r_cpass"].value="";
        
        
        Recaptcha.reload(); 
        Recaptcha.focus_response_field = function(){return false;};
        document.forms["register_form"]["r_pass"].focus();
                 
          return false;
  }
  

  
  else  if (c == null || c == "") {
        alert("Confirm password field must be filled out");
       
         Recaptcha.reload();
         Recaptcha.focus_response_field = function(){return false;};
          document.forms["register_form"]["r_cpass"].focus();
        return false;
  }
  
  else if (b.length!=c.length) {
        alert("Password does not match");
        document.forms["register_form"]["r_pass"].value="";
        document.forms["register_form"]["r_cpass"].value="";
        

        Recaptcha.reload();
        Recaptcha.focus_response_field = function(){return false;};
        document.forms["register_form"]["r_pass"].focus();
        
        return false;
  }
  
  else if (b.length==c.length) {
        var n=b.localeCompare(c);
        if(n!=0)
        {
          alert("Password does not match");
          document.forms["register_form"]["r_pass"].value="";
          document.forms["register_form"]["r_cpass"].value="";
          
           Recaptcha.reload();
           Recaptcha.focus_response_field = function(){return false;};
           document.forms["register_form"]["r_pass"].focus();
          return false;
        }
  }
 
 var x;
  for(x=0;x<m1.length;x++)
  {
    if(m1[x].value == null||m1[x].value == "")
    {
       alert("First name must be filled out");
      
    Recaptcha.reload();
    Recaptcha.focus_response_field = function(){return false;};
     m1[x].focus();
    
    return false;
    }
    if(m1[x].value.length>15)
    {
      alert("First name should not contain more than 15 characters.");
      Recaptcha.reload();
      Recaptcha.focus_response_field = function(){return false;};
      m1[x].value="";
     m1[x].focus();
    return false;
    }

    if (/[0-9!@#$%^&*()_+\-=\s\[\]{};':"\\|,.<>\/?]/.test(m1[x].value)) 
    {
       alert("First name should contain alphabets only.");
     
    Recaptcha.reload();
    Recaptcha.focus_response_field = function(){return false;};
    m1[x].value="";
     m1[x].focus();
    
    return false;
    }
    if(m2[x].value == null||m2[x].value == "")
    {
      alert("Last name must be filled out");
     
    Recaptcha.reload();
    Recaptcha.focus_response_field = function(){return false;};
     m2[x].focus();
    return false;
    }

   if(m2[x].value.length>15)
    {
      alert("Last name should not contain more than 15 characters.");
     m2[x].value="";
     
    Recaptcha.reload();
    Recaptcha.focus_response_field = function(){return false;};
    m2[x].focus();
    
    return false;
    }

    if (/[0-9!@#$%^&*()_+\-=\s\[\]{};':"\\|,.<>\/?]/.test(m2[x].value)) 
    {
       alert("Last name should contain alphabets only.");
     
    Recaptcha.reload();
    Recaptcha.focus_response_field = function(){return false;};
    m2[x].value="";
     m2[x].focus();
    
    return false;
    }

    if(m3[x].value == null||m3[x].value == "")
    {
     alert("Email id must be filled out");
     
     Recaptcha.reload();
     Recaptcha.focus_response_field = function(){return false;};
     m3[x].focus();
    return false;
    }

    if (/\s/.test(m3[x].value))
     {
        alert("Email-ID should not have spaces");
        m3[x].value="";
        
    Recaptcha.reload();
    Recaptcha.focus_response_field = function(){return false;};
    m3[x].focus();
    return false;
    }
    
    if(m3[x].value.length>30)
    {
      alert("Email ID should not contain more than 30 characters.");
     m3[x].value="";
     
    Recaptcha.reload();
    Recaptcha.focus_response_field = function(){return false;};
    m3[x].focus();
    return false;
    }

    var atpos = m3[x].value.indexOf("@");
    var dotpos = m3[x].value.lastIndexOf(".");
    if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=m3[x].value.length)
    {
      alert("Not a valid e-mail address");
        m3[x].value=""; 
        
       Recaptcha.reload(); 
       Recaptcha.focus_response_field = function(){return false;};
       m3[x].focus();    
        return false;        
      
    }
    if(m4[x].value == null||m4[x].value == "")
    {
      alert("Contact number must be filled out");
      
    Recaptcha.reload();
    Recaptcha.focus_response_field = function(){return false;};
    m4[x].focus();
    return false;
    }
    
     if(/^\d+$/.test(m4[x].value))
      {
      }
     else{
          alert("Contact number should not contain alphabets");
      m4[x].value="";
     
     Recaptcha.reload();
     Recaptcha.focus_response_field = function(){return false;};
      m4[x].focus();
     return false;
    }
    if(m4[x].value.length < 10)
    {
      alert("Invalid contact number");
      m4[x].value="";
      
      Recaptcha.reload();
      Recaptcha.focus_response_field = function(){return false;};
      m4[x].focus();
         return false;
    }
    if(m5[x].value == null||m5[x].value == "")
    {
      alert("College name must be filled out");
     
     Recaptcha.reload();
     Recaptcha.focus_response_field = function(){return false;};
      m5[x].focus();
    return false;
    }

    if(m5[x].value.length>45)
    {
      alert("College name should not contain more than 45 characters.");
     m5[x].value="";
    
    Recaptcha.reload();
    Recaptcha.focus_response_field = function(){return false;};
     m5[x].focus();
    return false;
    }

    if (/[0-9!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(m5[x].value)) 
    {
       alert("College name should contain alphabets only.");
     
    Recaptcha.reload();
    Recaptcha.focus_response_field = function(){return false;};
    m5[x].value="";
     m5[x].focus();
    
    return false;
    }
  }
var y;
var z;
var flag=0;
var first=0;
for(y=0;y<m3.length;y++)
{ 
  for(z=y+1;z<m3.length;z++)
      {
         var n=m3[y].value.localeCompare(m3[z].value);
         if(n==0)
         {
          flag=1;
          m3[z].value="";
          if(first==0)
          {
            m3[z].focus();
            first=1;
          }
         }
         var pos1=m3[y].value.indexOf("@");
         var pos2=m3[z].value.indexOf("@");
         var str1=m3[y].value.substring(0,pos1) + m3[y].value.substring(pos1+1,m3[y].value.length).toLowerCase();
         var str2=m3[z].value.substring(0,pos2) + m3[z].value.substring(pos2+1,m3[z].value.length).toLowerCase();

         if(str1==str2)
        {
          flag=1;
          m3[z].value="";
          if(first==0)
          { 
            m3[z].focus();
            first=1;
          }
        }
      }
}

if(flag==1)
{
  alert("Email-ID for each member should be unique");
  Recaptcha.reload();
  Recaptcha.focus_response_field = function(){return false;};
  
  return false;
}
return true;
}
function validateForm2()
{
  var a = document.forms["login_form"]["tname"].value;
  var b = document.forms["login_form"]["pass"].value;
  if (a== null || a== "") {
        alert("Team name must be filled out");
         
         Recaptcha.reload();
         Recaptcha.focus_response_field = function(){return false;};
         document.forms["login_form"]["tname"].focus();
         
        return false;
  }

   else if(a.length < 4 || a.length > 30)
{
      alert("Please enter the correct team name!");
      document.forms["login_form"]["tname"].value="";
      
      Recaptcha.reload();
      Recaptcha.focus_response_field = function(){return false;};
      document.forms["login_form"]["tname"].focus();
      
      return false;
}
  else  if (b == null || b == "") {
        alert("Please enter the password!");
        
        Recaptcha.reload();
        Recaptcha.focus_response_field = function(){return false;};
        document.forms["login_form"]["pass"].focus();
        return false;
  }
  
  else if (/\s/.test(b)) {
        alert("Please enter the correct password!");
        document.forms["login_form"]["pass"].value="";
        
        Recaptcha.reload();
        Recaptcha.focus_response_field = function(){return false;};
        document.forms["login_form"]["pass"].focus();
        return false;    
  }

  else  if (b.length<6) {
        alert("Please enter the correct password!");
        document.forms["login_form"]["pass"].value="";
        
        Recaptcha.reload();   
               Recaptcha.focus_response_field = function(){return false;};
               document.forms["login_form"]["pass"].focus();
        return false;
  }
return true;
}