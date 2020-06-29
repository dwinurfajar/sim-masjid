@extends('backend/master')
@section('title', 'Kas Masuk')
@section('state', '/ Kas Masuk')
@section('content')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

  <div class="row">
              <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Kas Masuk Bulan Ini</div>
                                    <div class="card-body"><canvas id="masukChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-pie mr-1"></i>Keterangan</div>
                                    <div class="card-body"><canvas id="ketChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
	<!-- Button trigger modal -->
	<a href="{{route('masuk.create')}}" class="btn btn-primary mb-4">
	  <i class="fas fa-plus-square mr-2"></i>Tambah Data
	</a>

    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Data Kas Masuk Masjid</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Jumlah</th>
                                <th>Ket</th>
                                <th>Sumber</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Jumlah</th>
                                <th>Ket</th>
                                <th>Sumber</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                         <tbody>
            					  	@foreach ($masuk as $msk)
            						    <tr>
            						      	<th class="text-center" scope="row">{{ $loop->iteration}}</th>
            						      	<td>Rp. {{ $msk->jumlah}}</td>
            						      	<td>
                                  <?php $keterangan = $msk->keterangan; ?>
                                                  @if($keterangan == 'I' )
                                                      Infaq
                                                  @elseif($keterangan == 'S' )
                                                      Sedekah
                                                  @else
                                                      Lain-lain
                                                  @endif       
                                </td>
            						      	<td>{{ $msk->sumber}}</td>
            						      	<td class="text-center">{{ date('d-M-Y', strtotime($msk->tanggal)) }}</td>
            								    <td class="text-center">
            								 	    <a type="button" href="{{route('masuk.show', $msk->id)}}"  class="badge badge-primary"><i class="fas fa-info-circle mr-1"></i>Detail</a>

                                  <a type="button" href="{{route('masuk.edit', $msk->id)}}" class="badge badge-success"><i class="fas fa-edit mr-1"></i>Edit</a>

                                  <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$msk->id}})"data-target="#DeleteModal" class="badge badge-danger"><i class="fa fa-trash mr-1"></i>Hapus</a>
            								</td>
            							</tr>
            						@endforeach
            					  </tbody>
                      </table>
                  </div>
              </div>
          </div>
          
          <!-- Modal -->
                <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <form action="" id="deleteForm" method="post">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus data?</p>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
                        <button type="submit" onclick="formSubmit()" class="btn btn-danger" data-dismiss="modal">Ya, Lanjutkan</button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
            <script type="text/javascript">
                 function deleteData(id)
                 {
                     var id = id;
                     var url = 'masuk/:id';
                     url = url.replace(':id', id);
                     $("#deleteForm").attr('action', url);
                 }

                 function formSubmit()
                 {
                     $("#deleteForm").submit();
                 }
              </script>
<script type="text/javascript">
  //line
  var obj = JSON.parse('<?php echo json_encode($msuk) ?>')
    var label = [];
    var data1 = [];
    var i, j =0;
    console.log(obj);

    for(i=obj.length-1; i>=0; i--){                     
        label[j] =  [obj[i].tanggal];
        data1[j] = [obj[i].jumlah];
        j++;
    }

  var ctxL = document.getElementById("masukChart").getContext('2d');
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


var inf = 0;
var sdk = 0;
var dll = 0;
var i;

var d = new Date();
var n = d.getMonth();

for(i=0; i<obj.length; i++){  
  if([obj[i].keterangan] == 'I'){
                          inf++;
                        }else if([obj[i].keterangan] == 'S'){
                          sdk++;
                        }else{
                          dll++;
                        }
                    }
                    console.log(inf,sdk,dll, n);

var ctxP = document.getElementById("ketChart").getContext('2d');
                    var myPieChart = new Chart(ctxP, {
                      plugins: [ChartDataLabels],
                    type: 'pie',
                    data: {
                    labels: ["Infaq", "Sedekah", "Lain-lain"],
                    datasets: [{
                    data: [inf, sdk, dll],
                    backgroundColor: ["#4D5360", "#46BFBD", "#F7464A"],
                    hoverBackgroundColor: ["#616774", "#5AD3D1", "#FF5A5E"]
                    }]
                    },
                    options: {
                    responsive: true,
                    legend: {
                      position: 'bottom',
                      labels: {
                        padding: 20,
                        boxWidth: 10
                      }
                    },
                    plugins: {
                      datalabels: {
                        formatter: (value, ctx) => {
                          let sum = 0;
                          let dataArr = ctx.chart.data.datasets[0].data;
                          dataArr.map(data => {
                            sum += data;
                          });
                          let percentage = (value * 100 / sum).toFixed(1) + "%";
                          return percentage;
                        },
                        color: 'white',
                        labels: {
                          title: {
                            font: {
                              size: '10'
                            }
                          }
                        }
                      }
                    }
                  }

});
</script>

@endsection