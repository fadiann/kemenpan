<?
if (@$position == 1) {
	include_once "App/Config/Databases.php";
} else {
	include_once "../App/Config/Databases.php";
}
class rest_api{
	var $_db;	
	var $userId;
	
	function rest_api($userId = "") {
		$this->_db = new Databases();
		$this->userId = $userId;
	}
	
	function uniq_id() {
		return $this->_db->uniqid ();
	}
	
	function validateAuthUser($user, $pass){
		$username = $this->_db->user_api;
		$password = $this->_db->pass_api;
		if($user != $username || $pass != $password){
			throw new Exception('Invalid parameter: Invalid User');
		}
	}
	
	function getJsonPostContent(){
		$body = file_get_contents('php://input');

		// decode json to array
		$decoded = json_decode($body, true);
		if (json_last_error() !== JSON_ERROR_NONE) {
			throw new Exception('Invalid parameter: Invalid JSON');
		}
		return $decoded;
	}

	function checkMethod($expectedMethod){
		$method = $_SERVER['REQUEST_METHOD'];
		if (strtoupper($method) != strtoupper($expectedMethod)) {
			throw new Exception(sprintf('Expected \'%s\' request, got \'%s\' instead', $expectedMethod, $method));
		}
	}

	function validateRequiredInput($params, $requiredFields){
		foreach ($requiredFields as $field) {
			if ((!isset($params[$field]))
				|| ($params[$field] == '')
				|| ($params[$field] == null)
			) {
				throw new Exception(sprintf('Invalid parameter: All field is required', $field));
			}
		}
	}
	function renderResponse($response){
		header("Content-type: application/json");
		$str = json_encode($response);
		echo $str;
	}
	
	function assingment_view_grid($auditor_id) {
		$sql = "select assign_id, assign_surat_no, assign_kegiatan, assign_start_date, assign_end_date, auditee_name
				from assignment
				join assignment_auditor on assign_id = assign_auditor_id_assign
				join assignment_surat_tugas on assign_id = assign_surat_id_assign
				join assignment_auditee on assign_id = assign_auditee_id_assign
				join auditee on assign_auditee_id_auditee = auditee_id
				where assign_auditor_id_auditor = '".$auditor_id."' and assign_surat_status = '2' ";
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	
	function cek_username($username, $passwd) {
		$passwd = md5 ( crypt ( $passwd, md5 ( $username ) ) );
		$sql = "SELECT user_id, user_username, user_password, user_status, user_id_group, user_id_internal
				from user_apps
				where user_username = '".$username."' and user_password = '".$passwd."' ";
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
	function list_auditor_assign($assign_id) {
		$sql = "select distinct assign_auditor_id, assign_auditor_id_assign, assign_auditor_id_auditee, assign_auditor_id_auditor, assign_auditor_cost, assign_auditor_day, assign_auditor_id_posisi, assign_auditor_start_date, assign_auditor_end_date, auditor_nip, auditor_name, auditor_mobile, auditor_email, posisi_name, posisi_sort
				FROM assignment_auditor
				left join auditor on assign_auditor_id_auditor = auditor_id
				left join par_posisi_penugasan on assign_auditor_id_posisi = posisi_id
				where assign_auditor_id_assign = '".$assign_id."' ";
		$data = $this->_db->_dbquery ( $sql );
		return $data;
	}
}