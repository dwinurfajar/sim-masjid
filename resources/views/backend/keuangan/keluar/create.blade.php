@extends('backend/master')
@section('title', 'Tambah')
@section('state', '/ Kas Keluar / Tambah')
@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

<div class="row">
	<form class="col" method="post" action="{{route('keluar.store')}}">
	@csrf
	<div class="container">
	<div class="form-group">
		<label>Jumlah (Rp)</label>
		<input type="number" class="form-control @error('jumlah') is-invalid @enderror" placeholder="Jumlah" name="jumlah">
		@error('jumlah')
            <span class="invalid-feedback" role="alert">
            	<strong>{{ $message }}</strong>
            </span>
         @enderror
	</div>
	
	<div class="form-group">
		<label>Keterangan</label>
		<input type="text" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Keterangan" name="keterangan">
		@error('keterangan')
            <span class="invalid-feedback" role="alert">
            	<strong>{{ $message }}</strong>
            </span>
         @enderror
	</div>
	<div class="form-group">
		<label>Tanggal (YYYY-MM-DD)</label>
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
				 	

</div>
<div class="col ">
	<div class="text-center">
		<a href="{{route('keluar.index')}}" class="btn btn-danger col-sm-2 mb-1" type="button"><i class="fas fa-window-close mr-1"></i>Batal</a>
        <button class="btn btn-primary col-sm-2 mb-1" type="submit"><i class="fas fa-check-square mr-1"></i>Simpan</button>
        </form>
	</div>
	</form>
</div>
@endsection