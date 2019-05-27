<?php
if (@$position == 1) {
	include_once "App/Config/Databases.php";
}
else {
	include_once "../App/Config/Databases.php";
}

class Author extends db
{
	private $db;
	private $userId;

	public function __construct($userId = "")
	{
		$this->db = new db;
		$this->userId = $userId;
	}

	public function uniq_id()
	{
		return $this->db->uniqid();
	}

	public function author_count($base_on_id_eks = "", $key_search, $val_search, $all_field)
	{
		$condition = "";
		if ($base_on_id_eks != "") $condition = " where author.id_author = '" . $base_on_id_eks . "' ";
		$condition2 = "";
		if ($val_search != "") {
			if ($key_search != "") $condition2 = " and " . $key_search . " like '%" . $val_search . "%' ";
			else {
				for ($i = 0; $i < count($all_field); $i++) {
					$or = " or ";
					if ($i == 0) $or = "";
					$condition2 .= $or . $all_field[$i] . " like '%" . $val_search . "%' ";
				}
				$condition2 = " and (" . $condition2 . ")";
			}
		}
		$sql = "select count(*) from author " . $condition . $condition2;
		$data = $this->db->_dbquery($sql);
		$arr = $data->FetchRow();

		return $arr[0];
	}

	public function author_viewlist($base_on_id_eks = "", $key_search, $val_search, $all_field, $offset, $num_row)
	{
		$condition = "";
		if ($base_on_id_eks != "") $condition = "where author.id_author = '" . $base_on_id_eks . "' ";
		$condition2 = "";
		if ($val_search != "") {
			if ($key_search != "") $condition2 = " and " . $key_search . " like '%" . $val_search . "%' ";
			else {
				for ($i = 0; $i < count($all_field); $i++) {
					$or = " or ";
					if ($i == 0) $or = "";
					$condition2 .= $or . $all_field[$i] . " like '%" . $val_search . "%' ";
				}
				$condition2 = " and (" . $condition2 . ")";
			}
		}
		$sql = "select * from author " . $condition . $condition2 . " order by author.kode_author LIMIT $offset, $num_row";
		$data = $this->db->_dbquery($sql);

		return $data;
	}

	public function author_cek_name($kode_author, $id_author = "")
	{
		$condition = "";
		if ($id != "")
			$condition = "and id_author != '" . $id_author . "' ";
		$sql = "select id_author from author where LCASE(kode_author) = '" . strtolower($kode_author) . "' " . $condition;
		$data = $this->db->_dbquery($sql);

		return $data;

	}

	public function author_data_viewlist($id = "")
	{
		$condition = "";
		if ($id != "")
			$condition = "where author.id_author = '" . $id . "' ";
		$sql = "select * from author " . $condition . " order by author.kode_author ";
		$data = $this->db->_dbquery($sql);

		return $data;
	}

	public function author_add($kode_author, $nama_author)
	{
		$sql = "insert into author (id_author, kode_author, nama_author) values ('" . $this->uniq_id() . "', '" . $kode_author . "', '" . $nama_author . "')"; 	
		$aksinyo = "Menambah Author " . $kode_author . " - " . $nama_author;

		$this->db->_dbexecquery($sql, $this->userId, $aksinyo);
	}

	public function author_edit($id, $kode_author, $nama_author)
	{
		$sql = "update author set kode_author = '" . $kode_author . "', nama_author = '" . $nama_author . "' where id_author = '" . $id . "' ";

		$aksinyo = "Mengubah Data Author dengan ID " . $id;

		$this->db->_dbexecquery($sql, $this->userId, $aksinyo);

	}

	public function author_delete($id)
	{
		$sql = "delete from author where id_author = '" . $id . "' ";
		$aksinyo = "Menghapus Author ID " . $id;

		$this->db->_dbexecquery($sql, $this->userId, $aksinyo);
	}
}

?>