<body onload="JavaScript:AutoRefresh(30000);">
	<div class="course-w3ls py-5">
		<div class="container">
		<h3 class="text-center mb-sm-5 mb-4">Report absensi</h3>
			<div class="row justify-content-center pt-7">
				<div class="col-lg-10 agile-course-main">
					<div class="w3ls-cource-first">
						<div class="px-md-5 px-4  pb-md-5 pb-4">
							<br>
							<div class="form-group">
                        		<div class="row">
									<label class="col-sm-3 control-label"><strong>Pilih berdasarkan : </strong></label>
										<a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Mata Pelajaran
										</a>
										<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
										<a class="dropdown-item" href="<?= base_url('User/Guru/Report_absensi'); ?>">Semua Kelas</a>
										<?php foreach ($mengajar as $t) :
										?>
										<a class="dropdown-item" href="<?= base_url('User/Guru/Report_absensi/mengajar/' . $t->id_mengajar); ?>"><?= $t->mata_pelajaran, " Di Kelas ", $t->kelas, " ", $t->nama_jurusan ?></a>
										<?php endforeach; ?>
										</div>
										
										<form action="<?= base_url('User/Guru/Report_absensi/tanggal'); ?>" method="POST">
										<div class="col-sm-9" style="float: left;">
											<input type="date" id="tanggal" name="tanggal" class="form-control">
										</div>
										<!-- <select style="width: 175px; margin-bottom: 15px;" id="country" name="tanggal" class="form-control">
										<?php foreach ($tanggal as $m) : ?>
										<option value="<?= $m->tanggal ?>"> <?= $m->tanggal ?></option>
										<?php endforeach; ?>
										</select> -->
										<button type="submit" class="btn btn-success" style="width: 25%;">Cari</button>
									</form>
								</div>
							</div>
									
							<br>
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col">Nama</th>
										<th scope="col">NIS</th>
										<th scope="col">Status</th>
										<th scope="col">Tanggal Berakhir</th>
										<th scope="col">Kelas</th>
									</tr>
								</thead>
								<?php foreach ($absensi as $a) : ?>
									<tbody>
										<tr>
											<td><?= $a->NAMA; ?></td>
											<td><?= $a->nis; ?></td>
											<td><?php if ($a->status == 1) {
													echo 'Hadir';
												} else if ($a->status == 2) {
													echo 'Sakit';
												} else if ($a->status == 3) {
													echo 'Izin';
												} else if ($a->status == 4) {
													echo 'Terlambat';
												}
												?></td>
											<td><?= $a->tanggal; ?></td>
											<td><?= $a->kelas, "-", $a->nama_jurusan; ?></td>
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
</body>