<div class="course-w3ls py-5">
	<div class="container py-xl-5 py-lg-3">
		<h3 class="title text-capitalize font-weight-light text-dark text-center mb-sm-5 mb-4">Absensi
		</h3>
		<div class="row justify-content-center pt-7">
			<div class="col-lg-10 agile-course-main">
				<div class="w3ls-cource-first">
					<div class="px-md-5 px-4  pb-md-5 pb-4">
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">Tanggal</th>
									<th scope="col">Deskripsi</th>
									<th scope="col">Status</th>
									<!-- <th scope="col">Poin</th> -->
								</tr>
							</thead>
							<tbody>
								<?php foreach ($absen as $a) : ?>
									<tr>
										<td><?= $a->tgl ?></td>
										<td>Guru Mengajar</td>
										<td>
											<?php
											if ($a->status == 1) {
												echo 'Hadir';
											} elseif ($a->status == 2) {
												echo 'Sakit';
											} elseif ($a->status == 3) {
												echo 'Ijin';
											} elseif ($a->status == 4) {
												echo 'Terlambat';
											}
											?>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>

						<?php if (!$absensi) { ?>
							<table class="table table-striped">
								<thead>


								</thead>
								<tbody>
									<tr>
										<td><?= $tanggal->tgl ?></td>
										<td>Guru Mengajar</td>
										<td>
											<?php echo anchor(base_url('User/Guru/Absensi/status'), 'Belum Absen'); ?>
										</td>
										<!-- <td>2 / 2</td> -->
									</tr>
								</tbody>
							</table>
						<?php } else {
						} ?>
					</div>
				</div>
			</div>
			<div class="col-lg-5 agile-course-main-2 mt-4">
				<img src="images/am1.jpg" alt="" class="img-fluid">
			</div>
		</div>
	</div>
</div>