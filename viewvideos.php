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
        <h3> Welcome <a href="welcomestudent.php" <?php echo "<span style='color:red'>".$userfname." ".$userlname."</span>";?> </a></h3>
			
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container">
      <?php 
			
			include('database.php');
			$sql="SELECT * FROM video";
			$rs=mysqli_query($connect,$sql);
			echo "<h2 class='page-header'>Class Details</h2>";
			echo "<table class='table table-striped table-hover' style='width:100%'>
			<tr>
				<th>#</th>
				
				<th>Subject</th>
        <th>Time</th>
				<th>Description</th>
				<th>Class Link</th>	
				
			</tr>";
			$count=1;
		
			while($row=mysqli_fetch_array($rs))
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
				<?PHP echo $row['V_Remarks'];?>
			</td>
							
			<td><a href="viewvideos2.php?viewid=<?php echo $row['V_id']; ?>"> <input type="button" Value="View" style="border-radius:0%"  class="btn btn-info btn-sm"  data-toggle="modal" data-target="#myModal"></a>
			</td>
			
		</tr>
		<?php
		$count++;
	
	}
		?>	
		</table>
    <a href="welcomestudent.php"> <input type="button" Value="Back"  class="btn btn-success" style="border-radius:0%;margin-left:560px;margin-top:50px"></a>
		
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