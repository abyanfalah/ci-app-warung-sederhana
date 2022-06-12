
<div class="card shadow mx-auto" style="width: 500px">
	<div class="card-header bg-danger text-white">
		<strong>Hapus user dengan informasi berikut?</strong>
	</div>
	<div class="card-body">
			
			<div class="row">
				<div class="col-3">ID</div>
				<div class="col-1">:</div>
				<div class="col"><?php echo ucwords($user->id);?></div>
			</div>

			<div class="row">
				<div class="col-3">Nama</div>
				<div class="col-1">:</div>
				<div class="col"><?php echo ucwords($user->nama);?></div>
			</div>

			<div class="row">
				<div class="col-3">Alamat</div>
				<div class="col-1">:</div>
				<div class="col"><?php echo $user->alamat; ?></div>
			</div>

			<div class="row">
				<div class="col-3">Akses</div>
				<div class="col-1">:</div>
				<div class="col"><?php echo ucwords($user->akses);?></div>
			</div>
	</div>

	<div class="card-footer border-0 bg-white text-right">
		<a href="<?php echo base_url('user') ?>" class="btn btn-secondary">Batal</a>
		<button class="btn btn-danger" id="btnProceedDelete">
			Ya, hapus
		</button>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/script/user_delete.js') ?>"></script>