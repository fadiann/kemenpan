<?

include_once "../App/Classes/api_class.php";
include_once "../App/Classes/param_class.php";

$rest_apis = new rest_api();
$param = new param();

$result_all = array();
try {		
	$rest_apis->checkMethod('POST');
	
	// get post value and validate
	$params = $rest_apis->getJsonPostContent();
	$requiredFields = array('username', 'password');
	
	// all parameters are required
	$rest_apis->validateRequiredInput($params, $requiredFields);
	
	$username = $params['username'];
	$password = $params['password'];
		
	$date = date("d-m-Y H:i:s");
	$datevalidasi = strtotime($date);
	
	$rest_apis->validateAuthUser($username, $password);
	
	$rs_get_data = $param->ref_program_data_viewlist();
	$count_data = $rs_get_data->RecordCount();
	if($count_data!=0){
		while($arr_get_data = $rs_get_data->FetchRow()){
			$content[] = array(
						"ref_program_id" => $arr_get_data['ref_program_id'],
						"ref_program_id_type" => $arr_get_data['ref_program_id_type'],
						"ref_program_code" => $arr_get_data['ref_program_code'],
						"ref_program_aspek_id" => $arr_get_data['ref_program_aspek_id'],
						"ref_program_title" => $arr_get_data['ref_program_title'],
						"ref_program_procedure" => $arr_get_data['ref_program_procedure'],
						"ref_program_del_st" => $arr_get_data['ref_program_del_st'],
						"audit_type_name" => $arr_get_data['audit_type_name'],
						"aspek_name" => $arr_get_data['aspek_name']
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