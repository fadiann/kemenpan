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
	$requiredFields = array('username', 'password', 'finding_id', 'finding_assign_id', 'finding_kka_id');
	
	// all parameters are required
	$rest_apis->validateRequiredInput($params, $requiredFields);
	
	$username = $params['username'];
	$password = $params['password'];
	$finding_id = $params['finding_id'];
	$finding_assign_id = $params['finding_assign_id'];
	$finding_auditee_id = $params['finding_auditee_id'];
	$finding_kka_id = $params['finding_kka_id'];
	$finding_no = $params['finding_no'];
	$finding_type_id = $params['finding_type_id'];
	$finding_sub_id = $params['finding_sub_id'];
	$finding_jenis_id = $params['finding_jenis_id'];
	$finding_penyebab_id = $params['finding_penyebab_id'];
	$finding_judul = $params['finding_judul'];
	$finding_date = $params['finding_date'];
	$finding_kondisi = $params['finding_kondisi'];
	$finding_kriteria = $params['finding_kriteria'];
	$finding_sebab = $params['finding_sebab'];
	$finding_akibat = $params['finding_akibat'];
	$finding_nilai = $params['finding_nilai'];
	$finding_tanggapan_auditee = $params['finding_tanggapan_auditee'];
	$finding_tanggapan_auditor = $params['finding_tanggapan_auditor'];
	$finding_attachment = $params['finding_attachment'];
	$finding_status = $params['finding_status'];
		
	$date = date("d-m-Y H:i:s");
	$datevalidasi = strtotime($date);
	
	$rest_apis->validateAuthUser($username, $password);
	
	$findings->insert_update_temuan($finding_id, $finding_assign_id, $finding_auditee_id, $finding_kka_id, $finding_no, $finding_type_id, $finding_sub_id, $finding_jenis_id, $finding_penyebab_id, $finding_judul, $finding_date, $finding_kondisi, $finding_kriteria, $finding_sebab, $finding_akibat, $finding_nilai, $finding_tanggapan_auditee, $finding_tanggapan_auditor, $finding_attachment, $finding_status);	
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