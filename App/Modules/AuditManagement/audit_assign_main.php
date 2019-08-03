<?
include_once "App/Classes/auditor_class.php";
include_once "App/Classes/auditee_class.php";
include_once "App/Classes/assignment_class.php";
include_once "App/Classes/program_audit_class.php";
include_once "App/Classes/finding_class.php";

$auditors = new auditor ( $ses_userId );
$auditees = new auditee ( $ses_userId );
$assigns = new assign ( $ses_userId );
$programaudits = new programaudit ( $ses_userId );
$findings = new finding ( $ses_userId );

@$_action = $Helper->replacetext ( $_REQUEST ["data_action"] );

if(isset($_POST["val_search"])){
	@session_start();
	$_SESSION['key_search'] = $Helper->replacetext($_POST["key_search"]);
	$_SESSION['val_search'] = $Helper->replacetext($_POST["val_search"]);
	$_SESSION['val_method'] = $method;
}

$key_search = @$_SESSION['key_search'];
$val_search = @$_SESSION['val_search'];
$val_method = @$_SESSION['val_method'];

if(@$method!=@$val_method){	
	$key_search = "";
	$val_search = "";
	$val_method = "";
}

$paging_request    = "main.php?method=auditassign";
$acc_page_request  = "audit_assign_acc.php";
$lha_page_request  = "hasil_audit.php";
$list_page_request = "audit_view.php";

unset ( $_SESSION ['ses_kka_id'] );

// ==== buat grid ===//
$num_row = 10;
@$str_page = $Helper->replacetext ( $_GET ['page'] );
if (isset ( $str_page )) {
	if (is_numeric ( $str_page ) && $str_page != 0) {
		$noPage = $str_page;
	} else {
		$noPage = 1;
	}
} else {
	$noPage = 1;
}
$offset = ($noPage - 1) * $num_row;

$def_page_request = $paging_request . "&page=$noPage";
$grid = "App/Templates/Grids/grid_assign.php";
$gridHeader = array ("Nama Kegiatan", "Obyek Audit", "Tanggal Kegiatan", "Susunan Tim", "Status Surat Tugas", "Program Audit", "Status LHA");
$gridDetail = array ("8", "0", "1", "0", "3", "0" , "0");
$gridWidth = array ("15", "13", "10", "8", "10", "8", "10");

$key_by = array ("Nama Kegiatan");
$key_field = array ("assign_kegiatan");

$widthAksi  = "12";
$iconEdit   = "1";
$iconDel    = "1";
$iconDetail = "1";
// === end grid ===//
switch ($_action) {
	case "getajukan_penugasan" :
	case "getapprove_penugasan" :
		$_nextaction = "postkomentar";
		$page_request = $acc_page_request;
		$id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$status = $Helper->replacetext ( $_REQUEST ["status_penugasan"] );
		
		$rs = $assigns->assign_viewlist ( $id );
		$page_title = "Reviu Penugasan";
		break;
	case "postkomentar" :
		$id_assign  = $Helper->replacetext ( $_POST ["data_id"] );
		$status     = $Helper->replacetext ( $_POST ["status_penugasan"] );
		$fkomentar  = $Helper->replacetext ( $_POST ["komentar"] );
		$notif_date = $Helper->dateSql(date("d-m-Y"));
		$Helper->hapus_notif($id_assign);
		$group_menu_id = "";
		if ($status != "") {
			if($status=='1') { //ajukan
				$group_menu_id = '106';
			}elseif ($status=='4'){//tolak
				$group_menu_id = '105';
			}
			if($group_menu_id!=""){
				$rs_user_accept = $Helper->notif_user_all_bygroup($group_menu_id);
				while($arr_user_accept = $rs_user_accept->FetchRow()){
					$Helper->insert_notif($id_assign, $ses_userId, $arr_user_accept['user_id'], 'auditassign', "(Penugasan Audit) ".$fkomentar, $notif_date);
				}
			}
			$assigns->assign_update_status ( $id_assign, $status );
		}
		
		$ftanggal = $Helper->date_db ( date ( "d-m-Y H:i:s" ) );
		if ($fkomentar != "") {
			$assigns->assign_add_komentar ( $id_assign, $fkomentar, $ftanggal );
			$Helper->js_alert_act ( 3 );
		}
		// var_dump($_REQUEST);
		// die();
		echo "<script>window.open('".$def_page_request."', '_self');</script>";
		$page_request = "blank.php";
		break;
	case "getsurattugas" :
		$_SESSION ['ses_assign_id'] = $Helper->replacetext ( $_REQUEST ["data_id"] );
		?>
		<script>window.open('main.php?method=surattugas', '_self');</script>
		<?
		break;
	case "getlha" :
		$_nextaction  = "postlha";
		$page_request = $lha_page_request;
		$fdata_id     = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$get_id       = explode(":",$fdata_id );
		$assign_id    = $get_id[0];
		//$auditee_id   = $get_id[1];
		$laporan_id   = $assigns->cek_laporan($assign_id);
		$row_laporan	  = $assigns->ambil_laporan_for_edit($laporan_id);
		$page_title   = "Laporan Hasil Audit";
		break;
	case "anggota_assign" :
		$_SESSION ['ses_assign_id'] = $Helper->replacetext ( $_REQUEST ["data_id"] );
		?>
<script>window.open('main.php?method=anggota_assign', '_self');</script>
<?
		break;
	case "programaudit" :
		$_SESSION ['ses_assign_id'] = $Helper->replacetext ( $_REQUEST ["data_id"] );
		?>
<script>window.open('main.php?method=programaudit', '_self');</script>
<?
		break;
	case "getadd" :
		$_nextaction = "postadd";
		$page_request = $acc_page_request;
		$page_title = "Tambah Pelaksanaan Audit";
		break;
	case "getedit" :
		$_nextaction = "postedit";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $assigns->assign_viewlist ( $fdata_id );
		$page_title = "Ubah Pelaksanaan Audit";
		break;
	case "getdetail" :	
		$_nextaction = "";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $assigns->assign_viewlist ( $fdata_id );
		$page_title = "Rincian Pelaksanaan Audit";
		break;
	case "postlha" :
		// $fdata_id = $Helper->replacetext ( $_POST ["data_id"] );
		$flha_id = $Helper->replacetext ( $_POST ["lha_id"] );
		// $fno_lha = $Helper->replacetext ( $_POST ["no_lha"] );
		// $ftanggal_lha = $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_lha"] ) );
		// //bab 1
		// $fringkasan = $Helper->replacetext ( $_POST ["ringkasan"] );
		// //bab 2
		// $fdasar_audit = $Helper->replacetext ( $_POST ["dasar_audit"] );
		// $ftujuan_audit = $Helper->replacetext ( $_POST ["tujuan_audit"] );
		// $fruang_lingkup = $Helper->replacetext ( $_POST ["ruang_lingkup"] );
		// $fbatasan_tanggung_jawab = $Helper->replacetext ( $_POST ["batasan_tanggung_jawab"] );
		// $fmetodologi_audit = $Helper->replacetext ( $_POST ["metodologi_audit"] );
		// $fstrategi_laporan = $Helper->replacetext ( $_POST ["strategi_laporan"] );
		// $fdata_umum_auditan = $Helper->replacetext ( $_POST ["data_umum_auditan"] );
		// $fhasil_yang_dicapai = $Helper->replacetext ( $_POST ["hasil_yang_dicapai"] );
		// //bab 3
		// $fpenutup = $Helper->replacetext ( $_POST ["penutup"] );
		
		// $fstatus_lha = $Helper->replacetext ( $_POST ["status_lha"] );
		// $flampiran = $_FILES ["attach"] ["name"];
		
		// $rs_file = $assigns->list_lha_lampiran($fdata_id);
		// $z=0;
		// while($arr_file = $rs_file->FetchRow()){
		// $z++;
		// 	$nama_file = $Helper->replacetext ( @$_POST ["nama_file_".$z] );
		// 	$assigns->delete_lampiran_kka ($fdata_id, $nama_file);
		// 	$Helper->HapusFile ( "Upload_KKA", $nama_file);
		// }
		
		// $jml_attach = count( $flampiran );
		// if ($jml_attach <> 0) {
		// 	for($i=0;$i<$jml_attach;$i++){
		// 		if($flampiran[$i]!="") {
		// 			$Helper->UploadFileMulti ( "Upload_LHA", "attach");
		// 			$assigns->insert_lampiran_lha ( $fdata_id, $flampiran[$i] );
		// 		}
		// 	}
		// }
		// $assigns->assign_update_lha ( $fdata_id, $fno_lha, $ftanggal_lha);
		// $assigns->lha_update ( $fdata_id, $fno_lha, $ftanggal_lha, $fringkasan, $fdasar_audit, $ftujuan_audit, $fruang_lingkup, $fbatasan_tanggung_jawab, $fmetodologi_audit, $fstrategi_laporan, $fdata_umum_auditan, $fhasil_yang_dicapai, $fpenutup, $fstatus_lha);
					
		// $fkomentar = $Helper->replacetext ( $_POST ["komentar"] );
		// $finpektorat_id = $Helper->replacetext ( $_POST ["inpektorat_id"] );

		// $Helper->hapus_notif($flha_id);
		// if ($fstatus_lha != "") {
		// 	if($fstatus_lha==1){ 
		// 		$get_user_id = $assigns->get_user_by_posisi($fdata_id, '9e8e412b0bc5071b5d47e30e0507fe206bdf8dbd');
		// 		$notif_to_user_id = $get_user_id; //ke dalnis
		// 	}elseif($fstatus_lha==2){ 
		// 		$get_user_id = $assigns->get_user_by_posisi($fdata_id, '1fe7f8b8d0d94d54685cbf6c2483308aebe96229');
		// 		$notif_to_user_id = $get_user_id; //ke daltu
		// 	}elseif($fstatus_lha==3){ 
		// 		//inpektorat
		// 	}elseif($fstatus_lha==4){ //penugasan selesai
		// 		$assigns->assign_update_status ( $id, 3 );
		// 	}elseif($fstatus_lha==5){ 
		// 		$get_user_id = $assigns->get_user_by_posisi($fdata_id, '8918ca5378a1475cd0fa5491b8dcf3d70c0caba7');
		// 		$notif_to_user_id = $get_user_id; //ke katim
		// 	}elseif($fstatus_lha==6){ 
		// 		$get_user_id = $assigns->get_user_by_posisi($fdata_id, '9e8e412b0bc5071b5d47e30e0507fe206bdf8dbd');
		// 		$notif_to_user_id = $get_user_id; //ke dalnis
		// 	}elseif($fstatus_lha==7){ 
		// 		$get_user_id = $assigns->get_user_by_posisi($fdata_id, '1fe7f8b8d0d94d54685cbf6c2483308aebe96229');
		// 		$notif_to_user_id = $get_user_id; //ke daltu
		// 	}
		// 	if($notif_to_user_id!=""){
		// 		$Helper->insert_notif($flha_id, $ses_userId, $notif_to_user_id, 'auditassign', '(LHA)...'.$fkomentar, $Helper->date_db(date('d-m-Y')));
		// 	}
		// }
		// $ftanggal = $Helper->date_db ( date ( "d-m-Y H:i:s" ) );
		// if ($fkomentar != "") {
		// 	$assigns->lha_add_komentar ( $flha_id, $fkomentar, $ftanggal );
		// }
		// 'ringkasan' => string '<p>1</p>
		// ' (length=10)
		//   'dasar' => string '<p>2</p>
		// ' (length=10)
		//   'tujuan' => string '<p>3</p>
		// ' (length=10)
		//   'ruang' => string '<p>4</p>
		// ' (length=10)
		//   'metodologi' => string '<p>5</p>
		// ' (length=10)
		//   'uraian' => string '<p>6</p>
		// ' (length=10)
		//   'rekomendasi' => string '<p>7</p>
		// ' (length=10)
		//   'lainlain' => string '<p>8</p>
		// ' (length=10)
		//   'apresiasi' => string '<p>9</p>
		// ' (length=10)
		//   'status_lha' => string '' (length=0)
		$id 		 = $Helper->unixid();
		$fdata_id    = $Helper->filterCk ( $_POST ["data_id"] );
		$laporan_id    = $Helper->filterCk ( $_POST ["laporan_id"] );
		$ringkasan   = $Helper->filterCk ( $_POST ["ringkasan"] );
		$dasar       = $Helper->filterCk ( $_POST ["dasar"] );
		$tujuan      = $Helper->filterCk ( $_POST ["tujuan"] );
		$ruang       = $Helper->filterCk ( $_POST ["ruang"] );
		$metodologi  = $Helper->filterCk ( $_POST ["metodologi"] );
		$uraian      = $Helper->filterCk ( $_POST ["uraian"] );
		$rekomendasi = $Helper->filterCk ( $_POST ["rekomendasi"] );
		$lainlain    = $Helper->filterCk ( $_POST ["lainlain"] );
		$apresiasi   = $Helper->filterCk ( $_POST ["apresiasi"] );
		$status_lha  = $Helper->filterCk ( $_POST ["status_lha"] );
		$assigns->update_laporan($laporan_id, $ringkasan, $dasar, $tujuan, $ruang, $metodologi, $uraian, $rekomendasi, $lainlain, $apresiasi, $status_lha);
		$assigns->update_status_laporan($flha_id, $status_lha);
		// var_dump($_POST);
		// die();
		// var_dump($flha_id);
		// die();
		$Helper->js_alert_act ( 3 );
		echo "<script>window.open('".$def_page_request."&data_action=getlha&data_id=".$fdata_id."', '_self');</script>";
		$page_request = "blank.php";
		break;
	case "postadd" :
		$fkegiatan = $Helper->replacetext ( $_POST ["kegiatan"] );
		$ftipe_audit = $Helper->replacetext ( $_POST ["tipe_audit"] );
		$fauditee = $Helper->replacetext ( $_POST ["auditee"] );
		$ftahun = $Helper->replacetext ( $_POST ["tahun"] );
		$fperiode = $Helper->replacetext ( $_POST ["periode"] );
		$ftanggal_awal = $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_awal"] ) );
		$ftanggal_akhir = $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_akhir"] ) );
		$count_assign_date = (($ftanggal_akhir - $ftanggal_awal) / 86400) + 1;
		$count_weekend = $Helper->cek_holiday ( $ftanggal_awal, $ftanggal_akhir );
		$hari_kerja = $count_assign_date - $count_weekend;
		$fhari_persiapan = $Helper->replacetext ( $_POST ["hari_persiapan"] );
		$ftanggal_persiapan_awal = $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_persiapan_awal"] ) );
		$ftanggal_persiapan_akhir = $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_persiapan_akhir"] ) );
		$fhari_pelaksanaan = $Helper->replacetext ( $_POST ["hari_pelaksanaan"] );
		$ftanggal_pelaksanaan_awal = $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_pelaksanaan_awal"] ) );
		$ftanggal_pelaksanaan_akhir = $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_pelaksanaan_akhir"] ) );
		$fhari_pelaporan = $Helper->replacetext ( $_POST ["hari_pelaporan"] );
		$ftanggal_pelaporan_awal = $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_pelaporan_awal"] ) );
		$ftanggal_pelaporan_akhir = $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_pelaporan_akhir"] ) );
		$fdasar = $Helper->replacetext ( $_POST ["dasar"] );
		$fpendanaan = $Helper->replacetext ( $_POST ["pendanaan"] );
		$fketerangan = $Helper->replacetext ( $_POST ["keterangan"] );
		$fpedahuluan = $Helper->replacetext ( $_POST ["pedahuluan"] );
		$ftujuan = $Helper->replacetext ( $_POST ["tujuan"] );
		$finstruksi = $Helper->replacetext ( $_POST ["instruksi"] );
		$ex_auditee = explode ( ",", $fauditee );
		$cek_auditee = count ( $ex_auditee );
		
		$fassign_attach = $Helper->replacetext ( $_FILES ["assign_attach"] ["name"] );
		
		if ($ftipe_audit != "" && $ftahun != "" && $ftanggal_akhir != "" && $cek_auditee != "0") {
			$id_assign = $assigns->uniq_id ();
			$assigns->assign_add ( $id_assign, $ftipe_audit, $ftahun, $ftanggal_awal, $ftanggal_akhir, $fdasar, $hari_kerja, $fperiode, $fkegiatan, $fhari_persiapan, $fhari_pelaksanaan, $fhari_pelaporan, $fpendanaan, $fketerangan, $fassign_attach, $ftanggal_persiapan_awal, $ftanggal_persiapan_akhir, $ftanggal_pelaksanaan_awal, $ftanggal_pelaksanaan_akhir, $ftanggal_pelaporan_awal, $ftanggal_pelaporan_akhir, $fpedahuluan, $ftujuan, $finstruksi );
			for($i = 0; $i < $cek_auditee; $i ++) {
				$assigns->assign_add_auditee ( $id_assign, $ex_auditee [$i] );
			}
			$Helper->UploadFile ( "Upload_Audit", "assign_attach", "" );
			$Helper->js_alert_act ( 3 );
		} else {
			$Helper->js_alert_act ( 5 );
		}
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	case "postedit" :
		$fdata_id = $Helper->replacetext ( $_POST ["data_id"] );
		$fkegiatan = $Helper->replacetext ( $_POST ["kegiatan"] );
		$ftipe_audit = $Helper->replacetext ( $_POST ["tipe_audit"] );
		$fauditee = $Helper->replacetext ( $_POST ["auditee"] );
		$ftahun = $Helper->replacetext ( $_POST ["tahun"] );
		$fperiode = $Helper->replacetext ( $_POST ["periode"] );
		$ftanggal_awal = $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_awal"] ) );
		$ftanggal_akhir = $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_akhir"] ) );
		$count_assign_date = (($ftanggal_akhir - $ftanggal_awal) / 86400) + 1;
		$count_weekend = $Helper->cek_holiday ( $ftanggal_awal, $ftanggal_akhir );
		$hari_kerja = $count_assign_date - $count_weekend;
		$fhari_persiapan = $Helper->replacetext ( $_POST ["hari_persiapan"] );
		$ftanggal_persiapan_awal = $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_persiapan_awal"] ) );
		$ftanggal_persiapan_akhir = $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_persiapan_akhir"] ) );
		$fhari_pelaksanaan = $Helper->replacetext ( $_POST ["hari_pelaksanaan"] );
		$ftanggal_pelaksanaan_awal = $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_pelaksanaan_awal"] ) );
		$ftanggal_pelaksanaan_akhir = $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_pelaksanaan_akhir"] ) );
		$fhari_pelaporan = $Helper->replacetext ( $_POST ["hari_pelaporan"] );
		$ftanggal_pelaporan_awal = $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_pelaporan_awal"] ) );
		$ftanggal_pelaporan_akhir = $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_pelaporan_akhir"] ) );
		$fdasar = $Helper->replacetext ( $_POST ["dasar"] );
		$fpendanaan = $Helper->replacetext ( $_POST ["pendanaan"] );
		$fketerangan = $Helper->replacetext ( $_POST ["keterangan"] );
		$fpedahuluan = $Helper->replacetext ( $_POST ["pedahuluan"] );
		$ftujuan = $Helper->replacetext ( $_POST ["tujuan"] );
		$finstruksi = $Helper->replacetext ( $_POST ["instruksi"] );
		$ex_auditee = explode ( ",", $fauditee );
		$cek_auditee = count ( $ex_auditee );
		
		$fassign_attach = $Helper->replacetext ( $_FILES ["assign_attach"] ["name"] );
		$fassign_attach_old = $Helper->replacetext ( $_POST ["assign_attach_old"] );
		
		if ($ftipe_audit != "" && $ftahun != "" && $ftanggal_akhir != "" && $cek_auditee != "0") {
			$assigns->assign_del_auditee ( $fdata_id );
			if (! empty ( $fassign_attach )) {
				$Helper->UploadFile ( "Upload_Audit", "assign_attach", $fassign_attach_old );
			} else {
				$fassign_attach = $fassign_attach_old;
			}
			$assigns->assign_edit ( $fdata_id, $ftipe_audit, $ftahun, $ftanggal_awal, $ftanggal_akhir, $fdasar, $hari_kerja, $fperiode, $fkegiatan, $fhari_persiapan, $fhari_pelaksanaan, $fhari_pelaporan, $fpendanaan, $fketerangan, $fassign_attach, $ftanggal_persiapan_awal, $ftanggal_persiapan_akhir, $ftanggal_pelaksanaan_awal, $ftanggal_pelaksanaan_akhir, $ftanggal_pelaporan_awal, $ftanggal_pelaporan_akhir, $fpedahuluan, $ftujuan, $finstruksi );
			for($i = 0; $i < $cek_auditee; $i ++) {
				$assigns->assign_add_auditee ( $fdata_id, $ex_auditee [$i] );
			}
			$Helper->js_alert_act ( 1 );
		} else {
			$Helper->js_alert_act ( 5 );
		}
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	case "getdelete" :
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$assigns->assign_delete ( $fdata_id );
		$Helper->hapus_notif($fdata_id);
		$Helper->js_alert_act ( 2 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	default :
		$recordcount = $assigns->assign_count ($base_on_id_int, $key_search, $val_search, $key_field);
		$rs = $assigns->assign_view_grid ( $base_on_id_int, $key_search, $val_search, $key_field, $offset, $num_row );
		$page_title = "Daftar Pelaksanaan Audit";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
