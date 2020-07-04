@extends('backend/master')
@section('title', 'Edit')
@section('state', '/ Zakat / Edit')
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

<div class="row justify-content-center">
	<div class="col-sm-6 ">
        <form method="post" action="{{route('zakat.update', $zakat->id)}}">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col">
                    <div class="form-group row mb-2">
                        <label class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8 input-group">
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{$zakat->nama}}">
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                	<div class="form-group row mb-2">
                        <label class="col-sm-4 col-form-label">Jenis Zakat</label>
                        <div class="col-sm-8">
                            <select class="custom-select @error('jenisZakat') is-invalid @enderror" name="jenisZakat">
                                <option selected value="{{$zakat->jenisZakat}}">
                                    <?php $jenisZakat = $zakat->jenisZakat ; ?>
                                    @if($jenisZakat == 1 )
                                        Fitrah
                                    @else
                                        Mal
                                    @endif
                                </option>
                                <option value="1">Zakal Fitrah</option>
                                <option value="0">Zakat Mal</option>
                            </select>
                            @error('jenisZakat')
                            	<span class="invalid-feedback" role="alert">
                                	<strong>{{ $message }}</strong>
                            	</span>
                        	@enderror
                        </div>
                    </div>


                    <div class="form-group row mb-2">
                        <label class="col-sm-4 col-form-label">Tunai</label>
                        <div class="input-group col-sm-8">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                             </div>
                            <input type="number" class="form-control @error('tunai') is-invalid @enderror" name="tunai" value="{{$zakat->tunai}}">
                            @error('tunai')
                            	<span class="invalid-feedback" role="alert">
                                	<strong>{{ $message }}</strong>
                            	</span>
                        	@enderror
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-sm-4 col-form-label">Beras</label>
                        <div class="input-group col-sm-8">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Kg.</span>
                             </div>
                            <input type="text" class="form-control @error('beras') is-invalid @enderror" name="beras" value="{{$zakat->beras}}">
                            @error('beras')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    

                    <div class="form-group row mb-2">
                        <label class="col-sm-4 col-form-label">Tanggal</label>
						<div class="col-sm-8">
                            <input class="date form-control @error('tanggal') is-invalid @enderror" type="text" name="tanggal" value="{{$zakat->tanggal}}">
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
				        <a href="{{route('zakat.index')}}" class="btn btn-danger col-5 mb-1" type="button"><i class="fas fa-window-close mr-1"></i>Batal</a>
				        <button class="btn btn-primary col-5 mb-1" type="submit"><i class="fas fa-check-square mr-1"></i>Simpan</button>
				        </form>
				    </div>
                </div>
                
             </div>      
        </form>
    </div>
</div>
@endsection