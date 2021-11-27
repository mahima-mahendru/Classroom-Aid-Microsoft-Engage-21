<?php
session_start();

if ( $_SESSION[ "sidx" ] == "" || $_SESSION[ "sidx" ] == NULL ) {
	header( 'Location:studentlogin' );
}

$userid = $_SESSION[ "sidx" ];
$userfname = $_SESSION[ "fname" ];
$sEno = $_SESSION[ "seno" ];
$userlname = $_SESSION[ "lname" ];
?>
<?php include('after-login.php'); ?>
<body>

 
  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
        <h3> Welcome <?php echo "<span style='color:red'>".$userfname." ".$userlname."</span>";?></h3>


        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container" style="text-align:center;margin:auto;margin-top:100px">
	  <a href="mydetailsstudent.php?myds=<?php echo $userid;  ?>"> <button type="submit" class="btn btn-success" style="border-radius:0%;" title="My Details"><i class="fa fa-user"></i> My Profile</button></a>

<a href="viewvideos.php?eid=<?php echo $userid;  ?>"> <button  href="" type="submit" class="btn btn-success" style="border-radius:0%;"><i class="fa fa-video-camera"></i>Class Schedule</button></a>

<a href="logoutstudent"><button  href="" type="submit" class="btn btn-danger" style="border-radius:0%;">Logout</button></a>

      </div>
    </section>

  </main><!-- End #main -->

 <!-- ======= Footer ======= -->
 <footer id="footer">
    
   
</footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>