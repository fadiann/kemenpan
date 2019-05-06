<?php
if (@$position == 1) {
	include_once "App/Config/Databases.php";
} else {
	include_once "../App/Config/Databases.php";
}
class auditee {
	var $_db;
	var $userId;
	function auditee($userId = "") {
		$this->_db = new Databases();
		$this->userId = $userId;
	}
	function uniq_id() {
		return $this->_db->uniqid ();
	}
	function auditee_count($base_on_id_eks="", $key_search, $val_search, $all_field) {
		$condition = "";
		if($base_on_id_eks!="") $condition = " and auditee.auditee_id = '".$base_on_id_eks."' ";
		
		$condition2 = "";
		if($val_search!=""){
			if($key_search!="") $condition2 = " and ".$key_search." like '%".$val_search."%' ";
			else {
				for($i=0;$i<count($all_field);$i++){
					$or = " or ";
					if($i==0) $or = "";
					$condition2 .= $or.$all_field[$i]." like '%".$val_search."%' ";
				}
				$condition2 = " and (".$condition2.")";
			}
		}
		
		$sql = "select count(*) FROM auditee
				left join auditee as parrent on auditee.auditee_parrent_id = parrent.auditee_id
				where auditee.auditee_del_st != 0 ".$condition.$condition2;
		$data = $this->_db->_dbquery ( $sql );
		$arr = $data->FetchRow ();
		return $arr [0];
	}
	
	// Untuk menampilkan data di listview
	function auditee_viewlist($base_on_id_eks="", $key_search, $val_search, $all_field, $offset, $num_row) {
		$condition = "";
		if($base_on_id_eks!="") $condition = " and auditee.auditee_id = '".$base_on_id_eks."' ";
		
		$condition2 = "";
		if($val_search!=""){
			if($key_search!="") $condition2 = " and ".$key_search." like '%".$val_search."%' ";
			else {
				for($i=0;$i<count($all_field);$i++){
					$or = " or ";
					if($i==0) $or = "";
					$condition2 .= $or.$all_field[$i]." like '%".$val_search."%' ";
				}
				$condition2 = " and (".$condition2.")";
			}
		}
		$sql = "select auditee.auditee_id, auditee.auditee_kode, auditee.auditee_name, parrent.auditee_name, auditee.auditee_email
				from auditee
				left join auditee as parrent on auditee.auditee_parrent_id = parrent.auditee_id
				where auditee.auditee_del_st != 0 ".$condition.$condition2." order by auditee.auditee_name LIMIT $offset, $num_row";  
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	function auidtee_cek_name($kode, $id = "") {
		$condition = "";
		if ($id != "")
			$condition = "and auditee_id != '".$id."' ";
		$sql = "select auditee_id, auditee_del_st FROM auditee where LCASE(auditee_kode) = '".strtolower ( $kode )."' ".$condition;
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	function auditee_data_viewlist($id = "") {
		$condition = "";
		if ($id != "")
			$condition = "and auditee.auditee_id = '".$id."' ";
		$sql = "select auditee.auditee_id, auditee.auditee_kode, auditee.auditee_name, auditee.auditee_parrent_id, auditee.auditee_inspektorat_id, auditee.auditee_propinsi_id, auditee.auditee_alamat, auditee.auditee_telp, auditee.auditee_fax, parrent.auditee_name as nama_parrent, inspektorat_name, propinsi_name, kabupaten_name, auditee.auditee_kabupaten_id, auditee.auditee_ext, auditee.auditee_email
				FROM auditee
				left join auditee as parrent on auditee.auditee_parrent_id = parrent.auditee_id
				left join par_inspektorat on auditee.auditee_inspektorat_id = inspektorat_id
				left join par_propinsi on auditee.auditee_propinsi_id = propinsi_id
				left join par_kabupaten on auditee.auditee_kabupaten_id = kabupaten_id
				where auditee.auditee_del_st = 1 ".$condition." order by auditee.auditee_name "; 
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	function auditee_add($kode, $name, $parrent_id, $inspektorat_id, $propinsi_id, $kabupaten_id, $alamat, $telp, $fax, $ext, $email) {
		$sql = "insert into auditee (auditee_id, auditee_kode, auditee_name, auditee_parrent_id, auditee_inspektorat_id, auditee_propinsi_id, auditee_kabupaten_id, auditee_alamat, auditee_telp, auditee_fax, auditee_ext, auditee_email, auditee_del_st) values ('".$this->uniq_id ()."','".$kode."','".$name."','".$parrent_id."','".$inspektorat_id."','".$propinsi_id."','".$kabupaten_id."','".$alamat."','".$telp."','".$fax."','".$ext."','".$email."','1')";
		$aksinyo = "Menambah Auditee ".$kode." - ".$name;
		$this->_db->_dbexecquery ( $sql, $this->userId, $aksinyo );
	}
	function auditee_edit($id, $kode, $name, $parrent_id, $inspektorat_id, $propinsi_id, $kabupaten_id, $alamat, $telp, $fax, $ext, $email) {
		$sql = "update auditee set auditee_kode = '".$kode."', auditee_name = '".$name."', auditee_parrent_id = '".$parrent_id."', auditee_inspektorat_id = '".$inspektorat_id."', auditee_propinsi_id = '".$propinsi_id."', auditee_kabupaten_id = '".$kabupaten_id."', auditee_alamat = '".$alamat."', auditee_telp = '".$telp."', auditee_fax = '".$fax."', auditee_ext = '".$ext."', auditee_email = '".$email."' where auditee_id = '".$id."' ";
		$aksinyo = "Mengubah Data Auditee dengan ID ".$id;
		$this->_db->_dbexecquery ( $sql, $this->userId, $aksinyo );
	}
	function auditee_delete($id) {
		$sql = "update auditee set auditee_del_st = '0' where auditee_id = '".$id."' ";
		$aksinyo = "Menghapus Auditee ID ".$id;
		$this->_db->_dbexecquery ( $sql, $this->userId, $aksinyo );
	}
	function auditee_update_del_to_add($id, $kode, $name, $parrent_id, $inspektorat_id, $propinsi_id, $kabupaten_id, $alamat, $telp, $fax, $ext, $email) {
		$sql = "update auditee set auditee_kode = '".$kode."', auditee_name = '".$name."', auditee_parrent_id = '".$parrent_id."', auditee_inspektorat_id = '".$inspektorat_id."', auditee_propinsi_id = '".$propinsi_id."', auditee_kabupaten_id = '".$kabupaten_id."', auditee_alamat = '".$alamat."', auditee_telp = '".$telp."', auditee_fax = '".$fax."', auditee_ext = '".$ext."', auditee_email = '".$email."', auditee_del_st = '1' where auditee_id = '".$id."' ";
		$aksinyo = "Menampilakan Kembali Auditee dengan ID ".$id;
		$this->_db->_dbexecquery ( $sql, $this->userId, $aksinyo );
	}
	function pic_auditee($auditee_id) {
		$sql = "select pic_id, pic_nip, pic_name, pic_jabatan_id, pic_email
				FROM auditee_pic 
				where pic_del_st = 1 and pic_auditee_id = '".$auditee_id."' ";
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
}
?>
