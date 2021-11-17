<?php 
session_start();
include('includes/database.php');
error_reporting(0);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Vehicle Rental</title>
	<link rel="icon" href="assets/image/tabicon.png" type="image/x-icon">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="assets/css/style.css" type="text/css">
	<link href="assets/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

</head>
	<body>

	<!--Header-->
	<?php include('includes/header.php');?>

	<!-- Banner -->
	<div class="fadein">
		<img src="assets/image/banner.png" width="98%" height="352px">
		<img src="assets/image/img_sample_1.jpg" width="98%" height="352px">
		<img src="assets/image/img_sample_2.jpg" width="98%" height="352px">
		<img src="assets/image/img_sample_3.jpg" width="98%" height="352px">
	</div>
	<br>
	<div style="text-align:center">
		<span class="dot"></span> 
		<span class="dot"></span> 
		<span class="dot"></span> 
		<span class="dot"></span> 
	</div>

	<br>
	<hr style="height:3px;width:90%;background-color:gray;">
	<br>

	<!-- Resent Cat-->
	<section class="section-padding gray-bg">
		<div class="container">
			<div class="section-header text-center">
				<h2>Find the Best <span>Car For You</span></h2>
				<p>It is above all the uncompromising, performance-oriented aesthetic that unmistakeably reveals its ambitions. Not elegant but extravagant. Not conventional but individual.</p>
			</div>
			<br>
			<hr style="height:3px;width:100%;background-color:gray;">

			<div class="row"> 
	      	<!-- Recently Listed New Cars -->
	      	<div class="tab-content">
	      		<div role="tabpanel" class="tab-pane active" id="resentnewcar">
	      			<?php $sql = "SELECT tblvehicles.Fname,tblvehicles.VehiclesTitle,tblbrands.BrandName,tblvehicles.PricePerDay,tblvehicles.FuelType,tblvehicles.ModelYear,tblvehicles.id,tblvehicles.SeatingCapacity,tblvehicles.VehiclesOverview,tblvehicles.Vimage1 from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand LIMIT 6";
	      			$query = $dbh -> prepare($sql);
	      			$query->execute();
	      			$results=$query->fetchAll(PDO::FETCH_OBJ);
	      			$cnt=1;

	      			if($query->rowCount() > 0){
	      				foreach($results as $result)
	      				{  
	      					?>  
	      		<div class="col-list-3">
	      			<div class="recent-car-list">
	      				<div class="car-info-box"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><img src="assets/image/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image"></a>
	      					<ul>
	      						<li><?php echo htmlentities($result->Fname);?></li>
	      						<li><?php echo htmlentities($result->FuelType);?></li>
	      						<li><?php echo htmlentities($result->ModelYear);?> Model</li>
	      						<li><?php echo htmlentities($result->SeatingCapacity);?> seats</li>
	      					</ul>
	      				</div>
	      			<div class="car-title-m">
	      				<h6><a href="vehical-details.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?> , <?php echo htmlentities($result->VehiclesTitle);?></a></h6>
	      				<span class="price">Php: <?php echo htmlentities($result->PricePerDay);?> /Day</span>
	      			</div>
	      			<div class="inventory_info_m">
	      				<p><?php echo substr($result->VehiclesOverview,0,70);?></p>
	      			</div>
					</div>
				</div>
					<?php }}?>
				</div>
	    	</div>
	  		</div>
	</section>
<!-- /Resent Car --> 
	<br>
	<section class="fun-facts-section">
	  <div class="container div_zindex">
	    <div class="row">
	      <div class="col-lg-3 col-xs-6 col-sm-3">
	        <div class="fun-facts-m">
	          <div class="cell">
	            <h2><i><img src="assets/image/calendaricon.png" width="35px" height="35px"><br></i>40+</h2>
	            <p>Years In Business</p>
	          </div>
	        </div>
	      </div>
	      <div class="col-lg-3 col-xs-6 col-sm-3">
	        <div class="fun-facts-m">
	          <div class="cell">
	            <h2><i><img src="assets/image/caricon.png" width="40px" height="40px"><br></i>1200+</h2>
	            <p>New Cars For Sale</p>
	          </div>
	        </div>
	      </div>
	      <div class="col-lg-3 col-xs-6 col-sm-3">
	        <div class="fun-facts-m">
	          <div class="cell">
	            <h2><i><img src="assets/image/caricon.png" width="40px" height="40px"><br></i>1000+</h2>
	            <p>Used Cars For Sale</p>
	          </div>
	        </div>
	      </div>
	      <div class="col-lg-3 col-xs-6 col-sm-3">
	        <div class="fun-facts-m">
	          <div class="cell">
	            <h2><i><img src="assets/image/userlogin.png" width="35px" height="35px"><br></i>600+</h2>
	            <p>Satisfied Customers</p>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	  <!-- Dark Overlay-->
	  <div class="dark-overlay"></div>
	</section>
	<!-- /Fun Facts--> 
<hr style="height:3px;width:90%;background-color:gray;">

	<?php include('includes/test.php');?>


	<div id="back-top" class="back-top"><a href="#top"><img src="assets/image/up.png" height="30px" width="30px"></a> 
	</div>
	<!--Footer-->
	<?php include('includes/footer.php');?>

	<!--Login-Form -->
	<?php include('includes/login.php');?>
	<?php include('includes/pick.php');?>
	<?php include('includes/owner.php');?>
	<?php include('includes/ownersignup.php');?>

	<!--Sign Up Form-->
	<?php include('includes/registration.php');?>

	<!--/Login-Form --> 

	
	<!-- Scripts --> 
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>	 
	<script>
		$(function(){
			$('.fadein img:gt(0)').hide();
			setInterval(function(){$('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');}, 2000);
		});

		var slideIndex = 0;
		dotSlides();

		function dotSlides() {
			var i;
			var dots = document.getElementsByClassName("dot");
			slideIndex++;

			if (slideIndex > dots.length) {slideIndex = 1}    
				for (i = 0; i < dots.length; i++) {
					dots[i].className = dots[i].className.replace(" active", "");
				}
				dots[slideIndex-1].className += " active";
				setTimeout(dotSlides, 2000); // Change image every 2 seconds
			}
	</script>
	</body>
</html>