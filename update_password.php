<?php 
session_start();
include('includes/database.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}else{}
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="assets/image/tabicon.png" type="image/x-icon">
	<title>Vehicle Rental | Update Password</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="assets/css/style.css" type="text/css">
	<link href="assets/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

</head>
<body>
<!--Header-->
	<?php include('includes/header.php');?>

	<form class="profile-form">
		<section class="user_profile">
			<div>
				<h2>CHANGE PASSWORD</h2>
				<hr style="height:1px;width:95%;background-color:gray;">
				<div class="user-group">
					<label class="pass-label">Current Password<span></span></label><br>
					<input type="PASSWORD" name="current-pass" class="control-pass-input" id="pass" required>
				</div>
				<div class="user-group">
					<label class="pass-label">New Password<span></span></label><br>
					<input type="PASSWORD" name="new-password" class="control-pass-input" id="newpass" required>
				</div>
				<div class="user-group">
					<label class="pass-label">Confirm New Password <span></span></label><br>
					<input type="PASSWORD" name="confirm-new-pass" class="control-pass-input" id="currnewpass" required>
				</div>

				<div class="user-group">
					<button class="save-btn" type="submit" name="send" type="submit" style="background-color: #545677; margin-top: 2%; margin-left: 50%; ">Save Changes </button>
				</div>
			</div>
		</section>
			</form>





<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><img src="assets/image/up.png" height="30px" width="30px"></a> </div>
<!--/Back to top--> 


<!--Script-->
	
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script> 
</body>
</html>