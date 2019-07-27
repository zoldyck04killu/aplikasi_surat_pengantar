<div class="header-hal">
    <h1>LOGIN</h1>
    <hr>
</div>

<div class="container" id="" style="">

	<form class="" id="" method="POST" action="">

		<table align="center">
				<tr>
					<td> <h4>NIK</h4> </td>
					<td> <input type="text" class="form-control" name="Username" placeholder="Username"> </td>
				</tr>
				<tr>
					<td> <h4>Password</h4> </td>
					<td> <input type="password" class="form-control" name="Password" placeholder="Password"> </td>
				</tr>

				<tr>
					<td> <input type="submit" class="btn btn-md btn-primary" name="login" value="Login"> </td>
          <td>
            <a class="text-secondary" href="?view=daftar-users">
                Register
            </a>
          </td>
        </tr>

		</table>
	</form>

</div>


<?php

if (isset($_POST['login'])) {
  $username = $obj->conn->real_escape_string($_POST['Username']);
  $password = $obj->conn->real_escape_string($_POST['Password']);
  // login
  $login = $objAdmin->login($username, $password);
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
