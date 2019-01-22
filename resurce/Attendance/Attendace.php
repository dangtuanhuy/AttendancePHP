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
	$AttendanceNum = $_GET["ma"];
	
	mysqli_query($conn, "DELETE FROM `attendance` WHERE AttendanceNum= $AttendanceNum");
}
?>
<?php
if (isset($_POST['btnDelete']) && isset($_POST['checkbox'])) {
	for ($i = 0; $i < count($_POST['checkbox']); $i++) {
		$AttendanceNum1 = $_POST['checkbox'][$i];
		mysqli_query($conn, "DELETE FROM `attendance` WHERE AttendanceNum=$AttendanceNum1");
	}
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
	<form name="frmXoa" method="post" action="">
		<h1 class="text-center">Manage Attendace</h1>
		<p>
			<a  class="btn btn-success" href="?page=AddAttendace">
				ADD
			</a>

		</p>
        <br>
        <table class="table table-bordered table-hover table-striped table-responsive" id="myTable">
			<thead>
				<tr>
                <th class="text-center"><strong>Choice</strong></th>
					<th class="text-center"><strong>No</strong></th>
					<th class="text-center"><strong>Class</strong></th>
                    <th class="text-center"><strong>Student</strong></th>
                    <th class="text-center"><strong>Subject</strong></th>
                    <th class="text-center col-md-1"><strong>Room</strong></th>
                    <th class="text-center"><strong>Session</strong></th>
                    <th class="text-center"><strong>Date</strong></th>
                    <th class="text-center"><strong>Check</strong></th>
					<th class="text-center"><strong>Reason</strong></th>
					<th class="text-center"><strong>Personnel</strong></th>
                    <th class="text-center"><strong>Delete</strong></th>
				</tr>
			</thead>
			<tbody>
				<?php 
			$num = 1;
			$result = mysqli_query($conn, "SELECT `AttendanceNum`,ClassName,`StudentName`,subject.SubjectName ,`AttendanceRoom`, `AttendanceSession`, `AttendanceDate`, `AttendanceCheck`, `AttendanceReason`, `PersonnelName` FROM `attendance`
    JOIN personnel on personnel.PersonnelAccount = attendance.PersonnelAccount
    JOIN classstudent on classstudent.ClassStudentNum = attendance.ClassStudentNum
    JOIN student on student.StudentCode = classstudent.StudentId
    JOIN class on class.ClassId = classstudent.ClassId
	JOIN subject on subject.SubjectId = class.SubjectId
	");
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				?>
					<tr>
						<td class="text-center"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row["AttendanceNum"] ?>"></td>
						<td><?php echo $num ?></td>
						<td><?php echo $row["ClassName"] ?></td>
                        <td><?php echo $row["StudentName"] ?></td>
                        <td><?php echo $row["SubjectName"] ?></td>
                        <td><?php echo $row["AttendanceRoom"] ?></td>
                        <td><?php echo $row["AttendanceSession"] ?></td>
                        <td><?php echo $row["AttendanceDate"] ?></td>
						<form method="POST">
                        <td>
<?php
if ($row["AttendanceCheck"] == 1) {
	echo '<a class="btn btn-default" href="?page=ActiveAttendace&AttendanceCheck=' . $row["AttendanceCheck"] . '&AttendanceNum=' . $row["AttendanceNum"] . '">Absent</a>';
} else {
	echo '<a class="btn btn-default" href="?page=ActiveAttendace&AttendanceCheck=' . $row["AttendanceCheck"] . '&AttendanceNum=' . $row["AttendanceNum"] . '">Present</a>';
}
?>
						</form>
						</td>
                        <td><?php echo $row["AttendanceReason"] ?></td>
                        <td><?php echo $row["PersonnelName"] ?></td>
						<td align='center'><a class="btn btn-danger"   href="?page=Attendace&ma=<?php echo $row['AttendanceNum']; ?>" onclick="return deleteConfirm()">Delete</a>
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