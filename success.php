<?php include 'functions.php'; 
if(!isset($_SESSION['loggedin'])){
  header("Refresh:0; URL=login");
}else{
	
}
header("Refresh:2; URL=user?u=".$_SESSION['username']);
?>
<!DOCTYPE html>
<html lang='en' xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include "head.php"; ?>
	</head>

<body>
  <div class="modal-dialog" role="document">
    <div class="modal-content" style='padding:20px;text-align:center;'>
      Successfully subscribed to <b><?php echo $_SESSION['username']; ?>.</b>We will verify your payment within 12-24 hours.
    </div>
  </div>






</body>

</html>