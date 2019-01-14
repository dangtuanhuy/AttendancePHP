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
    $SubjectId = $_GET["ma"];
    mysqli_query($conn, "DELETE FROM `subject` WHERE SubjectId='{$SubjectId}'");
}
?>
<?php
if (isset($_POST['btnDelete']) && isset($_POST['checkbox'])) {
    for ($i = 0; $i < count($_POST['checkbox']); $i++) {
        $SubjectId1 = $_POST['checkbox'][$i];
        mysqli_query($conn, "DELETE FROM `subject` WHERE SubjectId='{$SubjectId1}'");
    }
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
	<form name="frmXoa" method="post" action="">
		<h1 class="text-center">Manage Subject</h1>
		<p>
			<a  class="btn btn-success" href="?page=Addsubject">
				ADD
			</a>

		</p>
        <br>
        <table class="table table-bordered table-hover table-striped table-responsive" id="myTable">
			<thead>
				<tr>
                <th class="text-center"><strong>Choice</strong></th>
					<th class="text-center col-md-1"><strong>No</strong></th>
					<th class="text-center col-md-1"><strong>Code</strong></th>
                    <th class=" text-center col-md-3 "><strong>Name</strong></th>
                    <th class="text-center"><strong>T</strong></th>
                    <th class="text-center"><strong>L</strong></th>
                    <th class="text-center"><strong>TL</strong></th>
                    <th class="text-center"><strong>SEM</strong></th>
                    <th class="text-center"><strong>EDU</strong></th>
					<th class="text-center"><strong>Delete</strong></th>
					<th class="text-center"><strong>Update</strong></th>
				</tr>
			</thead>
			<tbody>
				<?php 
    $num = 1;
    $result = mysqli_query($conn, "SELECT `SubjectId`,`SubjectName`,`SubjectTheory`,`SubjectPractical`,`TheoryPractical`,`SubjectSem`,`EducationName` FROM `subject` 
    JOIN `education` ON subject.EducationId = education.EducationId");
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        ?>
					<tr>
						<td class="text-center"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row["SubjectId"] ?>"></td>
						<td><?php echo $num ?></td>
						<td><?php echo $row["SubjectId"] ?></td>
                        <td><?php echo $row["SubjectName"] ?></td>
                        <td><?php echo $row["SubjectTheory"] ?></td>
                        <td><?php echo $row["SubjectPractical"] ?></td>
                        <td><?php echo $row["TheoryPractical"] ?></td>
                        <td><?php echo $row["SubjectSem"] ?></td>
                        <td><?php echo $row["EducationName"] ?></td>
						<td align='center'>
							<a class="btn btn-danger"   href="?page=subject&ma=<?php echo $row['SubjectId']; ?>" onclick="return deleteConfirm()">
								Delete</a>
						</td>
						<td>
						<a class="btn btn-primary" href="?page=Editsubject&ma=<?php echo $row['SubjectId']; ?>">Update</a>
						</td>
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