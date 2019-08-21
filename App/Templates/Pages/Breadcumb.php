<header class="page-header">
	<h2><?=@$page_title?></h2>
    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs" style="padding-right:30px !important">
<?php
switch ($method) :
	// Manajemen Risiko
	case "benturan_kepentingan" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Risiko</a></li><li><a class='current' href='main.php?method=benturan_kepentingan'>Benturan Kepentingan</a></li>";
		break;
	case "risk_penetapantujuan" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Risiko</a></li><li><a class='current' href='main.php?method=risk_penetapan_tujuan'>Siklus Manajemen Risiko</a></li>";
		break;
	case "risk_identifikasi" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Risiko</a></li><li><a class='current' href='main.php?method=risk_penetapan_tujuan'>Siklus Manajemen Risiko</a><li><a class='current' href='main.php?method=risk_identifikasi'>Identifikasi Sasaran</a></li>";
		if(isset($_REQUEST['data_action'])):
			$data_action = $Helper->replacetext($_REQUEST['data_action']);
			if($data_action == 'getindikator'):
				// var_dump($_REQUEST);
				echo "<li><a class='current' href='#'>Indikator Risiko</a></li>";
				$_SESSION['data_indikator'] = $Helper->replacetext($_REQUEST['data_id']);
			elseif($data_action == 'getrisiko'):
				// var_dump($_REQUEST);
				echo "<li><a class='current' href='?method=risk_identifikasi&data_action=getindikator&data_id=".$_SESSION['data_indikator']."'>Indikator Risiko</a></li><li><a class='current' href='main.php?method=risk_identifikasi'>Risiko</a></li>";
			endif;
		endif;
		break;
	// audit management
	case "risk_result" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Coba Pelanggan</a></li><li><a class='current' href='#'>Coba Pelanggan</a></li>";
		break;
	// audit management
	case "risk_result" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Audit</a></li><li><a class='current' href='#'>Profil Risiko</a></li>";
		break;
	case "auditplan" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Audit</a></li><li><a class='current' href='#'>Perencanaan Audit</a></li>";
		break;
	case "anggota_plan" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Audit</a></li><li><a class='current' href='main.php?method=auditplan'>Perencanaan Audit</a></li><li><a class='current' href='#'>Susunan Tim</a></li>";
		break;
	case "followupassign" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Audit</a></li><li><a class='current' href='main.php?method=followupassign'>Tindak Lanjut Audit</a></li>";
		break;
	case "auditassign" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Audit</a></li><li><a class='current' href='main.php?method=auditassign'>Pelaksanaan Audit</a></li>";
		break;
	case "anggota_assign" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Audit</a></li><li><a class='current' href='main.php?method=auditassign'>Pelaksanaan Audit</a></li><li><a class='current' href='#'>Susunan Tim</a></li>";
		break;
	case "surattugas" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Audit</a></li><li><a class='current' href='main.php?method=auditassign'>Pelaksanaan Audit</a></li><li><a class='current' href='#'>Surat Tugas</a></li>";
		break;
	case "programaudit" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Audit</a></li><li><a class='current' href='main.php?method=auditassign'>Pelaksanaan Audit</a></li><li><a class='current' href='main.php?method=programaudit'>Program Audit</a></li>";
		break;
	case "kertas_kerja" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Audit</a></li><li><a class='current' href='main.php?method=auditassign'>Pelaksanaan Audit</a></li><li><a class='current' href='main.php?method=programaudit'>Program Audit</a></li><li><a class='current' href='#'>Kertas Kerja</a></li>";
		break;
	case "finding_kka" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Audit</a></li><li><a class='current' href='main.php?method=auditassign'>Pelaksanaan Audit</a></li><li><a class='current' href='main.php?method=programaudit'>Program Audit</a></li><li><a class='current' href='main.php?method=kertas_kerja'>Kertas Kerja</a></li><li><a class='current' href='#'>Temuan Audit</a></li>";
		break;
	case "rekomendasi" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Audit</a></li><li><a class='current' href='main.php?method=auditassign'>Pelaksanaan Audit</a></li><li><a class='current' href='main.php?method=programaudit'>Program Audit</a></li><li><a class='current' href='main.php?method=kertas_kerja'>Kertas Kerja</a></li><li><a class='current' href='main.php?method=finding_kka'>Temuan Audit</a></li><li><a class='current' href='#'>Rekomendasi Temuan</a></li>";
		break;
	case "finding_tl" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Audit</a></li><li><a class='current' href='main.php?method=followupassign'>Tindak Lanjut Audit</a><li><a href='main.php'><i class='fa fa-home'></i></a></li><a class='current' href='#'>Temuan Audit</a></li>";
		break;
	case "rekomendasi_tl" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Audit</a></li><li><a class='current' href='main.php?method=followupassign'>Tindak Lanjut Audit</a><li><a href='main.php'><i class='fa fa-home'></i></a></li><a class='current' href='main.php?method=finding_tl'>Temuan Audit</a><li><a href='main.php'><i class='fa fa-home'></i></a></li><a class='current' href='#'>Rekomendasi</a></li>";
		break;
	case "tindaklanjut" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Audit</a></li><li><a class='current' href='main.php?method=followupassign'>Tindak Lanjut Audit</a><li><a href='main.php'><i class='fa fa-home'></i></a></li><a class='current' href='main.php?method=finding_tl'>Temuan Audit</a><li><a href='main.php'><i class='fa fa-home'></i></a></li><a class='current' href='main.php?method=rekomendasi_tl'>Rekomendasi</a><li><a href='main.php'><i class='fa fa-home'></i></a></li><a class='current' href='#'>Tindak Lanjut</a></li>";
		break;
	case "matriks_tl" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Audit</a></li><li><a class='current' href='main.php?method=followupassign'>Tindak Lanjut Audit</a><li><a href='main.php'><i class='fa fa-home'></i></a></li><a class='current' href='main.php?method=matriks_tl'>Matriks Tindak Lanjut</a></li>";
		break;
	case "matrikstindaklanjut" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Audit</a></li><li><a class='current' href='main.php?method=followupassign'>Tindak Lanjut Audit</a><li><a href='main.php'><i class='fa fa-home'></i></a></li><a class='current' href='main.php?method=matriks_tl'>Matriks Tindak Lanjut</a><li><a href='main.php'><i class='fa fa-home'></i></a></li><a class='current' href='#'>Tindak Lanjut</a></li>";
		break;
	case "dashboardaudit":
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Audit</a></li><li><a class='current' href='main.php?method=dashboardaudit'>Dashboard Audit</a></li>";
		break;
	case "dashboard_audit_filter" :
	case "dashboard_audit" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Audit</a></li><li><a class='current' href='main.php?method=dashboardaudit'>Dashboard Audit</a></li><li><a class='current' href='main.php?method=dashboard_audit_filter'>Dashboard Audit</a></li>";
		break;
	case "dashboard_auditor_filter" :
	case "dashboard_auditor" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Audit</a></li><li><a class='current' href='main.php?method=dashboardaudit'>Dashboard Audit</a></li><li><a class='current' href='main.php?method=dashboard_auditor_filter'>Dashboard Auditor</a></li>";
		break;
	case "dashboard_temuan_filter" :
	case "dashboard_temuan" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Audit</a></li><li><a class='current' href='main.php?method=dashboardaudit'>Dashboard Audit</a></li><li><a class='current' href='main.php?method=dashboard_temuan_filter'>Dashboard Temuan</a></li>";
		break;
	// laporan
	case "laporan_monitoring_tl_filter" :
	case "laporan_monitoring_tl" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Audit</a></li><li><a class='current' href='main.php?method=reportaudit'>Pelaporan Audit</a></li><li><a class='current' href='main.php?method=laporan_monitoring_tl_filter'>Laporan Monitoring Tindak LAnjut</a></li>";
		break;
	case "risk_report" :
	case "risk_fil_report" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Risiko</a></li><li><a class='current' href='main.php?method=risk_fil_report'>Pelaporan Risiko</a></li>";
		break;
	case "reportaudit" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Audit</a></li><li><a class='current' href='main.php?method=reportaudit'>Pelaporan Audit</a></li>";
		break;
	case "rekap_surat_tugas_filter" :
	case "rekap_surat_tugas" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Audit</a></li><li><a class='current' href='main.php?method=reportaudit'>Pelaporan Audit</a></li><li><a class='current' href='main.php?method=rekap_surat_tugas_filter'>Rekap Surat Tugas</a></li>";
		break;
	case "laporan_rekap_perencanaan_filter" :
	case "laporan_rekap_perencanaan" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Audit</a></li><li><a class='current' href='main.php?method=reportaudit'>Pelaporan Audit</a></li><li><a class='current' href='main.php?method=laporan_rekap_perencanaan_filter'>Rekap Perencanaan</a></li>";
		break;
	case "laporan_program_audit_filter" :
	case "laporan_program_audit" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Audit</a></li><li><a class='current' href='main.php?method=reportaudit'>Pelaporan Audit</a></li><li><a class='current' href='main.php?method=laporan_program_audit_filter'>Laporan Audit Program</a></li>";
		break;
	case "laporan_kka_filter" :
	case "laporan_kka" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Audit</a></li><li><a class='current' href='main.php?method=reportaudit'>Pelaporan Audit</a></li><li><a class='current' href='main.php?method=laporan_kka_filter'>Laporan Kertas Kerja Audit</a></li>";
		break;
	case "laporan_temuan_filter" :
	case "laporan_temuan" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Audit</a></li><li><a class='current' href='main.php?method=reportaudit'>Pelaporan Audit</a></li><li><a class='current' href='main.php?method=laporan_temuan_filter'>Matriks Temuan</a></li>";
		break;
	case "laporan_lha_filter" :
	case "laporan_lha" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Audit</a></li><li><a class='current' href='main.php?method=reportaudit'>Pelaporan Audit</a></li><li><a class='current' href='main.php?method=laporan_lha_filter'>Laporan Hasil Audit</a></li>";
		break;
	// auditor management
	case "auditormgmt" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Menejemen Pegawai</a></li><li><a class='current' href='#'>Pegawai</a></li>";
		break;
	case "auditor_detil" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Menejemen Pegawai</a></li><li><a class='current' href='main.php?method=auditormgmt'>Pegawai</a></li><li><a class='current' href='#'>Rincian Pegawai</a></li>";
		break;
	// auditee management
	case "auditeemgmt" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Auditee</a></li><li><a class='current' href='#'>Satuan Kerja</a></li>";
		break;
	case "auditee_detil" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Satuan Kerja</a></li><li><a class='current' href='main.php?method=auditeemgmt'>Satuan Kerja</a> <li><a href='main.php'><i class='fa fa-home'></i></a></li><a class='current' href='#'>Rincian Satuan Kerja</a></li>";
		break;
	// parameter management
	case "par_risk_main" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='#'>Parameter Risiko</a></li>";
		break;
	case "par_risk_kategori" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='main.php?method=par_risk_main'>Parameter Risiko</a></li><li><a class='current' href='#'>Parameter Kategori Risiko</a></li>";
		break;
	case "par_risk_selera" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='main.php?method=par_risk_main'>Parameter Risiko</a></li><li><a class='current' href='#'>Parameter Selera Risiko</a></li>";
		break;
	case "par_risk_tk" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='main.php?method=par_risk_main'>Parameter Risiko</a></li><li><a class='current' href='#'>Parameter Tingkat Kemungkinan</a></li>";
		break;
	case "par_risk_td" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='main.php?method=par_risk_main'>Parameter Risiko</a></li><li><a class='current' href='#'>Parameter Tingkat Dampak</a></li>";
		break;
	case "par_risk_ri" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='main.php?method=par_risk_main'>Parameter Risiko</a></li><li><a class='current' href='#'>Parameter Risiko Inhern</a></li>";
		break;
	case "par_risk_rr" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='main.php?method=par_risk_main'>Parameter Risiko</a></li><li><a class='current' href='#'>Parameter Risiko Residu</a></li>";
		break;
	case "par_risk_peng_int" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='main.php?method=par_risk_main'>Parameter Risiko</a></li><li><a class='current' href='#'>Parameter Pengendalian Internal</a></li>";
		break;
	case "par_risk_matrix_residu" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='main.php?method=par_risk_main'>Parameter Risiko</a></li><li><a class='current' href='#'>Parameter Matriks TIngkat Risiko Residu</a></li>";
		break;
	case "par_risk_penanganan" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='main.php?method=par_risk_main'>Parameter Risiko</a></li><li><a class='current' href='#'>Parameter Penanganan Risiko</a></li>";
		break;
	case "par_profil" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='main.php?method=par_risk_main'>Parameter Risiko</a></li><li><a class='current' href='#'>Parameter Profil Risiko</a></li>";
		break;
	case "par_audit_main" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='#'>Parameter Audit</a></li>";
		break;
	case "par_audit_type" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='main.php?method=par_audit_main'>Parameter Audit</a></li><li><a class='current' href='#'>Parameter Tipe Audit</a></li>";
		break;
	case "par_subaudit_type" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='main.php?method=par_audit_main'>Parameter Audit</a></li><li><a class='current' href='#'>Parameter Sub Tipe Audit</a></li>";
		break;
	case "par_temuan_type" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='main.php?method=par_audit_main'>Parameter Audit</a></li><li><a class='current' href='#'>Parameter Kelompok Temuan</a></li>";
		break;
	case "par_sub_type" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='main.php?method=par_audit_main'>Parameter Audit</a></li><li><a class='current' href='#'>Parameter Sub Kelompok Temuan</a></li>";
		break;
	case "par_jenis_temuan" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='main.php?method=par_audit_main'>Parameter Audit</a></li><li><a class='current' href='#'>Parameter Jenis Temuan</a></li>";
		break;
	case "par_kode_rek" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='main.php?method=par_audit_main'>Parameter Audit</a></li><li><a class='current' href='#'>Parameter Kode Rekomendasi</a></li>";
		break;
	case "par_holiday" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='main.php?method=par_audit_main'>Parameter Audit</a></li><li><a class='current' href='#'>Parameter Hari Libur</a></li>";
		break;
	case "par_gambar" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='main.php?method=par_audit_main'>Parameter Audit</a></li><li><a class='current' href='#'>Parameter Gambar Dashboard</a></li>";
		break;
	case "par_posisi_penugasan" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='main.php?method=par_audit_main'>Parameter Audit</a></li><li><a class='current' href='#'>Parameter Posisi Penugasan</a></li>";
		break;
	case "par_sbu" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='main.php?method=par_audit_main'>Manajemen Anggaran</a></li><li><a class='current' href='#'>SBU</a></li>";
		break;
	case "par_sbu_rinci" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='main.php?method=par_audit_main'>Manajemen Anggaran</a></li><li><a class='current' href='#'>SBU Rinci</a></li>";
		break;
	case "par_aspek" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='main.php?method=par_audit_main'>Parameter Audit</a></li><li><a class='current' href='#'>Parameter Aspek Program Audit</a></li>";
		break;
	case "par_kategori_ref" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='main.php?method=par_audit_main'>Parameter Audit</a></li><li><a class='current' href='#'>Parameter Referensi Audit</a></li>";
		break;
	case "par_status_tl" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='main.php?method=par_audit_main'>Parameter Audit</a></li><li><a class='current' href='#'>Parameter Status Tindak Lanjut</a></li>";
		break;
	case "par_kode_penyebab" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='main.php?method=par_audit_main'>Parameter Audit</a></li><li><a class='current' href='#'>Parameter Kode Penyebab Temuan</a></li>";
		break;
	case "par_auditor_main" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='#'>Parameter Pegawai</a></li>";
		break;
	case "par_kompetensi" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='main.php?method=par_auditor_main'>Parameter Pegawai</a></li><li><a class='current' href='#'>Parameter Jenis Pelatihan</a></li>";
		break;
	case "par_inspektorat" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='main.php?method=par_auditor_main'>Parameter Pegawai</a></li><li><a class='current' href='#'>Parameter Inspektorat</a></li>";
		break;
	case "par_pangkat" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='main.php?method=par_auditor_main'>Parameter Pegawai</a></li><li><a class='current' href='#'>Parameter Golongan/Pangkat Pegawai</a></li>";
		break;
	case "par_tipe_jabatan" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='main.php?method=par_auditor_main'>Parameter Pegawai</a></li><li><a class='current' href='#'>Parameter Jenis Jabatan</a></li>";
		break;
	case "par_auditee_main" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='#'>Parameter Satuan Kerja</a></li>";
		break;
	case "par_propinsi" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='main.php?method=par_auditee_main'>Parameter Satuan Kerja</a></li><li><a class='current' href='#'>Parameter Propinsi</a></li>";
		break;
	case "par_kabupaten" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='main.php?method=par_auditee_main'>Parameter Satuan Kerja</a></li><li><a class='current' href='#'>Parameter Kabupaten/Kota</a></li>";
		break;
	case "par_esselon" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='main.php?method=par_auditee_main'>Parameter Satuan Kerja</a></li><li><a class='current' href='#'>Parameter Unit Eselon I</a></li>";
		break;
	case "par_jabatan" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='main.php?method=par_auditee_main'>Parameter Satuan Kerja</a></li><li><a class='current' href='#'>Parameter Jabatan PIC</a></li>";
		break;
	case "par_email" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Parameter</a></li><li><a class='current' href='main.php?method=par_email'>Parameter Email</a></li>";
		break;
	// pustaka management
	case "ref_program" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Pustaka Audit</a></li><li><a class='current' href='main.php?method=ref_program'>Program Audit</a></li>";
		break;
	case "ref_audit" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Pustaka Audit</a></li><li><a class='current' href='main.php?method=ref_audit'>Referensi Audit</a></li>";
		break;
	
	// user management
	case "usermgmt" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Pengguna</a></li><li><a class='current' href='#'>Pengguna</a></li>";
		break;
	case "par_group" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Pengguna</a></li><li><a class='current' href='#'>Group</a></li>";
		break;
	case "backuprestore" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Pengguna</a></li><li><a class='current' href='#'>Backup Dan Restore Database</a></li>";
		break;
	case "log_aktifitas" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Manajemen Pengguna</a></li><li><a class='current' href='#'>Log Aktifitas</a></li>";
		break;
	case "change_pass" :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Ubah Password</a></li>";
		break;
	
	default :
		echo "<li><a href='main.php'><i class='fa fa-home'></i></a></li> <li><a class='current' href='#'>Dashboard</a></li>";
		break;
    endswitch;
?>
        </ol>
    </div>
</header>