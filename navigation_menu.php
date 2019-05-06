<?
switch ($method) {
	// coba pelanggan
	case "risk_result" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Coba Pelanggan</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Coba Pelanggan</a>";
	// audit management
	case "risk_result" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Manajemen Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Profil Risiko</a>";
		break;
	case "auditplan" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Manajemen Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Perencanaan Audit</a>";
		break;
	case "anggota_plan" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Manajemen Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=auditplan'>Perencanaan Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Susunan Tim</a>";
		break;
	case "followupassign" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Manajemen Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=followupassign'>Tindak Lanjut Audit</a>";
		break;
	case "auditassign" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Manajemen Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=auditassign'>Pelaksanaan Audit</a>";
		break;
	case "anggota_assign" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Manajemen Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=auditassign'>Pelaksanaan Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Susunan Tim</a>";
		break;
	case "surattugas" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Manajemen Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=auditassign'>Pelaksanaan Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Surat Tugas</a>";
		break;
	case "programaudit" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Manajemen Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=auditassign'>Pelaksanaan Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=programaudit'>Program Audit</a>";
		break;
	case "kertas_kerja" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Manajemen Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=auditassign'>Pelaksanaan Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=programaudit'>Program Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Kertas Kerja</a>";
		break;
	case "finding_kka" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Manajemen Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=auditassign'>Pelaksanaan Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=programaudit'>Program Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=kertas_kerja'>Kertas Kerja</a><div class='breadcrumb_divider'></div><a class='current' href='#'>Temuan Audit</a>";
		break;
	case "rekomendasi" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Manajemen Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=auditassign'>Pelaksanaan Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=programaudit'>Program Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=kertas_kerja'>Kertas Kerja</a><div class='breadcrumb_divider'></div><a class='current' href='main.php?method=finding_kka'>Temuan Audit</a> <div class='breadcrumb_divider'></div> <a class='current' href='#'>Rekomendasi Temuan</a>";
		break;
	case "finding_tl" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Manajemen Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=followupassign'>Tindak Lanjut Audit</a><div class='breadcrumb_divider'></div><a class='current' href='#'>Temuan Audit</a>";
		break;
	case "rekomendasi_tl" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Manajemen Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=followupassign'>Tindak Lanjut Audit</a><div class='breadcrumb_divider'></div><a class='current' href='main.php?method=finding_tl'>Temuan Audit</a><div class='breadcrumb_divider'></div><a class='current' href='#'>Rekomendasi</a>";
		break;
	case "tindaklanjut" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Manajemen Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=followupassign'>Tindak Lanjut Audit</a><div class='breadcrumb_divider'></div><a class='current' href='main.php?method=finding_tl'>Temuan Audit</a><div class='breadcrumb_divider'></div><a class='current' href='main.php?method=rekomendasi_tl'>Rekomendasi</a><div class='breadcrumb_divider'></div><a class='current' href='#'>Tindak Lanjut</a>";
		break;
	case "matriks_tl" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Manajemen Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=followupassign'>Tindak Lanjut Audit</a><div class='breadcrumb_divider'></div><a class='current' href='main.php?method=matriks_tl'>Matriks Tindak Lanjut</a>";
		break;
	case "matrikstindaklanjut" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Manajemen Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=followupassign'>Tindak Lanjut Audit</a><div class='breadcrumb_divider'></div><a class='current' href='main.php?method=matriks_tl'>Matriks Tindak Lanjut</a><div class='breadcrumb_divider'></div><a class='current' href='#'>Tindak Lanjut</a>";
		break;
	case "dashboardaudit":
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Manajemen Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=dashboardaudit'>Dashboard Audit</a>";
		break;
	case "dashboard_audit_filter" :
	case "dashboard_audit" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Manajemen Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=dashboardaudit'>Dashboard Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=dashboard_audit_filter'>Dashboard Audit</a>";
		break;
	case "dashboard_auditor_filter" :
	case "dashboard_auditor" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Manajemen Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=dashboardaudit'>Dashboard Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=dashboard_auditor_filter'>Dashboard Auditor</a>";
		break;
	case "dashboard_temuan_filter" :
	case "dashboard_temuan" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Manajemen Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=dashboardaudit'>Dashboard Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=dashboard_temuan_filter'>Dashboard Temuan</a>";
		break;
	// laporan
	case "laporan_monitoring_tl_filter" :
	case "laporan_monitoring_tl" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Manajemen Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=reportaudit'>Pelaporan Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=laporan_monitoring_tl_filter'>Laporan Monitoring Tindak LAnjut</a>";
		break;
	case "risk_report" :
	case "risk_fil_report" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Manajemen Risiko</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=risk_fil_report'>Pelaporan Risiko</a>";
		break;
	case "reportaudit" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Manajemen Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=reportaudit'>Pelaporan Audit</a>";
		break;
	case "rekap_surat_tugas_filter" :
	case "rekap_surat_tugas" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Manajemen Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=reportaudit'>Pelaporan Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=rekap_surat_tugas_filter'>Rekap Surat Tugas</a>";
		break;
	case "laporan_rekap_perencanaan_filter" :
	case "laporan_rekap_perencanaan" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Manajemen Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=reportaudit'>Pelaporan Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=laporan_rekap_perencanaan_filter'>Rekap Perencanaan</a>";
		break;
	case "laporan_program_audit_filter" :
	case "laporan_program_audit" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Manajemen Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=reportaudit'>Pelaporan Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=laporan_program_audit_filter'>Laporan Audit Program</a>";
		break;
	case "laporan_kka_filter" :
	case "laporan_kka" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Manajemen Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=reportaudit'>Pelaporan Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=laporan_kka_filter'>Laporan Kertas Kerja Audit</a>";
		break;
	case "laporan_temuan_filter" :
	case "laporan_temuan" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Manajemen Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=reportaudit'>Pelaporan Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=laporan_temuan_filter'>Matriks Temuan</a>";
		break;
	case "laporan_lha_filter" :
	case "laporan_lha" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Manajemen Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=reportaudit'>Pelaporan Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=laporan_lha_filter'>Laporan Hasil Audit</a>";
		break;
	// auditor management
	case "auditormgmt" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Menejemen Pegawai</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Pegawai</a>";
		break;
	case "auditor_detil" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Menejemen Pegawai</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=auditormgmt'>Pegawai</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Rincian Pegawai</a>";
		break;
	// auditee management
	case "auditeemgmt" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Manajemen Auditee</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Satuan Kerja</a>";
		break;
	case "auditee_detil" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Manajemen Satuan Kerja</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=auditeemgmt'>Satuan Kerja</a> <div class='breadcrumb_divider'></div><a class='current' href='#'>Rincian Satuan Kerja</a>";
		break;
	// parameter management
	case "par_risk_main" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter Risiko</a>";
		break;
	case "par_risk_kategori" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=par_risk_main'>Parameter Risiko</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter Kategori Risiko</a>";
		break;
	case "par_risk_selera" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=par_risk_main'>Parameter Risiko</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter Selera Risiko</a>";
		break;
	case "par_risk_tk" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=par_risk_main'>Parameter Risiko</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter Tingkat Kemungkinan</a>";
		break;
	case "par_risk_td" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=par_risk_main'>Parameter Risiko</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter Tingkat Dampak</a>";
		break;
	case "par_risk_ri" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=par_risk_main'>Parameter Risiko</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter Risiko Inhern</a>";
		break;
	case "par_risk_rr" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=par_risk_main'>Parameter Risiko</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter Risiko Residu</a>";
		break;
	case "par_risk_peng_int" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=par_risk_main'>Parameter Risiko</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter Pengendalian Internal</a>";
		break;
	case "par_risk_matrix_residu" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=par_risk_main'>Parameter Risiko</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter Matriks TIngkat Risiko Residu</a>";
		break;
	case "par_risk_penanganan" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=par_risk_main'>Parameter Risiko</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter Penanganan Risiko</a>";
		break;
	case "par_profil" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=par_risk_main'>Parameter Risiko</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter Profil Risiko</a>";
		break;
	case "par_audit_main" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter Audit</a>";
		break;
	case "par_audit_type" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=par_audit_main'>Parameter Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter Tipe Audit</a>";
		break;
	case "par_subaudit_type" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=par_audit_main'>Parameter Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter Sub Tipe Audit</a>";
		break;
	case "par_temuan_type" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=par_audit_main'>Parameter Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter Kelompok Temuan</a>";
		break;
	case "par_sub_type" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=par_audit_main'>Parameter Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter Sub Kelompok Temuan</a>";
		break;
	case "par_jenis_temuan" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=par_audit_main'>Parameter Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter Jenis Temuan</a>";
		break;
	case "par_kode_rek" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=par_audit_main'>Parameter Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter Kode Rekomendasi</a>";
		break;
	case "par_holiday" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=par_audit_main'>Parameter Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter Hari Libur</a>";
		break;
	case "par_gambar" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=par_audit_main'>Parameter Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter Gambar Dashboard</a>";
		break;
	case "par_posisi_penugasan" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=par_audit_main'>Parameter Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter Posisi Penugasan</a>";
		break;
	case "par_sbu" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=par_audit_main'>Manajemen Anggaran</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>SBU</a>";
		break;
	case "par_sbu_rinci" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=par_audit_main'>Manajemen Anggaran</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>SBU Rinci</a>";
		break;
	case "par_aspek" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=par_audit_main'>Parameter Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter Aspek Program Audit</a>";
		break;
	case "par_kategori_ref" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=par_audit_main'>Parameter Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter Referensi Audit</a>";
		break;
	case "par_status_tl" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=par_audit_main'>Parameter Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter Status Tindak Lanjut</a>";
		break;
	case "par_kode_penyebab" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=par_audit_main'>Parameter Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter Kode Penyebab Temuan</a>";
		break;
	case "par_auditor_main" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter Pegawai</a>";
		break;
	case "par_kompetensi" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=par_auditor_main'>Parameter Pegawai</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter Jenis Pelatihan</a>";
		break;
	case "par_inspektorat" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=par_auditor_main'>Parameter Pegawai</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter Inspektorat</a>";
		break;
	case "par_pangkat" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=par_auditor_main'>Parameter Pegawai</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter Golongan/Pangkat Pegawai</a>";
		break;
	case "par_tipe_jabatan" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=par_auditor_main'>Parameter Pegawai</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter Jenis Jabatan</a>";
		break;
	case "par_auditee_main" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter Satuan Kerja</a>";
		break;
	case "par_propinsi" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=par_auditee_main'>Parameter Satuan Kerja</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter Propinsi</a>";
		break;
	case "par_kabupaten" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=par_auditee_main'>Parameter Satuan Kerja</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter Kabupaten/Kota</a>";
		break;
	case "par_esselon" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=par_auditee_main'>Parameter Satuan Kerja</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter Unit Eselon I</a>";
		break;
	case "par_jabatan" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=par_auditee_main'>Parameter Satuan Kerja</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter Jabatan PIC</a>";
		break;
	case "par_email" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Parameter</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=par_email'>Parameter Email</a>";
		break;
	// pustaka management
	case "ref_program" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Pustaka Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=ref_program'>Program Audit</a>";
		break;
	case "ref_audit" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Pustaka Audit</a><div class='breadcrumb_divider'></div> <a class='current' href='main.php?method=ref_audit'>Referensi Audit</a>";
		break;
	
	// user management
	case "usermgmt" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Manajemen Pengguna</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Pengguna</a>";
		break;
	case "par_group" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Manajemen Pengguna</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Group</a>";
		break;
	case "backuprestore" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Manajemen Pengguna</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Backup Dan Restore Database</a>";
		break;
	case "log_aktifitas" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Manajemen Pengguna</a><div class='breadcrumb_divider'></div> <a class='current' href='#'>Log Aktifitas</a>";
		break;
	case "change_pass" :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Ubah Password</a>";
		break;
	
	default :
		echo "<div class='breadcrumb_divider'></div> <a class='current' href='#'>Dashboard</a>";
		break;
}
?>