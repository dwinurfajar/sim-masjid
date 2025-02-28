@extends('backend/master')
@section('title', 'Tambah')
@section('state', '/ Kas Masuk / Tambah')
@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

<div class="row justify-content-center">
	<div class="col-sm-6 ">
        <form method="post" action="{{route('masuk.store')}}">
            @csrf
            <div class="row">
                <div class="col">

                	<div class="form-group row mb-2">
                		
                        <label class="col-sm-4 col-form-label">Jumlah</label>
                        <div class="input-group col-sm-8">
                        	<div class="input-group-prepend">
							    <span class="input-group-text">Rp.</span>
							 </div>
                            <input type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" placeholder="Jumlah">
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
                            <select class="custom-select @error('keterangan') is-invalid @enderror" name="keterangan">
					            <option selected disabled value="">Pilih</option>
					            <option value="I">Infaq</option>
					            <option value="S">Sedekah</option>
					            <option value="L">Lain-lain</option>
					         </select>
							@error('keterangan')
					            <span class="invalid-feedback" role="alert">
					            	<strong>{{ $message }}</strong>
					            </span>
					         @enderror
                        </div>
                    </div>

                	<div class="form-group row mb-2">
                        <label class="col-sm-4 col-form-label">Sumber</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @error('sumber') is-invalid @enderror" placeholder="Sumber" name="sumber">
							@error('sumber')
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
				        <a href="{{route('masuk.index')}}" class="btn btn-danger col-5 mb-1" type="button"><i class="fas fa-window-close mr-1"></i>Batal</a>
				        <button class="btn btn-primary col-5 mb-1" type="submit"><i class="fas fa-check-square mr-1"></i>Simpan</button>
				        </form>
				    </div>
                </div>
                
             </div>      
        </form>
    </div>
</div>

@endsection