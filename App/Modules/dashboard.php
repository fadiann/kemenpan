<script type="text/javascript" src="Public/js/Chart.min.js"></script>
<?
include_once "App/Classes/dashboard_class.php";
include_once "App/Classes/users_class.php";
$userms         = new userm ( $ses_userId );
$dashboards     = new dashboard ( $ses_userId );
$tahun          = date("Y");
$tipe_audit     = "";
$rs_auditees    = $dashboards->auditee_list($tahun, $tipe_audit);
$auditees       = array();
$followupcounts = array();
$findingcounts  = array();
$rekcounts      = array();
foreach ($rs_auditees->GetArray() as $auditee) {
    array_push($auditees, $auditee['auditee_title']);
    array_push($findingcounts, $dashboards->finding_audit_count($auditee['auditee_id'], $tahun));
    array_push($rekcounts, $dashboards->rekomendasi_audit_count($auditee['auditee_id'], $tahun));
    array_push($followupcounts, $dashboards->tindak_lanjut_count($auditee['auditee_id'], $tahun));
}
//var_dump($auditees);
$rs_auditors = $dashboards->get_auditor();
// $arr_auditor_name = $rs_auditors->FetchRow();
$auditors = array();
$counts   = array();
foreach ($rs_auditors->GetArray() as $auditor) {
    array_push($auditors, $auditor['auditor_name']);
    array_push($counts, $dashboards->count_per($auditor['auditor_id'], $tahun, $tipe_audit));
}
?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title">DASHBOARD</h2>
			</header>
			<div class="panel-body">
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<?="Hi <strong>".$ses_userName."</strong>, Selamat datang di Aplikasi E-MAS (Elektronik Manajemen Audit Sistem) Kementerian Pendayagunaan Aparatur Negara dan Reformasi Birokrasi Republik Indonesia"; ?>
            </div>
            <?php if($_SESSION['ses_groupId'] != '25a0bc88a8aca130913d7b35facf9e3505bf12af'): ?>
			<div class="row">
				<div class="col-md-4">
                    <form action="?method=dashboard" method="post" enctype="multipart/form-data">
				    <div class="col-md-12 text-center bg-default" style="padding: 20px 0px 40px 0px">
				    <h4 class="text-center">FILTER PENUGASAN AUDITOR</h4>
                    <fieldset class="form-group mt-md">
				        <div class="col-md-12 text-center">
                            TAHUN
				        </div>
				        <div class="col-md-offset-2 col-md-8 mt-sm">
                            <?=$Helper->tahunComboMultiRequired('tahun', '', '')?>
				        </div>
				        <div class="col-md-12 text-center mt-sm">
                            AUDITOR
				        </div>
				        <div class="col-md-offset-2 col-md-8 mt-sm">
						<?
						$rs_auditor = $userms->list_all_auditor();
						$arr_auditor = $rs_auditor->GetArray ();
						echo $Helper->buildComboAuditorRequired( "auditor_id", $arr_auditor, 0, 1, "", "", "", false, true, false );
						?>
				        </div>
				        <div class="col-md-offset-2 col-md-8 mt-sm">
                            <span class="required">(*) Pilih Tahun Dan Nama Auditor</span>
				        </div>
				        <div class="col-md-offset-2 col-md-8 mt-sm">
                            <center>
                            <input type="hidden" name="data_action" value="lihat_penugasan">
                            <input type="submit" name="lihat" value="Lihat" class="btn btn-success">
                            </center>
				        </div>
                    </fieldset>
                    </div>
                    </form>
				</div>
				<div class="col-md-8">
					<div class="panel-body">
            			<canvas id="myChart3" style="height: 400px !important"></canvas>
					</div>
				</div >
			</div>
			<div class="row">
				<div class="col-md-5">
					<div class="panel-body">
            			<canvas id="myChart"></canvas>
					</div>
				</div> 
				<div class="col-md-7">
					<div class="panel-body">
						<canvas id="myChart2"></canvas>
					</div>
				</div>
				</div>
            </div>
            <?php endif ?>
		</section>
	</div>
</div>
<script>
var ctx = document.getElementById("myChart").getContext("2d");
var color=["#ff6384","#5959e6","#2babab","#8c4d15","#8bc34a","#607d8b","#009688"];
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ["Jumlah Realisasi Penugasan", "Jumlah Penugasan Tanpa PKPT", "Jumlah Perencanaan"],
        datasets: [{
            label: 'Jumlah',
			data: [<?=$dashboards->dashboard_assign_count($tahun, $tipe_audit)  ?>, 
			<?=$dashboards->dashboard_non_assign_count($tahun, $tipe_audit)  ?>, 
			<?=$dashboards->dashboard_plan_count($tahun, $tipe_audit)  ?>
		],
            backgroundColor: [
                'yellow',
                'green',
                'orange'
            ]
        }]
    },
    options: {
        responsive: true,
        title: {
            display: true,
            text: 'Jumlah Realisasi Pelaksanaan Audit'
        },
    }
});
</script>
<script>
var ctx2 = document.getElementById('myChart2').getContext('2d');
var chart2 = new Chart(ctx2, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: [<?=json_encode($auditees) ?>],
        datasets: [
		// 	{
        //     label: 'Jumlah Temuan',
        //     fill: false,
        //     backgroundColor: 'rgb(50, 129, 168)',
        //     borderColor: 'rgb(50, 129, 168)',
        //     data: [<?//=json_encode($findingcounts)?>]
        // }, 
		{
            label: 'Jumlah Rekomendasi',
            fill: false,
            backgroundColor: 'rgb(184, 51, 58)',
            borderColor: 'rgb(184, 51, 58)',
            data: [<?=json_encode($rekcounts)?>]
        }, {
            label: 'Jumlah Tindak Lanjut',
            fill: false,
            backgroundColor: 'rgb(36, 158, 42)',
            borderColor: 'rgb(36, 158, 42)',
            data: [<?=json_encode($followupcounts)?>]
        }],

    },

    // Configuration options go here
    options: {
        responsive: true,
        title: {
            display: true,
            text: 'Statistik Temuan, Rekomendasi dan Tindak Lanjut'
        },
    }
});
</script>
<script>
var ctx3 = document.getElementById("myChart3").getContext("2d");
var myChart3 = new Chart(ctx3, {
    type: 'bar',
    data: {
        labels: <?= json_encode($auditors) ?>,
        datasets: [{
            label: 'Jumlah Kegiatan',
            backgroundColor: 'rgb(36, 158, 42)',
            data: <?= json_encode($counts) ?>,
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            display: true,
        },
        title: {
            display: true,
            text: 'Jumlah Kegiatan Pengawasan Untuk Setiap Auditor<?=($tipe_audit) ? " ({$dashboards->audit_type_data_viewlist($tipe_audit)})" : ""  ?><?= ($tahun) ? " Per Tahun {$tahun}" : "" ?>'
        },
        scales: {
            xAxes: [{
                ticks: {
                    autoSkip: false,
                }
            }],
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    stepSize: 15,
                },

            }]
        }
    }
});
</script>

</body>
</html>