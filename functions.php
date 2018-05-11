<script src='script.js'></script>
<?php
session_start();

$db=mysqli_connect("localhost","root","","db_vlms");



function checkLogin($user,$pw){
	global $db;
	$query="SELECT checkLogin('$user','$pw') as result";
	$result=mysqli_fetch_assoc(mysqli_query($db,$query));
	if($result['result']){
		return true;
	}else
		return false;
}
function deleteCookies(){
	$str="";
	$substr="";
	foreach ( $_COOKIE as $key => $value )
{
	//for($i=0; $i < count($_COOKIE); $i++){
	$str=$str.$key."=".$value.";";
}

	$cookies=explode(";", $str);
	for ($i=0; $i < count($cookies)-3; $i++) { 
		$substr=$substr.$cookies[$i]."</br>";
		$parts=explode("=", $substr);
		setcookie($parts[0],'',1);	
	}
}

function loadGallery(){
	for($x=10 ; $x > 0 ; $x--){
		echo "<div class='thumb'> </div>";
	}
} 
?>