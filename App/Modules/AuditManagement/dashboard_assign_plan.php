<link href="Public/css/responsive-tabs.css" rel="stylesheet" type="text/css" />
<script src="Public/js/responsive-tabs.js" type="text/javascript"></script>
<?
include_once "App/Classes/dashboard_class.php";
$dashboards = new dashboard ( $ses_userId );
$tahun = $Helper->replacetext($_POST["fil_tahun_id"]);
$rs_auditees = $dashboards->auditee_viewlist($tahun);
$auditees = array();
$auditee_names = array();
$counts = array();
$colors = array();
$rekcounts = array();
foreach ($rs_auditees->GetArray() as $auditee) {
    array_push($auditees, $auditee['auditee_title']);
    array_push($counts, $dashboards->finding_audit_count($auditee['assign_auditee_id_assign']));
    array_push($rekcounts, $dashboards->rekomendasi_audit_count($auditee['assign_auditee_id_assign']));
    array_push($colors, "DarkMagenta");
}
?>
<section id="main" class="column">
  <article class="module width_3_quarter">
    <header>
      <h3 class="tabs_involved">Dashboard Audit Tahun <?=$tahun ?></h3>
    </header>
    <br>
    <fieldset>
        <ul class="rtabs">
      <li><a href="#view1">Audit</a></li>
      <li><a href="#view2">Temuan & Rekomendasi</a></li>
    </ul>
    <div id="view1">
      <center>
        <div  style="width: 600px !important; height: 350px !important">
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
    </div>
    </fieldset>
  </article>
</section>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.Public/js/2.7.2/Chart.min.js"></script>
<script>
var ctx = document.getElementById("myChart").getContext("2d");
var ctx1 = document.getElementById("myChart1").getContext("2d");
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ["Perencanaan Audit", "Pelaksanaan Audit"],
        datasets: [{
            label: 'Jumlah',
            data: [<?=$dashboards->dashboard_plan_count($tahun)  ?>, <?=$dashboards->dashboard_assign_count($tahun)?>],
            backgroundColor: [
                'rgba(249, 139, 0, 0.2)',
                'rgba(0, 0, 0, 0.2)',
            ],
            borderColor: [
                'rgba(255, 139, 0, 1)',
                'rgba(0, 0, 0, 1)',
            ],

        }]
    },
});
var myChart2 = new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: <?= json_encode($auditees) ?>,
        datasets: [{
            label: 'Jumlah Temuan',
            backgroundColor: "black",
            data: <?= json_encode($counts) ?>,
        },
        {
            label: 'Jumlah Rekomendasi',
            backgroundColor: "#F98B00",
            data: <?= json_encode($rekcounts) ?>,
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
            text: 'Temuan Dan Rekomendasi Tahun <?= $tahun ?>'
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
                    stepSize: 2,
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
</script>