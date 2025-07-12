<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1 style="color: black;">Form Tambah Data Printer</h1>
		</div>
		<div class="section-body">
			<form action="<?php echo base_url('printer-store') ?>" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label>Device Model</label>
					<input type="text" name="device_model" class="form-control" value="<?php echo set_value('device_model') ?>">
					<i class="text-danger"><?php echo form_error('device_model') ?></i>
				</div>
				<div class="form-group">
					<label>SN Printer</label>
					<input type="text" name="sn_printer" class="form-control" value="<?php echo set_value('sn_printer') ?>">
					<i class="text-danger"><?php echo form_error('sn_printer') ?></i>
				</div>
				<div class="form-group">
					<label>IP Address</label>
					<input type="text" name="ip_address" class="form-control" value="<?php echo set_value('ip_address') ?>">
					<i class="text-danger"><?php echo form_error('ip_address') ?></i>
				</div>
				<div class="form-group">
					<label>Hostname</label>
					<input type="text" name="hostname" class="form-control" value="<?php echo set_value('hostname') ?>">
					<i class="text-danger"><?php echo form_error('hostname') ?></i>
				</div>
				<div class="form-group">
					<label>Lokasi</label>
					<input type="text" name="lokasi" class="form-control" value="<?php echo set_value('lokasi') ?>">
					<i class="text-danger"><?php echo form_error('lokasi') ?></i>
				</div>
				<div>
					<button type="submit" class="btn btn-danger btn-md">Tambahkan Data</button>
				</div>
			</form>
		</div>
	</section>
</div>
