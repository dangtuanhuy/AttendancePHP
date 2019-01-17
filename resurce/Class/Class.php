<script type="text/javascript">
	function deleteConfirm()
	{
		if(confirm("Are you sure delete!")){
			return true;
		}
		else{
			return false;
		}
	}
</script>
<!-- Lệnh Delete -->

<?php 
if (isset($_GET["ma"])) {
    $ClassId = $_GET["ma"];
    mysqli_query($conn, "DELETE FROM `class` WHERE ClassId='{$ClassId}'");
}
?>
<?php
if (isset($_POST['btnDelete']) && isset($_POST['checkbox'])) {
    for ($i = 0; $i < count($_POST['checkbox']); $i++) {
        $ClassId1 = $_POST['checkbox'][$i];
        mysqli_query($conn, "DELETE FROM `class` WHERE ClassId='{$ClassId1}'");
    }
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
	<form name="frmXoa" method="post" action="">
		<h1 class="text-center">Manage Class</h1>
		<p>
			<a  class="btn btn-success" href="?page=AddClass">
				ADD
			</a>

		</p>
        <br>
        <table class="table table-bordered table-hover table-striped table-responsive" id="myTable">
			<thead>
				<tr>
                <th class="text-center"><strong>Choice</strong></th>
					<th class="text-center"><strong>No</strong></th>
					<th class="text-center col-md-1"><strong>ID</strong></th>
                    <th class=" text-center"><strong>Name</strong></th>
                    <th class="text-center"><strong>Qty</strong></th>
                    <th class="text-center col-md-1"><strong>Active</strong></th>
                    <th class="text-center  col-md-3 "><strong>Teacher</strong></th>
                    <th class="text-center  col-md-3 "><strong>Subject</strong></th>
					<th class="text-center"><strong>Delete</strong></th>
					<th class="text-center"><strong>Update</strong></th>
					<th class="text-center"><strong>Student-Class</strong></th>
				</tr>
			</thead>
			<tbody>
				<?php 
    $num = 1;
    $result = mysqli_query($conn, "SELECT `ClassId`, `ClassName`, `ClassQty`, `ClassActive`, `PersonnelName`, `SubjectName` FROM `class` 
    JOIN subject ON subject.SubjectId = class.SubjectId 
    JOIN personnel ON personnel.PersonnelAccount = class.PersonnelAccount");
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        ?>
					<tr>
						<td class="text-center"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row["ClassId"] ?>"></td>
						<td><?php echo $num ?></td>
						<td><?php echo $row["ClassId"] ?></td>
                        <td><?php echo $row["ClassName"] ?></td>
                        <td><?php echo $row["ClassQty"] ?></td>
                        <td><?php echo $row["ClassActive"] ?></td>
                        <td class="text-center"><?php echo $row["PersonnelName"] ?></td>
                        <td><?php echo $row["SubjectName"] ?></td>
						<td align='center'>
							<a class="btn btn-danger"   href="?page=class&ma=<?php echo $row['ClassId']; ?>" onclick="return deleteConfirm()">
								Delete</a>
						</td>
						<td>
						<a class="btn btn-primary" href="?page=EditClass&ma=<?php echo $row['ClassId']; ?>">Update</a>
						</td>
						<td><a class="btn btn-info" href="?page=classstudent"><i class="fa fa-calculator"></i></a></td>
						</tr>
						<?php
        $num++;
    }
    ?>
				</tbody>
			</table>
            <br>
			<div class="row" >
				<div class="col-md-12">
					<input type="submit" value="Delete Choice" name="btnDelete" id="btnDelete" onclick='return deleteConfirm()' class="btn btn-info"/>

				</div>
			</div>
		</form>
        </div>
    </div>
</div>