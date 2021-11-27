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
        <h3> Welcome Faculty : <a href="welcomefaculty.php" ><span style="color:#FF0004"> <?php echo $fname; ?></span></a> </h3>
			
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container">
      <?PHP
		include( "database.php" );
		if ( isset( $_POST[ 'submit' ] ) ) {
			$title = $_POST[ 'videotitle' ];
			$v_url = $_POST[ 'VideoURL' ];
			$v_info = $_POST[ 'Videoinfo' ];
			$v_time=$_POST[ 'videotime'];

			$done = "
					<center>
					<div class='alert alert-success fade in __web-inspector-hide-shortcut__'' style='margin-top:10px;'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>&times;</a>
					<strong><h3 style='margin-top: 10px;
					margin-bottom: 10px;'> Video added Sucessfully.</h3>
					</strong>
					</div>
					</center>
					";

			$sql = "INSERT INTO `Video` (`V_Title`, `V_Url`, `V_Remarks`,`V_Time`) VALUES ('$title','$v_url','$v_info','$v_time')";
			//close the connection
			mysqli_query( $connect, $sql );

			
		}

		?>
		
			<fieldset>
				<legend>Add Class Links</legend>
				<form action="" method="POST" name="AddAssessment">
					<table class="table table-hover" style="width:600px;left-margin:200px">

						<tr>
							<td><strong>Subject</strong>
							</td>
							<td>
								<input type="text" class="form-control" name="videotitle">
							</td>

						</tr>
						<tr>
							<td><strong>Class Link</strong> </td>
							<td>
								<textarea name="VideoURL" class="form-control" rows="2" cols="150"></textarea>
							</td>
						</tr>
						<tr>
							<td><strong>Time</strong> </td>
							<td>
								<textarea name="videotime" class="form-control" rows="2" cols="150"></textarea>
							</td>
						</tr>
						
						<tr>
							<td><strong>Description</strong> </td>
							<td>
								<textarea name="Videoinfo" class="form-control" rows="3" cols="150"></textarea>
							</td>
						</tr>
						
						
					</table>
					<button type="submit" name="submit" class="btn btn-success" style="border-radius:0%;height:50px;width:150px;">Add</button>
						
						
				</form>
			</fieldset>
			<a href="videos.php"> <input type=	"button" Value="Back"  class="btn btn-success" style="border-radius:0%;height:50px;width:150px;"><i class="fa fa-video-camera"></i></a>
						
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