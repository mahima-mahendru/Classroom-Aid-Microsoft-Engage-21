<?php
session_start();

if ( $_SESSION[ "sidx" ] == "" || $_SESSION[ "sidx" ] == NULL ) {
	header( 'Location:studentlogin' );
}

$userid = $_SESSION[ "sidx" ];
$userfname = $_SESSION[ "fname" ];
$userlname = $_SESSION[ "lname" ];
?>
<?php include('after-login.php'); ?>

<body>

  
  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
        <h1> Welcome <a href="welcomestudent.php" <?php echo "<span style='color:red'>".				
			$userfname." ".$userlname."</span>";?> </a></h1>
			
        </div>

      </div>
	  <br>
    </section><!-- End Breadcrumbs Section -->
      
    <section class="inner-page">
      <div class="container" style="text-align:center;margin:auto;">
      <?php 
			
			include('database.php');
			$video_id= $_GET['viewid'];
			$sql="SELECT * FROM video WHERE V_id=$video_id";
			$rs=mysqli_query($connect,$sql);?>			
			<?php
			while($row=mysqli_fetch_array($rs))
				{
				?>
					
							<h2>Subject -> <?PHP echo $row['V_Title'];?></h2>
						
						<br>
						<br>
						
							<h2> Description -><?PHP echo $row['V_Remarks'];?> </h2>
						
						<br>
								
					
            <a href="<?php echo $row['V_Url']; ?>"><input type=	"url" Value="Join The Class"  class="btn btn-info" style="border-radius:15%;height:70px;left-margin:90px;width:150px;"><i class="fa fa-video-camera"></i></a>
                     
						<a href="viewvideos.php"> <input type=	"button" Value="Back"  class="btn btn-success" style="border-radius:15%;height:70px;left-margin:90px;width:150px;"><i class="fa fa-video-camera"></i></a>
						
						
				<?php
				}
				?>
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