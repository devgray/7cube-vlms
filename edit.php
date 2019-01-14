<?php include 'functions.php'; 
getUserInfo($_GET['u']);

if(!isset($_SESSION['loggedin'])){
    header("Refresh:0; URL=login");
  }
  if($_GET['u'] != $_SESSION['logusername']){
      header("Refresh:0; URL=user?u=".$_SESSION['username']);
  }

  if(isset($_COOKIE['editUser'])){
  editUser();
  }

  if(isset($_POST['btnsave'])){
  	editUser($_POST['username'],$_POST['email'],$_POST['fullname'],$_POST['usertype']);
  }
  if(isset($_POST['btnsavepw'])){
  	changepw($_SESSION['logusername'],$_POST['password']);
  }
?>
<!DOCTYPE html>
<html lang='en' xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include "head.php"; ?>
	</head>

<body <?php if(!isset($_SESSION['logid']) || !isset($_GET['u'])){
  echo "hidden";}else{echo "";} ?>>

<?php include "nav.php"; ?>
<div class='userheader'></div>
<div class='content' style='margin-top:-100px;'>

<div class='container'><div class='row'>

	<div class='col-lg-6 col-sm-12'>
		<br>
		<div class='userpanel'>
		<table class='table table-borderless'>
			<tr><td width="20%">
				<img class='avatar' src="img/avi.png" />
			</td>
			<td  style='padding:28px 10px 0px 10px;'>
				<h4><?php {echo $_SESSION['fname'];} ?></h4>
				<h5><a <?php echo "href='user?u=".$_SESSION['username']."'"; ?>><?php {echo $_SESSION['username'];} ?></a>, <span class='subtext' id='usertype'><?php {echo $_SESSION['usertype'];} ?></span></h5>
			<!-- 	<p style='height:35px;'><?php {echo $_SESSION['bio'];} ?></p> -->

				<div class="btn-group" role="group" aria-label="Basic example">
				  <form action="" method="post" style='padding:0;margin:0;'>
				  <?php 
				  if($_SESSION['logusername']!=$_GET['u']){
					  	if(checkSub($_SESSION['id'],$_SESSION['logid'])){
									echo '<button style="margin-right:7px;" type="submit" class="btn btn-info" name="btnunsub">Subscribed</button>';
								}else{
									echo '<button type="submit" class="btn btn-outline-info" name="btnsub">Subscribe</button>';
								}
				  }
				  
							?>
				</form>
				</div>
				<label style="font-weight:bold;font-size:15px;"><?php echo getSubCount($_SESSION['id']); ?> Subscriber/s</label>

				
			</td>
			</tr>

		</table>


		<table class='table table-borderless'>
			<tr>

				<td align='left'>
					

	</td>


			</tr>

		</table></div>
<div class='pad'>
	
	<form class='signup needs-validation' onsubmit="editUser(document.getElementById('inputUsername').value,
      document.getElementById('inputEmail').value,document.getElementById('fullName').value,document.getElementById('userType').value)"
      method="POST">

  <div class="form-group row">
    <label for="inputUsername" class="col-sm-3 col-form-label">Username</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="inputUsername" name='username' value=<?php echo $_SESSION['username']?> readonly>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
    <div class="col-sm-9">
      <input type="email" class="form-control" id="inputEmail" placeholder="name@example.com" name='email' value=<?php echo $_SESSION['email']?>  required>
    </div>
  </div>

  <div class="form-group row">
    <label for="fullName" class="col-sm-3 col-form-label">Full Name</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="fullName" name='fullname' value='<?php echo $_SESSION['fname'];?>' required>
    </div>
  </div>

<!--   <div class="form-group row">
    <label for="userBio" class="col-sm-3 col-form-label">Bio</label>
    <div class="col-sm-9">
      <textarea class="form-control" id="userBio" rows="3" name='bio'></textarea>
    </div>
  </div> -->

  <div class="form-group row" <?php if($_SESSION['usertype']=='Moderator'){echo "hidden"; } ?> >
    <label for="userType" class="col-sm-3 col-form-label">I'm a</label>
    <div class="col-sm-9">
      <select id="userType" class="custom-select" name='usertype' required>
        <?php loadSelectedDropdownHide('tbl_usertype','type',$_SESSION['usertype'],'3')?>
      </select>
      <div class="invalid-feedback">Example invalid custom select feedback</div>
    </div>
  </div>
<div align='center'>
<div class="btn-group" role="group" aria-label="Basic example">
	<button type="button" class="btn btn-link" name='btnsave' id='btnsave' data-toggle='modal' data-target='#changepwModal'>Change Password</button>
  <button type="submit" class="btn btn-danger" name='btnsave' id='btnsave'>Save Changes</button>
</div>
</div>

</form>

</div>
	</div>
	
	<div class='col-lg-6 col-sm-12'>
		<br>
		<div class='userpanel'>
			<div class='pad'>



			</div>
			</div>
	</div>

	


</div>
</div>

</div> <!-- end div content -->
</body>
<?php include "footer.php"; ?>

<?php if(isset($_POST['btnconfirmdelete'])){
	//deleteVideo($_POST[]);
}

?>

<!-- MODALS -->

<div class="modal fade" id="changepwModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<form class='signup needs-validation' method="POST" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
        	<div class="col-sm-12">

		    <div class="form-group row">
		    <label for="inputPassword" class="col-sm-4 col-form-label" >New Password</label>
		    <div class="col-sm-8">
		      <input type="password" class="form-control" id="inputPassword" name='password' onblur='checkPw()' required>
		    </div>
		  </div>

		  <div class="form-group row">
		    <label for="confirmPassword" class="col-sm-4 col-form-label">Confirm Password</label>
		    <div class="col-sm-8">
		      <input type="password" class="form-control" id="confirmPassword" name='confpassword' onblur='checkPw()' required>
		      <div class="invalid-tooltip" id='confpwtooltip'>
		      </div>
		    </div>
		  </div>

		    </div>
		  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger" name="btnsavepw" <?php echo "href='edit?u=".$_SESSION['logusername']."'"; ?> >Save Changes</a>
      </div>
    </div>
  </div>
</form>
</div>


</html>