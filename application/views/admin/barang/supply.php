<!-- col pilih supplier dan display data supplier -->
<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-body">
				<strong>Supplier</strong>
				<button class="btn btn-primary" data-toggle="modal" data-target="#modalPilihSupplier">Pilih supplier</button>

				
			</div>
		</div>

	</div>
</div>

<!-- col pilih barang untuk update stok -->
<div class="row" id="sectionPilihBarang" style="display:none;">
	<div class="col">
		section Pilih barang
	</div>
</div>








<!-- modal pilih supplier -->
<!-- modal checkout -->
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
				<table class="table table-striped" id="tableListSupplier" width="100%">
								<thead>
									<tr>
										<th class="col-1">#</th>
										<th>ID</th>
										<th>Nama</th>
										<th>Asal</th>
										<th colspan="2">Telpon</th>
									</tr>
								</thead>

								<tbody>
									<!-- diisi dengan js -->
								</tbody>
					</table>
			</div>			
		</div>

	</div>
</div>


<script type="text/javascript" src="<?php echo base_url('assets/script/barang_supply.js') ?>"></script>
