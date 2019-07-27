<div class="header-hal">
    <h1>Data Saran</h1>
    <hr>
    <a href="?view=saran" class="btn btn-sm btn-primary">Berikan Saran</a>
</div>
<div class="container mt-5">


  <table class="table table-striped table-hover">
    <thead class="thead-dark">
      <tr>
        <th>NIK</th>
        <th>SARAN</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $data = $objAdmin->showSaran();
      while ($a = $data->fetch_object()) {
      ?>
      <tr>
        <td><?=$a->nik ?></td>
        <td><?=$a->saran ?></td>
      </tr>
    <?php } ?>
    </tbody>
  </table>

</div>
