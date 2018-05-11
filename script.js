

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue;
    // + ";" + expires + ";path=/";
}
function delete_cookie(name) {
  document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie(cname) {
    var user = getCookie(cname);
    if (user != "") {
    	return true;
    } else {
    	return false;
    }
}
function login(){
	var u= document.getElementById('username');
	var p= document.getElementById('password');
	setCookie("username", u.value,1);
	setCookie("password", p.value,1);
}

function logout(){
	window.location.href = "login.php";
}
function newUser(){
	var pw=document.getElementById('inputPassword');
	var cpw=document.getElementById('confirmPassword');
	var error=document.getElementById('error');

	if(pw==cpw){
		error.value="";
	}else{
		error.value="Password does not match";
	}
}
function clickregister(){
	window.location.href = "new.php";	
}

function loadGallery(){
	var t=20;
	for(var x=t ; x > 0 ; x--){
		document.write("<div class='thumb'> </div>");
	}
	var div=t/5;
	document.getElementById('content').style.height=div*200+"px";

}
function fixedNav(){

	var nav= document.getElementById('fixednav');
	var sticky = nav.offsetTop;
	var flex= document.getElementById('flexnav');
	var reglink= document.getElementById('reglink');

	if (window.pageYOffset >= sticky){
    	nav.classList.add("sticky");
    	reglink.style.display='block';
  	}
  	if(window.pageYOffset <= nav.offsetTop+50){
    	nav.classList.remove("sticky");
    	reglink.style.display='none';
  }
}