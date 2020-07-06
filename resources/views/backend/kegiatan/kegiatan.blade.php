@extends('backend/master')
@section('title', 'Kegiatan')
@section('state', '/ Kegiatan')
@section('content')

<a href="{{route('kegiatan.create')}}" class="btn btn-primary mb-4">
    <i class="fas fa-plus-square mr-2"></i>Tambah Data
</a>

    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Data Kegiatan akan datang</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Tempat</th>
                                <th>Pukul</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Tempat</th>
                                <th>Pukul</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                         <tbody>
                                    @foreach ($kegiatan as $kgt)
                                        <tr>
                                            <th class="text-center" scope="row">{{ $loop->iteration}}</th>
                                            <td>{{ $kgt->nama}}</td>
                                            <td>{{$kgt->deskripsi}}</td>
                                            <td>{{ $kgt->tempat}}</td>
                                            <td>{{ $kgt->pukul}}</td>
                                            <td class="text-center">{{ date('d-M-Y', strtotime($kgt->tanggal)) }}</td>
                                                <td class="text-center">


                                              <a type="button" href="{{route('kegiatan.edit', $kgt->id)}}" class="badge badge-success"><i class="fas fa-edit mr-1"></i>Edit</a>

                                              <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$kgt->id}})"data-target="#DeleteModal" class="badge badge-danger"><i class="fa fa-trash mr-1"></i>Hapus</a>
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
                     var url = 'kegiatan/:id';
                     url = url.replace(':id', id);
                     $("#deleteForm").attr('action', url);
                 }

                 function formSubmit()
                 {
                     $("#deleteForm").submit();
                 }
              </script>

@endsection