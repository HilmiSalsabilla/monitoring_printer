<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1 style="color: black;">Form Edit Data Printer</h1>
    </div>
    <div class="section-body">
      <form action="<?= base_url('printer-edit') ?>" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="id_printer" value="<?= $printer->id_printer ?>">

        <div class="form-group">
          <label>Device Model</label>
          <input type="text" name="device_model" class="form-control" value="<?= set_value('device_model', $printer->device_model) ?>" placeholder="Masukkan model printer">
          <small class="text-danger"><?= form_error('device_model') ?></small>
        </div>

        <div class="form-group">
          <label>SN Printer</label>
          <input type="text" name="sn_printer" class="form-control" value="<?= set_value('sn_printer', $printer->sn_printer) ?>" placeholder="Masukkan serial number printer">
          <small class="text-danger"><?= form_error('sn_printer') ?></small>
        </div>

        <div class="form-group">
          <label>IP Address</label>
          <input type="text" name="ip_address" class="form-control" value="<?= set_value('ip_address', $printer->ip_address) ?>" placeholder="Contoh: 192.168.1.10">
          <small class="text-danger"><?= form_error('ip_address') ?></small>
        </div>

        <div class="form-group">
          <label>Hostname</label>
          <input type="text" name="hostname" class="form-control" value="<?= set_value('hostname', $printer->hostname) ?>" placeholder="Masukkan hostname printer">
          <small class="text-danger"><?= form_error('hostname') ?></small>
        </div>

        <div class="form-group">
          <label>Lokasi</label>
          <input type="text" name="lokasi" class="form-control" value="<?= set_value('lokasi', $printer->lokasi) ?>" placeholder="Contoh: Lantai 3 - HRD">
          <small class="text-danger"><?= form_error('lokasi') ?></small>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-danger btn-md">Simpan Data</button>
          <a href="<?= base_url('printer') ?>" class="btn btn-secondary btn-md">Batal</a>
        </div>

      </form>
    </div>
  </section>
</div>