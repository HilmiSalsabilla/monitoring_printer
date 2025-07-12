<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>KELOLA USER</h1>
    </div>

<div class="section-body">
  <div class="card card-danger">
    <div class="card-body">

    <a href="<?php echo base_url('user-tambah') ?>" class="btn btn-md btn-danger">Tambah</a><br><br>
      <table class="table table-md table-hover">
        <thead>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>NIK</th>
            <th>Password</th>
            <th>Level</th>
            <th>Aksi</th>
        </thead>
        <tbody>
        <?php foreach ($user as $key => $value): ?>
            <tr>
                <td><?php echo $key+1 ?></td>
                <td><?php echo $value->nama ?></td>
                <td><?php echo $value->email ?></td>
                <td><?php echo $value->nik ?></td>
                <td><?php echo $value->password ?></td>
                <td class=""><span class="badge <?= $value->level == 'Admin' ?'badge-danger':'badge-dark'?>"><?php echo $value->level ?></span></td>
                <td>
                <a href="<?php echo base_url('user-edit/'.$value->id_user) ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="<?php echo base_url('user-hapus/'.$value->id_user) ?>" class="btn btn-sm btn-dark">Hapus</a>
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