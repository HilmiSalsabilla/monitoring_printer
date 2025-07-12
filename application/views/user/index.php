<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1 style="color:black;">KELOLA USER</h1>
    </div>

    <div class="section-body">
      <div class="card card-danger">
        <div class="card-body">

          <?php if ($this->session->flashdata('sukses')): ?>
            <div class="alert alert-success">
              <?= $this->session->flashdata('sukses') ?>
            </div>
          <?php endif; ?>

          <?php if ($this->session->userdata('level') === 'Admin'): ?>
            <a href="<?= base_url('user-tambah') ?>" class="btn btn-md btn-danger mb-3">Tambah</a>
          <?php endif; ?>

          <table class="table table-bordered table-hover">
            <thead class="thead-dark">
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>NIK</th>
                <th>Level</th>
                <?php if ($this->session->userdata('level') === 'Admin'): ?>
                  <th>Aksi</th>
                <?php endif; ?>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($user as $key => $value): ?>
                <tr>
                  <td><?= $key + 1 ?></td>
                  <td><?= $value->nama ?></td>
                  <td><?= $value->email ?></td>
                  <td><?= $value->nik ?></td>
                  <td>
                    <span class="badge <?= $value->level == 'Admin' ? 'badge-danger' : 'badge-secondary' ?>">
                      <?= $value->level ?>
                    </span>
                  </td>

                  <?php if ($this->session->userdata('level') === 'Admin'): ?>
                    <td>
                      <a href="<?= base_url('user-edit/' . $value->id_user) ?>" class="btn btn-sm btn-warning">Edit</a>
                      <a href="<?= base_url('user-hapus/' . $value->id_user) ?>" class="btn btn-sm btn-dark" onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</a>
                    </td>
                  <?php endif; ?>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </section>
</div>