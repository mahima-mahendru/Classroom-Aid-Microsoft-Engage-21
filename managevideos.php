<?php
session_start();

if ( $_SESSION[ "fidx" ] == "" || $_SESSION[ "fidx" ] == NULL ) {
	header( 'Location:facultylogin' );
}

$userid = $_SESSION[ "fidx" ];
$fname = $_SESSION[ "fname" ];
?>
<!DOCTYPE html>
<html lang="en">

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
      <?php
		include( "database.php" );
		if ( isset( $_REQUEST[ 'deleteid' ] ) ) {

			//getting data from another page
			$deleteid = $_GET[ 'deleteid' ];
			$sql = "DELETE FROM `video` WHERE V_id = $deleteid";
			if ( mysqli_query( $connect, $sql ) ) {
				echo "
						<br><br>
						<div class='alert alert-success fade in'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<strong>Success!</strong> Videos details deleted.
						</div>
						";
			} else {
				//error message if SQL query fails
				echo "<br><Strong>Videos Details Updation Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error( $connect );
			}
		}
		//close the connection
		mysqli_close( $connect );
		?>
			
			<?php 
				
				include('database.php');
				$sql="SELECT * FROM video";
				$rs=mysqli_query($connect,$sql);
				echo "<h2 class='page-header'>Videos Details</h2>";
				echo "<table class='table table-striped' style='width:100%'>
				<tr>
					<th>#</th>
					<th>Subject</th>
					<th>Time</th>
					<th>Class Link</th>
					<th>Description</th>
					<th>Actions</th>		
				</tr>";
				$count = 1;
				while( $row = mysqli_fetch_array($rs) )
				{
				?>
			<tr>
				<td>
					<?PHP echo $count;?>
				</td>
				<td>
					<?PHP echo $row['V_Title'];?>
				</td>
				<td>
					<?PHP echo $row['V_Time'];?>
				</td>
				
				<td>
				<a href="<?php echo $row['V_Url']; ?>"><input type=	"url" Value="Link"  class="btn btn-info" style="border-radius:0%;color:black;background:white;width:60px"><i class="fa fa-video-camera"></i></a>

				</td>
				<td>
					<?PHP echo $row['V_Remarks'];?>
				</td>

								
				<td><a href="managevideos.php?deleteid=<?php echo $row['V_id']; ?>"> <input type="button" Value="Delete"  class="btn btn-danger btn-sm" style="border-radius:0%" data-toggle="modal" data-target="#myModal"></a>
				<a href="managevideos2.php?editassid=<?php echo $row['V_id']; ?>"> <input type="button" Value="Edit"  class="btn btn-success btn-sm" style="border-radius:0%" data-toggle="modal" data-target="#myModal"></a>
				
				</td>
			</tr>
			<?php
		$count++;	}
			?>	
			</table>
			<a href="welcomefaculty.php"> <input type="button" Value="Back"  class="btn btn-success" style="border-radius:0%;margin:0 auto;display:block;"></a>
			
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