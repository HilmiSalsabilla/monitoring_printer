<main class="main-content">
  <div class="page-header">
    <div>
      <span class="page-eyebrow">Manajemen</span>
      <h1>Kelola Printer</h1>
    </div>
  </div>

  <div class="card">
    <div class="card-body">

      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Data Printer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Trash Bin</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <!-- Tab "Data Printer" -->
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <?php if ($this->session->userdata('level') == 'Admin'): ?>
          <a href="<?php echo base_url('printer-tambah') ?>" class="btn btn-danger btn-md mb-3">
            <i class="fas fa-plus mr-1"></i> Tambah Data Printer
          </a>
          <?php endif; ?>
          <div class="table-wrap">
            <table class="table table-md table-hover">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Device Model</th>
                  <th scope="col">SN Printer</th>
                  <th scope="col">IP Address</th>
                  <th scope="col">Hostname</th>
                  <th scope="col">Lokasi</th>
                  <?php if ($this->session->userdata('level') == 'Admin'): ?>
                  <th scope="col">Aksi</th>
                  <?php endif; ?>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($printer as $key => $value): ?>
                <tr>
                  <td><?php echo $key+1 ?></td>
                  <td><?php echo $value->device_model ?></td>
                  <td><?php echo $value->sn_printer ?></td>
                  <td><?php echo $value->ip_address ?></td>
                  <td><?php echo $value->hostname ?></td>
                  <td><?php echo $value->lokasi ?></td>
                  <td>
                    <?php if ($this->session->userdata('level') == 'Admin'): ?>
                    <a href="<?php echo base_url('printer-edit/'. $value->id_printer); ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="<?php echo base_url('printer-hapus/'. $value->id_printer); ?>" class="btn btn-dark btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus printer ini?')">Hapus</a>
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
                    <th scope="col">No</th>
                    <th scope="col">Device Model</th>
                    <th scope="col">SN Printer</th>
                    <th scope="col">IP Address</th>
                    <th scope="col">Hostname</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($trash_bin as $key => $value): ?>
                  <tr>
                    <td><?php echo $key+1 ?></td>
                    <td><?php echo $value->device_model ?></td>
                    <td><?php echo $value->sn_printer ?></td>
                    <td><?php echo $value->ip_address ?></td>
                    <td><?php echo $value->hostname ?></td>
                    <td><?php echo $value->lokasi ?></td>
                    <td>
                      <a href="<?php echo base_url('printer-restore/'. $value->id_printer); ?>" class="btn btn-dark btn-sm" onclick="return confirm('Apakah Anda yakin ingin mengembalikan data printer ini?')">Restore</a>
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
          <?php else : ?>
            <div class="empty-state">
              <i class="fas fa-lock"></i>
              Anda tidak memiliki akses untuk melihat Data Trash Bin.
            </div>
          <?php endif; ?>
        </div>
      </div>

    </div>
  </div>
</main>
