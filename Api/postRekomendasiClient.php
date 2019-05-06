<?

include_once "../App/Classes/api_class.php";
include_once "../App/Classes/rekomendasi_class.php";

$rekomendasis = new rekomendasi ( $ses_userId );
$rest_apis = new rest_api();

$result_all = array();
try {		
	$rest_apis->checkMethod('POST');
	
	// get post value and validate
	$params = $rest_apis->getJsonPostContent();
	$requiredFields = array('username', 'password', 'rekomendasi_id', 'rekomendasi_finding_id');
	
	// all parameters are required
	$rest_apis->validateRequiredInput($params, $requiredFields);
	
	$username = $params['username'];
	$password = $params['password'];
	$rekomendasi_id = $params['rekomendasi_id'];
	$rekomendasi_finding_id = $params['rekomendasi_finding_id'];
	$rekomendasi_id_code = $params['rekomendasi_id_code'];
	$rekomendasi_desc = $params['rekomendasi_desc'];
	$rekomendasi_pic = $params['rekomendasi_pic'];
	$rekomendasi_dateline = $params['rekomendasi_dateline'];
	$rekomendasi_date = $params['rekomendasi_date'];
	$rekomendasi_status = $params['rekomendasi_status'];
	
	$rest_apis->validateAuthUser($username, $password);
	
	$rekomendasis->insert_update_rekomendasi($rekomendasi_id, $rekomendasi_finding_id, $rekomendasi_id_code, $rekomendasi_desc, $rekomendasi_pic, $rekomendasi_dateline, $rekomendasi_date, $rekomendasi_status);	
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