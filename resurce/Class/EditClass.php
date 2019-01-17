<?php 
if (isset($_GET['ma'])) {
    $ma = $_GET["ma"];
    $sqlselect = "SELECT `ClassId`, `ClassName`, `ClassQty`, `ClassActive`, `PersonnelAccount`, `SubjectId` FROM Class WHERE ClassId='$ma'";
    $result = mysqli_query($conn, $sqlselect);
    $row = mysqli_fetch_row($result);

    $ClassId = $row['0'];
    $ClassName = $row['1'];
    $Qty = $row['2'];
    $ClassActive = $row['3'];
    $idTech = $row['4'];
    $idSub = $row['5'];
} else {
    echo '<meta http-equiv="refresh" content="0;URL=?page=class"/>';
}
function bindUpdateSubject($conn, $selectedValue)
{
    $sqlstring = "SELECT `SubjectId`, `SubjectName` FROM `subject`";

    $result = mysqli_query($conn, $sqlstring);
    echo "<select name='slSu' class='form-control'>
    <option value='0'>Please choose subject</option>";
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        if ($row['SubjectId'] == $selectedValue) {
            echo "<option value='" . $row['SubjectId'] . "' selected>" . $row['SubjectName'] . "</option>";
        } else {
            echo "<option value='" . $row['SubjectId'] . "'>" . $row['SubjectName'] . "</option>";
        }
    }
    echo "</select>";
}
function bindUpdateTeacher($conn, $selectedValue)
{
    $sqlstring = "SELECT `PersonnelAccount`,`PersonnelName` FROM `personnel`";
    $result = mysqli_query($conn, $sqlstring);
    echo "<select name='slTe' class='form-control'>
    <option value='0'>Please choose teacher</option>";
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        if ($row['PersonnelAccount'] == $selectedValue) {
            echo "<option value='" . $row['PersonnelAccount'] . "' selected>" . $row['PersonnelName'] . "</option>";
        } else {
            echo "<option value='" . $row['PersonnelAccount'] . "'>" . $row['PersonnelName'] . "</option>";
        }
    }
    echo "</select>";
}
if (isset($_POST["btnEdit"])) {

    $ClassId = $_POST['txtID'];
    $ClassName = $_POST['txtName'];
    $Qty = $_POST['txtQty'];
    $ClassActive = $_POST['txtDate'];
    $idTech = $_POST['slTe'];
    $idSub = $_POST['slSu'];
    $sqlUpdateClass = "UPDATE `class` SET ClassName = '" . $ClassName . "',ClassQty='" . $Qty . "',`ClassActive`='" . $ClassActive . "',PersonnelAccount='" . $idTech . "',SubjectId='" . $idSub . "' WHERE ClassId ='$ma'";
    mysqli_query($conn, $sqlUpdateClass);
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
						<input type="text" class="form-control" id="txtID" required name="txtID" placeholder="VD AGL" readonly='' value='<?php echo $ClassId; ?>'>
					</div>
					<div class="form-group">
						<label for="txtName">Name:</label>
						<input type="text" class="form-control" id="txtName" required name="txtName" placeholder="VD: Angular"  value='<?php echo $ClassName; ?>'>
					</div>
                    <div class="form-group">
						<label for="txtQty">Qty:</label>
						<input type="number" class="form-control" id="txtQty" required name="txtQty" placeholder="VD: 4"  value='<?php echo $Qty; ?>'>
					</div>
                    <div class="form-group">
						<label for="txtDate">Date:</label>
						<input type="date" class="form-control" id="txtDate" required name="txtDate" placeholder="VD: 12/12/2019"  value='<?php echo $ClassActive ; ?>'>
					</div>
                    <div class="form-group">
			            <label for="slTe">Teacher: </label>
			            <?php bindUpdateTeacher($conn,$idTech) ?>
                    </div>
					<div class="form-group">
			            <label for="slSu">Subject: </label>
			            <?php bindUpdateSubject($conn, $idSub) ?>
                    </div>
					<input type="submit" class="btn btn-primary" name="btnEdit" value="Update"/>
					<input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
				</form>
        </div>
    </div>
</div>