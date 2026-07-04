<main class="main-content">
  <div class="page-header">
    <div>
      <span class="page-eyebrow">User</span>
      <h1>Edit Data User</h1>
    </div>
    <a href="<?php echo base_url('user') ?>" class="btn btn-warning btn-md">
      <i class="fas fa-arrow-left mr-1"></i> Kembali
    </a>
  </div>

  <div class="card">
    <div class="card-body">
      <form action="<?php echo base_url('user-edit') ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <input type="hidden" name="id_user" value="<?php echo $user->id_user ?>">
        <div class="form-group">
          <label>Nama</label>
          <input type="text" name="nama" class="form-control" value="<?php echo $user->nama ?>">
          <i class="text-danger"><?php echo form_error('nama') ?></i>
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="text" name="email" class="form-control" value="<?php echo $user->email ?>">
          <i class="text-danger"><?php echo form_error('email') ?></i>
        </div>
        <div class="form-group">
          <label>NIK</label>
          <input type="text" name="nik" class="form-control" value="<?php echo $user->nik ?>">
          <i class="text-danger"><?php echo form_error('nik') ?></i>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="text" name="password" class="form-control" value="<?php echo $user->password ?>">
          <i class="text-danger"><?php echo form_error('password') ?></i>
        </div>
        <div>
          <button type="submit" class="btn btn-danger btn-md">
            <i class="fas fa-save mr-1"></i> Simpan Data
          </button>
        </div>
      </form>
    </div>
  </div>
</main>
