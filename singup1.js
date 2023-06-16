function validate()
{
  alert("welcome");
  var name=/^[a-zA-Z]+[." "]*[a-zA-Z" ".]*$/;
  var email=/^\w+@gmail.com$/;
  var password=/^\w+[@&£#$¥€]{1}[0-9]+$/;
  var password2=/^\w+[@&£#$¥€]{1}[0-9]+$/;
  var ru1=name.test(document.getElementById("username").value);
  var re1=email.test(document.getElementById("email").value);
  var rpa1=password.test(document.getElementById("password").value);
  var rpa2=password2.test(document.getElementById("password2").value);
  var p1=document.getElementById("password").value;
  var p2=document.getElementById("password2").value;
  alert(rul);
  alert(rel);
  alert(rpal);
  if(rul==true)
  {
    if(re1==true)
    {
      if(rpa1==true)
      {
         if(res==false)
         {
           alert("passwords doesnt match");
		   return false;
         }
         else{
             alert("valid inputs");
         }
      }
      else{
        alert("password invalid");
        return false;
      }
    }
    else{
      alert("email invalid");
      return false;
    }
  }
  else{
    alert("name are invalid");
    return false;
  }
}