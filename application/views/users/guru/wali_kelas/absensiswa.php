<!-- banner -->



<!-- //navigation -->
<html lang="en">
<head>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<br>

<div class="container  py-xl-5 py-lg-3">

  <div class="panel panel-default">    
    <div class="panel-body">
      <!-- membuat form  -->
      <!-- gunakan tanda [] untuk menampung array  -->
        <form action="proses.php" method="POST">
          <div class="control-group after-add-more">
          <div class="form-group">
					<div class="row">
					<a for="birthDate" class="col-sm-2 control-label">Kelas Anda</a>
          <label for="birthDate" class="col-sm-2 control-label">*nama kelas</label>
					</div>
      </div>
      <div class="form-group">
					<div class="row">
					<a for="birthDate" class="col-sm-2 control-label">Jumlah Siswa</a>
          <label for="birthDate" class="col-sm-2 control-label">*jumlah siswa</label>
					</div>
			</div>
      </div>
            <hr>
            <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Nama Siswa</th>
      <th scope="col">NIS</th>
      <th scope="col">Hadir</th>
      <th scope="col">Izin</th>
      <th scope="col">Sakit</th>
      <th scope="col">Alpha</th>
      <th scope="col">Presentase</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Sugali dong</td>
      <td>123456789</td>
      <td>1</td>
      <td>0</td>
      <td>0</td>
      <td>0</td>
      <td>100%</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Nafis dong</td>
      <td>123456789</td>
      <td>1</td>
      <td>0</td>
      <td>0</td>
      <td>0</td>
      <td>100%</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Eki dong</td>
      <td>987654321</td>
      <td>1</td>
      <td>0</td>
      <td>0</td>
      <td>0</td>
      <td>100%</td>
    </tr>
  </tbody>
</table>
            </br>
          </div>
        </form>
    </div>
  </div>
</div>



</body>
</html>