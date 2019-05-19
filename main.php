<?php
if (isset($_REQUEST['action'])) {
	if ($_REQUEST['action'] == 'logout') {
		session_start();
		$position = 1;
		include_once "App/Classes/Login.php";
		$logins = new Login();
		$logins->log_out($_SESSION['ses_userId']);
		session_destroy();
		header("location: index.php");
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>

<head>
	<title>e-MAS | Elektronik Manajemen Audit Sistem</title>
	<link rel="stylesheet" href="Public/css/layout.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="Public/css/loader.css">
	<link rel="shortcut icon" href="Public/images/emas-logo.png" type="image/x-icon">
	<!--[if lt IE 9]>
			<link rel="stylesheet" href="Public/css/ie.css" type="text/css" media="screen" />
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	<script src="Public/js/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="Public/js/actions.js" type="text/javascript"></script>
	<script src="Public/js/hideshow.js" type="text/javascript"></script>
	<script src="Public/js/jqClock.min.js" type="text/javascript"></script>
	<script src="Public/js/pace.min.js"></script>
	<?php
	$position = 1;
	include_once("App/Libraries/login_history.php");
	$jml_notif = 0;
	$rs_cek_count = $Helper->list_notif($ses_userId);
	$jml_notif = $rs_cek_count->RecordCount();
	?>
	<script>
		function no_framing() {
			if (self != top) {
				window.open(self.document.location, "_top", "");
			}
		}

		function logout() {
			var x = window.confirm("Anda Yakin Akan Keluar System");
			if (x) {
				location.href = "App/Config/Logout.php";
			}
		}

		function sh(id, jml) {
			if (jml == '0') {
				document.getElementById(id).style.display = 'none';
			} else {
				document.getElementById(id).style.display = 'block';
			}
		}
		$(document).ready(function() {
			$("#jam").clock({
				"format": "24",
				"calendar": "false"
			});
			$("div#jamcal").clock({
				"calendar": "true",
				"langSet": "id"
			});
		});
	</script>
	<script>
		Pace.on("done", function() {
			$(".preloader").fadeOut(200);
		});
	</script>

</head>

<body onload="sh('notif', '<?= $jml_notif ?>')">
	<div class="preloader"></div>
	<header id="header">
		<hgroup>
			<h1 class="site_title">
				<img src="Public/images/emas-logo-app.png" height="50">
			</h1>
			<h2 class="section_title">
				<div id="jam"></div>
			</h2>
			<div class="btn_view_site">
				<a class="logout_user" href="?action=logout" title="Logout"><b>Logout</b></a>
			</div>
		</hgroup>
	</header>
	<!-- end of header bar -->
	<section id="secondary_bar">
		<div class="user">
			<p><?= ucwords($ses_userName) . " [" . ucwords(strtolower($h_groupName)) . "]"; ?></p>
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs">
				<a href="main.php">Home</a>
				<?
				include "navigation_menu.php";
				?>
			</article>
			<!-- <div class="notif" id="notif">&nbsp;&nbsp;&nbsp;<? 
																	?>&nbsp;&nbsp;&nbsp;</div> -->
		</div>
	</section>
	<!-- end of secondary bar -->
	<?
	include "main_menu.php";
	switch ($method) {
			// coba pelanggan
		case "coba_pelanggan":
			include_once "App/Modules/CobaPelanggan/pelanggan_main.php";
			break;
			// risk management
		case "risk_penetapantujuan":
			include_once "App/Modules/RiskManagement/penetapan_main.php";
			break;
		case "risk_identifikasi":
			include_once "App/Modules/RiskManagement/identifikasi_main.php";
			break;
		case "risk_analisa":
			include_once "App/Modules/RiskManagement/analisa_main.php";
			break;
		case "risk_evaluasi":
			include_once "App/Modules/RiskManagement/evaluasi_main.php";
			break;
		case "risk_penanganan":
			include_once "App/Modules/RiskManagement/penanganan_main.php";
			break;
		case "risk_reviu":
			include_once "App/Modules/RiskManagement/reviu_main.php";
			break;
		case "risk_monitoring":
			include_once "App/Modules/RiskManagement/monitoring_main.php";
			break;
		case "benturan_kepentingan":
			include_once "App/Modules/RiskManagement/benturan_kepentingan_main.php";
			break;
			// audit management
		case "risk_result":
			include_once "App/Modules/AuditManagement/risk_result_main.php";
			break;
		case "auditplan":
			include_once "App/Modules/AuditManagement/audit_plan_main.php";
			break;
		case "anggota_plan":
			include_once "App/Modules/AuditManagement/anggota_plan_main.php";
			break;
		case "auditassign":
			include_once "App/Modules/AuditManagement/audit_assign_main.php";
			break;
		case "anggota_assign":
			include_once "App/Modules/AuditManagement/anggota_assign_main.php";
			break;
		case "surattugas":
			include_once "App/Modules/AuditManagement/surat_tugas_main.php";
			break;
		case "programaudit":
			include_once "App/Modules/AuditManagement/program_audit_main.php";
			break;
		case "kertas_kerja":
			include_once "App/Modules/AuditManagement/kertas_kerja_main.php";
			break;
		case "finding_kka":
			include_once "App/Modules/AuditManagement/finding_main.php";
			break;
		case "rekomendasi":
			include_once "App/Modules/AuditManagement/rekomendasi_main.php";
			break;
		case "followupassign":
			include_once "App/Modules/AuditManagement/assign_tl_main.php";
			break;
		case "finding_tl":
			include_once "App/Modules/AuditManagement/finding_tl_main.php";
			break;
		case "rekomendasi_tl":
			include_once "App/Modules/AuditManagement/rekomendasi_tl_main.php";
			break;
		case "matrikstindaklanjut":
		case "tindaklanjut":
			include_once "App/Modules/AuditManagement/tindaklanjut_main.php";
			break;
		case "matriks_tl":
			include_once "App/Modules/AuditManagement/matriks_tindak_lanjut.php";
			break;
		case "dashboardaudit":
			include_once "App/Modules/AuditManagement/dashboard_audit.php";
			break;
		case  "dashboard_audit_filter":
			include_once "App/Modules/ReportManagement/dashboard_audit_filter.php";
			break;
		case  "dashboard_audit":
			include_once "App/Modules/ReportManagement/dashboard_audit.php";
			break;
		case  "dashboard_auditor_filter":
			include_once "App/Modules/ReportManagement/dashboard_auditor_filter.php";
			break;
		case  "dashboard_auditor":
			include_once "App/Modules/ReportManagement/dashboard_auditor.php";
			break;
		case  "dashboard_temuan_filter":
			include_once "App/Modules/ReportManagement/dashboard_temuan_filter.php";
			break;
		case  "dashboard_temuan":
			include_once "App/Modules/ReportManagement/dashboard_temuan.php";
			break;
			// laporan
		case "laporan_monitoring_tl_filter":
			include_once "App/Modules/ReportManagement/monitoring_tl_filter.php";
			break;
		case "laporan_monitoring_tl":
			include_once "App/Modules/ReportManagement/monitoring_tl.php";
			break;
		case "risk_fil_report":
			include_once "App/Modules/ReportManagement/laporan_filter_risiko.php";
			break;
		case "risk_report":
			include_once "App/Modules/ReportManagement/laporan_risiko.php";
			break;
		case "reportaudit":
			include_once "App/Modules/ReportManagement/listReportAudit_main.php";
			break;
		case "rekap_surat_tugas":
			include_once "App/Modules/ReportManagement/rekap_surat_tugas.php";
			break;
		case "rekap_surat_tugas_filter":
			include_once "App/Modules/ReportManagement/rekap_surat_tugas_filter.php";
			break;
		case "laporan_rekap_perencanaan_filter":
			include_once "App/Modules/ReportManagement/laporan_filter_rekap_perencanaan.php";
			break;
		case "laporan_rekap_perencanaan":
			include_once "App/Modules/ReportManagement/rekap_perencanaan.php";
			break;
		case "laporan_program_audit_filter":
			include_once "App/Modules/ReportManagement/laporan_filter_program_audit.php";
			break;
		case "laporan_program_audit":
			include_once "App/Modules/ReportManagement/laporan_program_audit.php";
			break;
		case "laporan_kka_filter":
			include_once "App/Modules/ReportManagement/laporan_kka_filter.php";
			break;
		case "laporan_kka":
			include_once "App/Modules/ReportManagement/laporan_kka.php";
			break;
		case "laporan_temuan_filter":
			include_once "App/Modules/ReportManagement/laporan_temuan_filter.php";
			break;
		case "laporan_temuan":
			include_once "App/Modules/ReportManagement/laporan_temuan.php";
			break;
		case "laporan_lha_filter":
			include_once "App/Modules/ReportManagement/laporan_lha_filter.php";
			break;
		case "laporan_lha":
			include_once "App/Modules/ReportManagement/laporan_lha.php";
			break;
			// auditor management
		case "auditormgmt":
			include_once "App/Modules/AuditorManagement/auditor_main.php";
			break;
		case "auditor_detil":
			include_once "App/Modules/AuditorManagement/auditor_detil.php";
			break;
			// auditee management
		case "auditeemgmt":
			include_once "App/Modules/AuditeeManagement/auditee_main.php";
			break;
		case "auditee_detil":
			include_once "App/Modules/AuditeeManagement/auditee_detil.php";
			break;
			// parameter management
		case "par_risk_main":
			include_once "App/Modules/ParameterManagement/list_parRisk.php";
			break;
		case "par_risk_kategori":
			include_once "App/Modules/ParameterManagement/risk_kategori_main.php";
			break;
		case "par_risk_selera":
			include_once "App/Modules/ParameterManagement/risk_selera_main.php";
			break;
		case "par_risk_tk":
			include_once "App/Modules/ParameterManagement/risk_tk_main.php";
			break;
		case "par_risk_td":
			include_once "App/Modules/ParameterManagement/risk_td_main.php";
			break;
		case "par_risk_ri":
			include_once "App/Modules/ParameterManagement/risk_ri_main.php";
			break;
		case "par_risk_rr":
			include_once "App/Modules/ParameterManagement/risk_rr_main.php";
			break;
		case "par_risk_peng_int":
			include_once "App/Modules/ParameterManagement/risk_pi_main.php";
			break;
		case "par_risk_matrix_residu":
			include_once "App/Modules/ParameterManagement/risk_matrix_residu_main.php";
			break;
		case "par_risk_penanganan":
			include_once "App/Modules/ParameterManagement/risk_penanganan_main.php";
			break;
		case "par_profil":
			include_once "App/Modules/ParameterManagement/risk_profil_main.php";
			break;
		case "par_td":
			include_once "App/Modules/ParameterManagement/risk_level_main.php";
			break;
		case "par_audit_main":
			include_once "App/Modules/ParameterManagement/list_parAudit.php";
			break;
		case "par_audit_type":
			include_once "App/Modules/ParameterManagement/audit_type_main.php";
			break;
		case "par_subaudit_type":
			include_once "App/Modules/ParameterManagement/sub_audit_type_main.php";
			break;
		case "par_temuan_type":
			include_once "App/Modules/ParameterManagement/temuan_type_main.php";
			break;
		case "par_sub_type":
			include_once "App/Modules/ParameterManagement/temuan_sub_type_main.php";
			break;
		case "par_kode_rek":
			include_once "App/Modules/ParameterManagement/kode_rekomendasi_main.php";
			break;
		case "par_jenis_temuan":
			include_once "App/Modules/ParameterManagement/temuan_jenis_main.php";
			break;
		case "par_holiday":
			include_once "App/Modules/ParameterManagement/holiday_main.php";
			break;
		case "par_posisi_penugasan":
			include_once "App/Modules/ParameterManagement/posisi_penugasan_main.php";
			break;
		case "par_sbu":
			include_once "App/Modules/BudgetManagement/sbu_main.php";
			break;
		case "par_sbu_rinci":
			include_once "App/Modules/BudgetManagement/sbu_rinci_main.php";
			break;
		case "par_status_tl":
			include_once "App/Modules/ParameterManagement/status_tl_main.php";
			break;
		case "par_kode_penyebab":
			include_once "App/Modules/ParameterManagement/kode_penyebab_main.php";
			break;
		case "par_aspek":
			include_once "App/Modules/ParameterManagement/aspek_main.php";
			break;
		case "par_kategori_ref":
			include_once "App/Modules/ParameterManagement/kat_ref_main.php";
			break;
		case "par_auditor_main":
			include_once "App/Modules/ParameterManagement/list_parAuditor.php";
			break;
		case "par_kompetensi":
			include_once "App/Modules/ParameterManagement/kompetensi_main.php";
			break;
		case "par_inspektorat":
			include_once "App/Modules/ParameterManagement/inspektorat_main.php";
			break;
		case "par_pangkat":
			include_once "App/Modules/ParameterManagement/pangkat_main.php";
			break;
		case "par_tipe_jabatan":
			include_once "App/Modules/ParameterManagement/tipe_jabatan_main.php";
			break;
		case "par_auditee_main":
			include_once "App/Modules/ParameterManagement/list_parAuditee.php";
			break;
		case "par_propinsi":
			include_once "App/Modules/ParameterManagement/propinsi_main.php";
			break;
		case "par_kabupaten":
			include_once "App/Modules/ParameterManagement/kabupaten_main.php";
			break;
		case "par_esselon":
			include_once "App/Modules/ParameterManagement/unit_esselon_main.php";
			break;
		case "par_jabatan":
			include_once "App/Modules/ParameterManagement/jabatan_pic_main.php";
			break;
		case "par_gambar":
			include_once "App/Modules/ParameterManagement/gambar_main.php";
			break;
		case "par_email":
			include_once "ParameterManagement/mail_main.php";
			break;
		case "save_mail":
			include_once "ParameterManagement/save_mail.php";
			break;
			// user management
		case "usermgmt":
			include_once "App/Modules/UserManagement/user_main.php";
			break;
		case "par_group":
			include_once "App/Modules/UserManagement/group_main.php";
			break;
		case "backuprestore":
			include_once "App/Modules/UserManagement/backuprestore_main.php";
			break;
		case "log_aktifitas":
			include_once "App/Modules/UserManagement/log_main.php";
			break;
			// Pustaka
		case "ref_program":
			include_once "App/Modules/PustakaManagement/ref_program_main.php";
			break;
		case "ref_audit":
			include_once "App/Modules/PustakaManagement/ref_audit_main.php";
			break;
			// par_menu
		case "par_menu":
			include_once "App/Modules/ParameterManagement/menu_main.php";
			break;
			// user manual
		case "user_manual":
			include_once "App/Modules/ParameterManagement/user_manual_main.php";
			break;
		case "user_manual_donwload":
			include_once "App/Modules/ParameterManagement/user_manual_create.php";
			break;
			// ubah password
		case "change_pass":
			include_once "App/Modules/UserManagement/change_pass_main.php";
			break;
		case "author":
			include_once "App/Modules/Author/author_main.php";
			break;
		case "author_detil":
			include_once "App/Modules/Author/author_detil.php";
			break;
		default:
			include_once "App/Modules/dashboard.php";
			break;
	}
	?>
	<footer>
		<div id="clear"></div>
		<div style="background-color: #324aff; height: 30px; border-top: 2px solid black; padding-bottom: 5px;">
			<center>
				<!-- <p> -->
				<br>
				<strong>Copyright &copy; Kementerian Pendayagunaan Aparatur Negara dan Reformasi Birokrasi <?= date('Y') ?>
					<br>
					<!-- </p> -->
			</center>
		</div>
		</div>
	</footer>
</body>

</html>