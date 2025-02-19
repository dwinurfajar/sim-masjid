@extends('backend/master')
@section('title', 'Zakat')
@section('state', '/ Zakat')
@section('content')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.js"></script>
<link href="https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.css" rel="stylesheet" />

<div class="row">
  <div class="col-xl-6">
    <form class="input-group mb-4" method="post" action="{{route('filter.zakat')}}"> 
        @csrf
        <label class="input-group">Pilih data berdasarkan : </label>
        <input type="number" name="tahun" class="form-control" placeholder="Tahun" >
        <div class="input-group-append">
          <button class="btn btn-primary" type="submit">SET</button>
        </div>
    </form>
  </div>
</div>

<div class="row">
  <div class="col-xl-3 col-md-6">
    <div class="card bg-muted mb-4">
        <div class="card-header ">Jumlah Penerimaan Zakat</div>
        <div class="card-body text-center" id="jumlah_zakat"><i class="fas fa-user"></i> </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="card bg-muted mb-4">
        <div class="card-header ">Jumlah Penerimaan Tunai</div>
        <div class="card-body text-center" id="jumlah_tunai"> </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="card bg-muted mb-4">
        <div class="card-header ">Jumlah Penerimaan Beras</div>
        <div class="card-body text-center" id="jumlah_beras"></div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="card bg-muted mb-4">
        <div class="card-header ">Jumlah Penerima Zakat</div>
        <div class="card-body text-center" id="jumlah_penerima"></div>
    </div>
  </div>

  <div class="col-xl-6">
    <div class="card mb-4">
      <div class="card-header"><i class="fas fa-chart-pie mr-1"></i>Jenis Pembayaran</div>
      <div class="card-body"><canvas id="jnsChart" width="100%" height="40"></canvas></div>  
    </div>
  </div>
</div>
    <!-- Button trigger modal -->
<a href="{{route('zakat.create')}}" class="btn btn-primary mb-4">
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
                                <th>Nama</th>
                                <th>Zakat</th>
                                <th>Tunai</th>
                                <th>Beras</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Zakat</th>
                                <th>Tunai</th>
                                <th>Beras</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                         <tbody>
                                    @foreach ($zakat as $zkt)
                                        <tr>
                                            <th class="text-center" scope="row">{{ $loop->iteration}}</th>
                                            <td>{{ $zkt->nama}}</td>
                                            <td>
                                        <?php $jenis_zakat = $zkt->jenisZakat; ?>
                                                  @if($jenis_zakat == '1' )
                                                      Fitrah
                                                  @else
                                                      Sedekah

                                                  @endif       
                                            </td>
                                            <td>Rp. {{ $zkt->tunai}}</td>
                                            <td>Kg. {{ $zkt->beras}}</td>
                                            <td class="text-center">{{ date('d-M-Y', strtotime($zkt->tanggal)) }}</td>
                                                <td class="text-center">


                                              <a type="button" href="{{route('zakat.edit', $zkt->id)}}" class="badge badge-success"><i class="fas fa-edit mr-1"></i>Edit</a>

                                              <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$zkt->id}})"data-target="#DeleteModal" class="badge badge-danger"><i class="fa fa-trash mr-1"></i>Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                  </tbody>
                      </table>
                  </div>
              </div>
          </div>


<div>
                <label for="exampleFormControlInput1">Peta Persebaran Penerima Zakat</label>

                <div class="col mb-4" id="map" style="height: 300px; width: 100%;"></div>
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
                     var obj = JSON.parse('<?php echo json_encode($penerima) ?>')

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
                       

                         new mapboxgl.Marker({color: 'green'})
                          .setLngLat([locations[i][2], locations[i][1]])
                          .setPopup(new mapboxgl.Popup().setText(locations[i][0]))
                          .addTo(map);
                        

                      };
                      
                  </script> 
            </div>



<div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Data Penerima Zakat</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTableZakat" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                            </tr>
                        </tfoot>
                         <tbody>
                                    @foreach ($penerima as $pnrm)
                                        <tr>
                                            <th class="text-center" scope="row">{{ $loop->iteration}}</th>
                                            <td>{{ $pnrm->nama}}</td>
                                            <td>
                                        <?php $jenis_kelamin = $pnrm->jenisKelamin; ?>
                                                  @if($jenis_kelamin == 1 )
                                                      Laki-Laki
                                                  @else
                                                      Perempuan

                                                  @endif       
                                            </td>
                                            <td>{{ $pnrm->alamat}}</td>
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
    
    function deleteData(id){
                     var id = id;
                     var url = 'zakat/:id';
                     url = url.replace(':id', id);
                     $("#deleteForm").attr('action', url);
                 }

                 function formSubmit()
                 {
                     $("#deleteForm").submit();
                 }

</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTableZakat').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'excel', 'pdf', 'print']
        });

    });

    var objek_penerima = JSON.parse('<?php echo json_encode($penerima) ?>')
    var objek_zakat = JSON.parse('<?php echo json_encode($zakat) ?>')
    var jumlah_zakat = objek_zakat.length;
    var jumlah_tunai = 0;
    var jumlah_beras = 0;
    var tunai = 0;
    var beras = 0;

    //console.log(objek_zakat[1].beras);
    for(i=0; i<objek_zakat.length; i++){                     
        jumlah_tunai = jumlah_tunai+objek_zakat[i].tunai;
        if(objek_zakat[i].beras != null){
            jumlah_beras = jumlah_beras + Number(objek_zakat[i].beras) ;
        }
        if(objek_zakat[i].tunai != null){
            tunai++;
        }
        if(objek_zakat[i].beras != null){
            beras++;
        }
    }

    document.getElementById('jumlah_zakat').innerHTML = jumlah_zakat;
    document.getElementById('jumlah_tunai').innerHTML ="Rp. "+jumlah_tunai;
    document.getElementById('jumlah_beras').innerHTML ="Kg. "+jumlah_beras;
    document.getElementById('jumlah_penerima').innerHTML = objek_penerima.length+" orang";


                    var ctxP = document.getElementById("jnsChart").getContext('2d');
                    var myPieChart = new Chart(ctxP, {
                    plugins: [ChartDataLabels],
                    type: 'doughnut',
                    data: {
                    labels: ["Tunai", "Beras"],
                    datasets: [{
                    data: [tunai, beras],
                    backgroundColor: ["#46BFBD", "#F7464A"],
                    hoverBackgroundColor: ["#5AD3D1", "#FF5A5E"]
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