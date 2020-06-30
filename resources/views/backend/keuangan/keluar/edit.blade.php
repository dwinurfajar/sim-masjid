@extends('backend/master')
@section('title', 'Edit')
@section('state', '/ Kas Keluar / Edit')
@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

<div class="row justify-content-center">
	<div class="col-sm-6 ">
        <form method="post" action="{{route('keluar.update', $keluar->id)}}">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col">
                	<div class="form-group row mb-2">   		
                        <label class="col-sm-4 col-form-label">Jumlah</label>
                        <div class="input-group col-sm-8">
                        	<div class="input-group-prepend">
							    <span class="input-group-text">Rp.</span>
							 </div>
                            <input type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" value="{{$keluar->jumlah}}">
                            @error('jumlah')
                            	<span class="invalid-feedback" role="alert">
                                	<strong>{{ $message }}</strong>
                            	</span>
                        	@enderror
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-sm-4 col-form-label">Keterangan</label>
                        <div class="col-sm-8">
                            <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" rows="3" value="">{{$keluar->keterangan}}</textarea>
							@error('keterangan')
					            <span class="invalid-feedback" role="alert">
					            	<strong>{{ $message }}</strong>
					            </span>
					         @enderror
                        </div>
                    </div>


                    <div class="form-group row mb-2">
                        <label class="col-sm-4 col-form-label">Tanggal</label>
						<div class="col-sm-8">
                            <input class="date form-control @error('tanggal') is-invalid @enderror" type="text" name="tanggal" value="{{$keluar->tanggal}}">
							@error('tanggal')
					            <span class="invalid-feedback" role="alert">
					            	<strong>{{ $message }}</strong>
					            </span>
					         @enderror
                        </div>
                    </div>

                    <script type="text/javascript">
						$('.date').datepicker({ format: 'yyyy-mm-dd'});  
					</script>
                    <div class="col text-center">
				        <a href="{{route('keluar.index')}}" class="btn btn-danger col-4 mb-1" type="button"><i class="fas fa-window-close mr-1"></i>Batal</a>
				        <button class="btn btn-primary col-4 mb-1" type="submit"><i class="fas fa-check-square mr-1"></i>Simpan</button>
				        </form>
				    </div>
                </div>
                
             </div>      
        </form>
    </div>
</div>


@endsection