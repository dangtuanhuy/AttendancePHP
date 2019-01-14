<?php
if (isset($_GET["ma"])) {
    $ma = $_GET["ma"];
    // $conn = new mysqli("localhost", "root", "", "Umbala");
    $sqlstring = "SELECT EducationId, EducationName, EducationDetails FROM education WHERE EducationId='$ma'";

    $result = mysqli_query($conn, $sqlstring);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $eduid = $row['EducationId'];
    $name = $row['EducationName'];
    $details = $row['EducationDetails'];
} else {
    echo '<meta http-equiv="refresh" content="0;URL=?page=education"/>';
}
if (isset($_POST["btnEdit"])) {
    $name = $_POST["txtName"];
    $details = $_POST["txtDetails"];
    $sqlstring = "UPDATE `education` SET 
	EducationName='" . $name . "', EducationDetails ='" . $details . "'
	WHERE EducationId='$ma'";
    mysqli_query($conn, $sqlstring);
    echo '<meta http-equiv="refresh" content="0;URL=?page=education"/>';
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
        
				<form method="post" class="form-horizontal">
					<div class="form-group">
						<h4 class="text-center">Update Education</h4>
					</div>
					<div class="form-group">
						<label for="txtID">ID:</label>
						<input type="text" class="form-control" id="txtID" required name="txtID" placeholder="ID" value='<?php echo $eduid; ?>' readonly=''>
					</div>
					<div class="form-group">
						<label for="txtName">Name:</label>
						<input type="text" class="form-control" id="txtName" required name="txtName" placeholder="Name" value='<?php echo $name; ?>'>
					</div>
                    <div class="form-group">
						<label for="txtDetails">Details:</label>
			
                        <textarea class="form-control"  id="txtDetails" required name="txtDetails" placeholder="Details" ><?php echo $details; ?></textarea>
					</div>
					<input type="submit" class="btn btn-primary" name="btnEdit" value="Update"/>
					<input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
				</form>
        </div>
        </div>
        </div>