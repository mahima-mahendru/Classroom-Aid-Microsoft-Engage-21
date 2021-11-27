<?php
session_start();

if($_SESSION["umail"]=="" || $_SESSION["umail"]==NULL)
{
header('Location:AdminLogin.php');
}

$userid = $_SESSION["umail"];
?><?php include('after-login.php'); ?>
	<div class="container">
     <div class="row">
			<div class="col-md-3"></div>

			<div class="col-md-6">
				<h3 class="page-header">Welcome <a href="welcomeadmin">Admin</a> </h3>
				<?php
				include("database.php");
				$new2=$_GET['fid'];
				
     			$sql="select * from  facutlytable where FID=$new2";
				$result=mysqli_query($connect,$sql);
				
				while($row=mysqli_fetch_array($result))
				{ 
				?>
				<form action="" method="POST" name="update">
				<div class="form-group">
				Faculty ID : <?php echo $row['FID']; ?></div>
				<div class="form-group">
				Faculty Name : <input type="text" name="fname" class="form-control" value="<?php echo $row['FName']; ?>"></div>
				<div class="form-group">
				Father Name : <input type="text" name="faname" class="form-control" value="<?PHP echo $row['FaName'];?>"><br></div>
				<div class="form-group">
				Address : <input type="text" name="addrs" class="form-control" rows="5" cols="40" value="<?PHP echo $row['Addrs'];?>"><br></div>
				<div class="form-group">
				Gender : <input type="text" name="gender" class="form-control" value="<?PHP echo $row['Gender'];?>"><br></div>
				<div class="form-group">
				Phone Number : <input type="tel" name="phno" class="form-control" value="<?PHP echo $row['PhNo'];?>" maxlength="10"><br></div>
				<div class="form-group">
				Joining Date : <input type="date" name="jdate" class="form-control" value="<?PHP echo $row['JDate'];?>" readonly> <br></div>
				<div class="form-group">
				City : <input type="text" name="city" class="form-control" value="<?PHP echo $row['City'];?>" ><br></div>
				<div class="form-group">
				Password : <input type="text" name="pass" class="form-control" value="<?PHP echo $row['Pass'];?>" maxlength="10"><br></div><br>
				<div class="form-group">
				<input type="submit" value="Make Changes" name="update" class="btn btn-success" style="border-radius:0%"></div>
				
				</form>
				<?php
				}
				?>
           
          <?php
		if(isset($_POST['update']))		
			{
				$tempfname=$_POST['fname'];				
				$tempfaname=$_POST['faname'];
				$tempaddrs=$_POST['addrs'];					
				$tempgender=$_POST['gender'];
				$tempphno=$_POST['phno'];
				$tempcity=$_POST['city'];
				$temppass=$_POST['pass'];
				//below SQL query will update the existing faculty 
				$sql="UPDATE `facutlytable` SET FName='$tempfname',FaName='$tempfaname',Addrs='$tempaddrs', Gender='$tempgender', City='$tempcity',Pass='$temppass', PhNo=$tempphno WHERE FID=$new2"; 
				
				if (mysqli_query($connect, $sql)) {
					echo "<br>

					<br><br>
					<div class='alert alert-success fade in'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<strong>Success!</strong> Faculty Details updated has been deleted.
					</div>";
					} else {
					// below statement will print error
					echo "<br><Strong>Faculty Details Updating Faliure. Try Again</strong><br> Error Details: " . $sql . "<br>" . mysqli_error($connect);
					}
				//for close connection
					mysqli_close($connect);
						} 
				?>
            </div>
			

			<div class="col-md-3"></div>
	</div>
<?php include('allfoot.php'); ?>