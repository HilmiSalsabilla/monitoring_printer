<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<main id="konten-utama" class="p-4 sm:p-6 lg:p-8">
	<header class="mb-6 flex flex-wrap items-center justify-between gap-4">
		<div>
			<p class="page-eyebrow">Printer</p>
			<h1>Tambah Data Printer</h1>
		</div>
		<a class="btn-secondary" href="<?php echo base_url('printer') ?>">
			<i class="fas fa-arrow-left" aria-hidden="true"></i> Kembali
		</a>
	</header>

	<section class="card max-w-2xl">
		<form action="<?php echo base_url('printer-store') ?>" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

			<fieldset>
				<legend class="mb-4 text-sm font-semibold text-ink-900">Data Printer Baru</legend>

				<div class="field">
					<label for="device_model">Device Model</label>
					<input id="device_model" type="text" name="device_model" value="<?php echo set_value('device_model') ?>" placeholder="Contoh: HP LaserJet Pro" aria-describedby="device_model-error">
					<i id="device_model-error" class="field-error" role="alert"><?php echo form_error('device_model') ?></i>
				</div>

				<div class="field">
					<label for="sn_printer">SN Printer</label>
					<input id="sn_printer" type="text" name="sn_printer" value="<?php echo set_value('sn_printer') ?>" placeholder="Nomor seri printer" aria-describedby="sn_printer-error">
					<i id="sn_printer-error" class="field-error" role="alert"><?php echo form_error('sn_printer') ?></i>
				</div>

				<div class="field">
					<label for="ip_address">IP Address</label>
					<input id="ip_address" type="text" name="ip_address" value="<?php echo set_value('ip_address') ?>" placeholder="192.168.x.x" aria-describedby="ip_address-error">
					<i id="ip_address-error" class="field-error" role="alert"><?php echo form_error('ip_address') ?></i>
				</div>

				<div class="field">
					<label for="hostname">Hostname</label>
					<input id="hostname" type="text" name="hostname" value="<?php echo set_value('hostname') ?>" aria-describedby="hostname-error">
					<i id="hostname-error" class="field-error" role="alert"><?php echo form_error('hostname') ?></i>
				</div>

				<div class="field">
					<label for="lokasi">Lokasi</label>
					<input id="lokasi" type="text" name="lokasi" value="<?php echo set_value('lokasi') ?>" aria-describedby="lokasi-error">
					<i id="lokasi-error" class="field-error" role="alert"><?php echo form_error('lokasi') ?></i>
				</div>
			</fieldset>

			<button type="submit" class="btn-primary">
				<i class="fas fa-plus" aria-hidden="true"></i> Tambahkan Data
			</button>
		</form>
	</section>
</main>
