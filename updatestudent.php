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
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container" style='width:700px'>
      <?php
			include( "database.php" );
			$new3 = $_GET[ 'eno' ];
			//below query will print the existing record of student
			$sql = "SELECT * from  studenttable where Eno=$new3";
			$result = mysqli_query( $connect, $sql );

			while ( $row = mysqli_fetch_array( $result ) ) {
				?>
			<form action="" method="POST" name="update">
				<div class="form-group">
					Enrolment number : <?php echo $row['Eno']; ?>
				</div>
				<div class="form-group">
					First Name : <input type="text" name="fname" class="form-control" value="<?php echo $row['FName']; ?>">
				</div>
				<div class="form-group">
					Last Name : <input type="text" name="lname" class="form-control" value="<?php echo $row['LName']; ?>"><br>
				</div>
				<div class="form-group">
					Father Name : <input type="text" name="faname" class="form-control" value="<?PHP echo $row['FaName'];?>"><br>
				</div>
				<div class="form-group">
					Addres : <input type="text" name="addrs" class="form-control" value="<?PHP echo $row['Addrs'];?>"><br>
				</div>
				<div class="form-group">
					Gender : <input type="text" name="gender" class="form-control" value="<?PHP echo $row['Gender'];?>"><br>
				</div>
				<div class="form-group">
					Course : <input type="text" name="course" class="form-control" value="<?PHP echo $row['Course'];?>"><br>
				</div>
				<div class="form-group">
					D.O.B. : <input type="text" name="DOB" class="form-control" value="<?PHP echo $row['DOB'];?>" readonly><br>
				</div>
				<div class="form-group">
					Phone Number : <input type="text" name="phno" class="form-control" value="<?PHP echo $row['PhNo'];?>" maxlength="10"><br>
				</div>
				<div class="form-group">
					Email : <input type="text" name="email" class="form-control" value="<?PHP echo $row['Eid'];?>" readonly><br>
				</div>
				<div class="form-group">
					Password : <input type="text" name="pass" class="form-control" value="<?PHP echo $row['Pass'];?>"><br>
				</div><br>
				<div class="form-group">

					<input type="submit" value="Update" name="update" style="border-radius:0%" class="btn btn-success">
				</div>
			</form>
			<?php
			}
			?>

			<?php

			if ( isset( $_POST[ 'update' ] ) ) {
				$tempfname = $_POST[ 'fname' ];
				$templname = $_POST[ 'lname' ];
				$tempfaname = $_POST[ 'faname' ];
				$tempaddrs = $_POST[ 'addrs' ];
				$tempgender = $_POST[ 'gender' ];
				$tempcourse = $_POST[ 'course' ];
				$tempphno = $_POST[ 'phno' ];
				$tempeid = $_POST[ 'email' ];
				$temppass = $_POST[ 'pass' ];
				//below query will update the existing record of student
				$sql = "UPDATE `studenttable` SET FName='$tempfname', LName='$templname', FaName='$tempfaname', Gender='$tempgender', Course='$tempcourse', Addrs='$tempaddrs', PhNo=$tempphno, Eid='$tempeid', Pass='$temppass'  WHERE Eno=$new3";


				if ( mysqli_query( $connect, $sql ) ) {
					echo "

					<br><br>
					<div class='alert alert-success fade in'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<strong>Success!</strong> Student Details has been updated.
					</div>

					";
				} else {
					//below statement will print error if SQL query fail.
					echo "<br><Strong>Student Updation Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error( $connect );
				}
				//for close connection
				mysqli_close( $connect );

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