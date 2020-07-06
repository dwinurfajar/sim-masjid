<!doctype html>
<html lang="en">

    <head>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <title>Masjid KH Ahmad Dahlan</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,600">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">
        <link rel="stylesheet" href="{{asset('frontend/assets/css/media-queries.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/assets/css/animate.css')}}">  
        <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="{{asset('frontend/assets/ico/favicon.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">


        
    </head>

    <body>

        <!-- Top menu -->
        <nav class="navbar navbar-dark fixed-top navbar-expand-md navbar-no-bg">
            <div class="container">
                <a class="navbar-brand" href="/">Masjid KH Ahmad Dahlan</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link scroll-link" href="#top-content">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link scroll-link" href="#jamaah">Jamaah</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link scroll-link" href="#laporan">Laporan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link scroll-link" href="#zakat">Zakat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link scroll-link" href="#kegiatan">Kegiatan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link scroll-link" href="#profil">Profil</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Top content -->
        <div class="top-content">
            <div class="container">
                
                <div class="row">
                    <div class="col-md-8 offset-md-2 text">
                        <h1 class="wow fadeInLeftBig">Masjid KH Ahmad Dahlan</h1>
                        <div class="description wow fadeInLeftBig">
                        <h5>Selamat datang di website Masjid Ahmad Dahlan</h5>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
        
        

        <!-- About us -->
        <div class="jamaah-container section-container section-container-gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col jamaah mt-4">
                        <h1>Jamaah</h1>
                        <h5 id="total_jamaah"></h5>
                        <label>Peta Persebaran Jamaah</label>

                        <div class="col" id="map" style="height: 400px; width: 100%;"></div>
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
                    </div>
                </div>
            </div>
        </div>
        <div class="laporan-container section-container">
            <div class="container">
                <div class="row">
                    <div class="col laporan mt-4">
                        <h2>Laporan</h2>
                        <h5 class="mt-4 mb-3">Laporan keuangan Masjid KH Ahmad Dahlan bulan ini</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Kas Masuk</th>
                                    <th>Kas Keluar</th>
                                    <th>Total Saldo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <th id="total_masuk"></th>
                                    <th id="total_keluar"></th>
                                    <th id="saldo"></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="zakat-container section-container section-container-gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col zakat mt-4">
                        <h2>Zakat</h2>
                        <h5 class="mt-4 mb-3">Laporan zakat Masjid KH Ahmad Dahlan tahun ini</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Total Penerimaan</th>
                                    <th>Total Uang Tunai</th>
                                    <th>Total Beras</th>
                                    <th>Total Penerima Zakat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <th id="jumlah_zakat"></th>
                                    <th id="jumlah_tunai"></th>
                                    <th id="jumlah_beras"></th>
                                    <th id="jumlah_penerima"></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="kegiatan-container section-container">
            <div class="container">
                <div class="row">
                    <div class="col kegiatan">
                        <h2>Kegiatan</h2>
                        <h5>Daftar kegiatan yang akan datang</h5>
                        @foreach ($kegiatan as $kgt)
                            <div class="row justify-content-center">
                                <div class="col-8 card mb-3">
                                    <div class="card-body">
                                        <h3 class="card-title">{{$kgt->nama}}</h3>
                                        <div class="card-subtitle">Pukul {{$kgt->pukul}} WIB tanggal {{ date('d M Y', strtotime($kgt->tanggal)) }}, di {{$kgt->tempat}}</div>
                                        <p>{{$kgt->deskripsi}}</p>

                                    </div>
                                </div>
                                
                                
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="profil-container section-container">
            <div class="container">
                <div class="row">
                    <div class="col profil">
                        <h2>Profil</h2>
                        <div class="divider-1 wow fadeInUp"><span></span></div>
                        <p>ini halaman profil</p>
                    </div>
                </div>
            </div>
        </div>
        

                

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-5 footer-left">
                        <p>Copyright &copy; dynatic 2020</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col footer-bottom">
                        <a class="scroll-link" href="#top-content"><i class="fas fa-chevron-up"></i></a>
                    </div>
                </div>
            </div>
        </footer>


        <!-- Javascript -->

        <script src="{{asset('frontend/assets/js/jquery-3.2.1.min.js')}}"></script>
        <script src="{{asset('frontend/assets/js/jquery-migrate-3.0.0.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <script src="{{asset('frontend/assets/js/jquery.backstretch.min.js')}}"></script>
        <script src="{{asset('frontend/assets/js/wow.min.js')}}"></script>
        <script src="{{asset('frontend/assets/js/waypoints.min.js')}}"></script>
        <script src="{{asset('frontend/assets/js/scripts.js')}}"></script>

        <!-- Maps -->
        <script src="https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.js"></script>
        <link href="https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.css" rel="stylesheet" />
        <script type="text/javascript">
            mapboxgl.accessToken = 'pk.eyJ1IjoiZHluYXRpYyIsImEiOiJja2JpcnpyaHQwaTcwMnNsdHZweTc2eXQ0In0.2dDt6graznsFCKEN64n1ZQ';
                    var objek_jamaah = JSON.parse('<?php echo json_encode($jamaah) ?>')
                    var laki = 0;
                    var per = 0;

                    for(i=0; i<objek_jamaah.length; i++){  
                        if([objek_jamaah[i].jenisKelamin] == '1'){
                          laki++;
                        }else{
                          per++;
                        }
                    }
                    document.getElementById('total_jamaah').innerHTML = "Total jamaah masjid "+objek_jamaah.length+" orang, "+laki+" jamaah laki-laki dan "+per+" jamaah perempuan.";

                    var locations = [];
                    var i;

                      for(i=0; i<objek_jamaah.length; i++){                     
                          locations[i] = [[objek_jamaah[i].nama], [objek_jamaah[i].latt], [objek_jamaah[i].long], [objek_jamaah[i].aktif]];
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


            //    SALDO
            var objek_masuk = JSON.parse('<?php echo json_encode($masuk) ?>')
            var objek_keluar = JSON.parse('<?php echo json_encode($keluar) ?>')
            var saldo = JSON.parse('<?php echo json_encode($saldo) ?>')

            var jumlah_masuk = 0;

            for (var i = 0; i < objek_masuk.length; i++) {
                jumlah_masuk = jumlah_masuk + objek_masuk[i].jumlah;
            }

            var jumlah_keluar = 0;
            for (var i = 0; i < objek_keluar.length; i++) {
                jumlah_keluar = jumlah_keluar + objek_keluar[i].jumlah;
            }

            document.getElementById('total_masuk').innerHTML = "Rp. "+jumlah_masuk;
            document.getElementById('total_keluar').innerHTML = "Rp. "+jumlah_keluar;
            document.getElementById('saldo').innerHTML = "Rp. "+saldo; 



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
        </script>

    </body>

</html>