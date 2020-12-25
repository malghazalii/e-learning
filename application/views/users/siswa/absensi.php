<html lang="en">

<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>

<body>
	<br>
	<div class="container">
		<h3 class="title text-capitalize font-weight-light text-dark text-center mb-sm-5 mb-4">Absensi</h3>
		<div class="row justify-content-center pt-7">
			<div class="col-lg-10 agile-course-main">
				<div class="w3ls-cource-first">
					<div class="px-md-5 px-4  pb-md-5 pb-4">
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">Tanggal Berakhir</th>
									<th scope="col">Deskripsi</th>
									<th scope="col">Status</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?= $absen->tanggal ?></td>
									<td>Siswa Regular</td>
									<?php if ($trabsen) : ?>
										<td>
											<?php
											if ($trabsen->status == 1) {
												echo 'Hadir';
											} elseif ($trabsen->status == 2) {
												echo 'Sakit';
											} elseif ($trabsen->status == 3) {
												echo 'Ijin';
											} elseif ($trabsen->status == 4) {
												echo 'Terlambat';
											}
											?>
										</td>
									<?php else : ?>
										<td><?php echo anchor(base_url('User/Siswa/Absensi/inputData/' . $absen->id_absen), 'Belum Absen'); ?></td>
									<?php endif; ?>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>