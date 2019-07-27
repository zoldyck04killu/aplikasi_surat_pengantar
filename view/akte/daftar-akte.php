<div class="header-hal">
    <h1>Pengisian Surat Akte</h1>

    <hr>
</div>

<div class="container" id="" style="">

	<form class="" id="" method="POST" action="">

		<table align="center">
				<tr>
					<td> <h4>NAMA</h4> </td>
					<td> <input type="text" class="form-control" name="NAMA" placeholder="Nama Lengkap"> </td>
				</tr>
				<tr>
					<td> <h4>TANGGAL LAHIR</h4> </td>
					<td> <input type="date" class="form-control" name="TGL" placeholder="Tanggal Lahir"> </td>
				</tr>
				<tr>
					<td> <h4>TEMPAT LAHIR</h4> </td>
					<td> <input type="text" class="form-control" name="TEMPAT" placeholder="Tempat Lahir"> </td>
				</tr>
				<tr>
					<td> <h4>NAMA AYAH</h4> </td>
					<td> <input type="text" class="form-control" name="AYAH" placeholder="Nama Ayah"> </td>
				</tr>
				<tr>
					<td> <h4>NAMA IBU</h4> </td>
					<td> <input type="text" class="form-control" name="IBU" placeholder="Nama Ibu"> </td>
				</tr>
					<tr>
					<td> <h4>ANAK KE-</h4> </td>
					<td> <input type="text" class="form-control " name="KE" placeholder="Anak ke"> </td>
				</tr>
        <tr>
					<td> <h4>JENIS KELAMIN</h4> </td>
					<td>
						<select name="JEKEL" class="form-control">
						<option value="laki-laki">Laki-Laki</option>
						<option value="perempuan">Perempuan</option>
						</select>
					</td>
				</tr>
        <tr>
          <td> <h4>AGAMA</h4> </td>
          <td> <input type="text" class="form-control " name="AGAMA" placeholder=""> </td>
        </tr>
        <tr>
          <td> <h4>NIK</h4> </td>
          <td> <input type="text" class="form-control" name="NIK" placeholder=""> </td>
        </tr>
        <tr>
          <td> <h4>PEKERJAAN</h4> </td>
          <td> <input type="text" class="form-control " name="PEKERJAAN" placeholder=""> </td>
        </tr>
        <tr>
          <td> <h4>KEPERLUAN</h4> </td>
          <td> <input type="text" class="form-control" name="KEPERLUAN" placeholder=""> </td>
        </tr>
        <tr>
          <td> <h4>KETERANGAN</h4> </td>
          <td> <input type="text" class="form-control " name="KETERANGAN" placeholder=""> </td>
        </tr>


        <!-- <tr>
          <td> <h4>TANGGAL PENGAMBILAN</h4> </td>
          <td> <input type="date" class="form-control" name="TGL_PENGAMBILAN" placeholder="Tanggal Pengambilan"> </td>
        </tr> -->


				<tr>
					<td> <input type="submit" class="btn btn-md btn-primary" name="simpan" value="Daftar"> </td>
				</tr>
		</table>
	</form>

</div>


<?php

if (isset($_POST['simpan'])) {

	$nama      = $_POST['NAMA'];
	$tgl       = $_POST['TGL'];
	$tempat    = $_POST['TEMPAT'];
	$ayah      = $_POST['AYAH'];
	$ibu       = $_POST['IBU'];
	$ke        = $_POST['KE'];
  $jekel        = $_POST['JEKEL'];
  $agama        = $_POST['AGAMA'];
  $nik        = $_POST['NIK'];
  $pekerjaan        = $_POST['PEKERJAAN'];
  $keperluan        = $_POST['KEPERLUAN'];
  $keterangan        = $_POST['KETERANGAN'];
  // $berlaku_dari        = $_POST['BERLAKU_DARI'];
  // $berlaku_sampai        = $_POST['BERLAKU_SAMPAI'];
  // $nama_ttd        = $_POST['NAMA_TTD'];
  // $jabatan_ttd        = $_POST['JABATAN_TTD'];
  // $alamat_ttd        = $_POST['ALAMAT_TTD'];

	$insert = $objAdmin->insertAKTE($nama, $tgl, $tempat, $ayah, $ibu, $ke, $jekel, $agama, $nik, $pekerjaan,$keperluan,$keterangan);

	if ($insert) {
		echo '
			<script> alert("Berhasil") </script>
		';
	}else{
		echo '
			<script> alert("Gagal") </script>
		';
	}
}
