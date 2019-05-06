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
	$requiredFields = array('username', 'password', 'kertas_kerja_id', 'kertas_kerja_id_program');
	
	// all parameters are required
	$rest_apis->validateRequiredInput($params, $requiredFields);
	
	$username = $params['username'];
	$password = $params['password'];
	$kertas_kerja_id = $params['kertas_kerja_id'];
	$kertas_kerja_id_program = $params['kertas_kerja_id_program'];
	$kertas_kerja_no = $params['kertas_kerja_no'];
	$kertas_kerja_desc = $params['kertas_kerja_desc'];
	$kertas_kerja_kesimpulan = $params['kertas_kerja_kesimpulan'];
	$kertas_kerja_date = $params['kertas_kerja_date'];
	$kertas_kerja_attach = $params['kertas_kerja_attach'];
	
	$rest_apis->validateAuthUser($username, $password);
	
	$kertas_kerjas->insert_update_kertas_kerja($kertas_kerja_id, $kertas_kerja_id_program, $kertas_kerja_no, $kertas_kerja_desc, $kertas_kerja_kesimpulan, $kertas_kerja_date, $kertas_kerja_attach);	
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