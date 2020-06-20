@extends('backend/master')
@section('content')

<div class="row">
        <div class="col-xl-3 col-md-6"> </div>
   </div>
        <a type="button" href="{{ route('users.create') }}" class="btn btn-primary mb-4"><i class="fas fa-plus-square mr-2"></i>Tambah Data</a>
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Users</div>
                <div class="card-body ">
                    <div class="table-responsive ">
                        <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>

                                    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>

                                    
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($user as $usr)
                                <tr>
                                    <td class="text-center" scope="row">{{ $loop->iteration}}</td>
                                    <td>{{ $usr->name}}</td>
                                    <td>{{ $usr->email}}</td>
                                    <td>{{ $usr->admin}}</td>
                                    
                                    <td class="text-center text-white">
                                        <a type="button" href="jamaah/edit/{{$usr->id}}"  class="badge badge-primary"><i class="fas fa-info-circle mr-1"></i>Detail</a>

                                        <a type="button" href="{{route('users.edit', $usr->id)}}" class="badge badge-success"><i class="fas fa-edit mr-1"></i>Edit</a>

                                        <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$usr->id}})"data-target="#DeleteModal" class="badge badge-danger"><i class="fa fa-trash mr-1"></i> Delete</a>
                                     
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

@endsection