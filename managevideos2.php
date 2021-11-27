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
			include( 'database.php' );
			$make = $_GET[ 'editassid' ];
			//selecting data form Video details table form database
			$sql = "SELECT * FROM video WHERE V_id=$make";
			$rs = mysqli_query( $connect, $sql );
			while ( $row = mysqli_fetch_array( $rs ) ) {
				?>
			<fieldset>
			
				<form action="" method="POST" name="UpdateVideo">
					<table class="table table-hover" style="width:600px;">

						<tr>
							<td><strong>ID</strong>
							</td>
							<td>
								<?php $V_id=$row['V_id']; echo $V_id; ?>
							</td>

						</tr>
						<tr>
						<td><strong>Subject</strong>
							</td>
							<td>
							<textarea name="V_Title" rows="1" cols="50" class="form-control"><?php $V_Title=$row['V_Title']; echo $V_Title; ?></textarea>
							</td>
							
						</tr>	
						<td><strong>Time</strong>
							</td>
							<td>
							<textarea name="V_Time" rows="1" cols="50" class="form-control"><?php $V_Time=$row['V_Time']; echo $V_Time; ?></textarea>
							</td>
							
						</tr>
						<tr>
							<td><strong>Class Link</strong>
							</td>
							<td>
							<textarea name="V_Url" rows="2" cols="150" class="form-control"><?php $V_Url=$row['V_Url']; echo $V_Url; ?></textarea>
							</td>
						</tr>
						<tr>
							<td><strong>Description</strong>
							</td>
							<td>
							<textarea name="V_Remarks" rows="2" cols="150" class="form-control"><?php $V_Remarks=$row['V_Remarks']; echo $V_Remarks; ?></textarea>
							</td>
						</tr>							
						<td><button type="submit" name="update" class="btn btn-success" style="border-radius:0%">Update</button>
			             </td>
						<?php
						}
						?>
						<?php 

							if(isset($_POST['update']))
							{
							
							$V_Title= $_POST['V_Title'];
							$V_Time= $_POST['V_Time'];
							$V_Url= $_POST['V_Url'];
							$V_Remarks= $_POST['V_Remarks'];
							
							$sql = "UPDATE `video` SET V_Title='$V_Title' ,V_Time='$V_Time', V_Url='$V_Url' , V_Remarks='$V_Remarks' WHERE V_id=$make";

							if (mysqli_query($connect, $sql)) {
								echo "
								<br><br>
								<div class='alert alert-success fade in'>
								<a href='manageassessment.php' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
								<strong>Success!</strong> Videos Updated.
								</div>
								";
								} else {
								//error message if SQL query fails
								echo "<br><Strong>Video Updation Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error($connect);

								//close the connection
								mysqli_close($connect);
								}
							}
							?> 
					</table>
				</form>
			</fieldset>
			<a href="managevideos.php"> <input type="button" Value="Back"  class="btn btn-success" style="border-radius:0%;width:80px"></a>
						
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