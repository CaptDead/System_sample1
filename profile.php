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
	<title>Vehicle Rental | Profile Settings</title>
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
				<h2>PROFILE SETTINGS</h2>
				<hr style="height:1px;width:95%;background-color:gray;">
				<div class="profile-pic">
					<label class="-label" for="file">
						<span>Change Image</span>
					</label>
					<input id="file" type="file" onchange="loadFile(event)"/>
					<img src="assets/image/img_sample_1.jpg" id="output" width="200" />
				</div>
				<div class="user-group">
					<label class="profile-label">Last Name <span></span></label><br>
					<input type="text" name="fullname" class="control-input" id="fullname" required>
				</div>
				<div class="user-group">
					<label class="profile-label">First Name<span></span></label><br>
					<input type="email" name="email" class="control-input" id="emailaddress" required>
				</div>
				<div class="user-group">
					<label class="profile-label">Middle Name<span></span></label><br>
					<input type="email" name="email" class="control-input" id="emailaddress" required>
				</div>
				<div class="user-group">
					<label class="profile-label">Email<span></span></label><br>
					<input type="email" name="email" class="control-input" id="emailaddress" required>
				</div>
				<div class="user-group">
					<label class="profile-label">Phone Number <span></span></label><br>
					<input type="text" name="contactno" class="control-input" id="phonenumber" required>
				</div>

				<div class="user-group">
					<button class="save-btn" type="submit" name="send" type="submit" style="background-color: #545677; margin-top: 2%;">Save Changes </button>
				</div>
			</form>
		</div>
	</section>
	<!--Footer-->
	<?php include('includes/footer.php');?>

	<!--Back to top-->
	<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
	<!--/Back to top--> 

	<!--Script-->

	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script> 

	<script type="text/javascript">
		var loadFile = function (event) {
			var image = document.getElementById("output");
			image.src = URL.createObjectURL(event.target.files[0]);
		};
	</script>
</body>
</html>