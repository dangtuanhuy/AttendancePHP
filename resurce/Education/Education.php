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
    $EducationId = $_GET["ma"];
    mysqli_query($conn, "DELETE FROM `education` WHERE EducationId='{$EducationId}'");
}
?>
<?php
if (isset($_POST['btnDelete']) && isset($_POST['checkbox'])) {
    for ($i = 0; $i < count($_POST['checkbox']); $i++) {
        $EducationId1 = $_POST['checkbox'][$i];
        mysqli_query($conn, "DELETE FROM `education` WHERE EducationId='{$EducationId1}'");
    }
}
?>
<div class="container-fluid">
   
	<form name="frmXoa" method="post" action="">
		<h1 class="text-center">Manage Education</h1>
		<p>
			<a  class="btn btn-success" href="?page=Addeducation">
				ADD
			</a>

		</p>
        <br>
        <div class="box-body">
		<table class="table table-bordered table-hover table-striped table-responsive" id="myTable">
			<thead>
				<tr>
					<th class="text-center">Choice</th>
					<th class="text-center">No</th>
					<th class="text-center">Education</th>
                    <th class="text-center">Name</th>
                    <th class="col-md-8 text-center">Details</th>
					<th class="col-md-1 text-center">Delete</th>
					<th class="col-md-1 text-center">Update</th>
				</tr>
			</thead>
			<tbody>
				<?php 
    $num = 1;
    $result = mysqli_query($conn, "SELECT * FROM `education`");
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        ?>
					<tr>
						<td class="text-center"><input name="checkbox[]" type="checkbox" id="checkbox[]" class="text-center" value="<?php echo $row["EducationId"] ?>"></td>
						<td><?php echo $num ?></td>
						<td><?php echo $row["EducationId"] ?></td>
                        <td><?php echo $row["EducationName"] ?></td>
                        <td><?php echo $row["EducationDetails"] ?></td>
						<td align='center'>
							<a class="btn btn-danger"   href="?page=education&ma=<?php echo $row['EducationId']; ?>" onclick="return deleteConfirm()">
								Delete</a>
							</td>
							<td>
								<a class="btn btn-primary" href="?page=Updateeducation&ma=<?php echo $row['EducationId']; ?>">Update</a>
							</td>
						</tr>
						<?php
        $num++;
    }
    ?>
				</tbody>
                <tfoot>
                <th class="text-center">Choice</th>
					<th class="text-center">No</th>
					<th class="text-center">Education</th>
                    <th class="text-center">Name</th>
                    <th class="col-md-8 text-center">Details</th>
					<th class="col-md-1 text-center">Delete</th>
					<th class="col-md-1 text-center">Update</th>
                </tfoot>
			</table>
            </div>
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
