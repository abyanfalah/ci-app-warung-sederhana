<?php 
	if ($this->session->flashdata('just_logged_in')) {
	// if(true){
?>
		<div class="alert alert-success" id="welcomeAlert">
			Selamat datang <?php echo ucwords($this->session->userdata('nama')); ?>
		</div>
<?php
	}

 ?>


<script type="text/javascript" src="<?php echo base_url('assets/script/dashboard.js') ?>"></script>