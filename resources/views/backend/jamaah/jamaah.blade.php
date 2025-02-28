@extends('backend/master')
@section('title', 'Jamaah')
@section('state', '/ Jamaah ')
@section('content')
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
<script src="https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.js"></script>
<link href="https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.css" rel="stylesheet" />
    <div>
        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-pie mr-1"></i>Jumlah Laki-laki dan Perempuan</div>
                                    <div class="card-body"><canvas id="genderChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-pie mr-1"></i>Jamaah Aktif dan Pasif</div>
                                    <div class="card-body"><canvas id="aktifChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
   </div>
        <a type="button" href="{{route('jamaah.create')}}" class="btn btn-primary mb-4"><i class="fas fa-plus-square mr-2"></i>Tambah jamaah</a>
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Data Jamaah Masjid</div>
                <div class="card-body ">
                    <div class="table-responsive ">
                        <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Jamaah aktif</th>
                                    <th>Penerima zakat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Jamaah aktif</th>
                                    <th>Penerima zakat</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($jamaah as $jmh)
                                <tr>
                                    <td class="text-center" scope="row">{{ $loop->iteration}}</td>
                                    <td>{{ $jmh->nama}}</td>
                                    <td class="text-center">
                                      <?php $jenisKelamin = $jmh->jenisKelamin; ?>
                                      @if($jenisKelamin == 1 )
                                          Laki-laki
                                      @else
                                          Perempuan
                                      @endif
                                    </td>
                                    <td class="text-center">
                                      <?php $aktif = $jmh->aktif; ?>
                                      @if($aktif == 1 )
                                          Aktif
                                      @else
                                          Pasif
                                      @endif
                                    </td>
                                    <td class="text-center">
                                      <?php $zakat = $jmh->zakat; ?>
                                      @if($zakat == 1 )
                                          Iya
                                      @else
                                          Tidak
                                      @endif
                                    </td>
                                    
                                    <td class="text-center text-white">
                                        <a type="button" href="{{route('jamaah.show', $jmh->id)}}"  class="badge badge-primary"><i class="fas fa-info-circle mr-1"></i>Detail</a>

                                        <a type="button" href="{{route('jamaah.edit', $jmh->id)}}" class="badge badge-success"><i class="fas fa-edit mr-1"></i>Edit</a>

                                        <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$jmh->id}})"data-target="#DeleteModal" class="badge badge-danger"><i class="fa fa-trash mr-1"></i>Hapus</a>
                                     
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

            <script type="text/javascript">
                 function deleteData(id)
                 {
                     var id = id;
                     var url = 'jamaah/:id';
                     url = url.replace(':id', id);
                     $("#deleteForm").attr('action', url);
                 }

                 function formSubmit()
                 {
                     $("#deleteForm").submit();
                 }
              </script>

            <div>
                <label for="exampleFormControlInput1">Peta Persebaran Jamaah Masjid KH Ahmad Dahlan</label>

               	<div class="col" id="map" style="height: 300px; width: 100%;"></div>
                  <style>
                    .masjid {
                      background-image: url('{{asset('backend/marker/masjid.png')}}');
                      background-size: cover;
                      width: 40px;
                      height: 40px;
                      border-radius: 50%;
                      cursor: pointer;
                    }
                  </style>
                  <script>
                    mapboxgl.accessToken = 'pk.eyJ1IjoiZHluYXRpYyIsImEiOiJja2JpcnpyaHQwaTcwMnNsdHZweTc2eXQ0In0.2dDt6graznsFCKEN64n1ZQ';
                     var obj = JSON.parse('<?php echo json_encode($jamaah) ?>')

                      var locations = [];
                      var i;

                      for(i=0; i<obj.length; i++){                     
                          locations[i] = [[obj[i].nama], [obj[i].latt], [obj[i].long], [obj[i].aktif]];
                      }

                      var map = new mapboxgl.Map({
                          container: 'map',
                          style: 'mapbox://styles/mapbox/streets-v11',
                          center: [ 112.608752, -7.898696],
                          zoom: 14

                      });
                      var mjd = document.createElement('div');
                      mjd.className = 'masjid';
                      var marker = new mapboxgl.Marker(mjd)
                        .setLngLat([ 112.608752, -7.898696])
                        .setPopup(new mapboxgl.Popup().setText('Masjid KH Ahmad Dahlan'))
                        .addTo(map);
                     
                      for (i = 0; i < locations.length; i++) { 
                       
                        if(locations[i][3] == '1'){
                         new mapboxgl.Marker({color: 'red'})
                          .setLngLat([locations[i][2], locations[i][1]])
                          .setPopup(new mapboxgl.Popup().setText(locations[i][0]))
                          .addTo(map);
                        }else{
                          new mapboxgl.Marker({color: 'yellow'})
                          .setLngLat([locations[i][2], locations[i][1]])
                          .setPopup(new mapboxgl.Popup().setText(locations[i][0]))
                          .addTo(map);
                        }

                      };
                      
                  </script> 
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> 
                  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
                  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
                  <script type="text/javascript">
                    var obj = JSON.parse('<?php echo json_encode($jamaah) ?>')
                    var laki = 0;
                    var per = 0;
                    var aktif = 0;
                    var pasif = 0;

                    var i;

                    for(i=0; i<obj.length; i++){  
                        if([obj[i].jenisKelamin] == '1'){
                          laki++;
                        }else{
                          per++;
                        }
                    }
                    for(i=0; i<obj.length; i++){  
                        if([obj[i].aktif] == '1'){
                          aktif++;
                        }else{
                          pasif++;
                        }
                    }
                    //pie
                    var ctxP = document.getElementById("genderChart").getContext('2d');
                    var myPieChart = new Chart(ctxP, {
                      plugins: [ChartDataLabels],
                    type: 'doughnut',
                    data: {
                    labels: ["Laki-laki", "Perempuan"],
                    datasets: [{
                    data: [laki, per],
                    backgroundColor: ["#4D5360", "#46BFBD"],
                    hoverBackgroundColor: ["#616774", "#5AD3D1"]
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

                    //pie
                    var ctxP = document.getElementById("aktifChart").getContext('2d');
                    var myPieChart = new Chart(ctxP, {
                    plugins: [ChartDataLabels],
                    type: 'doughnut',
                    data: {
                    labels: ["Aktif", "Pasif"],
                    datasets: [{
                    data: [aktif, pasif],
                    backgroundColor: ["#F7464A", "#FDB45C"],
                    hoverBackgroundColor: ["#FF5A5E", "#FFC870"]
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
            </div>
@endsection