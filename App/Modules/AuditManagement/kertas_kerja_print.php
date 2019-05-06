<?
header("Content-Type: application/msword");
header("Content-Disposition: attachment; filename=kertas-kerja-audit.doc");
header("Pragma: no-cache");
header("Expires: 0");
define ("INBOARD",false);

include_once "../App/Libraries/login_history.php";
include_once "../App/Classes/program_audit_class.php";
include_once "../App/Classes/kertas_kerja_class.php";

$programaudits = new programaudit ( $ses_userId );
$kertas_kerjas = new kertas_kerja ( $ses_userId );

$data_id = "";

$data_id = $Helper->replacetext ( $_REQUEST ["id"] );

$rs_kka = $kertas_kerjas->kertas_kerja_viewlist ( $data_id );
$arr_kka = $rs_kka->FetchRow();
if($data_id!=""){
?>

<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word'>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Kertas Kerja Audit</title>
	<!--[if gte mso 9]>
		<xml>
			<w:WordDocument>
				<w:View>Print</w:View>
				<w:Zoom>100</w:Zoom>
			</w:WordDocument>
		</xml>
	<![endif]-->
	<style>
	<!-- /* Style Definitions */ -->
	p.MsoHeader, li.MsoHeader, div.MsoHeader{
		margin:0in;
		margin-top:.0001pt;
		mso-pagination:widow-orphan;
		tab-stops:center 3.0in right 6.0in;
	}
	p.MsoFooter, li.MsoFooter, div.MsoFooter{
		margin:0in 0in 1in 0in;
		margin-bottom:.0001pt;
		mso-pagination:widow-orphan;
		tab-stops:center 3.0in right 6.0in;
	}
	.footer {
		font-size: 9pt;
	}
	@page Section1{
		size:8.5in 11.0in;
		margin:0.5in 0.5in 0.5in 0.5in;
		mso-header-margin:0.5in;
		mso-header:h1;
		mso-footer:f1;
		mso-footer-margin:0.5in;
		mso-paper-source:0;
	}
	div.Section1{
		page:Section1;
	}
	table#hrdftrtbl{
		margin:0in 0in 0in 9in;
	}
	.tabel-header{
		padding:6px;
		font-size:9pt;
	}
	</style>
	<style type="text/css" media="screen,print">
		body {
			font-family: "Arial Narrow", Helvetica, Arial;
			font-size:10pt;
		}
		pageBreak {
		  clear:all;
		  page-break-before:always;
		  mso-special-character:line-break;
		}
	</style>
</head>

<body style='tab-interval:.5in'>
	<div class="Section1">
	<br/>
		<table border="2" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td colspan="2">
					<center><strong>KERTAS KERJA AUDIT (KKA)</strong></center>
					<?=$arr_kka['kertas_kerja_desc']?>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<strong>Simpulan</strong>
					<?=$arr_kka['kertas_kerja_kesimpulan']?>
				</td>
			</tr>
			<tr>
				<td>
					<strong>Sumber Data</strong>
					-
				</td>
				<td>
					<strong>Keterangan</strong>
					-
				</td>
			</tr>
		</table>
		<div class="pageBreak"></div>
	</div>
	<br/>
	<table id='hrdftrtbl' border='0' cellspacing='0' cellpadding='0'>
		<tr>
			<td>
				<div style='mso-element:header' id="h1" >
					<p class="MsoHeader">
						<table border="1" cellpadding="0" cellspacing="0" width="100%" class="tabel-header">
							<tr>
								<td colspan="2" rowspan="4" width="50%">
									<center>
										<img src="<?=$Helper->baseurl_apps()?>/Public/images/logo_jiwasraya.png" width="48" height="48" style="width:48pt;height:48pt;" /><br>
										PT. JIWASRAYA
									</center>
								</td>
								<td width="25%">No KKA</td>
								<td width="25%">: <?=$arr_kka['kertas_kerja_no']?></td>
							</tr>
							<tr>
								<td>Ref. Prog.Audit. No</td>
								<td>: <?=$arr_kka['ref_program_code']?></td>
							</tr>
							<tr>
								<td>Disusun Oleh</td>
								<td>: <?=ucwords(strtolower($arr_kka['create_name']))?></td>
							</tr>
							<tr>
								<td>Tgl Paraf</td>
								<td>: <?=$Helper->dateIndo($arr_kka['kerja_kerja_created_date'])?></td>
							</tr>
							<tr>
								<td width="25%">Nama Auditi</td>
								<td width="25%">: <?=ucwords(strtolower($arr_kka['auditee_name']))?></td>
								<td>Direview oleh</td>
								<td>: <?=ucwords(strtolower($arr_kka['approve_name']))?></td>
							</tr>
							<tr>
								<td>Tahun/Masa Audit</td>
								<td>: <?=$arr_kka['assign_tahun']?></td>
								<td>Tgl Paraf</td>
								<td>: <?=$Helper->dateIndo($arr_kka['kertas_kerja_approve_date'])?></td>
							</tr>
						</table>
					</p>
			   </div>
			</td>
			<td>
				<div style='mso-element:footer' id="f1">
					<span style='position:relative;z-index:-1'> 
						<!-- FOOTER-tags -->
						<p class='MsoFooter'>
							<span style='mso-tab-count:2'></span>
							Page 
							<span style='mso-field-code: PAGE '>
								<span style='mso-no-proof:yes'></span> 
								from 
								<span style='mso-field-code: NUMPAGES '></span>
							</span>
						</p>
						<!-- end FOOTER-tags -->
					</span>
				</div>
			</td>
		</tr>
	</table>
</body>
</html>
<?
}
?>