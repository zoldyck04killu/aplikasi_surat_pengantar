<?php
session_start();


// rubah data di bawah ini sessuai phpmyadmin
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'aplikasi_surat_pengantar';
// end

function base_url($url = null ) {
	$base_url = "http://localhost/aplikasi_surat_pengantar/";
	if ($url != null ) {
		return $base_url."/".$url;
	} else  {
			return $base_url;
	}
}
