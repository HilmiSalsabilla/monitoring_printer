<main class="main-content">
  <div class="page-header">
    <div>
      <span class="page-eyebrow">User</span>
      <h1>Tambah Data User</h1>
    </div>
    <a href="<?php echo base_url('user') ?>" class="btn btn-warning btn-md">
      <i class="fas fa-arrow-left mr-1"></i> Kembali
    </a>
  </div>

  <div class="card">
    <div class="card-body">
      <form action="<?php echo base_url('user-store') ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
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
          <input type="password" name="password" class="form-control" value="<?php echo set_value('password') ?>">
          <i class="text-danger"><?php echo form_error('password') ?></i>
        </div>
        <div>
          <button type="submit" class="btn btn-danger btn-md">
            <i class="fas fa-save mr-1"></i> Tambahkan User
          </button>
        </div>
      </form>
    </div>
  </div>
</main>
