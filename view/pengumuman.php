<div class="header-hal">
    <h1>PENGUMUMAN</h1>
    <hr>
  </div>
  <div class="header-hal">
    <h3>Data KTP</h3>
  </div>
<div class="container mt-5">


  <div class="" style="font-size:20px;" >
  <table class="table table-responsive" id="table1" width="1050">
    <thead class="thead-dark">
      <tr>
        <th>NIK</th>
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
      $data = $objAdmin->showKTP_peng();
      while ($a = $data->fetch_object()) {
      ?>
      <tr>
        <td><?=$a->nik ?></td>
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
            <a href="?view=status-cetak-ktp&nik=<?=$a->nik ?>&status=<?=$a->status_cetak ?>" class="btn btn-sm btn-dark">BELUM SELESAI</a>
          <?php
          }else{ ?>
          <a href="?view=status-cetak-ktp&nik=<?=$a->nik ?>&status=<?=$a->status_cetak ?>" class="btn btn-sm btn-success">SELESAI</a>
          <?php
          }
          ?>
        </td>
        <td>
          <div class="btn-group">
            <a href="view/laporan/laporan-ktp.php?nik=<?=$a->nik ?>" class="btn btn-sm btn-warning">Laporan</a>
            <a href="?view=edit-ktp&nik=<?=$a->nik ?>" class="btn btn-sm btn-info">Edit</a>
            <a href="?view=hapus-ktp&nik=<?=$a->nik ?>" onclick="return confirm('Hapus data ?')" class="btn btn-sm btn-danger">Hapus</a>
          </div>
        </td>
      </tr>
    <?php } ?>
    <?php } ?>
    </tbody>
  </table>

</div>
</div>

<div class="header-hal">
    <h3>Data Kartu Keluarga</h3>
</div>
<div class="container mt-5">

  <div class="" style="font-size:20px;" >
  <table class="table table-responsive" id="table2" width="1070">
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
      $data = $objAdmin->showKK_peng();
      while ($a = $data->fetch_object()) {
      ?>
      <tr>
        <td><?=$a->nik ?></td>
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
        <td><?=$a->nama_ket_rt ?></td>
        <td><?=$a->nip_ket_rt ?></td>
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
</div>

<div class="header-hal">
    <h3>Data Akte</h3>
</div>
<div class="container mt-5">

  <div class="" style="font-size:20px;" >
  <table class="table table-responsive" id="table3" width="1050">
  <!-- <table class="table table-striped table-hover"> -->
    <thead class="thead-dark">
      <tr>
        <th>ID AKTE</th>
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
      $data = $objAdmin->showAKTE_peng();
      while ($a = $data->fetch_object()) {
      ?>
      <tr>
        <td><?=$a->id_akte ?></td>
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
              <a href="?view=status-cetak-akte&nik=<?=$a->no_akte ?>&status=<?=$a->status_cetak ?>" class="btn btn-sm btn-dark">Belum Cetak</a>
            <?php
            }else{ ?>
            <a href="?view=status-cetak-akte&nik=<?=$a->no_akte ?>&status=<?=$a->status_cetak ?>" class="btn btn-sm btn-success">Sudah Cetak</a>
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
