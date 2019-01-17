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
	$ClassStudentNum = $_GET["ma"];
	mysqli_query($conn, "DELETE FROM `classstudent` WHERE ClassStudentNum=$ClassStudentNum");
}
?>
<?php
if (isset($_POST['btnDelete']) && isset($_POST['checkbox'])) {
	for ($i = 0; $i < count($_POST['checkbox']); $i++) {
		$ClassStudentNum1 = $_POST['checkbox'][$i];
		mysqli_query($conn, "DELETE FROM `classstudent` WHERE ClassStudentNum=$ClassStudentNum1");
	}
}
?>

<div class="container-fluid">
   
	<form name="frmXoa" method="post" action="">
		<h1 class="text-center">Manage Student-Class</h1>
		<p>
			<a  class="btn btn-success" href="?page=Addclassstudent">
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
					<th class="text-center">Class</th>
                    <th class="text-center col-md-3">Student</th>
					<th class="text-center">Delete</th>
					<th class="text-center">Update</th>
				</tr>
			</thead>
			<tbody>
				<?php 
			$num = 1;
			$result = mysqli_query($conn, "SELECT `ClassStudentNum`, `ClassName`, `StudentName` FROM classstudent,student,class 
    WHERE class.ClassId = classstudent.ClassId AND student.StudentCode = classstudent.StudentId
    ORDER BY classstudent.ClassId ASC");
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				?>
					<tr>
						<td class="text-center"><input name="checkbox[]" type="checkbox" id="checkbox[]" class="text-center" value="<?php echo $row["ClassStudentNum"] ?>"></td>
						<td class="text-center"><?php echo $num ?></td>
                        <td class="text-center"><?php echo $row["ClassName"] ?></td>
                        <td ><?php echo $row["StudentName"] ?></td>
						<td align='center'>
							<a class="btn btn-danger"   href="?page=classstudent&ma=<?php echo $row['ClassStudentNum']; ?>" onclick="return deleteConfirm()">
								Delete</a>
							</td>
							<td>
								<a class="btn btn-primary" href="?page=Editclassstudent&ma=<?php echo $row['ClassStudentNum']; ?>">Update</a>
							</td>
						</tr>
						<?php
					$num++;
				}
				?>
				</tbody>
                
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
