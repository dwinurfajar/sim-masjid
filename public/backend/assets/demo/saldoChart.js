
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

    var ctx = document.getElementById("chartMasuk");
    var myLineChart = new Chart(ctx, {
                          type: 'bar',
                          data: {
                            labels: label,
                            datasets: [{
                              label: "Revenue",
                              backgroundColor: "rgba(2,117,216,1)",
                              borderColor: "rgba(2,117,216,1)",
                              data: data,
                            }],
                          },
                          options: {
                            scales: {
                              xAxes: [{
                                time: {
                                  unit: 'month'
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