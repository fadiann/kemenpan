<?php
if (@$position == 1) {
    include_once "App/Config/Databases.php";
} else {
    include_once "../App/Config/Databases.php";
}
class tindaklanjut
{
    public $_db;
    public $userId;
    public function __construct($userId = "")
    {
        $this->_db = new Databases();
        $this->userId = $userId;
    }
    public function uniq_id()
    {
        return $this->_db->uniqid();
    }
    public function tindaklanjut_count($id_rekomendasi, $key_search, $val_search, $all_field)
    {
        $condition = "";
        if ($val_search!="") {
            if ($key_search!="") {
                $condition = " and ".$key_search." like '%".$val_search."%' ";
            } else {
                for ($i=0;$i<count($all_field);$i++) {
                    $or = " or ";
                    if ($i==0) {
                        $or = "";
                    }
                    $condition .= $or.$all_field[$i]." like '%".$val_search."%' ";
                }
                $condition = " and (".$condition.")";
            }
        }
        $sql = "select count(*) FROM tindaklanjut_internal
				where tl_rek_id = '" . $id_rekomendasi . "' ".$condition;
        $data = $this->_db->_dbquery($sql);
        $arr = $data->FetchRow();
        return $arr [0];
    }
    public function tindaklanjut_view_grid($id_rekomendasi, $key_search, $val_search, $all_field, $offset, $num_row)
    {
        $condition = "";
        if ($val_search!="") {
            if ($key_search!="") {
                $condition = " and ".$key_search." like '%".$val_search."%' ";
            } else {
                for ($i=0;$i<count($all_field);$i++) {
                    $or = " or ";
                    if ($i==0) {
                        $or = "";
                    }
                    $condition .= $or.$all_field[$i]." like '%".$val_search."%' ";
                }
                $condition = " and (".$condition.")";
            }
        }
        $sql = "select tl_id, tl_desc, tl_date, tl_status
				from tindaklanjut_internal
				where tl_rek_id = '" . $id_rekomendasi . "' ".$condition." 
				order by tl_date DESC
				LIMIT $offset, $num_row";
        $data = $this->_db->_dbquery($sql);
        return $data;
    }
    public function tindaklanjut_viewlist($id)
    {
        $sql = "select tl_id, tl_rek_id, tl_desc, tl_date, tl_attachment
				from tindaklanjut_internal 
				where tl_id = '" . $id . "' ";
        $data = $this->_db->_dbquery($sql);
        return $data;
    }
    public function tindaklanjut_add($id, $rekomendasi_id, $tl_desc, $tl_date, $tl_attachment)
    {
        $sql = "insert into tindaklanjut_internal 
                (tl_id, tl_rek_id, tl_desc, tl_date, tl_attachment) 
                values 
                ('" . $id. "', '" . $rekomendasi_id . "', '" . $tl_desc . "', '" . $tl_date . "', '" . $tl_attachment . "')";
        $aksinyo = "Menambah Tindak Lanjut dengan ID " . $this->uniq_id();
        $this->_db->_dbexecquery($sql, $this->userId, $aksinyo);
    }
    public function tindaklanjut_edit($id, $tl_desc, $tl_date, $tl_attachment)
    {
        $sql = "update tindaklanjut_internal set tl_desc = '" . $tl_desc . "', tl_update_date = '" . $tl_date . "', tl_attachment = '" . $tl_attachment . "'
				where tl_id = '" . $id . "' ";
        $aksinyo = "Mengubah Tindak Lanjut ID " . $id;
        $this->_db->_dbexecquery($sql, $this->userId, $aksinyo);
    }
    public function tindaklanjut_delete($id)
    {
        $sql = "delete from tindaklanjut_internal where tl_id = '" . $id . "' ";
        $aksinyo = "Menghapus Tindak Lanjut dengan ID " . $id;
        $this->_db->_dbexecquery($sql, $this->userId, $aksinyo);
    }
    public function tindaklanjut_update_ststus($id, $status)
    {
        $sql = "update tindaklanjut_internal set tl_status = '" . $status . "'
				where tl_id = '" . $id . "' ";
        $aksinyo = "Menupdate Status Tindak Lanjut ID " . $id . " menjadi ".$status;
        $this->_db->_dbexecquery($sql, $this->userId, $aksinyo);
    }
    public function cek_all_status_tl($id_rekomendasi)
    {
        $sql = "select count(*) FROM tindaklanjut_internal where tl_rek_id = '" . $id_rekomendasi . "' and tl_status != 2 ";
        $data = $this->_db->_dbquery($sql);
        $arr = $data->FetchRow();
        return $arr [0];
    }
    public function tindaklanjut_add_komentar($id, $komentar, $tanggal)
    {
        $sql = "insert into tindaklanjut_internal_comment 
				(tl_comment_id, tl_comment_tl_id, tl_comment_user_id, tl_comment_desc, tl_comment_date) 
				values
				('" . $this->uniq_id() . "','" . $id . "','" . $this->userId . "','" . $komentar . "','" . $tanggal . "')";
        $aksinyo = "Mengomentari Tindak Lanjut dengan ID " . $id;
        $this->_db->_dbexecquery($sql, $this->userId, $aksinyo);
    }
    public function tindaklanjut_komentar_viewlist($id)
    {
        $sql = "select auditor_name, tl_comment_desc, tl_comment_date
				FROM tindaklanjut_internal_comment
				left join user_apps on tl_comment_user_id = user_id
				left join auditor on user_id_internal = auditor_id
				where tl_comment_tl_id = '" . $id . "' order by tl_comment_date ASC";
        $data = $this->_db->_dbquery($sql);
        return $data;
    }
    function insert_lampiran_tl($id_tl, $tl_attach) {
		$sql = "insert into tindaklanjut_attachment 
				(tl_attach_id, tl_attach_tl_id, tl_attach_filename) 
				values 
				('" . $this->uniq_id () . "', '" . $id_tl . "', '" . $tl_attach . "')";
		$this->_db->_dbquery ( $sql );
	}
	function delete_lampiran_tl ($id_tl, $tl_attach){
		$sql = "delete from tindaklanjut_attachment where tl_attach_tl_id = '" . $id_tl . "' and tl_attach_filename = '" . $tl_attach . "' ";
		$this->_db->_dbquery ( $sql );
	}
	function list_tl_lampiran($id_tl){
		$sql = "select tl_attach_id, tl_attach_filename from tindaklanjut_attachment
				where tl_attach_tl_id = '".$id_tl."'" ;
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
}
