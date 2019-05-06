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
	$requiredFields = array('username', 'password', 'auditor_id');
	
	// all parameters are required
	$rest_apis->validateRequiredInput($params, $requiredFields);
	
	$username = $params['username'];
	$password = $params['password'];
	$auditor_id = $params['auditor_id'];
		
	$date = date("d-m-Y H:i:s");
	$datevalidasi = strtotime($date);
	
	$rest_apis->validateAuthUser($username, $password);
	
	$rs_get_data = $rest_apis->assingment_view_grid($auditor_id);	
	$count_data = $rs_get_data->RecordCount();
	if($count_data<>0){
		while($arr_get_data = $rs_get_data->FetchRow()){
		$content[] = array(
					"assign_id" => $arr_get_data['assign_id'],
					"assign_surat_no" => $arr_get_data['assign_surat_no'], "assign_kegiatan" => $arr_get_data['assign_kegiatan'],
					"assign_start_date" => $arr_get_data['assign_start_date'], "assign_end_date" => $arr_get_data['assign_end_date'], 
					"auditee_name" => $arr_get_data['auditee_name']
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