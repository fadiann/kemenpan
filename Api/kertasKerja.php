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
	$requiredFields = array('username', 'password', 'program_id', 'owner_id');
	
	// all parameters are required
	$rest_apis->validateRequiredInput($params, $requiredFields);
	
	$username = $params['username'];
	$password = $params['password'];
	$program_id = $params['program_id'];
	$owner_id = $params['owner_id'];
		
	$date = date("d-m-Y H:i:s");
	$datevalidasi = strtotime($date);
	
	$rest_apis->validateAuthUser($username, $password);
	
	$rs_get_data = $kertas_kerjas->kertas_kerja_by_pka($program_id, $owner_id);
	$count_data = $rs_get_data->RecordCount();
	if($count_data!=0){
		while($arr_get_data = $rs_get_data->FetchRow()){
			$content[] = array(
						"kertas_kerja_id" => $arr_get_data['kertas_kerja_id'],
						"kertas_kerja_id_program" => $arr_get_data['kertas_kerja_id_program'],
						"kertas_kerja_no" => $arr_get_data['kertas_kerja_no'],
						"kertas_kerja_desc" => $arr_get_data['kertas_kerja_desc'],
						"kertas_kerja_kesimpulan" => $arr_get_data['kertas_kerja_kesimpulan'],
						"kertas_kerja_attach" => $arr_get_data['kertas_kerja_attach'],
						"kertas_kerja_date" => $arr_get_data['kertas_kerja_date'],
						"kertas_kerja_status" => $arr_get_data['kertas_kerja_status']
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