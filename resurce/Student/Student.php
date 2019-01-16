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
<?php 
if (isset($_GET["ma"])) {
    $StudentCode = $_GET["ma"];
    mysqli_query($conn, "DELETE FROM `student` WHERE StudentCode='{$StudentCode}'");
}
?>
<?php
if (isset($_POST['btnDelete']) && isset($_POST['checkbox'])) {
    for ($i = 0; $i < count($_POST['checkbox']); $i++) {
        $StudentCode1 = $_POST['checkbox'][$i];
        mysqli_query($conn, "DELETE FROM `student` WHERE StudentCode='{$StudentCode1}'");
    }
}
?>
<div class="container-fluid">
   
	<form name="frmXoa" method="post" action="">
		<h1 class="text-center">Manage Student</h1>
		<p>
			<a  class="btn btn-success" href="?page=AddStudent">
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
					<th class="text-center">Roll.No</th>
                    <th class="col-md-3 text-center">Full Name</th>
                    <th class="text-center">Date of Birth</th>
                    <th class="text-center">Phone</th>
					<th class="col-md-1 text-center">Delete</th>
					<th class="col-md-1 text-center">Update</th>
				</tr>
			</thead>
			<tbody>
				<?php 
    $num = 1;
    $result = mysqli_query($conn, "SELECT * FROM `student`");
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        ?>
					<tr>
						<td class="text-center"><input name="checkbox[]" type="checkbox" id="checkbox[]" class="text-center" value="<?php echo $row["StudentCode"] ?>"></td>
						<td><?php echo $num ?></td>
						<td><?php echo $row["StudentCode"] ?></td>
                        <td><?php echo $row["StudentName"] ?></td>
                        <td><?php echo $row["StudentBirth"] ?></td>
                        <td><?php echo $row["StudentPhone"] ?></td>
						<td align='center'>
							<a class="btn btn-danger"   href="?page=student&ma=<?php echo $row['StudentCode']; ?>" onclick="return deleteConfirm()">
								Delete</a>
							</td>
							<td>
								<a class="btn btn-primary" href="?page=EditStduent&ma=<?php echo $row['StudentCode']; ?>">Update</a>
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
					<th class="text-center">Roll.No</th>
                    <th class="col-md-3 text-center">Full Name</th>
                    <th class="text-center">Date of Birth</th>
                    <th class="text-center">Phone</th>
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
