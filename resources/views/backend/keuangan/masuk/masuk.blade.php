@extends('backend/master')
@section('title', 'Kas Masuk')
@section('state', '/ Kas Masuk')
@section('content')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>


	<!-- Button trigger modal -->
	<a href="{{route('masuk.create')}}" class="btn btn-primary mb-4">
	  <i class="fas fa-plus-square mr-2"></i>Tambah Data
	</a>

    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Data Infaq Masjid</div>
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
                                                      ain-lain
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
@endsection