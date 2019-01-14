<?php 
$eduid = "";
$name = "";
$details = "";
if (isset($_POST['btnAdd'])) {
	$eduid = $_POST['txtID'];
	$name = $_POST['txtName'];
	$details = $_POST['txtDetails'];
	$sql = "INSERT INTO `education`(`EducationId`, `EducationName`, `EducationDetails`) VALUES ('$eduid','$name','$details')";
	mysqli_query($conn, $sql);
	echo '<script> alert("Insert Success!");</script>';
	echo '<meta http-equiv="refresh" content="0;URL=?page=education"/>';
}
?>

<div class="container">
    <div class="row">
        <div class="col">
        
				<form method="post" class="form-horizontal">
					<div class="form-group">
						<h3 class="text-center">Add Education</h3>
					</div>
					<div class="form-group">
						<label for="txtID">ID:</label>
						<input type="text" class="form-control" id="txtID" required name="txtID" placeholder="ID">
					</div>
					<div class="form-group">
						<label for="txtName">Name:</label>
						<input type="text" class="form-control" id="txtName" required name="txtName" placeholder="Name">
					</div>
                    <div class="form-group">
						<label for="txtDetails">Details:</label>
						<input type="text" class="form-control" id="txtDetails" required name="txtDetails" placeholder="Details">
					</div>
					<input type="submit" class="btn btn-primary" name="btnAdd" value="Add"/>
					<input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
				</form>
        </div>
        </div>
        </div>