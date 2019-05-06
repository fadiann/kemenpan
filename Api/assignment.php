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
	$requiredFields = array('username', 'password', 'assign_id');
	
	// all parameters are required
	$rest_apis->validateRequiredInput($params, $requiredFields);
	
	$username = $params['username'];
	$password = $params['password'];
	$assign_id = $params['assign_id'];
		
	$date = date("d-m-Y H:i:s");
	$datevalidasi = strtotime($date);
	
	$rest_apis->validateAuthUser($username, $password);
	
	$rs_get_data = $assigns->assign_viewlist($assign_id);	
	$arr_get_data = $rs_get_data->FetchRow();
	if(!empty($arr_get_data)){
		$content = array(
			"assign_id" => $arr_get_data['assign_id'], "assign_tipe_id" => $arr_get_data['assign_tipe_id'], 
			"assign_tahun" => $arr_get_data['assign_tahun'], "assign_start_date" => $arr_get_data['assign_start_date'], 
			"assign_end_date" => $arr_get_data['assign_end_date'], "assign_dasar" => $arr_get_data['assign_dasar'], 
			"assign_hari" => $arr_get_data['assign_hari'], "assign_periode" => $arr_get_data['assign_periode'], 
			"assign_kegiatan" => $arr_get_data['assign_kegiatan'], "assign_hari_persiapan" => $arr_get_data['assign_hari_persiapan'],
			"assign_hari_pelaksanaan" => $arr_get_data['assign_hari_pelaksanaan'], "assign_hari_pelaporan" => $arr_get_data['assign_hari_pelaporan'],
			"assign_pendanaan" => $arr_get_data['assign_pendanaan'], "assign_keterangan" => $arr_get_data['assign_keterangan'],
			"assign_file" => $arr_get_data['assign_file'], "assign_persiapan_awal" => $arr_get_data['assign_persiapan_awal'],
			"assign_persiapan_akhir" => $arr_get_data['assign_persiapan_akhir'], "assign_pelaksanaan_awal" => $arr_get_data['assign_pelaksanaan_awal'], 
			"assign_pelaksanaan_akhir" => $arr_get_data['assign_pelaksanaan_akhir'], "assign_pelaporan_awal" => $arr_get_data['assign_pelaporan_awal'],
			"assign_pelaporan_akhir" => $arr_get_data['assign_pelaporan_akhir'], "assign_pendahuluan" => $arr_get_data['assign_pendahuluan'],
			"assign_tujuan" => $arr_get_data['assign_tujuan'], "assign_instruksi" => $arr_get_data['assign_instruksi'],
			"no_spt" => $arr_get_data['assign_surat_no'], "tgl_spt" => $arr_get_data['assign_surat_tgl'], "id_surat" => $arr_get_data['assign_surat_id'] ,
			"audit_type_name" => $arr_get_data['audit_type_name']
		);
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