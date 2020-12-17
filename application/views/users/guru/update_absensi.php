<div class="course-w3ls py-5">
  <div class="container py-xl-5 py-lg-3">
    <h3 class="title text-capitalize font-weight-light text-dark text-center mb-sm-5 mb-4">Absensi Murid
    </h3>
    <div class="row justify-content-center pt-7">
      <div class="col-lg-10 agile-course-main">
        <div class="w3ls-cource-first">
          <div class="px-md-5 px-4  pb-md-5 pb-4">

            <form action="<?= base_url('User/Guru/KelasAbsen/Update/' . $mengajar->id_absen); ?>" method="POST">
              <table width="452" cellpadding="5" cellspacing="1" style="padding: 2px">
                <tr>
                  <td width="150">Tanggal Berakhir</td>
                  <td width="80">:</td>
                  <td width="250"><input style="width: 162px;" type="time" id="tanggal" name="jam" value="<?= $mengajar->tanggal; ?>"></td>
                  <td width="250"><input type="date" id="tanggal" name="tanggal" min="<?= $tang ?>" value="<?= $mengajar->tanggal; ?>"></td>
                </tr>
                <br>
                <tr>
                  <td>Waktu</td>
                  <td>:</td>
                  <td><input readonly type=" time" id="waktuawal" name="waktuawal" value="<?= $mengajar->jam; ?>"> </td>
                </tr>
                <br>
                <tr>
                  <td>Kelas</td>
                  <td>:</td>
                  <td><input readonly type=text size="16" id="kelas" name="kelas" value="<?= $mengajar->kelas; ?>"></textarea>
                  <td>
                </tr>
                <tr>
                  <td>Jurusan</td>
                  <td>:</td>
                  <td><input readonly type=text size="16" id="jurusan" name="jurusan" value="<?= $mengajar->nama_jurusan; ?>"></textarea>
                  <td>
                </tr>
                <tr>
                  <td>Mata Pelajaran</td>
                  <td>:</td>
                  <td><input readonly type=text size=" 16" id="mapel" name="mapel" value="<?= $mengajar->mata_pelajaran; ?>"></textarea>
                  <td>
                </tr>
              </table>
              <br>
              <button type="submit" class="btn btn-primary">Edit</button>
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