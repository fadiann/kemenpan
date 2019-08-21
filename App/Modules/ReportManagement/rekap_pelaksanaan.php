<?php
include_once "App/Classes/report_class.php";
$reports = new report ( $ses_userId );

if(isset($_REQUEST['fill_tahun'])):
    $tahun = $Helper->replacetext($_REQUEST['fill_tahun']);
    $rs    = $reports->rekap_pelaksanaan($tahun);
?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h4 class="panel-title">Rekap Pelaksanaan Tahun <?=$Helper->replacetext($_POST['fill_tahun']) ?></h4>
			</header>
			<div class="panel-body wrap">
                <table class="table table-bordered table-striped table-responsive table-hover">
                    <tr>
                        <th class="text-center" width="2%">No.</th>
                        <th class="text-center" width="22%">Nama Kegiatan</th>
                        <th class="text-center" width="18%">Nama Auditee</th>
                        <th class="text-center" width="22%">Susunan Tim</th>
                        <th class="text-center" width="12%">Pelaksanaan</th>
                        <th class="text-center" width="12%">Batas Waktu</th>
                        <th class="text-center" width="5%">Limit Hari</th>
                    </tr>
                    <?php 
                    $no = 1;
                    foreach($rs as $row): 
                        $hari_ini       = $Helper->date_db(date('d-m-Y'));
                        $selisih_hari = $row['assign_end_date'] - $hari_ini;
                        $selisih_hari = floor($selisih_hari / (60 * 60 * 24));
                        if($selisih_hari <= 0){
                            $selisih_hari = 0;
                            $warna = 'bg-danger';
                        }else{
                            $selisih_hari = $selisih_hari;
                            $warna = 'bg-success';
                        }
                    ?>
                    <tr>
                        <td class="text-center"><?=$no++;?></td>
                        <td><?=$Helper->text_show($row['assign_kegiatan'])?></td>
                        <td><?=$Helper->text_show($row['auditee_name'])?></td>
                        <td>
                            <?php 
                            $rs_tim = $reports->get_tim($row['assign_id']);
                            $x = 1;
                            foreach($rs_tim as $row_tim):
                                echo $x++.". ".$row_tim['auditor_name']." [".$row_tim['posisi_code']."]<br>";
                            endforeach;
                            ?>
                        </td>
                        <td class="text-center">
                            <?=$Helper->dateIndoLengkap($row['assign_start_date'])?></td>
                        <td class="text-center">
                            <?=$Helper->dateIndoLengkap($row['assign_end_date'])?>
                        </td>
                        <td class="text-center <?=$warna?>">
                            <?=$selisih_hari?> Hari
                        </td>
                    </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </section>
    </div>
</div>
<?php endif; ?>
