<?php
include_once "App/Classes/report_class.php";
$reports = new report ( $ses_userId );

if(isset($_REQUEST['fill_tahun'])):
    $tahun = $Helper->replacetext($_REQUEST['fill_tahun']);
    $rs    = $reports->rekap_laporan($tahun);
?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h4 class="panel-title">Daftar Rekap Laporan Tahun <?=$Helper->replacetext($_POST['fill_tahun']) ?></h4>
			</header>
			<div class="panel-body wrap">
                <table class="table table-bordered table-striped table-responsive table-hover">
                    <tr>
                        <th class="text-center" width="10%">No.</th>
                        <th class="text-center" width="50%">Nama Kegiatan</th>
                        <th class="text-center" width="20%">Tanggal Kegiatan</th>
                        <th class="text-center" width="20%">Action</th>
                    </tr>
                    <?php 
                    $no = 1;
                    foreach($rs as $row): 
                    ?>
                    <tr>
                        <td class="text-center"><?=$no++;?></td>
                        <td><?=$Helper->text_show($row['assign_kegiatan'])?></td>
                        <td class="text-center"><?=$Helper->dateIndoLengkap($row['assign_start_date'])?></td>
                        <td class="text-center">
                            <?php if(!empty($row['file_laporan'])): ?>
                            <a class="btn btn-xs btn-primary" href="Public/Upload/Upload_Audit/<?=$row['file_laporan']?>" target="_blank">Lihat Laporan</a>
                            <?php else: ?>
                            Belum Tersedia
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </section>
    </div>
</div>
<?php endif; ?>
