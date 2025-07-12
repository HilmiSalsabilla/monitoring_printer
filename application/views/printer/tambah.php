<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1 style="color: black;">Form Tambah Data Printer</h1>
    </div>
    <div class="section-body">
      <form action="<?= base_url('printer-store') ?>" method="POST" enctype="multipart/form-data">
        
        <div class="form-group">
          <label>Device Model</label>
          <input type="text" name="device_model" class="form-control" placeholder="Masukkan model printer" value="<?= set_value('device_model') ?>">
          <small class="text-danger"><?= form_error('device_model') ?></small>
        </div>

        <div class="form-group">
          <label>SN Printer</label>
          <input type="text" name="sn_printer" class="form-control" placeholder="Masukkan Serial Number" value="<?= set_value('sn_printer') ?>">
          <small class="text-danger"><?= form_error('sn_printer') ?></small>
        </div>

        <div class="form-group">
          <label>IP Address</label>
          <input type="text" name="ip_address" class="form-control" placeholder="Contoh: 192.168.1.10" value="<?= set_value('ip_address') ?>">
          <small class="text-danger"><?= form_error('ip_address') ?></small>
        </div>

        <div class="form-group">
          <label>Hostname</label>
          <input type="text" name="hostname" class="form-control" placeholder="Masukkan hostname printer" value="<?= set_value('hostname') ?>">
          <small class="text-danger"><?= form_error('hostname') ?></small>
        </div>

        <div class="form-group">
          <label>Lokasi</label>
          <input type="text" name="lokasi" class="form-control" placeholder="Contoh: Lantai 3 - HRD" value="<?= set_value('lokasi') ?>">
          <small class="text-danger"><?= form_error('lokasi') ?></small>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-danger btn-md">Tambahkan Data</button>
          <a href="<?= base_url('printer') ?>" class="btn btn-secondary btn-md">Batal</a>
        </div>
        
      </form>
    </div>
  </section>
</div>