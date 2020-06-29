@extends('backend/master')
@section('content')

<div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Saldo : Rp {{$saldo}}</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Kas Masuk : Rp {{$msk}}</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Kas Keluar : Rp {{$klr}}</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Danger Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Area Chart Example</div>
                                    <div class="card-body"><canvas id="s" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Bar Chart Example</div>
                                    <div class="card-body"><canvas id="lineChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>  


<script type="text/javascript">
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';
    var obj = JSON.parse('<?php echo json_encode($masuk) ?>')
    var label = [];
    var data = [];
    var largest;
    var i;

    for (i=0; i<=largest;i++){
        if (data[i]>largest) {
            var largest=data[i];
        }
    }

    for(i=0; i<obj.length; i++){                     
        label[i] =  [obj[i].tanggal];
        data[i] = [obj[i].jumlah];
    }

    var ctx = document.getElementById("s");
    var myLineChart = new Chart(ctx, {
                          type: 'bar',
                          data: {
                            labels: ["april","mei","juni"],
                            datasets: [{
                              label: "Kas Masuk",
                              backgroundColor: "rgba(2,117,216,1)",
                              borderColor: "rgba(2,117,216,1)",
                              data: data,
                            }],
                          },
                          options: {
                            scales: {
                              xAxes: [{
                                time: {
                                  unit: 'day'
                                },
                                gridLines: {
                                  display: false
                                },
                                ticks: {
                                  maxTicksLimit: 6
                                }
                              }],
                              yAxes: [{
                                ticks: {
                                  min: 0,
                                  max: largest,//set max value
                                  maxTicksLimit: 5
                                },
                                gridLines: {
                                  display: true
                                }
                              }],
                            },
                            legend: {
                              display: false
                            }
                          }
     });
</script> 
<script type="text/javascript">
  //line
  var obj = JSON.parse('<?php echo json_encode($masuk) ?>')
    var label = [];
    var data1 = [];
    var i;

    for(i=0; i<obj.length; i++){                     
        label[i] =  [obj[i].tanggal];
        data1[i] = [obj[i].jumlah];
    }

  var ctxL = document.getElementById("lineChart").getContext('2d');
  var myLineChart = new Chart(ctxL, {
  type: 'line',
    data: {
      labels: label,
        datasets: [{
          label: "Kas Masuk",
          data: data1,
          backgroundColor: [
          'rgba(105, 0, 132, .2)',
          ],
          borderColor: [
          'rgba(200, 99, 132, .7)',
          ],
          borderWidth: 2
        }
        ]
      },
      options: {
      responsive: true
    }
  });
</script>
           
@endsection
