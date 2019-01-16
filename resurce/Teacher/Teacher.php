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
	$PersonnelAccount = $_GET["ma"];
	mysqli_query($conn, "DELETE FROM `personnel` WHERE PersonnelAccount='{$PersonnelAccount}'");
}
?>
<?php
if (isset($_POST['btnDelete']) && isset($_POST['checkbox'])) {
	for ($i = 0; $i < count($_POST['checkbox']); $i++) {
		$PersonnelAccount1 = $_POST['checkbox'][$i];
		mysqli_query($conn, "DELETE FROM `personnel` WHERE PersonnelAccount='{$PersonnelAccount1}'");
	}
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
	<form name="frmXoa" method="post" action="">
		<h1 class="text-center">Manage Teacher</h1>
		<p>
			<a  class="btn btn-success" href="?page=AddTeacher">
				ADD
			</a>

		</p>
        <br>
        <table class="table table-bordered table-hover table-striped table-responsive" id="myTable">
			<thead>
				<tr>
                <th class="text-center"><strong>Choice</strong></th>
					<th class="text-center col-md-1"><strong>No</strong></th>
					<th class="text-center col-md-3"><strong>Full Name</strong></th>
                    <th class=" text-center col-md-1 "><strong>Phone</strong></th>
                    <th class="text-center"><strong>Certificate</strong></th>
                    <th class="text-center"><strong>Status</strong></th>
                    <th class="text-center"><strong>Role</strong></th>
					<th class="text-center"><strong>Delete</strong></th>
					<th class="text-center"><strong>Update</strong></th>
				</tr>
			</thead>
			<tbody>
				<?php 
			$num = 1;
			$result = mysqli_query($conn, "SELECT PersonnelAccount,`PersonnelPhone`, `PersonnelName`, `PersonnelCetificate`, `PersonnalStatus`, `RoleName` FROM `personnel`
    JOIN role ON personnel.RoleId = role.RoleId");
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				?>
					<tr>
						<td class="text-center"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row["PersonnelAccount"] ?>"></td>
						<td><?php echo $num ?></td>
						<td><?php echo $row["PersonnelName"] ?></td>
                        <td><?php echo $row["PersonnelPhone"] ?></td>
                        <td><?php echo $row["PersonnelCetificate"] ?></td>
                        <td>
						
						<form method="post">
						<?php 
					if ($row["PersonnalStatus"] == 1) {
						echo '<a class="btn btn-default" href="?page=ActiveTeacher&PersonnalStatus=' . $row["PersonnalStatus"] . '&PersonnelAccount=' . $row["PersonnelAccount"] . '">Active</a>';
					} else {
						echo '<a class="btn btn-default" href="?page=ActiveTeacher&PersonnalStatus=' . $row["PersonnalStatus"] . '&PersonnelAccount=' . $row["PersonnelAccount"] . '">Close</a>';
					}
					?>
						</form>
						</td>
                        <td><?php echo $row["RoleName"] ?></td>
						<td align='center'>
							<a class="btn btn-danger"   href="?page=teacher&ma=<?php echo $row['PersonnelAccount']; ?>" onclick="return deleteConfirm()">
								Delete</a>
						</td>
						<td>
						<a class="btn btn-primary" href="?page=EditTeacher&ma=<?php echo $row['PersonnelAccount']; ?>">Update</a>
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