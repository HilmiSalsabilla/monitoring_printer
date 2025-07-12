<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1 style="color:black;">KELOLA PRINTER</h1>
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
            <a href="<?= base_url('printer-tambah') ?>" class="btn btn-danger btn-md mb-3">Tambah Data Printer</a>
          <?php endif; ?>

          <table class="table table-bordered table-hover">
            <thead class="thead-dark">
              <tr>
                <th>No</th>
                <th>Device Model</th>
                <th>SN Printer</th>
                <th>IP Address</th>
                <th>Hostname</th>
                <th>Lokasi</th>
                <?php if ($this->session->userdata('level') === 'Admin'): ?>
                  <th>Aksi</th>
                <?php endif; ?>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($printer as $key => $value): ?>
                <tr>
                  <td><?= $key + 1 ?></td>
                  <td><?= $value->device_model ?></td>
                  <td><?= $value->sn_printer ?></td>
                  <td><?= $value->ip_address ?></td>
                  <td><?= $value->hostname ?></td>
                  <td><?= $value->lokasi ?></td>
                  <?php if ($this->session->userdata('level') === 'Admin'): ?>
                    <td>
                      <a href="<?= base_url('printer-edit/' . $value->id_printer) ?>" class="btn btn-warning btn-sm">Edit</a>
                      <a href="<?= base_url('printer-hapus/' . $value->id_printer) ?>" class="btn btn-dark btn-sm" onclick="return confirm('Yakin ingin menghapus printer ini?')">Hapus</a>
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