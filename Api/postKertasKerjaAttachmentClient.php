<?

include_once "../App/Classes/api_class.php";
include_once "../App/Classes/kertas_kerja_class.php";

$rest_apis = new rest_api();
$kertas_kerjas = new kertas_kerja();

$result_all = array();
try {		
	$rest_apis->checkMethod('POST');
	
	// get post value and validate
	$params = $rest_apis->getJsonPostContent();
	$requiredFields = array('username', 'password', 'kka_attach_id', 'kka_attach_kka_id');
	
	// all parameters are required
	$rest_apis->validateRequiredInput($params, $requiredFields);
	
	$username = $params['username'];
	$password = $params['password'];
	$kka_attach_id = $params['kka_attach_id'];
	$kka_attach_kka_id = $params['kka_attach_kka_id'];
	$kka_attach_filename = $params['kka_attach_filename'];
		
	$date = date("d-m-Y H:i:s");
	$datevalidasi = strtotime($date);
	
	$rest_apis->validateAuthUser($username, $password);
	
	$kertas_kerjas->insert_update_lampiran_kertas_kerja($kka_attach_id, $kka_attach_kka_id, $kka_attach_filename);	
	$result_all['responseCode'] = "200";
	$result_all['responseDesc'] = "Sukses";
	$result_all['responseContent'] = "";
	$rest_apis->renderResponse($result_all);
	
} catch (Exception $e) {
	$result_all['responseCode'] = "400";
	$result_all['responseDesc'] = $e->getMessage();
	$result_all['responseContent'] = "";
	$rest_apis->renderResponse($result_all);
}