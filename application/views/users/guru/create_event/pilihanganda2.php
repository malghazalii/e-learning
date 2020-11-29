<html lang="en">
<head>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<br>
<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">Input Soal</div>
    <div class="panel-body">
      <!-- membuat form  -->
      <!-- gunakan tanda [] untuk menampung array  -->
        <form action="proses.php" method="POST">
          <div class="control-group after-add-more">
            <div class="form-group">
					<div class="row">
					<label for="birthDate" class="col-sm-3 control-label">Teks Soal</label>
                    <div class="col-sm-3">
                        <input type="file" id="Keterangan" placeholder="Keterangan" class="form-control">
					</div>  
					<div class="col-sm-6">
                        <input type="text" id="tekssoal" placeholder="teks soal" class="form-control" autofocus>
					</div>
			        </div>
			</div>
            <hr>
            </br>
            <div class="form-group">
					<div class="row">
					<label for="birthDate" class="col-sm-3 control-label">Jawaban A</label>
                    <div class="col-sm-3">
                        <input type="file" id="Keterangan" placeholder="Keterangan" class="form-control">
					</div>  
					<div class="col-sm-6">
                        <input type="text" id="jawaban" placeholder="jawaban" class="form-control" autofocus>
					</div>
			        </div>
			</div>
            <div class="form-group">
					<div class="row">
					<label for="birthDate" class="col-sm-3 control-label">Jawaban B</label>
                    <div class="col-sm-3">
                        <input type="file" id="Keterangan" placeholder="Keterangan" class="form-control">
					</div>  
					<div class="col-sm-6">
                        <input type="text" id="jawaban" placeholder="jawaban" class="form-control" autofocus>
					</div>
			        </div>
			</div>
            <div class="form-group">
					<div class="row">
					<label for="birthDate" class="col-sm-3 control-label">Jawaban C</label>
                    <div class="col-sm-3">
                        <input type="file" id="Keterangan" placeholder="Keterangan" class="form-control">
					</div>  
					<div class="col-sm-6">
                        <input type="text" id="jawaban" placeholder="jawaban" class="form-control" autofocus>
					</div>
			        </div>
			</div>
            <div class="form-group">
					<div class="row">
					<label for="birthDate" class="col-sm-3 control-label">Jawaban D</label>
                    <div class="col-sm-3">
                        <input type="file" id="Keterangan" placeholder="Keterangan" class="form-control">
					</div>  
					<div class="col-sm-6">
                        <input type="text" id="jawaban" placeholder="jawaban" class="form-control" autofocus>
					</div>
			        </div>
			</div>
            <div class="form-group">
					<div class="row">
					<label for="birthDate" class="col-sm-3 control-label">Jawaban E</label>
                    <div class="col-sm-3">
                        <input type="file" id="Keterangan" placeholder="Keterangan" class="form-control">
					</div>  
					<div class="col-sm-6">
                        <input type="text" id="jawaban" placeholder="jawaban" class="form-control" autofocus>
					</div>
			        </div>
			</div>
            <hr>
            </br>
            <div class="form-group">
					<div class="row">
					<label for="birthDate" class="col-sm-3 control-label">Kunci Jawaban</label>
					<div class="col-sm-3">
                        <select id="country" class="form-control">
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                            <option>D</option>
                            <option>E</option>
                        </select>
					</div>
					</div>
			</div>
            </br>
            <button class="btn btn-success add-more" type="button">
              <i class="glyphicon glyphicon-plus"></i> Add
            </button>
            <hr>
          </div>
          <button class="btn btn-success" type="submit">Submit</button>
        </form>

        <!-- class hide membuat form disembunyikan  -->
        <!-- hide adalah fungsi bootstrap 3, klo bootstrap 4 pake invisible  -->
        <div class="copy hide">
            <div class="control-group">
            <div class="form-group">
					<div class="row">
					<label for="birthDate" class="col-sm-3 control-label">Teks Soal</label>
                    <div class="col-sm-3">
                        <input type="file" id="Keterangan" placeholder="Keterangan" class="form-control">
					</div>  
					<div class="col-sm-6">
                        <input type="text" id="tekssoal" placeholder="teks soal" class="form-control" autofocus>
					</div>
			        </div>
			</div>
            <hr>
            </br>
            <div class="form-group">
					<div class="row">
					<label for="birthDate" class="col-sm-3 control-label">Jawaban A</label>
                    <div class="col-sm-3">
                        <input type="file" id="Keterangan" placeholder="Keterangan" class="form-control">
					</div>  
					<div class="col-sm-6">
                        <input type="text" id="jawaban" placeholder="jawaban" class="form-control" autofocus>
					</div>
			        </div>
			</div>
            <div class="form-group">
					<div class="row">
					<label for="birthDate" class="col-sm-3 control-label">Jawaban B</label>
                    <div class="col-sm-3">
                        <input type="file" id="Keterangan" placeholder="Keterangan" class="form-control">
					</div>  
					<div class="col-sm-6">
                        <input type="text" id="jawaban" placeholder="jawaban" class="form-control" autofocus>
					</div>
			        </div>
			</div>
            <div class="form-group">
					<div class="row">
					<label for="birthDate" class="col-sm-3 control-label">Jawaban C</label>
                    <div class="col-sm-3">
                        <input type="file" id="Keterangan" placeholder="Keterangan" class="form-control">
					</div>  
					<div class="col-sm-6">
                        <input type="text" id="jawaban" placeholder="jawaban" class="form-control" autofocus>
					</div>
			        </div>
			</div>
            <div class="form-group">
					<div class="row">
					<label for="birthDate" class="col-sm-3 control-label">Jawaban D</label>
                    <div class="col-sm-3">
                        <input type="file" id="Keterangan" placeholder="Keterangan" class="form-control">
					</div>  
					<div class="col-sm-6">
                        <input type="text" id="jawaban" placeholder="jawaban" class="form-control" autofocus>
					</div>
			        </div>
			</div>
            <div class="form-group">
					<div class="row">
					<label for="birthDate" class="col-sm-3 control-label">Jawaban E</label>
                    <div class="col-sm-3">
                        <input type="file" id="Keterangan" placeholder="Keterangan" class="form-control">
					</div>  
					<div class="col-sm-6">
                        <input type="text" id="jawaban" placeholder="jawaban" class="form-control" autofocus>
					</div>
			        </div>
			</div>
            <hr>
            </br>
            <div class="form-group">
					<div class="row">
					<label for="birthDate" class="col-sm-3 control-label">Kunci Jawaban</label>
					<div class="col-sm-3">
                        <select id="country" class="form-control">
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                            <option>D</option>
                            <option>E</option>
                        </select>
					</div>
					</div>
			</div>
            </br>
              <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
              <hr>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
<!-- fungsi javascript untuk menampilkan form dinamis  -->
<!-- penjelasan :
saat tombol add-more ditekan, maka akan memunculkan div dengan class copy -->
<script type="text/javascript">
    $(document).ready(function() {
      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });

      // saat tombol remove dklik control group akan dihapus 
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
</script>
</body>
</html>