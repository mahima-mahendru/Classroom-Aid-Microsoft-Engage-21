<?php
session_start();

if ( $_SESSION[ "umail" ] == "" || $_SESSION[ "umail" ] == NULL ) {
	header( 'Location:AdminLogin.php' );
}

$userid = $_SESSION[ "umail" ];
?>
<!DOCTYPE html>
<html lang="en">
<?php include('after-login.php'); ?>

<body>

 
  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">
      <div class="row">
		<?php
		include( "database.php" );
		if ( isset( $_REQUEST[ 'deleteid' ] ) ) {
			include( "database.php" );
			$deleteid = $_GET[ 'deleteid' ];
			//delete faculty Query
			$sql = "DELETE FROM `facutlytable` WHERE FID = $deleteid";

			if ( mysqli_query( $connect, $sql ) ) {
				echo "

					<br><br>
					<div class='alert alert-success fade in'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<strong>Success!</strong> Faculty Details has been deleted.
					</div>";
			} else {
				//error message if SQL query fails
				echo "<br><Strong>Faculty Details Updation Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error( $connect );
			}
			//close the connection
			mysqli_close( $connect );
		}
		?>
	</div>


        <div class="d-flex justify-content-between align-items-center">
        <h3 class="page-header">Welcome <a href="welcomeadmin">Admin</a> </h3>
		<a href="addnewfaculty"><button type="button" value="Add New Faculty" class="btn btn-success btn-sm" style="border-radius:0%">Add New Faculty</button></a>
			
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container" >
      <?php
			include( "database.php" );
			$sql = "SELECT * from  facutlytable";
			$result = mysqli_query( $connect, $sql );
			echo "<h3 class='page-header' >Facutly Details</h3>";
			echo "<table class='table table-striped table-hover' style='width:100%'>
				<tr>
					<th>#</th>
					<th>FullName</th>
					<th>Father Name</th>
					<th>Address</th>
					<th>Gender</th>
					<th>Joining Date</th>
					<th>City</th>
					<th>Phone Number</th>
					<th>Actions</th>
				<tr>";
				$count=1;
			while ( $row = mysqli_fetch_array( $result ) ) {
				?>

			<tr>
				<td>
					<?PHP echo $count;?>
				</td>
				<td>
					<?PHP echo $row['FName'];?>
				</td>
				<td>
					<?PHP echo $row['FaName'];?>
				</td>
				<td>
					<?PHP echo $row['Addrs'];?>
				</td>
				<td>
					<?PHP echo $row['Gender'];?>
				</td>
				<td>
					<?PHP echo $row['JDate'];?>
				</td>
				<td>
					<?PHP echo $row['City'];?>
				</td>
				<td>
					<?PHP echo $row['PhNo'];?>
				</td>
				
				<td><a href="updatefaculty.php?fid=<?php echo $row['FID']; ?>"><input type="button" Value="Edit" style="border-radius:0%" class="btn btn-success btn-sm"></a>
				<a href="facultydetails.php?deleteid=<?php echo $row['FID']; ?>"><input type="button" Value="Delete" style="border-radius:0%" class="btn btn-danger btn-sm"></a>
				</td>
			</tr>
			<?php $count++; } ?>
			</table>
			
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