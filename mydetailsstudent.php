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
        <h3> Welcome <a href="welcomestudent"><?php echo "<span style='color:red'>".$userfname." ".$userlname."</span>";?></a></h3>
			
		</div>

        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container" style="margin-left:400px;">
	  <?php
			include( 'database.php' );
			$varid = $_REQUEST[ 'myds' ];
			//selecting data from assessment table
			$sql = "select * from  studenttable where Eid='$varid'";
			$result = mysqli_query( $connect, $sql );
			//loop below will print details of assessment
			while ( $row = mysqli_fetch_array( $result ) ) {
				?>
			<fieldset>
				<legend>My Details</legend>
				<form action="" method="POST" name="update">
					<table class="table table-hover" style="width:600px">

						<tr>
							<td><strong>Enrolment number : </strong>
							</td>
							<td>
								<?php echo $row['Eno']; ?>
							</td>

						</tr>
						<tr>
							<td><strong>First Name :</strong> </td>
							<td>
								<?php echo $row['FName']; ?>
							</td>
						</tr>
						<tr>
							<td><strong>Last Name :</strong> </td>
							<td>
								<?php echo $row['LName']; ?>
							</td>
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
							<td><strong>Course : </strong>
							</td>
							<td>
								<?PHP echo $row['Course'];?>
							</td>
						</tr>
						<tr>
							<td><strong>D.O.B. : </strong> </td>
							<td>
								<?PHP echo $row['DOB'];?>
							</td>
						</tr>
						<tr>
							<td><strong>Contact :</strong>
							</td>
							<td>
								<?PHP echo $row['PhNo'];?> </td>
						</tr>
						<tr>
							<td><strong>Email : </strong>
							</td>
							<td>
								<?PHP echo $row['Eid'];?>
							</td>
						</tr>
						
						
					</table>
				</form>
			</fieldset>
			<?php
			}
			?>
			<a href="welcomestudent.php"> <input type="button" Value="Back"  class="btn btn-success" style="border-radius:0%;margin-left:160px;margin-top:50px"></a>
		
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