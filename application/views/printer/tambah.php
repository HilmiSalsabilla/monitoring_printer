<main class="main-content">
  <div class="page-header">
    <div>
      <span class="page-eyebrow">Printer</span>
      <h1>Tambah Data Printer</h1>
    </div>
    <a href="<?php echo base_url('printer') ?>" class="btn btn-warning btn-md">
      <i class="fas fa-arrow-left mr-1"></i> Kembali
    </a>
  </div>

  <div class="card">
    <div class="card-body">
      <form action="<?php echo base_url('printer-store') ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <div class="form-group">
          <label>Device Model</label>
          <input type="text" name="device_model" class="form-control" value="<?php echo set_value('device_model') ?>" placeholder="Contoh: HP LaserJet Pro">
          <i class="text-danger"><?php echo form_error('device_model') ?></i>
        </div>
        <div class="form-group">
          <label>SN Printer</label>
          <input type="text" name="sn_printer" class="form-control" value="<?php echo set_value('sn_printer') ?>" placeholder="Nomor seri printer">
          <i class="text-danger"><?php echo form_error('sn_printer') ?></i>
        </div>
        <div class="form-group">
          <label>IP Address</label>
          <input type="text" name="ip_address" class="form-control" value="<?php echo set_value('ip_address') ?>" placeholder="192.168.x.x">
          <i class="text-danger"><?php echo form_error('ip_address') ?></i>
        </div>
        <div class="form-group">
          <label>Hostname</label>
          <input type="text" name="hostname" class="form-control" value="<?php echo set_value('hostname') ?>">
          <i class="text-danger"><?php echo form_error('hostname') ?></i>
        </div>
        <div class="form-group">
          <label>Lokasi</label>
          <input type="text" name="lokasi" class="form-control" value="<?php echo set_value('lokasi') ?>">
          <i class="text-danger"><?php echo form_error('lokasi') ?></i>
        </div>
        <div>
          <button type="submit" class="btn btn-danger btn-md">
            <i class="fas fa-save mr-1"></i> Tambahkan Data
          </button>
        </div>
      </form>
    </div>
  </div>
</main>
