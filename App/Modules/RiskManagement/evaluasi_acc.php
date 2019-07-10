<script type="text/javascript" src="Public/js/jquery-ui-1.10.1.custom.min.js"></script>
<section id="main" class="column">
		<?
		include 'risk_view_parrent.php';
		?>
	<article class="module width_3_quarter">
		<form method="post" name="f" action="#" class="form-horizontal">
		<?
		switch ($_action) {
			case "getadd" :
				?>
		<table border='1' class="table table-bordered table-striped table-condensed mb-none" cellspacing='0' cellpadding="0">
				<tr align="center">
					<th width="2%" rowspan="2">No</th>
					<th width="58%" colspan="7">Risiko Inheren</th>
					<th width="30%" colspan="2">Pengendalian Internal</th>
					<th width="6%" rowspan="2">Risiko Residu</th>
				</tr>
				<tr align="center">
					<th>Kategori Risiko</th>
					<th>Bobot<br>Kategori<br>Risiko<br>(%)
					</th>
					<th>No Risiko</th>
					<th>Nama Risiko</th>
					<th>Selera Risiko</th>
					<th>RI</th>
					<th>Bobot<br>Risiko
					</th>
					<th>Komponen<br> Pengendalian
					</th>
					<th>Efektivitas<br>Pengendalian
					</th>
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
						$rs_val_ri = $risks->cek_range_ri ( $arr_iden ['analisa_ri'] );
						$get_val_ri = $rs_val_ri->FetchRow ();
						?>
				<tr>
					<?php
						if ($x == 1) {
							$i ++;
							?>
					<td rowspan=<?=$countKat?>><?=$i?></td>
					<td rowspan=<?=$countKat?>><?=$arr_iden['risk_kategori'];?></td>
					<td rowspan=<?=$countKat?>><?=$arr_iden['analisa_bobot_kat_risk'];?></td>
					<?php
						}
						?>
					<td><?=$arr_iden['identifikasi_no_risiko'];?></td>
					<td><?=$arr_iden['identifikasi_nama_risiko'];?></td>
					<td><?=$arr_iden['identifikasi_selera'];?></td>
					<td><label class="label_ri"><?=$get_val_ri['ri_value'];?></label></td>
					<td><?=$arr_iden['analisa_bobot_risk'];?> %</td>
					<td align="center"><textarea class="cmb_risk_<?=$no?>" id="komponen_<?=$no?>" name="komponen_<?=$no?>" rows="1" cols="20" style="width: 175px; height: 2em; font-size: 8pt;"><?=$arr_iden['evaluasi_komponen']?></textarea>
					 </td>
					<td align="center">
					<?
						$rs_td = $params->risk_pi_data_viewlist ();
						$arr_td = $rs_td->GetArray ();
						echo $Helper->buildCombo_risk ( "pi_id_" . $no, $arr_td, 2, 3, $arr_iden ['evaluasi_efektifitas'], "font-size:8pt", false, true, false, "test_risk" );
						?>
					</td>
					<td align="center"><label class="rr"><?=$arr_iden['evaluasi_risiko_residu']?></label></td>
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
			<fieldset class="form-group">
				<center>
					<input type="button" class="btn btn-primary" value="Kembali"
						onclick="location='<?=$def_page_request?>'"> &nbsp;&nbsp;&nbsp; <input
						type="submit" class="btn btn-success" value="Simpan">
				</center>
				<input type="hidden" name="data_action" id="data_action"
					value="<?=$_nextaction?>">
			</fieldset>
		</form>
	</article>
</section>
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
			$('textarea.cmb_risk_<?=$no?>').focus(function () {
			   checkContentSize("komponen_<?=$no?>");
			});
			$('textarea.cmb_risk_<?=$no?>').focusout(function(){
			    $(this).animate({ height: "2em" }, 500); 
			});
			$('textarea.cmb_risk_<?=$no?>').keypress(function (e) {
			  if (e.which == 13) {
			     checkContentSize("komponen_<?=$no?>");
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
	$(".test_risk").on("change", function() {
		var val_pi = $(this).val(),
			val_ri = $(this).parent().prev().prev().prev().find(".label_ri").text(),
			label = $(this).parent().next().find(".rr");

		if(val_ri > 0 && val_pi > 0){
			console.log("val_ri: " + val_ri + ", val_pi: " + val_pi);
			$.ajax({
				url: 'RiskManagement/ajax.php?data_action=getval_rr',
				type: 'POST',
				dataType: 'text',
				data: {nilai_ri: val_ri, nilai_pi: val_pi},
				success: function(data) {
					label.text(data);			
				}
			});
		}
	});	
});


</script>