<div class="row">
	<div class="col-md-12">
		<section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title"><?=$page_title?></h2>
            </header>
            <div class="panel-body">
                <table class="table table-borderless" align="center">
                    <tr>
                        <td width="30%" class="text-right">Auditee</td>
                        <td width="1%">:</td>
                        <td width="39%"><?=$row_auditee['auditee_name']?></td>
                        <td width="30%">&nbsp</td>
                    </tr>
                    <tr>
                        <td class="text-right">Tahun</td>
                        <td>:</td>
                        <td><?=$tahun?></td>
                        <td>&nbsp</td>
                    </tr>
                </table>

                <table class="table table-bordered table-hover table-striped" align="center">
                    <tr>
                        <th>No.</th>
                        <th>Uraian</th>
                        <th>Pelaku</th>
                        <th>Rencana Aksi</th>
                    </tr>
                    <?php 
                    $x = 1;
                    foreach($rs_parrent as $row):
                    ?>
                    <tr>
                        <td width="2%" class="text-center"><?=$x++?></td>
                        <td width="39%"><?=$row['uraian']?></td>
                        <td width="20%"><?=$row['pelaku']?></td>
                        <td width="39%"><?=$row['rencana_aksi']?></td>
                    </tr>
                    <?php endforeach ?>
                </table>
                
                <center>
                <input type="button" class="btn btn-primary" value="Kembali" onclick="location='<?= $def_page_request ?>'">
                <a href="Api/benturan_kepentingan_print.php?tahun=<?=$tahun?>&auditee=<?=$row_auditee['auditee_id']?>" target="_blank" class="btn btn-info">Download</a>
                </center>
            </div>
		</section>
	</div>
</div>
