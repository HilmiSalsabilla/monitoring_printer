<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1 style="color: black;">Form Edit Data User</h1>
    </div>
    <div class="section-body">
      <form action="<?= base_url('user-edit') ?>" method="POST" enctype="multipart/form-data">
        
        <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">

        <div class="form-group">
          <label>Nama</label>
          <input type="text" name="nama" class="form-control" value="<?= set_value('nama', $user['nama']) ?>">
          <small class="text-danger"><?= form_error('nama') ?></small>
        </div>

        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" class="form-control" value="<?= set_value('email', $user['email']) ?>">
          <small class="text-danger"><?= form_error('email') ?></small>
        </div>

        <div class="form-group">
          <label>NIK</label>
          <input type="text" name="nik" class="form-control" value="<?= set_value('nik', $user['nik']) ?>">
          <small class="text-danger"><?= form_error('nik') ?></small>
        </div>

        <div class="form-group">
          <label>Password (Kosongkan jika tidak ingin mengubah)</label>
          <input type="password" name="password" class="form-control" placeholder="Biarkan kosong jika tidak diubah">
          <small class="text-danger"><?= form_error('password') ?></small>
        </div>

        <div class="form-group">
          <label>Level Akses</label>
          <select name="level" class="form-control">
            <option value="User" <?= $user['level'] == 'User' ? 'selected' : '' ?>>User</option>
            <option value="Admin" <?= $user['level'] == 'Admin' ? 'selected' : '' ?>>Admin</option>
          </select>
          <small class="text-danger"><?= form_error('level') ?></small>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          <a href="<?= base_url('user') ?>" class="btn btn-secondary">Batal</a>
        </div>

      </form>
    </div>
  </section>
</div>