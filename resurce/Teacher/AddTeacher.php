<?php 
$teacherId = "";
$teacherPass = "";
$teacherName ="";
$teacherEmail = "";
$teacherPhone = "";
$teacherCer = "";
if (isset($_POST['btnAdd'])) {
    $teacherId = $_POST['txtID'];
    $teacherPass = $_POST['txtPass'];
    $teacherEmail = $_POST['txtEmail'];
    $teacherPhone = $_POST['txtPhone'];
    $teacherCer = $_POST['txtCertificate'];
    $teacherName = $_POST['txtName'];
    $sql = "INSERT INTO `personnel`(PersonnelAccount, ParsonnelPassword, PersonnelEmail, PersonnelPhone, PersonnelName, PersonnelCetificate, PersonnalStatus, RoleId) VALUES ('$teacherId','".md5($teacherPass)."','$teacherEmail',' $teacherPhone','$teacherName','$teacherCer',1,2)";
    mysqli_query($conn, $sql);
    echo '$sql';
    echo '<script> alert("Insert Success!");</script>';
    echo '<meta http-equiv="refresh" content="0;URL=?page=teacher"/>';
}
?>

<div class="container">
    <div class="row">
        <div class="col">
        
				<form method="post" class="form-horizontal">
					<div class="form-group">
						<h3 class="text-center">Add Teacher</h3>
					</div>
					<div class="form-group">
						<label for="txtID">Account:</label>
						<input type="text" class="form-control" id="txtID" required name="txtID" placeholder="User account">
					</div>
					<div class="form-group">
						<label for="txtPass">Password:</label>
						<input type="password" class="form-control" id="txtPass" required name="txtPass" placeholder="Password">
					</div>
                    <div class="form-group">
						<label for="txtName">Full Name:</label>
						<input type="text" class="form-control" id="txtName" required name="txtName" placeholder="Name">
					</div>
                    <div class="form-group">
						<label for="txtPhone">Phone:</label>
						<input type="number" class="form-control" id="txtPhone" required name="txtPhone" placeholder="vd:0963505927">
					</div>
                    <div class="form-group">
						<label for="txtEmail">Email:</label>
						<input type="text" class="form-control" id="txtEmail" required name="txtEmail" placeholder="vd:huygama@ctu.edu.vn">
					</div>
                    <div class="form-group">
						<label for="txtCertificate">Certificate:</label>
						<input type="text" class="form-control" id="txtCertificate" required name="txtCertificate" placeholder="VD: C#">
					</div>
					<input type="submit" class="btn btn-primary" name="btnAdd" value="Add"/>
					<input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
				</form>
        </div>
        </div>
        </div>