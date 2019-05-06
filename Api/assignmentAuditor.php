<?

include_once "../App/Classes/api_class.php";
include_once "../App/Classes/assignment_class.php";

$rest_apis = new rest_api();
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
	
	$rs_get_data = $rest_apis->list_auditor_assign($assign_id);
	$count_data = $rs_get_data->RecordCount();
	if($count_data!=0){
		while($arr_get_data = $rs_get_data->FetchRow()){
			$content[] = array(
				"assign_auditor_id" => $arr_get_data['assign_auditor_id'],
				"assign_id" => $arr_get_data['assign_auditor_id_assign'],
				"auditee_id" => $arr_get_data['assign_auditor_id_auditee'],
				"auditor_id" => $arr_get_data['assign_auditor_id_auditor'],
				"assign_auditor_cost" => $arr_get_data['assign_auditor_cost'],
				"assign_auditor_day" => $arr_get_data['assign_auditor_day'],
				"posisi_id" => $arr_get_data['assign_auditor_id_posisi'],
				"assign_auditor_start_date" => $arr_get_data['assign_auditor_start_date'],
				"assign_auditor_end_date" => $arr_get_data['assign_auditor_end_date'],
				"auditor_nip" => $arr_get_data['auditor_nip'],
				"auditor_name" => $arr_get_data['auditor_name'],
				"auditor_mobile" => $arr_get_data['auditor_mobile'],
				"auditor_email" => $arr_get_data['auditor_email'],
				"posisi_name" => $arr_get_data['posisi_name'],
				"posisi_sort" => $arr_get_data['posisi_sort']
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