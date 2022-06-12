<h3>Daftar user</h3>

<div class="alert alert-success" id="notificationAlert" style="display:none;">
	<span id="alertMessage"></span>
	<button data-dismiss="alert" class="close">&times;</button>
</div>

<a class="btn btn-success" href="<?php echo base_url('user/create') ?>">Tambah user baru</a>
<div class="card mt-3">
	<!-- <div class="card-header"></div> -->
	<div class="card-body">
		<table class="table table-borderless table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>ID</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Lahir</th>
					<th>Akses</th>
					<th class="text-center">Opsi</th>
				</tr>
			</thead>

			<tbody>
				<?php $counter = 1;
				 foreach ($user as $u):?>
					<tr>
						<td><?php echo $counter++; ?></td>
						<td><?php echo ucwords($u->id); ?></td>
						<td><?php echo ucwords($u->nama); ?></td>
						<td><?php echo ucwords($u->alamat); ?></td>
						<td><?php echo $u->lahir; ?></td>
						<td><?php echo ucwords($u->akses); ?></td>
						<td class="col-2 text-center">
							<a href="<?php echo base_url('user/edit/'.$u->id) ?>" class="btn btn-warning">
								<i class="fas fa-pen"></i>
							</a>
							<a href="" class="btn btn-danger">
								<i class="fas fa-trash"></i>
							</a>
						</td>
					</tr>

				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/script/user.js') ?>"></script>