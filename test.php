<?php
function checkLogin($user,$pw){
	global $db;
	$query="SELECT checkLogin('$user','$pw') as result";
	$result=mysqli_fetch_assoc(mysqli_query($db,$query));
	if($result['result']){
		$_SESSION['loggedin']=true;
        header("Refresh:0; URL=browse.php");
	}else
		return false;
}
checkLogin($_POST['username'],$_POST['password']);
?>