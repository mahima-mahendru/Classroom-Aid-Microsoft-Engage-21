<!DOCTYPE html>
<html lang="en">
<?php include('before-login.php'); ?>
session_start();
<script>
	//javascript validation for various fildss
	function validateForm() {
		var fname = document.forms[ "register" ][ "fname" ].value;
		var lname = document.forms[ "register" ][ "lname" ].value;
		var faname = document.forms[ "register" ][ "faname" ].value;
		var course = document.forms[ "register" ][ "course" ].value;
		var dob = document.forms[ "register" ][ "dob" ].value;
		var addrs = document.forms[ "register" ][ "addrs" ].value;
		var gender = document.forms[ "register" ][ "gender" ].value;
		var phno = document.forms[ "register" ][ "phno" ].value;
		var x = document.forms[ "register" ][ "email" ].value;
		var atpos = x.indexOf( "@" );
		var dotpos = x.lastIndexOf( "." );
		var pass = document.forms[ "register" ][ "pass" ].value;
		if ( fname == null || fname == "" ) {
			alert( "First Name must be filled out" );
			return false;
		}
		if ( lname == null || lname == "" ) {
			alert( "Last Name must be filled out" );
			return false;
		}
		if ( faname == null || faname == "" ) {
			alert( "Father Name must be filled out" );
			return false;
		}
		if ( course == null || course == "" ) {
			alert( "Course must be filled out" );
			return false;
		}
		if ( dob == null || dob == "" ) {
			alert( "Date of birth must be filled out" );
			return false;
		}
		if ( addrs == null || addrs == "" ) {
			alert( "Address must be filled out" );
			return false;
		}
		if ( gender == null || gender == "" ) {
			alert( "Gender must be filled out" );
			return false;
		}
		if ( phno == null || phno == "" ) {
			alert( "Phone Number must be filled out" );
			return false;
		}
		if ( atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length ) {
			alert( "Not a valid e-mail address" );
			return false;
		}
		if ( pass == null || pass == "" ) {
			alert( "Password must be filled out" );
			return false;
		}
	}
</script>

<!-- ===========body section ========= ---->

<body>
  
  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
        <legend>
						<h3 style="padding-top: 25px;"> Registration Form </h3>
					</legend>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container" style="width:600px">
	  <div class="row">
		<?PHP
		include( "database.php" );
		if ( isset( $_POST[ 'submit' ] ) ) {
			$fname = $_POST[ 'fname' ];
			$lname = $_POST[ 'lname' ];
			$faname = $_POST[ 'faname' ];
			$course = $_POST[ 'course' ];
			$dob = $_POST[ 'dob' ];
			$addrs = $_POST[ 'addrs' ];
			$gender = $_POST[ 'gender' ];
			$phno = $_POST[ 'phno' ];
			$email = $_POST[ 'email' ];
			$pass = $_POST[ 'pass' ];		

			$sql = "INSERT INTO `studenttable` (`FName`, `LName`, `FaName`, `DOB`, `Addrs`, `Gender`, `PhNo`, `Eid`, `Pass`,`Course`) VALUES ('$fname','$lname','$faname','$dob','$addrs','$gender','$phno','$email','$pass','$course')";
			//close the connection
			$query_run=mysqli_query( $connect, $sql );
             if($query_run)
			 {
				 $_SESSION['status']="Registration Complete!";
				 $_SESSION['status_code']="success";
				 
			 }
			 else
			 {
				 $_SESSION['status']="Registration Incomplete!";
				 $_SESSION['status_code']="error";
			

			 }		
			
		}

		?>

	</div>
      <form name="register" action="" method="POST" onsubmit="return validateForm()">
				<fieldset>
					
					<div class="control-group form-group">
						<div class="controls">
							<label>First Name: <span style="color: #ff0000;">*</span></label>
							<input type="text" class="form-control" name="fname" id="fname" maxlength="30">
							<p class="help-block"></p>
						</div>
					</div>

					<div class="control-group form-group">
						<div class="controls">
							<label>Last Name: <span style="color: #ff0000;">*</span></label>
							<input type="text" class="form-control" name="lname" id="lname" maxlength="30">
							<p class="help-block"></p>
						</div>
					</div>

					<div class="control-group form-group">
						<div class="controls">
							<label>Father Name: <span style="color: #ff0000;">*</span></label>
							<input type="text" class="form-control" name="faname" id="faname" maxlength="30">
							<p class="help-block"></p>
						</div>
					</div>
					

					<div class="control-group form-group">
						<div class="controls">
							<label>Course: <span style="color: #ff0000;">*</span></label>
							<input type="text" class="form-control" name="course" id="course" maxlength="10">
							<p class="help-block"></p>
						</div>
					</div>

					<div class="control-group form-group">
						<div class="controls">
							<label>Date of Birth: <span style="color: #ff0000;">*</span></label>
							<input type="Date" class="form-control" name="dob" id="dob">
							<p class="help-block"></p>
						</div>
					</div>

					<div class="control-group form-group">
						<div class="controls">
							<label>Address: <span style="color: #ff0000;">*</span></label>
							<textarea class="form-control" name="addrs" id="addrs"></textarea>
							<p class="help-block"></p>
						</div>
					</div>

					<div class="control-group form-group">
						<div class="controls">
							<label>Gender: <span style="color: #ff0000;">*</span></label>
							<p>
								<label>
								<input type="radio" name="gender" value="Male" id="Gender_0" checked>
								Male</label>
															

								<label>
								<input type="radio" name="gender" value="Female" id="Gender_1">
								Female</label>
							
								<br>
							</p>
							<p class="help-block"></p>
						</div>
					</div>

					<div class="control-group form-group">
						<div class="controls">
							<label>Contact (format: without code only 10 digits): <span style="color: #ff0000;">*</span></label>
							<input type="tel" pattern="^\d{10}$" required class="form-control" name="phno" id="phno" maxlength="10">
							<p class="help-block"></p>
						</div>
					</div>

					<div class="control-group form-group">
						<div class="controls">
							<label>Email Id: <span style="color: #ff0000;">*</span></label>
							<input type="text" class="form-control" name="email" id="email" maxlength="50">
							<p class="help-block"></p>
						</div>
					</div>


					<div class="control-group form-group">
						<div class="controls">
							<label>Password: <span style="color: #ff0000;">*</span></label>
							<input type="password" class="form-control" name="pass" id="pass" maxlength="30"> <span style="color: #ff0000;">*Max Length 30</span>
							<p class="help-block"></p>
						</div>
					</div>

					<button type="submit" name="submit" class="btn btn-primary">Register</button>
					<button type="reset" name="reset" class="btn btn-danger">Clear</button>
                    

				</fieldset>
			</form>
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
  <script src="js/sweetalert.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <?php include('alert.php'); ?>

  
</body>

</html>