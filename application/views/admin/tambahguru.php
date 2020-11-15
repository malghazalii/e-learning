<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Guru</h6>
        </div>
        <div class="card-body">

            <form action="<?= base_url('Admin/dataguru/simpanData'); ?>" method="post">
                <div class="form-group">
                    <label for="varchar">
                        <h6 class="m-0 font-weight-bold text-dark">NIP</h6>
                    </label>
                    <input type="number" class="form-control" name="nip" id="nip" placeholder="nip" value="" />
                </div>
                <div class="form-group">
                    <label for="varchar">
                        <h6 class="m-0 font-weight-bold text-dark">NAMA</h6>
                    </label> <input type="text" class="form-control" name="nama" id="nama" placeholder="nama" value="" />
                </div>
                <div class="form-group">
                    <label for="varchar">
                        <h6 class="m-0 font-weight-bold text-dark">PASSWORD</h6>
                    </label> <input type="text" class="form-control" name="password" id="password" placeholder="password" value="" />
                </div>
                <div class="form-group">
                    <label for="enum">
                        <h6 class="m-0 font-weight-bold text-dark">JENIS_KELAMIN</h6>
                    </label>
                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                        <option value="laki-laki">laki-laki</option>
                        <option value="wanita">wanita</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="varchar">
                        <h6 class="m-0 font-weight-bold text-dark">ALAMAT</h6>
                    </label> <input type="text" class="form-control" name="alamat" id="alamat" placeholder="alamat" value="" />
                </div>
                <div class="form-group">
                    <label for="varchar">
                        <h6 class="m-0 font-weight-bold text-dark">NO HP</h6>
                    </label> <input type="number" class="form-control" name="no_hp" id="no_hp" maxlength="13" placeholder="Telp" value="" />
                </div>
                <div class="form-group">
                    <label for="enum">
                        <h6 class="m-0 font-weight-bold text-dark">GOLONGAN</h6>
                    </label>
                    <select class="form-control" name="golongan" id="golongan">
                        <option value="1">pns</option>
                        <option value="2">non pns</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>