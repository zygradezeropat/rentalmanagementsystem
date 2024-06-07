<?php include("connect.php");

include 'sidebar.php';
if (!isset($_SESSION['admin'])) {
	header('Location: index.php');
}


?>

<style>
	.text-primary {
		color: #0CDA90 !important;
	}

	.btn-primary {
		color: #fff;
		background-color: #0CDA90;
		border-color: #0CDA90;
	}

	.btn-primary {
		box-shadow: 0 3px 2px rgb(12 218 144 / 20%);
	}
</style>
</head>

<body>

	<div class="home">
		<main>


			<!-- Update User Modal -->
			<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editForm" aria-hidden="true">
				<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
					<div class="modal-content p-md-3">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">
								<p id="userinfo"></p>
							</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="edit_user.php" method="GET">
							<div class="modal-body">
								<input type="hidden" name="edit_id" id="edit_id">

								<div class="row">

									<div class="form-group col-lg-12">
										<label class="font-weight-bold text-small" for="username">Username<span class="text-primary ml-1">*</span></label>
										<input class="form-control" id="username" type="text" placeholder="New Username" required name="username" />
									</div>

									<div class="form-group col-lg-12">
										<label class="font-weight-bold text-small" for="password">Password<span class="text-primary ml-1">*</span></label>
										<input class="form-control" id="pass" type="password" placeholder="New Password" required name="pass" />
									</div>


									<div class="form-group col-lg-12">
										<button type='submit' class="btn btn-primary" name="submit">Update</button>
									</div>
								</div>
						</form>
					</div>
				</div>
			</div>

	</div>

	
	<div class="col-md-12">
		<div class="card">
			<div>
				<table class="table table-striped table-bordered" id="myTable">
					<thead>
						<tr>
							<th class="text-center">ID</th>
							<th class="">Name</th>
							<th class="">Username</th>
							<th class="text-center">Password</th>
							<th class="text-center">Type</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$user = $conn->query("SELECT * FROM user ORDER BY NAME ASC");
						$i = 1;
						while ($row = $user->fetch_assoc()) :
						?>
							<tr>
								<td class="text-center"><?php echo $row['id'] ?></td>
								<td><?php echo ucwords($row['name']) ?></td>
								<td><?php echo $row['user_name'] ?></td>
								<td><?php echo $row['pass'] ?></td>
								<td class="text-center"><?php echo $row['type'] ?></td>
								<td class="text-center">
									<button class="btn btn-sm btn-outline-primary editBtn" type="button">Edit</button>
								
								</td>
							</tr>
						<?php endwhile; ?>
					</tbody>
				</table>

			</div>
		</div>
	</div>
	</main>
	</div>

</body>

<script>
	$(document).ready(function() {
		//Modal for Delete
		$('.deleteBtn').on('click', function() {
			$('#deletemodal').modal('show');

			$tr = $(this).closest('tr');
			var data = $tr.children("td").map(function() {
				return $(this).text();
			}).get();
			console.log(data);
			$('#delete_id').val(data[0]);

		});

		$('.editBtn').on('click', function() {
			$('#editModal').modal('show');

			$tr = $(this).closest('tr');
			var data = $tr.children("td").map(function() {
				return $(this).text();
			}).get();
			console.log(data);
			$('#edit_id').val(data[0]);
			$('#username').val(data[2]);
			$('#pass').val(data[3]);
			$('#userinfo').html('Edit ' + data[1] + ' Information');


		});


	});
</script>

<?php if (isset($_GET['added'])) { ?>
		<script>
			alert('Successfully add');
		</script>
	<?php } ?>

	<?php if (isset($_GET['edit'])) { ?>
		<script>
			alert('Successfully edited');
		</script>
	<?php } ?>
	<?php if (isset($_GET['delete'])) { ?>
		<script>
			alert('Successfully Deleted');
		</script>
	<?php } ?>
	