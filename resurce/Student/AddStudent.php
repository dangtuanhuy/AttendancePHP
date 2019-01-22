<?php 
$studentcode = "";
$studentname = "";
$studentbirth = date_default_timezone_set('Asia/Ho_Chi_Minh');
$studentphone = "";
$studentemail = "";
$studentaddres = "";
if (isset($_POST['btnAdd'])) {
	$sql_query_student = "SELECT `StudentCode` FROM `student`";
	$result_query_student = mysqli_query($conn, $sql_query_student);
	$listStudentCode = array();
	while ($row_query_studentCode = mysqli_fetch_array($result_query_student)) {
		array_push($listStudentCode,$row_query_studentCode [0]);
	}
	if(in_array($_POST['txtID'],$listStudentCode))
	{
		echo '<script> alert("Available code in the database!");</script>';
	}
	else if((date("Y-m-d") - date('Y-m-d',  strtotime($_POST["txtDate"]))) < 18)
	{
		echo '<script> alert("Sorry, but you are not yet 18 years old!");</script>';
	}
	else{
    $studentcode = $_POST['txtID'];
    $studentname = $_POST['txtName'];
    $studentbirth = $_POST['txtDate'];
    $studentphone = $_POST['txtPhone'];
    $studentemail = $_POST['txtEmail'];
    $studentaddres = $_POST['txtAddress'];
    $sql = "INSERT INTO `student`(`StudentCode`, `StudentName`, `StudentBirth`, `StudentPhone`, `StudentAddress`, `StudentEmail`) VALUES ('$studentcode','$studentname','$studentbirth ','$studentphone ','$studentaddres',' $studentemail')";
    mysqli_query($conn, $sql);
    echo '<script> alert("Insert Success!");</script>';
	echo '<meta http-equiv="refresh" content="0;URL=?page=student"/>';
	}
}
?>

<div class="container">
    <div class="row">
        <div class="col">
        
				<form method="post" class="form-horizontal">
					<div class="form-group">
						<h3 class="text-center">Add Student</h3>
					</div>
					<div class="form-group">
						<label for="txtID">Roll.No:</label>
						<input type="text" class="form-control" id="txtID" required name="txtID" placeholder="A17007">
					</div>
					<div class="form-group">
						<label for="txtName">Name:</label>
						<input type="text" class="form-control" id="txtName" required name="txtName" placeholder="Name">
					</div>
                    <div class="form-group">
						<label for="txtDate">Date of Birth:</label>
						<input type="date" class="form-control" id="txtDate" required name="txtDate" placeholder="Details">
					</div>
                    <div class="form-group">
						<label for="txtPhone">Phone:</label>
						<input type="text" class="form-control" id="txtPhone" required name="txtPhone" placeholder="0963505927">
					</div>
                    <div class="form-group">
						<label for="txtAddress">Address:</label>
						<input type="text" class="form-control" id="txtAddress" required name="txtAddress" placeholder="Address">
					</div>
                    <div class="form-group">
						<label for="txtEmail">Email:</label>
						<input type="email" class="form-control" id="txtEmail" required name="txtEmail" placeholder="huygama@gmail.com">
					</div>
					<input type="submit" class="btn btn-primary" name="btnAdd" value="Add"/>
					<input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
				</form>
        </div>
        </div>
        </div>