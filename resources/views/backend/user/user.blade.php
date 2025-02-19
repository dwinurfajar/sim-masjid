@extends('backend/master')
@section('title', 'Users')
@section('state', '/ Users')
@section('content')

<div class="row">
        <div class="col-xl-3 col-md-6"> </div>
   </div>
        <a type="button" href="{{ route('users.create') }}" class="btn btn-primary mb-4"><i class="fas fa-plus-square mr-2"></i>Tambah user</a>
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Daftar User</div>
                <div class="card-body ">
                    <div class="table-responsive ">
                        <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>                    
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>   
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($user as $usr)
                                <tr>
                                    <td class="text-center" scope="row">{{ $loop->iteration}}</td>
                                    <td>{{ $usr->name}}</td>
                                    <td>{{ $usr->email}}</td>
                                    <td class="text-center"><?php 
                                    $isAdmin = $usr->admin ; 
                                ?>
                                @if($isAdmin == 1 )
                                    Admin
                                @else
                                    User
                                @endif</td>
                                    
                                    <td class="text-center text-white">
                                        <a type="button" href="{{route('users.show', $usr->id)}}"  class="badge badge-primary"><i class="fas fa-info-circle mr-1"></i>Detail</a>

                                        <a type="button" href="{{route('users.edit', $usr->id)}}" class="badge badge-success"><i class="fas fa-edit mr-1"></i>Edit</a>

                                        <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$usr->id}})"data-target="#DeleteModal" class="badge badge-danger"><i class="fa fa-trash mr-1"></i>Hapus</a>
                                     
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
                    <form action="{{route('users.destroy' , $usr->id )}}" id="deleteForm" method="post">
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
                     var url = 'users/:id';
                     url = url.replace(':id', id);
                     $("#deleteForm").attr('action', url);
                 }

                 function formSubmit()
                 {
                     $("#deleteForm").submit();
                 }
              </script>

@endsection