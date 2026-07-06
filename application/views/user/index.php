<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<main id="konten-utama" class="p-4 sm:p-6 lg:p-8">
	<header class="mb-6">
		<p class="page-eyebrow">Manajemen</p>
		<h1>Kelola User</h1>
	</header>

	<section>
		<div data-tabs>
			<div role="tablist" aria-label="Data user">
				<button type="button" role="tab" id="tab-data-user-link" aria-controls="tab-data-user" aria-selected="true">
					Data User
				</button>
				<button type="button" role="tab" id="tab-user-trash-bin-link" aria-controls="tab-user-trash-bin" aria-selected="false" tabindex="-1">
					Trash Bin
				</button>
			</div>

			<!-- Tab "Data User" -->
			<section id="tab-data-user" role="tabpanel" aria-labelledby="tab-data-user-link">
				<?php if ($this->session->userdata('level') == 'Admin'): ?>
					<div class="mb-4">
						<a class="btn-primary" href="<?php echo base_url('user-tambah') ?>">
							<i class="fas fa-user-plus" aria-hidden="true"></i> Tambah Data User
						</a>
					</div>
				<?php endif; ?>

				<div class="data-table-wrap">
					<table class="data-table">
						<caption>Daftar pengguna terdaftar</caption>
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Nama</th>
								<th scope="col">Email</th>
								<th scope="col">NIK</th>
								<th scope="col">Level</th>
								<?php if ($this->session->userdata('level') == 'Admin'): ?>
									<th scope="col">Aksi</th>
								<?php endif; ?>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($user as $key => $value): ?>
								<tr>
									<td><?php echo $key + 1 ?></td>
									<td><?php echo $value->nama ?></td>
									<td><?php echo $value->email ?></td>
									<td><?php echo $value->nik ?></td>
									<td>
										<span class="<?= $value->level == 'Admin' ? 'badge-danger' : 'badge-dark' ?>"><?php echo $value->level ?></span>
									</td>
									<?php if ($this->session->userdata('level') == 'Admin'): ?>
										<td class="space-x-3 whitespace-nowrap">
											<a class="link-action" href="<?php echo base_url('user-edit/' . $value->id_user) ?>">
												Edit<span class="sr-only"> user <?php echo htmlspecialchars($value->nama, ENT_QUOTES, 'UTF-8'); ?></span>
											</a>
											<a class="link-action-danger" href="<?php echo base_url('user-hapus/' . $value->id_user) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
												Hapus<span class="sr-only"> user <?php echo htmlspecialchars($value->nama, ENT_QUOTES, 'UTF-8'); ?></span>
											</a>
										</td>
									<?php endif; ?>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</section>

			<!-- Tab "Trash Bin" -->
			<section id="tab-user-trash-bin" role="tabpanel" aria-labelledby="tab-user-trash-bin-link" hidden>
				<?php if ($this->session->userdata('level') == 'Admin'): ?>
					<?php if (!empty($trash_bin)) : ?>
						<div class="data-table-wrap">
							<table class="data-table">
								<caption>Pengguna yang telah dihapus</caption>
								<thead>
									<tr>
										<th scope="col">No</th>
										<th scope="col">Nama</th>
										<th scope="col">Email</th>
										<th scope="col">NIK</th>
										<th scope="col">Level</th>
										<th scope="col">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($trash_bin as $key => $value): ?>
										<tr>
											<td><?php echo $key + 1 ?></td>
											<td><?php echo $value->nama ?></td>
											<td><?php echo $value->email ?></td>
											<td><?php echo $value->nik ?></td>
											<td>
												<span class="<?= $value->level == 'Admin' ? 'badge-danger' : 'badge-dark' ?>"><?php echo $value->level ?></span>
											</td>
											<td class="whitespace-nowrap">
												<a class="link-action" href="<?php echo base_url('user-restore/' . $value->id_user); ?>" onclick="return confirm('Apakah Anda yakin ingin mengembalikan data user ini?')">
													Restore<span class="sr-only"> user <?php echo htmlspecialchars($value->nama, ENT_QUOTES, 'UTF-8'); ?></span>
												</a>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					<?php else : ?>
						<p class="empty-state">
							<i class="fas fa-inbox" aria-hidden="true"></i>
							Tidak ada data di Trash Bin.
						</p>
					<?php endif; ?>
				<?php else : ?>
					<p class="empty-state">
						<i class="fas fa-lock" aria-hidden="true"></i>
						Anda tidak memiliki akses untuk melihat Data Trash Bin.
					</p>
				<?php endif; ?>
			</section>
		</div>
	</section>
</main>
