<?php 
if (isset($_GET['ma'])) {
    $ma = $_GET["ma"];
    $sqlselect = "SELECT `ClassStudentNum`, `ClassId`, `StudentName`,StudentId  FROM `classstudent` 
    JOIN student on student.StudentCode = classstudent.StudentId WHERE  ClassStudentNum=".$ma;
    $result = mysqli_query($conn, $sqlselect);
    $row = mysqli_fetch_row($result);

    $ClassStudentNum = $row['0'];
    $idCl = $row['1'];
    $idSt = $row['2'];
    $idSt1 = $row['3'];
} else {
    echo '<meta http-equiv="refresh" content="0;URL=?page=classstudent"/>';
}
function bindUpdateStudent($conn, $selectedValue)
{
    $sqlstring = "SELECT `StudentCode`, `StudentName` FROM `student`";

    $result = mysqli_query($conn, $sqlstring);
    echo "<select name='slSt' class='form-control'>
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
    echo "<select name='slCl' class='form-control'>
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

    $ClassStudentNum = $_POST['txtID'];
    $idSt= $_POST['slSt'];
	$idCl = $_POST['slCl'];
    $sqlUpdateClassStudent = "UPDATE `classstudent` SET ClassId = '$idCl',StudentId='$idSt' WHERE ClassStudentNum =".$ma;
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
						<input type="text" class="form-control" id="txtID" required name="txtID" placeholder="User account" readonly='' value='<?php echo $ClassStudentNum; ?>'>
					</div>
                    <div class="form-group">
			            <label for="slSt">Student Code: </label>
			            <input type="text" class="form-control" id="slSt" required name="slSt"  readonly='' value='<?php echo $idSt1 ; ?>'>
                    </div>
                    <div class="form-group">
			            <label for="txtName">Student Name: </label>
			            <input type="text" class="form-control" id="txtName" required name="txtName"  readonly='' value='<?php echo $idSt ; ?>'>
                    </div>
					<div class="form-group">
			            <label for="slCl">Class: </label>
			            <?php  bindUpdateClass($conn,$idCl) ?>
                    </div>
					<input type="submit" class="btn btn-primary" name="btnEdit" value="Update"/>
					<input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
				</form>
        </div>
    </div>
</div>
