<h3>Daftar barang</h3>

<div class="alert alert-success" id="notificationAlert" style="display:none;">
	<span id="alertMessage"></span>
	<button data-dismiss="alert" class="close">&times;</button>
</div>

<a class="btn btn-success" href="<?php echo base_url('barang/create') ?>">Tambah barang baru</a>
<a class="btn btn-primary" href="<?php echo base_url('barang/supply') ?>">Barang masuk (update stok)</a>

<div class="card mt-3">
	<div class="card-body">
		<table class="table table-borderless table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>ID</th>
					<th>Nama</th>
					<th>Jenis</th>
					<th>Harga</th>
					<th>Satuan</th>
					<th>Stok</th>
					<th class="text-center">Opsi</th>
				</tr>
			</thead>

			<tbody>
				<?php $counter = 1;
				 foreach ($barang as $b):?>
					<tr>
						<td><?php echo $counter++; ?></td>
						<td><?php echo $b->id; ?></td>
						<td><?php echo ucwords($b->nama); ?></td>
						<td><?php echo ucwords($b->jenis); ?></td>
						<td>Rp <?php echo number_format($b->harga); ?></td>
						<td><?php echo $b->satuan; ?></td>
						<td><?php echo $b->stok; ?></td>
						<td class="col-2 text-center">
							<a href="<?php echo base_url('barang/edit/'.$b->id) ?>" class="btn btn-warning">
								<i class="fas fa-pen"></i>
							</a>
							<a href="<?php echo base_url('barang/delete/'.$b->id) ?>" class="btn btn-danger">
								<i class="fas fa-trash"></i>
							</a>
						</td>
					</tr>

				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/script/barang.js') ?>"></script>