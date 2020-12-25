<div class="course-w3ls py-5">
  <div class="container py-xl-5 py-lg-3">
    <h3 class="title text-capitalize font-weight-light text-dark text-center mb-sm-5 mb-4">Tabel Absen
    </h3>
    <div class="row justify-content-center pt-7">
      <?= $this->session->flashdata('message'); ?>
      <div class="col-lg-10 agile-course-main">
        <div class="w3ls-cource-first">
          <div class="px-md-5 px-4  pb-md-5 pb-4">
            <br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>nip</th>
                  <th>nama</th>
                  <th>Nama Mapel</th>
                  <th>kelas</th>
                  <th>Nama jurusan</th>
                  <th>action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1;
                foreach ($mengajar as $a) : ?>
                  <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $a->nip; ?></td>
                    <td><?= $a->nama; ?></td>
                    <td><?= $a->mata_pelajaran; ?></td>
                    <td><?= $a->kelas; ?></td>
                    <td><?= $a->nama_jurusan; ?></td>
                    <td><a class="badge badge-primary" href="<?= base_url('User/Guru/KelasAbsen/Tampil/' . $a->id_mengajar); ?>">Buat Absen</a></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <br>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container py-xl-5 py-lg-3">
    <h3 class="text-center mb-sm-5 mb-4">Detail Absen
    </h3>
    <div class="row justify-content-center pt-7">
      <div class="col-lg-10 agile-course-main">
        <div class="w3ls-cource-first">
          <div class="px-md-5 px-4  pb-md-5 pb-4">
            <br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>nip</th>
                  <th>nama</th>
                  <th>Nama Mapel</th>
                  <th>kelas</th>
                  <th>Nama jurusan</th>
                  <th>Tanggal</th>
                  <th>action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1;
                foreach ($absen as $a) : ?>
                  <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $a->nip; ?></td>
                    <td><?= $a->nama; ?></td>
                    <td><?= $a->mata_pelajaran; ?></td>
                    <td><?= $a->kelas; ?></td>
                    <td><?= $a->nama_jurusan; ?></td>
                    <td><?= $a->tanggal; ?></td>
                    <td style="width: 140px;">
                      <a class="badge badge-primary" href="<?= base_url('User/Guru/KelasAbsen/TampilU/' . $a->id_absen); ?>">Edit</a> | <a class="badge badge-danger" onclick="javasciprt: return confirm('Anda Yakin Non-Aktifkan ?')" href="<?= base_url('User/Guru/KelasAbsen/Delete/' . $a->id_absen); ?>">Hapus</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <br>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>