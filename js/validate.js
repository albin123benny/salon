function checkEmail(text){
    return (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(text));
}
function checkPassword(text){
    return (/^(?=.*[!@#$%^&*(),.?":\[\]{}|<>\ ])(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,}$/.test(text));
}
function checkPhone(number){
    return (/^(6|7|8|9)[0-9]{9}$/.test(number));
}

function checkName(text){
    return (/^([a-zA-Z\. ]{2,})+$/.test(text));
}

var nam=false;
var email=false;
var password=false;
var con_password=false;
var mobile=false;

function valName()
        {
            var hname = document.getElementsByName('uname')[0];
            if (checkName(hname.value)){
                document.getElementById("uname").style.borderColor = "green";
                nam=true;
                } 
            else
                {
                    nam=false;
                   document.getElementById("uname").style.borderColor = "red"; 
                }
        }

     function valPassword()
     {
         var hs = document.getElementsByName('password')[0];
         if (checkPassword(hs.value)){
             document.getElementById("password").style.borderColor="green";
             password=true;
         }
         else
         {
            password=false;
             document.getElementById("password").style.borderColor="red";
         }
     }   

function valPassword1()
{
    var hd = document.getElementsByName('password1')[0];
    if (checkPassword(hd.value)){
        document.getElementById("password1").style.borderColor="green";
        password=true;

    }
    else
        {
            password=false;
        document.getElementById("password1").style.borderColor="red";
    }
}
function valReptpassword()
{
    var val1= document.getElementsByName('password1')[0].value;
    var val2=document.getElementById("rept-password").value
    if (val1== val2){
        document.getElementById("rept-password").style.borderColor="green";
        con_password=true;
    }
    else
    {
        con_password=false;
        document.getElementById("rept-password").style.borderColor="red";
    }
}


    function valEmail()
        {
            var he = document.getElementsByName('email')[0];
            if (checkEmail(he.value)){
                document.getElementById("email").style.borderColor = "green";
                email=true;
                } 
            else
                {
                    email=false;
                   document.getElementById("email").style.borderColor = "red"; 
                }
        }
        function valEmail1()
        {
            var he = document.getElementsByName('email1')[0];
            if (checkEmail(he.value)){
                document.getElementById("email1").style.borderColor = "green";
                email=true;
                } 
            else
                {
                    email=false;
                   document.getElementById("email1").style.borderColor = "red"; 
                }
        }
function valMob()
    {
        var hm = document.getElementsByName('mobno')[0];
            if (checkPhone(hm.value)){
                document.getElementById("mobno").style.borderColor = "green";
                mobile=true;
                } 
            else
                {
                    mobile=false;
                   document.getElementById("mobno").style.borderColor = "red"; 
                }
    }      

function reg(){
    if(nam==true && email==true && password==true && con_password==true && mobile==true ){
        // alert('yes')
        document.getElementById('reg').submit;
    }
    else{
        alert('no')
    }
}