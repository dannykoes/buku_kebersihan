@extends('layouts.template')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <ul class="nav nav-tabs  mb-3 mt-3" id="simpletab" role="tablist">
        <li class="nav-item">
            <a class="nav-link @if (Session::get('tab')==0) active @endif" id="kantor-tab" data-toggle="tab" href="#kantor" role="tab" aria-controls="kantor" aria-selected="true">Kantor</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Session::get('tab')==1) active @endif" id="gedung-tab" data-toggle="tab" href="#gedung" role="tab" aria-controls="gedung" aria-selected="true">Gedung</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Session::get('tab')==2) active @endif" id="lantai-tab" data-toggle="tab" href="#lantai" role="tab" aria-controls="lantai" aria-selected="false">Lantai</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Session::get('tab')==3) active @endif" id="ruangan-tab" data-toggle="tab" href="#ruangan" role="tab" aria-controls="ruangan" aria-selected="false">Ruangan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Session::get('tab')==7) active @endif" id="lokasi-tab" data-toggle="tab" href="#lokasi" role="tab" aria-controls="lokasi" aria-selected="false">Lokasi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Session::get('tab')==4) active @endif" id="objek-tab" data-toggle="tab" href="#objek" role="tab" aria-controls="objek" aria-selected="false">Objek Perkerjaan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Session::get('tab')==5) active @endif " id="jabatan-tab" data-toggle="tab" href="#jabatan" role="tab" aria-controls="jabatan" aria-selected="false">Jabatan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Session::get('tab')==6) active @endif " id="pembagian-job" data-toggle="tab" href="#pgjb" role="tab" aria-controls="pgjb" aria-selected="false">Job</a>
        </li>
    </ul>
    <div class="tab-content" id="simpletabContent">
        <div class="tab-pane fade @if (Session::get('tab')==0) show active @endif " id="kantor" role="tabpanel" aria-labelledby="kantor-tab">
            @include('backend.masterdata.kantor')
        </div>
        <div class="tab-pane fade @if (Session::get('tab')==1) show active @endif " id="gedung" role="tabpanel" aria-labelledby="gedung-tab">
            @include('backend.masterdata.gedung')
        </div>
        <div class="tab-pane fade @if (Session::get('tab')==2) show active @endif " id="lantai" role="tabpanel" aria-labelledby="lantai-tab">
            @include('backend.masterdata.lantai')
        </div>
        <div class="tab-pane fade @if (Session::get('tab')==3) show active @endif " id="ruangan" role="tabpanel" aria-labelledby="ruangan-tab">
            @include('backend.masterdata.ruangan')
        </div>
        <div class="tab-pane fade @if (Session::get('tab')==7) show active @endif " id="lokasi" role="tabpanel" aria-labelledby="lokasi-tab">
            @include('backend.masterdata.lokasi')
        </div>
        <div class="tab-pane fade @if (Session::get('tab')==4) show active @endif " id="objek" role="tabpanel" aria-labelledby="objek-tab">
            @include('backend.masterdata.objek')
        </div>
        <div class="tab-pane fade @if (Session::get('tab')==5) show active @endif " id="jabatan" role="tabpanel" aria-labelledby="jabatan-tab">
            @include('backend.masterdata.jabatan')
        </div>
        <div class="tab-pane fade @if (Session::get('tab')==6) show active @endif " id="pgjb" role="tabpanel" aria-labelledby="pembagian-job">
            @include('backend.masterdata.job')
        </div>

    </div>
</div>
@endsection
@section('custom-js')
<script>
    createDataTable('#masterkantor');
    function addkantor(data) {
        resetkantor();
        openmodal('#modalkantor');
        if (data) {
            $('#kantorid').val(data.id);
            $('#kantornama').val(data.nama);
            $('#kantorpic').val(data.pic);
        }
    }
    function resetkantor() {
        $('#kantorid').val(null);
        $('#kantornama').val(null);
        $('#kantorpic').val(null);
    }

    createDataTable('#mastergedung');
    $('#gedungkantorid').select2({
        allowClear:true,
        placeholder: 'Pilih',
        dropdownParent: $('#modalgedung')
    });
    function addgedung(data) {
        resetgedung();
        openmodal('#modalgedung');
        if (data) {
            $('#gedungid').val(data.id);
            $('#gedungnama').val(data.gedung);
            $('#gedungkantorid').val(data.kantor_id);
            $('#gedungkantorid').change();
        }
    }
    function resetgedung() {
        $('#gedungid').val(null);
        $('#gedungnama').val(null);
        $('#gedungkantorid').val(null);
    }

    createDataTable('#masterlantai');
    $('#lantaikantorid').select2({
        allowClear:true,
        placeholder: 'Pilih',
        dropdownParent: $('#modallantai')
    });
    $('#lantaigedungid').select2({
        allowClear:true,
        placeholder: 'Pilih',
        dropdownParent: $('#modallantai')
    });
    function addlantai(data) {
        resetlantai();
        openmodal('#modallantai');
        if (data) {
            $('#lantaiid').val(data.id);
            $('#lantainama').val(data.lantai);
            $('#lantaigedung').val(data.gedung_id);
            $('#lantaikantorid').val(data.kantor_id);
            $('#lantaikantorid').change();
        }
    }
    function resetlantai() {
        $('#lantaiid').val(null);
        $('#lantainama').val(null);
        $('#lantaikantorid').val(null);
        $('#lantaigedung').val(null);
    }
    function changekantor(gedungid,kantorid,x) {
        let kantor = $(kantorid).val();
        let r = $(x).val();
        let html = '';
        html += '<option value="" >Pilih</option>';
        $(gedungid).html(html);
        $.ajax({
            type: 'GET',
            url: '/agedung/getbykantor',
            data: '_token = <?php echo csrf_token() ?>&kantor=' + kantor,
            success: function(data) {
                if (data.length > 0) {
                    data.forEach(element => {
                        if (element.id == r) {
                            html += '<option value="' + element.id + '" selected>' + element.gedung + '</option>';
                        } else {
                            html += '<option value="' + element.id + '">' + element.gedung + '</option>';
                        }
                    });
                    $(gedungid).html(html);
                }
            }
        });
    }
    function changegedung(lantaiid,gedungid,kantorid,x) {
        let kantor = $(kantorid).val();
        let gedung = $(gedungid).val();
        let r = $(x).val();
        let html = '';
        html += '<option value="" >Pilih</option>';
        $(lantaiid).html(html);
        $.ajax({
            type: 'GET',
            url: '/alantai/getbygedung',
            data: '_token = <?php echo csrf_token() ?>&kantor=' + kantor+'&gedung='+gedung,
            success: function(data) {
                if (data.length > 0) {
                    data.forEach(element => {
                        if (element.id == r) {
                            html += '<option value="' + element.id + '" selected>' + element.lantai + '</option>';
                        } else {
                            html += '<option value="' + element.id + '">' + element.lantai + '</option>';
                        }
                    });
                    $(lantaiid).html(html);
                }
            }
        });
    }
    function changelantai(ruanganid,lantaiid,gedungid,kantorid,x) {
        let kantor = $(kantorid).val();
        let gedung = $(gedungid).val();
        let lantai = $(lantaiid).val();
        let r = $(x).val();
        let html = '';
        html += '<option value="" >Pilih</option>';
        $(ruanganid).html(html);
        $.ajax({
            type: 'GET',
            url: '/aruangan/getbykantor',
            data: '_token = <?php echo csrf_token() ?>&kantor=' + kantor+'&gedung='+gedung+'&lantai='+lantai,
            success: function(data) {
                if (data.length > 0) {
                    data.forEach(element => {
                        if (element.id == r) {
                            html += '<option value="' + element.id + '" selected>' + element.ruangan + '</option>';
                        } else {
                            html += '<option value="' + element.id + '">' + element.ruangan + '</option>';
                        }
                    });
                    $(ruanganid).html(html);
                }
            }
        });
    }

    createDataTable('#masterruangan');
    $('#ruangankantorid').select2({
        allowClear:true,
        placeholder: 'Pilih',
        dropdownParent: $('#modalruangan')
    });
    $('#ruangangedungid').select2({
        allowClear:true,
        placeholder: 'Pilih',
        dropdownParent: $('#modalruangan')
    });
    $('#ruanganlantaiid').select2({
        allowClear:true,
        placeholder: 'Pilih',
        dropdownParent: $('#modalruangan')
    });
    function addruangan(data) {
        resetruangan();
        openmodal('#modalruangan');
        if (data) {
            $('#ruangankantor').val(data.kantor_id);
            $('#ruangangedung').val(data.gedung_id);
            $('#ruanganlantai').val(data.lantai_id);
            $('#ruanganid').val(data.id);
            $('#ruangannama').val(data.ruangan);
            $('#ruangangedung').val(data.gedung_id);
            $('#ruangankantorid').val(data.kantor_id);
            $('#ruangankantorid').change();
            setTimeout(() => {
                $('#ruangangedungid').change();
            }, 1000);
        }
    }
    function resetruangan() {
        $('#ruangankantor').val(null);
        $('#ruangangedung').val(null);
        $('#ruanganlantai').val(null);
        $('#ruanganid').val(null);
        $('#ruangannama').val(null);
        $('#ruangangedung').val(null);
        $('#ruangankantorid').val(null);
    }
    
    $('#lokasikantorid').select2({
        allowClear:true,
        placeholder: 'Pilih',
        // dropdownParent: $('#modalruangan')
    });
    $('#lokasigedungid').select2({
        allowClear:true,
        placeholder: 'Pilih',
        // dropdownParent: $('#modalruangan')
    });

    let datalokasi = @json($lokasi);
    var map = L.map('map').setView([ -7.000433527639624, 110.33436565215736], 13);
    let marker = null;
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
    datalokasi.forEach(element => {
        marker = L.marker([element.lat, element.long]).addTo(map)
            .bindPopup(element.nama)
            .openPopup().on("click", function (event) {
                $('#lokasiid').val(element.id);
                $('#lokasigedung').val(element.gedung_id);
                $('#lokasikantorid').val(element.kantor_id);
                $('#lokasikantorid').change();
                setTimeout(() => {
                    $('#lokasilat').val(element.lat);
                    $('#lokasilong').val(element.long);
                    $('#lokasinama').val(element.nama);
                    $('#btndeletelokasi').attr('onclick','deletedata("alokasi/'+element.id+'")');
                }, 1000);
            });
    });
    map.on('click', function(e) {        
        var popLocation = e.latlng;
        if (popLocation) {
            $('#lokasiid').val(null);
            // $('#lokasikantorid').val(null);
            // $('#lokasigedungid').val(null);
            // $('#lokasinama').val(null);
            $('#lokasilat').val(e.latlng.lat);
            $('#lokasilong').val(e.latlng.lng);
            $('#btndeletelokasi').attr('onclick','deletedata()');
        }
        var popup = L.popup()
            .setLatLng(popLocation)
            .setContent('Pilih Lokasi')
            .openOn(map);        
    });

    createDataTable('#masterobjek');
    $('#objekkantorid').select2({
        allowClear:true,
        placeholder: 'Pilih',
        dropdownParent: $('#modalobjek')
    });
    $('#objekgedungid').select2({
        allowClear:true,
        placeholder: 'Pilih',
        dropdownParent: $('#modalobjek')
    });
    $('#objeklantaiid').select2({
        allowClear:true,
        placeholder: 'Pilih',
        dropdownParent: $('#modalobjek')
    });
    $('#objekruanganid').select2({
        allowClear:true,
        placeholder: 'Pilih',
        dropdownParent: $('#modalobjek')
    });
    function addobjek(data) {
        resetobjek();
        openmodal('#modalobjek');
        if (data) {
            $('#objekkantor').val(data.kantor_id);
            $('#objekgedung').val(data.gedung_id);
            $('#objeklantai').val(data.lantai_id);
            $('#objekruangan').val(data.ruangan_id);
            $('#objekkantorid').val(data.kantor_id);
            $('#objekgedungid').val(data.gedung_id);
            $('#objeklantaiid').val(data.lantai_id);
            $('#objekruanganid').val(data.ruangan_id);
            $('#objekid').val(data.id);
            $('#objeknama').val(data.object);
            $('#objekkantorid').change();
            setTimeout(() => {
                $('#objekgedungid').change();
            }, 1000);
            setTimeout(() => {
                $('#objeklantaiid').change();
            }, 2000);
            if (data.kategori == 1) {
                $('#harian').attr('checked','true');
            }
            if (data.kategori == 2) {
                $('#mingguan').attr('checked','true');
            }
            if (data.kategori == 3) {
                $('#bulanan').attr('checked','true');
            }
        }
    }
    function resetobjek() {
        $('#harian').removeAttr('checked');
        $('#mingguan').removeAttr('checked');
        $('#bulanan').removeAttr('checked');
        $('#objekkantor').val(null);
        $('#objekgedung').val(null);
        $('#objeklantai').val(null);
        $('#objekid').val(null);
        $('#objeknama').val(null);
        $('#objekgedung').val(null);
        $('#objekkantorid').val(null);
    }

    createDataTable('#masterjabatan');
    function addrole(data) {
        resetrole();
        openmodal('#modalrole');
        if (data) {
            $('#roleid').val(data.id);
            $('#rolenama').val(data.nama);
            $('#roleurutan').val(data.urutan);
        }
    }
    function resetrole() {
        $('#rolenama').val(null);
        $('#roleurutan').val(null);
    }

    createDataTable('#masterpegawai');
    $('#pegawaitype').select2({
        allowClear:true,
        placeholder: 'Pilih',
        dropdownParent: $('#modalpegawai')
    });
    $('#pegawaipic').select2({
        allowClear:true,
        placeholder: 'Pilih',
        dropdownParent: $('#modalpegawai')
    });
    $('#pegawaispv').select2({
        allowClear:true,
        placeholder: 'Pilih',
        dropdownParent: $('#modalpegawai')
    });
    function addpegawai(data) {
        resetpegawai();
        openmodal('#modalpegawai');
        if (data) {
            console.log(data);
            $('#pegawaitype').val(data.jabatan);
            $('#pegawaispv').val(data.spv);
            $('#pegawaipic').val(data.pic);
            $('#pegawaiuserid').val(data.user_id);
            $('#pegawaiaaa').val(data.user_id);
            $('#pegawaiid').val(data.id);
            $('#pegawainama').val(data.nama);
            $('#pegawainip').val(data.nip);
            $('#pegawaitglbergabung').val(data.tgl_bergabung);
            $('#pegawaitglselesai').val(data.tgl_selesai);
            $('#pegawaitype').change();
            $('#pegawaispv').change();
            $('#pegawaipic').change();
        }
    }
    function resetpegawai() {
        $('#pegawaijabatan').val(null);
        $('#pegawaispv').val(null);
        $('#pegawaipic').val(null);
        $('#pegawaiuserid').val(null);
        $('#pegawaiaaa').val(null);
        $('#pegawaipassword').val(null);
        $('#pegawaiid').val(null);
        $('#pegawainama').val(null);
        $('#pegawaigedung').val(null);
        $('#pegawaikantorid').val(null);
    }

    createDataTable('#masterjob');
    $('#jobuser').select2({
        allowClear:true,
        placeholder: 'Pilih',
        dropdownParent: $('#modaljob')
    });
    $('#jobobjek').select2({
        allowClear:true,
        placeholder: 'Pilih',
        dropdownParent: $('#modaljob'),
    });
    function addjob(data) {
        resetjob();
        openmodal('#modaljob');
        if (data) {
            console.log(data);
            $('#jobid').val(data.id);
            $('#jobuser').val(data.user_id);
            $('#jobuser').change();
            $('#jobobjek').val(JSON.parse(data.job_id));
            $('#jobobjek').change();
        }
    }
    function resetjob() {
        // 
    }
    </script>

@endsection