<?

include_once "../App/Classes/api_class.php";
include_once "../App/Classes/finding_class.php";

$rest_apis = new rest_api();
$findings = new finding();

$result_all = array();
try {		
	$rest_apis->checkMethod('POST');
	
	// get post value and validate
	$params = $rest_apis->getJsonPostContent();
	$requiredFields = array('username', 'password', 'kka_id');
	
	// all parameters are required
	$rest_apis->validateRequiredInput($params, $requiredFields);
	
	$username = $params['username'];
	$password = $params['password'];
	$kka_id = $params['kka_id'];
		
	$date = date("d-m-Y H:i:s");
	$datevalidasi = strtotime($date);
	
	$rest_apis->validateAuthUser($username, $password);
	
	$rs_get_data = $findings->finding_by_kka($kka_id);	
	$jml_data = $rs_get_data->RecordCount();
	if($jml_data!=0){
		while($arr_get_data = $rs_get_data->FetchRow()){
		$content[] = array(
					"finding_id" => $arr_get_data['finding_id'], "finding_assign_id" => $arr_get_data['finding_assign_id'], 
					"finding_auditee_id" => $arr_get_data['finding_auditee_id'], "finding_kka_id" => $arr_get_data['finding_kka_id'],
					"finding_no" => $arr_get_data['finding_no'], "finding_type_id" => $arr_get_data['finding_type_id'], 
					"finding_sub_id" => $arr_get_data['finding_sub_id'], "finding_jenis_id" => $arr_get_data['finding_jenis_id'],
					"finding_penyebab_id" => $arr_get_data['finding_penyebab_id'], "finding_judul" => $arr_get_data['finding_judul'],
					"finding_date" => $arr_get_data['finding_date'], "finding_kondisi" => $arr_get_data['finding_kondisi'],
					"finding_kriteria" => $arr_get_data['finding_kriteria'], "finding_sebab" => $arr_get_data['finding_sebab'],
					"finding_akibat" => $arr_get_data['finding_akibat'], "finding_nilai" => $arr_get_data['finding_nilai'],
					"finding_tanggapan_auditee" => $arr_get_data['finding_tanggapan_auditee'], "finding_tanggapan_auditor" => $arr_get_data['finding_tanggapan_auditor'], 
					"finding_attachment" => $arr_get_data['finding_attachment'], "finding_status" => $arr_get_data['finding_status']
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