<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<main id="konten-utama" class="p-4 sm:p-6 lg:p-8">
	<header class="mb-6 flex flex-wrap items-center justify-between gap-4">
		<div>
			<p class="page-eyebrow">User</p>
			<h1>Tambah Data User</h1>
		</div>
		<a class="btn-secondary" href="<?php echo base_url('user') ?>">
			<i class="fas fa-arrow-left" aria-hidden="true"></i> Kembali
		</a>
	</header>

	<section class="card max-w-2xl">
		<form action="<?php echo base_url('user-store') ?>" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

			<div class="field">
				<label for="nama">Nama</label>
				<input id="nama" type="text" name="nama" value="<?php echo set_value('nama') ?>" aria-describedby="nama-error">
				<i id="nama-error" class="field-error" role="alert"><?php echo form_error('nama') ?></i>
			</div>

			<div class="field">
				<label for="email">Email</label>
				<input id="email" type="email" name="email" value="<?php echo set_value('email') ?>" aria-describedby="email-error">
				<i id="email-error" class="field-error" role="alert"><?php echo form_error('email') ?></i>
			</div>

			<div class="field">
				<label for="nik">NIK</label>
				<input id="nik" type="text" name="nik" value="<?php echo set_value('nik') ?>" aria-describedby="nik-error">
				<i id="nik-error" class="field-error" role="alert"><?php echo form_error('nik') ?></i>
			</div>

			<div class="field">
				<label for="password">Password</label>
				<input id="password" type="password" name="password" value="<?php echo set_value('password') ?>" aria-describedby="password-error">
				<i id="password-error" class="field-error" role="alert"><?php echo form_error('password') ?></i>
			</div>

			<button type="submit" class="btn-primary">
				<i class="fas fa-user-plus" aria-hidden="true"></i> Tambahkan User
			</button>
		</form>
	</section>
</main>
