<?php 
session_start();
include('includes/database.php');
error_reporting(0);
if(isset($_POST['submit']))
{
$fromdate=$_POST['fromdate'];
$todate=$_POST['todate']; 
$message=$_POST['message'];
$useremail=$_SESSION['login'];
$status=0;
$vhid=$_GET['vhid'];
$sql="INSERT INTO  tblbooking(userEmail,VehicleId,FromDate,ToDate,message,Status) VALUES(:useremail,:vhid,:fromdate,:todate,:message,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
$query->bindParam(':vhid',$vhid,PDO::PARAM_STR);
$query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
$query->bindParam(':todate',$todate,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Booking successfull.');</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}

}

?>


<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Car Rental Port | Vehicle Details</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">

<!-- SWITCHER -->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>
<body>

<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 

  <!--Listing-Image-Slider-->

<?php 
$vhid=intval($_GET['vhid']);
$sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid  from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblvehicles.id=:vhid";
$query = $dbh -> prepare($sql);
$query->bindParam(':vhid',$vhid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
$_SESSION['brndid']=$result->bid;  
?>  

<section id="listing_img_slider">
  <div class="tbrow"  style="transform: translate(925px, 670px); float: left;">
  <table>
    <tr>
      <td><div class="tbcolumn">
            <img style="height: 100px; width: 120px;" src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image" width="100" height="560" onclick="openModal();currentSlide(1)" class="-hover-shadow">
          </div>
        </td>
      <td><div class="tbcolumn">
            <img style="height: 100px;width: 120px;" src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage2);?>" class="img-responsive" alt="image" width="100" height="560" onclick="openModal();currentSlide(1)" class="-hover-shadow">
          </div>
        </td>
    </tr>
    <tr>
      <td><div class="tbcolumn">
            <img style="height: 100px; width: 120px;" src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage3);?>" class="img-responsive" alt="image" width="100" height="560" onclick="openModal();currentSlide(1)" class="-hover-shadow">
          </div>
      </td>
      <td><div class="tbcolumn">
            <img style="height: 100px; width: 120px;" src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage4);?>" class="img-responsive"  alt="image" width="100" height="560" onclick="openModal();currentSlide(1)" class="-hover-shadow">
          </div>
      </td>
      </tr>
  </table>
 </div>

  <!-- The Modal/Lightbox -->
<div id="myModal" class="img-modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-img"  style="width:50%">

    <div class="mySlides">
      <div class="numbertext">1 / 4</div>
      <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image" style="width: 100%;">
    </div>

    <div class="mySlides">
      <div class="numbertext">2 / 4</div>
      <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage2);?>" class="img-responsive" alt="image" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">3 / 4</div>
      <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage3);?>" class="img-responsive" alt="image" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">4 / 4</div>
      <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage4);?>" class="img-responsive" alt="image" style="width:100%">
    </div>

    <!-- Next/previous controls -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  
  <?php if($result->Vimage5=="")
{

} else {
  ?>
  <div><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage5);?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <?php } ?>
</section>
<!--/Listing-Image-Slider-->


<!--Listing-detail-->
<section class="listing-detail">

  <div class="container">
    <div class="listing_detail_head row">
      <div>
        <h2 style="transform:translate(-150px);"><?php echo htmlentities($result->BrandName);?> , <?php echo htmlentities($result->VehiclesTitle);?></h2>
        <h4 style="transform:translate(-150px);"> Owner: <?php echo htmlentities($result->Fname);?> </h4>
      </div>
      <div>
        <div class="price_info">
          <p>Php:<?php echo htmlentities($result->PricePerDay);?> </p>Per Day
         
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-9">
        <div class="main_features">
          <ul>
          
            <li>
              <img src="assets/image/calendar.png" style="padding: 10px;" height="45px" width="45px">
              <h5><?php echo htmlentities($result->ModelYear);?></h5>
              <p>Reg.Year</p>
            </li>
            <li> 
              <img src="assets/image/fuel.png" style="padding: 10px;" height="45px" width="45px">
              <h5><?php echo htmlentities($result->FuelType);?></h5>
              <p>Fuel Type</p>
            </li>
       
            <li> 
              <img src="assets/image/car-seat.png" style="padding: 10px;" height="45px" width="45px">
              <h5><?php echo htmlentities($result->SeatingCapacity);?></h5>
              <p>Seats</p>
            </li>
          </ul>
        </div>
        <div class="listing_more_info">
          <div class="listing_detail_wrap"> 
            <!-- Nav tabs -->
            <ul class="nav nav-tabs gray-bg" role="tablist">
              <li role="presentation" class="active"><a href="#vehicle-overview " aria-controls="vehicle-overview" role="tab" data-toggle="tab">Vehicle Overview </a></li>
          
              <li role="presentation"><a href="#accessories" aria-controls="accessories" role="tab" data-toggle="tab">Accessories</a></li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content"> 
              <!-- vehicle-overview -->
              <div role="tabpanel" class="tab-pane active" id="vehicle-overview">
                
                <p><?php echo htmlentities($result->VehiclesOverview);?></p>
              </div>
              
              
              <!-- Accessories -->
              <div role="tabpanel" class="tab-pane" id="accessories"> 
                <!--Accessories-->
                <table>
                  <thead>
                    <tr>
                      <th colspan="2">Accessories</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Air Conditioner</td>
<?php if($result->AirConditioner==1)
{
?>
  <td><img src="assets/image/check.png" height="15px" width="15px" style="margin-left: 10px"></td>
<?php } else { ?> 
   <td><img src="assets/image/cross.png" height="15px" width="15px" style="margin-left: 10px"></td>
   <?php } ?> </tr>

<tr>
<td>AntiLock Braking System</td>
<?php if($result->AntiLockBrakingSystem==1)
{
?>
<td><img src="assets/image/check.png" height="15px" width="15px" style="margin-left: 10px"></td>
<?php } else {?>
<td><img src="assets/image/cross.png" height="15px" width="15px" style="margin-left: 10px"></td>
<?php } ?>
                    </tr>

<tr>
<td>Power Steering</td>
<?php if($result->PowerSteering==1)
{
?>
<td><img src="assets/image/check.png" height="15px" width="15px" style="margin-left: 10px"></td>
<?php } else { ?>
<td><img src="assets/image/cross.png" height="15px" width="15px" style="margin-left: 10px"></td>
<?php } ?>
</tr>
                   

<tr>

<td>Power Windows</td>

<?php if($result->PowerWindows==1)
{
?>
<td><img src="assets/image/check.png" height="15px" width="15px" style="margin-left: 10px"></td>
<?php } else { ?>
<td><img src="assets/image/cross.png" height="15px" width="15px" style="margin-left: 10px"></td>
<?php } ?>
</tr>
                   
 <tr>
<td>CD Player</td>
<?php if($result->CDPlayer==1)
{
?>
<td><img src="assets/image/check.png" height="15px" width="15px" style="margin-left: 10px"></td>
<?php } else { ?>
<td><img src="assets/image/cross.png" height="15px" width="15px" style="margin-left: 10px"></td>
<?php } ?>
</tr>

<tr>
<td>Leather Seats</td>
<?php if($result->LeatherSeats==1)
{
?>
<td><img src="assets/image/check.png" height="15px" width="15px" style="margin-left: 10px"></td>
<?php } else { ?>
<td><img src="assets/image/cross.png" height="15px" width="15px" style="margin-left: 10px"></td>
<?php } ?>
</tr>

<tr>
<td>Central Locking</td>
<?php if($result->CentralLocking==1)
{
?>
<td><img src="assets/image/check.png" height="15px" width="15px" style="margin-left: 10px"></td>
<?php } else { ?>
<td><img src="assets/image/cross.png" height="15px" width="15px" style="margin-left: 10px"></td>
<?php } ?>
</tr>

<tr>
<td>Power Door Locks</td>
<?php if($result->PowerDoorLocks==1)
{
?>
<td><img src="assets/image/check.png" height="15px" width="15px" style="margin-left: 10px"></td>
<?php } else { ?>
<td><img src="assets/image/cross.png" height="15px" width="15px" style="margin-left: 10px"></td>
<?php } ?>
                    </tr>
                    <tr>
<td>Brake Assist</td>
<?php if($result->BrakeAssist==1)
{
?>
<td><img src="assets/image/check.png" height="15px" width="15px" style="margin-left: 10px"></td>
<?php  } else { ?>
<td><img src="assets/image/cross.png" height="15px" width="15px" style="margin-left: 10px"></td>
<?php } ?>
</tr>

<tr>
<td>Driver Airbag</td>
<?php if($result->DriverAirbag==1)
{
?>
<td><img src="assets/image/check.png" height="15px" width="15px" style="margin-left: 10px"></td>
<?php } else { ?>
<td><img src="assets/image/cross.png" height="15px" width="15px" style="margin-left: 10px"></td>
<?php } ?>
 </tr>
 
 <tr>
 <td>Passenger Airbag</td>
 <?php if($result->PassengerAirbag==1)
{
?>
<td><img src="assets/image/check.png" height="15px" width="15px" style="margin-left: 10px"></td>
<?php } else {?>
<td><img src="assets/image/cross.png" height="15px" width="15px" style="margin-left: 10px"></td>
<?php } ?>
</tr>

<tr>
<td>Crash Sensor</td>
<?php if($result->CrashSensor==1)
{
?>
<td><img src="assets/image/check.png" height="15px" width="15px" style="margin-left: 10px"></td>
<?php } else { ?>
<td><img src="assets/image/cross.png" height="15px" width="15px" style="margin-left: 10px"></td>
<?php } ?>
</tr>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          
        </div>
<?php }} ?>
   
      </div>
      
      <!--Side-Bar-->
      <aside class="col-md-3">
      
        
        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5 style="font-weight: bold;">Book Now</h5>
          </div>
          <form method="post">
            <div class="form-group">
              <input type="text" class="form-control" name="fromdate" placeholder="From Date(dd/mm/yyyy)" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="todate" placeholder="To Date(dd/mm/yyyy)" required>
            </div>
            <div class="form-group">
              <textarea rows="4" class="form-control" name="message" placeholder="Message" required></textarea>
            </div>
<?php if($_SESSION['login'])
{
$vhid=intval($_GET['vhid']);
$statusid = "SELECT VehicleId  from tblbooking where VehicleId='$vhid'";
$query = $dbh -> prepare($statusid);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
if($vhid==$result->VehicleId) {?>
<div class="form-group">
<input type="submit" class="btn_submitbook"  name="submit" value="Booked" disabled> 
</div>
<?php }}} else{?>
<div class="form-group">
<input type="submit" class="btn_submitbook"  name="submit" value="Book Now">
</div>
<?php } }else { ?>
<a href="#loginform" class="btn_view btn-xs uppercase" style="font-size:10px;" data-toggle="modal" data-dismiss="modal">Login For Book</a>

<?php } ?>
          </form>
        </div>
      </aside>  
  </div>
  
      <!--/Side-Bar--> 
    </div>
    
    <div class="space-20"></div>
    <div class="divider"></div>
  
    
  </div>
</section>
<!--/Listing-detail--> 


<br><br><br><br><br><br>

<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><img src="assets/image/up.png" height="30px" width="30px"> </a> </div>
<!--/Back to top--> 

<!--Login-Form -->
<?php include('includes/login.php');?>
<?php include('includes/pick.php');?>
<?php include('includes/owner.php');?>
<?php include('includes/ownersignup.php');?>

<!--/Login-Form --> 

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<script src="assets/switcher/js/switcher.js"></script>
<script src="assets/js/bootstrap-slider.min.js"></script> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

<script>
// Open the Modal
function openModal() {
  document.getElementById("myModal").style.display = "block";
}

// Close the Modal
function closeModal() {
  document.getElementById("myModal").style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>

</body>
</html>