@extends('backend/master')
@section('title', 'Zakat')
@section('state', '/ Zakat ')
@section('content')


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- MULAI STYLE CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
        integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" />


    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <!-- AKHIR STYLE CSS -->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>


    




<a href="javascript:void(0)" class="btn btn-primary mb-4" id="tombol-tambah"><i class="fas fa-plus-square mr-2"></i>Tambah Zakat</a>


<div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1 small"></i>Data Zakat Masjid</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered"  id="table_pegawai" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jenis Zakat</th>
                                <th>Jenis Bayar</th>
                                <th>Jumlah</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                              </tr>
                        </thead>
                      </table>
                  </div>
              </div>
          </div>



    <!-- MULAI MODAL FORM TAMBAH/EDIT-->
    <div class="modal fade" id="tambah-edit-modal" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-judul"></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="form-tambah-edit" name="form-tambah-edit" class="form-horizontal">
                        <div class="row">
                            <div class="col-sm-12">

                                <input type="hidden" name="id" id="id">

                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 control-label">Nama</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="">
                                        @error('nama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 control-label">Jenis Zakat</label>
                                    <div class="col-sm-8">
                                        <select name="jenisZakat" id="jenisZakat" class="form-control required">
                                            <option value="">Pilih Jenis Zakat</option>
                                            <option value="1">Fitrah</option>
                                            <option value="0">Mal</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 control-label">Jenis Bayar</label>
                                    <div class="col-sm-8">
                                        <select name="jenisBayar" id="jenisBayar" class="form-control required">
                                            <option value="">Pilih Jenis Bayar</option>
                                            <option value="b">Beras</option>
                                            <option value="t">Tunai</option>
                                            <option value="l">Lainnya</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row t inputt">
                                    <label  class="col-sm-4 control-label">Jumlah</label>
                                    <div class="col-sm-8 input-group">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text">Rp.</span>
                                       </div>
                                        <input type="number" class="form-control required" id="jumlahTn" name="jumlah" value=""
                                            >
                                    </div>
                                </div>
                                <div class="form-group row b inputt">
                                    <label  class="col-sm-4 control-label">Jumlah</label>
                                    <div class="col-sm-8 input-group">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text">Kg. </span>
                                       </div>
                                        <input type="number" class="form-control" id="jumlahBrs" name="jumlah" value=""
                                            required>
                                    </div>
                                </div>
                                <div class="form-group row l inputt">
                                    <label  class="col-sm-4 control-label">Jumlah</label>
                                    <div class="col-sm-8 input-group">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text">Dll </span>
                                       </div>
                                        <input type="number" class="form-control" id="jumlahBrs" name="jumlah" value=""
                                            required>
                                    </div>
                                </div>

                                <div class="form-group row mb-2">
                                    <label class="col-sm-4 col-form-label">Tanggal</label>
                                    <div class="col-sm-8">
                                         <input class="date form-control" type="text" id="tanggal" name="tanggal" placeholder="Tanggal">
                                     </div>
                                </div>

                                          <script type="text/javascript">
                                            $('.date').datepicker({ format: 'yyyy-mm-dd'});  
                                          </script>

                            </div>
                          <div class="text-center col">
                                <button type="submit" class="btn btn-primary col-sm-4" id="tombol-simpan"
                                    value="create">Simpan
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" tabindex="-1" role="dialog" id="konfirmasi-modal" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus data?</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-success" data-dismiss="modal">batal</button>
                    <button type="button" class="btn btn-danger" name="tombol-hapus" id="tombol-hapus">Ya, Lanjutkan</button>
                </div>
            </div>
        </div>
    </div>


    <!-- LIBARARY JS -->
 
    
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>

    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
        integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
        integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>

    <!-- AKHIR LIBARARY JS -->

    <!-- JAVASCRIPT -->
    <script>
        
      //input form jenis bayar
      $(document).ready(function(){
          $("#jenisBayar").change(function(){
              $(this).find("option:selected").each(function(){
                  var optionValue = $(this).attr("value");
                  console.log(optionValue);
                  if(optionValue){
                      $(".inputt").not("." + optionValue).hide();
                      $("." + optionValue).show();
                  } else{
                      $(".inputt").hide();
                  }
              });
          }).change();
      });
        //CSRF TOKEN PADA HEADER
        //Script ini wajib krn kita butuh csrf token setiap kali mengirim request post, patch, put dan delete ke server
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        //TOMBOL TAMBAH DATA
        //jika tombol-tambah diklik maka
        jQuery(document).ready(function(){
        $('#tombol-tambah').click(function () {
            $('#button-simpan').val("create-post"); //valuenya menjadi create-post
            $('#id').val(''); //valuenya menjadi kosong
            $('#form-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
            $('#modal-judul').html("Tambah Zakat"); //valuenya tambah pegawai baru
            $('#tambah-edit-modal').modal('show'); //modal tampil
        });
});

        //MULAI DATATABLE
        //script untuk memanggil data json dari server dan menampilkannya berupa datatable
        $(document).ready(function () {
           var t = $('#table_pegawai').DataTable({
              lengthMenu:   [
                    [ 10, 25, 50, -1 ],[ '10', '25', '50', 'aria-label' ]
                    ],
                dom: 'Blfrtip',
                
                pageLength: 10,
                buttons: [{extend: 'print', 
                          className: 'excelButton',
                          exportOptions:{
                            columns: [0,1,2,3,4]
                          }
                        }],
                processing: true,
                serverSide: true, //aktifkan server-side 
                ajax: {
                    url: "{{ route('zakat.index') }}",
                    type: 'GET'
                },
                columns: [{
                        data: '',
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'jenisZakat',
                        render : function(data){
                          if(data === "1"){
                            return 'Fitrah';
                          }else{
                            return 'Mal';
                          }
                        }
                    },
                    {
                        data: 'jenisBayar',
                        render : function(data){
                          if(data === "1"){
                            return 'Beras';
                          }else{
                            return 'Tunai';
                          }
                        }
                    },
                    {
                        data: 'jumlah',
                        name: 'jumlah'
                    },
                    {
                        data: 'tanggal',
                        name: 'tanggal',
                        
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },

                ],
                columnDefs: [
                    {
                        "targets": 5, // your case first column
                        "className": "text-center", 
                        width : '15%'
                   },
                   {
                        "targets": 4, // your case first column
                        "className": "text-center",
                        width : '15%'
                   },
                   {
                        "targets": 3,
                        "className": "text-right",
                        width : '15%'
                    },
                   {
                        "targets": 1,
                        "className": "text-center",
                        width : '15%'
                    },
                   {
                        "targets": 2,
                        "className": "text-center",
                        width : '15%'
                    },
                    {
                        "searchable": false,
                        "orderable": false,
                        "targets": 0
                    }
                ],
                order: [
                    [4, 'desc']
                ]
            });
            t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();
        });

        //SIMPAN & UPDATE DATA DAN VALIDASI (SISI CLIENT)
        //jika id = form-tambah-edit panjangnya lebih dari 0 atau bisa dibilang terdapat data dalam form tersebut maka
        //jalankan jquery validator terhadap setiap inputan dll dan eksekusi script ajax untuk simpan data
        if ($("#form-tambah-edit").length > 0) {
            $("#form-tambah-edit").validate({
                submitHandler: function (form) {
                    var actionType = $('#tombol-simpan').val();
                    $('#tombol-simpan').html('Sending..');

                    $.ajax({
                        data: $('#form-tambah-edit')
                            .serialize(), //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
                        url: "{{ route('zakat.store') }}", //url simpan data
                        type: "POST", //karena simpan kita pakai method POST
                        dataType: 'json', //data tipe kita kirim berupa JSON
                        success: function (data) { //jika berhasil 
                            $('#form-tambah-edit').trigger("reset"); //form reset
                            $('#tambah-edit-modal').modal('hide'); //modal hide
                            $('#tombol-simpan').html('Simpan'); //tombol simpan
                            var oTable = $('#table_pegawai').dataTable(); //inialisasi datatable
                            oTable.fnDraw(false); //reset datatable
                            iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                                title: 'Data Berhasil Disimpan',
                                message: '{{ Session('
                                success ')}}',
                                position: 'bottomRight'
                            });
                        },
                        error: function (data) { //jika error tampilkan error pada console
                            console.log('Error:', data);
                            $('#tombol-simpan').html('Simpan');
                        }
                    });
                }
            })
        }

        //TOMBOL EDIT DATA PER PEGAWAI DAN TAMPIKAN DATA BERDASARKAN ID PEGAWAI KE MODAL
        //ketika class edit-post yang ada pada tag body di klik maka
        $('body').on('click', '.edit-post', function () {
            var data_id = $(this).data('id');
            $.get('zakat/' + data_id + '/edit', function (data) {
                $('#modal-judul').html("Edit Zakat");
                $('#tombol-simpan').val("edit-post");
                $('#tambah-edit-modal').modal('show');

                //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas               
                $('#id').val(data.id);
                $('#nama').val(data.nama);
                $('#jenisZakat').val(data.jenisZakat);
                $('#jenisBayar').val(data.jenisBayar);
                $('#jumlah').val(data.jumlah);
                $('#tanggal').val(data.tanggal);
            })
        });

        //jika klik class delete (yang ada pada tombol delete) maka tampilkan modal konfirmasi hapus maka
        $(document).on('click', '.delete', function () {
            dataId = $(this).attr('id');
            $('#konfirmasi-modal').modal('show');
        });

        //jika tombol hapus pada modal konfirmasi di klik maka
        $('#tombol-hapus').click(function () {
            $.ajax({

                url: "zakat/" + dataId, //eksekusi ajax ke url ini
                type: 'delete',
                beforeSend: function () {
                    $('#tombol-hapus').text('Hapus Data'); //set text untuk tombol hapus
                },
                success: function (data) { //jika sukses
                    setTimeout(function () {
                        $('#konfirmasi-modal').modal('hide'); //sembunyikan konfirmasi modal
                        var oTable = $('#table_pegawai').dataTable();
                        oTable.fnDraw(false); //reset datatable
                    });
                    iziToast.warning({ //tampilkan izitoast warning
                        title: 'Data Berhasil Dihapus',
                        message: '{{ Session('
                        delete ')}}',
                        position: 'bottomRight'
                    });
                }
            })
        });

    </script>

    <!-- JAVASCRIPT -->


  
@endsection