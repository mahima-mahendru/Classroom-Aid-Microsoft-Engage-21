<?php include('before-login.php'); ?> 
 
  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
        <legend>
					<h3 style="padding-top: 25px;"><span class="glyphicon glyphicon-lock"></span>&nbsp;Admin Login</h3>
		</legend>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container" style="width:600px">
      <fieldset>
				
				<!-- Admin login form -->
				<form name="adminlogin" action="loginlinkadmin.php" method="POST">
					<div class="control-group form-group">
						<div class="controls">
							<label>Username:</label>
							<input type="text" class="form-control" name="aid">
							<p class="help-block"></p>
						</div>
					</div>
					<div class="control-group form-group">
						<div class="controls">
							<label>Passsword:</label>
							<input type="password" class="form-control" name="apass">
							<p class="help-block"></p>
						</div>
					</div>
					<center>
						<button type="submit" name="login" class="btn btn-success" style="border-radius:0%">Login</button>
						<button type="reset" class="btn btn-danger" style="border-radius:0%">Reset</button>
					</center>
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

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>