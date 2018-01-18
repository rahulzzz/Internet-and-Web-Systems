 function checkForm(form)
  {
    if(form.firstName.value == "") {
      alert("Error: First name cannot be blank!");
      form.firstName.focus();
      return false;
    }
    
	if(form.lastName.value == "") {
      alert("Error: Last name cannot be blank!");
      form.lastName.focus();
      return false;
    }
    
	if(form.email.value == "") {
      alert("Error: Email cannot be blank!");
      form.email.focus();
      return false;
    }
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
      if(form.email.value.match(mailformat))
          {

            }
			else
			{
			alert("You have entered an invalid email address!");
			form.email.focus();
			return false;
			}
   if(form.password.value == "") {
      alert("Error: Password cannot be blank!");
      form.password.focus();
      return false;
    }
	if(form.password.value.length < 6) {
        alert("Error: Password must contain at least six characters!");
        form.password.focus();
        return false;
      }
	   if(form.cPassWord.value == "") {
      alert("Error: Confirm Password cannot be blank!");
      form.cPassWord.focus();
      return false;
    }
	if(form.cPassWord.value.length < 6) {
        alert("Error:  Confirm Password must contain at least six characters!");
        form.cPassWord.focus();
        return false;
      }
	 
	
    if( form.password.value != form.cPassWord.value) {
      
        alert("Error: Password and confirm password must be same!");
        form.password.focus();
        return false;
      }
     
   
  
  }