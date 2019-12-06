@extends('layouts.tampilan')



@section('content')
    <div id="page-content">
        <div class="container">


            <!-- Sparklines charts -->


            <!-- PieGage charts -->

            <div id="page-title">
                <h2>{{__('Data User')}}</h2>
                <p>{{__("Tampilan menu data user.")}}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="dashboard-box dashboard-box-chart bg-white content-box">
                    <div class="content-wrapper">

                        <div class="example-box-wrapper">
                            <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>{{__('Username')}}</th>
                                    <th>{{__('Email')}}</th>
                                    <th>{{__('Nomor HP')}}</th>
                                    <th>{{__('Password')}}</th>
                                    <th>{{__('Biodata')}}</th>
                                    <th>{{__('Alamat')}}</th>
                                    <th>{{__('Bank')}}</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tfoot>
                                <tr>
                                    <th>{{__('Username')}}</th>
                                    <th>{{__('Email')}}</th>
                                    <th>{{__('Nomor HP')}}</th>
                                    <th>{{__('Password')}}</th>
                                    <th>{{__('Biodata')}}</th>
                                    <th>{{__('Alamat')}}</th>
                                    <th>{{__('Bank')}}</th>
                                    <th></th>
                                </tr>
                                </tfoot>

                                <tbody>
                                @foreach($us as $uss)
                                    <form action="#" method="post">
                                    <div class="modal fade" id="myModal{{$uss->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title"><strong>{{__('BIODATA')}}</strong></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="example-box-wrapper">
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <strong>{{__("Nama Depan")}}</strong>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <snap id="bik1{{$uss->id}}">{{$uss->biodata->first_name}}</snap>
                                                                <input id="biks1{{$uss->id}}" type="text" name="first_name" class="form-control" value="{{$uss->biodata->first_name}}" style="display: none">
                                                            </div>
                                                        </div>

                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <strong>{{__("Nama Belakang")}}</strong>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <snap id="bik2{{$uss->id}}">{{$uss->biodata->last_name}}</snap>
                                                                <input id="biks2{{$uss->id}}" type="text" name="last_name" class="form-control" value="{{$uss->biodata->last_name}}" style="display: none">
                                                            </div>
                                                        </div>

                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <strong>{{__("Jenis Kelamin")}}</strong>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <snap id="bik3{{$uss->id}}">{{$uss->biodata->jenis_kelamin}}</snap>
                                                                <select id="biks3{{$uss->id}}"  name=jenis_kelamin"" class="form-control"  style="display: none">
                                                                    <option value="l" @if($uss->biodata->jenis_kelamin == 'l') selected @endif >{{__('Laki - Laki')}}</option>
                                                                    <option value="p" @if($uss->biodata->jenis_kelamin == 'p') selected @endif >{{__('Perempuan')}}</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <strong>{{__("Tanggal Lahir")}}</strong>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <snap id="bik4{{$uss->id}}">{{$uss->biodata->tanggal_lahir}}</snap>
                                                                <input id="biks4{{$uss->id}}" type="date" name="tanggal_lahir" class="form-control" value="{{$uss->biodata->tanggal_lahir}}" style="display: none">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <script>
                                                    function sq{{$uss->id}}(){
                                                        document.getElementById('bik1{{$uss->id}}').style.display = 'none';
                                                        document.getElementById('bik2{{$uss->id}}').style.display = 'none';
                                                        document.getElementById('bik3{{$uss->id}}').style.display = 'none';
                                                        document.getElementById('bik4{{$uss->id}}').style.display = 'none';
                                                        document.getElementById('biks1{{$uss->id}}').style.display= '';
                                                        document.getElementById('biks2{{$uss->id}}').style.display= '';
                                                        document.getElementById('biks3{{$uss->id}}').style.display= '';
                                                        document.getElementById('biks4{{$uss->id}}').style.display= '';
                                                        document.getElementById('edt{{$uss->id}}').style.display = 'none';
                                                        document.getElementById('sve{{$uss->id}}').style.display = '';
                                                        document.getElementById('btl{{$uss->id}}').style.display = '';

                                                    }
                                                    function sa{{$uss->id}}(){
                                                        document.getElementById('bik1{{$uss->id}}').style.display = '';
                                                        document.getElementById('bik2{{$uss->id}}').style.display = '';
                                                        document.getElementById('bik3{{$uss->id}}').style.display = '';
                                                        document.getElementById('bik4{{$uss->id}}').style.display = '';
                                                        document.getElementById('biks1{{$uss->id}}').style.display= 'none';
                                                        document.getElementById('biks2{{$uss->id}}').style.display= 'none';
                                                        document.getElementById('biks3{{$uss->id}}').style.display= 'none';
                                                        document.getElementById('biks4{{$uss->id}}').style.display= 'none';
                                                        document.getElementById('edt{{$uss->id}}').style.display = '';
                                                        document.getElementById('sve{{$uss->id}}').style.display = 'none';
                                                        document.getElementById('btl{{$uss->id}}').style.display = 'none';
                                                    }
                                                </script>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="button" id="edt{{$uss->id}}" class="btn btn-outline-warning btn-warning" onclick="sq{{$uss->id}}();">Edit</button>
                                                    <button type="submit" id="sve{{$uss->id}}" name="savebio" class="btn btn-primary" style="display: none">Save changes</button>
                                                    <button type="button" id="btl{{$uss->id}}" class="btn btn-danger" style="display: none" onclick="sa{{$uss->id}}()">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>

                                    <form action="#" method="post">
                                        <div class="modal fade" id="myModal2{{$uss->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title"><strong>{{__('ALAMAT')}}</strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="example-box-wrapper">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <strong>{{__("Nama Tempat")}}</strong>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <snap id="bi1{{$uss->id}}">{{$uss->alamat->tempat}}</snap>
                                                                    <input id="bis1{{$uss->id}}" type="text" name="tempat" class="form-control" value="{{$uss->alamat->tempat}}" style="display: none">
                                                                </div>
                                                            </div>

                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <strong>{{__("Penerima")}}</strong>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <snap id="bi2{{$uss->id}}">{{$uss->alamat->penerima}}</snap>
                                                                    <input id="bis2{{$uss->id}}" type="text" name="penerima" class="form-control" value="{{$uss->alamat->penerima}}" style="display: none">
                                                                </div>
                                                            </div>

                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <strong>{{__("Nomor HP")}}</strong>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <snap id="bi3{{$uss->id}}">{{$uss->alamat->nomor_hp}}</snap>
                                                                    <input id="bis3{{$uss->id}}" type="text" name="nomor_hp" class="form-control" value="{{$uss->alamat->nomor_hp}}" style="display: none">
                                                                </div>
                                                            </div>

                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <strong>{{__("Alamat")}}</strong>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <snap id="bi4{{$uss->id}}">{{$uss->alamat->address}}</snap>
                                                                    <input id="bis4{{$uss->id}}" type="text name="address" class="form-control" value="{{$uss->alamat->address}}" style="display: none">
                                                                </div>
                                                            </div>

                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <strong>{{__("Provinsi")}}</strong>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <snap id="bi5{{$uss->id}}">{{$uss->alamat->provinsi}}</snap>
                                                                    <input id="bis5{{$uss->id}}" type="text" name="provinsi" class="form-control" value="{{$uss->alamat->provinsi}}" style="display: none">
                                                                </div>
                                                            </div>

                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <strong>{{__("Kota")}}</strong>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <snap id="bi6{{$uss->id}}">{{$uss->alamat->kota}}</snap>
                                                                    <input id="bis6{{$uss->id}}" type="text" name="kota" class="form-control" value="{{$uss->alamat->kota}}" style="display: none">
                                                                </div>
                                                            </div>

                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <strong>{{__("Kecamatan")}}</strong>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <snap id="bi7{{$uss->id}}">{{$uss->alamat->kecamatan}}</snap>
                                                                    <input id="bis7{{$uss->id}}" type="text" name="kecamatan" class="form-control" value="{{$uss->alamat->kecamatan}}" style="display: none">
                                                                </div>
                                                            </div>

                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <strong>{{__("Kode Pos")}}</strong>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <snap id="bi8{{$uss->id}}">{{$uss->alamat->kode_pos}}</snap>
                                                                    <input id="bis8{{$uss->id}}" type="text" name="kode_pos" class="form-control" value="{{$uss->alamat->kode_pos}}" style="display: none">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script>
                                                        function sq1{{$uss->id}}(){
                                                            document.getElementById('bi1{{$uss->id}}').style.display = 'none';
                                                            document.getElementById('bi2{{$uss->id}}').style.display = 'none';
                                                            document.getElementById('bi3{{$uss->id}}').style.display = 'none';
                                                            document.getElementById('bi4{{$uss->id}}').style.display = 'none';
                                                            document.getElementById('bi5{{$uss->id}}').style.display = 'none';
                                                            document.getElementById('bi6{{$uss->id}}').style.display = 'none';
                                                            document.getElementById('bi7{{$uss->id}}').style.display = 'none';
                                                            document.getElementById('bi8{{$uss->id}}').style.display = 'none';
                                                            document.getElementById('bis1{{$uss->id}}').style.display= '';
                                                            document.getElementById('bis2{{$uss->id}}').style.display= '';
                                                            document.getElementById('bis3{{$uss->id}}').style.display= '';
                                                            document.getElementById('bis4{{$uss->id}}').style.display= '';
                                                            document.getElementById('bis5{{$uss->id}}').style.display= '';
                                                            document.getElementById('bis6{{$uss->id}}').style.display= '';
                                                            document.getElementById('bis7{{$uss->id}}').style.display= '';
                                                            document.getElementById('bis8{{$uss->id}}').style.display= '';
                                                            document.getElementById('edt1{{$uss->id}}').style.display = 'none';
                                                            document.getElementById('sve1{{$uss->id}}').style.display = '';
                                                            document.getElementById('btl1{{$uss->id}}').style.display = '';

                                                        }
                                                        function sa1{{$uss->id}}(){
                                                            document.getElementById('bi1{{$uss->id}}').style.display = '';
                                                            document.getElementById('bi2{{$uss->id}}').style.display = '';
                                                            document.getElementById('bi3{{$uss->id}}').style.display = '';
                                                            document.getElementById('bi4{{$uss->id}}').style.display = '';
                                                            document.getElementById('bi5{{$uss->id}}').style.display = '';
                                                            document.getElementById('bi6{{$uss->id}}').style.display = '';
                                                            document.getElementById('bi7{{$uss->id}}').style.display = '';
                                                            document.getElementById('bi8{{$uss->id}}').style.display = '';
                                                            document.getElementById('bis1{{$uss->id}}').style.display= 'none';
                                                            document.getElementById('bis2{{$uss->id}}').style.display= 'none';
                                                            document.getElementById('bis3{{$uss->id}}').style.display= 'none';
                                                            document.getElementById('bis4{{$uss->id}}').style.display= 'none';
                                                            document.getElementById('bis5{{$uss->id}}').style.display= 'none';
                                                            document.getElementById('bis6{{$uss->id}}').style.display= 'none';
                                                            document.getElementById('bis7{{$uss->id}}').style.display= 'none';
                                                            document.getElementById('bis8{{$uss->id}}').style.display= 'none';
                                                            document.getElementById('edt1{{$uss->id}}').style.display = '';
                                                            document.getElementById('sve1{{$uss->id}}').style.display = 'none';
                                                            document.getElementById('btl1{{$uss->id}}').style.display = 'none';
                                                        }
                                                    </script>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="button" id="edt1{{$uss->id}}" class="btn btn-outline-warning btn-warning" onclick="sq1{{$uss->id}}();">Edit</button>
                                                        <button type="submit" id="sve1{{$uss->id}}" name="savebio" class="btn btn-primary" style="display: none">Save changes</button>
                                                        <button type="button" id="btl1{{$uss->id}}" class="btn btn-danger" style="display: none" onclick="sa1{{$uss->id}}()">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <form action="#" method="post">
                                        <div class="modal fade" id="myModal3{{$uss->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h4 class="modal-title"><strong>{{__('BIODATA')}}</strong></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="example-box-wrapper">
                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <strong>{{__("Nama Pemilik Akun")}}</strong>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <snap id="bika1{{$uss->id}}">{{$uss->akunbank->nama_akun}}</snap>
                                                                    <input id="bikas1{{$uss->id}}" type="text" name="nama_akun" class="form-control" value="{{$uss->akunbank->nama_akun}}" style="display: none">
                                                                </div>
                                                            </div>

                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <strong>{{__("Nama Bank")}}</strong>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <snap id="bika2{{$uss->id}}">{{$uss->akunbank->nama_bank}}</snap>
                                                                    <input id="bikas2{{$uss->id}}" type="text" name="nama_bank" class="form-control" value="{{$uss->akunbank->nama_bank}}" style="display: none">
                                                                </div>
                                                            </div>

                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <strong>{{__("Nomor Rekening")}}</strong>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <snap id="bika3{{$uss->id}}">{{$uss->akunbank->nomor_akun}}</snap>
                                                                    <input id="bikas3{{$uss->id}}" type="text" name="nomor_akun" class="form-control" value="{{$uss->akunbank->nomor_akun}}" style="display: none">
                                                                </div>
                                                            </div>

                                                            <div class="row form-group">
                                                                <div class="col-md-4">
                                                                    <strong>{{__("cabang")}}</strong>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <snap id="bika4{{$uss->id}}">{{$uss->akunbank->cabang}}</snap>
                                                                    <input id="bikas4{{$uss->id}}" type="date" name="cabang" class="form-control" value="{{$uss->akunbank->cabang}}" style="display: none">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script>
                                                        function sq2{{$uss->id}}(){
                                                            document.getElementById('bika1{{$uss->id}}').style.display = 'none';
                                                            document.getElementById('bika2{{$uss->id}}').style.display = 'none';
                                                            document.getElementById('bika3{{$uss->id}}').style.display = 'none';
                                                            document.getElementById('bika4{{$uss->id}}').style.display = 'none';
                                                            document.getElementById('bikas1{{$uss->id}}').style.display= '';
                                                            document.getElementById('bikas2{{$uss->id}}').style.display= '';
                                                            document.getElementById('bikas3{{$uss->id}}').style.display= '';
                                                            document.getElementById('bikas4{{$uss->id}}').style.display= '';
                                                            document.getElementById('edt2{{$uss->id}}').style.display = 'none';
                                                            document.getElementById('sve2{{$uss->id}}').style.display = '';
                                                            document.getElementById('btl2{{$uss->id}}').style.display = '';

                                                        }
                                                        function sa2{{$uss->id}}(){
                                                            document.getElementById('bika1{{$uss->id}}').style.display = '';
                                                            document.getElementById('bika2{{$uss->id}}').style.display = '';
                                                            document.getElementById('bika3{{$uss->id}}').style.display = '';
                                                            document.getElementById('bika4{{$uss->id}}').style.display = '';
                                                            document.getElementById('bikas1{{$uss->id}}').style.display= 'none';
                                                            document.getElementById('bikas2{{$uss->id}}').style.display= 'none';
                                                            document.getElementById('bikas3{{$uss->id}}').style.display= 'none';
                                                            document.getElementById('bikas4{{$uss->id}}').style.display= 'none';
                                                            document.getElementById('edt2{{$uss->id}}').style.display = '';
                                                            document.getElementById('sve2{{$uss->id}}').style.display = 'none';
                                                            document.getElementById('btl2{{$uss->id}}').style.display = 'none';
                                                        }
                                                    </script>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="button" id="edt2{{$uss->id}}" class="btn btn-outline-warning btn-warning" onclick="sq2{{$uss->id}}();">Edit</button>
                                                        <button type="submit" id="sve2{{$uss->id}}" name="savebio" class="btn btn-primary" style="display: none">Save changes</button>
                                                        <button type="button" id="btl2{{$uss->id}}" class="btn btn-danger" style="display: none" onclick="sa2{{$uss->id}}()">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                <tr>
                                    <td>{{$uss->name}}</td>
                                    <td>{{$uss->email}}</td>
                                    <td>{{$uss->alamat->nomor_hp}}</td>
                                    <td title="{{$uss->password}}">{{substr($uss->password,0,17)}}...</td>
                                    <td><button class="btn btn-default btn-md" data-toggle="modal" data-target="#myModal{{$uss->id}}">
                                            {{__('Detail')}}
                                        </button></td>
                                    <td><button class="btn btn-default btn-md" data-toggle="modal" data-target="#myModal2{{$uss->id}}">
                                            {{__('Detail')}}
                                        </button></td>
                                    <td><button class="btn btn-default btn-md" data-toggle="modal" data-target="#myModal3{{$uss->id}}">
                                            {{__('Detail')}}
                                        </button></td>
                                    <td>
                                        <a href="#" class="tooltip-button demo-icon" style="font-size: 19px; line-height: 30px; width: 30px; height: 30px; margin: 2px"><i class="glyph-icon icon-pencil"></i></a>

                                        <a href="#" class="tooltip-button demo-icon" style="color:red; font-size: 19px; line-height: 30px; width: 30px; height: 30px; margin: 2px"><i class="glyph-icon icon-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
