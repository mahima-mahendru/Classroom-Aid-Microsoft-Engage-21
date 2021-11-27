<?php
session_start();

if ( $_SESSION[ "fidx" ] == "" || $_SESSION[ "fidx" ] == NULL ) {
	header( 'Location:facultylogin' );
}

$userid = $_SESSION[ "fidx" ];
$fname = $_SESSION[ "fname" ];

?>
<?php include('after-login.php'); ?>
<body>

 
  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
        <h3> Welcome Faculty : <a href="welcomefaculty.php" ><span style="color:#FF0004"> <?php echo $fname; ?></span></h3>
			</a>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container" style="text-align:center;margin:auto;margin-top:100px">
      <a href="mydetailsfaculty.php?myfid=<?php echo $userid ?>"><button  href="" type="submit" class="btn btn-primary" style="border-radius:0%;width:150px"><i class="fa fa-user"></i> My Profile</button></a>
			
			<a href="videos.php"> <button  href="" type="submit" class="btn btn-primary" style="border-radius:0%"><i class="fa fa-video-camera"></i>Manage Classroom</button>
			  
			<a href="logoutfaculty"><button  href="" type="submit" class="btn btn-danger" style="border-radius:0%">Logout</button></a>

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