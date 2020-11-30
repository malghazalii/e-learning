<html lang="en">
<head>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<br>

<div class="container">
    <label for="birthDate" class=" control-label">*Biologi</label>
</div>
<div class="container  py-xl-5 py-lg-3">
<div class="form-group">
					<div class="row">
					<label for="birthDate" class="col-sm-2 control-label">Pilih kelas</label>
					<div class="col-sm-3">
                        <select style="height:35px;" id="country" class="form-control">
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                            <option>D</option>
                            <option>E</option>
                        </select>
					</div>
					</div>
			</div>
</div>
<div class="container">

  <div class="panel panel-default">    
    <div class="panel-body">
      <!-- membuat form  -->
      <!-- gunakan tanda [] untuk menampung array  -->
        <form action="proses.php" method="POST">
          <div class="control-group after-add-more">
            <div class="form-group">
              <img src="<?php echo base_url(); ?>assets/users/images/online-class.png" style=”float:left; margin:0 8px 4px 0;” /><strong>Minggu 1</strong></div>
			      </div>
            <hr>
            <div class="form-group">
              <img src="<?php echo base_url(); ?>assets/users/images/pin.png" style=”float:left; margin:0 8px 4px 0;” /><strong> Nama tugas</strong></div>
              <h8 class="card-title">
							<a href="course_details.html" class="text-dark">deskripsi tugas tersebut</a>
						</h8>
			      </div>
            </br>
          </div>
        </form>
    </div>
  </div>
</div>

<div class="container  ">
  <div class="panel panel-default">
    <div class="panel-body">
      <!-- membuat form  -->
      <!-- gunakan tanda [] untuk menampung array  -->
        <form action="proses.php" method="POST">
          <div class="control-group after-add-more">
            <div class="form-group">
              <img src="<?php echo base_url(); ?>assets/users/images/online-class.png" style=”float:left; margin:0 8px 4px 0;” /><strong>Minggu 2</strong></div>
			      </div>
            <hr>
            <div class="form-group">
              <img src="<?php echo base_url(); ?>assets/users/images/pin.png" style=”float:left; margin:0 8px 4px 0;” /><strong> Nama tugas</strong></div>
              <h8 class="card-title">
							<a href="course_details.html" class="text-dark">deskripsi tugas tersebut</a>
						</h8>
			      </div>
            </br>
          </div>
        </form>
    </div>
  </div>
</div>

<div class="container">
  <div class="panel panel-default">
    <div class="panel-body">
      <!-- membuat form  -->
      <!-- gunakan tanda [] untuk menampung array  -->
        <form action="proses.php" method="POST">
          <div class="control-group after-add-more">
            <div class="form-group">
              <img src="<?php echo base_url(); ?>assets/users/images/online-class.png" style=”float:left; margin:0 8px 4px 0;” /><strong>Minggu 3</strong></div>
			      </div>
            <hr>
            <div class="form-group">
              <img src="<?php echo base_url(); ?>assets/users/images/pin.png" style=”float:left; margin:0 8px 4px 0;” /><strong> Nama tugas</strong></div>
              <h8 class="card-title">
							<a href="course_details.html" class="text-dark">deskripsi tugas tersebut</a>
						</h8>
			      </div>
            </br>
          </div>
        </form>
    </div>
  </div>
</div>
</body>
</html>