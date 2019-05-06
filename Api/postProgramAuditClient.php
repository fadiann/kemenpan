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
	$requiredFields = array('username', 'password', 'program_id', 'program_id_assign', 'program_id_auditor');
	
	// all parameters are required
	$rest_apis->validateRequiredInput($params, $requiredFields);
	
	$username = $params['username'];
	$password = $params['password'];
	
	$program_id = $params['program_id'];
	$program_id_assign = $params['program_id_assign'];
	$program_id_auditee = $params['program_id_auditee'];
	$program_id_ref = $params['program_id_ref'];
	$program_id_auditor = $params['program_id_auditor'];
	$program_jam = $params['program_jam'];
	$program_lampiran = $params['program_lampiran'];
	$program_create_by = $params['program_create_by'];
	$program_create_date = $params['program_create_date'];
		
	$date = date("d-m-Y H:i:s");
	$datevalidasi = strtotime($date);
	
	$rest_apis->validateAuthUser($username, $password);
	
	$programaudits->insert_update_program_audit($program_id, $program_id_assign, $program_id_auditee, $program_id_ref, $program_id_auditor, $program_jam, $program_lampiran, $program_create_by, $program_create_date);	
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