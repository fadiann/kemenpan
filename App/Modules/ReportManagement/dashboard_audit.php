<link href="Public/css/responsive-tabs.css" rel="stylesheet" type="text/css" />
<script src="Public/js/responsive-tabs.js" type="text/javascript"></script>
<?
include_once "App/Classes/dashboard_class.php";
$dashboards = new dashboard ( $ses_userId );
$tahun = $Helper->replacetext($_POST["fil_tahun_id"]);
if ($tahun != '') {
    $tahun = $Helper->replacetext($_POST["fil_tahun_id"]);   
} else {
    $tahun = '';
}

$tipe_audit = $Helper->replacetext($_POST["tipe_audit"]);
$rs_auditees = $dashboards->auditee_list($tahun, $tipe_audit);
$auditees = array();
$followups = array();
$counts = array();
$rekcounts = array();
foreach ($rs_auditees->GetArray() as $auditee) {
    array_push($auditees, $auditee['auditee_title']);
    array_push($counts, $dashboards->finding_audit_count($auditee['auditee_id'], $tahun));
    array_push($rekcounts, $dashboards->rekomendasi_audit_count($auditee['auditee_id'], $tahun));
    array_push($followups, $dashboards->tindak_lanjut_count($auditee['auditee_id'], $tahun));
}
?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title">Dashboard Pengawasan<?=($tipe_audit) ? " ({$dashboards->audit_type_data_viewlist($tipe_audit)}) " : ""  ?><?=($tahun) ? " Tahun {$tahun}" : "" ?></h2>
			</header>
			<div class="panel-body">
                <fieldset class="form-group">
                    <ul class="rtabs">
                <li><a href="#view1">Pengawasan</a></li>
                <li><a href="#view2">Temuan, Rekomendasi, dan Tindak Lanjut Audit</a></li>
                </ul>
                <div id="view1">
                <center>
                    <div  style="width: 600px !important; height: 400px !important"> n
                    <canvas id="myChart" ></canvas>
                    </div>
                </center>
                </div>
                <div id="view2" >
                <br>
                <div style="width: 1000px; height: 350px !important">
                    <center>
                            <canvas id="myChart1" style="height: 350px !important"></canvas>
                    </center>
                </div>
                <center><img id="loading" src="Public/images/loading_icon.gif" style="display:none;width: 140px;height:100px; "/></center>
                <div id="html">
                    
                </div>
                </div>
                </fieldset>
            </div>
        </section>
    </div>
</div>
<script type="text/javascript" src="Public/js/Chart.min.js"></script>
<script>
var ctx = document.getElementById("myChart").getContext("2d");
var ctx1 = document.getElementById("myChart1").getContext("2d");
var color=["#ff6384","#5959e6","#2babab","#8c4d15","#8bc34a","#607d8b","#009688"];
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ["Perencanaan Pengawasan", "Pelaksanaan Pengawasan"],
        datasets: [{
            label: 'Jumlah',
            data: [<?=$dashboards->dashboard_plan_count($tahun, $tipe_audit)  ?>, <?=$dashboards->dashboard_assign_count($tahun, $tipe_audit)?>],
            backgroundColor: [
                'darkcyan',
                'darkmagenta',
            ]

        }]
    },
});
var myChart1 = new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: <?= json_encode($auditees) ?>,
        datasets: [{
            label: 'Jumlah Temuan',
            backgroundColor: "darkmagenta",
            data: <?= json_encode($counts) ?>,
        },
        {
            label: 'Jumlah Rekomendasi',
            backgroundColor: "darkcyan",
            data: <?= json_encode($rekcounts) ?>,
        },
        {
            label: 'Jumlah Tindak Lanjut',
            backgroundColor: "darkorange",
            data: <?= json_encode($followups) ?>,
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
            text: 'Temuan, Rekomendasi, dan Tindak Lanjut<?=($tipe_audit) ? " ({$dashboards->audit_type_data_viewlist($tipe_audit)}) " : ""  ?><?= ($tahun) ? " Tahun {$tahun}" : "" ?>'
        },
        scales: {
            xAxes: [{
                ticks: {
                    autoSkip: false,
                        userCallback: function(label, index, labels) {
                         var labelx = label.split("-");
                            return labelx[0];
                    }
                }
            }],
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    stepSize: 5,
                },

            }]
        },
       tooltips: {
            callbacks: {
                title: function(tooltipItems, data) {
                    var labels = data.labels[tooltipItems[0].index].split("-");
                    return labels[1];
                }
            }
        }
    }
});
document.getElementById("myChart1").onclick = function(evt) {
    var activePoint = myChart1.getElementAtEvent(evt)[0];
    var data = activePoint._chart.data;
    var datasetIndex = activePoint._datasetIndex;
    var label = data.datasets[datasetIndex].label;
    var param = data.labels[activePoint._index];
    var value = data.datasets[datasetIndex].data[activePoint._index];

    if (activePoint !== undefined) {
        $("#html").hide();
        $("#loading").show();
        setTimeout(function() {
            $.ajax({
                url  : 'App/Modules/AuditManagement/ajax.php?data_action=getassigndata',
                type : 'POST',
                data : {
                    labels: label,
                    params: param,
                    tahun: '<?= $tahun ?>',
                    tipe_audit: '<?= $tipe_audit ?>'
                },
                success  : function(res){
                    $("#loading").hide();
                    $("#html").show();
                    $("#html").html(res);
                }
            })
        }, 1000)
    }
};
</script>