<?php

/**
 *
 */
class Admin
{

  private $mysqli;

  function __construct($mysqli)
  {
    $this->mysqli = $mysqli;
    date_default_timezone_set('Asia/Jakarta');
  }

  // daftar (register) masyarakat/users

  function simpanUsername($Username, $password_hash)
  {
    $db = $this->mysqli->conn;
    // jika hak_akses 0 adalah Admin
    // jika hak_akses 1 adalah users
    $hak_akses = 1;
    $db->query("INSERT INTO user (username, password, hak_akses) VALUES ('$Username','$password_hash','$hak_akses')") or die ($db->error);
    return true;
  }

  // LOGIN

  public function login($username, $password){
    // jika hak_akses 0 adalah Admin
    // jika hak_akses 1 adalah users
  $db = $this->mysqli->conn;
  $userdata = $db->query("SELECT * FROM user WHERE username = '$username' ") or die ($db->error);
  $cek = $userdata->num_rows;
  $cek_2 = $userdata->fetch_array();
          if (password_verify($password, $cek_2['password'])) {
              $_SESSION['user'] = $cek_2['username'];
              $_SESSION['hak_akses'] = $cek_2['hak_akses']; //session
               //session
              return true;
          } else {
              return false; // password salah
          }
  }

  public function logout(){
    @$_SESSION['user'] == FALSE;
    @$_SESSION['hak_akses'] == FALSE;
    unset($_SESSION);
    session_destroy();
  }

  // KTP

  public function insertKTP($nik, $nama, $tgl_lahir, $tempat_lahir, $jekel, $alamat, $telp, $rt, $rw, $desa, $kecamatan, $kabupaten, $agama, $kewar, $pekerjaan, $status_kawin)
  {
	  	$db  = $this->mysqli->conn;
      $date_permohonan = date('Y/m/d');
      $user = $_SESSION['user'];
	  	$sql1 = " INSERT INTO ktp (nik,nama,tanggal_lahir,tempat_lahir,jekel,alamat, telp, rt, rw, desa, kec, kab, agama,kewarganegaraan, pekerjaan, status_kawin ,tanggal_permohonan,keperluan,user)
          VALUES
          ('$nik', '$nama', '$tgl_lahir', '$tempat_lahir', '$jekel', '$alamat', '$telp', '$rt', '$rw', '$desa', '$kecamatan', '$kabupaten', '$agama', '$kewar', '$pekerjaan','$status_kawin',
            '$date_permohonan', 'KTP','$user') " ;
      $query1 = $db->query($sql1);
      $sql2 = " INSERT INTO hasil_cetak (NIK,nama,tgl_permohonan,jenis_permohonan) VALUES ('$nik','$nama','$date_permohonan','KTP') " ;
	  	$query2 = $db->query($sql2);
	  	if ($query1) {
	  		return true;
	  	}else{
	  		return false;
	  	}
  }


  public function showKTP()
  {
    $db = $this->mysqli->conn;
    $sql = " SELECT * FROM ktp WHERE keperluan='KTP' ";
    $query = $db->query($sql);
    return $query;
  }

  public function showKTP_peng()
  {
    $db = $this->mysqli->conn;
    $date_now = date('Y-m-d');
    $sql = " SELECT * FROM ktp WHERE keperluan='KTP' AND tgl_pengambilan='$date_now' ";
    $query = $db->query($sql);
    return $query;
  }

  public function showKTP_hari($tgl)
  {
    $db = $this->mysqli->conn;
    $sql = " SELECT * FROM ktp WHERE keperluan='KTP' AND tanggal_permohonan='$tgl' ";
    $query = $db->query($sql);
    return $query;
  }

  public function showKK_hari($tgl)
  {
    $db = $this->mysqli->conn;
    $sql = " SELECT * FROM ktp WHERE keperluan='KK' AND tanggal_permohonan='$tgl' ";
    $query = $db->query($sql);
    return $query;
  }

  public function showAKTE_hari($tgl)
  {
    $db = $this->mysqli->conn;
    $sql = " SELECT * FROM akte_kelahiran WHERE tanggal_permohonan='$tgl' ";
    $query = $db->query($sql);
    return $query;
  }

  public function showKK_peng()
  {
    $db = $this->mysqli->conn;
    $date_now = date('Y-m-d');
    $sql = " SELECT * FROM ktp WHERE keperluan='KK' AND tgl_pengambilan='$date_now' ";
    $query = $db->query($sql);
    return $query;
  }

  public function showAKTE_peng()
  {
    $db = $this->mysqli->conn;
    $date_now = date('Y-m-d');
    $sql = " SELECT * FROM akte_kelahiran WHERE tgl_pengambilan='$date_now' ";
    $query = $db->query($sql);
    return $query;
  }

public function showKTP_perNik($nik)
{
  // var_dump($nik);
  // die();
  $db = $this->mysqli->conn;
  $sql = " SELECT * FROM ktp WHERE nik='$nik' AND keperluan='KK' ";
  $query = $db->query($sql);
  return $query;
}

  public function editKTP($nik)
  {
    $db = $this->mysqli->conn;
    $sql = " SELECT * FROM ktp WHERE nik = '$nik' AND keperluan='KTP' ";
    $query = $db->query($sql);
    return $query;
  }

  public function updateKTP($id_ktp, $nik, $nama, $tgl_lahir, $tempat_lahir, $jekel, $alamat, $telp, $rt, $rw, $desa, $kecamatan, $kabupaten, $agama, $kewar, $pekerjaan,$status_kawin, $tgl_pengambilan,  $tgl_berfoto)
  {
    $db = $this->mysqli->conn;
    if ($tgl_pengambilan == "") {
      $sql = " UPDATE ktp SET nik='$nik',nama='$nama',tanggal_lahir='$tgl_lahir',tempat_lahir='$tempat_lahir',jekel='$jekel',alamat='$alamat', telp='$telp',
      rt='$rt', rw='$rw', desa='$desa', kec='$kecamatan', kab='$kabupaten', agama='$agama',kewarganegaraan='$kewar', pekerjaan='$pekerjaan', status_kawin='$status_kawin',tgl_berfoto='$tgl_berfoto', surat_pengantar_ttd='$'
      WHERE id_ktp = '$id_ktp' AND keperluan='KTP' ";
      // code...
    }elseif ($tgl_berfoto == "") {
      $sql = " UPDATE ktp SET nik='$nik',nama='$nama',tanggal_lahir='$tgl_lahir',tempat_lahir='$tempat_lahir',jekel='$jekel',alamat='$alamat', telp='$telp',
      rt='$rt', rw='$rw', desa='$desa', kec='$kecamatan', kab='$kabupaten', agama='$agama',kewarganegaraan='$kewar', pekerjaan='$pekerjaan', status_kawin='$status_kawin', tgl_pengambilan='$tgl_pengambilan', surat_pengantar_ttd='$'
      WHERE id_ktp = '$id_ktp' AND keperluan='KTP' ";
      // code...
    }
    // elseif ($tgl_berfoto == "" && $tgl_pengambilan == "") {
    //   $sql = " UPDATE ktp SET nik='$nik',nama='$nama',tanggal_lahir='$tgl_lahir',tempat_lahir='$tempat_lahir',jekel='$jekel',alamat='$alamat', telp='$telp',
    //   rt='$rt', rw='$rw', desa='$desa', kec='$kecamatan', kab='$kabupaten', agama='$agama',kewarganegaraan='$kewar', pekerjaan='$pekerjaan', status_kawin='$status_kawin', surat_pengantar_ttd='$'
    //   WHERE id_ktp = '$id_ktp' AND keperluan='KTP' ";
    //   // code...
    // }
    else{
      $sql = " UPDATE ktp SET nik='$nik',nama='$nama',tanggal_lahir='$tgl_lahir',tempat_lahir='$tempat_lahir',jekel='$jekel',alamat='$alamat', telp='$telp',
      rt='$rt', rw='$rw', desa='$desa', kec='$kecamatan', kab='$kabupaten', agama='$agama',kewarganegaraan='$kewar', pekerjaan='$pekerjaan', status_kawin='$status_kawin', tgl_pengambilan='$tgl_pengambilan', tgl_berfoto='$tgl_berfoto', surat_pengantar_ttd='$'
      WHERE id_ktp = '$id_ktp' AND keperluan='KTP' ";
    }
    $query = $db->query($sql);
    if ($query) {
        return true;
    }else {
        return false;
    }
  }

  public function hapusKTP($nik)
  {
    $db = $this->mysqli->conn;
    $sql = " DELETE FROM ktp WHERE nik = '$nik' && keperluan='KTP' ";
    $query = $db->query($sql);
    $sql = " DELETE FROM hasil_cetak WHERE NIK = '$nik' && jenis_permohonan = 'KTP' ";
    $query = $db->query($sql);
    return true;
  }

  // END KTP


  // KARTU KELUARGA

  public function insertKK($nik, $nama, $tgl_lahir, $tempat_lahir, $jekel, $alamat, $telp, $rt, $rw, $desa, $kecamatan, $kabupaten, $agama, $kewar, $pekerjaan,$status_kawin)
  {
  		$db = $this->mysqli->conn;
      $date_permohonan = date('Y/m/d');
      $user = $_SESSION['user'];

  		$sql1 = " INSERT INTO ktp
          (nik,nama,tanggal_lahir,tempat_lahir,jekel,alamat, telp, rt, rw, desa, kec, kab, agama,kewarganegaraan, pekerjaan, status_kawin ,tanggal_permohonan,keperluan,user)
          VALUES
          ('$nik', '$nama', '$tgl_lahir', '$tempat_lahir', '$jekel', '$alamat', '$telp', '$rt', '$rw', '$desa', '$kecamatan', '$kabupaten', '$agama', '$kewar', '$pekerjaan','$status_kawin',
            '$date_permohonan', 'KK','$user') " ;
  		$query1 = $db->query($sql1);
      $sql2 = " INSERT INTO hasil_cetak (NIK,nama,tgl_permohonan,jenis_permohonan) VALUES ('$nik','$nama','$date_permohonan','Kartu Keluarga') ";
  		$query2 = $db->query($sql2);
  		if ($query1) {
	  		return true;
	  	}else{
	  		return false;
	  	}
  }

  public function showKK()
  {
    $db = $this->mysqli->conn;
    $sql = " SELECT * FROM ktp WHERE keperluan='KK' ";
    $query = $db->query($sql);
    return $query;
  }

  public function showKK_perNik($nik)
  {
    $db = $this->mysqli->conn;
    $sql = " SELECT * FROM kartu_keluarga WHERE nik='$nik' ";
    $query = $db->query($sql);
    return $query;
  }

  public function editKK($nik)
  {
    $db = $this->mysqli->conn;
    $sql = " SELECT * FROM ktp WHERE nik = '$nik' AND keperluan='KK' ";
    $query = $db->query($sql);
    return $query;
  }

  public function updateKK($id_ktp, $nik, $nama, $tgl_lahir, $tempat_lahir, $jekel, $alamat, $telp, $rt, $rw, $desa, $kecamatan, $kabupaten, $agama, $kewar, $pekerjaan,$status_kawin, $tgl_pengambilan)
  {
    $db = $this->mysqli->conn;
    if ($tgl_pengambilan == "") {
      $sql = " UPDATE ktp SET nik='$nik',nama='$nama',tanggal_lahir='$tgl_lahir',tempat_lahir='$tempat_lahir',jekel='$jekel',alamat='$alamat', telp='$telp',
      rt='$rt', rw='$rw', desa='$desa', kec='$kecamatan', kab='$kabupaten', agama='$agama',kewarganegaraan='$kewar', pekerjaan='$pekerjaan', status_kawin='$status_kawin', surat_pengantar_ttd='$'
      WHERE id_ktp = '$id_ktp' AND keperluan='KK' ";
      // code...
    }
    else{
      $sql = " UPDATE ktp SET nik='$nik',nama='$nama',tanggal_lahir='$tgl_lahir',tempat_lahir='$tempat_lahir',jekel='$jekel',alamat='$alamat', telp='$telp',
      rt='$rt', rw='$rw', desa='$desa', kec='$kecamatan', kab='$kabupaten', agama='$agama',kewarganegaraan='$kewar', pekerjaan='$pekerjaan', status_kawin='$status_kawin', tgl_pengambilan='$tgl_pengambilan', surat_pengantar_ttd='$'
      WHERE id_ktp = '$id_ktp' ";
    }
    $query = $db->query($sql);
    if ($query) {
        return true;
    }else {
        return false;
    }
  }

  public function hapusKK($nik)
  {
    $db = $this->mysqli->conn;
    $sql = " DELETE FROM ktp WHERE nik = '$nik' && keperluan='KK' ";
    $query = $db->query($sql);
    $sql = " DELETE FROM hasil_cetak WHERE NIK = '$nik' && jenis_permohonan = 'Kartu Keluarga' ";
    $query = $db->query($sql);
    return true;
  }

  // END KARTU KELUARGA


  // AKTE

  public function insertAKTE($nama, $tgl, $tempat, $ayah, $ibu, $ke, $jekel, $agama, $nik, $pekerjaan,$keperluan,$keterangan,$berlaku_dari,$berlaku_sampai, $nama_ttd,$jabatan_ttd, $alamat_ttd)
  {
  		$db = $this->mysqli->conn;
      $date_permohonan = date('Y/m/d');
      $user = $_SESSION['user'];

  		$sql = " INSERT INTO akte_kelahiran
        (nama,tanggal_lahir,tempat_lahir,nama_ayah,nama_ibu,anakke, jekel, agama, nik, pekerjaan, keperluan, ket, berlaku_dari, berlaku_sampai, nama_ttd, jabatan_ttd, alamat_ttd, status_cetak,tanggal_permohonan,user)
        VALUES
        ('$nama', '$tgl', '$tempat', '$ayah', '$ibu', '$ke', '$jekel', '$agama', '$nik', '$pekerjaan','$keperluan','$keterangan','$berlaku_dari','$berlaku_sampai',
          '$nama_ttd','$jabatan_ttd', '$alamat_ttd','0','$date_permohonan','$user') ";
  		$query = $db->query($sql);
      $sql = " INSERT INTO hasil_cetak (NIK,nama,tgl_permohonan,jenis_permohonan) VALUES ('$nik','$nama','$date_permohonan','Akte Kelahiran') ";
  		$query = $db->query($sql);
  		if ($query) {
	  		return true;
	  	}else{
	  		return false;
	  	}
  }

  public function showAKTE()
  {
    $db = $this->mysqli->conn;
    $sql = " SELECT * FROM akte_kelahiran ";
    $query = $db->query($sql);
    return $query;
  }

  public function showAKTE_perNik($id)
  {
    $db = $this->mysqli->conn;
    $sql = " SELECT * FROM akte_kelahiran WHERE id_akte='$id' ";
    $query = $db->query($sql);
    return $query;
  }

  public function editAKTE($id)
  {
    $db = $this->mysqli->conn;
    $sql = " SELECT * FROM akte_kelahiran WHERE id_akte = '$id'  ";
    $query = $db->query($sql);
    return $query;
  }

  public function updateAKTE($id,$nama, $tgl, $tempat, $ayah, $ibu, $ke, $jekel, $agama, $nik, $pekerjaan,$keperluan,$keterangan,$tgl_pengambilan)
  {
    $db = $this->mysqli->conn;
    if ($tgl_pengambilan == "") {
      $sql = " UPDATE akte_kelahiran SET nama='$nama',tanggal_lahir='$tgl',tempat_lahir='$tempat',nama_ayah='$ayah',nama_ibu='$ibu',anakke='$ke', jekel='$jekel', agama='$agama',
      nik='$nik', pekerjaan='$pekerjaan', keperluan='$keperluan', ket='$keterangan', surat_pengantar_ttd='$'
      WHERE id_akte = '$id' ";
    }
    else{
      $sql = " UPDATE akte_kelahiran SET nama='$nama',tanggal_lahir='$tgl',tempat_lahir='$tempat',nama_ayah='$ayah',nama_ibu='$ibu',anakke='$ke', jekel='$jekel', agama='$agama',
      nik='$nik', pekerjaan='$pekerjaan', keperluan='$keperluan', ket='$keterangan', tgl_pengambilan='$tgl_pengambilan',surat_pengantar_ttd='$'
      WHERE id_akte = '$id' ";
    }

    $query = $db->query($sql);
    if ($query) {
      return true;
    }else{
      return false;
    }
  }

  public function hapusAKTE($id)
  {
    $db = $this->mysqli->conn;
    $sql = " DELETE FROM akte_kelahiran WHERE id_akte = '$id' ";
    $query = $db->query($sql);
    $sql = " DELETE FROM hasil_cetak WHERE NIK = '$id' && jenis_permohonan = 'Akte Kelahiran'";
    $query = $db->query($sql);
    if ($query) {
        return true;
    }else{
        return false;
    }
  }

  // END AKTE

  // SARAN
  public function insertSaran($nik, $saran)
  {
      $db = $this->mysqli->conn;
      $sql = " INSERT INTO saran VALUES ('$nik', '$saran') ";
      $query = $db->query($sql);
      if ($query) {
        return true;
      }else{
        return false;
      }
  }

  public function showSaran()
  {
    $db = $this->mysqli->conn;
    $sql = " SELECT * FROM saran ";
    $query = $db->query($sql);
    return $query;
  }

  public function statusCetakKTP($id,$status)
  {
    $db = $this->mysqli->conn;
    if ($status == 0) {
        $status_baru = 1;
    }else {
      $status_baru = 0;
    }
    $sql = " UPDATE ktp SET status_cetak = '$status_baru' WHERE nik = '$id' AND keperluan='KTP' ";
    $query = $db->query($sql);
    $sql = " UPDATE hasil_cetak SET status = '$status_baru' WHERE NIK = '$id' && jenis_permohonan = 'KTP' ";
    $query = $db->query($sql);
    if ($query) {
      return true;
    }else{
      return false;
    }
  }

  public function statusCetakAKTE($id,$status)
  {
    $db = $this->mysqli->conn;
    if ($status == 0) {
        $status_baru = 1;
    }else {
      $status_baru = 0;
    }
    $sql = " UPDATE akte_kelahiran SET status_cetak = '$status_baru' WHERE id_akte = '$id' ";
    $query = $db->query($sql);
    $sql = " UPDATE hasil_cetak SET status = '$status_baru' WHERE NIK = '$id' && jenis_permohonan = 'Akte Kelahiran' ";
    $query = $db->query($sql);
    if ($query) {
      return true;
    }else{
      return false;
    }
  }

  public function statusCetakKK($id,$status)
  {
    $db = $this->mysqli->conn;
    if ($status == 0) {
        $status_baru = 1;
    }else {
      $status_baru = 0;
    }
    $sql = " UPDATE ktp SET status_cetak = '$status_baru' WHERE nik = '$id' AND keperluan='KK' ";
    $query = $db->query($sql);
    $sql = " UPDATE hasil_cetak SET status = '$status_baru' WHERE NIK = '$id' && jenis_permohonan = 'Kartu Keluarga'";
    $query = $db->query($sql);
    if ($query) {
      return true;
    }else{
      return false;
    }
  }

  public function showHasilCetak()
  {
    $db = $this->mysqli->conn;
    $sql = " SELECT * FROM hasil_cetak ";
    $query = $db->query($sql);
    return $query;
  }

}// end class

?>
