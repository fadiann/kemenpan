<?

include_once "../App/Classes/api_class.php";
include_once "../App/Classes/rekomendasi_class.php";

$rest_apis = new rest_api();
$rekomendasis = new rekomendasi();

$result_all = array();
try {		
	$rest_apis->checkMethod('POST');
	
	// get post value and validate
	$params = $rest_apis->getJsonPostContent();
	$requiredFields = array('username', 'password', 'temuan_id');
	
	// all parameters are required
	$rest_apis->validateRequiredInput($params, $requiredFields);
	
	$username = $params['username'];
	$password = $params['password'];
	$temuan_id = $params['temuan_id'];
		
	$date = date("d-m-Y H:i:s");
	$datevalidasi = strtotime($date);
	
	$rest_apis->validateAuthUser($username, $password);
	
	$rs_get_data = $rekomendasis->rekomendasi_by_temuan($temuan_id);	
	$jml_data = $rs_get_data->RecordCount();
	if($jml_data!=0){
		while($arr_get_data = $rs_get_data->FetchRow()){
		$content[] = array(
					"rekomendasi_id" => $arr_get_data['rekomendasi_id'], "rekomendasi_finding_id" => $arr_get_data['rekomendasi_finding_id'], 
					"rekomendasi_id_code" => $arr_get_data['rekomendasi_id_code'], "rekomendasi_desc" => $arr_get_data['rekomendasi_desc'],
					"rekomendasi_dateline" => $arr_get_data['rekomendasi_dateline'], "rekomendasi_date" => $arr_get_data['rekomendasi_date'], 
					"rekomendasi_status" => $arr_get_data['rekomendasi_status'], "rekomendasi_pic" => $arr_get_data['rekomendasi_pic']
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