<?

include_once "../App/Classes/api_class.php";
include_once "../App/Classes/auditee_class.php";
include_once "../App/Classes/assignment_class.php";

$rest_apis = new rest_api();
$auditees = new auditee();
$assigns = new assign();

$result_all = array();
try {		
	$rest_apis->checkMethod('POST');
	
	// get post value and validate
	$params = $rest_apis->getJsonPostContent();
	$requiredFields = array('username', 'password', 'assign_id');
	
	// all parameters are required
	$rest_apis->validateRequiredInput($params, $requiredFields);
	
	$username = $params['username'];
	$password = $params['password'];
	$assign_id = $params['assign_id'];
		
	$date = date("d-m-Y H:i:s");
	$datevalidasi = strtotime($date);
	
	$rest_apis->validateAuthUser($username, $password);
	
	$rs_get_data = $assigns->assign_auditee_viewlist($assign_id);
	$count_data = $rs_get_data->RecordCount();
	if($count_data!=0){
		while($arr_get_data = $rs_get_data->FetchRow()){
			$rs_get_detail = $auditees->auditee_data_viewlist($arr_get_data['assign_auditee_id_auditee']);
			$arr_get_detail = $rs_get_detail->FetchRow();
			$content[] = array(
				"id_assign" => $assign_id,
				"id_auditee" => $arr_get_data['assign_auditee_id_auditee'],
				"auditee_kode" => $arr_get_detail['auditee_kode'],
				"auditee_name" => $arr_get_detail['auditee_name'],
				"auditee_parrent_id" => $arr_get_detail['auditee_parrent_id'],
				"auditee_inspektorat_id" => $arr_get_detail['auditee_inspektorat_id'],
				"auditee_propinsi_id" => $arr_get_detail['auditee_propinsi_id'],
				"auditee_kabupaten_id" => $arr_get_detail['auditee_kabupaten_id']
			);
		}
		$result_all['responseCode'] = "200";
		$result_all['responseDesc'] = "Sukses";
		$result_all['responseContent'] = $content;
		$rest_apis->renderResponse($result_all);	
	}else{
		$result_all['responseCode'] = "400";
		$result_all['responseDesc'] = "Data Tidak Ditemukan";
		$result_all['responseContent'] = "";
		$rest_apis->renderResponse($result_all);
	}
} catch (Exception $e) {
	$result_all['responseCode'] = "400";
	$result_all['responseDesc'] = $e->getMessage();
	$result_all['responseContent'] = "";
	$rest_apis->renderResponse($result_all);
}