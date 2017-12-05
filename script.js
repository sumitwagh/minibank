function upperCase()
{
  var str = document.getElementById("txtName").value;
 document.getElementById("txtName").value=str.toUpperCase();
}
function validate() {
   var pattern = /[a-zA-Z]{5,}/;
   var stri = document.getElementById('txtName').value;
   if (stri.match(pattern)) {
     return true;  
   }
   else {
     alert('invalid charaters');
     return false;
   }
 }
