      function validation() {
        
        var fname=document.getElementById('fname').value;
        var correct_name = /^[A-Za-z]+|[A-Za-z]\s[A-Za-z]$/;
        var correct_mail = /^[A-Za-z0-9._-]{3,20}@[A-Za-z]{3,8}\.[A-Za-z]{2,4}$/;
        var email=document.getElementById('email').value;
        var mobilenumber=document.getElementById('mobilenumber').value;
        var password=document.getElementById('password').value;
        var passwordcheck=document.getElementById('passwordcheck').value;
        var flag=true;
    
        if (fname == '') {
          document.getElementById('fnames').innerHTML="Please Enter Your Name";
          document.getElementById('fnames1').innerHTML="";
          flag=false;
        }
        else if ((fname.length <= 2) || (fname.length> 20)) {
          document.getElementById('fnames').innerHTML="Your Name length must be atleast 3 and atmmost 20";
          document.getElementById('fnames1').innerHTML="";
          flag=false;
        }
        else if (!fname.match(correct_name)){
          document.getElementById('fnames').innerHTML="Your Name can contain only alphabets or Spaces";
          document.getElementById('fnames1').innerHTML="";
          flag=false;
        }
        else {
          document.getElementById('fnames1').innerHTML="Looks Good";
          document.getElementById('fnames').innerHTML="";
        }

        if (email == '') {
          document.getElementById('emails').innerHTML="Please Enter Your Email";
          document.getElementById('emails1').innerHTML="";
          flag=false;
        } 
        else if (!email.match(correct_mail)){
          document.getElementById('emails').innerHTML="Please Enter Valid E-mail ID";
          document.getElementById('emails1').innerHTML="";
          flag=false;
        }
        else {
          document.getElementById('emails1').innerHTML="Looks Good";
          document.getElementById('emails').innerHTML="";
        }

        if (mobilenumber == '') {
          document.getElementById('mobileno').innerHTML="Please Enter Your Mobile Number";
          document.getElementById('mobileno1').innerHTML="";
          flag=false;
        } 
        else if (mobilenumber.length != 10 && mobilenumber.length != 8) {
          document.getElementById('mobileno').innerHTML="Number must be 8 or 10 digits";
          document.getElementById('mobileno1').innerHTML="";
          flag=false;
        }
        else if(isNaN(mobilenumber)){
          document.getElementById('mobileno').innerHTML="Please Enter Digits only";
          document.getElementById('mobileno1').innerHTML="";
          flag=false;
        } 
        else {
          document.getElementById('mobileno1').innerHTML="Looks Good";
          document.getElementById('mobileno').innerHTML="";
        }

        if (password == '') {
          document.getElementById('passwords').innerHTML="Please Enter Your Password";
          document.getElementById('passwords1').innerHTML="";
          flag=false;
        }  
        else if ((password.length <6) || (password.length>20)){
          document.getElementById('passwords').innerHTML="Password Length must be Between 6 and 20";
          document.getElementById('passwords1').innerHTML="";
          flag=false;
        }
        else{
          document.getElementById('passwords1').innerHTML="Looks Good";
          document.getElementById('passwords').innerHTML="";
        }
        if (passwordcheck == '') {
          document.getElementById('passwordchecks').innerHTML="Please Re-Enter Your Password";
          document.getElementById('passwordchecks1').innerHTML="";
          flag=false;
        }  
        else if ((passwordcheck.length <6) || (passwordcheck.length>20)){
          document.getElementById('passwordchecks').innerHTML="Re-Entered Password Length must be Between 6 and 20";
          document.getElementById('passwordchecks1').innerHTML="";
          flag=false;
        }
        else if(passwordcheck != password){
          document.getElementById('passwordchecks').innerHTML="Re-Entered Password Does Not Match Original Password";
          document.getElementById('passwordchecks1').innerHTML="";
          flag=false;
        }
        else{
          document.getElementById('passwordchecks1').innerHTML="Looks Good";
          document.getElementById('passwordchecks').innerHTML="";
        }
        return flag;
      }

      function validation1() {
        
        var correct_mail = /^[A-Za-z0-9._-]{3,20}@[A-Za-z]{3,8}\.[A-Za-z]{2,4}$/;
        var email=document.getElementById('e-mail').value;
        var password=document.getElementById('pword').value;
        var flag=true;
    
        if (email == '') {
          document.getElementById('e-mails').innerHTML="Please Enter Your Email";
          document.getElementById('e-mails1').innerHTML="";
          flag=false;
        } 
        else if (!email.match(correct_mail)){
          document.getElementById('e-mails').innerHTML="Please Enter Valid E-mail ID";
          document.getElementById('e-mails1').innerHTML="";
          flag=false;
        }
        else {
          document.getElementById('e-mails1').innerHTML="Looks Good";
          document.getElementById('e-mails').innerHTML="";
        }

        if (password == '') {
          document.getElementById('pwords').innerHTML="Please Enter Your Password";
          document.getElementById('pwords1').innerHTML="";
          flag=false;
        }  
        else if ((password.length <6) || (password.length>20)){
          document.getElementById('pwords').innerHTML="Password Length must be Between 6 and 20";
          document.getElementById('pwords1').innerHTML="";
          flag=false;
        }
        else{
          document.getElementById('pwords1').innerHTML="Looks Good";
          document.getElementById('pwords').innerHTML="";
        }
        return flag;
      }
      $("#sign-toggle").on('click', () => {
        $("#login").fadeOut();
        $("#sign-btn").fadeOut(()=>{
            $("#sign-up").fadeIn();
            $("#login-btn").fadeIn();
        });
      });
      $("#login-toggle").on('click', () => {
        $("#login-btn").fadeOut();
        $("#sign-up").fadeOut(()=>{
            $("#sign-btn").fadeIn();
        $("#login").fadeIn();
        });
      });