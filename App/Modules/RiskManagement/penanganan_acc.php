<script type="text/javascript" src="Public/js/jquery-ui-1.10.1.custom.min.js"></script>
<link rel="stylesheet" href="Public/css/jquery.ui.datepicker.css">
<section id="main" class="column">
		<?
		include 'risk_view_parrent.php';
		?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title"><?=$page_title?></h2>
			</header>
			<div class="panel-body wrap">
		<form method="post" name="f" action="#" class="form-horizontal">
		<?
		switch ($_action) {
			case "getadd" :
				?>
		<table border='1' class="table table-bordered table-striped table-condensed mb-none" cellspacing='0' cellpadding="0">
				<tr align="center">
					<th width="2%" rowspan="2">No</th>
					<th width="40%" colspan="5">Risiko Residu</th>
					<th width="10%" rowspan="2">Pilihan<br>Penanganan<br>Risiko
					</th>
					<th width="48%" colspan="3">Penanganan Risiko</th>
				</tr>
				<tr align="center">
					<th width="25">Kategori Risiko</th>
					<th>No Risiko</th>
					<th width="40">Nama Risiko</th>
					<th>Selera Risiko</th>
					<th>Nilai<br>Risiko<br>Residu</th>
					<th width="15%">Mitigasi</th>
					<th width="10%">Batas Waktu</th>
					<th width="10%">Penanggung Jawab</th>
				</tr>
			<?php
				$i = 0;
				$no = 0;
				$rs_kategori = $params->risk_kategori_data_viewlist ();
				while ( $arr_kategori = $rs_kategori->FetchRow () ) {
					$x = 0;
					$rs_iden = $risks->list_identifikasi ( $arr_kategori ['risk_kategori_id'], $ses_penetapan_id );
					$countKat = $rs_iden->RecordCount ();
					while ( $arr_iden = $rs_iden->FetchRow () ) {
						$x ++;
						$no ++;
						?>
				<tr>
					<?php
						if ($x == 1) {
							$i ++;
							?>
					<td rowspan=<?=$countKat?>><?=$i?></td>
					<td rowspan=<?=$countKat?>><?=$arr_iden['risk_kategori'];?></td>
					<?php
						}
						?>
					<td><?=$arr_iden['identifikasi_no_risiko'];?></td>
					<td><?=$arr_iden['identifikasi_nama_risiko'];?></td>
					<td><?=$arr_iden['identifikasi_selera'];?></td>
					<td><?=$arr_iden['evaluasi_risiko_residu'];?></td>
					<td align="center">
					<?
						$rs_td = $params->risk_penanganan_data_viewlist ();
						$arr_td = $rs_td->GetArray ();
						echo $Helper->buildCombo_risk ( "pil_penanganan_" . $no, $arr_td, 0, 1, $arr_iden ['penanganan_risiko_id'], "", false, true, false, "penanganan_risk" );
						?>
					</td>
					<td align="center">
						<textarea name="penanganan_<?=$no?>" rows="3" class="span9"><?=$arr_iden['penanganan_plan']?></textarea>
					</td>
					<td align="center"><input type="text" class="span9" name="date_<?=$no?>" id="date_<?=$no?>" value="<?=$Helper->dateIndo($arr_iden['penanganan_date'])?>"></td>
					<td align="center">
						<?//=$Helper->dbCombo("pic_".$no, "auditee_pic", "pic_id", "pic_name", "and pic_del_st = 1 and pic_auditee_id = '".$arr_iden['penetapan_auditee_id']."'", $arr_iden['penanganan_pic_id'], "cmb_risk", 1)?>
						<input type="text" name="<?="pic_".$no?>" class="span9">
					</td>
				</tr>
			<?php
					}
				}
				?>
		</table>
		<?
				break;
		}
		?>
			<fieldset class="form-group mt-md">
				<center>
					<input type="button" class="btn btn-primary" value="Kembali" onclick="location='<?=$def_page_request?>'"> 
					<input type="submit" class="btn btn-success" value="Simpan">
				</center>
				<input type="hidden" name="data_action" id="data_action"
					value="<?=$_nextaction?>">
			</fieldset>
		</form>
			</div>
		</section>
	</div>
</div>
<?php
$no = 0;
$rs_kategori = $params->risk_kategori_data_viewlist ();
while ( $arr_kategori = $rs_kategori->FetchRow () ) {
	$x = 0;
	$rs_iden = $risks->list_identifikasi ( $arr_kategori ['risk_kategori_id'], $ses_penetapan_id );
	while ( $arr_iden = $rs_iden->FetchRow () ) {
		$no ++;
		?>
<script>
			$("#date_<?=$no?>").datepicker({
				dateFormat: 'dd-mm-yy',
				 nextText: "",
				 prevText: "",
				 changeYear: true,
				 changeMonth: true,
				 minDate: 0
			}); 
			
			$('textarea.cmb_risk_<?=$no?>').focus(function () {
			   checkContentSize("penanganan_<?=$no?>");
			});
			$('textarea.cmb_risk_<?=$no?>').focusout(function(){
			    $(this).animate({ height: "2em" }, 500); 
			});
			$('textarea.cmb_risk_<?=$no?>').keypress(function (e) {
			  if (e.which == 13) {
			     checkContentSize("penanganan_<?=$no?>");
			  }
			});
		</script>
<?php
	}
}
?>
<script>
function has_scrollbar(elem_id){ 
    elem = document.getElementById(elem_id); 
    if (elem.clientHeight < elem.scrollHeight){
        alert("The element #" + elem_id + " has a vertical scrollbar!"); 
    }else{
        alert("The element #" + elem_id + " doesn't have a vertical");
    } ;
}

function checkContentSize(elem_id){
 	elem = document.getElementById(elem_id); 
    console.log(elem.clientHeight);
    if (elem.clientHeight < elem.scrollHeight){
        $( "#" + elem_id + "" ).animate({ height: elem.scrollHeight + 5}, 500); 
    }
}
$(function() {
	$(".penanganan_risk").on("change", function() {
		var penanganan = $(this).val(),
			action = $(this).parent().next().find("textarea");
			date_tenggak = $(this).parent().next().next().find("input[type='text']");
			pic = $(this).parent().next().next().next().find("select");

			$.ajax({
				url: 'RiskManagement/ajax.php?data_action=cek_penanganan',
				type: 'POST',
				dataType: 'text',
				data: {id_penanganan: penanganan},
				success: function(data) {
					if(data==1){
						action.attr("disabled", false).val();
						date_tenggak.attr("disabled", false).val();
						pic.attr("disabled", false).val();
					}else if(data==0){
						action.attr("disabled", true).val("");
						date_tenggak.attr("disabled", true).val("");
						pic.attr("disabled", true).val("");
					}	
				}
			});
			
			
	});
});
</script>