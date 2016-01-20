function validate()
{
	  var m1=document.getElementById("m_fname");
    var m2=document.getElementById("m_lname");
    var m3=document.getElementById("m_email");
    var m4=document.getElementById("m_mobile");
    var m5=document.getElementById("m_clg");
    //var m6=document.getElementById("m_acc");
  	var x;
  	if(m1.value == null||m1.value == "")
    {
       	alert("First name must be filled out");
       	m1.focus(); 
    	return false;
    }
    if(m1.value.length>15)
    {
      	alert("First name should not contain more than 15 characters.");
     	m1.value="";
     	m1.focus();
    	return false;
    }
    if (/[0-9!@#$%^&*()_+\-=\s\[\]{};':"\\|,.<>\/?]/.test(m1.value)) 
    {
      alert("First name should contain alphabets only.");
      m1.value="";
      m1.focus();
      return false;
    }
    
    if(m2.value == null||m2.value == "")
    {
      	alert("Last name must be filled out");
      	m2.focus();
    	return false;
    }
   	if(m2.value.length>15)
    {
      	alert("Last name should not contain more than 15 characters.");
     	m2.value="";
     	m2.focus();
    	return false;
    }
    if (/[0-9!@#$%^&*()_+\-=\s\[\]{};':"\\|,.<>\/?]/.test(m2.value)) 
    {
      alert("Last name should contain alphabets only.");
      m2.value="";
      m2.focus();
      return false;
    }

    if(m3.value == null||m3.value == "")
    {
     	alert("Email id must be filled out");
     	m3.focus();
    	return false;
    }
    if(m3.value.length>30)
    {
     	alert("Email ID should not contain more than 30 characters.");
     	m3.value="";
      m3.focus();
    	return false;
    }
    if (/\s/.test(m3.value))
    {
        alert("Email-ID should not have spaces");
        m3.value="";
        m3.focus();
        return false;
    }

    var atpos = m3.value.indexOf("@");
    var dotpos = m3.value.lastIndexOf(".");
    if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=m3.value.length)
    {
      	alert("Not a valid e-mail address");
        m3.value=""; 
        m3.focus();    
    	return false;        
    }

    if(m4.value == null||m4.value == "")
    {
      	alert("Contact number must be filled out");
      	m4.focus();
    	return false;
    }
    if(/^\d+$/.test(m4.value))
    {
    }
    else
    {
        alert("Contact number should not contain alphabets");
    	m4.value="";
      	m4.focus();
     	return false;
    }
    if(m4.value.length < 10)
    {
      	alert("Invalid contact number");
      	m4.value="";
      	m4.focus();
      	return false;
    }

    if(m5.value == null||m5.value == "")
    {
      	alert("College name must be filled out");
      	m5.focus();
     	return false;
    }
    if(m5.value.length>45)
    {
      	alert("College name should not contain more than 45 characters.");
     	m5.value="";
     	m5.focus();
    	return false;
    }

    if (/[0-9!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(m5.value)) 
    {
      alert("College name should contain alphabets only.");
      m5.value="";
      m5.focus();
      return false;
    }
    return true;
}
function gender()
{
  var m7=document.getElementsByName("m_gender");
  var gndr;
  var i=0;
  while(i<m7.length)
  {
    if(m7[i].checked)
    {
      gndr=m7[i].value;
      break;
    }
    i++;
  }
  return gndr;
}