<div class="container-fluid">
		<h1 class="text-center">Information Role</h1>
    <div class="box-body">
		<table class="table table-bordered table-hover table-striped table-responsive" id="myTable">
			<thead>
				<tr>
					<th class="text-center">No</th>
					<th class="text-center">Role</th>
                    <th class="text-center">Description</th>
				</tr>
			</thead>
			<tbody>
				<?php 
    $num = 1;
    $result = mysqli_query($conn, "SELECT * FROM `role`");
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        ?>
					<tr>
						<td><?php echo $num ?></td>
                        <td><?php echo $row["RoleName"] ?></td>
                        <td><?php echo $row["RoleDescription"] ?></td>
                        </tr>
						<?php
        $num++;
    }
    ?>
				</tbody>
			</table>
    </div>
</div>
