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
				<table class="table table-bordered table-striped table-condensed mb-none">
						<tr>
							<th class="text-center" width="5%" rowspan="2">No</th>
							<th class="text-center" width="35%" colspan="3">Hasil Analisis Risiko</th>
							<th class="text-center" width="15%" rowspan="2">Pilihan<br>Penanganan<br>Risiko</th>
							<th class="text-center" width="45%" colspan="3">Tindak Pengendalian</th>
						</tr>
						<tr>
							<th class="text-center" width="15%">Kategori Risiko</th>
							<th class="text-center" width="20%">Nama Risiko</th>
							<!-- <th>Nilai<br>Risiko<br>Residu</th> -->
							<th class="text-center" width="10%">Besaran Risiko</th>
							<th class="text-center" width="20%">Kegiatan</th>
							<th class="text-center" width="10%">Jadwal</th>
							<th class="text-center" width="20%">Penanggung Jawab</th>
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
									$i ++;
									?>
							<td class="text-center"><?=$i?>.</td>
							<td><?=$arr_iden['risk_kategori'];?></td>
							<td><?=$arr_iden['identifikasi_nama_risiko'];?></td>
									<?php
										$risk_level = $arr_iden['analisa_ri'];
										if ($risk_level == '' || $risk_level == 0) {
											$warna = "white";
											$txtcolor = "black";
										} elseif ($risk_level > 0 && $risk_level <= 5) {
											$warna = "blue";
											$txtcolor = "white";
										} elseif ($risk_level >= 6 && $risk_level <= 11) {
											$warna = "green";
											$txtcolor = "white";
										} elseif ($risk_level >= 12 && $risk_level <= 15) {
											$warna = "yellow";
											$txtcolor = "black";
										} elseif ($risk_level >= 16 && $risk_level <= 19) {
											$warna = "orange";
											$txtcolor = "white";
										} elseif ($risk_level >= 20 && $risk_level <= 25) {
											$warna = "red";
											$txtcolor = "white";
										} else {
											$warna = "white";
											$txtcolor = "black";
										}
							?>
							<td class="text-center" style="background:<?= $warna?>; color:<?= $txtcolor?>"><?= $arr_iden['analisa_ri'] ?></td>
							<td align="center">
							<?
								$rs_td = $params->risk_penanganan_data_viewlist ();
								$arr_td = $rs_td->GetArray ();
								echo $Helper->buildCombo_risk ( "pil_penanganan_" . $no, $arr_td, 0, 1, $arr_iden ['penanganan_risiko_id'], "", false, true, false, "penanganan_risk" );
								?>
							</td>
							<td align="center">
								<textarea name="penanganan_<?=$no?>" rows="2" class="form-control"><?=$arr_iden['penanganan_plan']?></textarea>
							</td>
							<td align="center"><input type="text" class="form-control" name="date_<?=$no?>" id="date_<?=$no?>" value="<?=$Helper->dateIndo($arr_iden['penanganan_date'])?>"></td>
							<td align="center">
								<?//=$Helper->dbCombo("pic_".$no, "auditee_pic", "pic_id", "pic_name", "and pic_del_st = 1 and pic_auditee_id = '".$arr_iden['penetapan_auditee_id']."'", $arr_iden['penanganan_pic_id'], "cmb_risk", 1)?>
								<input type="text" name="<?="pic_".$no?>" value="<?=$arr_iden['penanganan_pic_id']?>" class="form-control">
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
