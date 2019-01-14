<?php 
function bindEducationList($conn)
{
	$sqlSelect = "SELECT `EducationId`, `EducationName` FROM `education`";
	$result = mysqli_query($conn, $sqlSelect);
	echo "<select class='form-control' name='slEdu'>
	<option value='0'>Choice Edu</option>";
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo "
		<option value='" . $row['EducationId'] . "'>" . $row['EducationName'] . "</option>";
	}
	echo "</select>";
}
?>
<?php 
$SubjectId = "";
$SubjectName = "";
$Theory = "";
$Practical = "";
$TheoryPractical = "";
$Sem = "";
$idEdu = "";

if (isset($_POST['btnAdd'])) {
	$SubjectId = $_POST['txtID'];
	$SubjectName = $_POST['txtName'];
	$Theory = $_POST['txtTheory'];
	$Practical = $_POST['txtPractical'];
	$TheoryPractical = $_POST['txtTheoryPractical'];
	$Sem = $_POST['txtSEM'];
	$idEdu = $_POST['slEdu'];
	$sql = "INSERT INTO `subject`(`SubjectId`, `SubjectName`, `SubjectTheory`, `SubjectPractical`, `TheoryPractical`, `SubjectSem`, `EducationId`) VALUES ('$SubjectId','$SubjectName',$Theory,$Practical,$TheoryPractical,$Sem,'$idEdu')";
	mysqli_query($conn, $sql);
	echo '<script> alert("Insert Success!");</script>';
	echo '<meta http-equiv="refresh" content="0;URL=?page=subject"/>';
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
        
				<form method="post" class="form-horizontal">
					<div class="form-group">
						<h4 class="text-center">Add Subject</h4>
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
						<label for="txtName">Theory:</label>
						<input type="text" class="form-control" id="txtTheory" required name="txtTheory" placeholder="VD: 4">
					</div>
                    <div class="form-group">
						<label for="txtName">Practical:</label>
						<input type="text" class="form-control" id="txtPractical" required name="txtPractical" placeholder="VD: 4">
					</div>
                    <div class="form-group">
						<label for="txtName">TheoryPractical:</label>
						<input type="text" class="form-control" id="txtTheoryPractical" required name="txtTheoryPractical" placeholder="VD: 4">
					</div>
                    <div class="form-group">
						<label for="txtName">SEM:</label>
						<input type="text" class="form-control" id="txtSEM" required name="txtSEM" placeholder="VD: 4">
					</div>
                    <div class="form-group">
			            <label for="slEdu">Education: </label>
			            <?php bindEducationList($conn) ?>
                    </div>
					<input type="submit" class="btn btn-primary" name="btnAdd" value="Add"/>
					<input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
				</form>
        </div>
        </div>
        </div>