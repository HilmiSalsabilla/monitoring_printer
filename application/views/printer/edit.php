<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1 style="color: black;">Form Edit Data Printer</h1>
		</div>
		<div class="section-body">
			<form action="<?php echo base_url('printer-edit') ?>" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id_printer" value="<?php echo $printer->id_printer ?>">
				<div class="form-group">
					<label>Device Model</label>
					<input type="text" name="device_model" class="form-control" value="<?php echo $printer->device_model ?>">
					<i class="text-danger"><?php echo form_error('device_model') ?></i>
				</div>
				<div class="form-group">
					<label>SN Printer</label>
					<input type="text" name="sn_printer" class="form-control" value="<?php echo $printer->sn_printer ?>">
					<i class="text-danger"><?php echo form_error('sn_printer') ?></i>
				</div>
				<div class="form-group">
					<label>IP Address</label>
					<input type="text" name="ip_address" class="form-control" value="<?php echo $printer->ip_address ?>">
					<i class="text-danger"><?php echo form_error('ip_address') ?></i>
				</div>
				<div class="form-group">
					<label>Hostname</label>
					<input type="text" name="hostname" class="form-control" value="<?php echo $printer->hostname ?>">
					<i class="text-danger"><?php echo form_error('hostname') ?></i>
				</div>
				<div class="form-group">
					<label>Lokasi</label>
					<input type="text" name="lokasi" class="form-control" value="<?php echo $printer->lokasi ?>">
					<i class="text-danger"><?php echo form_error('lokasi') ?></i>
				</div>
				<div>
					<button type="submit" class="btn btn-danger btn-md">Simpan Data</button>
				</div>
			</form>
		</div>
	</section>
</div>
