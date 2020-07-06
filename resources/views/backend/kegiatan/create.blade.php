@extends('backend/master')
@section('title', 'Kegiatan')
@section('state', '/ Kegiatan')
@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

<div class="row justify-content-center">
	<div class="col-sm-6 ">
        <form method="post" action="{{route('kegiatan.store')}}">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group row mb-2">
                        <label class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8 input-group">
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama">
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                	<div class="form-group row mb-2">
                        <label class="col-sm-4 col-form-label">Deskripsi</label>
                        <div class="col-sm-8">
                            <textarea type="text-area" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Deskripsi" name="deskripsi" rows="3"></textarea>
							@error('deskripsi')
					            <span class="invalid-feedback" role="alert">
					            	<strong>{{ $message }}</strong>
					            </span>
					         @enderror
                        </div>
                    </div>


                    <div class="form-group row mb-2">
                        <label class="col-sm-4 col-form-label">Tempat</label>
                        <div class="input-group col-sm-8">
                            <input type="text" class="form-control @error('tempat') is-invalid @enderror" name="tempat" placeholder="Tempat">
                            @error('tempat')
                            	<span class="invalid-feedback" role="alert">
                                	<strong>{{ $message }}</strong>
                            	</span>
                        	@enderror
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-sm-4 col-form-label">Pukul</label>
                        <div class="input-group col-sm-8">
                            <input type="time" class="form-control @error('pukul') is-invalid @enderror" name="pukul" placeholder="Pukul">
                            @error('pukul')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    

                    <div class="form-group row mb-2">
                        <label class="col-sm-4 col-form-label">Tanggal</label>
						<div class="col-sm-8">
                            <input class="date form-control @error('tanggal') is-invalid @enderror" type="text" name="tanggal" placeholder="Tanggal">
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
				        <a href="{{route('kegiatan.index')}}" class="btn btn-danger col-5 mb-1" type="button"><i class="fas fa-window-close mr-1"></i>Batal</a>
				        <button class="btn btn-primary col-5 mb-1" type="submit"><i class="fas fa-check-square mr-1"></i>Simpan</button>
				        </form>
				    </div>
                </div>
                
             </div>      
        </form>
    </div>
</div>
@endsection