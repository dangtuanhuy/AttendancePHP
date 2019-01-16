<?php
if (isset($_GET["ma"])) {
    $ma = $_GET["ma"];
    
    $sqlstring = "SELECT `StudentCode`, `StudentName`, `StudentBirth`, `StudentPhone`, `StudentAddress`, `StudentEmail` FROM `student` WHERE StudentCode='$ma'";

    $result = mysqli_query($conn, $sqlstring);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $studentcode = $row['StudentCode'];
    $studentname = $row['StudentName'];
    $studentbirth = $row['StudentBirth'];
    $studentphone = $row['StudentPhone'];
    $studentemail = $row['StudentAddress'];
    $studentaddres = $row['StudentEmail'];
} else {
    echo '<meta http-equiv="refresh" content="0;URL=?page=student"/>';
}
if (isset($_POST["btnEdit"])) {
    $studentname = $_POST['txtName'];
    $studentbirth = $_POST['txtDate'];
    $studentphone = $_POST['txtPhone'];
    $studentemail = $_POST['txtEmail'];
    $studentaddres = $_POST['txtAddress'];
    $sqlUpdate = "UPDATE `student` SET StudentName = '".$studentname."',StudentBirth='".$studentbirth."',StudentPhone='". $studentphone ."',StudentAddress='".$studentaddres."',StudentEmail='".$studentemail."'WHERE StudentCode='$ma'";
    mysqli_query($conn, $sqlUpdate);
    echo '<meta http-equiv="refresh" content="0;URL=?page=student"/>';
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
        
        <form method="post" class="form-horizontal">
					<div class="form-group">
						<h3 class="text-center">Update Student</h3>
					</div>
					<div class="form-group">
						<label for="txtID">Roll.No:</label>
						<input type="text" class="form-control" id="txtID" required name="txtID" placeholder="A17007" readonly='' value='<?php echo  $studentcode ; ?>'>
					</div>
					<div class="form-group">
						<label for="txtName">Name:</label>
						<input type="text" class="form-control" id="txtName" required name="txtName" placeholder="Name" value='<?php echo $studentname ; ?>'>
					</div>
                    <div class="form-group">
						<label for="txtDate">Date of Birth:</label>
						<input type="date" class="form-control" id="txtDate" required name="txtDate" placeholder="Birthday" value='<?php echo $studentbirth  ; ?>'>
					</div>
                    <div class="form-group">
						<label for="txtPhone">Phone:</label>
						<input type="text" class="form-control" id="txtPhone" required name="txtPhone" placeholder="0963505927" value='<?php echo $studentphone; ?>'>
					</div>
                   
                    <div class="form-group">
						<label for="txtAddress">Adrress:</label>
						<input type="text" class="form-control" id="txtAddress" required name="txtAddress" placeholder="huygama@gmail.com" value='<?php echo $studentemail; ?>' >
					</div>
                    <div class="form-group">
						<label for="txtEmail">Email:</label>
						<input type="email" class="form-control" id="txtEmail" required name="txtEmail" placeholder="Address" value='<?php echo $studentaddres; ?>' readonly=''>
					</div>
					<input type="submit" class="btn btn-primary" name="btnEdit" value="Update"/>
					<input type="reset" name="btnReset" value="Cancel" class="btn btn-info" />
				</form>
        </div>
        </div>
        </div>