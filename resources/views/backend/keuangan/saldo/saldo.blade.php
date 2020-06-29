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
                                    <div class="card-body">Kas Keluar : Rp {{$keluar}}</div>
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
                            labels: label,
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
  var ctxL = document.getElementById("lineChart").getContext('2d');
  var myLineChart = new Chart(ctxL, {
  type: 'line',
    data: {
      labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
          label: "My First dataset",
          data: [65, 59, 80, 81, 56, 55, 40],
          backgroundColor: [
          'rgba(105, 0, 132, .2)',
          ],
          borderColor: [
          'rgba(200, 99, 132, .7)',
          ],
          borderWidth: 2
        },
        {
          label: "My Second dataset",
          data: [28, 48, 40, 19, 86, 27, 90],
          backgroundColor: [
            'rgba(0, 137, 132, .2)',
          ],
          borderColor: [
            
          ],
          borderWidth: 2
        },
        {
          label: "My Third dataset",
          data: [20, 120, 43, 9, 38, 22, 78],
          backgroundColor: [
            'rgba(254, 232, 67, 0.77)',
          ],
          borderColor: [
            
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
