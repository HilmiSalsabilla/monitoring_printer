<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<main id="konten-utama" class="p-4 sm:p-6 lg:p-8">
	<header class="mb-6">
		<p class="page-eyebrow">Manajemen</p>
		<h1>Kelola Printer</h1>
	</header>

	<section>
		<div data-tabs>
			<div role="tablist" aria-label="Data printer">
				<button type="button" role="tab" id="tab-data-printer-link" aria-controls="tab-data-printer" aria-selected="true">
					Data Printer
				</button>
				<button type="button" role="tab" id="tab-trash-bin-link" aria-controls="tab-trash-bin" aria-selected="false" tabindex="-1">
					Trash Bin
				</button>
			</div>

			<!-- Tab "Data Printer" -->
			<section id="tab-data-printer" role="tabpanel" aria-labelledby="tab-data-printer-link">
				<?php if ($this->session->userdata('level') == 'Admin'): ?>
					<div class="mb-4">
						<a class="btn-primary" href="<?php echo base_url('printer-tambah') ?>">
							<i class="fas fa-plus" aria-hidden="true"></i> Tambah Data Printer
						</a>
					</div>
				<?php endif; ?>

				<div class="data-table-wrap">
					<table class="data-table">
						<caption>Daftar printer terdaftar</caption>
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
									<td><?php echo $key + 1 ?></td>
									<td><?php echo $value->device_model ?></td>
									<td><?php echo $value->sn_printer ?></td>
									<td><?php echo $value->ip_address ?></td>
									<td><?php echo $value->hostname ?></td>
									<td><?php echo $value->lokasi ?></td>
									<?php if ($this->session->userdata('level') == 'Admin'): ?>
										<td class="space-x-3 whitespace-nowrap">
											<a class="link-action" href="<?php echo base_url('printer-edit/' . $value->id_printer); ?>">
												Edit<span class="sr-only"> data printer <?php echo htmlspecialchars($value->device_model, ENT_QUOTES, 'UTF-8'); ?></span>
											</a>
											<a class="link-action-danger" href="<?php echo base_url('printer-hapus/' . $value->id_printer); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus printer ini?')">
												Hapus<span class="sr-only"> data printer <?php echo htmlspecialchars($value->device_model, ENT_QUOTES, 'UTF-8'); ?></span>
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
			<section id="tab-trash-bin" role="tabpanel" aria-labelledby="tab-trash-bin-link" hidden>
				<?php if ($this->session->userdata('level') == 'Admin'): ?>
					<?php if (!empty($trash_bin)) : ?>
						<div class="data-table-wrap">
							<table class="data-table">
								<caption>Printer yang telah dihapus</caption>
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
											<td><?php echo $key + 1 ?></td>
											<td><?php echo $value->device_model ?></td>
											<td><?php echo $value->sn_printer ?></td>
											<td><?php echo $value->ip_address ?></td>
											<td><?php echo $value->hostname ?></td>
											<td><?php echo $value->lokasi ?></td>
											<td class="whitespace-nowrap">
												<a class="link-action" href="<?php echo base_url('printer-restore/' . $value->id_printer); ?>" onclick="return confirm('Apakah Anda yakin ingin mengembalikan data printer ini?')">
													Restore<span class="sr-only"> data printer <?php echo htmlspecialchars($value->device_model, ENT_QUOTES, 'UTF-8'); ?></span>
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
