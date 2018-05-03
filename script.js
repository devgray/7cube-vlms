window.onscroll = function() { fixedNav() };
	

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