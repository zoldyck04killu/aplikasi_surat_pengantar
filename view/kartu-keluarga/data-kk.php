<div class="header-hal">
    <h1>Data Kartu Keluarga</h1>
    <hr>
    <?php if (@$_SESSION['user']) { ?>
    <a href="?view=daftar-kk" class="btn btn-sm btn-primary">Daftar KK</a>
  <?php } ?>
</div>

<form class="ml-4" action="view/laporan/laporan-pendaftaran-penduduk-KK.php" method="GET">
  <div  class="form-group row">
   <div class="col-xs-2 mr-2">
     <input class="form-control" id="ex1" type="date" name="tgl">
   </div>
    <button type="submit" class="btn btn-primary">Laporan per hari</button>
  </div>
</form>

<div class="container mt-5">


  <div class="" style="font-size:20px;" >
  <table class="table table-responsive" id="table" width="1090">
    <thead class="thead-dark">
      <tr>
 
        <th>NAMA</th>
        <th>TAGGAL LAHIR </th>
        <th>TEMPAT LAHIR</th>
        <th>JENIS KELAMIN  </th>
        <th>ALAMAT</th>
        <th>TELP</th>
        <th>RT</th>
        <th>RW</th>
        <th>DESA</th>
        <th>KEC</th>
        <th>KAB</th>
        <th>AGAMA</th>
        <th>NEGARA</th>
        <th>PEKERJAAN</th>
        <th>STATUS KAWIN</th>
        <th>TANGGAL PERMOHONAN</th>
        <th>TANGGAL PENGAMBILAN</th>
 
        <?php if (@$_SESSION['hak_akses'] == 2) { ?>
        <th>SELESAI</th>
        <th>PILIHAN</th>
        <?php } ?>
      </tr>
    </thead>
    <tbody>
      <?php
      $data = $objAdmin->showKK();
      while ($a = $data->fetch_object()) {
      ?>
      <tr>
 
        <td><?=$a->nama ?></td>
        <td><?=$a->tanggal_lahir ?></td>
        <td><?=$a->tempat_lahir ?></td>
        <td><?=$a->jekel ?></td>
        <td><?=$a->alamat ?></td>
        <td><?=$a->telp ?></td>
        <td><?=$a->rt ?></td>
        <td><?=$a->rw ?></td>
        <td><?=$a->desa ?></td>
        <td><?=$a->kec ?></td>
        <td><?=$a->kab ?></td>
        <td><?=$a->agama ?></td>
        <td><?=$a->kewarganegaraan ?></td>
        <td><?=$a->pekerjaan ?></td>
        <td><?=$a->status_kawin ?></td>
        <td><?=$a->tanggal_permohonan ?></td>
        <td><?=$a->tgl_pengambilan ?></td>
 

        <?php if (@$_SESSION['hak_akses'] == 2) { ?>
        <td>
          <?php
          if ($a->status_cetak == 0) { ?>
            <a href="?view=status-cetak-kk&nik=<?=$a->nik ?>&status=<?=$a->status_cetak ?>" class="btn btn-sm btn-dark">BELUM SELESAI</a>
          <?php
          }else{ ?>
          <a href="?view=status-cetak-kk&nik=<?=$a->nik ?>&status=<?=$a->status_cetak ?>" class="btn btn-sm btn-success">SELESAI</a>
          <?php
          }
          ?>
        </td>
        <td>
          <div class="btn-group">
            <a href="view/laporan/laporan-kk.php?nik=<?=$a->nik ?>" class="btn btn-sm btn-warning">Laporan</a>
            <a href="?view=edit-kk&nik=<?=$a->nik ?>" class="btn btn-sm btn-info">Edit</a>
            <a href="?view=hapus-kk&nik=<?=$a->nik ?>" onclick="return confirm('Hapus data ?')" class="btn btn-sm btn-danger">Hapus</a>
          </div>
        </td>
      </tr>
    <?php } ?>
    <?php } ?>
    </tbody>
  </table>

</div>
