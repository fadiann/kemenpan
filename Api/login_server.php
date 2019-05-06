<?
include_once "../App/Classes/api_class.php";

$rest_apis = new rest_api();

$result_all = array();
try {		
	$rest_apis->checkMethod('POST');
	
	// get post value and validate
	$params = $rest_apis->getJsonPostContent();
	$requiredFields = array('username', 'password', 'user_id', 'pass_id');
	
	// all parameters are required
	$rest_apis->validateRequiredInput($params, $requiredFields);
	
	$username = $params['username'];
	$password = $params['password'];
	$user_id = $params['user_id'];
	$pass_id = $params['pass_id'];
		
	$date = date("d-m-Y H:i:s");
	$datevalidasi = strtotime($date);
	
	$rest_apis->validateAuthUser($username, $password);
	
	$rs_get_data = $rest_apis->cek_username($user_id, $pass_id);	
	$count_data = $rs_get_data->RecordCount();
	if($count_data<>0){
		$arr_get_data = $rs_get_data->FetchRow();
		$content = array(
					"user_1" => $arr_get_data['user_id'],
					"user_2" => $arr_get_data['user_password'], 
					"user_3" => $arr_get_data['user_status'],
					"user_4" => $arr_get_data['user_id_group'], 
					"user_5" => $arr_get_data['user_id_internal']
				);
		$result_all['responseCode'] = "200";
		$result_all['responseDesc'] = "Sukses";
		$result_all['responseContent'] = $content;
		$rest_apis->renderResponse($result_all);	
	}else{
		$result_all['responseCode'] = "400";
		$result_all['responseDesc'] = "User Tidak Ditemukan";
		$result_all['responseContent'] = "";
		$rest_apis->renderResponse($result_all);
	}
} catch (Exception $e) {
	$result_all['responseCode'] = "400";
	$result_all['responseDesc'] = $e->getMessage();
	$result_all['responseContent'] = "";
	$rest_apis->renderResponse($result_all);
}