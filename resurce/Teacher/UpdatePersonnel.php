<?php 
$sqlselect = "SELECT `PersonnelAccount`, `ParsonnelPassword`, `PersonnelEmail`, `PersonnelPhone`, `PersonnelName`, `PersonnelCetificate` FROM `personnel` WHERE PersonnelAccount = '" . $_SESSION['username'] . "'";
$result = mysqli_query($conn, $sqlselect);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$user = $_SESSION['username'];
$fullname = $row["PersonnelName"];
$email = $row["PersonnelEmail"];
$certificate = $row["PersonnelCetificate"];
$phone = $row["PersonnelPhone"];
//Update with submit
//Function Check
function Check()
{
	if ($_POST['txtName'] == "" || $_POST['txtCertificate'] == "" || $_POST["txtEmail"] == "" || $_POST["txtPhone"] == "") {
		return "<p >Please enter full information.</p>";
	} elseif ($_POST['txtPass'] != $_POST['txtPass']) {
		return "<p >The two passwords must be identical.</p>";
	} elseif (strlen($_POST['txtPass']) <= 5 && strlen($_POST['txtPass']) > 0) {
		return "<p >Passwords must be greater than 5 characters. </p>";
	} else {
		return "";
	}
}
if (isset($_POST['btnUpdate'])) {
	$query = "SELECT `PersonnelEmail`, `PersonnelPhone`, `PersonnelName`, `PersonnelCetificate` FROM `personnel` WHERE PersonnelAccount = '" . $_SESSION['username'] . "'";
	$result = mysqli_query($conn, $query) or die(mysqli_error());
	$row = mysqli_fetch_row($result);
	if ($_POST['txtPass'] != "") {
		$password = $_POST['txtPass'];
	}
	$fullname = $_POST['txtName'];
	$email = $_POST['txtEmail'];
	$certificate = $_POST['txtCertificate'];
	$phone = $_POST['txtPhone'];
	$Check = Check();
	if ($Check == "") {
		//Pesonnel change pass
		if ($_POST['txtPass'] != "") {
			mysqli_query($conn, "UPDATE `personnel` SET ParsonnelPassword='" . md5($_POST['txtPass']) . "',PersonnelEmail='" . $email . "', PersonnelPhone='" . $phone . "',PersonnelName='" . $fullname . "',PersonnelCetificate='" . $certificate . "' WHERE PersonnelAccount='" . $_SESSION['username'] . "' ") or die(mysqli_error());
		} else {
			mysqli_query($conn, "UPDATE `personnel` SET PersonnelEmail='" . $email . "', PersonnelPhone='" . $phone . "',PersonnelName='" . $fullname . "',PersonnelCetificate='" . $certificate . "' WHERE PersonnelAccount='" . $_SESSION['username'] . "' ") or die(mysqli_error());
		}
		echo "<script>alert('Update Success!');window.location='index.php';</script>";

	} else {
		echo $Check;
	}
}
?>
<div class="container">
    <div class="row">
        <div class="col">
        
				<form method="post" class="form-horizontal">
					<div class="form-group">
						<h3 class="text-center">Update Information</h3>
					</div>
					<div class="form-group">
						<label for="txtID">Account:</label>
						<input type="text" class="form-control" id="txtID" required name="txtID" placeholder="User account" value="<?php echo $user; ?>" readonly=''>
					</div>
                    <div class="form-group">
						<label for="txtPass">News Password:</label>
						<input type="password" class="form-control" id="txtPass"  name="txtPass" placeholder="Password">
					</div>
					<div class="form-group">
						<label for="txtPass">Repeat Password:</label>
						<input type="password" class="form-control" id="txtPass1" name="txtPass1" placeholder="Password">
					</div>
                    <div class="form-group">
						<label for="txtName">Full Name:</label>
						<input type="text" class="form-control" id="txtName" required name="txtName" placeholder="Name" value="<?php echo $fullname; ?>">
					</div>
                    <div class="form-group">
						<label for="txtPhone">Phone:</label>
						<input type="number" class="form-control" id="txtPhone" required name="txtPhone" placeholder="vd:0963505927" value="<?php echo $phone; ?>">
					</div>
                    <div class="form-group">
						<label for="txtEmail">Email:</label>
						<input type="email" class="form-control" id="txtEmail" required name="txtEmail" placeholder="vd:huygama@ctu.edu.vn" value="<?php echo $email; ?>">
					</div>
                    <div class="form-group">
						<label for="txtCertificate">Certificate:</label>
						<input type="text" class="form-control" id="txtCertificate" required name="txtCertificate" placeholder="VD: C#" value="<?php echo $certificate; ?>">
					</div>
					<input type="submit" class="btn btn-primary" name="btnUpdate" value="Update"/>
					<input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
				</form>
        </div>
    </div>
</div>