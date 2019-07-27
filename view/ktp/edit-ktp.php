<?php
$nik = @$_GET['nik'];
$data = $objAdmin->editKTP($nik)->fetch_object();
 ?>


 <div class="header-hal">
     <h1>Edit KTP</h1>
     <hr>
 </div>

 <div class="container" id="" style="">

 	<form class="" id="" method="POST" action="" enctype="multipart/form-data">

    <table align="center">
        <input type="hidden" name="id_ktp" value="<?= $data->id_ktp ?>">
				<tr>
					<td> <h4>NIK</h4> </td>
					<td> <input type="text" class="form-control" name="NIK" placeholder="Masukan NIK KTP" value="<?= $data->nik ?>"> </td>
				</tr>
				<tr>
					<td> <h4>NAMA</h4> </td>
					<td> <input type="text" class="form-control" name="NAMA" placeholder="Masukan Nama Lengkap"  value="<?= $data->nama ?>"> </td>
				</tr>
				<tr>
					<td> <h4>TGL LAHIR</h4> </td>
					<td> <input type="date" class="form-control" name="TGL_LAHIR"  value="<?= $data->tanggal_lahir ?>"> </td>
				</tr>
				<tr>
					<td> <h4>TEMPAT LAHIR</h4> </td>
					<td> <input type="text" class="form-control" name="TEMPAT_LAHIR" placeholder="Tempat Lahir"  value="<?= $data->tempat_lahir ?>"> </td>
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
					<td> <input type="text" class="form-control" name="ALAMAT" placeholder="Alamat"  value="<?= $data->alamat ?>"> </td>
				</tr>
        <tr>
          <td> <h4>TELP</h4> </td>
          <td> <input type="text" class="form-control" name="TELP" placeholder="Telp"  value="<?= $data->telp ?>"> </td>
        </tr>
				<tr>
					<td> <h4>RT/RW</h4> </td>
					<td> <input type="text" class="" name="RT" placeholder="RT"  value="<?= $data->rt ?>"> <input type="" class="" name="RW" placeholder="RW"  value="<?= $data->rw ?>"> </td>
				</tr>
        <tr>
          <td> <h4>DESA</h4> </td>
          <td> <input type="text" class="form-control" name="DESA" placeholder="Desa"  value="<?= $data->desa ?>"> </td>
        </tr>
        <tr>
          <td> <h4>KECAMATAN</h4> </td>
          <td> <input type="text" class="form-control" name="KECAMATAN" placeholder="Kecamatan"  value="<?= $data->kec ?>"> </td>
        </tr>
        <tr>
          <td> <h4>KABUPATEN</h4> </td>
          <td> <input type="text" class="form-control" name="KABUPATEN" placeholder="Kabupaten"  value="<?= $data->kab ?>"> </td>
        </tr>
				<tr>
					<td> <h4>AGAMA</h4> </td>
					<td> <input type="text" class="form-control" name="AGAMA" placeholder="Agama"  value="<?= $data->agama ?>"> </td>
				</tr>
				<tr>
					<td> <h4>KEWARGANEGARAAN</h4> </td>
					<td> <input type="text" class="form-control" name="KEWARGANEGARAAN" placeholder="Kewarganegaraan"  value="<?= $data->kewarganegaraan ?>"> </td>
				</tr>
        <tr>
					<td> <h4>PEKERJAAN</h4> </td>
					<td> <input type="text" class="form-control" name="PEKERJAAN" placeholder="Pekerjaan"  value="<?= $data->pekerjaan ?>"> </td>
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
        <?php if (@$_SESSION['hak_akses'] == 2) { ?>
        <tr>
          <td> <h4>TANGGAL PENGAMBILAN</h4> </td>
          <td> <input type="date" class="form-control" name="TGL_PENGAMBILAN" placeholder="Tanggal Berfoto"  value="<?= $data->tgl_pengambilan ?>"> </td>
        </tr>
        <tr>
          <td> <h4>TANGGAL BERFOTO</h4> </td>
          <td> <input type="date" class="form-control" name="TGL_BERFOTO" placeholder="Tanggal Pengambilan"  value="<?= $data->tgl_berfoto ?>"> </td>
        </tr>
        <?php } ?>
        


 				<tr>
 					<td> <input type="submit" class="btn btn-md btn-primary" name="update" value="Update"> </td>
 				</tr>
 		</table>
 	</form>

 </div>


 <?php

 if (isset($_POST['update'])) {
  $id_ktp 		  = $_POST['id_ktp'];

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
   if (@$_SESSION['hak_akses'] == 2) {
     $tgl_pengambilan       = $_POST['TGL_PENGAMBILAN'];
   } else {
     $tgl_pengambilan        = $data->tgl_pengambilan;
   }
   $tgl_berfoto       = $_POST['TGL_BERFOTO'];

 


 	$update = $objAdmin->updateKTP($id_ktp, $nik, $nama, $tgl_lahir, $tempat_lahir, $jekel, $alamat, $telp, $rt, $rw, $desa, $kecamatan, $kabupaten, $agama, $kewar, $pekerjaan,$status_kawin, $tgl_pengambilan, $tgl_berfoto );

 	if ($update) {
 		echo '
 			<script>
      alert("Update berhasil")
      </script>

 		';
 	}else{
 		echo '
 			<script> alert("Update gagal") </script>
 		';
 	}
 }
