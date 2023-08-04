@extends('layouts.template')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <ul class="nav nav-tabs  mb-3 mt-3" id="simpletab" role="tablist">
        <li class="nav-item">
            <a class="nav-link @if (Session::get('tab')==0) active @endif" id="client-tab" data-toggle="tab" href="#client" role="tab" aria-controls="client" aria-selected="true">Client</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Session::get('tab')==1) active @endif" id="kantor-tab" data-toggle="tab" href="#kantor" role="tab" aria-controls="kantor" aria-selected="true">Kantor</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Session::get('tab')==2) active @endif" id="ruangan-tab" data-toggle="tab" href="#ruangan" role="tab" aria-controls="ruangan" aria-selected="false">Lantai</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Session::get('tab')==3) active @endif" id="lantai-tab" data-toggle="tab" href="#lantai" role="tab" aria-controls="lantai" aria-selected="false">Ruangan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Session::get('tab')==4) active @endif" id="tugas-tab" data-toggle="tab" href="#tugas" role="tab" aria-controls="tugas" aria-selected="false">Objek Perkerjaan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Session::get('tab')==5) active @endif " id="pengguna-tab" data-toggle="tab" href="#pengguna" role="tab" aria-controls="pengguna" aria-selected="false">Pengguna</a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link @if (Session::get('tab')==6) active @endif " id="pembagian-job" data-toggle="tab" href="#pgjb" role="tab" aria-controls="pgjb" aria-selected="false">Pembagian job</a>
        </li> --}}
    </ul>
    <div class="tab-content" id="simpletabContent">
        <div class="tab-pane fade @if (Session::get('tab')==0) show active @endif " id="client" role="tabpanel" aria-labelledby="client-tab">
            @include('backend.master.client')
        </div>
        <div class="tab-pane fade @if (Session::get('tab')==1) show active @endif " id="kantor" role="tabpanel" aria-labelledby="kantor-tab">
            @include('backend.master.kantor')
        </div>
        <div class="tab-pane fade @if (Session::get('tab')==2) show active @endif " id="ruangan" role="tabpanel" aria-labelledby="ruangan-tab">
            @include('backend.master.ruangan')
        </div>
        <div class="tab-pane fade @if (Session::get('tab')==3) show active @endif " id="lantai" role="tabpanel" aria-labelledby="lantai-tab">
            @include('backend.master.lantai')
        </div>
        <div class="tab-pane fade @if (Session::get('tab')==4) show active @endif " id="tugas" role="tabpanel" aria-labelledby="tugas-tab">
            @include('backend.master.tugas')
        </div>
        <div class="tab-pane fade @if (Session::get('tab')==5) show active @endif " id="pengguna" role="tabpanel" aria-labelledby="pengguna-tab">
            @include('backend.pengguna')
        </div>
        <div class="tab-pane fade @if (Session::get('tab')==6) show active @endif " id="pgjb" role="tabpanel" aria-labelledby="pembagian-job">
            @include('backend.master.pembagianjob')
        </div>

    </div>
</div>
@endsection
@section('custom-js')
<script>
    // Kantor
    createDataTable('#masterkantor');

    function editkantor(data) {
        $('#idkantor').val(data.id);
        $('#namakantor').val(data.nama);

        var r = data.client_id

        let html = '';
        html += '<option value="" >Pilih</option>';
        $('#clcs').html(html);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'GET',
            url: '/getclient/' + data.client_id,
            success: function(data) {
                if (data.length > 0) {
                    data.forEach(element => {
                        if (element.id == r) {
                            html += '<option value="' + element.id + '" selected>' + element.perusahaan + '</option>';
                        } else {
                            html += '<option value="' + element.id + '">' + element.perusahaan + '</option>';
                        }
                    });
                    $('#clcs').html(html);
                }
            }
        });
    }

    function resetkantor() {
        $('#idkantor').val(null);
        $('#clcs').val(null);
        $('#namakantor').val(null);
    }

    // Ruangan
    createDataTable('#masterruangan');

    function editruangan(data) {
        $('#idruangan').val(data.id);
        $('#namaruangan').val(data.ruangan);
        $('#kantorruangan').val(data.kantor_id);
    }

    function resetruangan() {
        $('#idruangan').val(null);
        $('#namaruangan').val(null);
        $('#kantorruangan').val(null);
    }

    // Lantai
    createDataTable('#masterlantai');

    function editlantai(data) {
        $('#idlantai').val(data.id);
        $('#namalantai').val(data.lantai);
        $('#kantorlantai').val(data.kantor_id);
        $('#ruanganid').val(data.ruangan_id);
        $('#kantorlantai').change();
    }

    function resetlantai() {
        $('#idlantai').val(null);
        $('#namalantai').val(null);
        $('#kantorlantai').val(null);
        $('#ruanganid').val(null);
        $('#kantorlantai').change();
    }

    function changekantor() {
        let kantor = $('#kantorlantai').val();
        let r = $('#ruanganid').val();
        let html = '';
        html += '<option value="" >Pilih</option>';
        $('#ruanganlantai').html(html);
        $.ajax({
            type: 'GET',
            url: '/ruangan/getbykantor',
            data: '_token = <?php echo csrf_token() ?>&kantor=' + kantor,
            success: function(data) {
                if (data.length > 0) {
                    data.forEach(element => {
                        if (element.id == r) {
                            html += '<option value="' + element.id + '" selected>' + element.ruangan + '</option>';
                        } else {
                            html += '<option value="' + element.id + '">' + element.ruangan + '</option>';
                        }
                    });
                    $('#ruanganlantai').html(html);
                }
            }
        });
    }

    // Tugas
    $('.basic').select2({
        tags: false
    });
    $('.basics').select2({
        tags: false
    });
    $('.basicdsd').select2({
        tags: false
    });
    createDataTable('#mastertugas');

    function edittugas(data) {
        console.log(data)
        $('#idtugas').val(data.id);
        $('#namatugas').val(JSON.parse(data.nama));
        $('#tgs').val(data.nama_tugas);
        $('#tugasbulanan').val(JSON.parse(data.tugas_bulanan));
        $('#tugasmingguan').val(JSON.parse(data.tugas_mingguan));
        $('#kantortugas').val(data.kantor_id);
        $('#ruanganidtugas').val(data.ruangan_id);
        $('#kategoritugas').val(data.kategori);
        $('#penggunatugas').val(data.id_pengguna);
        $('#kantortugas').change();
        $('#namatugas').change();
        // setTimeout(() => {
            
        // }, 1000);
        $('#tugasbulanan').change();
        $('#tugasmingguan').change();
    }

    function resettugas() {
        $('#idtugas').val(null);
        $('#namatugas').val(null);
        $('#kantortugas').val(null);
        $('#ruanganidtugas').val(null);
        $('#tugasbulanan').val(null);
        $('#tugasmingguan').val(null);
    }

    function changekantortugas() {
        let kantor = $('#kantortugas').val();
        let r = $('#ruanganidtugas').val();
        let html = '';
        html += '<option value="" >Pilih</option>';
        $('#lantaitugas').html(html);
        $('#ruangantugas').html(html);
        $.ajax({
            type: 'GET',
            url: '/ruangan/getbykantor',
            data: '_token = <?php echo csrf_token() ?>&kantor=' + kantor,
            success: function(data) {
                if (data.length > 0) {
                    data.forEach(element => {
                        if (element.id == r) {
                            html += '<option value="' + element.id + '" selected>' + element.ruangan + '</option>';
                        } else {
                            html += '<option value="' + element.id + '">' + element.ruangan + '</option>';
                        }
                    });
                    $('#lantaitugas').html(html);
                    changelantaitugas();
                }
            }
        });
    }
    function changelantaitugas() {
        let kantor = $('#lantaitugas').val();
        let r = $('#ruanganidtugas').val();
        // console.log('lantai',r);
        let html = '';
        html += '<option value="" >Pilih</option>';
        $('#ruangantugas').html(html);
        $.ajax({
            type: 'GET',
            url: '/lantai/getbykantor',
            data: '_token = <?php echo csrf_token() ?>&kantor=' + kantor,
            success: function(data) {
                if (data.length > 0) {
                    data.forEach(element => {
                        if (element.id == r) {
                            html += '<option value="' + element.id + '" selected>' + element.lantai + '</option>';
                        } else {
                            html += '<option value="' + element.id + '">' + element.lantai + '</option>';
                        }
                    });
                    $('#ruangantugas').html(html);
                }
            }
        });
    }

    // Pengguna
    createDataTable('#masterpengguna');

    function editpengguna(data) {
        $('#idpengguna').val(data.id);
        $('#namapengguna').val(data.name);
        $('#idpegawaipengguna').val(data.id_pegawai);
        $('#emailpengguna').val(data.email);
        $('#rolepengguna').val(data.role);
        $('#passwordpengguna').val(null);

        var r = data.client_id;

        let html = '';
        html += '<option value="" >Pilih</option>';
        $('#clc').html(html);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'GET',
            url: '/getclient/' + data.client_id,
            success: function(data) {
                if (data.length > 0) {
                    data.forEach(element => {
                        if (element.id == r) {
                            html += '<option value="' + element.id + '" selected>' + element.perusahaan + '</option>';
                        } else {
                            html += '<option value="' + element.id + '">' + element.perusahaan + '</option>';
                        }
                    });
                    $('#clc').html(html);
                }
            }
        });
    }

    function resetpengguna() {
        $('#idpengguna').val(null);
        $('#namapengguna').val(null);
        $('#emailpengguna').val(null);
        $('#rolepengguna').val(null);
        $('#clc').val(null);
        $('#passwordpengguna').val(null);
    }



    // CLIENT
    createDataTable('#masterclient');

    function resetclient() {
        $('#uid').val(null);
        $('#prs').val(null);
        $('#pic').val(null);
        $('#kontak').val(null);
        $('#eml').val(null);
    }

    function editclient(data) {
        console.log(data)
        dat = JSON.parse(data)
        console.log(dat)
        $('#uid').val(dat.id);
        $('#prs').val(dat.perusahaan);
        $('#pic').val(dat.pic);
        $('#kontak').val(dat.kontak);
        $('#eml').val(dat.email);
    }


    // pembagian tugas
    createDataTable('#tablepgn');

    function resetclientpembagian() {
        $('#idpbgn').val(null);
        $('#pgn').val(null);
        $('#tugasharian').val(null);
        $('#tugasmingguan').val(null);
        $('#tugasbulanan').val(null);
    }


    function editpembagianjob(data) {
        $('#idpbgn').val(data.id);
        $('#tugasharian').val(JSON.parse(data.tugas_harian));
        // $('#tgs').val(data.nama_tugas);
        $('#tugasmingguan').val(JSON.parse(data.tugas_mingguan));
        $('#tugasbulanan').val(JSON.parse(data.tugas_bulanan));
        $('#pgn').val(data.user_id);
        $('#pgn').change();
        $('#tugasharian').change();
        $('#tugasmingguan').change();
        $('#tugasbulanan').change();
    }
</script>
@endsection