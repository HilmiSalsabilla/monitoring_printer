<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<main id="konten-utama" class="p-4 sm:p-6 lg:p-8">
	<header class="mb-6 flex flex-wrap items-center justify-between gap-4">
		<div>
			<p class="page-eyebrow">User</p>
			<h1>Edit Data User</h1>
		</div>
		<a class="btn-secondary" href="<?php echo base_url('user') ?>">
			<i class="fas fa-arrow-left" aria-hidden="true"></i> Kembali
		</a>
	</header>

	<section class="card max-w-2xl">
		<form action="<?php echo base_url('user-edit') ?>" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
			<input type="hidden" name="id_user" value="<?php echo $user->id_user ?>">

			<div class="field">
				<label for="nama">Nama</label>
				<input id="nama" type="text" name="nama" value="<?php echo $user->nama ?>" aria-describedby="nama-error">
				<i id="nama-error" class="field-error" role="alert"><?php echo form_error('nama') ?></i>
			</div>

			<div class="field">
				<label for="email">Email</label>
				<input id="email" type="email" name="email" value="<?php echo $user->email ?>" aria-describedby="email-error">
				<i id="email-error" class="field-error" role="alert"><?php echo form_error('email') ?></i>
			</div>

			<div class="field">
				<label for="nik">NIK</label>
				<input id="nik" type="text" name="nik" value="<?php echo $user->nik ?>" aria-describedby="nik-error">
				<i id="nik-error" class="field-error" role="alert"><?php echo form_error('nik') ?></i>
			</div>

			<div class="field">
				<label for="password">Password baru</label>
				<input id="password" type="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah password" aria-describedby="password-error password-hint">
				<span id="password-hint" class="field-hint">Biarkan kosong untuk tetap menggunakan password saat ini.</span>
				<i id="password-error" class="field-error" role="alert"><?php echo form_error('password') ?></i>
			</div>

			<button type="submit" class="btn-primary">
				<i class="fas fa-floppy-disk" aria-hidden="true"></i> Simpan Data
			</button>
		</form>
	</section>
</main>
