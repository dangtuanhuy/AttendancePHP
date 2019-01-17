<?php 
function bindTeacherList($conn)
{
	$sqlSelect = "SELECT `PersonnelAccount`, `PersonnelName`  FROM personnel";
	$result = mysqli_query($conn, $sqlSelect);
	echo "<select class='form-control' name='slTe'>
	<option value='0'>Choice Teacher</option>";
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo "
		<option value='" . $row['PersonnelAccount'] . "'>" . $row['PersonnelName'] . "</option>";
	}
	echo "</select>";
}
?>
<?php 
function bindSubjectList($conn)
{
	$sqlSelect = "SELECT `SubjectId`, `SubjectName`FROM `subject`";
	$result = mysqli_query($conn, $sqlSelect);
	echo "<select class='form-control' name='slSu'>
	<option value='0'>Choice Subject</option>";
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo "
		<option value='" . $row['SubjectId'] . "'>" . $row['SubjectName'] . "</option>";
	}
	echo "</select>";
}
?>
<?php 
$ClassId = "";
$ClassName = "";
$Qty = "";
$ClassActive = date_default_timezone_set('Asia/Ho_Chi_Minh');
$idTech = "";
$idSub = "";

if (isset($_POST['btnAdd'])) {
	$ClassId = $_POST['txtID'];
	$ClassName = $_POST['txtName'];
	$Qty = $_POST['txtQty'];
	$ClassActive = $_POST['txtDate'];
	$idTech = $_POST['slTe'];
	$idSub = $_POST['slSu'];
	$sql = "INSERT INTO `class`(`ClassId`, `ClassName`, `ClassQty`, `ClassActive`, `PersonnelAccount`, `SubjectId`) VALUES  ('$ClassId ','$ClassName',$Qty,'$ClassActive','$idTech','$idSub')";
	mysqli_query($conn, $sql);
	echo '<script> alert("Insert Success!");</script>';
	echo '<meta http-equiv="refresh" content="0;URL=?page=class"/>';
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
        
				<form method="post" class="form-horizontal">
					<div class="form-group">
						<h4 class="text-center">Create Class</h4>
					</div>
					<div class="form-group">
						<label for="txtID">ID:</label>
						<input type="text" class="form-control" id="txtID" required name="txtID" placeholder="VD AGL">
					</div>
					<div class="form-group">
						<label for="txtName">Name:</label>
						<input type="text" class="form-control" id="txtName" required name="txtName" placeholder="VD: Angular">
					</div>
                    <div class="form-group">
						<label for="txtQty">Qty:</label>
						<input type="number" class="form-control" id="txtQty" required name="txtQty" placeholder="VD: 4">
					</div>
                    <div class="form-group">
						<label for="txtDate">Date:</label>
						<input type="date" class="form-control" id="txtDate" required name="txtDate" placeholder="VD: 4">
					</div>
                    <div class="form-group">
			            <label for="slTe">Teacher: </label>
			            <?php bindTeacherList($conn) ?>
                    </div>
					<div class="form-group">
			            <label for="slSu">Subject: </label>
			            <?php  bindSubjectList($conn) ?>
                    </div>
					<input type="submit" class="btn btn-primary" name="btnAdd" value="Add"/>
					<input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
				</form>
        </div>
        </div>
        </div>