
function setCookie(cname, cvalue) {
    var d = new Date();
    d.setTime(d.getTime() + (1 * 24 * 60 * 60 * 1000));
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
	setCookie("username", u.value);
	setCookie("password", p.value);
}

function logout(){
	window.location.href = "login.php";
}
function confirmPassword(pw,cpw){
    if(pw==cpw){
        return true;
    }else return false;
}
function checkPw(){
    var pw=document.getElementById('inputPassword');
    var cpw=document.getElementById('confirmPassword');

    if(pw.value!="" && cpw.value!=""){
        if(confirmPassword(pw.value,cpw.value)){
            pw.classList.remove('is-invalid');
            cpw.classList.remove('is-invalid');
            pw.classList.add('is-valid');
            cpw.classList.add('is-valid');
        }else{
            pw.classList.add('is-invalid');
            cpw.classList.add('is-invalid');
            document.getElementById('confpwtooltip').innerHTML="Password does not match!";
        }
    }else{
        pw.classList.add('is-invalid');
        cpw.classList.add('is-invalid');
        document.getElementById('confpwtooltip').innerHTML="Required field";
    }
}
function checkUsername(){

}
function newUser(){
    var query="CALL addUser("+document.getElementById('inputUsername').value+","
        +document.getElementById('inputPassword').value+","
        +document.getElementById('inputEmail').value+","
        +document.getElementById('fullName').value+","
        +document.getElementById('bio').value+","
        +document.getElementById('userType').value+")";
    document.write(query);
    setCookie('newUser',query);
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