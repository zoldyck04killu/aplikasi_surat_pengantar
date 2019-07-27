<div class="header-hal">
    <h1>Daftar KARTU KELUARGA</h1>
    <hr>
</div>

<div class="container" id="" style="">

	<form class="" id="" method="POST" action="" >

    <table align="center">
      
        <tr>
          <td> <h4>NAMA</h4> </td>
          <td> <input type="text" class="form-control" name="NAMA" placeholder="Masukan Nama Lengkap"> </td>
        </tr>
        <tr>
          <td> <h4>TGL LAHIR</h4> </td>
          <td> <input type="date" class="form-control" name="TGL_LAHIR"> </td>
        </tr>
        <tr>
          <td> <h4>TEMPAT LAHIR</h4> </td>
          <td> <input type="text" class="form-control" name="TEMPAT_LAHIR" placeholder="Tempat Lahir"> </td>
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
          <td> <h4>ALAMAT</h4> </td>
          <td> <input type="text" class="form-control" name="ALAMAT" placeholder="Alamat"> </td>
        </tr>
        <tr>
          <td> <h4>TELP</h4> </td>
          <td> <input type="text" class="form-control" name="TELP" placeholder="Telp"> </td>
        </tr>
        <tr>
          <td> <h4>RT/RW</h4> </td>
          <td> <input type="text" class="" name="RT" placeholder="RT"> <input type="" class="" name="RW" placeholder="RW"> </td>
        </tr>
        <tr>
          <td> <h4>DESA</h4> </td>
          <td> <input type="text" class="form-control" name="DESA" placeholder="Desa"> </td>
        </tr>
        <tr>
          <td> <h4>KECAMATAN</h4> </td>
          <td> <input type="text" class="form-control" name="KECAMATAN" placeholder="Kecamatan"> </td>
        </tr>
        <tr>
          <td> <h4>KABUPATEN</h4> </td>
          <td> <input type="text" class="form-control" name="KABUPATEN" placeholder="Kabupaten"> </td>
        </tr>
        <tr>
          <td> <h4>AGAMA</h4> </td>
          <td> <input type="text" class="form-control" name="AGAMA" placeholder="Agama"> </td>
        </tr>
        <tr>
          <td> <h4>KEWARGANEGARAAN</h4> </td>
          <td> <input type="text" class="form-control" name="KEWARGANEGARAAN" placeholder="Kewarganegaraan"> </td>
        </tr>
        <tr>
          <td> <h4>PEKERJAAN</h4> </td>
          <td> <input type="text" class="form-control" name="PEKERJAAN" placeholder="Pekerjaan"> </td>
        </tr>
        <tr>
          <td> <h4>STATUS KAWIN</h4> </td>
          <td>
            <select name="STATUS_KAWIN" class="form-control">
            <option value="Sudah">Sudah</option>
            <option value="Belum">Belum</option>
            </select>
          </td>
        </tr>

        <tr>
          <td> <input type="submit" class="btn btn-md btn-primary" name="simpan" value="Daftar"> </td>
        </tr>
    </table>
	</form>

</div>


<?php

if (isset($_POST['simpan'])) {

  $nik 		  = $_POST['NIK'];
	$nama         = $_POST['NAMA'];
	$tgl_lahir    = $_POST['TGL_LAHIR'];
	$tempat_lahir = $_POST['TEMPAT_LAHIR'];
	$jekel        = $_POST['JEKEL'];
	$alamat       = $_POST['ALAMAT'];
  $telp       = $_POST['TELP'];
	$rt           = $_POST['RT'];
	$rw           = $_POST['RW'];
  $desa       = $_POST['DESA'];
  $kecamatan       = $_POST['KECAMATAN'];
  $kabupaten       = $_POST['KABUPATEN'];
	$agama        = $_POST['AGAMA'];
	$kewar        = $_POST['KEWARGANEGARAAN'];
  $pekerjaan       = $_POST['PEKERJAAN'];
  $status_kawin       = $_POST['STATUS_KAWIN'];


	$insert = $objAdmin->insertKK($nik, $nama, $tgl_lahir, $tempat_lahir, $jekel, $alamat, $telp, $rt, $rw, $desa, $kecamatan, $kabupaten, $agama, $kewar, $pekerjaan,$status_kawin);

	if ($insert) {
		echo '
			<script> alert("Register berhasil") </script>
		';
	}else{
		echo '
			<script> alert("Register gagal") </script>
		';
	}
}
