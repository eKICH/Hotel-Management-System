
function validate(){
    var email=document.user.email.value;
    var password=document.user.password.value;
    var status=false;
    
    if(email==""){
    document.getElementById("emaillocation").innerHTML=
    "Email can't be blank!";
    status=false;
    }else{
    document.getElementById("emaillocation").innerHTML=
    "";
    status=true;
    }
    
    if(password==""){
    document.getElementById("passwordlocation").innerHTML=
    "Password Required!";
    status=false;
    }else{
    document.getElementById("passwordlocation").innerHTML=
    "";
    status=true;
    }
    
    return status;
}