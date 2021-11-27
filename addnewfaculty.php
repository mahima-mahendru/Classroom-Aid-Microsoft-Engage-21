<?php
session_start();

if ( $_SESSION[ "umail" ] == "" || $_SESSION[ "umail" ] == NULL ) {
	header( 'Location:AdminLogin.php' );
}

$userid = $_SESSION[ "umail" ];
?>
<?php include('after-login.php'); ?> 

<!DOCTYPE html>
<html lang="en">
<body>
  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
        <h3 class="page-header">Welcome <a href="welcomeadmin">Admin</a> </h3>
		<h4 class="page-header">Add New Faculty </h4>
          
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container" style="width:600px">
      <?php
			include( "database.php" );
			?>
			<form action="" method="POST" name="update">


				<div class="form-group">
					<label for="Faculty Name">Faculty Name : <span style="color: #ff0000;">*</span></label>
					<input type="text" name="fname" class="form-control" id="fname" required>
				</div>

				<div class="form-group">
					<label for="Father Name">Father Name :<span style="color: #ff0000;">*</span></label>
					<input type="text" class="form-control" id="faname" name="faname" required>
				</div>

				<div class="form-group">
					<label for="Address">Address : <span style="color: #ff0000;">*</span></label>
					<input type="text" class="form-control" name="addrs" required id="addrs">
				</div>

				<div class="form-group">
					<label for="Gender">Gender : &nbsp;</label>
					<input type="radio" name="gender" value="Male" id="Gender_0" checked> Male
					<input type="radio" name="gender" value="Female" id="Gender_1"> Female
				</div>

				<div class="form-group">
					<label for="PhoneNumber">Contact : <span style="color: #ff0000;">*</span></label>
					<input type="text" class="form-control" id="phno" name="phno" maxlength="10" required>
				</div>

				<div class="form-group">
					<label for="Joining Date">Joining Date : <span style="color: #ff0000;">*</span></label>
					<input type="date" class="form-control" id="jdate" name="jdate" placeholder="YYYY-MM-DD" required>
				</div>

				<div class="form-group">
					<label for="City">City : <span style="color: #ff0000;">*</span></label>
					<input type="text" class="form-control" id="city" name="city" required>
				</div>

				<div class="form-group">
					<label for="Password">Password :<span style="color: #ff0000;">*</span></label>
					<input type="password" class="form-control" name="pass" required id="pass">
				</div>
					<br>
				<div class="form-group">
					<input type="submit" value="Add New Faculty" name="addnewfaculty" style="border-radius:0%" class="btn btn-success">
				</div>

			</form>
			<?php
			//}
			?>

			<?php
			if ( isset( $_POST[ 'addnewfaculty' ] ) ) {
				$tempfname = $_POST[ 'fname' ];
				$tempfaname = $_POST[ 'faname' ];
				$tempaddrs = $_POST[ 'addrs' ];
				$tempgender = $_POST[ 'gender' ];
				$tempphno = $_POST[ 'phno' ];
				$tempjdate = $_POST[ 'jdate' ];
				$tempcity = $_POST[ 'city' ];
				$temppass = $_POST[ 'pass' ];
				// adding new faculty
				$sql = "insert facutlytable (FName, FaName, Addrs, Gender, JDate, City, Pass, PhNo) values ('$tempfname', '$tempfaname', '$tempaddrs','$tempgender', '$tempjdate', '$tempcity' , '$temppass','$tempphno')";

				if ( mysqli_query( $connect, $sql ) ) {

					echo "<br>
					<br><br>
					<div class='alert alert-success fade in'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<strong>Success!</strong> New Faculty Addded Faculty ID is : <strong>" . mysqli_insert_id( $connect ) . "</strong></div>";

				} else {
					//error message if SQL query Fails
					echo "<br><Strong>New Faculty Adding Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error( $connect );
				}
				//close the connection
				mysqli_close( $connect );

			}


			?>
			<br>
			<a href="facultydetails.php"> <input type="button" Value="Back"  class="btn btn-success" style="border-radius:0%;width:155px"></a>
			
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