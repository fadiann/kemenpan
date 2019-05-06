<?

include_once "../App/Classes/api_class.php";
include_once "../App/Classes/auditee_class.php";

$rest_apis = new rest_api();
$auditees = new auditee();

$result_all = array();
try {		
	$rest_apis->checkMethod('POST');
	
	// get post value and validate
	$params = $rest_apis->getJsonPostContent();
	$requiredFields = array('username', 'password', 'auditee_id');
	
	// all parameters are required
	$rest_apis->validateRequiredInput($params, $requiredFields);
	
	$username = $params['username'];
	$password = $params['password'];
	$auditee_id = $params['auditee_id'];
		
	$date = date("d-m-Y H:i:s");
	$datevalidasi = strtotime($date);
	
	$rest_apis->validateAuthUser($username, $password);
	
	$rs_get_data = $auditees->pic_auditee($auditee_id);
	$count_data = $rs_get_data->RecordCount();
	if($count_data!=0){
		while($arr_get_data = $rs_get_data->FetchRow()){
			$content[] = array(
				"pic_id" => $arr_get_data['pic_id'],
				"pic_nip" => $arr_get_data['pic_nip'],
				"pic_name" => $arr_get_data['pic_name'],
				"pic_jabatan" => $arr_get_data['pic_jabatan_id'],
				"pic_email" => $arr_get_data['pic_email']
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