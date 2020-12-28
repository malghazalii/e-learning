<style>
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: #1D244F;
   color: white;
   text-align: left;
}
</style>

<?php 
if (strpos($_SERVER['REQUEST_URI'], 'Guru/BuatKuis') !== false){
?>
<div class="footer" style="position:fixed">
<div class="container">
  <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
</div>
</div>
<?php
}elseif(strpos($_SERVER['REQUEST_URI'], 'Guru/TampilKuis') !== false){
?>
<div class="footer" style="position:fixed">
<div class="container">
  <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
</div>
</div>
<?php
}elseif(strpos($_SERVER['REQUEST_URI'], 'Siswa/Absensi/absen') !== false){
	?>
	<div class="footer" style="position:fixed">
	<div class="container">
	  <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
	</div>
	</div>
	<?php
}elseif(strpos($_SERVER['REQUEST_URI'], 'Guru/kuisessay/kuis') !== false){
	?>
	<div class="footer" style="position:fixed">
	<div class="container">
	  <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
	</div>
	</div>
	<?php
}elseif(strpos($_SERVER['REQUEST_URI'], 'Guru/UploadMateri') !== false){
	?>
	<div class="footer" style="position:fixed">
	<div class="container">
	  <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
	</div>
	</div>
	<?php
}elseif(strpos($_SERVER['REQUEST_URI'], 'Guru/EssayEvent') !== false){
	?>
	<div class="footer" style="position:fixed">
	<div class="container">
	  <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
	</div>
	</div>
	<?php
}elseif(strpos($_SERVER['REQUEST_URI'], 'Guru/Kuisessay') !== false){
	?>
	<div class="footer" style="position:fixed">
	<div class="container">
	  <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
	</div>
	</div>
	<?php
}elseif(strpos($_SERVER['REQUEST_URI'], 'Guru/KuisPilgan/edit') !== false){
	?>
	<div class="footer" style="position:fixed">
	<div class="container">
	  <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
	</div>
	</div>
	<?php
}elseif(strpos($_SERVER['REQUEST_URI'], 'Guru/KuisEssay/edit') !== false){
	?>
	<div class="footer" style="position:fixed">
	<div class="container">
	  <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
	</div>
	</div>
	<?php
}elseif(strpos($_SERVER['REQUEST_URI'], 'Guru/Report_absensi') !== false){
	?>
	<div class="footer" style="position:fixed">
	<div class="container">
	  <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
	</div>
	</div>
	<?php
}elseif(strpos($_SERVER['REQUEST_URI'], 'Guru/Absensi') !== false){
	?>
	<div class="footer" style="position:fixed">
	<div class="container">
	  <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
	</div>
	</div>
	<?php
}elseif(strpos($_SERVER['REQUEST_URI'], 'guru/uploadmateri/editMateri') !== false){
	?>
	<div class="footer" style="position:static">
	<div class="container">
	  <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
	</div>
	</div>
	<?php
}elseif(strpos($_SERVER['REQUEST_URI'], '/guru/mapel/tugas') !== false){
	?>
	<div class="footer" style="position:fixed">
	<div class="container">
	  <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
	</div>
	</div>
	<?php
}elseif(strpos($_SERVER['REQUEST_URI'], 'Guru/Mapel/Koreksi') !== false){
	?>
	<div class="footer" style="position:fixed">
	<div class="container">
	  <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
	</div>
	</div>
	<?php
}elseif(strpos($_SERVER['REQUEST_URI'], 'guru/essayevent/editTugas') !== false){
	?>
	<div class="footer" style="position:static">
	<div class="container">
	  <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
	</div>
	</div>
	<?php
}elseif(strpos($_SERVER['REQUEST_URI'], 'Guru/wali_kelas/DaftarSiswa') !== false){
	?>
	<div class="footer" style="position:static">
	<div class="container">
	  <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
	</div>
	</div>
	<?php
}elseif(strpos($_SERVER['REQUEST_URI'], 'Guru/wali_kelas/AbsenSiswa') !== false){
	?>
	<div class="footer" style="position:fixed">
	<div class="container">
	  <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
	</div>
	</div>
	<?php
}elseif(strpos($_SERVER['REQUEST_URI'], 'Guru/wali_kelas/PenilaianMapel') !== false){
	?>
	<div class="footer" style="position:static">
	<div class="container">
	  <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
	</div>
	</div>
	<?php
}elseif(strpos($_SERVER['REQUEST_URI'], 'Guru/kuispilgan') !== false){
	?>
	<div class="footer" style="position:fixed">
	<div class="container">
	  <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
	</div>
	</div>
	<?php
}elseif(strpos($_SERVER['REQUEST_URI'], 'Guru/kuisessay') !== false){
	?>
	<div class="footer" style="position:fixed">
	<div class="container">
	  <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
	</div>
	</div>
	<?php
}else{
?>
<div class="footer">
<div class="container">
  <p class="col-lg-8 copy-right-grids text-white text-lg-left text-center mt-lg-1">Copyright © eLearning SMAN 1 Bondowoso 2020. All rights reserved.</p>
</div>
</div>

<?php
}
?>
	<!-- Js files -->
	<!-- JavaScript -->
	<!-- Necessary-JavaScript-File-For-Bootstrap -->

	<!-- smooth scrolling -->
	<script src="<?= base_url('assets/users/') ?>js/SmoothScroll.min.js"></script>
	<!-- //smooth scrolling -->

	<!-- move-top -->
	<script src="<?= base_url('assets/users/') ?>js/move-top.js"></script>
	<!-- easing -->
	<script src="<?= base_url('assets/users/') ?>js/easing.js"></script>
	<!--  necessary snippets for few javascript files -->
	<script src="<?= base_url('assets/users/') ?>js/edulearn.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
	<!-- //Js files -->


	</body>

	</html>