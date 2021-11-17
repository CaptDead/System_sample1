<?php
session_start();
error_reporting(0);
include('includes/database.php');
if(strlen($_SESSION['login'])==0)
{
	header('location:index.php');
}
else{
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Vehicle Rental Portal | My Booking</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link href="assets/css/slick.css" rel="stylesheet">
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<!--Header-->
	<?php include('includes/header.php');?>
	<!--Page Header-->
<?php
$useremail=$_SESSION['login'];
$sql = "SELECT * from tblusers where EmailId=:useremail";
$query = $dbh -> prepare($sql);
$query -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
	$cnt=1;
	if($query->rowCount() > 0)
	{
		foreach($results as $result)
			{ }}?>
<section class="user_profile">
	<div class="container">
	<h2>MY BOOKING</h2>
	<hr style="height:1px;width:95%;background-color:gray;">
	  <div>
		<div class="profile_wrap">
		  <div class="my_vehicles_list">
		  <ul class="vehicle_listing">
			<?php
		  	 $useremail=$_SESSION['login'];
			 $sql = "SELECT tblvehicles.Vimage1 as Vimage1,tblvehicles.VehiclesTitle,tblvehicles.id as vid,tblbrands.BrandName,tblbooking.FromDate,tblbooking.ToDate,tblbooking.message,tblbooking.Status  from tblbooking join tblvehicles on tblbooking.VehicleId=tblvehicles.id join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblbooking.userEmail=:useremail";
			 $query = $dbh -> prepare($sql);
			 $query-> bindParam(':useremail', $useremail, PDO::PARAM_STR);
			 $query->execute();
			 $results=$query->fetchAll(PDO::FETCH_OBJ);
			 $cnt=1;
			 if($query->rowCount() > 0)
			 {
			 foreach($results as $result)
			 {  
			  ?>
	<div style="margin-bottom: 20px;">
		
		<li style="background-color: #C4C4C4; padding: 10px 15px; margin: auto;">
			<div class="vehicle_img"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->vid);?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" alt="image" height="150px"></a> </div>
			<div class="vehicle_title">
			<h3><a href="vehical-details.php?vhid=<?php echo htmlentities($result->vid);?>"> <?php echo htmlentities($result->BrandName);?> , <?php echo htmlentities($result->VehiclesTitle);?></a></h3>
			<p><b>From Date:</b> <?php echo htmlentities($result->FromDate);?><br /> <b>To Date:</b> <?php echo htmlentities($result->ToDate);?></p>
			</div>
				<?php if($result->Status==1)
				{ ?>
					<div class="vehicle_status btn_view"> <a href="#">Confirmed</a>
						<div class="clearfix"></div>
					</div>
				<?php } else if($result->Status==2) { ?>
					<div class="vehicle_status btn_view"> <a href="#">Cancelled</a>
			<div class="clearfix"></div>
		</div>
	<?php } 
	else { ?>
		<div class="vehicle_status btn_view"> <a href="#" > Status: Not Confirm yet</a>
		</div><br>
		<div class="vehicle_status btn_view"><a href="#" > Cancel Book</a>
		</div>
		

	
			<?php } ?>
			<div><p><b>Message:</b> <?php echo htmlentities($result->message);?> </p></div>

 		 </li>
 	
  	</div>

   	       <?php }} ?>
        </ul>
      </div>
	</div> 
   </div>
  </div>
 </div>
</section>
<?php } ?>
<!--/my-vehicles-->
<?php include('includes/footer.php');?>

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><img src="assets/image/up.png" height="30px" width="30px"></a> </div>
<!--/Back to top--> 
<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/interface.js"></script>
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS-->
<script src="assets/js/bootstrap-slider.min.js"></script>
<!--Slider-JS-->
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
</body>
</html>
			
