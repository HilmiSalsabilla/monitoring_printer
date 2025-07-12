<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1 style="color: black;">Form Tambah Data User</h1>
		</div>
		<div class="section-body">
			<form action="<?= base_url('user-store') ?>" method="POST" enctype="multipart/form-data">
				
				<div class="form-group">
					<label>Nama</label>
					<input type="text" name="nama" class="form-control" value="<?= set_value('nama') ?>">
					<small class="text-danger"><?= form_error('nama') ?></small>
				</div>

				<div class="form-group">
					<label>Email</label>
					<input type="email" name="email" class="form-control" value="<?= set_value('email') ?>">
					<small class="text-danger"><?= form_error('email') ?></small>
				</div>

				<div class="form-group">
					<label>NIK</label>
					<input type="text" name="nik" class="form-control" value="<?= set_value('nik') ?>">
					<small class="text-danger"><?= form_error('nik') ?></small>
				</div>

				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" placeholder="Minimal 6 karakter">
					<small class="text-danger"><?= form_error('password') ?></small>
				</div>

				<div class="form-group">
					<label>Level Akses</label>
					<select name="level" class="form-control">
						<option value="User" <?= set_value('level') == 'User' ? 'selected' : '' ?>>User</option>
						<option value="Admin" <?= set_value('level') == 'Admin' ? 'selected' : '' ?>>Admin</option>
					</select>
					<small class="text-danger"><?= form_error('level') ?></small>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-danger btn-md">Tambahkan User</button>
					<a href="<?= base_url('user') ?>" class="btn btn-secondary btn-md">Batal</a>
				</div>

			</form>
		</div>
	</section>
</div>
