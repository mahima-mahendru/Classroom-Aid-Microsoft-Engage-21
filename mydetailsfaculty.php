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
        <h3> Welcome Faculty : <a href="welcomefaculty.php"><span style="color:#FF0004"> <?php echo $fname; ?></span></a></h3>
			
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container" style="margin-left:400px;">
      <?php
			include( 'database.php' );
			$varid = $_REQUEST[ 'myfid' ];
			//selecting data from faculty table
			$sql = "select * from  facutlytable where FID='$varid'";
			$result = mysqli_query( $connect, $sql );
			//loop below will print details of faculty
			while ( $row = mysqli_fetch_array( $result ) ) {
				?>
			<fieldset>
				<legend>My Details</legend>
				<form action="" method="POST" name="update">
					<table class="table table-hover" style="width:600px">

						<tr>
							<td><strong>ID : </strong>
							</td>
							<td>
								<?php echo $row['FID']; ?>
							</td>

						</tr>
						<tr>
							<td><strong>Name :</strong> </td>
							<td>
								<?php echo $row['FName']; ?>
							</td>
						</tr>
						</tr>
						<tr>
							<td><strong>Father Name :</strong> </td>
							<td>
								<?PHP echo $row['FaName'];?>
							</td>
						</tr>
						<tr>
							<td><strong>Address : </strong>
							</td>
							<td>
								<?PHP echo $row['Addrs'];?> </td>
						</tr>
						<tr>
							<td><strong>Gender :</strong>
							</td>
							<td>
								<?PHP echo $row['Gender'];?>
							</td>
						</tr>
						<tr>
							<td><strong>Data Of Joining :</strong>
							</td>
							<td>
								<?PHP echo $row['JDate'];?>
							</td>
						</tr>
						<tr>
							<td><strong>City : </strong>
							</td>
							<td>
								<?PHP echo $row['City'];?>
							</td>
						</tr>
						<tr>
							<td><strong>Phone Number :</strong>
							</td>
							<td>
								<?PHP echo $row['PhNo'];?> </td>
						</tr>
						
						
					</table>
				</form>
			</fieldset>
			<?php
			}
			?>
      <a href="welcomefaculty.php"> <input type="button" Value="Back"  class="btn btn-success" style="border-radius:0%;margin-left:210px;"></a>
			
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