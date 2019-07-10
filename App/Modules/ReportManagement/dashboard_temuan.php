<?
include_once "App/Classes/dashboard_class.php";
$dashboards = new dashboard ( $ses_userId );
$tahun = $Helper->replacetext($_POST["fil_tahun_id"]);
$tipe_audit = $Helper->replacetext($_POST["tipe_audit"]);
$rs_finding_types = $dashboards->finding_type_view();
$finding_types = array();
$finding_counts = array();
foreach ($rs_finding_types->GetArray() as $finding_type) {
    array_push($finding_types, $finding_type['finding_type_name']);
    array_push($finding_counts, $dashboards->finding_type_finding_count($finding_type['finding_type_id'], $tahun, $tipe_audit));
}
?>
<section id="main" class="column">
  <article class="module width_3_quarter">
    <header>
      <h3 class="tabs_involved">Dashboard Temuan<?=($tipe_audit) ? " ({$dashboards->audit_type_data_viewlist($tipe_audit)}) " : ""  ?><?=($tahun) ? " Tahun {$tahun}" : "" ?></h3>
    </header>
    <br>
    <fieldset class="form-group">
      <center>
        <div  style="width: 600px !important; height: 400px !important">
          <canvas id="myChart" ></canvas>
        </div>
        <center>
            <img id="loading" src="Public/images/loading_icon.gif" style="display:none;width: 140px;height:100px; "/>
        </center>
        <div id="canvas2" style="width: 600px !important; height: 400px !important">
          
        </div>
       <!--  <div id="canvas3" style="width: 600px !important; height: 400px !important">
          <canvas id="myChart3" ></canvas>
        </div>
        <div id="canvas4" style="width: 600px !important; height: 400px !important">
          <canvas id="myChart4" ></canvas>
        </div> -->
      </center>
    </fieldset>
  </article>
</section>
<!-- <script src="Public/js/jquery-1.9.1.min.js" type="text/javascript"></script> -->
<script type="text/javascript" src="Public/js/Chart.min.js"></script>
<script>
$("#canvas2").hide();
var ctx = document.getElementById("myChart").getContext("2d");
var color=["#ff6384","#5959e6","#2babab","#8c4d15","#8bc34a","#607d8b","#009688"];
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: <?= json_encode($finding_types) ?>,
        datasets: [{
            label: 'Jumlah',
            data: <?= json_encode($finding_counts) ?>,
            backgroundColor: [
                'darkcyan',
                'darkmagenta',
                'darkorange'
            ]

        }]
    },
});
document.getElementById("myChart").onclick = function(evt)
{   
    var activePoint = myChart.getElementAtEvent(evt)[0];
    var data = activePoint._chart.data;
    var datasetIndex = activePoint._datasetIndex;
    var label = data.datasets[datasetIndex].label;
    var param = data.labels[activePoint._index];
    var value = data.datasets[datasetIndex].data[activePoint._index];
    
    $("#canvas2").hide();
    $("#loading").show();
    
    setTimeout(function() {
        $.ajax({
            url  : 'AuditManagement/ajax.php?data_action=getTemuanCount',
            type : 'POST',
            data : {
                name: param,
                tahun: '<?= $tahun ?>',
                tipe_audit: '<?= $tipe_audit ?>'
            },
            success  : function(res){
                // alert(res.canvas);

                var datas = [];
                var counts = [];
                var canvas = '';
                
                $.each(JSON.parse(res), function(index, el) {
                    datas[index] = el.finding_sub_type_name;
                    counts[index] = el.counts;
                    canvas = el.canvas; 

                });

                $("#loading").hide();
                $("#canvas2").show();
                $("#canvas2").html(canvas);
                
                var ctx2 = document.getElementById("myChart2").getContext("2d");
                var color=["#ff6384","#5959e6","#2babab","#8c4d15","#8bc34a","#607d8b","#009688"];
                var myChart2 = new Chart(ctx2, {
                    type: 'pie',
                    data: {
                        labels: datas,
                        datasets: [{
                            label: 'Jumlah',
                            data: counts,
                            backgroundColor: color
                        }]
                    },
                    options: {
                        legend: {
                            display: true,
                        }
                    }
                });
            }
        });
    }, 1000);
}
</script>