<div class="header-hal">
    <h1>Berikan Saran</h1>
    <hr>
</div>

<div class="container" id="" style="">

	<form class="" id="" method="POST" action="">

		<table align="center">
				<tr>
					<td> <h4>NIK</h4> </td>
					<td> <input type="number" class="form-control" name="NIK" placeholder="Masukan NIK KTP"> </td>
				</tr>
				<tr>
					<td> <h4>SARAN</h4> </td>
					<td>
            <textarea name="saran" rows="8" cols="80"></textarea>
            <!-- <input type="text" class="form-control" name="NAMA" placeholder="Masukan Nama Lengkap"> -->
          </td>
				</tr>

				<tr>
					<td> <input type="submit" class="btn btn-md btn-primary" name="simpan" value="Send"> </td>
				</tr>
		</table>
	</form>

</div>


<?php

if (isset($_POST['simpan'])) {

	$nik 		  = $_POST['NIK'];
	$saran         = $_POST['saran'];

	$insert = $objAdmin->insertSaran($nik, $saran);

	if ($insert) {
		echo '
			<script> alert("berhasil") </script>
		';
	}else{
		echo '
			<script> alert("gagal") </script>
		';
	}
}
