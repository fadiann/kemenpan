<?php
session_start();
$position = 1;

include_once "App/Classes/Login.php";
include_once "App/Libraries/Helper.php";

$Helper = new Helper ();
$logins = new Login ();
$logins->deleteLoginsytem();
?>
<!doctype html>
<html lang="en-US">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="Public/css/login.css">
<title>e-MAS Login | Elektronik Manajemen Audit Sistem</title>
</head>
<?
$index = "index.php";
if (@$_POST ['submit'] == "Login") {

	$username = $Helper->replacetext ( $_POST ['username'] );
	$passwd = $Helper->replacetext ( $_POST ['password'] );
	if ($username != "" && $passwd != "") {
		$rsCek = 0;
		$userStatusAktif = 0;
		$cekLogin = 0;

		$rsCek = $logins->cek_username ( $username, $passwd );
		if (! $rsCek == "0") {
			$rs_user = $logins->data_user ( $username );
			$arr_user = $rs_user->FetchRow ();
			$userStatusAktif = $arr_user ['user_status'];
			if ($userStatusAktif == "1") {
				$cekLogin = $logins->cekLogin ( $arr_user ['user_id'] );
				if ($cekLogin == 1) {
					$date = $Helper->date_db ( date ( "Y-m-d H:i:s" ) );
					$logins->insertStatus ( $arr_user ['user_id'], $date );

					$_SESSION ['ses_userId'] = $arr_user ['user_id'];
					$_SESSION ['ses_userName'] = $arr_user ['user_username'];
					$_SESSION ['ses_groupId'] = $arr_user ['user_id_group'];
					$_SESSION ['ses_id_int'] = $arr_user ['user_id_internal'];
					$_SESSION ['ses_id_eks'] = $arr_user ['user_id_ekternal'];
					echo "<script>location.href='main.php';</script>";
				} else {
					$pending = $logins->cekPending ( $arr_user ['user_id'] );
					echo "<script>alert('$pending'); location.href='" . $index . "';</script>";
				}
			} else {
				echo "<script>alert('Username Anda Telah Dihapus/Inactive, Silahkan Hubungi Administrator'); location.href='" . $index . "';</script>";
			}
		} else {
			$alert = "Verifikasi Username dan Password dengan benar dan coba kembali !!!";
			echo "<script>alert('$alert'); location.href='" . $index . "';</script>";
		}
	} else {
		echo "<script>alert('Username / Password tidak boleh kosong !!!'); location.href='" . $index . "';</script>";
	}
}
?>
<body>
	<div id="login">
		<h2 style="margin:0px; padding:0px;">
			<img src="Public/images/emas-logo.png" width="120" style="margin-top: 30px" />
		</h2>
		<form action="#" method="POST">
			<fieldset style="margin-top:0px; padding-top:0px;">
				<p align="center">
					<label for="email">Kode Pengguna</label>
				</p>
				<p align="center">
					<input type="text" name="username" style="text-align: center">
				</p>

				<p align="center">
					<label for="password">Kata Sandi</label>
				</p>
				<p align="center">
					<input type="password" name="password" value="" style="text-align: center" >
				</p>

				<p align="center">
					<input type="submit" name="submit" value="Login">
				</p>

			</fieldset>

		</form>

	</div>
   <div id="footer" style="color: black; font-weight:bold;line-height: 1.2;">
    Copyright Kementerian Pendayagunaan Aparatur Negara dan Reformasi Birokrasi <?=date("Y")?>
    </div>
	<!-- end login -->

</body>
</html>
