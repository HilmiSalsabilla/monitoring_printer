<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>KELOLA PRINTER</h1>
    </div>

    <div class="section-body">
      <div class="card card-danger">
        <div class="card-body">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" style="color: black;">Data Printer</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" style="color: black;">Trash Bin</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <!-- Tab "Data Printer" -->
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <?php if ($this->session->userdata('level') == 'Admin'): ?>
                <a href="<?php echo base_url('printer-tambah') ?>" class="btn btn-danger btn-md">Tambah Data Printer</a><br><br>
                <?php endif; ?>
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
              <!-- Tab "Trash Bin" -->
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <?php if ($this->session->userdata('level') == 'Admin'): ?>
                <?php if (!empty($trash_bin)) : ?>
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
                <?php else : ?>
                  <p style="color: black; text-align: center;">Tidak ada data di Trash Bin.</p>
                <?php endif; ?>
                <?php else : ?>
                  <p style="color: black; text-align: center;">Anda tidak memiliki akses untuk melihat Data Trash Bin.</p>
                <?php endif; ?>
              </div>
            </div>

        </div>
      </div>
    </div>

  </section>
</div>
