<?

include_once "../App/Classes/api_class.php";
include_once "../App/Classes/program_audit_class.php";

$rest_apis = new rest_api();
$programaudits = new programaudit();

$result_all = array();
try {		
	$rest_apis->checkMethod('POST');
	
	// get post value and validate
	$params = $rest_apis->getJsonPostContent();
	$requiredFields = array('username', 'password', 'assign_id', 'owner_id');
	
	// all parameters are required
	$rest_apis->validateRequiredInput($params, $requiredFields);
	
	$username = $params['username'];
	$password = $params['password'];
	$assign_id = $params['assign_id'];
	$owner_id = $params['owner_id'];
	if($owner_id==1) $owner_id = "";
	else $owner_id = $params['owner_id'];
		
	$date = date("d-m-Y H:i:s");
	$datevalidasi = strtotime($date);
	
	$rest_apis->validateAuthUser($username, $password);
	
	$rs_get_data = $programaudits->program_audit_by_assign($assign_id, $owner_id);
	$count_data = $rs_get_data->RecordCount();
	if($count_data!=0){
		while($arr_get_data = $rs_get_data->FetchRow()){
			$content[] = array(
						"program_id" => $arr_get_data['program_id'],
						"program_id_assign" => $arr_get_data['program_id_assign'],
						"program_id_auditee" => $arr_get_data['program_id_auditee'],
						"program_id_ref" => $arr_get_data['program_id_ref'],
						"program_id_auditor" => $arr_get_data['program_id_auditor'],
						"program_jam" => $arr_get_data['program_jam'],
						"program_lampiran" => $arr_get_data['program_lampiran'],
						"program_create_by" => $arr_get_data['program_create_by'],
						"program_create_date" => $arr_get_data['program_create_date'],
						"program_status" => $arr_get_data['program_status']
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