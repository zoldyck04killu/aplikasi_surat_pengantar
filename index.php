<?php
// require_once 'config/autoload.php';

require_once 'config/config.php';
require_once 'config/connection.php';
include('models/admin.php');
$obj = new Connection($host, $user, $pass, $db);
$objAdmin = new Admin($obj);
?>

<html lang="en" dir="ltr">
  <head>

    <title></title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/home.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/DataTables/datatables.min.css"/>

    <script src="<?php echo base_url(); ?>assets/jquery-3.1.1.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> -->

    <script src="<?=base_url();?>assets/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/DataTables/datatables.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

  </head>
  <body>

<div class="container">
  <div class="row header-atas">
    <div class="col-sm">
      <center>
      <a  href="?view=home">
        <button type="button" class="btn btn-outline-dark btn-sm">Beranda</button>
      </a>

      <?php if (@$_SESSION['hak_akses']) { ?>
        <a c href="?view=pendaftaran">
          <button type="button" class="btn btn-outline-dark btn-sm">Pengisian Surat Pengantar</button>
        </a>
        <?php if (@$_SESSION['hak_akses'] == 1) { ?>
        <a c href="?view=surat_pengantar_saya">
          <button type="button" class="btn btn-outline-dark btn-sm">Data Surat Pengantar Saya</button>
        </a>
        <?php } ?>
        <?php } ?>

 
      <?php if (@$_SESSION['hak_akses'] == 2) { ?>
      <a  href="?view=data-saran">
        <button type="button" class="btn btn-outline-dark btn-sm">Saran</button>
      </a>
      <?php }else{ ?>
      <a  href="?view=saran">
        <button type="button" class="btn btn-outline-dark btn-sm">Saran</button>
      </a>
      <?php } ?>

      <?php if (@$_SESSION['user']) { ?>
        <a href="?view=logout">
          <button type="button" class="btn btn-outline-dark btn-sm">Logout</button>
        </a>
      <?php }else{ ?>
        <a  href="?view=login">
          <button type="button" class="btn btn-outline-dark btn-sm">Login</button>
        </a>
      <?php } ?>
      </center>
    </div>
  </div>
</div>


        <!-- MAIN -->
        <div class="col">

            <h1>
                <?php include('page/page.php'); ?>
            </h1>

        </div>

</body>
<script type="text/javascript">
    $(document).ready( function () {
      $('#table').DataTable();
      $('#table1').DataTable();
      $('#table2').DataTable();
      $('#table3').DataTable();

    } );
</script>
</html>

<style media="screen">
  .header-atas .col-sm button
  {
      width: 200px;
      margin: 20px 35px;
  }
</style>
