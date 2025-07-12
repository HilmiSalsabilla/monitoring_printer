<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>KELOLA PRINTER</h1>
    </div>

<div class="section-body">
  <div class="card card-danger">
    <div class="card-body">

    <a href="<?php echo base_url('printer-tambah') ?>" class="btn btn-danger btn-md">Tambah Data Printer</a><br><br>
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
          <?php foreach ($printer as $key => $value): ?>
          <tr>
            <td><?php echo $key+1 ?></td>
            <td><?php echo $value->device_model ?></td>
            <td><?php echo $value->sn_printer ?></td>
            <td><?php echo $value->ip_address ?></td>
            <td><?php echo $value->hostname ?></td>
            <td><?php echo $value->lokasi ?></td>
            <td>
              <a href="<?php echo base_url('printer-edit/'. $value->id_printer); ?>" class="btn btn-warning btn-sm">Edit</a>
              <a href="<?php echo base_url('printer-hapus/'. $value->id_printer); ?>" class="btn btn-dark btn-sm">Hapus</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

    </div>
  </div>
</div>

</section>
</div>