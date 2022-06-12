
<div class="card shadow mx-auto" style="width: 500px">
	<div class="card-header bg-danger text-white">
		<strong>Hapus barang dengan informasi berikut?</strong>
	</div>
	<div class="card-body">
			
			<div class="row">
				<div class="col-3">ID</div>
				<div class="col-1">:</div>
				<div class="col"><?php echo ucwords($barang->id);?></div>
			</div>

			<div class="row">
				<div class="col-3">Nama</div>
				<div class="col-1">:</div>
				<div class="col"><?php echo ucwords($barang->nama);?></div>
			</div>

			<div class="row">
				<div class="col-3">Jenis</div>
				<div class="col-1">:</div>
				<div class="col"><?php echo $barang->jenis; ?></div>
			</div>

			<div class="row">
				<div class="col-3">Harga</div>
				<div class="col-1">:</div>
				<div class="col"><?php echo ucwords($barang->harga);?></div>
			</div>
	</div>

	<div class="card-footer border-0 bg-white text-right">
		<a href="<?php echo base_url('barang') ?>" class="btn btn-secondary">Batal</a>
		<button class="btn btn-danger" id="btnProceedDelete">
			Ya, hapus
		</button>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/script/barang_delete.js') ?>"></script>