<?php 
if (isset($_GET['ma'])) {
    $ma = $_GET["ma"];
    $sqlselect = "SELECT `PersonnelAccount`,`PersonnelEmail`, `PersonnelPhone`, `PersonnelName`, `PersonnelCetificate`,`RoleId` FROM `personnel` WHERE PersonnelAccount='$ma'";
    $result = mysqli_query($conn, $sqlselect);
    $row = mysqli_fetch_row($result);
    $teacherId = $row['0'];
    $teacherEmail = $row['1'];
    $teacherPhone = $row['2'];
    $teacherName = $row['3'];
    $teacherCer = $row['4'];
    $idRole = $row['5'];
} else {
    echo '<meta http-equiv="refresh" content="0;URL=?page=teacher"/>';
}
function bindUpdateRole($conn, $selectedValue)
{
    $sqlstring = "SELECT `RoleId`, `RoleName`, `RoleDescription` FROM `role`  ";

    $result = mysqli_query($conn, $sqlstring);
    echo "<select name='slRole' class='form-control'>
    <option value='0'>Role</option>";
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        if ($row['RoleId'] == $selectedValue) {
            echo "<option value='" . $row['RoleId'] . "' selected>" . $row['RoleName'] . "</option>";
        } else {
            echo "<option value='" . $row['RoleId'] . "'>" . $row['RoleName'] . "</option>";
        }
    }
    echo "</select>";
}
if (isset($_POST["btnEdit"])) {

    $teacherId = $_POST['txtID'];
    $teacherEmail = $_POST['txtEmail'];
    $teacherPhone = $_POST['txtPhone'];
    $teacherCer = $_POST['txtCertificate'];
    $teacherName = $_POST['txtName'];
    $idRole = $_POST["slRole"];
    $sqlUpdateTeacher = "UPDATE `personnel` SET PersonnelEmail = '" . $teacherEmail . "',PersonnelPhone='" . $teacherPhone . "',`PersonnelName`='" . $teacherName . "',PersonnelCetificate='" . $teacherCer . "',RoleId='" . $idRole . "' WHERE PersonnelAccount ='$ma'";
    mysqli_query($conn, $sqlUpdateTeacher);
    echo '<meta http-equiv="refresh" content="0;URL=?page=teacher"/>';

}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
        
				<form method="post" class="form-horizontal">
                <div class="form-group">
						<h3 class="text-center">Update Information's Teacher</h3>
					</div>
					<div class="form-group">
						<label for="txtID">Account:</label>
						<input type="text" class="form-control" id="txtID" required name="txtID" placeholder="User account" readonly='' value='<?php echo $teacherId; ?>'>
					</div>
                    <div class="form-group">
						<label for="txtName">Full Name:</label>
						<input type="text" class="form-control" id="txtName" required name="txtName" placeholder="Name" readonly='' value='<?php echo $teacherName; ?>'>
					</div>
                    <div class="form-group">
						<label for="txtPhone">Phone:</label>
						<input type="number" class="form-control" id="txtPhone" required name="txtPhone" placeholder="vd:0963505927" readonly='' value='<?php echo $teacherPhone; ?>'>
					</div>
                    <div class="form-group">
						<label for="txtEmail">Email:</label>
						<input type="text" class="form-control" id="txtEmail" required name="txtEmail" placeholder="vd:huygama@ctu.edu.vn" readonly='' value='<?php echo $teacherEmail; ?>'>
					</div>
                    <div class="form-group">
						<label for="txtCertificate">Certificate:</label>
						<input type="text" class="form-control" id="txtCertificate" required name="txtCertificate" placeholder="VD: C#"  value='<?php echo $teacherCer; ?>'>
					</div>
                    <div class="form-group">
			            <label for="slEdu">Education: </label>
                      <?php 

                        bindUpdateRole($conn, $idRole)

                        ?>
                    </div>
					<input type="submit" class="btn btn-primary" name="btnEdit" value="Update"/>
					<input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
				</form>
        </div>
        </div>
        </div>