<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1 style="color: black;">Form Tambah Data User</h1>
		</div>
		<div class="section-body">
			<form action="<?php echo base_url('user-store') ?>" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label>Nama</label>
					<input type="text" name="nama" class="form-control" value="<?php echo set_value('nama') ?>">
					<i class="text-danger"><?php echo form_error('nama') ?></i>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="email" class="form-control" value="<?php echo set_value('email') ?>">
					<i class="text-danger"><?php echo form_error('email') ?></i>
				</div>
				<div class="form-group">
					<label>NIK</label>
					<input type="text" name="nik" class="form-control" value="<?php echo set_value('nik') ?>">
					<i class="text-danger"><?php echo form_error('nik') ?></i>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="" name="password" class="form-control" value="<?php echo set_value('password') ?>">
					<i class="text-danger"><?php echo form_error('password') ?></i>
				</div>
				<div>
					<button type="submit" class="btn btn-danger btn-md">Tambahkan User</button>
				</div>
			</form>
		</div>
	</section>
</div>
