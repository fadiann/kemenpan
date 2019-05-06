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
	
	$rest_apis->validateAuthUser($username, $password);
	
	$rs_get_data = $param->finding_type_data_viewlist();
	$count_data = $rs_get_data->RecordCount();
	if($count_data!=0){
		while($arr_get_data = $rs_get_data->FetchRow()){
			$content[] = array(
						"finding_type_id" => $arr_get_data['finding_type_id'],
						"finding_type_code" => $arr_get_data['finding_type_code'],
						"finding_type_name" => $arr_get_data['finding_type_name'],
						"finding_type_del_st" => $arr_get_data['finding_type_del_st']
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