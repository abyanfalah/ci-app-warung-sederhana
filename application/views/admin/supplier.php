<div class="alert alert-success" id="notificationAlert" style="display:none;">
	<span id="alertMessage"></span>
</div>

<!-- <a class="btn btn-success" href="<?php echo base_url('user/create') ?>">Tambah user baru</a> -->
<button class="btn btn-success" id="btnAddNewSupplier" data-toggle="modal" data-target="#modalCreateSupplier">Tambah supplier baru</button>

<div class="card mt-3">
	<div class="card-body">
		<table class="table table-borderless table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>ID</th>
					<th>Nama</th>
					<th>Asal</th>
					<th>Telpon</th>
					<th class="text-center">Opsi</th>
				</tr>
			</thead>

			<tbody id="tableSupplier">
				<!-- data di load dengan ajax -->
			</tbody>
		</table>
	</div>
</div>

<!-- MODALS -->
<!-- Modal create -->
<div id="modalCreateSupplier" class="modal fade" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered ">
		<div class="modal-content">
			<div class="modal-body">
				<h4>Tambah supplier baru</h4>

				<!-- form tambah supplier -->
				<form id="formCreateSupplier" method="post" class="col-8 mx-auto my-3">

					<!-- nama supplier -->
					<div class="form-group">
						<label for="nama">Nama</label>
						<input name="nama" type="text" class="form-control">
					</div>

					<!-- asal supplier -->
					<div class="form-group">
						<label for="asal">Asal</label>
						<input name="asal" type="text" class="form-control">
					</div>

					<!-- telpon supplier -->
					<div class="form-group">
						<label for="telpon">Telpon</label>
						<input name="telpon" type="text" class="form-control">
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
<div id="modalUpdateSupplier" class="modal fade" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered ">
		<div class="modal-content">
			<div class="modal-body">
				<h4>Edit data supplier:  <span class="supplierName"></span></h4>

				<!-- form update supplier -->
				<form id="formUpdateSupplier" method="post" class="col-8 mx-auto my-3">

					<!-- nama supplier -->
					<div class="form-group">
						<label for="nama">Nama</label>
						<input name="nama" type="text" class="form-control">
					</div>

					<!-- asal supplier -->
					<div class="form-group">
						<label for="asal">Asal</label>
						<input name="asal" type="text" class="form-control">
					</div>

					<!-- telpon supplier -->
					<div class="form-group">
						<label for="telpon">Telpon</label>
						<input name="telpon" type="text" class="form-control">
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
<div id="modalDeleteSupplier" class="modal fade">
	<div class="modal-dialog modal-dialog-centered ">
		<div class="modal-content">
			<div class="modal-body">
				<h4>Hapus supplier:  <span class="supplierName"></span>?</h4>
				</form>
			</div>

			<div class="modal-footer border-0">
				<button class="btn btn-secondary btnBatal" data-dismiss="modal">Batal</button>
				<button id="btnProceedDelete" class="btn btn-danger">Hapus</button>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript" src="<?php echo base_url('assets/script/supplier.js') ?>"></script>