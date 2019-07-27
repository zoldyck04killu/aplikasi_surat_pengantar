<div class="header-hal">
    <h1>Data KTP</h1>
    <hr>
</div>
<div class="container mt-5">


  <div class="" style="font-size:20px;" >
  <table class="table table-responsive" id="table" width="1050">
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
        <th>TANGGAL BERFOTO</th>
        <th>TANGGAL PENGAMBILAN</th>

 
        <th>PILIHAN</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $data = $objAdmin->showKTP();
      while ($a = $data->fetch_object()) {
        if ($a->user == $_SESSION['user']) {
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
        <td><?=$a->tgl_berfoto ?></td>
        <td><?=$a->tgl_pengambilan ?></td>

 
        <td>
          <div class="btn-group">
            <a href="view/laporan/laporan-ktp.php?nik=<?=$a->nik ?>" class="btn btn-sm btn-warning">Laporan</a>
 
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
    <h1>Data KK</h1>
    <hr>
</div>
<div class="container mt-5">


  <div class="" style="font-size:20px;" >
  <table class="table table-responsive" id="table" width="1050">
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
        <th>PILIHAN</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $data = $objAdmin->showKK();
      while ($a = $data->fetch_object()) {
        if ($a->user == $_SESSION['user']) {
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

        <td>
          <div class="btn-group">
            <a href="view/laporan/laporan-kk.php?nik=<?=$a->nik ?>" class="btn btn-sm btn-warning">Laporan</a>
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
    <h1>Data Akte</h1>
    <hr>
</div>
<div class="container mt-5">

  <div class="" style="font-size:20px;" >
  <table class="table table-responsive" id="table" width="1050">
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

        <th>PILIHAN</th>

      </tr>
    </thead>
    <tbody>
      <?php
      $data = $objAdmin->showAKTE();
      while ($a = $data->fetch_object()) {
        if ($a->user == $_SESSION['user']) {

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

        <td>
          <div class="btn-group">
            <a href="view/laporan/laporan-akte.php?id=<?=$a->id_akte ?>" class="btn btn-sm btn-warning">Laporan</a>
 
          </div>
        </td>
      </tr>
    <?php } ?>

    <?php } ?>
    </tbody>
  </table>

</div>
