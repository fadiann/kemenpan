<?php
@session_start();
ini_set('date.timezone', 'Asia/Jakarta');
error_reporting (0);
if (@$position == 1) {
	include_once "App/Classes/Login.php";
	include_once "App/Libraries/Helper.php";
} else {
	include_once "../App/Classes/Login.php";
	include_once "../App/Libraries/Helper.php";
}

$index = "index.php";
$Helper = new Helper ();
$logins = new Login ();

@$ses_userId   = $_SESSION ['ses_userId'];
@$ses_userName = $_SESSION ['ses_userName'];
@$ses_group_id = $_SESSION ['ses_groupId'];
@$ses_id_int   = $_SESSION ['ses_id_int'];
@$ses_id_eks   = $_SESSION ['ses_id_eks'];

$h_groupName = $logins->getGroup_name($ses_group_id);

@$method = $Helper->replacetext ( $_GET ['method'] );
if ($ses_userId) {
	$isLogin = $logins->isLogin ( $ses_userId );
	switch ($isLogin) {
		/**
		 * Expired *
		 */
		case 1 :
			$logins->deleteLogin ( $ses_userId );
			echo "<script>alert('Masa Waktu Login Ada Telah Habis'); parent.location.href='" . $index . "';</script>";
			break;
		/**
		 * Lanjut*
		 */
		case 2 :
			break;
		/**
		 * IP Beda *
		 */
		case 3 :
			echo "<script>alert('Nama pengguna yang anda masukkan sedang aktif pada saat ini'); parent.location.href='" . $index . "';</script>";
			break;
		/**
		 * No Data *
		 */
		case 4 :
			echo "<script>alert('Silahkan Login Terlebih Dahulu'); parent.location.href='" . $index . "';</script>";
			break;
		/**
		 * masa aktif expired *
		 */
		case 5 :
			echo "<script>alert('Masa Aktif Anda Telah Habis, Silahkan Hubungi Administrator'); parent.location.href='" . $index . "';</script>";
			break;
	}
} else {
	echo "<script>alert('Anda Harus Login Terlebih Dahulu'); parent.location.href='" . $index . "';</script>";
}

$getajukan_tl  = $Helper->cek_akses ( $ses_group_id, $method, 'getajukan_tl' );
$getapprove_tl = $Helper->cek_akses ( $ses_group_id, $method, 'getapprove_tl' );

$iconAdd  = $Helper->cek_akses ( $ses_group_id, $method, 'getadd' );
$iconEdit = $Helper->cek_akses ( $ses_group_id, $method, 'getedit' );
$iconDel  = $Helper->cek_akses ( $ses_group_id, $method, 'getdelete' );

$getajukan  = $Helper->cek_akses ( $ses_group_id, $method, 'getajukan' );
$getapprove = $Helper->cek_akses ( $ses_group_id, $method, 'getapprove' );

$getajukan_penugasan  = $Helper->cek_akses ( $ses_group_id, $method, 'getajukan_penugasan' );
$getapprove_penugasan = $Helper->cek_akses ( $ses_group_id, $method, 'getapprove_penugasan' );

// menejemen risiko
$risk_identifikasi = $Helper->cek_akses ( $ses_group_id, $method, 'risk_identifikasi' );
$view_analisa      = $Helper->cek_akses ( $ses_group_id, $method, 'view_analisa' );
$view_evaluasi     = $Helper->cek_akses ( $ses_group_id, $method, 'view_evaluasi' );
$view_penanganan   = $Helper->cek_akses ( $ses_group_id, $method, 'view_penanganan' );
$view_monitoring   = $Helper->cek_akses ( $ses_group_id, $method, 'view_monitoring' );

// menejemen audit
$set_perencanaan = $Helper->cek_akses ( $ses_group_id, $method, 'view_plan' );
$anggota_plan    = $Helper->cek_akses ( $ses_group_id, $method, 'anggota_plan' );

$anggota_assign_akses = $Helper->cek_akses ( $ses_group_id, $method, 'anggota_assign' );
$surat_tugas_akses    = $Helper->cek_akses ( $ses_group_id, $method, 'surattugas' );
$programaudit_akses   = $Helper->cek_akses ( $ses_group_id, $method, 'programaudit' );
$kertas_kerja_akses   = $Helper->cek_akses ( $ses_group_id, $method, 'kertas_kerja' );
$finding_kka_akses    = $Helper->cek_akses ( $ses_group_id, $method, 'finding_kka' );
$rekomendasi_akses    = $Helper->cek_akses ( $ses_group_id, $method, 'rekomendasi' );

$base_on_login  = "";
$base_on_id_int = "";
$base_on_id_eks = "";

$base_on_login = $Helper->cek_akses_data($ses_group_id, $method);
if($base_on_login=='1') {
	$base_on_id_int = "";
	$base_on_id_eks = "";
}else{
	$base_on_id_int = $ses_id_int;
	$base_on_id_eks = $logins->get_auditee_from_pic($ses_id_eks);
}
?>