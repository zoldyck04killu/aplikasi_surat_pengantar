<?php

$id = @$_GET['id'];
$data = $objAdmin->editAKTE($id)->fetch_object();

 ?>

<div class="header-hal">
    <h1>Edit Akte</h1>
    <hr>
</div>

<div class="container" id="" style="">

	<form class="" id="" method="POST" action="" enctype="multipart/form-data">

    <table align="center">
      <input type="hidden" name="id_akte" value="<?= $data->id_akte ?>">
	   <tr>
          <td> <h4>NIK</h4> </td>
          <td> <input type="text" class="form-control" name="NIK" placeholder="" value="<?= $data->nik ?>"> </td>
        </tr>
        <tr>
          <td> <h4>NAMA</h4> </td>
          <td> <input type="text" class="form-control" name="NAMA" placeholder="Nama Lengkap" value="<?= $data->nama ?>"> </td>
        </tr>
        <tr>
          <td> <h4>TANGGAL LAHIR</h4> </td>
          <td> <input type="date" class="form-control" name="TGL" placeholder="Tanggal Lahir" value="<?= $data->tanggal_lahir ?>"> </td>
        </tr>
        <tr>
          <td> <h4>TEMPAT LAHIR</h4> </td>
          <td> <input type="text" class="form-control" name="TEMPAT" placeholder="Tempat Lahir" value="<?= $data->tempat_lahir ?>"> </td>
        </tr>
        <tr>
          <td> <h4>NAMA AYAH</h4> </td>
          <td> <input type="text" class="form-control" name="AYAH" placeholder="Nama Ayah" value="<?= $data->nama_ayah ?>"> </td>
        </tr>
        <tr>
          <td> <h4>NAMA IBU</h4> </td>
          <td> <input type="text" class="form-control" name="IBU" placeholder="Nama Ibu" value="<?= $data->nama_ibu ?>"> </td>
        </tr>
          <tr>
          <td> <h4>ANAK KE-</h4> </td>
          <td> <input type="text" class="form-control " name="KE" placeholder="Anak ke" value="<?= $data->anakke ?>"> </td>
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
          <td> <input type="text" class="form-control " name="AGAMA" placeholder="" value="<?= $data->agama ?>"> </td>
        </tr>

        <tr>
          <td> <h4>PEKERJAAN</h4> </td>
          <td> <input type="text" class="form-control " name="PEKERJAAN" placeholder="" value="<?= $data->pekerjaan ?>"> </td>
        </tr>
        <tr>
          <td> <h4>KEPERLUAN</h4> </td>
          <td> <input type="text" class="form-control" name="KEPERLUAN" placeholder="" value="<?= $data->keperluan ?>"> </td>
        </tr>
        <tr>
          <td> <h4>KETERANGAN</h4> </td>
          <td> <input type="text" class="form-control " name="KETERANGAN" placeholder="" value="<?= $data->ket ?>"> </td>
        </tr>
        <tr>

        <?php if (@$_SESSION['hak_akses'] == 2) { ?>
        <tr>
          <td> <h4>TANGGAL PENGAMBILAN</h4> </td>
          <td> <input type="date" class="form-control" name="TGL_PENGAMBILAN" placeholder="Tanggal Pengambilan" value="<?= $data->tgl_pengambilan ?>"> </td>
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
  $id      = $_POST['id_akte'];
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

  if (@$_SESSION['hak_akses'] == 2) {
    $tgl_pengambilan        = $_POST['TGL_PENGAMBILAN'];
  } else {
    $tgl_pengambilan        = $data->tgl_pengambilan;
  }

  // $gambar           = $_FILES['gambar']['name'];
  // $tmp_name = $_FILES['gambar']['tmp_name'];
  // $format   = "Img-".round(microtime(true)). "";
  // $ext      = pathinfo($gambar, PATHINFO_EXTENSION);
  // move_uploaded_file($tmp_name, "./assets/surat_pengantar/".$nama_gambar = $format.rand(10, 100).".".$ext);

	$update = $objAdmin->updateAKTE($id,$nama, $tgl, $tempat, $ayah, $ibu, $ke, $jekel, $agama, $nik, $pekerjaan,$keperluan,$keterangan, $tgl_pengambilan);

	if ($update) {
    echo '
      <script>
      alert("Update berhasil")
      </script>

    ';
	}else{
		echo '
			<script> alert("Register gagal") </script>
		';
	}
}
