@extends('backend/master')
@section('title', 'Kas Keluar')
@section('state', '/ Kas Keluar')
@section('content')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

<div class="row">
  <div class="col-xl-6 input-group mb-3 ">
    <form class="input-group" method="post" action="{{route('filter.keluar')}}"> 
      @csrf
      <label class="input-group">Pilih data berdasarkan : </label>
      <input type="number" name="tahun" class="form-control" placeholder="Tahun" >
      <input type="number" name="bulan" class="form-control" placeholder="Bulan" >
      <div class="input-group-append">
        <button class="btn btn-primary" type="submit">SET</button>
      </div>
    </form>
  </div>
</div>

<div class="row">
  <div class="col-xl-3 col-md-6">
    <div class="card bg-muted mb-4">
        <div class="card-header text-center">Jumlah Data keluar</div>
        <div class="card-body text-center" id="jumlah_data"> </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="card bg-muted mb-4">
        <div class="card-header text-center">Jumlah Kas Keluar</div>
        <div class="card-body text-center" id="jumlah_keluar"> </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Kas Keluar Bulan Ini</div>
                                    <div class="card-body"><canvas id="keluarChart" width="100%" height="40"></canvas></div>
                                </div>
  </div>
</div>


<a href="{{route('keluar.create')}}" class="btn btn-primary mb-4">
	<i class="fas fa-plus-square mr-2"></i>Tambah Data
</a>

    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Data Kas Keluar Masjid</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Jumlah</th>
                                <th>Ket</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Jumlah</th>
                                <th>Ket</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                         <tbody>
            					  	@foreach ($keluar as $klr)
            						    <tr>
            						      	<th class="text-center" scope="row">{{ $loop->iteration}}</th>
            						      	<td>Rp. {{ $klr->jumlah}}</td>
            						      	<td>{{ $klr->keterangan}}</td>
            						      	<td class="text-center">{{ date('d-M-Y', strtotime($klr->tanggal)) }}</td>
            								    <td class="text-center">

                                  <a type="button" href="{{route('keluar.edit', $klr->id)}}" class="badge badge-success"><i class="fas fa-edit mr-1"></i>Edit</a>

                                  <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$klr->id}})"data-target="#DeleteModal" class="badge badge-danger"><i class="fa fa-trash mr-1"></i>Hapus</a>
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
                     var url = 'keluar/:id';
                     url = url.replace(':id', id);
                     $("#deleteForm").attr('action', url);
                 }

                 function formSubmit()
                 {
                     $("#deleteForm").submit();
                 }
              </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>

<script type="text/javascript">
  //line
  var objek_keluar = JSON.parse('<?php echo json_encode($keluar) ?>')

  var jumlah_keluar = 0;
  for (var i = 0; i < objek_keluar.length; i++) {
     jumlah_keluar = jumlah_keluar + objek_keluar[i].jumlah;
  }
  document.getElementById('jumlah_data').innerHTML =objek_keluar.length;
  document.getElementById('jumlah_keluar').innerHTML ="Rp. "+jumlah_keluar;

    var label = [];
    var data1 = [];
     var i, j =0;

    for(i=objek_keluar.length-1; i>=0; i--){                     
        label[j] =  [objek_keluar[i].tanggal];
        data1[j] = [objek_keluar[i].jumlah];
        j++;
    }

  var ctxL = document.getElementById("keluarChart").getContext('2d');
  var myLineChart = new Chart(ctxL, {
  type: 'line',
    data: {
      labels: label,
        datasets: [{
          label: "Kas Keluar",
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