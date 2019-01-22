<?php 
function bindStudentList($conn)
{
	$sqlSelect = "SELECT `StudentCode`, `StudentName` FROM `student`";
	$result = mysqli_query($conn, $sqlSelect);
	echo "<select class='form-control' name='slSt'>
	<option value='0'>Choice Student</option>";
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo "
		<option value='" . $row['StudentCode'] . "'>" . $row['StudentName'] . "</option>";
	}
	echo "</select>";
}
?>
<?php 
function bindClassList($conn)
{
	
	$sqlSelect = "SELECT `ClassId`, `ClassName` FROM `class` ";
	$result = mysqli_query($conn, $sqlSelect);
	echo "<select class='form-control' name='slCl'>
	<option value='0'>Choice Subject</option>";
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo "
		<option value='" . $row['ClassId'] . "'>" . $row['ClassName'] . "</option>";
	}
	echo "</select>";
}
?>
<?php 
$idSt = "";
$idCl = "";
if (isset($_POST['btnAdd'])) {
	$idSt= $_POST['slSt'];
	$idCl = $_POST['slCl'];
	$sqlInsert = "INSERT INTO `classstudent`(`ClassId`, `StudentId`) VALUES  ('$idCl','$idSt')";
	mysqli_query($conn, $sqlInsert);
	echo '<script> alert("Insert Success!");</script>';
	echo '<meta http-equiv="refresh" content="0;URL=?page=classstudent"/>';
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
				<form method="post" class="form-horizontal">
					<div class="form-group">
						<h4 class="text-center">Create Studet - Class</h4>
					</div>
                    <div class="form-group">
			            <label for="slSt">Student: </label>
			            <?php bindStudentList($conn) ?>
                    </div>
					<div class="form-group">
			            <label for="slCl">Class: </label>
			            <?php  bindClassList($conn) ?>
                    </div>
					<input type="submit" class="btn btn-primary" name="btnAdd" value="Add"/>
					<input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
				</form>
        </div>
    </div>
</div>