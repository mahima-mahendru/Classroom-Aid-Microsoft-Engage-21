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
			<a href="addnewstudent"><button type="button" value="AddNewStudent" class="btn btn-success btn-sm" style="border-radius:0%">Add New Student</button></a>
			
        </div>
        <div class="row">
		<?php
		include( "database.php" );
		if ( isset( $_REQUEST[ 'deleteid' ] ) ) {
			$deleteid = $_GET[ 'deleteid' ];
			//below will delete a particular student
			$sql = "DELETE FROM `studenttable` WHERE Eno = $deleteid";
			if ( mysqli_query( $connect, $sql ) ) {
				echo "
				<br><br>
				<div class='alert alert-success fade in'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<strong>Success!</strong> Student details deleted.
				</div>
				";
			} else {
				echo "<br><Strong>Student Updation Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error( $connect );
			}
		}
		mysqli_close( $connect );
		?>
	</div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container">
      <?php
			include( "database.php" );
			$sql = "SELECT * from  studenttable";
			$result = mysqli_query( $connect, $sql );
			echo "<h2 class='page-header'>Student Details</h2>";
			
			//below will print all student details to admin
			echo "<table class='table table-striped table-hover' style='width:auto;margin:0px'>
				<tr>
				<th>#</th>
				<th>Enrolment</th>
				<th>Name</th>
				<th>Father's Name</th>
				<th>Address</th>
				<th>Course</th>
				<th>DOB</th>
				<th>Contact</th>
				<th>Email</th>
				<th>Action</th>		
				</tr>";
				$count=1;
			while ( $row = mysqli_fetch_array( $result ) ) {
				?>

			<tr>
				<td>
					<?php echo $count;?>
				</td>
				<td>
					<?php echo $row['Eno'];?>
				</td>
				<td>
					<?php echo $row['FName'];?> <?php echo $row['LName'];?>
				</td>
			
				<td>
					<?php echo $row['FaName'];?>
				</td>
				<td>
					<?php echo $row['Addrs'];?>
				</td>
				
				<td>
					<?php echo $row['Course'];?>
				</td>
				<td>
					<?php echo $row['DOB'];?>
				</td>
				<td>
					<?php echo $row['PhNo'];?>
				</td>
				<td>
					<?php echo $row['Eid'];?>
				</td>
				
				<td><a href="updatestudent.php?eno=<?php echo $row['Eno']; ?>"><input type="button" Value="Edit" class="btn btn-success btn-sm" style="border-radius:0%"></a>
				<a href="studentdetails.php?deleteid=<?php echo $row['Eno']; ?>"><input type="submit" Value="Delete" name="delete" class="btn btn-danger btn-sm" style="border-radius:0%"></a>
				</td>
			</tr>
			<?php $count++; } ?>
			</table>
			<a href="welcomeadmin.php"> <input type="button" Value="Back"  class="btn btn-success" style="border-radius:0%;margin-left:650px;margin-top:50px"></a>
		
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