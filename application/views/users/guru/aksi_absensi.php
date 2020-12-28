<div class="course-w3ls py-5">
	<div class="container py-xl-5 py-lg-3">
		<h3 class="title text-capitalize font-weight-light text-dark text-center mb-sm-5 mb-4">Absensi
		</h3>
		<div class="row justify-content-center pt-7">
			<div class="col-lg-10 agile-course-main">
				<div class="w3ls-cource-first">
					<div class="px-md-5 px-4  pb-md-5 pb-4">



						<form action="<?= base_url('User/Guru/Absensi/simpanData'); ?>" method="post">

							<p>Silahkan pilih kehadiran anda: </p><br />
							<input type="text" hidden id="id_absen" name="id_absen" value="<?= $tampil->id_absen ?>">
							<input type="text" hidden id="nip" name="nip" value="<?= $data['nip'] ?>">

							<input type="radio" id="status" name="status" value="1">
							<label for="status">hadir</label><br />
							<input type="radio" id="status" name="status" value="2">
							<label for="status">sakit</label><br />
							<input type="radio" id="status" name="status" value="3">
							<label for="status">ijin</label><br />




							<button type="submit" class="btn btn-primary">Simpan</button>
						</form>




					</div>
				</div>
			</div>
			<div class="col-lg-5 agile-course-main-2 mt-4">
				<img src="images/am1.jpg" alt="" class="img-fluid">
			</div>
		</div>
	</div>
</div>