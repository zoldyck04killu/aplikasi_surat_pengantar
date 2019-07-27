<div class="header-hal">
    <h1>REGISTER PENGGUNA</h1>
    <hr>
</div>

<div class="form">
    <form method="post" action="">
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="Username" name="username">
        </div>
      </div>
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input class="form-control" type="password" placeholder="Password" name="password">
        </div>
      </div>
      <input type="hidden" name="hak_akses" value="1">
      <input type="hidden" name="blokir_pengguna" value="0">

      <button type="submit" class="btn btn-primary" name="register_pengguna">Register</button>
    </form>
</div>

<?php

if (isset($_POST['register_pengguna'])) {
  $username = $obj->conn->real_escape_string($_POST['username']);
  $password = $obj->conn->real_escape_string($_POST['password']);
  $password_hash = password_hash($password, PASSWORD_DEFAULT);
  $hak_akses = $obj->conn->real_escape_string($_POST['hak_akses']);
  $blokir_pengguna = $obj->conn->real_escape_string($_POST['blokir_pengguna']);

  // login
  $login = $objAdmin->register_pengguna($username, $password_hash, $hak_akses, $blokir_pengguna);
  if ($login) {
      echo '<script>
      window.location="?view=register-pengguna";
       </script>';
  }else {
    echo '<script> alert("error login"); </script>';
  }

  // // register
  // $password_hash = password_hash($password, PASSWORD_DEFAULT);
  // $objAdmin->register($username, $password_hash);


}

?>
