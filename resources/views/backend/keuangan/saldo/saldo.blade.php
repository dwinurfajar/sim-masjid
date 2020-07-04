@extends('backend/master')
@section('title', 'Saldo')
@section('state', '/ Saldo')
@section('content')

<div class="row">
  <div class="col-xl-6 input-group mb-3 ">
    <form class="input-group" method="post" action="{{route('filter.saldo')}}"> 
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
        <div class="card-header text-center">Jumlah Data Masuk</div>
        <div class="card-body text-center" id="jumlah_data_masuk"> </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="card bg-muted mb-4">
        <div class="card-header text-center">Jumlah Kas Masuk</div>
        <div class="card-body text-center" id="jumlah_masuk"> </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="card bg-muted mb-4">
        <div class="card-header text-center">Jumlah Data keluar</div>
        <div class="card-body text-center" id="jumlah_data_keluar"> </div>
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
  <div class="col-md-6">
    <div class="card bg-muted mb-4">
        <div class="card-header text-center">Saldo</div>
        <div class="card-body text-center" id="saldo"> </div>
    </div>
</div>
</div>


<div class="row">
  <div class="col-xl-6">
    <div class="card mb-4">
      <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Kas Masuk</div>
      <div class="card-body"><canvas id="mskChart" width="100%" height="40"></canvas></div>
    </div>
  </div>
  <div class="col-xl-6">
    <div class="card mb-4">
      <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Kas Keluar</div>
      <div class="card-body"><canvas id="klrChart" width="100%" height="40"></canvas></div>
    </div>
  </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>  
 
<script type="text/javascript">
  
  //line
  var objek_masuk = JSON.parse('<?php echo json_encode($masuk) ?>')
  var jumlah_masuk = 0;

  for (var i = 0; i < objek_masuk.length; i++) {
     jumlah_masuk = jumlah_masuk + objek_masuk[i].jumlah;
  }

  document.getElementById('jumlah_data_masuk').innerHTML =objek_masuk.length;
  document.getElementById('jumlah_masuk').innerHTML ="Rp. "+jumlah_masuk;

    var label = [];
    var data1 = [];
    var i;

    for(i=0; i<objek_masuk.length; i++){                     
        label[i] =  [objek_masuk[i].tanggal];
        data1[i] = [objek_masuk[i].jumlah];
    }

  var ctxL = document.getElementById("mskChart").getContext('2d');
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

  var objek_keluar = JSON.parse('<?php echo json_encode($keluar) ?>')
  var jumlah_keluar = 0;
  for (var i = 0; i < objek_keluar.length; i++) {
     jumlah_keluar = jumlah_keluar + objek_keluar[i].jumlah;
  }
  document.getElementById('jumlah_data_keluar').innerHTML =objek_keluar.length;
  document.getElementById('jumlah_keluar').innerHTML ="Rp. "+jumlah_keluar;

  var saldo = jumlah_masuk - jumlah_keluar;
  document.getElementById('saldo').innerHTML ="Rp. "+saldo;//saldo

    var label = [];
    var data1 = [];
    var i;

    for(i=0; i<objek_keluar.length; i++){                     
        label[i] =  [objek_keluar[i].tanggal];
        data1[i] = [objek_keluar[i].jumlah];
    }

  var ctxL = document.getElementById("klrChart").getContext('2d');
  var myLineChart = new Chart(ctxL, {
  type: 'line',
    data: {
      labels: label,
        datasets: [{
          label: "Kas Keluar",
          data: data1,
          backgroundColor: [
          'rgba(0, 137, 132, .2)',
          ],
          borderColor: [
          'rgba(0, 10, 130, .7)',
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
