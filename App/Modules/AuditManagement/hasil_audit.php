<script type="text/javascript" src="Public/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="Public/js/jquery-ui-1.10.1.custom.min.js"></script>
<link rel="stylesheet" href="Public/css/jquery.ui.datepicker.css">
<script type="text/javascript" src="Public/ckeditor/ckeditor.js"></script>
<link href="Public/css/responsive-tabs.css" rel="stylesheet" type="text/css" />
<script src="Public/js/responsive-tabs.js" type="text/javascript"></script>
<style>
.nostyle {	
    width:210mm;
	font-family: Arial, 'Libre Barcode 128', cursive;
	font-size: 12;
    animation : none;
    animation-delay : 0;
    animation-direction : normal;
    animation-duration : 0;
    animation-fill-mode : none;
    animation-iteration-count : 1;
    animation-name : none;
    animation-play-state : running;
    animation-timing-function : ease;
    backface-visibility : visible;
    background : 0;
    background-attachment : scroll;
    background-clip : border-box;
    background-color : transparent;
    background-image : none;
    background-origin : padding-box;
    background-position : 0 0;
    background-position-x : 0;
    background-position-y : 0;
    background-repeat : repeat;
    background-size : auto auto;
    border : 0;
    border-style : none;
    border-width : medium;
    border-color : inherit;
    border-bottom : 0;
    border-bottom-color : inherit;
    border-bottom-left-radius : 0;
    border-bottom-right-radius : 0;
    border-bottom-style : none;
    border-bottom-width : medium;
    border-collapse : separate;
    border-image : none;
    border-left : 0;
    border-left-color : inherit;
    border-left-style : none;
    border-left-width : medium;
    border-radius : 0;
    border-right : 0;
    border-right-color : inherit;
    border-right-style : none;
    border-right-width : medium;
    border-spacing : 0;
    border-top : 0;
    border-top-color : inherit;
    border-top-left-radius : 0;
    border-top-right-radius : 0;
    border-top-style : none;
    border-top-width : medium;
    bottom : auto;
    box-shadow : none;
    box-sizing : content-box;
    caption-side : top;
    clear : none;
    clip : auto;
    color : inherit;
    columns : auto;
    column-count : auto;
    column-fill : balance;
    column-gap : normal;
    column-rule : medium none currentColor;
    column-rule-color : currentColor;
    column-rule-style : none;
    column-rule-width : none;
    column-span : 1;
    column-width : auto;
    content : normal;
    counter-increment : none;
    counter-reset : none;
    cursor : auto;
    direction : ltr;
    display : inline;
    empty-cells : show;
    float : none;
    font : normal;
    font-family : inherit;
    font-size : medium;
    font-style : normal;
    font-variant : normal;
    font-weight : normal;
    height : auto;
    hyphens : none;
    left : auto;
    letter-spacing : normal;
    line-height : normal;
    list-style : none;
    list-style-image : none;
    list-style-position : outside;
    list-style-type : disc;
    margin : 0;
    margin-bottom : 0;
    margin-left : 0;
    margin-right : 0;
    margin-top : 0;
    max-height : none;
    max-width : none;
    min-height : 0;
    min-width : 0;
    opacity : 1;
    orphans : 0;
    outline : 0;
    outline-color : invert;
    outline-style : none;
    outline-width : medium;
    overflow : visible;
    overflow-x : visible;
    overflow-y : visible;
    padding : 0;
    padding-bottom : 0;
    padding-left : 0;
    padding-right : 0;
    padding-top : 0;
    page-break-after : auto;
    page-break-before : auto;
    page-break-inside : auto;
    perspective : none;
    perspective-origin : 50% 50%;
    position : static;
    /* May need to alter quotes for different locales (e.g fr) */
    quotes : '\201C' '\201D' '\2018' '\2019';
    right : auto;
    tab-size : 8;
    table-layout : auto;
    text-align : inherit;
    text-align-last : auto;
    text-decoration : none;
    text-decoration-color : inherit;
    text-decoration-line : none;
    text-decoration-style : solid;
    text-indent : 0;
    text-shadow : none;
    text-transform : none;
    top : auto;
    transform : none;
    transform-style : flat;
    transition : none;
    transition-delay : 0s;
    transition-duration : 0s;
    transition-property : none;
    transition-timing-function : ease;
    unicode-bidi : normal;
    vertical-align : baseline;
    visibility : visible;
    white-space : normal;
    widows : 0;
    width : auto;
    word-spacing : normal;
    z-index : auto;
    /* basic modern patch */
    all: initial;
    all: unset;
}

</style>
<?php 

$rs  = $assigns->assign_viewlist ( $assign_id );
$arr = $rs->FetchRow();
// var_dump($arr);

// $rs_auditee          = $assigns->auditee_detil ( $auditee_id );
// $arr_auditee         = $rs_auditee->FetchRow();
// $assign_id_auditee   = $arr_auditee['auditee_id'];
// $assign_nama_auditee = $arr_auditee['auditee_name'];

$rs_lha  = $assigns->assign_lha_viewlist ( $arr ['assign_id'] );
$arr_lha = $rs_lha->FetchRow ();

$cek_posisi = $findings->cek_posisi($arr['assign_id']);
?>

<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title"><?=$page_title?> <?=strtoupper($arr['audit_type_name'])?></h2>
			</header>
			<div class="panel-body wrap">
	    <form method="post" name="f" action="#" class="form-horizontal" id="validation-form" enctype="multipart/form-data"  onsubmit="return cek_data()">
			<fieldset class="form-group">
                <div class="col-md-12">
                    <div class="tabs">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#a" data-toggle="tab">Ringkasan</a>
                            </li>
                            <li>
                                <a href="#b" data-toggle="tab">Dasar Hukum</a>
                            </li>
                            <li>
                                <a href="#c" data-toggle="tab">Tujuan</a>
                            </li>
                            <li>
                                <a href="#d" data-toggle="tab">Ruang Lingkup</a>
                            </li>
                            <li>
                                <a href="#e" data-toggle="tab">Metodologi</a>
                            </li>
                            <li>
                                <a href="#f" data-toggle="tab">Uraian</a>
                            </li>
                            <li>
                                <a href="#g" data-toggle="tab">Rekomendasi</a>
                            </li>
                            <li>
                                <a href="#h" data-toggle="tab">Lain-Lain</a>
                            </li>
                            <li>
                                <a href="#i" data-toggle="tab">Apresiasi</a>
                            </li>
                            <!-- <li>
                                <a href="#j" data-toggle="tab">Upload</a>
                            </li> -->
                            <li>
                                <a href="#k" data-toggle="tab">Laporan</a>
                            </li>
                            <li>
                                <a href="#l" data-toggle="tab">Upload Laporan</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="a" class="tab-pane active">
                                <fieldset class="form-group">
                                    <div class="col-sm-12">
                                        <textarea id="text1" name="ringkasan"><?=$Helper->showHtml($row_laporan['ringkasan'])?></textarea>
                                    </div>
                                </fieldset>
                            </div>
                            <div id="b" class="tab-pane">
                                <fieldset class="form-group">
                                    <div class="col-sm-12">
                                        <textarea id="text2" name="dasar"><?=$Helper->showHtml($row_laporan['dasar'])?></textarea>
                                    </div>
                                </fieldset>
                            </div>
                            <div id="c" class="tab-pane">
                                <fieldset class="form-group">
                                    <div class="col-sm-12">
                                        <textarea id="text3" name="tujuan"><?=$Helper->showHtml($row_laporan['tujuan'])?></textarea>
                                    </div>
                                </fieldset>
                            </div>
                            <div id="d" class="tab-pane">
                                <fieldset class="form-group">
                                    <div class="col-sm-12">
                                        <textarea id="text4" name="ruang"><?=$Helper->showHtml($row_laporan['ruang'])?></textarea>
                                    </div>
                                </fieldset>
                            </div>
                            <div id="e" class="tab-pane">
                                <fieldset class="form-group">
                                    <div class="col-sm-12">
                                        <textarea id="text5" name="metodologi"><?=$Helper->showHtml($row_laporan['metodologi'])?></textarea>
                                    </div>
                                </fieldset>
                            </div>
                            <div id="f" class="tab-pane">
                                <fieldset class="form-group">
                                    <div class="col-sm-12">
                                        <textarea id="text6" name="uraian"><?=$Helper->showHtml($row_laporan['uraian'])?></textarea>
                                    </div>
                                </fieldset>
                            </div>
                            <div id="g" class="tab-pane">
                                <fieldset class="form-group">
                                    <div class="col-sm-12">
                                        <textarea id="text7" name="rekomendasi"><?=$Helper->showHtml($row_laporan['rekomendasi'])?></textarea>
                                    </div>
                                </fieldset>
                            </div>
                            <div id="h" class="tab-pane">
                                <fieldset class="form-group">
                                    <div class="col-sm-12">
                                        <textarea id="text8" name="lainlain"><?=$Helper->showHtml($row_laporan['lainlain'])?></textarea>
                                    </div>
                                </fieldset>
                            </div>
                            <div id="i" class="tab-pane">
                                <fieldset class="form-group">
                                    <div class="col-sm-12">
                                        <textarea id="text9" name="apresiasi"><?=$Helper->showHtml($row_laporan['apresiasi'])?></textarea>
                                    </div>
                                </fieldset>
                            </div>
                            <input type="hidden" value="<?=$row_laporan['assignment_laporan_id']?>" name="laporan_id">
                            <!-- <div id="j" class="tab-pane">
                                <fieldset class="form-group">
                                    <div class="col-sm-12">
                                        <input type="file" name="file[]" class="form-contol">
                                    </div>
                                </fieldset>
                            </div> -->
                            <div id="k" class="tab-pane">
                                <fieldset class="form-group">
                                    <div class="col-sm-12">
                                        <div class="nostyle">
                                            <h3>RINGKASAN HASIL <?=strtoupper($arr['audit_type_name'])?></h3>
                                            <?=$Helper->showHtml($row_laporan['ringkasan'])?>
                                            <h3>DASAR HUKUM</h3>
                                            <?=$Helper->showHtml($row_laporan['dasar'])?>
                                            <h3>TUJUAN <?=strtoupper($arr['audit_type_name'])?></h3>
                                            <?=$Helper->showHtml($row_laporan['tujuan'])?>
                                            <h3>RUANG LINGKUP</h3>
                                            <?=$Helper->showHtml($row_laporan['ruang'])?>
                                            <h3>METODOLOGI <?=strtoupper($arr['audit_type_name'])?></h3>
                                            <?=$Helper->showHtml($row_laporan['metodologi'])?>
                                            <h3>URAIAN HASIL <?=strtoupper($arr['audit_type_name'])?></h3>
                                            <?=$Helper->showHtml($row_laporan['uraian'])?>
                                            <h3>REKOMENDASI</h3>
                                            <?=$Helper->showHtml($row_laporan['rekomendasi'])?>
                                            <h3>HAL-HAL LAIN YANG PERLU DIUNGKAPKAN</h3>
                                            <?=$Helper->showHtml($row_laporan['lainlain'])?>
                                            <h3>APRESIASI</h3>
                                            <?=$Helper->showHtml($row_laporan['apresiasi'])?>
                                            
                                            <table width="90%" align="center">
                                                <tr>
                                                    <td width="60%">&nbsp;</td>
                                                    <td>
                                                        <table>
                                                            <tr>
                                                                <td>Ditetapkan di&nbsp;</td>
                                                                <td>&nbsp;:&nbsp;</td>
                                                                <td>&nbsp;Jakarta</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Pada Tanggal&nbsp;</td>
                                                                <td>&nbsp;:&nbsp;</td>
                                                                <td>&nbsp;<?//=$Helper->dateIndoLengkap($arr['assign_surat_tgl'])?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong><?//=$arr['jenis_jabatan_sub']?></strong></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        </table>
                                                        <br><br><br><br>
                                                        <u>Budi Prawira</u><br>
                                                        NIP. 196501201985031001
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <br><br>
                                    <br><br>
                                    <center>
                                        <a href="Api/laporan_print.php?id=<?=$row_laporan['assignment_laporan_id']?>" target="_blank" class="btn btn-primary"><i class="fa fa-download"></i> Download</a>
                                    </center>
                                </fieldset>
                            </div>

                            <div id="l" class="tab-pane">
                                <fieldset class="form-group">
                                    <div class="col-sm-12">
                                        <fieldset class="form-group mt-lg">
                                            <label class="col-sm-4 control-label">File <span class="required">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="file" name="fake_laporan" class="form-control">
                                                <input type="hidden" name="old_fake_laporan" class="form-control" value="<?=$row_laporan['file_laporan']?>"
                                            </div>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label class="col-sm-4 control-label">Lampiran <span class="required">*</span></label>
                                            <div class="col-sm-5 control-label text-left">
                                                <?php if(!empty($row_laporan['file_laporan'])): ?>
                                                <?=$Helper->showHtml($row_laporan['file_laporan'])?> <a class="btn btn-xs btn-primary" href="Public/Upload/Upload_Audit/<?=$row_laporan['file_laporan']?>" target="_blank">Lihat</a>
                                                <?php endif; ?>
                                            </div>
                                        </fieldset>
                                    </div>
                                </fieldset>
                            </div>

                        </div>
                    </div>
                </div>
			</fieldset>
		<fieldset class="form-group mb-lg">
			<center>
					<input type="button" class="btn btn-primary" value="Kembali" onclick="location='<?=$def_page_request?>'">
					<?
                    //0=default, 1=ajukan, 2=approve_dalnis, 3=approve_daltu, 4=approve_inspektur, 5=tolak_dalnis, 6=tolak_daltu, 7=tolak_inspektur
                    $status_laporan = $row_laporan ['status'];
                    // echo $cek_posisi;
					// if($cek_posisi=='8918ca5378a1475cd0fa5491b8dcf3d70c0caba7' || $cek_posisi=='24e3c696dcb9ff44b17eafb85d9d15ffe330b80d' || $cek_posisi=='4d6cb5538c7cfbd6b1ccbd881e0e97e69183b4a0'){ //katim
						if ($status_laporan == '0' || $status_laporan == '5') {
							echo "&nbsp;&nbsp;&nbsp;<input type=\"submit\" class=\"btn btn-success\" value=\"Simpan\">";
							echo "&nbsp;&nbsp;&nbsp;<input type=\"submit\" class=\"btn btn-success\" value=\"Simpan Dan Ajukan\" onclick=\"document.getElementById('status_lha').value=1\">";
						} else if ($status_laporan == '1' || $status_laporan == '6') {
                            if($ses_group_id == '24e3c696dcb9ff44b17eafb85d9d15ffe330b80d') {
                                // var_dump($_SESSION);
                                echo "&nbsp;&nbsp;&nbsp;<input type=\"submit\" class=\"btn btn-success\" value=\"Tolak Pengajuan\" onclick=\"document.getElementById('status_lha').value=5\">";
                                echo "&nbsp;&nbsp;&nbsp;<input type=\"submit\" class=\"btn btn-success\" value=\"Setujui\" onclick=\"document.getElementById('status_lha').value=3\">";
                            }
						} else if ($status_laporan == '2' || $status_laporan == '7') {
                            if($_SESSION ['ses_groupId'] == '4d6cb5538c7cfbd6b1ccbd881e0e97e69183b4a0') {
							echo "&nbsp;&nbsp;&nbsp;<input type=\"submit\" class=\"btn btn-success\" value=\"Tolak Pengajuan\" onclick=\"document.getElementById('status_lha').value=6\">";
                            echo "&nbsp;&nbsp;&nbsp;<input type=\"submit\" class=\"btn btn-success\" value=\"Setujui\" onclick=\"document.getElementById('status_lha').value=3\">";
                            }
						} else if ($status_laporan == '3') {
							echo "&nbsp;&nbsp;&nbsp;<input type=\"submit\" class=\"btn btn-success\" value=\"Tolak Pengajuan\" onclick=\"document.getElementById('status_lha').value=7\">";
							echo "&nbsp;&nbsp;&nbsp;<input type=\"submit\" class=\"btn btn-success\" value=\"Setujui\" onclick=\"document.getElementById('status_lha').value=4\">";
						}
					//}
                    ?>
                    <!-- <input type="submit" class="btn btn-success" value="Simpan"> -->
					<input type="hidden" name="status_lha" id="status_lha" value="">
					<input type="hidden" name="data_id" value="<?=$arr['assign_id']?>">	
					<input type="hidden" name="lha_id" value="<?=$arr_lha['lha_id']?>">	
					<input type="hidden" name="data_action" id="data_action" value="<?=$_nextaction?>">
			</center>
		</fieldset>
	</form>
			</div>
		</section>
	</div>
</div>
<script> 
function cek_data(){
	var data = document.getElementById('status_lha').value;
	if(data==1) text = "Anda Yakin Akan Mengajukan?";
	if(data==2) text = "Anda Yakin Akan Menyetujui dan Ajukan?";
	if(data==3) text = "Anda Yakin Akan Menyetujui dan Ajukan?";
	if(data==4) text = "Anda Yakin Akan Menyetujui?";
	if(data==5) text = "Anda Yakin Akan Menolak?";
	if(data==6) text = "Anda Yakin Akan Menolak?";
	if(data==7) text = "Anda Yakin Akan Menolak?";
	return confirm(text);
}

function makeFileList() {
	var input = document.getElementById("attach");
	var label = document.getElementById("fileList_label");
	var ul = document.getElementById("fileList");
	while (ul.hasChildNodes()) {
		ul.removeChild(ul.firstChild);
	}
	for (var i = 0; i < input.files.length; i++) {
		var li = document.createElement("li");
		label.text(input.files[i].name);
		li.innerHTML = input.files[i].name;
		ul.appendChild(li);
	}
	if(!ul.hasChildNodes()) {
		var li = document.createElement("li");
		li.innerHTML = 'No Files Selected';
		ul.appendChild(li);
	}
}
$("#tanggal_lha").datepicker({
	dateFormat: 'dd-mm-yy',
	 nextText: "",
	 prevText: "",
	 changeYear: true,
	 changeMonth: true
}); 
</script>

<script>
    $(document).ready(function() {
        $('#text1').summernote({
            placeholder: "Ketikan sesuatu disini . . .",
            height: '400'
        });
        $('#text2').summernote({
            placeholder: "Ketikan sesuatu disini . . .",
            height: '400'
        });
        $('#text3').summernote({
            placeholder: "Ketikan sesuatu disini . . .",
            height: '400'
        });
        $('#text4').summernote({
            placeholder: "Ketikan sesuatu disini . . .",
            height: '400'
        });
        $('#text5').summernote({
            placeholder: "Ketikan sesuatu disini . . .",
            height: '400'
        });
        $('#text6').summernote({
            placeholder: "Ketikan sesuatu disini . . .",
            height: '400'
        });
        $('#text7').summernote({
            placeholder: "Ketikan sesuatu disini . . .",
            height: '400'
        });
        $('#text8').summernote({
            placeholder: "Ketikan sesuatu disini . . .",
            height: '400'
        });
        $('#text9').summernote({
            placeholder: "Ketikan sesuatu disini . . .",
            height: '400'
        });
    });
</script>