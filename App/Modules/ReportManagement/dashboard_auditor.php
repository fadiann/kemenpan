<link href="Public/css/responsive-tabs.css" rel="stylesheet" type="text/css" />
<script src="Public/js/responsive-tabs.js" type="text/javascript"></script>
<?
include_once "App/Classes/dashboard_class.php";
$dashboards = new dashboard ( $ses_userId );
$tahun = "";
$tahun = $Helper->replacetext($_POST["fil_tahun_id"]);
$tipe_audit = $Helper->replacetext($_POST["tipe_audit"]);
$rs_auditors = $dashboards->get_auditor();
// $arr_auditor_name = $rs_auditors->FetchRow();
$auditors = array();
$counts = array();
foreach ($rs_auditors->GetArray() as $auditor) {
    array_push($auditors, $auditor['auditor_name']);
    array_push($counts, $dashboards->count_per($auditor['auditor_id'], $tahun, $tipe_audit));
}
?>
<section id="main" class="column">
  <article class="module width_3_quarter">
    <header>
      <h3 class="tabs_involved">Dashboard Auditor<?=($tipe_audit) ? " ({$dashboards->audit_type_data_viewlist($tipe_audit)})" : ""  ?><?=($tahun) ? " Tahun {$tahun}" : ""?></h3>
    </header>
    <br>
      <br>
      <div style="width: 1000px;">
      <center>
            <canvas id="myChart1" style="height: 400px !important"></canvas>
      </center>
      </div>
  </article>
</section>
<script type="text/javascript" src="Public/js/Chart.min.js"></script>
<script>
var ctx1 = document.getElementById("myChart1").getContext("2d");
var myChart2 = new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: <?= json_encode($auditors) ?>,
        datasets: [{
            label: 'Jumlah Kegiatan Pengawasan',
            backgroundColor: "darkmagenta",
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
            text: 'Jumlah Kegiatan Pengawasan<?=($tipe_audit) ? " ({$dashboards->audit_type_data_viewlist($tipe_audit)})" : ""  ?><?= ($tahun) ? " Per Tahun {$tahun}" : "" ?>'
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