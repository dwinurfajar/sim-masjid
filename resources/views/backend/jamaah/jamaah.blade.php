@extends('backend/master')
@section('content')
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<!--<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWe9SB74omaI4ptZ5c9Jph2kiSekvbmyU&callback=initMap" type="text/javascript"></script>
-->
    <div>
        <div class="col-xl-3 col-md-6"> </div>
   </div>
        <a type="button" href="{{route('jamaah.create')}}" class="btn btn-primary mb-4"><i class="fas fa-plus-square mr-2"></i>Add jamaah</a>
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Data Jamaah Masjid</div>
                <div class="card-body ">
                    <div class="table-responsive ">
                        <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($jamaah as $jmh)
                                <tr>
                                    <td class="text-center" scope="row">{{ $loop->iteration}}</td>
                                    <td>{{ $jmh->name}}</td>
                                    <td>{{ $jmh->gender}}</td>
                                    <td>{{ $jmh->phone}}</td>
                                    <td>{{ $jmh->address}}</td>
                                    
                                    <td class="text-center text-white">
                                        <a type="button" href="{{route('jamaah.show', $jmh->id)}}"  class="badge badge-primary"><i class="fas fa-info-circle mr-1"></i>Detail</a>

                                        <a type="button" href="{{route('jamaah.edit', $jmh->id)}}" class="badge badge-success"><i class="fas fa-edit mr-1"></i>Edit</a>

                                        <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$jmh->id}})"data-target="#DeleteModal" class="badge badge-danger"><i class="fa fa-trash mr-1"></i> Delete</a>
                                     
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

                <script type="text/javascript">
                    
                    var obj = JSON.parse('<?php echo json_encode($jamaah) ?>')

                    var locations = [];
                    var i;
                    for(i=0; i<obj.length; i++){                     
                        locations[i] = [[obj[i].nama], [obj[i].latt], [obj[i].long], [obj[i].nomorHp]];
                    }
                    
                    var map = new google.maps.Map(document.getElementById('map'), {
                      zoom: 17,
                      center: new google.maps.LatLng(-7.898699, 112.608776),
                      mapTypeId: google.maps.MapTypeId.ROADMAP
                    });


                    var infowindow = new google.maps.InfoWindow();

                    var marker, i;

                    for (i = 0; i < locations.length; i++) { 
                      marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                        map: map,
                        title:'asdas'

                      });
                      
                      google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        return function() {
                          infowindow.setContent("Sdr/i : "+locations[i][0]+" HP : "+locations[i][3]);
                          infowindow.open(map, marker);
                        }
                      })(marker, i)); 
                    }
                  </script>
                  
            </div>
@endsection