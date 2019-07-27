<div class="header-hal">
    <h1>Daftar Masyarakat</h1>
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
					<td> <input type="submit" class="btn btn-md btn-primary" name="simpanUsername" value="Daftar"> </td>
				</tr>
		</table>
	</form>

</div>


<?php

if (isset($_POST['simpanUsername'])) {

	$Username 	   = $_POST['Username'];
	$Password      = $_POST['Password'];
  $password_hash = password_hash($Password, PASSWORD_DEFAULT);

	$insert = $objAdmin->simpanUsername($Username, $password_hash);

	if ($insert) {
		echo '
			<script> alert("Register berhasil") </script>
		';
	}else{
		echo '
			<script> alert("Register gagal") </script>
		';
	}
}
