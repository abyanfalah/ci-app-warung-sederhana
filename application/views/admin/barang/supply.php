<!-- row pilih supplier dan display data supplier -->
<div class="row mb-3">
	<div class="col">
		<div class="card bg-primary text-white mx-auto">
			<div class="card-body">
				<div class="row">
					<div class="col">
						<strong>Supplier</strong> 
					</div>
					<div class="col text-right">
						<button class="btn btn-light text-primary" id="btnPilihSupplierLain" style="display:none;" data-toggle="modal" data-target="#modalPilihSupplier">
							Pilih supplier lain
						</button>
					</div>
				</div>
				<hr>
				<button class="btn btn-light text-primary" data-toggle="modal" data-target="#modalPilihSupplier">Pilih supplier</button>


				<!-- detail supplier -->
				<div id="supplierDetail" style="display:none;" class="col">
					<div class="row">
						<div class="col-4">ID</div>
						<div class="col" id="idSupplier" style="font-weight: bold;"></div>
					</div>
		
					<hr>
		
					<div class="row">
						<div class="col-4">Nama</div>
						<div class="col" id="namaSupplier" style="font-weight: bold;"></div>
					</div>
					
					<hr>	

					<div class="row">
						<div class="col-4">Telpon</div>
						<div class="col" id="telponSupplier" style="font-weight: bold;"></div>
					</div>

					<hr>

					<div class="row">
						<div class="col-4">Asal</div>
						<div class="col" id="asalSupplier" style="font-weight: bold;"></div>
					</div>
				</div>
				
			</div>
		</div>

	</div>
</div>

<!-- row transaksi -->
<div class="row" id="sectionPilihBarang" style="display:none;">

	<div class="col">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col  d-flex align-items-center">
					<strong>Daftar barang</strong>
				</div>
				<div class="col">
					<!-- cari / filter barang -->
					<input class="form-control" type="text" id="tbCari" placeholder="ketik untuk mencari">
				</div>
				</div>
			</div>
			<div class="card-body">
				<table class="table table-borderless table-hover table-sm">
					<thead>
						<tr>
							<th>#</th>
							<th>ID</th>
							<th>Nama</th>
							<th>Satuan</th>
							<!-- <th>Stok</th> -->
						</tr>
					</thead>

					<tbody id="tableBarang">
						<?php $counter = 1;
						 foreach ($barang as $b):?>
							<tr>
								<td data-id="<?php echo $b->id; ?>"><?php echo $counter++; ?></td>
								<td data-id="<?php echo $b->id; ?>"><?php echo $b->id; ?></td>
								<td data-id="<?php echo $b->id; ?>"><?php echo ucwords($b->nama); ?></td>
								<td data-id="<?php echo $b->id; ?>"><?php echo $b->satuan; ?></td>
								<!-- <td data-id-barang="<?php echo $b->id; ?>"><?php echo $b->stok; ?></td> -->
							</tr>

						<?php endforeach; ?>
					</tbody>
				</table>	
			</div>
		</div>
	</div>

	<div class="col" id="listBarangMasuk">
		<div class="card">
			<div class="card-header bg-warning text-dark">
				<div class="row">
					<div class="col d-flex align-items-center">
						<strong>Barang masuk</strong>
					</div>
					<div class="col text-right">
						<button id="btnSimpan" class="btn bg-light text-warning shadow-sm" data-toggle="modal" data-target="#modalConfirmation">
							Simpan
						</button>
					</div>
				</div>
			</div>
			<div class="card-body">
				<table class="table table-sm table-borderless table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>ID</th>
							<th>Nama</th>
							<th>QTY</th>
							<th>Satuan</th>
						</tr>
					</thead>
					<tbody id="tableBarangMasuk">
						
					</tbody>


				</table>
			</div>
		</div>
	</div>
</div>








<!-- modal pilih supplier -->
<div id="modalPilihSupplier" class="modal fade" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="row">
					<div class="col">
						<h3>Pilih supplier</h3>
					</div>
					<div class="col text-right">
						<button data-dismiss="modal" class="btn btn-danger">Batal</button>		
					</div>
				</div>				
				<table class="table table-striped" width="100%">
								<thead>
									<tr>
										<th class="col-1">#</th>
										<th>ID</th>
										<th>Nama</th>
										<th>Asal</th>
										<th colspan="2">Telpon</th>
									</tr>
								</thead>

								<tbody id="tableListSupplier">
									<!-- diisi dengan js -->
								</tbody>
					</table>
			</div>			
		</div>

	</div>
</div>

<!-- modal confirmation -->
<div class="modal fade" id="modalConfirmation" data-backdrop="static">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header bg-warning text-white">
				<strong>Update stok?</strong>
				
			</div>
			<div class="modal-body p-3">
				<div class="btnConfirmationSection">
					<button id="btnConfirmUpdate" class="btn btn-primary">Ya</button>
					<button class="btn btn-secondary btnCancelConfirmation" data-dismiss="modal">Batal</button>
				</div>

				<div id="requirePasswordSection" style="display: none;">
					<form>
						<div class="form-group">
							<label>Masukkan Password: </label>
							<input class="form-control" type="password" name="passwordConfirmation">
							<small id="wrongPasswordMessage" class="form-text text-danger" style="display: none;">Password salah!</small>
						</div>
						<button class="btn btn-success" id="btnPasswordConfirmation">Konfirmasi</button>
						<button class="btn btn-secondary btnCancelConfirmation" data-dismiss="modal">Batal</button>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>

<!-- <button id="test" class="btn btn-danger">test</button> -->

<script type="text/javascript" src="<?php echo base_url('assets/script/barang_supply.js') ?>"></script>

