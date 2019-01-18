<?php 
function blindListTecher($conn)
{
    $user = $_SESSION['username'];
    $sqlSelect = "SELECT p.`PersonnelName`,p.`PersonnelAccount` FROM `personnel` p WHERE p.PersonnelAccount='" . $user . "' ";
    $result = mysqli_query($conn, $sqlSelect);
    echo "<select class='form-control' name='slTe'>";

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "
		<option value='" . $row['PersonnelAccount'] . "'>" . $row['PersonnelName'] . "</option>";
    }
    echo "</select>";
}
function blindListClass($conn)
{
    $user = $_SESSION['username'];
    $sqlSelect = "SELECT c.`ClassId`,c.`ClassName`FROM `class` c
    JOIN `personnel` p ON p.`PersonnelAccount` = c.`PersonnelAccount`
    WHERE p.`PersonnelAccount`='" . $user . "'";
    $result = mysqli_query($conn, $sqlSelect);
    echo "<select class='form-control' name='slSt'>
	<option value='0'>Choice Class</option>";
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "
		<option value='" . $row['ClassId'] . "'>" . $row['ClassName'] . "</option>";
    }
    echo "</select>";
}
function blindListStudent($conn)
{
    $user = $_SESSION['username'];
    // $sqlSelect1 ="SELECT c.`ClassId` FROM `class` c
    // JOIN `personnel` p ON p.`PersonnelAccount` = c.`PersonnelAccount`
    // WHERE p.`PersonnelAccount`='" .$user. "'";

    
    // $result1 = mysqli_query($conn,$sqlSelect1 );

    $sqlInfo = "SELECT cl.`ClassStudentNum`,s.`StudentName` FROM `classstudent` cl
    JOIN `class` c ON c.`ClassId` = cl.`ClassId`
    JOIN `student` s ON s.`StudentCode` = cl.`StudentId`
    WHERE cl.ClassId IN ( SELECT c1.`ClassId` FROM `class` c1
    JOIN `personnel` p1 ON p1.`PersonnelAccount` = c1.`PersonnelAccount`
    WHERE p1.`PersonnelAccount`='" . $user . "')";
    $result2 = mysqli_query($conn, $sqlInfo);
    echo "<select class='form-control' name='ClassT'>
	<option value='0'>Choice Student</option>";
    while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
        echo "
		<option value='" . $row['ClassStudentNum'] . "'>" . $row['StudentName'] . "</option>";
    }
    echo "</select>";
}
$Room = "";
$Seesion = "";
$Date = date_default_timezone_set('Asia/Ho_Chi_Minh');
$Gender = "";
$Reason = "";
$idTeacher = "";
$idClass = "";
if (isset($_POST['btnCheck'])) {
    $Room = $_POST['txtRoom'];

    $Seesion = $_POST['txtSession'];

    $Date = date('Y-m-d',  strtotime($_POST["txtDate"]));

    if (isset($_POST['grpCheck'])) {
        $Gender = $_POST['grpCheck'];
    }

    $Reason = $_POST['txtReason'];

    $idTeacher  = $_POST['slTe'];

    $idClass = $_POST['ClassT'];

    $sqlInsert ="INSERT INTO `attendance`(`ClassStudentNum`, `AttendanceRoom`, `AttendanceSession`, `AttendanceDate`, `AttendanceCheck`, `AttendanceReason`, `PersonnelAccount`) VALUES ($idClass,'$Room','$Seesion','$Date','$Gender','$Reason','$idTeacher')";

    mysqli_query($conn,$sqlInsert);
    echo '<script> alert("Insert Success!");</script>';
   
   echo '<meta http-equiv="refresh" content="0;URL=?page=Attendace"/>';
   

}


?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
				<form method="post" class="form-horizontal">
					<div class="form-group">
						<h4 class="text-center">Attendace</h4>
					</div>
                    <div class="form-group">
			            <label for="slSt">Teacher: </label>
			            <?php blindListTecher($conn) ?>
                    </div>
					<div class="form-group">
			            <label for="slCl">Class: </label>
			            <?php blindListClass($conn) ?>
                    </div>
                    <div class="form-group">
			            <label for="slSt">Student: </label>
			            <?php blindListStudent($conn) ?>
                    </div>
                    <div class="form-group">
						<label for="txtRoom">Room:</label>
						<input type="text" class="form-control" id="txtRoom" required name="txtRoom" placeholder="Name">
					</div>
                    <div class="form-group">
						<label for="txtSessions">Session:</label>
						<input type="text" class="form-control" id="txtSession" required name="txtSession" placeholder="Details">
					</div>
                    <div class="form-group">
						<label for="txtDate">Date:</label>
						<input type="date" class="form-control" id="txtDate" required name="txtDate" placeholder="Date">
					</div>
                    <div class="form-group">
                    <label class="radio-inline">
						<input type="radio" name="grpCheck" value="0" id="grpCheck" checked/> Present
					 </label>
					<label class="radio-inline">
						<input type="radio" name="grpCheck" value="1" id="grpCheck" /> Absent
					</label>
                    </div>
                    <div class="form-group">
						<label for="txtReason">Reasion:</label>
						<input type="text" class="form-control" id="txtReason" required name="txtReason" placeholder="Reason">
					</div>
					<input type="submit" class="btn btn-primary" name="btnCheck" value="Check"/>
					<input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
				</form>
        </div>
    </div>
</div>