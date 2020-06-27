@extends('backend/master')
@section('title', 'Tambah')
@section('state', '/ Infaq')
@section('content')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>


	<!-- Button trigger modal -->
	<a href="{{route('infaq.create')}}" class="btn btn-primary mb-4">
	  <i class="fas fa-plus-square mr-2"></i>Tambah Data
	</a>

	<!-- Modal -->
	<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalLabel">Infaq</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          			<span aria-hidden="true">&times;</span>
	        		</button>
	      		</div>
	      		<div class="modal-body">
	        	<form method="post" action="/dashboard/infaq">
	        		@csrf
			  		<div class="container">
			  			<div class="form-group">
					    	<label for="formGroupExampleInput">Jumlah Infaq (Rp)</label>
					    	<input type="number" class="form-control" id="formGroupExampleInput" placeholder="Rp. 1.000.000" name="infaq" required>
						</div>
						<div class="form-group">
					    	<label for="formGroupExampleInput">Jumlah Pengeluaran (Rp)</label>
					    	<input type="number" class="form-control" id="formGroupExampleInput" placeholder="Rp. 1.000.000" name="pengeluaran" required>
						</div>
						<div class="form-group">
					    	<label for="formGroupExampleInput">Tanggal</label>
					    	<input class="date form-control" type="text" name="tanggal" required>
						</div>
					</div>
					<script type="text/javascript">
				    	$('.date').datepicker({  
				       		format: 'yyyy-mm-dd'
				    	 });  
					</script>
				 	<div class="modal-footer">
			        	<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-window-close mr-1"></i>Batal</button>
			        	<button type="submit" class="btn btn-primary"><i class="fas fa-check-square mr-1"></i>Simpan</button>
			      	</div>
				</form>
	      		</div>
	     
	    	</div>
	  	</div>
	</div>

    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Data Infaq Masjid</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Infaq</th>
                                <th>Pengeluaran</th>
                                <th>Saldo</th>
                                <th>Tanggal</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Infaq</th>
                                <th>Pengeluaran</th>
                                <th>Saldo</th>
                                <th>Tanggal</th>
                                <th>Detail</th>
                            </tr>
                        </tfoot>
                         <tbody>
					  	@foreach ($infaq as $inf)
						    <tr>
						      	<th class="text-center" scope="row">{{ $loop->iteration}}</th>
						      	<td>Rp. {{ $inf->infaq}}</td>
						      	<td>Rp. {{ $inf->pengeluaran}}</td>
						      	<td>Rp. {{ $inf->saldo}}</td>
						      	<td class="text-center">{{ date('d-M-Y', strtotime($inf->tanggal)) }}</td>
								<td class="text-center">
								 	<a type="button" href="{{route('infaq.show', $inf->id)}}"  class="badge badge-primary"><i class="fas fa-info-circle mr-1"></i>Detail</a>

                                     <a type="button" href="{{route('infaq.edit', $inf->id)}}" class="badge badge-success"><i class="fas fa-edit mr-1"></i>Edit</a>

                                    <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$inf->id}})"data-target="#DeleteModal" class="badge badge-danger"><i class="fa fa-trash mr-1"></i>Hapus</a>
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
                     var url = 'infaq/:id';
                     url = url.replace(':id', id);
                     $("#deleteForm").attr('action', url);
                 }

                 function formSubmit()
                 {
                     $("#deleteForm").submit();
                 }
              </script>
@endsection