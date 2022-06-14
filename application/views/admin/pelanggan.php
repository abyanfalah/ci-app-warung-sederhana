<h3>Daftar pelanggan</h3>

<div class="alert alert-success" id="notificationAlert" style="display:none;">
	<span id="alertMessage"></span>
	<button data-dismiss="alert" class="close">&times;</button>
</div>

<button class="btn btn-success" data-toggle="modal" data-target="#modalCreatePelanggan">Tambah pelanggan</button>

<div class="card mt-3">
	<div class="card-body">
		<table class="table table-borderless table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Nama</th>
					<th>Telpon</th>
					<th>Alamat</th>
					<th class="text-center">Opsi</th>
				</tr>
			</thead>

			<tbody>
				<?php $counter = 1;
				 foreach ($pelanggan as $p):?>
					<tr>
						<td><?php echo $counter++; ?></td>
						<td><?php echo ucwords($p->nama); ?></td>
						<td><?php echo $p->telpon; ?></td>
						<td><?php echo ucwords($p->alamat); ?></td>
						<td class="col-2 text-center">

							<!-- button edit -->
							<button
							data-nama="<?php echo $p->nama; ?>"
							data-telpon="<?php echo $p->telpon; ?>"
							data-alamat="<?php echo $p->alamat; ?>"
							class="btn btn-warning btnUpdate"

							>
								<i class="fas fa-pen"></i>
							</button>

							<!-- button delete -->
							<button
							data-nama="<?php echo $p->nama ?>"
							data-telpon="<?php echo $p->telpon; ?>"
							class="btn btn-danger btnDelete"

							data-toggle="modal" data-target="#modalDeletePelanggan"
							>
								<i class="fas fa-trash"></i>
							</button>
						</td>
					</tr>

				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<!-- MODALS -->
<!-- Modal create -->
<div id="modalCreatePelanggan" class="modal fade" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered ">
		<div class="modal-content">
			<div class="modal-body">
				<h4>Tambah pelanggan baru</h4>

				<!-- form tambah pelanggan -->
				<form id="formCreatePelanggan" method="post" class="col-8 mx-auto my-3">

					<!-- nama pelanggan -->
					<div class="form-group">
						<label for="nama">Nama</label>
						<input name="nama" type="text" class="form-control">
					</div>

					<!-- telpon pelanggan -->
					<div class="form-group">
						<label for="telpon">Telpon</label>
						<input name="telpon" type="text" class="form-control">
					</div>

					<!-- alamat pelanggan -->
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<input name="alamat" type="text" class="form-control">
					</div>

					<div class="alert alert-danger fieldAlert" style="display:none;">
						Semua kolom harus diisi!
					</div>
				</form>
			</div>

			<div class="modal-footer border-0">
				<button class="btn btn-secondary btnBatal" data-dismiss="modal">Batal</button>
				<button id="btnSaveCreate" class="btn btn-primary">Simpan</button>
			</div>
		</div>
	</div>
</div>


<!-- modal update -->
<div id="modalUpdatePelanggan" class="modal fade" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered ">
		<div class="modal-content">
			<div class="modal-body">
				<h4>Edit data pelanggan:  <span class="pelangganName"></span></h4>

				<!-- form update pelanggan -->
				<form id="formUpdatePelanggan" method="post" class="col-8 mx-auto my-3">

					<!-- old_telpon number -->
					<input name="old_telpon" hidden type="text" class="form-control">

					<!-- nama pelanggan -->
					<div class="form-group">
						<label for="nama">Nama</label>
						<input name="nama" type="text" class="form-control">
					</div>

					<!-- telpon pelanggan -->
					<div class="form-group">
						<label for="telpon">Telpon</label>
						<input name="telpon" type="text" class="form-control">
					</div>

					<!-- alamat pelanggan -->
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<input name="alamat" type="text" class="form-control">
					</div>

					<div class="alert alert-danger fieldAlert" style="display:none;">
						Semua kolom harus diisi!
					</div>
				</form>
			</div>

			<div class="modal-footer border-0">
				<button class="btn btn-secondary btnBatal" data-dismiss="modal">Batal</button>
				<button id="btnSaveUpdate" class="btn btn-primary">Simpan</button>
			</div>
		</div>
	</div>
</div>


<!-- modal delete -->
<div id="modalDeletePelanggan" class="modal fade">
	<div class="modal-dialog modal-dialog-centered ">
		<div class="modal-content">
			<div class="modal-body">
				<h4>Hapus pelanggan:  <span class="pelangganName"></span>?</h4>
				</form>
			</div>

			<div class="modal-footer border-0">
				<button class="btn btn-secondary btnBatal" data-dismiss="modal">Batal</button>
				<button id="btnProceedDelete" class="btn btn-danger">Hapus</button>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript" src="<?php echo base_url('assets/script/pelanggan.js') ?>"></script>