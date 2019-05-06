@extends('lte.lte')
@section('title')
Tambah Pegawai
@endsection
@section('header')
Tambah Pegawai
@endsection
@section('content')
<form action="{{route('pegawai.store')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="hidden" name="code" id="code" value="{{str_random(25)}}">
    <div class="col-lg-10">
        <div class="row">
            <div class="form-group">
                <label>Jenis :</label>
                <div class="col-lg-12">
                    <input type="radio" name="jenis" value="PNS" checked> PNS
                    &nbsp;<input type="radio" name="jenis" value="PPNPN"> PPNPN
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label>No. Medical Record :</label>
                <div class="row">
                    <div class="col-lg-4">
                        <input type="hidden" name="inc"  value="{{$medical}}">
                        <input type="text" class="form-control" name="medical_record" value="MR-{{$medical}}" readonly="">
                    </div>
                </div>        
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label>NIP :</label>
                <div class="row">
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="pasien_id" required value="{{old('pasien_id')}}" id="nip" onkeyup="nipD(this.value)">
                    </div>
                </div>        
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label>Nama Pasien :</label>
                <div class="row">
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="pasien_nama" required value="{{old('pasien_nama')}}">
                    </div>
                </div>        
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label>Unit Bagian :</label>
                <div class="row">
                    <div class="col-lg-4">
                        <select name="unit" id="" class="form-control" required value="{{old('alamat')}}">
                                <option value=""></option>
                            @foreach($bagian as $key)
                                @if (Input::old('alamat') == $key->nama_bagian)
                                    <option value="{{$key->inc}}" selected>{{$key->nama_bagian}}</option>
                                @else
                                    <option value="{{$key->inc}}">{{$key->nama_bagian}}</option>
                                @endif                        
                            @endforeach
                        </select>
                    </div>
                </div>        
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label>Tanggal Lahir :</label>
                <div class="row">
                    <div class="col-lg-4">
                        <input type="text" name="tanggal_lahir" id="lahir" class="picker form-control" required value="{{old('tanggal_lahir')}}" >
                    </div>
                </div>        
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label>Jenis Kelamin :</label>
                <div class="row">
                    <div class="col-lg-4">
                        <select name="jenis_kelamin" id="" class="form-control" required>
                                <option value="Laki-Laki" {{ (Input::old("jenis_kelamin") == 'Laki-Laki' ? "selected":"") }}>Laki-Laki</option>
                                <option value="Perempuan" {{ (Input::old("jenis_kelamin") == 'Perempuan' ? "selected":"") }}>Perempuan</option>
                        </select>
                    </div>
                </div>        
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label>Umur Pasien :</label>
                <div class="row">
                    <div class="col-lg-8">
                        <input type="text" name="umur" class="form-control" id="umur" required readonly="" onkeypress='return isNumberKey(event)' value="{{old('umur')}}">
                    </div>
                </div>        
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label>Tanggal Daftar :</label>
                <div class="row">
                    <div class="col-lg-4">
                        <input type="text" name="tanggal_daftar" class="form-control" required value="{{date('Y-m-d')}}" readonly="">
                    </div>
                </div>        
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label>Telephone :</label>
                <div class="row">
                    <div class="col-lg-8">
                        <input type="number" name="telp" class="form-control" required value="{{old('telp')}}">
                    </div>
                </div>        
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="exampleInputFile">Upload Photo</label>
                <input type="file" name="photo_profile">
                <p class="help-block">Upload foto ukuran 3 x 4 dengan maksimum ukuran 5 MB.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-8 col-lg-4">
                <div class="col-xs-6">
                    <button class="btn btn-primary btn-block" type="submit">Simpan</button>
                </div>
                <div class="col-xs-6">
                    <button class="btn btn-warning btn-block" onclick="window.history.back()">Batal</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="qr" id="qr"></div>
    </div>
</form>
@endsection
@section('css')
    <style>
    </style>
@endsection
@section('script')
    <script type="text/javascript" src="{{url('Public/js/qr/qrcode.min.js')}}"></script>
    <script type="text/javascript">
        var qrcode = new QRCode(document.getElementById("qr"), {
            text: document.getElementById('code').value,
            width: 128,
            height: 128,
            colorDark : "#000000",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
        });
        $('.picker').datepicker({
            format: 'yyyy-mm-dd',
        });
        $('#lahir').change(function(){
            var dob = new Date(this.value);
            var today = new Date();
            var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
            $("#umur").val(age);
        });
        function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
        function nipD(value){
            if(value.length >= 8){
                var nip = value;
                var tahun = String(nip).substring(0,4);
                var bulan = String(nip).substring(4,6);
                var hari = String(nip).substring(6,8);
                var date = String(tahun)+'-'+String(bulan)+'-'+String(hari);
                var umur = $("#umur");
                var lahir = $("#lahir");
                lahir.val(date);
                var dob = new Date(date);
                var today = new Date();
                var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                $("#umur").val(age);
            }
        }
    </script>
@endsection
