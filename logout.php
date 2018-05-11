<?php include 'functions.php'; 
if(!isset($_SESSION['loggedin'])){
  header("Refresh:0; URL=login.php");
}else{
	
}
session_start();
session_destroy();
$str="";
$substr="";
foreach ( $_COOKIE as $key => $value )
{
	//for($i=0; $i < count($_COOKIE); $i++){
	$str=$str.$key."=".$value.";";
}

	$cookies=explode(";", $str);
	for ($i=0; $i < count($cookies); $i++) { 
		$substr=$substr.$cookies[$i]."</br>";
		$parts=explode("=", $substr);
		setcookie($parts[0],'',1);	
	}
    	//setcookie($key,'',1);
	//}
	

/*echo $str;*/
echo "<br>".$substr;
//setcookie("function_login(){___setCookie(login,_document_getElementById('login'),_1)",'',1);

header("Refresh:2; URL=login.php");
?>
<!DOCTYPE html>
<html lang='en' xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include "head.php"; ?>
	</head>

<body>
  <div class="modal-dialog" role="document">
    <div class="modal-content" style='padding:20px;text-align:center;'>
      Successfully logged out.
    </div>
  </div>






</body>

</html>