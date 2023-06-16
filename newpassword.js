function validate()
{
  var password=/^\w+[@&£#$¥€]{1}[0-9]+$/;
  var password2=/^\w+[@&£#$¥€]{1}[0-9]+$/;
  var rpa1=password.test(document.getElementById("password").value);
  var rpa2=password2.test(document.getElementById("password2").value);
  var p1=document.getElementById("password").value;
  var p2=document.getElementById("password2").value;
  res=(p1==p2);
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