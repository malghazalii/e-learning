
<html lang="en">
<head>
  <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<br>
    
<div class="container  py-xl-5 py-lg-3">
<h3>Nama mata pelajaran</h3>
    </div>

<div class="container">

  <div class="panel panel-default">    
    <div class="panel-body">
      <!-- membuat form  -->
      <!-- gunakan tanda [] untuk menampung array  -->
        <form action="proses.php" method="POST">
          <div class="control-group after-add-more">
            <div class="form-group">
					<div class="row">
					<label for="birthDate" class="col-sm-2 control-label">Nama tugas</label>
            </div>
            <hr>
          <div class="form-group">
					<div class="row">
					<a for="birthDate" class="col-sm-2 control-label">deskripsi tugas</a>
					</div>
              </div>
             </div>
          </div>
        </form>
    </div>
  </div>
  <br>
  <h3>Status</h3>
  <br>
        <table class="table table-striped">
            <tbody>
                    <tr>
                    <td>Submission status</td>
                    <td>No attempt</td>
                    </tr>
                    <tr>
                    <td>Grading status</td>
                    <td>Not gradedThornton</td>
                    </tr>
                    <tr>
                    <td>Due date</td>
                    <td>Friday, 4 December 2020, 12:00 AM</td>
                    </tr>
                    <tr>
                    <td>Time remaining</td>
                    <td>10 hours 50 mins</td>
                    </tr>
                    <tr>
                    <td>Last modified</td>
                    <td>-</td>
                    </tr>
                    <tr>
                    <td>add submissions</td>
                    <td><input type="file" name="gambar_soal" id="gambar_soal" class="btn btn-success upload"> </td>
                    </tr>
            </tbody>
        </table>      
        <hr>  
        <button class="btn btn-primary" type="submit">Send</button>
        <br>
        <br>
</div>
</body>
</html>