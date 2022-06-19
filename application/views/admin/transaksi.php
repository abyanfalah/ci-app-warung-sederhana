<!-- <h3>Transaksi</h3> -->
<?php 
	die(var_dump($this->transaksi_model->new_id()));
 ?>
<div class="card mt-3">
	<div class="card-body">
		<table class="table table-borderless table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>ID</th>
					<th>Total</th>
					<th>Kasir</th>
					<th>Pelanggan</th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td>1</td>
					<td><?php echo date("Ymd")."001" ?></td>
					<td>Rp 15.000</td>
					<td>Admin</td>
					<td>Asep</td>
					<td>
						<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalView">
							<i class="fas fa-eye"></i>
						</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<!-- modal view -->
<div class="modal fade" id="modalView">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content p-3">
			<div class="modal-body">
				<div class="row">
					<div class="col">
						<h5>Detail transaksi: <?php echo date("Ymd"); ?></h5>		
					</div>
					<div class="col text-right">
						<button class="btn btn-danger" data-dismiss="modal">Tutup</button>		
					</div>
				</div>
				
				
				<table class="table table-borderless">
					<thead>
						<tr>
							<th>#</th>
							<th>ID</th>
							<th>harga</th>
							<th>qty</th>
							<th>subtotal</th>
						</tr>
					</thead>

					<tbody id="tableDetailTransaksi">

						<tr class="bg-primary text-white">
							<td colspan="4"><strong>Total:</strong></td>
							<td><strong>15.000</strong></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>			

<script type="text/javascript" src="<?php echo base_url("assets/script/transaksi.js") ?>"></script>