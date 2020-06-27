@extends('backend/master')
@section('title', 'Edit')
@section('state', '/ Kas Masuk / Edit')
@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

<div class="row">
	<form class="col" method="post" action="{{route('masuk.store')}}">
	@csrf
	<div class="container">
	<div class="form-group">
		<label>Jumlah (Rp)</label>
		<input type="number" class="form-control @error('jumlah') is-invalid @enderror" value="{{$masuk->jumlah}}" name="jumlah">
		@error('jumlah')
            <span class="invalid-feedback" role="alert">
            	<strong>{{ $message }}</strong>
            </span>
         @enderror
	</div>
	<div class="form-group">
		<label >Keterangan</label>
		<select class="custom-select @error('keterangan') is-invalid @enderror" name="keterangan">
            <option selected disabled value="{{$masuk->keterangan}}">{{$masuk->keterangan}}</option>
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
	<div class="form-group">
		<label>Sumber</label>
		<input type="text" class="form-control @error('infaq') is-invalid @enderror" value="{{$masuk->sumber}}" name="sumber">
		@error('sumber')
            <span class="invalid-feedback" role="alert">
            	<strong>{{ $message }}</strong>
            </span>
         @enderror
	</div>
	<div class="form-group">
		<label>Tanggal (YYYY-MM-DD)</label>
		<input class="date form-control @error('tanggal') is-invalid @enderror" type="text" name="tanggal" value="{{$masuk->tanggal}}">
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
		<a href="{{route('masuk.index')}}" class="btn btn-danger col-sm-2 mb-1" type="button"><i class="fas fa-window-close mr-1"></i>Batal</a>
        <button class="btn btn-primary col-sm-2 mb-1" type="submit"><i class="fas fa-check-square mr-1"></i>Simpan</button>
        </form>
	</div>
	</form>
</div>
@endsection