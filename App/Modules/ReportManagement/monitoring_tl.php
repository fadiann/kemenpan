<link href="Public/css/responsive-tabs.css" rel="stylesheet" type="text/css" />
<script src="Public/js/responsive-tabs.js" type="text/javascript"></script>
<?
include_once "App/Classes/dashboard_class.php";
$dashboards = new dashboard ( $ses_userId );
$tahun = $Helper->replacetext($_POST["fil_tahun_id"]);
@$tipe_audit = $Helper->replacetext($_POST["tipe_audit"]);
@$status = $Helper->replacetext($_POST["status_tl"]);
$rs_auditees = $dashboards->auditee_list($tahun, $tipe_audit);
?>
<section id="main" class="column">
  <article class="module width_3_quarter">
    <header>
      <h3 class="tabs_involved">Monitoring Tindak Lanjut <?=($tahun) ? " Tahun {$tahun}" : "" ?></h3>
    </header>
    <br>
    <table border='1' class="table_risk" width="5%" cellspacing='0' cellpadding="0">
        <tr><th width="3%" align="center" class="text-center">No</th><th align="center" colspan="5" class="text-center">Obyek Audit</th></tr>
        <?php $rs_auditees2 = $dashboards->auditee_list($tahun, $tipe_audit, $status) ?>
        <?php if ($rs_auditees2->RecordCount() > 0): ?>
            <?php foreach ($rs_auditees2 as $key1 => $auditee): ?>
                <tr><td class="text-center" style="border-bottom-style: none; border-top: 0"><strong><?= $key1+1 ?></strong></td><td colspan="5"><strong><?= $auditee['auditee_title'] ?></strong></td></tr>
                <tr>
                    <td style="border-bottom-style: none;border-top-style: none;"></td>
                    <th style="background: lightgrey" class="text-center" width="25%">Temuan</th>
                    <th class="text-center" style="background: lightgrey" width="25%">Rekomendasi</th>
                    <th class="text-center" style="background: lightgrey" width="10%">Batas Waktu</th>
                    <th style="background: lightgrey" width="25%" class="text-center">Tindak Lanjut</th>
                    <th style="background: lightgrey" width="10%" class="text-center">Status TL</th>
                </tr>
                <?php $rs_temuan = $dashboards->temuan_list($auditee['auditee_id'], $tahun) ?>
                <?php foreach ($rs_temuan as $key2 => $temuan): ?>
                    <?php $rs_rekomendasi = $dashboards->rekomendasi_per_temuan($temuan['finding_id']); ?>
                    <?php foreach ($rs_rekomendasi as $key3 => $rekomendasi): ?>
                        <?php $rs_tl = $dashboards->tl_per_rekomendasi($rekomendasi['rekomendasi_id'], $status); ?>
                        <?php foreach ($rs_tl as $key4 => $tl): ?>
                             <tr>
                                <?php if ($key3+1 == 1 && $key4+1 == 1): ?>
                                    <?php if ($dashboards->count_rekomendasi_per_temuan($temuan['finding_id'], $status) > $rs_tl->RecordCount()): ?>
                                        <td style="border-bottom-style: none;border-top-style: none;" rowspan="<?= $dashboards->count_rekomendasi_per_temuan($temuan['finding_id'], $status) ?>"></td>
                                        <td rowspan="<?= $dashboards->count_rekomendasi_per_temuan($temuan['finding_id'], $status) ?>"><?= $temuan['finding_judul'] ?></td>
                                    <?php else: ?>
                                        <td style="border-bottom-style: none;border-top-style: none;" rowspan="<?= $rs_tl->RecordCount() ?>"></td>
                                        <td rowspan="<?= $rs_tl->RecordCount() ?>"><?= $temuan['finding_judul'] ?></td>
                                    <?php endif; ?>
                                <?php endif ?>
                                <?php if ($key4+1 == 1): ?>
                                    <td rowspan="<?= $rs_tl->RecordCount()?>"><?= $Helper->text_show($rekomendasi['rekomendasi_desc'])?></td>
                                    <td rowspan="<?= $rs_tl->RecordCount()?>"><?= $Helper->dateIndo($rekomendasi['rekomendasi_dateline'])?></td>
                                <?php endif ?>
                                <td><?= ($Helper->text_show($tl['tl_desc'])) ? $Helper->text_show($tl['tl_desc']) : '-'?></td>
                                <td><?php  
                                    if ($tl['tl_status'] != '') {
                                        if ($tl['tl_status']==0) {
                                            echo "Belum Diajukan";
                                        }else if ($tl['tl_status']==1) {
                                            echo "Sedang Menunggu Persetujuan";
                                        }else if ($tl['tl_status']==3) {
                                            echo "Dalam Proses";
                                        } 
                                        if ($tl['tl_status']==2) {
                                            echo "Selesai";
                                        }else if ($tl['tl_status']==4) {
                                            echo "Onprogress";
                                        }
                                    } else {
                                        echo '-';
                                    }
                                ?></td>
                            </tr>
                        <?php endforeach ?>
                    <?php endforeach ?>
                <?php endforeach ?>
            <?php endforeach ?>
        <?php else: ?>
            <tr><td colspan="6" align="center">Data tidak ada</td></tr>
        <?php endif ?>
    </table>
    <br><br>
    <fieldset>
            <center>
                <input type="button" class="blue_btn" value="ms-excel" onclick="window.open('ReportManagement/monitoring_tl_excel.php?fil_tahun_id=<?= $tahun ?>&status_tl=<?= $status ?>','toolbar=no, location=no, status=no, menubar=yes, scrollbars=yes, resizable=yes');">
            </center>
        </fieldset>
  </article>
</section>