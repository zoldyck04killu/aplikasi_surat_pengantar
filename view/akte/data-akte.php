<div class="header-hal">
    <h1>Data Akte</h1>
    <hr>
    <?php if (@$_SESSION['user']) { ?>
    <a href="?view=daftar-akte" class="btn btn-sm btn-primary">Daftar Akte</a>
  <?php } ?>
</div>

<form class="ml-4" action="view/laporan/laporan-pendaftaran-penduduk-AKTE.php" method="GET">
  <div  class="form-group row">
   <div class="col-xs-2 mr-2">
     <input class="form-control" id="ex1" type="date" name="tgl">
   </div>
    <button type="submit" class="btn btn-primary">Laporan per hari</button>
  </div>
</form>

<div class="container mt-5">

  <div class="" style="font-size:20px;" >
  <table class="table table-responsive" id="table" width="1050">
  <!-- <table class="table table-striped table-hover"> -->
    <thead class="thead-dark">
      <tr>
 
        <th>NAMA</th>
        <th>TANGGAL LAHIR</th>
        <th>TEMPAT LAHIR</th>
        <th>NAMA AYAH</th>
        <th>NAMA IBU</th>
        <th>ANAK KE</th>
        <th>JEKEL</th>
        <th>AGAMA</th>
        <th>NIK</th>
        <th>PEKERJAAN</th>
        <th>KEPERLUAN</th>
        <th>KETERANGAN</th>
 
 
        <th>TANGGAL PERMOHONAN</th>
        <th>TANGGAL PENGAMBILAN</th>
 

        <?php if (@$_SESSION['hak_akses'] == 2) { ?>
        <th>STATUS CETAK</th>
        <th>PILIHAN</th>
        <?php } ?>
      </tr>
    </thead>
    <tbody>
      <?php
      $data = $objAdmin->showAKTE();
      while ($a = $data->fetch_object()) {
      ?>
      <tr>
    
        <td><?=$a->nama ?></td>
        <td><?=$a->tanggal_lahir ?></td>
        <td><?=$a->tempat_lahir ?></td>
        <td><?=$a->nama_ayah ?></td>
        <td><?=$a->nama_ibu ?></td>
        <td><?=$a->anakke ?></td>
        <td><?=$a->jekel ?></td>
        <td><?=$a->agama ?></td>
        <td><?=$a->nik ?></td>
        <td><?=$a->pekerjaan ?></td>
        <td><?=$a->keperluan ?></td>
        <td><?=$a->ket ?></td>
 
        <td><?=$a->tanggal_permohonan ?></td>
        <td><?=$a->tgl_pengambilan ?></td>
 


        <?php if (@$_SESSION['hak_akses'] == 2) { ?>
          <td>
            <?php
            if ($a->status_cetak == 0) { ?>
              <a href="?view=status-cetak-akte&nik=<?=$a->id_akte ?>&status=<?=$a->status_cetak ?>" class="btn btn-sm btn-dark">Belum Selesai</a>
            <?php
            }else{ ?>
            <a href="?view=status-cetak-akte&nik=<?=$a->id_akte ?>&status=<?=$a->status_cetak ?>" class="btn btn-sm btn-success">Sudah Selesai</a>
            <?php
            }
            ?>
          </td>
        <td>
          <div class="btn-group">
            <a href="view/laporan/laporan-akte.php?id=<?=$a->id_akte ?>" class="btn btn-sm btn-warning">Laporan</a>
            <a href="?view=edit-akte&id=<?=$a->id_akte ?>" class="btn btn-sm btn-info">Edit</a>
            <a href="?view=hapus-akte&id=<?=$a->id_akte ?>" onclick="return confirm('Hapus data ?')" class="btn btn-sm btn-danger">Hapus</a>
          </div>
        </td>
        <?php } ?>
      </tr>
    <?php } ?>
    </tbody>
  </table>

</div>
