<?php 
if (isset($_GET['ma'])) {
    $ma = $_GET["ma"];
    $sqlselect = "SELECT `SubjectId`, `SubjectName`, `SubjectTheory`, `SubjectPractical`, `TheoryPractical`, `SubjectSem`, `EducationId` FROM subject
    WHERE SubjectId='$ma'";
    $result = mysqli_query($conn, $sqlselect);
    $row = mysqli_fetch_row($result);
    $SubjectId = $row['0'];
    $SubjectName = $row['1'];
    $Theory = $row['2'];
    $Practical = $row['3'];
    $TheoryPractical = $row['4'];
    $Sem = $row['5'];
    $idEdu = $row['6'];
} else {
    echo '<meta http-equiv="refresh" content="0;URL=?page=sub"/>';
}
function bindUpdateSubject($conn, $selectedValue)
{
    $sqlstring = "SELECT `EducationId`, `EducationName`, `EducationDetails` FROM `education` ";

    $result = mysqli_query($conn, $sqlstring);
    echo "<select name='slEdu' class='form-control'>
    <option value='0'>Education</option>";
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        if ($row['EducationId'] == $selectedValue) {
            echo "<option value='" . $row['EducationId'] . "' selected>" . $row['EducationName'] . "</option>";
        } else {
            echo "<option value='" . $row['EducationId'] . "'>" . $row['EducationName'] . "</option>";
        }
    }
    echo "</select>";
}
if (isset($_POST["btnEdit"])) {

    $SubjectName = $_POST["txtName"];
    $Theory = $_POST["txtTheory"];
    $Practical = $_POST["txtPractical"];
    $TheoryPractical = $_POST["txtTheoryPractical"];
    $Sem = $_POST["txtSEM"];
    $idEdu = $_POST["slEdu"];
    $sqlUpdate = "UPDATE subject SET  
	SubjectName ='" . $SubjectName . "',
	SubjectTheory = '" . $Theory . "', SubjectPractical = '" . $Practical . "', TheoryPractical = '" . $TheoryPractical . "',
	SubjectSem='" . $Sem . "',
	EducationId = '" . $idEdu . "' WHERE SubjectId = '$ma'";
    mysqli_query($conn, $sqlUpdate);
    echo '<meta http-equiv="refresh" content="0;URL=?page=subject"/>';

}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
        
				<form method="post" class="form-horizontal">
					<div class="form-group">
						<h4 class="text-center">Update Subject</h4>
					</div>
					<div class="form-group">
						<label for="txtID">ID:</label>
						<input type="text" class="form-control" id="txtID" required name="txtID"  placeholder="VD AGL" readonly='' value='<?php echo $SubjectId; ?>'  >
					</div>
					<div class="form-group">
						<label for="txtName">Name:</label>
						<input type="text" class="form-control" id="txtName" required   name="txtName" placeholder="VD: Angular" value='<?php echo $SubjectName; ?>'>
					</div>
                    <div class="form-group">
						<label for="txtName">Theory:</label>
						<input type="text" class="form-control" id="txtTheory" required  name="txtTheory" placeholder="VD: 4" value='<?php echo $Theory; ?>'>
					</div>
                    <div class="form-group">
						<label for="txtName">Practical:</label>
						<input type="text" class="form-control" id="txtPractical" required  name="txtPractical" placeholder="VD: 4" value='<?php echo $Practical; ?>' >
					</div>
                    <div class="form-group">
						<label for="txtName">Theory Practical:</label>
						<input type="text" class="form-control" id="txtTheoryPractical"  required name="txtTheoryPractical" placeholder="VD: 4" value='<?php echo $TheoryPractical; ?>'>
					</div>
                    <div class="form-group">
						<label for="txtName">SEM:</label>
						<input type="text" class="form-control" id="txtSEM" required  name="txtSEM" placeholder="VD: 4" value='<?php echo $Sem; ?>'>
					</div>
                    <div class="form-group">
			            <label for="slEdu">Education: </label>
                      <?php 

                        bindUpdateSubject($conn, $idEdu)

                        ?>
                    </div>
					<input type="submit" class="btn btn-primary" name="btnEdit" value="Update"/>
					<input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
				</form>
        </div>
        </div>
        </div>