<div class="container py-xl-5 py-lg-3">
  <div class="card">
    <div class="card-header">
      <div class="container">
        <div class="form-group">
          <div class="row">
            <label for="birthDate" class="col-sm-2 control-label"><strong>Pilih Tugas</strong></label>
            <div class="dropdown" style="margin-left: 100px ; background-color: teal;">
              <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?= $title; ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="<?= base_url('User/Guru/UploadMateri'); ?>">Upload Materi</a>
                <a class="dropdown-item" href="<?= base_url('User/Guru/EssayEvent'); ?>">Tugas Essai</a>
                <a class="dropdown-item" href="<?= base_url('User/Guru/PilganEvent'); ?>">Tugas Pilihan Ganda</a>
                <a class="dropdown-item" href="<?= base_url('User/Guru/BuatKuis'); ?>">Buat Kuis</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>