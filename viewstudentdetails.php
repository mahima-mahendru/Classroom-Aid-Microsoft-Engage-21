<?php
session_start();

if ( $_SESSION[ "fidx" ] == "" || $_SESSION[ "fidx" ] == NULL ) {
	header( 'Location:facultylogin' );
}

$userid = $_SESSION[ "fidx" ];
$fname = $_SESSION[ "fname" ];
?>
<?php include('after-login.php');  ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">

			<h3> Welcome Faculty : <a href="welcomefaculty.php"><span style="color:#FF0004"> <?php echo $fname; ?></span></a></h3>
			<?php
			include( "database.php" );
			$sql = "select * from  studenttable";
			$result = mysqli_query( $connect, $sql );
			echo "<h2 class='page-header'>Student Details</h2>";
			//below will print all student details to admin
			echo "<table class='table table-striped table-hover' style='width:100%'>
			<tr>
			<th>Enrolment No.</th>
			<th>Name</th>
			<th>Father's Name</th>
			<th>Email</th>
			<th>Address</th>
			<th>Gender</th>
			<th>Course</th>
			<th>DOB</th>
			<th>Contact</th>
			
			</tr>";
			while ( $row = mysqli_fetch_array( $result ) ) {
				?>

			<tr>
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
					<?php echo $row['Eid'];?>
				</td>
				<td>
					<?php echo $row['Addrs'];?>
				</td>
				<td>
					<?php echo $row['Gender'];?>
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
				
			</tr>
			<?php } ?>
			</table>
		</div>
	</div>
	<?php include('allfoot.php'); ?>