<main class="main-content">
  <div class="page-header">
    <div>
      <span class="page-eyebrow">Manajemen</span>
      <h1>Kelola User</h1>
    </div>
  </div>

  <div class="card">
    <div class="card-body">

      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Data User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Trash Bin</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <!-- Tab "Data User" -->
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <?php if ($this->session->userdata('level') == 'Admin'): ?>
            <a href="<?php echo base_url('user-tambah') ?>" class="btn btn-md btn-danger mb-3">
              <i class="fas fa-plus mr-1"></i> Tambah Data User
            </a>
          <?php endif; ?>
          <div class="table-wrap">
            <table class="table table-md table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>NIK</th>
                  <th>Password</th>
                  <th>Level</th>
                  <?php if ($this->session->userdata('level') == 'Admin'): ?>
                  <th scope="col">Aksi</th>
                  <?php endif; ?>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($user as $key => $value): ?>
                <tr>
                  <td><?php echo $key+1 ?></td>
                  <td><?php echo $value->nama ?></td>
                  <td><?php echo $value->email ?></td>
                  <td><?php echo $value->nik ?></td>
                  <td><?php echo $value->password ?></td>
                  <td><span class="badge <?= $value->level == 'Admin' ? 'badge-danger' : 'badge-dark' ?>"><?php echo $value->level ?></span></td>
                  <td>
                  <?php if ($this->session->userdata('level') == 'Admin'): ?>
                  <a href="<?php echo base_url('user-edit/'.$value->id_user) ?>" class="btn btn-sm btn-warning">Edit</a>
                  <a href="<?php echo base_url('user-hapus/'.$value->id_user) ?>" class="btn btn-sm btn-dark" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">Hapus</a>
                  <?php endif; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- Tab "Trash Bin" -->
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <?php if ($this->session->userdata('level') == 'Admin'): ?>
          <?php if (!empty($trash_bin)) : ?>
            <div class="table-wrap">
              <table class="table table-md table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>NIK</th>
                    <th>Password</th>
                    <th>Level</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($trash_bin as $key => $value): ?>
                  <tr>
                    <td><?php echo $key+1 ?></td>
                    <td><?php echo $value->nama ?></td>
                    <td><?php echo $value->email ?></td>
                    <td><?php echo $value->nik ?></td>
                    <td><?php echo $value->password ?></td>
                    <td><span class="badge <?= $value->level == 'Admin' ? 'badge-danger' : 'badge-dark' ?>"><?php echo $value->level ?></span></td>
                    <td>
                      <a href="<?php echo base_url('user-restore/'. $value->id_user); ?>" class="btn btn-dark btn-sm" onclick="return confirm('Apakah Anda yakin ingin mengembalikan data user ini?')">Restore</a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          <?php else : ?>
            <div class="empty-state">
              <i class="fas fa-box-open"></i>
              Tidak ada data di Trash Bin.
            </div>
          <?php endif; ?>
          <?php endif; ?>
        </div>
      </div>

    </div>
  </div>
</main>
