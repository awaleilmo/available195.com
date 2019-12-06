@extends('layouts.tampilan')

@section('content')
    <div id="page-content">
        <div class="container">


            <!-- Sparklines charts -->


            <!-- PieGage charts -->

            <div id="page-title">
                <h2>{{__('Dashboard Produk')}}</h2>
                <p>{{__('Tampilan menu Kategori')}}</p>
            </div>
        </div>
        <form id="contact_us" method="post" action="javascript:void(0)" >
            <div class="row">
                <div class="col-12">
                    <button type="button" class="btn btn-primary" onclick="document.getElementById('add').style.display=''">Add</button>
                    <br>
                    <br>
                    <div class="alert alert-success hidden"  id="msg_div">
                        <span id="res_message"></span>
                    </div>
                    <div id="add" style="display: none">
                        <br>

                        @csrf
                        <input id="idkat" type="hidden" name="id" >
                        <input id="nama" type="text" name="nama" class="form-control-static" placeholder="Nama Kategori">
                        <span class="text-danger">{{ $errors->first('nama') }}</span><br><br>
                        <button type="submit" id="btn-submit" class="btn btn-primary">Simpan</button>
                        <button type="submit" id="btn-edit" class="btn btn-primary hidden">Edit</button>
                        <button type="button" class="btn btn-danger" onclick="document.getElementById('add').style.display='none'; document.getElementById('nama').value='';
            $('#btn-submit').removeClass('hidden'); document.getElementById('btn-edit').style.display='none';">Cancel</button>

                        <br>
                    </div>

                    <br>
                    <div class="dashboard-box dashboard-box-chart bg-white content-box">
                        <div class="content-wrapper">
                            <div class="example-box-wrapper">
                                <table id="datatable1" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>{{__('ID')}}</th>
                                        <th>{{__('Nama Produk')}}</th>
                                        <th>{{__('Deskripsi')}}</th>
                                        <th>{{__('Ukuran')}}</th>
                                        <th>{{__('Harga')}}</th>
                                        <th>{{__('Action')}}</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>{{__('ID')}}</th>
                                        <th>{{__('Nama Produk')}}</th>
                                        <th>{{__('Deskripsi')}}</th>
                                        <th>{{__('Ukuran')}}</th>
                                        <th>{{__('Harga')}}</th>
                                        <th>{{__('Action')}}</th>
                                    </tr>
                                    </tfoot>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                var SITEURL = '{{URL::to('')}}';
                if ($("#contact_us").length > 0) {
                    $("#contact_us").validate({

                        rules: {
                            nama: {
                                required: true,
                                maxlength: 20
                            },
                        },
                        messages: {

                            nama: {
                                required: "Harus Di Isi, Tidak Boleh Kosong",
                                maxlength: "Maksimal 20 Karakter."
                            },

                        }
                    });
                    $("#btn-submit").click(function (e) {
                        $('#btn-submit').html('Sending..');
                        $.ajax({
                            url: '{{url("katpos")}}' ,
                            type: "POST",
                            data: $('#contact_us').serialize(),
                            success: function( response ) {
                                $('#btn-submit').html('Simpan');
                                $('#res_message').show();
                                var oTable = $('#datatable1').dataTable();
                                oTable.fnDraw(false);
                                $('#res_message').html(response.msg);
                                $('#msg_div').removeClass('hidden');
                                document.getElementById("add").style.display = 'none';
                                document.getElementById("contact_us").reset();
                                setTimeout(function(){
                                    $('#res_message').hide();
                                    $('#msg_div').hide();
                                },3000);
                            }
                        });
                    });

                    $("#btn-edit").click(function (e) {
                        $('#btn-edit').html('Sending..');
                        $.ajax({
                            url: '{{url("kated")}}' ,
                            type: "POST",
                            data: $('#contact_us').serialize(),
                            success: function( response ) {
                                $('#btn-edit').html('Edit');
                                $('#res_message').show();
                                $('#btn-submit').removeClass('hidden');
                                $('#btn-edit').addClass('hidden');
                                var oTable = $('#datatable1').dataTable();
                                oTable.fnDraw(false);
                                $('#res_message').html(response.msg);
                                $('#msg_div').removeClass('hidden');
                                document.getElementById("add").style.display = 'none';
                                document.getElementById("contact_us").reset();
                                setTimeout(function(){
                                    $('#res_message').hide();
                                    $('#msg_div').hide();
                                },3000);
                            }
                        });
                    });

                }

                //////////////
                $('#datatable1').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{url('produkget')}}",
                        type: 'GET',
                    },
                    columns: [
                        {data: 'id', name: 'id',},
                        { data: 'nama', name: 'nama', },
                        { data: 'deskripsi', name: 'deskripsi', },
                        { data: 'ukuran', name: 'ukuran', },
                        { data: 'harga', name: 'harga', },
                        {data: 'action', name: 'action', orderable: false},
                    ],
                    order: [[0, 'asc']]
                });

                /////////////
                $('body').on('click', '.edit-user', function () {
                    var user_id = $(this).attr('id');
                    $.get("{{url('/kategori/edit/')}}"+ '/' +user_id, function (data) {
                        document.getElementById("add").style.display = '';
                        $('#btn-submit').addClass('hidden');
                        $('#btn-edit').removeClass('hidden');
                        $('#nama').val(data.nama);
                        $('#idkat').val(data.id);
                        $('#res_message').show();
                        var oTable = $('#datatable1').dataTable();
                        oTable.fnDraw(false);
                    })
                });
                /////////////
                $('body').on('click','.hapus-user', function () {
                    var user_id=$(this).attr("id");


                    $.ajax({
                        type: "GET",
                        url: "{{url('/kathap')}}",
                        data: 'id='+user_id,
                        success: function(response){
                            $('#res_message').show();
                            var oTable = $('#datatable1').dataTable();
                            oTable.fnDraw(false);
                            $('#res_message').html(response.msg);
                            $('#msg_div').removeClass('hidden');
                            document.getElementById("add").style.display = 'none';
                            document.getElementById("contact_us").reset();
                            setTimeout(function(){
                                $('#res_message').hide();
                                $('#msg_div').hide();
                            },3000);
                        },
                        error: function (data) {
                            console.log("Error:", data);
                        }
                    });
                });
            </script>
        </form>
    </div>
    @endsection
