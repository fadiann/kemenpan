<?php
if (@$position == 1) {
	include_once "App/Config/Databases.php";
} elseif (@$position == 2) {
	include_once "../../Config/Databases.php";
} else {
	include_once "../App/Config/Databases.php";
}
class risk {
	var $db;
	var $userId;
	function __construct($userId = "") {
		$this->db = new Databases();
		$this->userId = $userId;
	}
	function uniq_id() {
		return $this->db->uniqid ();
	}
	
	// penetapan tujuan
	function penetapan_count($FROM = "", $base_on_id_eks="", $key_search, $val_search, $all_field) {
		$condition = "";
		$condition2 = "";
		if ($base_on_id_eks == '0') $base_on_id_eks = "";

		if ($FROM == 'Audit') $condition .= " and penetapan_status = '2' ";
		if ($base_on_id_eks != '') $condition .= " and auditee_id = '".$base_on_id_eks."' ";
		
		if($val_search!=""){
			if($key_search!="") $condition2 .= " and ".$key_search." like '%".$val_search."%' ";
			else {
				for($i=0;$i<count($all_field);$i++){
					$or = " or ";
					if($i==0) $or = "";
					$condition2 .= $or.$all_field[$i]." like '%".$val_search."%' ";
				}
				$condition2 = " and (".$condition2.")";
			}
		}
		
		$sql = "SELECT count(*) FROM risk_penetapan
				LEFT JOIN auditee on penetapan_auditee_id = auditee_id
				WHERE 1=1 " . $condition.$condition2;
		$data = $this->db->_dbquery ( $sql );
		$arr = $data->FetchRow ();
		return $arr [0];
	}
	function penetapan_view_grid($FROM = "", $offset, $num_row, $base_on_id_eks="", $key_search, $val_search, $all_field) {
		$condition = "";
		$condition2 = "";
		if ($base_on_id_eks == '0') $base_on_id_eks = "";

		if ($FROM == 'Audit') $condition .= " and penetapan_status = '2' ";
		if ($base_on_id_eks != '') $condition .= " and auditee_id = '".$base_on_id_eks."' ";
		
		if($val_search!=""){
			if($key_search!="") $condition2 .= " and ".$key_search." like '%".$val_search."%' ";
			else {
				for($i=0;$i<count($all_field);$i++){
					$or = " or ";
					if($i==0) $or = "";
					$condition2 .= $or.$all_field[$i]." like '%".$val_search."%' ";
				}
				$condition2 = " and (".$condition2.")";
			}
		}
		
		$sql = "SELECT penetapan_id, auditee_name, penetapan_tahun, penetapan_nama, penetapan_tujuan, penetapan_profil_risk, penetapan_profil_risk_residu, penetapan_status
				FROM risk_penetapan
				LEFT JOIN auditee on penetapan_auditee_id = auditee_id
				WHERE 1=1 " . $condition . $condition2. "
				LIMIT $offset, $num_row";
		$data = $this->db->_dbquery ( $sql );
		return $data;
	}
	function penetapan_data_viewlist($id) {
		$sql = "SELECT penetapan_id, penetapan_auditee_id, penetapan_tahun, penetapan_nama, penetapan_tujuan, auditee_kode, 
				auditee_name, penetapan_profil_risk, penetapan_profil_risk_residu, case penetapan_status when '1' then 'Sedang Di Reviu' when '2' then 'Di Setujui' when '3' then 'Di Tolak' else 'Belum Diajukan' end as penetapan_status_name, penetapan_status
				FROM risk_penetapan 
				LEFT JOIN auditee on penetapan_auditee_id = auditee_id
				WHERE penetapan_id = '" . $id . "' ";
		$data = $this->db->_dbquery ( $sql );
		return $data;
	}
	function penetapan_data() {
		$sql = "SELECT penetapan_id, penetapan_auditee_id, penetapan_tahun, penetapan_nama, penetapan_tujuan, auditee_kode, 
				auditee_name, penetapan_profil_risk, penetapan_profil_risk_residu, case penetapan_status when '1' then 'Sedang Di Reviu' when '2' then 'Di Setujui' when '3' then 'Di Tolak' else 'Belum Diajukan' end as penetapan_status_name, penetapan_status
				FROM risk_penetapan 
				LEFT JOIN auditee on penetapan_auditee_id = auditee_id";
		$data = $this->db->_dbquery ( $sql );
		return $data;
	}
	function penetapan_add($auditee, $tahun, $nama, $tujuan) {
		$sql = "insert into risk_penetapan (penetapan_id, penetapan_auditee_id, penetapan_tahun, penetapan_nama, penetapan_tujuan) 
				values 
				('" . $this->uniq_id () . "','" . $auditee . "','" . $tahun . "','" . $nama . "','" . $tujuan . "')";
		$aksinyo = "Menambah Penetapan Risiko " . $nama;
		$this->db->_dbexecquery ( $sql, $this->userId, $aksinyo );
	}
	function penetapan_edit($id, $auditee, $tahun, $nama, $tujuan) {
		$sql = "update risk_penetapan set 
				penetapan_auditee_id = '" . $auditee . "', penetapan_tahun = '" . $tahun . "', penetapan_nama = '" . $nama . "', penetapan_tujuan = '" . $tujuan . "'  
				WHERE penetapan_id = '" . $id . "' ";
		$aksinyo = "Mengubah Penetapan Risiko ID " . $id;
		$this->db->_dbexecquery ( $sql, $this->userId, $aksinyo );
	}
	function penetapan_delete($id) {
		$sql = "DELETE FROM risk_penetapan WHERE penetapan_id = '" . $id . "' ";
		$aksinyo = "Menghapus Penetapan Risiko ID " . $id;
		$this->db->_dbexecquery ( $sql, $this->userId, $aksinyo );
	}
	function update_status_risiko($id, $status) {
		$sql = "update risk_penetapan set 
				penetapan_status = '" . $status . "'  
				WHERE penetapan_id = '" . $id . "' ";
		$aksinyo = "Mengupdate status penetapan Risiko ID " . $id . "menjadi" . $status;
		$this->db->_dbquery ( $sql, $this->userId, $aksinyo );
	}
	function cek_satker_tahun($id_satker, $tahun, $id="") {
		$condition = "";
		if ($id != "") $condition = " and penetapan_id != '".$id."' ";
		$sql = "SELECT count(*) FROM risk_penetapan WHERE penetapan_auditee_id = '".$id_satker."' and penetapan_tahun = '".$tahun."' ".$condition;
		$data = $this->db->_dbquery ( $sql );
		$arr = $data->FetchRow ();
		return $arr [0];
	}
	function risk_add_komentar($id, $komentar, $tanggal) {
		$sql = "insert into risk_penetapan_comment 
				(penetapan_comment_id, penetapan_comment_penetapan_id, penetapan_comment_user_id, penetapan_comment_desc, penetapan_comment_date) 
				values
				('" . $this->uniq_id () . "','" . $id . "','" . $this->userId . "','" . $komentar . "','" . $tanggal . "')";
		$aksinyo = "Mengomentari Penetapan dengan ID " . $id;
		$this->db->_dbexecquery ( $sql, $this->userId, $aksinyo );
	}
	function risk_komentar_viewlist($id) {
		$sql = "SELECT pic_name, penetapan_comment_desc, penetapan_comment_date
				FROM risk_penetapan_comment
				LEFT JOIN user_apps on penetapan_comment_user_id = user_id
				LEFT JOIN auditee_pic on user_id_ekternal = pic_id
				WHERE penetapan_comment_penetapan_id = '" . $id . "' order by penetapan_comment_date ASC";
		$data = $this->db->_dbquery ( $sql );
		return $data;
	}
	// end penetapan tujuan

	// identifikasi
	function identifikasi_count($penetapan_id, $key_search, $val_search, $all_field)
	{
		$condition = "";
		if ($val_search != "") {
			if ($key_search != "") $condition = " and " . $key_search . " like '%" . $val_search . "%' ";
			else {
				for ($i = 0; $i < count($all_field); $i++) {
					$or = " or ";
					if ($i == 0) $or = "";
					$condition .= $or . $all_field[$i] . " like '%" . $val_search . "%' ";
				}
				$condition = " and (" . $condition . ")";
			}
		}
		$sql = "SELECT count(*) FROM risk_identifikasi
				LEFT JOIN risk_penetapan on identifikasi_penetapan_id = penetapan_id
				LEFT JOIN par_risk_kategori on identifikasi_kategori_id = risk_kategori_id
				WHERE identifikasi_penetapan_id = '" . $penetapan_id . "' " . $condition;
		$data = $this->db->_dbquery($sql);
		$arr = $data->FetchRow();
		return $arr[0];
	}
	function identifikasi_view_grid($penetapan_id, $key_search, $val_search, $all_field, $offset, $num_row)
	{
		$condition = "";
		if ($val_search != "") {
			if ($key_search != "") $condition = " and " . $key_search . " like '%" . $val_search . "%' ";
			else {
				for ($i = 0; $i < count($all_field); $i++) {
					$or = " or ";
					if ($i == 0) $or = "";
					$condition .= $or . $all_field[$i] . " like '%" . $val_search . "%' ";
				}
				$condition = " and (" . $condition . ")";
			}
		}
		$sql = "SELECT identifikasi_id, identifikasi_no_risiko, identifikasi_selera, identifikasi_nama_risiko, risk_kategori, identifikasi_penyebab, identifikasi_selera, penetapan_status
				FROM risk_identifikasi
				LEFT JOIN risk_penetapan on identifikasi_penetapan_id = penetapan_id
				LEFT JOIN par_risk_kategori on identifikasi_kategori_id = risk_kategori_id
				WHERE identifikasi_penetapan_id = '" . $penetapan_id . "' " . $condition . "
				LIMIT $offset, $num_row";
		$data = $this->db->_dbquery($sql);
		return $data;
	}
	function get_identifikasi_detail_byKolom($identifikasi_id, $kolom)
	{
		$sql = "SELECT risk_identifikasi_detail.`indikator_kinerja`, risk_identifikasi_detail.`kategori_risiko`, 
				risk_identifikasi_detail.`kejadian_risiko`, risk_identifikasi_detail.`penyebab_risiko`, risk_identifikasi_detail.`dampak_risiko`,
				par_risk_kategori.`risk_kategori` FROM risk_identifikasi_detail 
				INNER JOIN par_risk_kategori ON risk_identifikasi_detail.`kategori_risiko` = par_risk_kategori.`risk_kategori_id`
				WHERE risk_identifikasi_detail.`identifikasi_id` = '$identifikasi_id'";
		$data = $this->db->_dbquery($sql);
		$a 	  = 0;
		$html = "";
		while($row = $data->fetchRow()){
			$a++;
			$html .= $a.". ".$row[$kolom]."</br>";
		}
		return $html;
	}
	function get_identifikasi_detail_byId($identifikasi_id)
	{
		$sql = "SELECT risk_identifikasi_detail.`identifikasi_detail_id`, risk_identifikasi_detail.`identifikasi_id`, risk_identifikasi_detail.`indikator_kinerja`, risk_identifikasi_detail.`kategori_risiko`, 
				risk_identifikasi_detail.`kejadian_risiko`, risk_identifikasi_detail.`penyebab_risiko`, risk_identifikasi_detail.`dampak_risiko`,
				par_risk_kategori.`risk_kategori` FROM risk_identifikasi_detail 
				INNER JOIN par_risk_kategori ON risk_identifikasi_detail.`kategori_risiko` = par_risk_kategori.`risk_kategori_id`
				WHERE risk_identifikasi_detail.`identifikasi_id` = '$identifikasi_id'";
		$data = $this->db->_dbquery($sql);
		return $data;
	}
	function cek_identifikasi($id)
	{
		$sql = "SELECT COUNT(*) FROM risk_identifikasi_detail 
				INNER JOIN par_risk_kategori ON risk_identifikasi_detail.`kategori_risiko` = par_risk_kategori.`risk_kategori_id`
				WHERE risk_identifikasi_detail.`identifikasi_id` = '$id'";
		$data = $this->db->_dbquery($sql)->fetchRow();
		return $data[0];
	}

	//benturan kepentingan	
	function benturan_kepentingan_count($key_search, $val_search, $all_field, $base_on_id_eks="")
	{
		$condition = "";
		if ($base_on_id_eks == '') $base_on_id_eks = "0";
		if ($base_on_id_eks != '0') $condition .= " and user_id = '".$base_on_id_eks."' ";

		if ($val_search != "") {
			if ($key_search != "") $condition = " and " . $key_search . " like '%" . $val_search . "%' ";
			else {
				for ($i = 0; $i < count($all_field); $i++) {
					$or = " or ";
					if ($i == 0) $or = "";
					$condition .= $or . $all_field[$i] . " like '%" . $val_search . "%' ";
				}
				$condition = " and (" . $condition . ")";
			}
		}
		$sql = "SELECT count(*) FROM benturan_kepentingan
				WHERE 1=1 " . $condition;
		$data = $this->db->_dbquery($sql);
		$arr = $data->FetchRow();
		return $arr[0];
	}
	function benturan_kepentingan_view_grid($key_search, $val_search, $all_field, $offset, $num_row, $base_on_id_eks="")
	{
		$condition = "";
		if ($base_on_id_eks == '0') $base_on_id_eks = "0";
		if ($base_on_id_eks != '0') $condition .= " and user_id = '".$base_on_id_eks."' ";

		if ($val_search != "") {
			if ($key_search != "") $condition = " and " . $key_search . " like '%" . $val_search . "%' ";
			else {
				for ($i = 0; $i < count($all_field); $i++) {
					$or = " or ";
					if ($i == 0) $or = "";
					$condition .= $or . $all_field[$i] . " like '%" . $val_search . "%' ";
				}
				$condition = " and (" . $condition . ")";
			}
		}
		$sql = "SELECT benturan_kepentingan.*, auditee.auditee_name, auditee.auditee_id FROM benturan_kepentingan 
				LEFT JOIN auditee ON auditee.auditee_id = benturan_kepentingan.auditee_id
				WHERE 1=1 ". $condition . "
				LIMIT $offset, $num_row";
		$data = $this->db->_dbquery($sql);
		//echo $sql;
		return $data;
	}
	function benturan_kepentingan_viewById($id)
	{
		$sql = "SELECT * FROM benturan_kepentingan WHERE benturan_kepentingan_id = '".$id."'";
		$data = $this->db->_dbquery($sql);
		return $data;
	}
	function benturan_kepentingan_add($data)
	{
		$sql = "INSERT INTO benturan_kepentingan VALUES (?, ?, ?, ?, ?, ?, ?)";
		//echo $sql;
		$this->db->bind($sql, $data);
	}
	function benturan_kepentingan_edit($data)
	{
		$sql = "UPDATE benturan_kepentingan SET uraian = ?, pelaku = ?, rencana_aksi = ?, tahun = ? WHERE benturan_kepentingan_id = ?";
		$this->db->bind($sql, $data);
	}
	function benturan_kepentingan_report($tahun, $auditee_id)
	{
		$sql = "SELECT * FROM benturan_kepentingan WHERE tahun = '".$tahun."' and auditee_id = '$auditee_id'";
		$data = $this->db->_dbquery($sql);
		return $data;
	}
	function get_auditee_byId($auditee_id)
	{
		$sql = "SELECT * FROM auditee WHERE auditee_id = '$auditee_id'";
		$data = $this->db->_dbquery($sql);
		return $data;
	}

	//end benturan kepentingan

	// function identifikasi_data_viewlist($id) {
	// 	$sql = "SELECT risk_identifikasi.identifikasi_id, identifikasi_selera, identifikasi_no_risiko, 
	// 			identifikasi_nama_risiko, identifikasi_kategori_id, identifikasi_penyebab, identifikasi_selera, monitoring_action, monitoring_date, monitoring_plan_action, monitoring_tenggat_waktu, indikator_kinerja
	// 			FROM risk_identifikasi LEFT JOIN risk_identifikasi_detail 
	// 			ON risk_identifikasi.identifikasi_id = risk_identifikasi_detail.identifikasi_id
	// 			WHERE risk_identifikasi.identifikasi_id = '" . $id . "' ";
	// 	$data = $this->db->_dbquery ( $sql );
	// 	//echo $sql;
	// 	return $data;
	// }
	function identifikasi_data_viewlist($id) {
		$sql = "SELECT risk_identifikasi_sasaran.identifikasi_sasaran, risk_identifikasi_sasaran.identifikasi_sasaran_id, 
		risk_identifikasi_indikator.identifikasi_indikator_name, risk_identifikasi_indikator.identifikasi_indikator_id, 
		risk_identifikasi.identifikasi_kategori_id, risk_identifikasi.identifikasi_no_risiko, risk_identifikasi.identifikasi_nama_risiko, risk_identifikasi.identifikasi_penyebab, risk_identifikasi.identifikasi_dampak , risk_identifikasi.identifikasi_id
		FROM risk_identifikasi INNER JOIN risk_identifikasi_indikator 
		ON risk_identifikasi.identifikasi_selera = risk_identifikasi_indikator.identifikasi_indikator_id INNER JOIN risk_identifikasi_sasaran 
		ON risk_identifikasi_sasaran.identifikasi_sasaran_id = risk_identifikasi_indikator.identifikasi_sasaran_id
				WHERE risk_identifikasi.identifikasi_id = '" . $id . "' ";
		$data = $this->db->_dbquery ( $sql );
		//echo $sql;
		return $data;
	}

	function identifikasi_add($penetapan_id, $id, $nomor, $nama, $kategori, $penyebab, $dampak) {
		$sql = "insert into risk_identifikasi (identifikasi_id, identifikasi_selera, identifikasi_penetapan_id, identifikasi_no_risiko, identifikasi_nama_risiko, identifikasi_kategori_id, identifikasi_penyebab, identifikasi_dampak)
				values
				('" . $this->uniq_id() . "','" . $id . "','" . $penetapan_id . "','" . $nomor . "','" . $nama . "','" . $kategori . "','" . $penyebab . "','" . $dampak . "')";
		$aksinyo = "Menambah Identifikasi Risiko id " . $this->uniq_id();
		//echo $sql;
		$this->db->_dbexecquery ( $sql, $this->userId, $aksinyo );
	}
	function indikator_view_bySasaran($id) {
		$sql = "SELECT * FROM risk_identifikasi_indikator WHERE risk_identifikasi_indikator.identifikasi_sasaran_id = '" . $id . "' "; //selera digunakan sebagai id sasaran
		$data = $this->db->_dbquery ( $sql );
		//echo $sql;
		return $data;
	}
	function identifikasi_view_byIndikator($id) {
		$sql = "SELECT risk_identifikasi.identifikasi_kategori_id, risk_identifikasi.identifikasi_no_risiko, 
		risk_identifikasi.identifikasi_nama_risiko, risk_identifikasi.identifikasi_penyebab, risk_identifikasi.identifikasi_dampak, 
		risk_identifikasi.identifikasi_id, par_risk_kategori.risk_kategori, analisa_ri, penanganan_plan, penanganan_risiko_id FROM risk_identifikasi 
		INNER JOIN par_risk_kategori ON risk_identifikasi.identifikasi_kategori_id = par_risk_kategori.risk_kategori_id 
		WHERE risk_identifikasi.identifikasi_selera = '" . $id . "' "; //selera digunakan sebagai id sasaran
		$data = $this->db->_dbquery ( $sql );
		//echo $sql;
		return $data;
	}
	function identifikasi_view_byId($id) {
		$sql = "SELECT risk_identifikasi.identifikasi_kategori_id, risk_identifikasi.identifikasi_no_risiko, risk_identifikasi.identifikasi_nama_risiko, risk_identifikasi.identifikasi_penyebab, risk_identifikasi.identifikasi_dampak , risk_identifikasi.identifikasi_id, par_risk_kategori.risk_kategori FROM risk_identifikasi INNER JOIN 
		risk_identifikasi.identifikasi_kategori_id = par_risk_kategori.risk_kategori_id
		WHERE risk_identifikasi.identifikasi_id = '" . $id . "' "; //selera digunakan sebagai id sasaran
		$data = $this->db->_dbquery ( $sql );
		//echo $sql;
		return $data;
	}
	function rowspanSasaran($id) {
		$sql = "SELECT COUNT(*) FROM risk_identifikasi 
				INNER JOIN risk_identifikasi_indikator 
				ON risk_identifikasi_indikator.identifikasi_indikator_id = risk_identifikasi.identifikasi_selera 
				INNER JOIN risk_identifikasi_sasaran 
				ON risk_identifikasi_sasaran.identifikasi_sasaran_id =  risk_identifikasi_indikator.identifikasi_sasaran_id
				WHERE risk_identifikasi_sasaran.identifikasi_sasaran_id = '" . $id . "' "; //selera digunakan sebagai id sasaran
		$data = $this->db->_dbquery($sql)->FetchRow();
		//echo $sql;
		return $data[0];
	}
	function cek_jumlah_indikator($id) {
		$sql = "SELECT COUNT(*) FROM risk_identifikasi_indikator 
				INNER JOIN risk_identifikasi_sasaran 
				ON risk_identifikasi_sasaran.identifikasi_sasaran_id =  risk_identifikasi_indikator.identifikasi_sasaran_id
				WHERE risk_identifikasi_indikator.identifikasi_sasaran_id = '" . $id . "' "; //selera digunakan sebagai id sasaran
		$data = $this->db->_dbquery($sql)->FetchRow();
		//echo $sql;
		return $data[0];
	}
	function rowspanIndikator($id) {
		$sql = "SELECT COUNT(*) FROM risk_identifikasi 
				INNER JOIN risk_identifikasi_indikator 
				ON risk_identifikasi_indikator.identifikasi_indikator_id = risk_identifikasi.identifikasi_selera 
				INNER JOIN risk_identifikasi_sasaran 
				ON risk_identifikasi_sasaran.identifikasi_sasaran_id =  risk_identifikasi_indikator.identifikasi_sasaran_id
				WHERE risk_identifikasi_indikator.identifikasi_indikator_id = '" . $id . "' "; //selera digunakan sebagai id sasaran
		$data = $this->db->_dbquery($sql)->FetchRow();
		//echo $sql;
		return $data[0];
	}

	function identifikasi_sasaran_add($id_sasaran, $id_identifikasi, $ses_penetapan_id, $sasaran) {
		$sql = "insert into risk_identifikasi_sasaran (identifikasi_sasaran_id, identifikasi_id, identifikasi_penetapan_id, identifikasi_sasaran)
				values ('".$id_sasaran."','" . $id_identifikasi . "','" . $ses_penetapan_id . "','" . $sasaran . "')";
		$this->db->_dbquery($sql);
	}
	function identifikasi_indikator_add($id_indikator, $ses_penetapan_id, $id_sasaran, $indikator) {
		$sql = "INSERT INTO risk_identifikasi_indikator (identifikasi_indikator_id, identifikasi_penetapan_id, identifikasi_sasaran_id, identifikasi_indikator_name) values ('".$id_indikator."', '".$ses_penetapan_id."', '" . $id_sasaran . "','" . $indikator . "')";
		//echo $sql;
		//die();
		$this->db->_dbquery($sql);
	}
	function identifikasi_sasaran_viewlist($id) {
		$sql = "SELECT * FROM risk_identifikasi_sasaran LEFT JOIN `risk_identifikasi_indikator` 
		ON risk_identifikasi_sasaran.identifikasi_sasaran_id = risk_identifikasi_indikator.identifikasi_sasaran_id WHERE risk_identifikasi_sasaran.identifikasi_penetapan_id = '" . $id . "' GROUP BY risk_identifikasi_sasaran.identifikasi_sasaran_id ORDER BY risk_identifikasi_indikator.identifikasi_sasaran_id DESC ";
		//echo $sql;
		$data = $this->db->_dbquery ( $sql );
		//echo $sql;
		return $data;
	}
	
	function identifikasi_edit($id, $nama, $kategori, $penyebab, $dampak) {
		$sql = "update risk_identifikasi set
				identifikasi_nama_risiko = '" . $nama . "', identifikasi_kategori_id = '" . $kategori . "', identifikasi_penyebab = '" . $penyebab . "', identifikasi_dampak = '" . $dampak . "'
				WHERE identifikasi_id = '" . $id . "' ";
		$aksinyo = "Mengubah Identifikasi Risiko ID " . $id;
		$this->db->_dbexecquery ( $sql, $this->userId, $aksinyo );
	}
	function identifikasi_detail_edit($data){
		$sql = "UPDATE risk_identifikasi_detail SET sasaran_organisasi = ?, indikator_kinerja = ? WHERE identifikasi_id = ?";
		//echo $sql;
		$this->db->bind($sql, $data);
	}
	function identifikasi_delete($id) {
		$sql = "DELETE FROM risk_identifikasi WHERE identifikasi_id = '" . $id . "' ";
		$aksinyo = "Menghapus Identifikasi Risiko ID " . $id;
		//echo $sql;
		$this->db->_dbexecquery ( $sql, $this->userId, $aksinyo );
	}
	function identifikasi_detail_delete($id) {
		$sql = "DELETE FROM risk_identifikasi_detail WHERE identifikasi_detail_id = '" . $id . "' ";
		$this->db->_dbquery($sql);
		//echo $sql;
		return 0;
	}

	public function identifikasi_get_detail($risk_id)
	{
		$sql = "SELECT 
				WHERE risk_identifikasi_detail.identifikasi_id = '" . $risk_id . "' ";
		$data = $this->db->_dbquery ( $sql );
		//echo $sql;
		return $data;
	}

	function get_count_identifikasi($penetapan_id) {
		$sql = "SELECT max(right(identifikasi_no_risiko,3)) as count_no_risiko FROM risk_identifikasi 
				WHERE identifikasi_penetapan_id = '" . $penetapan_id . "' ";
		$data = $this->db->_dbquery ( $sql );
		$arr = $data->FetchRow ();
		return $arr [0] + 1;
	}
	function reset_data_risk($ipenetapan) {
		$sql = "update risk_penetapan set
				penetapan_profil_risk = '', penetapan_profil_risk_residu = ''
				WHERE penetapan_id = '" . $ipenetapan . "' ";
		$this->db->_dbquery ( $sql );
	}
	// end identifikasi
	
	// analisa
	function list_identifikasi($id_kategori, $id_Penetapan, $monitoring="") {
		$condition = "";
		if($monitoring!="") $condition = " and risk_penanganan_status = '1' ";
		$sql = "SELECT risk_identifikasi.identifikasi_id, risk_kategori, identifikasi_no_risiko, identifikasi_nama_risiko, identifikasi_penyebab, identifikasi_selera, 
				analisa_bobot_kat_risk, analisa_ri, analisa_bobot_risk, analisa_kemungkinan, analisa_kemungkinan_name, analisa_dampak, analisa_dampak_name, analisa_nilai_ri,
				evaluasi_risiko_residu, evaluasi_komponen, evaluasi_efektifitas, evaluasi_risiko_residu, evaluasi_efektifitas_name, evaluasi_risiko_residu_name,
				penanganan_risiko_id, penanganan_plan, penanganan_date, penanganan_pic_id, risk_penanganan_jenis, pic_name,
				penetapan_auditee_id,
				monitoring_action, monitoring_date, monitoring_plan_action, monitoring_tenggat_waktu, identifikasi_selera, indikator_kinerja, risk_identifikasi.identifikasi_dampak
				FROM risk_identifikasi
				LEFT JOIN risk_penetapan on identifikasi_penetapan_id = penetapan_id
				LEFT JOIN par_risk_kategori on identifikasi_kategori_id = risk_kategori_id
				LEFT JOIN par_risk_penanganan on penanganan_risiko_id = risk_penanganan_id
				LEFT JOIN auditee_pic on penanganan_pic_id = pic_id
				LEFT JOIN risk_identifikasi_detail ON risk_identifikasi.identifikasi_id = risk_identifikasi_detail.identifikasi_id 
				WHERE identifikasi_penetapan_id = '" . $id_Penetapan . "' and identifikasi_kategori_id = '" . $id_kategori . "' ".$condition."  order by risk_kategori, identifikasi_selera";
				//echo $sql;
		$data = $this->db->_dbquery ( $sql );
		return $data;
	}
	function list_identifikasi_by_kat($id_Penetapan) {
		$sql = "SELECT identifikasi_kategori_id
				FROM risk_identifikasi
				WHERE identifikasi_penetapan_id = '" . $id_Penetapan . "' group by identifikasi_kategori_id";
		$data = $this->db->_dbquery ( $sql );
		return $data;
	}
	function sum_nilai_ri_by_kat($id_kategori, $id_Penetapan) {
		$sql = "SELECT sum(analisa_nilai_ri) as sum_nilai_ri, sum(analisa_bobot_kat_risk) as sum_bobot_kat
				FROM risk_identifikasi
				WHERE identifikasi_penetapan_id = '" . $id_Penetapan . "' and identifikasi_kategori_id = '" . $id_kategori . "' ";
		$data = $this->db->_dbquery ( $sql );
		return $data;
	}
	function cek_range_ri($value) {
		$sql = "SELECT ri_name, ri_value FROM par_risk_ri WHERE ri_atas >= '" . $value . "' and  ri_bawah <= '" . $value . "' ";
		$data = $this->db->_dbquery ( $sql );
		return $data;
	}
	function update_analisa($id, $tk, $td, $ri, $tk_name, $td_name, $ri_name, $bobot_ri, $nilai_ri, $bobot_kat_ri) {
		$sql = "update risk_identifikasi set
				analisa_kemungkinan = '" . $tk . "', analisa_dampak = '" . $td . "', analisa_ri = '" . $ri . "', 
				analisa_kemungkinan_name = '" . $tk_name . "', analisa_dampak_name = '" . $td_name . "', analisa_ri_name = '" . $ri_name . "', 
				analisa_bobot_risk  = '" . $bobot_ri . "', analisa_nilai_ri  = '" . $nilai_ri . "', analisa_bobot_kat_risk   = '" . $bobot_kat_ri . "'
				WHERE identifikasi_id = '" . $id . "' ";
		$this->db->_dbquery ( $sql );
	}
	function update_profil($id, $value) {
		$sql = "update risk_penetapan set
				penetapan_profil_risk = (SELECT ri_name FROM par_risk_ri WHERE ri_atas >= '" . $value . "' and  ri_bawah <= '" . $value . "' )
				WHERE penetapan_id = '" . $id . "' ";
		$this->db->_dbquery ( $sql );
	}
	function get_nama_risk($nama_table, $field_value, $field_name, $nilai) {
		$sql = "SELECT $field_name FROM $nama_table WHERE $field_value = '" . $nilai . "' "; // echo $sql;
		$rs = $this->db->_dbquery ( $sql );
		$arr = $rs->FetchRow ();
		return $arr [$field_name];
	}
	// end analisa
	
	// evaluasi
	function get_val_rr($value_ri, $value_pi) {
		$sql = "SELECT a.ri_value as nilai_ri
				FROM par_risk_matrix_residu
				LEFT JOIN par_risk_ri as a on matrix_residu_value = a.ri_id
				LEFT JOIN par_risk_ri as b on matrix_residu_ri_id = b.ri_id
				LEFT JOIN par_risk_pi on  matrix_residu_pi_id = pi_id
				WHERE b.ri_value = '" . $value_ri . "' and pi_value = '" . $value_pi . "' ";
		$rs = $this->db->_dbquery ( $sql );
		$arr = $rs->FetchRow ();
		return $arr ['nilai_ri'];
	}
	function sum_kategori_rr($id_kategori, $id_Penetapan) {
		$sql = "SELECT sum(analisa_bobot_risk * evaluasi_risiko_residu / 100 ) * sum(analisa_bobot_kat_risk) / 100 as profil_rr_kat
				FROM risk_identifikasi
				WHERE identifikasi_penetapan_id = '" . $id_Penetapan . "' and identifikasi_kategori_id = '" . $id_kategori . "' "; 
		$rs = $this->db->_dbquery ( $sql );
		$arr = $rs->FetchRow ();
		return $arr ['profil_rr_kat'];
	}
	function update_evaluasi($id, $komponen, $pi, $pi_name, $rr, $rr_name) {
		$sql = "update risk_identifikasi set
				evaluasi_komponen = '" . $komponen . "', evaluasi_efektifitas = '" . $pi . "', evaluasi_efektifitas_name = '" . $pi_name . "', evaluasi_risiko_residu = '" . $rr . "', evaluasi_risiko_residu_name = '" . $rr_name . "'
				WHERE identifikasi_id = '" . $id . "' ";
		$this->db->_dbquery ( $sql );
	}
	function cek_range_rr($value) {
		$sql = "SELECT rr_value FROM par_risk_rr WHERE rr_atas >= '" . $value . "' and  rr_bawah < '" . $value . "' ";
		$rs = $this->db->_dbquery ( $sql );
		$arr = $rs->FetchRow ();
		return $arr ['rr_value'];
	}
	function update_profil_rr($id, $profil_rr) {
		$sql = "update risk_penetapan set
				penetapan_profil_risk_residu = (SELECT rr_name FROM par_risk_rr WHERE rr_value = '" . $profil_rr . "')
				WHERE penetapan_id = '" . $id . "' ";
		$this->db->_dbquery ( $sql );
	}
	// end evaluasi
	
	// penanganan
	function update_penanganan($id, $pil_penanganan, $penanganan, $date, $pic_id) {
		$sql = "update risk_identifikasi set
				penanganan_risiko_id = '" . $pil_penanganan . "', penanganan_plan = '" . $penanganan . "', penanganan_date = '" . $date . "', penanganan_pic_id = '" . $pic_id . "'
				WHERE identifikasi_id = '" . $id . "' ";
				//echo $sql;
				//die();
		$this->db->_dbquery ( $sql );
	}
	function list_penanganan($id_penanganan, $id_penetapan) {
		$sql = "SELECT count(penanganan_risiko_id)
				FROM risk_identifikasi
				WHERE penanganan_risiko_id = '" . $id_penanganan . "' and identifikasi_penetapan_id = '" . $id_penetapan . "'";
		$data = $this->db->_dbquery ( $sql );
		$arr = $data->FetchRow ();
		return $arr [0];
	}
	function cek_status_penanganan($id_penanganan) {
		$sql = "SELECT risk_penanganan_status
				FROM par_risk_penanganan
				WHERE risk_penanganan_id = '" . $id_penanganan . "' ";
		$data = $this->db->_dbquery ( $sql );
		$arr = $data->FetchRow ();
		return $arr ['risk_penanganan_status'];
	}
	function cek_penanganan($id_penetapan) {
		$sql = "SELECT count(identifikasi_id)
				FROM risk_identifikasi
				WHERE identifikasi_penetapan_id = '" . $id_penetapan . "' and penanganan_risiko_id !='' ";
		$data = $this->db->_dbquery ( $sql );
		$arr = $data->FetchRow ();
		return $arr [0];
	}
	
	// end penanganan
	
	// monitoring
	function monitoring_count($penetapan_id, $key_search, $val_search, $all_field) {
		$condition = "";
		if($val_search!=""){
			if($key_search!="") $condition = " and ".$key_search." like '%".$val_search."%' ";
			else {
				for($i=0;$i<count($all_field);$i++){
					$or = " or ";
					if($i==0) $or = "";
					$condition .= $or.$all_field[$i]." like '%".$val_search."%' ";
				}
				$condition = " and (".$condition.")";
			}
		}
		$sql = "SELECT count(*) FROM risk_identifikasi
				LEFT JOIN par_risk_kategori on identifikasi_kategori_id = risk_kategori_id
				LEFT JOIN auditee_pic on penanganan_pic_id = pic_id
				LEFT JOIN par_risk_penanganan on penanganan_risiko_id = risk_penanganan_id
				WHERE identifikasi_penetapan_id = '" . $penetapan_id . "' and  	risk_penanganan_status = '1' ".$condition;
		$data = $this->db->_dbquery ( $sql );
		$arr = $data->FetchRow ();
		return $arr [0];
	}
	function monitoring_view_grid($penetapan_id, $key_search, $val_search, $all_field, $offset, $num_row) {
		$condition = "";
		if($val_search!=""){
			if($key_search!="") $condition = " and ".$key_search." like '%".$val_search."%' ";
			else {
				for($i=0;$i<count($all_field);$i++){
					$or = " or ";
					if($i==0) $or = "";
					$condition .= $or.$all_field[$i]." like '%".$val_search."%' ";
				}
				$condition = " and (".$condition.")";
			}
		}
		$sql = "SELECT identifikasi_id, risk_kategori, identifikasi_no_risiko, identifikasi_nama_risiko, evaluasi_risiko_residu_name, penanganan_plan, penanganan_date, pic_name, penetapan_status
				FROM risk_identifikasi
				LEFT JOIN risk_penetapan on identifikasi_penetapan_id = penetapan_id
				LEFT JOIN par_risk_kategori on identifikasi_kategori_id = risk_kategori_id
				LEFT JOIN auditee_pic on penanganan_pic_id = pic_id
				LEFT JOIN par_risk_penanganan on penanganan_risiko_id = risk_penanganan_id
				WHERE identifikasi_penetapan_id = '" . $penetapan_id . "' and risk_penanganan_status = '1' ".$condition."
				LIMIT $offset, $num_row";
		$data = $this->db->_dbquery ( $sql );
		return $data;
	}
	function monitoring_data_viewlist($id) {
		$sql = "SELECT identifikasi_id, identifikasi_no_risiko, identifikasi_nama_risiko, identifikasi_kategori_id, identifikasi_penyebab, identifikasi_selera,
				monitoring_action, monitoring_date, monitoring_plan_action, monitoring_tenggat_waktu, risk_kategori, evaluasi_risiko_residu, penanganan_plan, penanganan_date, pic_name
				FROM risk_identifikasi 
				LEFT JOIN risk_penetapan on identifikasi_penetapan_id = penetapan_id
				LEFT JOIN par_risk_kategori on identifikasi_kategori_id = risk_kategori_id
				LEFT JOIN auditee_pic on penanganan_pic_id = pic_id
				LEFT JOIN par_risk_penanganan on penanganan_risiko_id = risk_penanganan_id
				WHERE identifikasi_id = '" . $id . "' ";
		$data = $this->db->_dbquery ( $sql );
		return $data;
	}
	function update_monitoring($id, $penanganan_action, $pelaksanaan_date, $penanganan_plan, $tenggat_date) {
		$sql = "update risk_identifikasi set
				monitoring_action = '" . $penanganan_action . "', monitoring_date = '" . $pelaksanaan_date . "', monitoring_plan_action = '" . $penanganan_plan . "', monitoring_tenggat_waktu = '" . $tenggat_date . "'
				WHERE identifikasi_id = '" . $id . "' ";
		$this->db->_dbquery ( $sql );
	}
	function insert_attach_monitoring($id, $attach_name) {
		$sql = "insert into risk_identifikasi_attach (iden_attach_id_iden, iden_attach_name) values ('" . $id . "', '" . $attach_name . "')";
		$this->db->_dbquery ( $sql );
	}
	function list_risk_attach($id) {
		$sql = "SELECT iden_attach_name FROM risk_identifikasi_attach WHERE iden_attach_id_iden = '" . $id . "' ";
		$data = $this->db->_dbquery ( $sql );
		return $data;
	}
	// end monitoring
	
	//laporan
	function risk_tahun_viewlist(){
		$sql = "SELECT distinct(penetapan_tahun) FROM risk_penetapan WHERE penetapan_status = '2' ";
		$data = $this->db->_dbquery ( $sql );
		return $data;
	}
	function risk_auditee_viewlist($auditee_id=""){
		$condition = "";
		if($auditee_id!="") $condition = "and penetapan_auditee_id = '".$auditee_id."' ";
		$sql = "SELECT distinct penetapan_auditee_id, auditee_name FROM risk_penetapan
				LEFT JOIN auditee on penetapan_auditee_id = auditee_id
				WHERE penetapan_status = '2' ".$condition;
		$data = $this->db->_dbquery ( $sql );
		return $data;
	}
	//end laporan
	
	//result
	function update_status_pkat($id) {
		$sql = "update risk_penetapan set
				penetapan_set_pkat = '1'
				WHERE penetapan_id = '" . $id . "' ";
		$this->db->_dbquery ( $sql );
	}
	//end result

	public function get_auditee_by_idEks($id_eks)
	{
		$sql = "SELECT auditee_id FROM auditee INNER JOIN auditee_pic
		ON auditee.`auditee_id` = auditee_pic.`pic_auditee_id`
		WHERE auditee_pic.`pic_id` = '$id_eks'";
		$data = $this->db->_dbquery($sql)->FetchRow();
		return $data[0];
	}

	public function view_identifikasi($penetapan_id)
	{
		$sql  = "SELECT risk_identifikasi_sasaran.`identifikasi_sasaran_id`, 
				risk_identifikasi_sasaran.`identifikasi_sasaran`,
				risk_identifikasi_indikator.`identifikasi_indikator_name`, risk_identifikasi.`identifikasi_nama_risiko`,
				risk_identifikasi.`identifikasi_penyebab`, risk_identifikasi.`identifikasi_dampak`, par_risk_kategori.`risk_kategori`
				FROM risk_identifikasi_sasaran
				INNER JOIN risk_identifikasi_indikator ON risk_identifikasi_indikator.`identifikasi_sasaran_id` = risk_identifikasi_sasaran.`identifikasi_sasaran_id`
				INNER JOIN risk_identifikasi ON risk_identifikasi_indikator.`identifikasi_indikator_id` = risk_identifikasi.`identifikasi_selera`
				INNER JOIN par_risk_kategori ON	risk_identifikasi.`identifikasi_kategori_id` = par_risk_kategori.`risk_kategori_id` 
				WHERE risk_identifikasi_sasaran.`identifikasi_penetapan_id` = '$penetapan_id'";
		$data = $this->db->_dbquery($sql);
		return $data;
	}
	public function view_sasaran_by_penetapan($penetapan_id)
	{
		$sql  = "SELECT risk_identifikasi_sasaran.`identifikasi_sasaran_id`, 
				risk_identifikasi_sasaran.`identifikasi_sasaran` FROM risk_identifikasi_sasaran
				WHERE risk_identifikasi_sasaran.`identifikasi_penetapan_id` = '$penetapan_id'";
		$data = $this->db->_dbquery($sql);
		//echo $sql;
		return $data;
	}
	public function view_indikator_by_sasaran($sasaran_id)
	{
		$sql  = "SELECT risk_identifikasi_indikator.`identifikasi_indikator_id`, 
				risk_identifikasi_indikator.`identifikasi_indikator_name`
				FROM risk_identifikasi_indikator WHERE risk_identifikasi_indikator.`identifikasi_sasaran_id` = '$sasaran_id'";
		$data = $this->db->_dbquery($sql);
		//echo $sql;
		return $data;
	}
}
?>
