<div class="header-hal">
    <h1>LOGIN PENGGUNA</h1>
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

      <button type="submit" class="btn btn-primary" name="login">Login</button>
      <a class="text-secondary" href="?view=register-pengguna ">
          Register
      </a>
    </form>
</div>

<?php

if (isset($_POST['login'])) {
  $username = $obj->conn->real_escape_string($_POST['username']);
  $password = $obj->conn->real_escape_string($_POST['password']);
  // login
  $login = $objAdmin->login_pengguna($username, $password);
  if ($login) {
      echo '<script>
      window.location="?view=home";
       </script>';
  }else {
    echo '<script> alert("error login"); </script>';
  }

  // // register
  // $password_hash = password_hash($password, PASSWORD_DEFAULT);
  // $objAdmin->register($username, $password_hash);


}

?>
