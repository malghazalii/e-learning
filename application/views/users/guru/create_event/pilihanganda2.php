
<div class="container py-xl-5 py-lg-3">
		<div class="card">
  		<div class="card-body">
		  <form class="form-horizontal" role="form">
                <div class="form-group">
					<div class="row">
                    <label for="soal" class="col-sm-2 control-label">Soal</label>
                    <div class="col-sm-9">
                        <input type="text" id="masukkansoal" placeholder="masukkan soal" class="form-control" autofocus>
					</div>
				</div>
                </div>
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Jawaban</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                        <div class="col-sm-9">
                                            <input type="text" id="masukkansoal" placeholder="masukkan soal" class="form-control" autofocus>
					                    </div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                        <div class="col-sm-9">
                                            <input type="text" id="masukkansoal" placeholder="masukkan soal" class="form-control" autofocus>
					                    </div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                        <div class="col-sm-9">
                                            <input type="text" id="masukkansoal" placeholder="masukkan soal" class="form-control" autofocus>
					                    </div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                        <div class="col-sm-9">
                                            <input type="text" id="masukkansoal" placeholder="masukkan soal" class="form-control" autofocus>
					                    </div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                        <div class="col-sm-9">
                                            <input type="text" id="masukkansoal" placeholder="masukkan soal" class="form-control" autofocus>
					                    </div>
                                </div>
                                
                            </div>
                    </div>          
                <div class="form-group">           			
                </div> <!-- /.form-group -->
                <div class="form-group">          
                </div> <!-- /.form-group -->     
                </div> <!-- /.form-group -->
                <div class="form-group">       
                </div> <!-- /.form-group -->
                <div id="insert-form"></div>
                        <label class="col-md-3 ml-4"></label>
                        <button type="button" id="btn-tambah-form" class="btn btn-primary">Tambah Soal</button>
                        
			</form> <!-- /form -->
			
  		</div>
	</div>
</div>

<input type="hidden" id="jumlah-form" value="1">

<script>
    $(document).ready(function() { // Ketika halaman sudah diload dan siap
      $("#btn-tambah-form").click(function() { // Ketika tombol Tambah Data Form di klik
        var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
        var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

        // Kita akan menambahkan form dengan menggunakan append
        // pada sebuah tag div yg kita beri id insert-form
        if (nextform <= 5) {
          $("#insert-form").append(
            "<div class='card-body'>" +
		    "<form class='form-horizontal' role='form'>" +
                "<div class='form-group'>" +
					"<div class='row'>" +
                    "<label for='soal' class='col-sm-2 control-label'>Soal</label>" +
                    "<div class='col-sm-9'>" +
                        "<input type='text' id='masukkansoal' placeholder='masukkan soal' class='form-control' autofocus>" +
					"</div>" 
				"</div>" 
                "</div>" 
                    "<div class='row'>" +
                        "<legend class='col-form-label col-sm-2 pt-0'>Jawaban</legend>" +
                            "<div class='col-sm-10'>" +
                                "<div class='form-check'>" +
                                    "<input class='form-check-input' type='radio' name='gridRadios' id='gridRadios1' value='option1' checked>" +
                                        "<div class='col-sm-9'>" +
                                            "<input type='text' id='masukkansoal' placeholder='masukkan soal' class='form-control' autofocus>" +
					                    "</div>" 
                                "</div>" 
                                "<div class='form-check'>"+
                                    "<input class='form-check-input' type='radio' name='gridRadios' id='gridRadios1' value='option1' checked>" +
                                        "<div class='col-sm-9'>" +
                                            "<input type='text' id='masukkansoal' placeholder='masukkan soal' class='form-control' autofocus>" +
					                    "</div>" 
                                "</div>" 
                                "<div class='form-check'>" +
                                    "<input class='form-check-input' type='radio' name='gridRadios' id='gridRadios1' value='option1' checked>" +
                                        "<div class='col-sm-9'>" +
                                            "<input type='text' id='masukkansoal' placeholder='masukkan soal' class='form-control' autofocus>" +
					                    "</div>" 
                                "</div>" 
                                "<div class='form-check'>"+
                                    "<input class='form-check-input' type='radio' name='gridRadios' id='gridRadios1' value='option1' checked>" +
                                        "<div class='col-sm-9'>" +
                                            "<input type='text' id='masukkansoal' placeholder='masukkan soal' class='form-control' autofocus>" +
					                    "</div>" 
                                "</div>" 
                                "<div class='form-check'>" +
                                    "<input class='form-check-input' type='radio' name='gridRadios' id='gridRadios1' value='option1' checked>" +
                                        "<div class='col-sm-9'>" +
                                            "<input type='text' id='masukkansoal' placeholder='masukkan soal' class='form-control' autofocus>" +
					                    "</div>" 
                                "</div>"                                
                            "</div>" 
                    "</div>"           
                "<div class='form-group'>" +           			
                "</div> <!-- /.form-group -->" 
                "<div class='form-group'>" +          
                "</div> <!-- /.form-group -->"      
                "</div> <!-- /.form-group -->"
                "<div class='form-group'>" +      
                "</div> <!-- /.form-group -->"                   
			"</form>" 			
  		"</div>"

          );
          $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
        } else {
          "<div class = 'alert alert-danger'role = 'alert' >" +
          "This is a danger alert— check it out!" +
          "</div>"
        }

      });

      // Buat fungsi untuk mereset form ke semula
      $("#btn-reset-form").click(function() {
        $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
        $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
      });
    });
  </script>