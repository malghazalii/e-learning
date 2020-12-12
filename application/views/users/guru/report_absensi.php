<div class="course-w3ls py-5">
	<div class="container py-xl-5 py-lg-3">
		<h3 class="title text-capitalize font-weight-light text-dark text-center mb-sm-5 mb-4">Report Absensi
		</h3>
		<div class="row justify-content-center pt-7">
			<div class="col-lg-10 agile-course-main">
				<div class="w3ls-cource-first">
					<div class="px-md-5 px-4  pb-md-5 pb-4">
						<br>
						<a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Meta Pelajaran
						</a>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
							<a class="dropdown-item" href="<?= base_url('User/Guru/Report_absensi'); ?>">Semua Kelas</a>
							<?php foreach ($mengajar as $t) :
							?>
								<a class="dropdown-item" href="<?= base_url('User/Guru/Report_absensi/mengajar/' . $t->id_mengajar); ?>"><?= $t->mata_pelajaran, " Di Kelas ", $t->kelas, " ", $t->nama_jurusan ?></a>
							<?php endforeach; ?>
						</div>
						<br>
						<br>
						<br>
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">Nama</th>
									<th scope="col">NIS</th>
									<th scope="col">H</th>
									<th scope="col">S/I</th>
									<th scope="col">A</th>
									<th scope="col">Point</th>
									<th scope="col">Presentase</th>
								</tr>
							</thead>
							<?php foreach ($absensi as $a) : ?>
								<tbody>
									<tr>
										<td><?= $a->NAMA; ?></td>
										<td><?= $a->nis; ?></td>
										<td><?php if ($a->status == 2) {
											echo '';
										}
										else {
											echo '';
										} ?></td>
										<td>0</td>
										<td>0</td>
										<td>0</td>
										<td>0 / 0</td>
										<td>0.0%</td>
									</tr>
								</tbody>
							<?php endforeach; ?>
						</table>
					</div>
				</div>
			</div>
			<div class="col-lg-5 agile-course-main-2 mt-4">
				<img src="images/am1.jpg" alt="" class="img-fluid">
			</div>
		</div>
	</div>
</div>