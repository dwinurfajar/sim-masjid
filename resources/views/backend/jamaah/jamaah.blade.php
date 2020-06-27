@extends('backend/master')
@section('content')
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
<script src="https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.js"></script>
<link href="https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.css" rel="stylesheet" />
    <div>
        <div class="col-xl-3 col-md-6"> </div>
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
                       
                        if(locations[i][3] != true){
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
            </div>
@endsection