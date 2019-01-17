<?php 
if (isset($_GET['ma'])) {
    $ma = $_GET["ma"];
    $sqlselect = "SELECT `ClassStudentNum`, `ClassId`, `StudentId` FROM `classstudent` WHERE ClassStudentNum=".$ma;
    $result = mysqli_query($conn, $sqlselect);
    $row = mysqli_fetch_row($result);

    $ClassStudentNum = $row['0'];
    $idCl = $row['1'];
    $idSt = $row['2'];
} else {
    echo '<meta http-equiv="refresh" content="0;URL=?page=classstudent"/>';
}
function bindUpdateStudent($conn, $selectedValue)
{
    $sqlstring = "SELECT `StudentCode`, `StudentName` FROM `student`";

    $result = mysqli_query($conn, $sqlstring);
    echo "<select name='slSu' class='form-control'>
    <option value='0'>Please choose student</option>";
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        if ($row['StudentCode'] == $selectedValue) {
            echo "<option value='" . $row['StudentCode'] . "' selected>" . $row['StudentName'] . "</option>";
        } else {
            echo "<option value='" . $row['StudentCode'] . "'>" . $row['StudentName'] . "</option>";
        }
    }
    echo "</select>";
}
function bindUpdateClass($conn, $selectedValue)
{
    $sqlstring = "SELECT `ClassId`, `ClassName` FROM `class`";
    $result = mysqli_query($conn, $sqlstring);
    echo "<select name='slTe' class='form-control'>
    <option value='0'>Please choose class</option>";
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        if ($row['ClassId'] == $selectedValue) {
            echo "<option value='" . $row['ClassId'] . "' selected>" . $row['ClassName'] . "</option>";
        } else {
            echo "<option value='" . $row['ClassId'] . "'>" . $row['ClassName'] . "</option>";
        }
    }
    echo "</select>";
}
if (isset($_POST["btnEdit"])) {

    $ClassId = $_POST['txtID'];
    $idSt= $_POST['slSt'];
	$idCl = $_POST['slCl'];
    $sqlUpdateClassStudent = "UPDATE `classstudent` SET ClassId = '" . $idCl . "',StudentId='" . $idSt . "' WHERE ClassStudentNum =".$ma;
    mysqli_query($conn, $sqlUpdateClassStudent);
    echo '<meta http-equiv="refresh" content="0;URL=?page=classstudent"/>';
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
				<form method="post" class="form-horizontal">
					<div class="form-group">
						<h4 class="text-center">Update Studet - Class</h4>
					</div>
                    <div class="form-group">
						<label for="txtID">ID:</label>
						<input type="text" class="form-control" id="txtID" required name="txtID" placeholder="ID" value='<?php echo $ClassId; ?>' readonly=''>
					</div>
                    <div class="form-group">
			            <label for="slSt">Student: </label>
			            <?php bindUpdateStudent($conn,$idSt) ?>
                    </div>
					<div class="form-group">
			            <label for="slCl">Class: </label>
			            <?php  bindUpdateClass($conn,$idCl) ?>
                    </div>
					<input type="submit" class="btn btn-primary" name="btnAdd" value="Add"/>
					<input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
				</form>
        </div>
    </div>
</div>
