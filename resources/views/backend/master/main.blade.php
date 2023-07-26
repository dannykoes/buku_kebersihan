@extends('layouts.template')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <ul class="nav nav-tabs  mb-3 mt-3" id="simpletab" role="tablist">
        <li class="nav-item">
            <a class="nav-link @if (Session::get('tab')==1) active @endif" id="kantor-tab" data-toggle="tab"
                href="#kantor" role="tab" aria-controls="kantor" aria-selected="true">Kantor</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Session::get('tab')==2) active @endif" id="ruangan-tab" data-toggle="tab"
                href="#ruangan" role="tab" aria-controls="ruangan" aria-selected="false">Ruangan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Session::get('tab')==3) active @endif" id="lantai-tab" data-toggle="tab"
                href="#lantai" role="tab" aria-controls="lantai" aria-selected="false">Lantai</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Session::get('tab')==4) active @endif" id="tugas-tab" data-toggle="tab"
                href="#tugas" role="tab" aria-controls="tugas" aria-selected="false">Tugas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Session::get('tab')==5) active @endif " id="pengguna-tab" data-toggle="tab"
                href="#pengguna" role="tab" aria-controls="pengguna" aria-selected="false">Pengguna</a>
        </li>
    </ul>
    <div class="tab-content" id="simpletabContent">
        <div class="tab-pane fade @if (Session::get('tab')==1) show active @endif " id="kantor" role="tabpanel"
            aria-labelledby="kantor-tab">
            @include('backend.master.kantor')
        </div>
        <div class="tab-pane fade @if (Session::get('tab')==2) show active @endif " id="ruangan" role="tabpanel"
            aria-labelledby="ruangan-tab">
            @include('backend.master.ruangan')
        </div>
        <div class="tab-pane fade @if (Session::get('tab')==3) show active @endif " id="lantai" role="tabpanel"
            aria-labelledby="lantai-tab">
            @include('backend.master.lantai')
        </div>
        <div class="tab-pane fade @if (Session::get('tab')==4) show active @endif " id="tugas" role="tabpanel"
            aria-labelledby="tugas-tab">
            @include('backend.master.tugas')
        </div>
        <div class="tab-pane fade @if (Session::get('tab')==5) show active @endif " id="pengguna" role="tabpanel"
            aria-labelledby="pengguna-tab">
            @include('backend.pengguna')
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
    }
    function resetkantor() {
        $('#idkantor').val(null);
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
        html +='<option value="" >Pilih</option>';
        $('#ruanganlantai').html(html);
        $.ajax({
               type:'GET',
               url:'/ruangan/getbykantor',
               data:'_token = <?php echo csrf_token() ?>&kantor='+kantor,
               success:function(data) {
                if (data.length > 0) {
                    data.forEach(element => {
                        if (element.id == r) {
                            html +='<option value="'+element.id+'" selected>'+element.ruangan+'</option>';
                        }else{
                            html +='<option value="'+element.id+'">'+element.ruangan+'</option>';
                        }
                    });
                    $('#ruanganlantai').html(html);
                }
            }
        });
    }

    // Tugas
    $('.basic').select2({ tags: true });
    createDataTable('#mastertugas');
    function edittugas(data) {
        $('#idtugas').val(data.id);
        $('#namatugas').val(JSON.parse(data.nama));
        $('#kantortugas').val(data.kantor_id);
        $('#ruanganidtugas').val(data.ruangan_id);
        $('#kantortugas').change();
        $('#namatugas').change();
    }
    function resettugas() {
        $('#idtugas').val(null);
        $('#namatugas').val(null);
        $('#kantortugas').val(null);
        $('#ruanganidtugas').val(null);
    }
    function changekantortugas() {
        let kantor = $('#kantortugas').val();
        let r = $('#ruanganidtugas').val();
        let html = '';
        html +='<option value="" >Pilih</option>';
        $('#ruangantugas').html(html);
        $.ajax({
               type:'GET',
               url:'/ruangan/getbykantor',
               data:'_token = <?php echo csrf_token() ?>&kantor='+kantor,
               success:function(data) {
                if (data.length > 0) {
                    data.forEach(element => {
                        if (element.id == r) {
                            html +='<option value="'+element.id+'" selected>'+element.ruangan+'</option>';
                        }else{
                            html +='<option value="'+element.id+'">'+element.ruangan+'</option>';
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
        $('#emailpengguna').val(data.email);
        $('#rolepengguna').val(data.role);
        $('#passwordpengguna').val(null);
    }
    function resetpengguna() {
        $('#idpengguna').val(null);
        $('#namapengguna').val(null);
        $('#emailpengguna').val(null);
        $('#rolepengguna').val(null);
        $('#passwordpengguna').val(null);
    }
</script>
@endsection