
<div class="col-md-12">
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title"><?=$page_title?></h2>
        </header>
        <div class="panel-body">
            <table class="table table-borderless">
                <tr>
                    <td width="20%"><strong>TAHUN</strong></td>
                    <td width="2%"><strong>:</strong></td>
                    <td><strong><?=$filter_tahun?></strong></td>
                </tr>
                <tr>
                    <td><strong>NAMA AUDITOR</strong></td>
                    <td><strong>:</strong></td>
                    <td><strong><?=$row_auditor['auditor_name']?></strong></td>
                </tr>
            </table>
            <table class="table table-bordered table-condensed table-hover">
                <tr>
                    <th class="text-center" width="2%">No.</th>
                    <th class="text-center" width="25%">Nama Kegiatan</th>
                    <th class="text-center" width="20%">Audit Program</th>
                    <th class="text-center" width="16%">Auditee</th>
                    <th class="text-center" width="12%">Tanggal Selesai</th>
                    <th class="text-center" width="8%">Status PKA</th>
                    <th class="text-center" width="8%">Status KKA</th>
                    <th class="text-center" width="8%">Status Temuan</th>
                </tr>
                <?php 
                $count = $rs->recordCount();
                if($count == 0){
                    echo "<tr><td colspan='8' class='text-center'>Data Tidak Ditemukan!</td></tr>";
                }else{
                    $x = 1;
                    while($row = $rs->FetchRow()):
                        $status_pka = $row['program_status'];
                        if($status_pka == 1){
                            $warna_pka = "class='bg-danger'";
                            $status_pka = 'Belum Di Review';
                        }elseif($status_pka == 2){
                            $warna_pka = "class='bg-success'";
                            $status_pka = 'Di Setujui Dalnis';
                        }elseif($status_pka == 3){
                            $warna_pka = "class='bg-warning'";
                            $status_pka = 'Di Tolak Dalnis';
                        }else{
                            $warna_pka = "class='bg-danger'";
                            $status_pka = 'Belum Di Review';
                        }
                ?>
                <tr>
                    <td class="text-center"><?=$x++?>.</td>
                    <td><?=$row['assign_kegiatan']?></td>
                    <td><?=$row['ref_program_title']?></td>
                    <td><?=$row['auditee_name']?></td>
                    <td class="text-center"><?=$Helper->dateIndoLengkap($row['assign_end_date'])?></td>
                    <td <?=$warna_pka?>><?=$status_pka?></td>
                    <?php 
                    $row_kka = $dashboards->rekap_kka_by_pka($row['program_id'])->FetchRow();
                    $status_kka = $row_kka['kertas_kerja_status'];
                    if($status_kka == ''){
                        $status_kka = 0;
                        $warna_kka = "class='bg-default'";
                        $status_kka = 'Belum Ada Pengajuan';
                    }
                    if($status_kka == 1){
                        $warna_kka = "class='bg-danger'";
                        $status_kka = 'Sedang Di Reviw Katim';
                    }elseif($status_kka == 2){
                        $warna_kka = "class='bg-success'";
                        $status_kka = 'Di Setujui Katim';
                    }elseif($status_kka == 3){
                        $warna_kka = "class='bg-warning'";
                        $status_kka = 'Di Tolak Katim';
                    }else{
                        $warna_kka = "class='bg-danger'";
                        $status_kka = 'Belum Ada Pengajuan';
                    }
                    //echo $status_kka;
                    ?>
                    <td <?=$warna_kka?>>
                    <?=$status_kka?>
                    </td>

                    <?php 
                    $row_finding = $dashboards->rekap_finding_by_kka($row_kka['kertas_kerja_id'])->FetchRow();
                    $status_finding  = $row_finding['finding_status'];
                    if($status_finding == ''){
                        $status_finding = 0;
                        $warna_finding = "class='bg-default'";
                        $status_finding = 'Belum Ada Pengajuan';
                    }
                    if($status_finding == 1){
                        $warna_finding = "class='bg-info'";
                        $status_finding = 'Sedang Di Reviw Katim';
                    }elseif($status_finding == 2){
                        $warna_finding = "class='bg-success'";
                        $status_finding = 'Di Setujui Katim';
                    }elseif($status_finding == 3){
                        $warna_finding = "class='bg-info'";
                        $status_finding = 'Telah Di Review Dalnis, Menunggu Review Inspektur';
                    }elseif($status_finding == 4){
                        $warna_finding = "class='bg-success'";
                        $status_finding = 'Telah Di Setujui';
                    }elseif($status_finding == 5){
                        $warna_finding = "class='bg-warning'";
                        $status_finding = 'Ditolak Katim';
                    }elseif($status_finding == 6){
                        $warna_finding = "class='bg-warning'";
                        $status_finding = 'Ditolak Dalnis, Menunggu Perbaikan Katim';
                    }elseif($status_finding == 7){
                        $warna_finding = "class='bg-warning'";
                        $status_finding = 'Ditolak Inspektur, Menunggu Perbaikan Dalnis';
                    }elseif($status_finding == 8){
                        $warna_finding = "class='bg-warning'";
                        $status_finding = 'Selesai';
                    }else{
                        $warna_finding = "class='bg-danger'";
                        $status_finding = 'Belum Ada Pengajuan';
                    }
                    //echo $status_finding;
                    ?>
                    <td <?=$warna_finding?>>
                        <?=$status_finding?>
                    </td>
                </tr>
                <?php endwhile ?>
                <?php } ?>
            </table>
            <center>
                <a class="btn btn-primary" href="main.php">Kembali</a>
            </center>
        </div>		
	</section>
</div>
