<?php include 'functions.php'; 
if(!isset($_SESSION['loggedin'])){
  header("Refresh:0; URL=login");
}?>
<!DOCTYPE html>
<html lang='en' xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include "head.php"; ?>
	</head>

<?php

 ?>
<body <?php if(!isset($_SESSION['logid'])){
  echo "hidden";}else{echo "";} ?>>

<?php include "nav.php"; ?>
<div class='content'>

<div class='container'>
<br>
<?php if(isset($_GET['s'])){
	search($_GET['s']); 
	}else browsevideos("");

	?>


</div>

</div> <!-- end div content -->
</body>
<?php include "footer.php"; ?>

</html>