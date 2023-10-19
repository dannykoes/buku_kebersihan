@extends('layouts.template')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <ul class="nav nav-tabs  mb-3 mt-3" id="simpletab" role="tablist">
        <li class="nav-item">
            <a class="nav-link @if (Session::get('tab')==0) active @endif" id="kantor-tab" data-toggle="tab"
                href="#kantor" role="tab" aria-controls="kantor" aria-selected="true">Kantor</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Session::get('tab')==1) active @endif" id="gedung-tab" data-toggle="tab"
                href="#gedung" role="tab" aria-controls="gedung" aria-selected="true">Gedung</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Session::get('tab')==2) active @endif" id="lantai-tab" data-toggle="tab"
                href="#lantai" role="tab" aria-controls="lantai" aria-selected="false">Lantai</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Session::get('tab')==3) active @endif" id="ruangan-tab" data-toggle="tab"
                href="#ruangan" role="tab" aria-controls="ruangan" aria-selected="false">Ruangan</a>
        </li>
        <li class="nav-item">
            {{-- <a class="nav-link @if (Session::get('tab')==7) active @endif" id="lokasi-tab" data-toggle="tab"
                href="#lokasi" role="tab" aria-controls="lokasi" aria-selected="false"
                onclick="triggerresize()">Lokasi</a> --}}
            <a class="nav-link @if (Session::get('tab')==9) active @endif" id="toilet-tab" data-toggle="tab"
                href="#toilet" role="tab" aria-controls="toilet" aria-selected="false">Toilet</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Session::get('tab')==10) active @endif" id="outdoor-tab" data-toggle="tab"
                href="#outdoor" role="tab" aria-controls="outdoor" aria-selected="false">Outdoor</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Session::get('tab')==8) active @endif" id="pekerjaan-tab" data-toggle="tab"
                href="#pekerjaan" role="tab" aria-controls="pekerjaan" aria-selected="false">Pekerjaan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Session::get('tab')==4) active @endif" id="objek-tab" data-toggle="tab"
                href="#objek" role="tab" aria-controls="objek" aria-selected="false" onclick="triggerresize()">Objek
                Pekerjaan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Session::get('tab')==5) active @endif " id="jabatan-tab" data-toggle="tab"
                href="#jabatan" role="tab" aria-controls="jabatan" aria-selected="false">Jabatan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Session::get('tab')==6) active @endif " id="pembagian-job" data-toggle="tab"
                href="#pgjb" role="tab" aria-controls="pgjb" aria-selected="false">Job</a>
        </li>
    </ul>
    <div class="tab-content" id="simpletabContent">
        <div class="tab-pane fade @if (Session::get('tab')==0) show active @endif " id="kantor" role="tabpanel"
            aria-labelledby="kantor-tab">
            @include('backend.masterdata.kantor')
        </div>
        <div class="tab-pane fade @if (Session::get('tab')==1) show active @endif " id="gedung" role="tabpanel"
            aria-labelledby="gedung-tab">
            @include('backend.masterdata.gedung')
        </div>
        <div class="tab-pane fade @if (Session::get('tab')==2) show active @endif " id="lantai" role="tabpanel"
            aria-labelledby="lantai-tab">
            @include('backend.masterdata.lantai')
        </div>
        <div class="tab-pane fade @if (Session::get('tab')==3) show active @endif " id="ruangan" role="tabpanel"
            aria-labelledby="ruangan-tab">
            @include('backend.masterdata.ruangan')
        </div>
        <div class="tab-pane fade @if (Session::get('tab')==9) show active @endif " id="toilet" role="tabpanel"
            aria-labelledby="toilet-tab">
            @include('backend.masterdata.toilet')
        </div>
        <div class="tab-pane fade @if (Session::get('tab')==10) show active @endif " id="outdoor" role="tabpanel"
            aria-labelledby="outdoor-tab">
            @include('backend.masterdata.outdoor')
        </div>
        {{-- <div class="tab-pane fade @if (Session::get('tab')==7) show active @endif " id="lokasi" role="tabpanel"
            aria-labelledby="lokasi-tab">
            @include('backend.masterdata.lokasi')
        </div> --}}
        <div class="tab-pane fade @if (Session::get('tab')==8) show active @endif " id="pekerjaan" role="tabpanel"
            aria-labelledby="pekerjaan-tab">
            @include('backend.masterdata.pekerjaan')
        </div>
        <div class="tab-pane fade @if (Session::get('tab')==4) show active @endif " id="objek" role="tabpanel"
            aria-labelledby="objek-tab">
            @include('backend.masterdata.objek')
        </div>
        <div class="tab-pane fade @if (Session::get('tab')==5) show active @endif " id="jabatan" role="tabpanel"
            aria-labelledby="jabatan-tab">
            @include('backend.masterdata.jabatan')
        </div>
        <div class="tab-pane fade @if (Session::get('tab')==6) show active @endif " id="pgjb" role="tabpanel"
            aria-labelledby="pembagian-job">
            @include('backend.masterdata.job')
        </div>

    </div>
</div>
@endsection
@section('custom-js')
<script>
    $(document).ready(function () {
        selecttype(0);
    })
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
    function setjobbykantor(jobid,kantorid,x) {
        let kantor = $(kantorid).val();
        let r = $(x).val();
        let html = '';
        html += '<option value="" >Pilih</option>';
        $(jobid).html(html);
        $.ajax({
            type: 'GET',
            url: '/aobjek/getbykantor',
            data: '_token = <?php echo csrf_token() ?>&kantor=' + kantor,
            success: function(data) {
                // let json = JSON.parse($('#jobobjekid').val());
                // if (data.length > 0) {
                //     data.forEach(element => {
                //         json.forEach(el => {
                //             if (element.id == el) {
                //                 html += '<option value="' + element.id + '" selected>' + element.object + '</option>';
                //             } else {
                //                 html += '<option value="' + element.id + '">' + element.object + '</option>';
                //             }
                //         });
                //     });
                //     $(jobid).html(html);
                // }
            }
        });
    }
    function changekantorobject(gedungid,kantorid,x) {
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
        settoiletoutdoor();
    }
    function changegedung(lantaiid,gedungid,kantorid,x,type) {
        let kantor = $(kantorid).val();
        let gedung = $(gedungid).val();
        
        let r = $(x).val();
        let html = '';
        $('#objekruanganids').html(html);
        $('#objektoiletid').html(html);
        $('#objekoutdoorid').html(html);
        $(lantaiid).html(html);
        console.log(r);
        $.ajax({
            type: 'GET',
            url: '/alantai/getbygedung',
            data: '_token = <?php echo csrf_token() ?>&kantor=' + kantor+'&gedung='+gedung,
            success: function(data) {
                if (data.length > 0) {
                    data.forEach(element => {
                        let check = element.id==r?'checked':'';
                        if (type == 'radio') {
                            let string = `'#objekruanganids','#objeklantaiid','#objekgedungid','#objekkantorid','#objekruangan','radio'`;
                            html += '    <label class="new-control new-radio new-radio-text radio-primary">';
                            html += '    <input type="radio" class="new-control-input" name="objeklantaiid" id="objeklantaiid" value="'+element.id+'" onchange="changelantai('+string+')" '+check+' />';
                            html += '    <span class="new-control-indicator"></span><span class="new-radio-content">'+element.lantai+'</span>';
                            html += '    </label>';
                        }else{
                            if (element.id == r) {
                                html += '<option value="' + element.id + '" selected>' + element.lantai + '</option>';
                            } else {
                                html += '<option value="' + element.id + '">' + element.lantai + '</option>';
                            }
                        }
                    });
                    $(lantaiid).html(html);
                }
            }
        });
        settoiletoutdoor();
    }
    function changelantai(ruanganid,lantaiid,gedungid,kantorid,x,type) {
        let kantor = $(kantorid).val();
        let gedung = $(gedungid).val();
        let lantai = $(lantaiid).val();
        let r = $(x).val();
        let html = '';
        $(ruanganid).html(html);
        $.ajax({
            type: 'GET',
            url: '/aruangan/getbykantor',
            data: '_token = <?php echo csrf_token() ?>&kantor=' + kantor+'&gedung='+gedung+'&lantai='+lantai,
            success: function(data) {
                if (data.length > 0) {
                    data.forEach(element => {
                        // if (element.id == r) {
                        //     html += '<option value="' + element.id + '" selected>' + element.ruangan + '</option>';
                        // } else {
                        //     html += '<option value="' + element.id + '">' + element.ruangan + '</option>';
                        // }
                        // let string = `'#objekruanganids','#objeklantaiid','#objekgedungid','#objekkantorid','#objekruangan'`;
                        let check = element.id==r?'checked':'';
                        html += '    <label class="new-control new-radio new-radio-text radio-primary">';
                        html += '    <input type="radio" class="new-control-input" name="objekruanganid" value="'+element.id+'" '+check+' />';
                        html += '    <span class="new-control-indicator"></span><span class="new-radio-content">'+element.ruangan+'</span>';
                        html += '    </label>';
                    });
                    $(ruanganid).html(html);
                }
            }
        });
        settoiletoutdoor();
    }
    function settoiletoutdoor(){
        let kantor = $('#objekkantorid').val();
        let gedung = $('#objekgedungid').val();
        let lantai = $('#objeklantaiid').val();
        if (kantor&&gedung&&lantai) {
            let htmlt = '';
            let htmlo = '';
            let ot = $('#objektoilet').val();
            let oo = $('#objekoutdoor').val();
            $.ajax({
                type: 'GET',
                url: '/gettoiletoutdoor',
                data: '_token = <?php echo csrf_token() ?>&kantor=' + kantor+'&gedung='+gedung+'&lantai='+lantai,
                success: function(data) {
                    data.outdoor.forEach(element => {
                        let check = element.id==ot?'checked':'';
                        // if (element.id == oo) {
                            //     htmlo += '<option value="' + element.id + '" selected>' + element.outdoor + '</option>';
                            // } else {
                                //     htmlo += '<option value="' + element.id + '">' + element.outdoor + '</option>';
                                // }
                                htmlo += '    <label class="new-control new-radio new-radio-text radio-primary">';
                                    htmlo += '    <input type="radio" class="new-control-input" name="objekoutdoorid" id="objektoilet" value="'+element.id+'" '+check+' />';
                        htmlo += '    <span class="new-control-indicator"></span><span class="new-radio-content">'+element.outdoor+'</span>';
                        htmlo += '    </label>';
                    });
                    $('#objekoutdoorid').html(htmlo);
                    data.toilet.forEach(element => {
                    let check = element.id==ot?'checked':'';
                        // if (element.id == ot) {
                        //     htmlt += '<option value="' + element.id + '" selected>' + element.toilet + '</option>';
                        // } else {
                        //     htmlt += '<option value="' + element.id + '">' + element.toilet + '</option>';
                        // }
                        htmlt += '    <label class="new-control new-radio new-radio-text radio-primary">';
                        htmlt += '    <input type="radio" class="new-control-input" name="objektoiletid" id="objekoutdoor" value="'+element.id+'" '+check+' />';
                        htmlt += '    <span class="new-control-indicator"></span><span class="new-radio-content">'+element.toilet+'</span>';
                        htmlt += '    </label>';
                    });
                    $('#objektoiletid').html(htmlt);
                }
            });
        }
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
    
    createDataTable('#mastertoilet');
    $('#toiletkantorid').select2({
        allowClear:true,
        placeholder: 'Pilih',
        dropdownParent: $('#modaltoilet')
    });
    $('#toiletgedungid').select2({
        allowClear:true,
        placeholder: 'Pilih',
        dropdownParent: $('#modaltoilet')
    });
    $('#toiletlantaiid').select2({
        allowClear:true,
        placeholder: 'Pilih',
        dropdownParent: $('#modaltoilet')
    });
    function addtoilet(data) {
        resettoilet();
        openmodal('#modaltoilet');
        if (data) {
            $('#toiletkantor').val(data.kantor_id);
            $('#toiletgedung').val(data.gedung_id);
            $('#toiletlantai').val(data.lantai_id);
            $('#toiletid').val(data.id);
            $('#toiletnama').val(data.toilet);
            $('#toiletgedung').val(data.gedung_id);
            $('#toiletkantorid').val(data.kantor_id);
            $('#toiletkantorid').change();
            setTimeout(() => {
                $('#toiletgedungid').change();
            }, 1000);
        }
    }
    function resettoilet() {
        $('#toiletkantor').val(null);
        $('#toiletgedung').val(null);
        $('#toiletlantai').val(null);
        $('#toiletid').val(null);
        $('#toiletnama').val(null);
        $('#toiletgedung').val(null);
        $('#toiletkantorid').val(null);
    }

    createDataTable('#masteroutdoor');
    $('#outdoorkantorid').select2({
        allowClear:true,
        placeholder: 'Pilih',
        dropdownParent: $('#modaloutdoor')
    });
    $('#outdoorgedungid').select2({
        allowClear:true,
        placeholder: 'Pilih',
        dropdownParent: $('#modaloutdoor')
    });
    $('#outdoorlantaiid').select2({
        allowClear:true,
        placeholder: 'Pilih',
        dropdownParent: $('#modaloutdoor')
    });
    function addoutdoor(data) {
        resetoutdoor();
        openmodal('#modaloutdoor');
        if (data) {
            $('#outdoorkantor').val(data.kantor_id);
            $('#outdoorgedung').val(data.gedung_id);
            $('#outdoorlantai').val(data.lantai_id);
            $('#outdoorid').val(data.id);
            $('#outdoornama').val(data.outdoor);
            $('#outdoorgedung').val(data.gedung_id);
            $('#outdoorkantorid').val(data.kantor_id);
            $('#outdoorkantorid').change();
            setTimeout(() => {
                $('#outdoorgedungid').change();
            }, 1000);
        }
    }
    function resetoutdoor() {
        $('#outdoorkantor').val(null);
        $('#outdoorgedung').val(null);
        $('#outdoorlantai').val(null);
        $('#outdoorid').val(null);
        $('#outdoornama').val(null);
        $('#outdoorgedung').val(null);
        $('#outdoorkantorid').val(null);
    }
    
//     $('#lokasikantorid').select2({
//         allowClear:true,
//         placeholder: 'Pilih',
//         // dropdownParent: $('#modalruangan')
//     });
//     $('#lokasigedungid').select2({
//         allowClear:true,
//         placeholder: 'Pilih',
//         // dropdownParent: $('#modalruangan')
//     });

//     let datalokasi = @json($lokasi);
//     var map = L.map('map').setView([ -7.000433527639624, 110.33436565215736], 13);
//     let marker = null;
//     L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
//         attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
//         }).addTo(map);
//     datalokasi.forEach(element => {
//         marker = L.marker([element.lat, element.long]).addTo(map)
//             .bindPopup(element.nama)
//             .openPopup().on("click", function (event) {
//                 $('#lokasiid').val(element.id);
//                 $('#lokasigedung').val(element.gedung_id);
//                 $('#lokasikantorid').val(element.kantor_id);
//                 $('#lokasikantorid').change();
//                 setTimeout(() => {
//                     $('#lokasilat').val(element.lat);
//                     $('#lokasilong').val(element.long);
//                     $('#lokasinama').val(element.nama);
//                     $('#btndeletelokasi').attr('onclick','deletedata("alokasi/'+element.id+'")');
//                 }, 1000);
//             });
//     });
//     map.on('click', function(e) {        
//         var popLocation = e.latlng;
//         if (popLocation) {
//             $('#lokasiid').val(null);
//             // $('#lokasikantorid').val(null);
//             // $('#lokasigedungid').val(null);
//             // $('#lokasinama').val(null);
//             $('#lokasilat').val(e.latlng.lat);
//             $('#lokasilong').val(e.latlng.lng);
//             $('#btndeletelokasi').attr('onclick','deletedata()');
//         }
//         var popup = L.popup()
//             .setLatLng(popLocation)
//             .setContent('Pilih Lokasi')
//             .openOn(map);        
//     });
//     // --------------------------------------------------------------
// // create seearch button

// // add "random" button
// // const buttonTemplate = `<div class="leaflet-search"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M19.023 16.977a35.13 35.13 0 0 1-1.367-1.384c-.372-.378-.596-.653-.596-.653l-2.8-1.337A6.962 6.962 0 0 0 16 9c0-3.859-3.14-7-7-7S2 5.141 2 9s3.14 7 7 7c1.763 0 3.37-.66 4.603-1.739l1.337 2.8s.275.224.653.596c.387.363.896.854 1.384 1.367l1.358 1.392.604.646 2.121-2.121-.646-.604c-.379-.372-.885-.866-1.391-1.36zM9 14c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z"></path></svg></div><div class="auto-search-wrapper max-height"><input type="text" id="marker" autocomplete="off"  aria-describedby="instruction" aria-label="Search ..." /><div id="instruction" class="hidden">When autocomplete results are available use up and down arrows to review and enter to select. Touch device users, explore by touch or with swipe gestures.</div></div>`;
// const buttonTemplate = `<div class="leaflet-search"></div><div class="auto-search-wrapper max-height"><input type="text" id="marker" autocomplete="off"  aria-describedby="instruction" class="form-control" aria-label="Search ..." /><div id="instruction" class="hidden">When autocomplete results are available use up and down arrows to review and enter to select. Touch device users, explore by touch or with swipe gestures.</div></div>`;

// // create custom button
// const customControl = L.Control.extend({
//   // button position
//   options: {
//     position: "topleft",
//     className: "leaflet-autocomplete",
//   },

//   // method
//   onAdd: function () {
//     return this._initialLayout();
//   },

//   _initialLayout: function () {
//     // create button
//     const container = L.DomUtil.create(
//       "div",
//       "leaflet-bar " + this.options.className
//     );

//     L.DomEvent.disableClickPropagation(container);

//     container.innerHTML = buttonTemplate;

//     return container;
//   },
// });

// // adding new button to map controll
// map.addControl(new customControl());

// // --------------------------------------------------------------

// // input element
// const root = document.getElementById("marker");

// function addClassToParent() {
//   const searchBtn = document.querySelector(".leaflet-search");
//   searchBtn.addEventListener("click", (e) => {
//     // toggle class
//     e.target
//       .closest(".leaflet-autocomplete")
//       .classList.toggle("active-autocomplete");

//     // add placeholder
//     root.placeholder = "Search ...";

//     // focus on input
//     root.focus();

//     // use destroy method
//     autocomplete.destroy();
//   });
// }

// addClassToParent();

// // function clear input
// // map.on("click", () => {
// //   document
// //     .querySelector(".leaflet-autocomplete")
// //     .classList.remove("active-autocomplete");

// //   clickOnClearButton();
// // });

// // autocomplete section
// // more config find in https://github.com/tomickigrzegorz/autocomplete
// // --------------------------------------------------------------

// const autocomplete = new Autocomplete("marker", {
//   delay: 1000,
//   selectFirst: true,
//   howManyCharacters: 2,

//   onSearch: function ({ currentValue }) {
//     const api = `https://nominatim.openstreetmap.org/search?format=geojson&limit=5&q=${encodeURI(
//       currentValue
//     )}`;

//     /**
//      * Promise
//      */
//     return new Promise((resolve) => {
//       fetch(api)
//         .then((response) => response.json())
//         .then((data) => {
//           resolve(data.features);
//         })
//         .catch((error) => {
//           console.error(error);
//         });
//     });
//   },

//   onResults: ({ currentValue, matches, template }) => {
//     const regex = new RegExp(currentValue, "i");
//     // checking if we have results if we don't
//     // take data from the noResults method
//     return matches === 0
//       ? template
//       : matches
//           .map((element) => {
//             return `
//               <li role="option">
//                 <p>${element.properties.display_name.replace(
//                   regex,
//                   (str) => `<b>${str}</b>`
//                 )}</p>
//               </li> `;
//           })
//           .join("");
//   },

//   onSubmit: ({ object }) => {
//     const { display_name } = object.properties;
//     const cord = object.geometry.coordinates;
//     // custom id for marker
//     // const customId = Math.random();

//     // remove last marker
//     map.eachLayer(function (layer) {
//       if (layer.options && layer.options.pane === "markerPane") {
//         if (layer._icon.classList.contains("leaflet-marker-locate")) {
//           map.removeLayer(layer);
//         }
//       }
//     });

//     // add marker
//     // const marker = L.marker([cord[1], cord[0]], {
//     //   title: display_name,
//     // });

//     // add marker to map
//     // marker.addTo(map).bindPopup(display_name);

//     // set marker to coordinates
//     map.setView([cord[1], cord[0]], 14);

//     // add class to marker
//     L.DomUtil.addClass(marker._icon, "leaflet-marker-locate");
//   },

//   // the method presents no results
//   noResults: ({ currentValue, template }) =>
//     template(`<li>No results found: "${currentValue}"</li>`),
// });

//     function resetlokasi() {
//         $('#lokasiid').val(null);
//         $('#lokasigedung').val(null);
//         $('#lokasikantorid').val(null);
//         $('#lokasigedungid').val(null);
//         $('#lokasilat').val(null);
//         $('#lokasilong').val(null);
//         $('#lokasinama').val(null);
//         $('#lokasikantorid').change();
//         $('#lokasigedungid').change();
//     }

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
    // $('#objeklantaiid').select2({
    //     allowClear:true,
    //     placeholder: 'Pilih',
    //     dropdownParent: $('#modalobjek')
    // });
    // $('#objekruanganid').select2({
    //     allowClear:true,
    //     placeholder: 'Pilih',
    //     dropdownParent: $('#modalobjek')
    // });
    $('#objekpekerjaan').select2({
        allowClear:true,
        placeholder: 'Pilih',
        dropdownParent: $('#modalobjek')
    });
    // $('#objektoiletid').select2({
    //     allowClear:true,
    //     placeholder: 'Pilih',
    //     dropdownParent: $('#modalobjek')
    // });
    // $('#objekoutdoorid').select2({
    //     allowClear:true,
    //     placeholder: 'Pilih',
    //     dropdownParent: $('#modalobjek')
    // });
    function addltr(target,value) {
        $(target).val(value);
    }
    function addobjek(data) {
        resetobjek();
        openmodal('#modalobjek');
        if (data) {
            $('#objekkantor').val(data.kantor_id);
            $('#objekgedung').val(data.gedung_id);
            $('#objeklantai').val(data.lantai_id);
            $('#objekruangan').val(data.ruangan_id);
            $('#objektoilet').val(data.toilet_id);
            $('#objekoutdoor').val(data.outdoor_id);
            $('#objekkantorid').val(JSON.parse(data.kantor_id));
            $('#objekid').val(data.id);
            if (data.pekerjaan) {
                $('#objekpekerjaan').val(JSON.parse(data.object));
                $('#objekpekerjaan').change();
            }
            $('#objekkantorid').change();
            setTimeout(() => {
                $('#objekgedungid').val(data.gedung_id);
                $('#objekgedungid').change();
                // $('#objeklantaiid').val(data.lantai_id);
            }, 1000);
            setTimeout(() => {
                $('#objeklantaiid').change();
                $('#objekruanganid').val(data.ruangan_id);
                $('#objekruanganid').change();
            }, 1500);
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
    function changepegawaitype() {
        let param = '';
        let val = $('#pegawaitype').val();
        $('#pegkantor').removeAttr('hidden');
        $('#pegspv').removeAttr('hidden');
        $('#spvtitle').html('Supervisor');
        if (val == 1 || val == 2) {
            $('#pegkantor').attr('hidden',true);
            $('#pegspv').attr('hidden',true);
            $('#pegkantor').val(null);
            $('#pegspv').val(null);
        }
        if (val >= 3 && val<=5) {
            $('#pegspv').attr('hidden',true);
            $('#pegspv').val(null);
        }
        if (val == 6) {
            let x = $('#pegawaikantor').val();
            param = '&status=5&kantor='+x.join(',');
        }
        if (val == 7) {
            let x = $('#pegawaikantor').val();
            param = '&kantor='+x.join(',');
        }
            let r = $('#pegawaispv').val();
            let html = '';
            html += '<option value="" >Pilih</option>';
            $('#pegawaispv').html(html);
            $.ajax({
                type: 'GET',
                url: '/master',
                data: '_token = <?php echo csrf_token() ?>'+param,
                success: function(data) {
                    if (data.onlypegawai.length > 0) {
                        $('#spvtitle').html('Kepala Supervisor');
                        if (val==7) {
                            $('#spvtitle').html('Kepala/Supervisor');
                        }
                        data.onlypegawai.forEach(element => {
                            if (element.user_id == r) {
                                html += '<option value="' + element.user_id + '" selected>' + element.name + '</option>';
                            } else {
                                html += '<option value="' + element.user_id + '">' + element.name + '</option>';
                            }
                        });
                    }
                    $('#pegawaispv').html(html);
            }
        });
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
    $('#pegawaikantor').select2({
        allowClear:true,
        placeholder: 'Pilih',
        dropdownParent: $('#modalpegawai')
    });
    function addpegawai(data) {
        resetpegawai();
        openmodal('#modalpegawai');
        if (data) {
            
            if (data.status == 1) {
                $('#pegawaistatusactive').attr('checked',true);
            }
            if (data.status == 2) {
                $('#pegawaistatusdeactive').attr('checked',true);
            }
            $('#pegawaikantor').val(JSON.parse(data.kantor_id)?JSON.parse(data.kantor_id):data.kantor_id);
            $('#pegawaitype').val(data.jabatan);
            $('#pegawaipic').val(data.pic);
            $('#pegawaiuserid').val(data.user_id);
            $('#pegawaiaaa').val(data.user_id);
            $('#pegawaiid').val(data.id);
            $('#pegawainama').val(data.nama);
            $('#pegawainip').val(data.nip);
            $('#pegawaitglbergabung').val(data.tgl_bergabung);
            $('#pegawaitglselesai').val(data.tgl_selesai);
            $('#pegawaikantor').change();
            $('#pegawaitype').change();
            $('#pegawaipic').change();
            setTimeout(() => {
                $('#pegawaispv').val(JSON.parse(data.spv));
                $('#pegawaispv').change();
            }, 1000);
        }
    }
    function resetpegawai() {
        $('#pegawaistatusactive').removeAttr('checked');
        $('#pegawaistatusdeactive').removeAttr('checked');
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
        $('#pegawaikantor').val(null);
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
    $('#joblantai').select2({
        allowClear:true,
        placeholder: 'Pilih',
        dropdownParent: $('#modaljob'),
    });
    function addjob(data) {
        resetjob();
        openmodal('#modaljob');
        if (data) {
            $('#jobid').val(data.id);
            $('#joblantaiid').val(data.lantai_id);
            $('#jobkantorid').val(data.kantor_id);
            $('#jobobjekid').val(data.objek_id);
            $('#jobuser').val(data.user_id);
            $('#jobuser').change();
            $('#jobkantor').val(data.kantor_id);
            $('#jobkantor').change();
            setTimeout(() => {
                $('#jobobjek').val(JSON.parse(data.objek_id));
                $('#jobobjek').change();
            }, 1000);
            setTimeout(() => {
                $('#joblantai').val(JSON.parse(data.lantai_id));
                $('#joblantai').change();
            }, 2000);
        }
    }
    function resetjob() {
        $('#jobid').val(null);
        $('#joblantaiid').val(null);
        $('#jobkantorid').val(null);
        $('#jobobjekid').val(null);
        $('#jobuser').val(null);
        $('#jobuser').change();
        $('#jobobjek').val(null);
        $('#jobobjek').change();
    }

    $(document).ready(function () {
        window.dispatchEvent(new Event('resize'));
    })
    function triggerresize() {
        setTimeout(() => {
            window.dispatchEvent(new Event('resize'));
        }, 500);
    }

    createDataTable('#masterpekerjaan');
    function addpekerjaan(data) {
        resetpekerjaan();
        openmodal('#modalpekerjaan');
        if (data) {
            $('#pekerjaanid').val(data.id);
            $('#pekerjaannama').val(data.nama);
        }
    }
    function resetpekerjaan() {
        $('#pekerjaanid').val(null);
        $('#pekerjaannama').val(null);
    }

    function selecttype(type) {
        $('#form-ruangan').attr('hidden',true);
        $('#form-toilet').attr('hidden',true);
        $('#form-outdoor').attr('hidden',true);
        if (type == 1) {
            $('#form-ruangan').removeAttr('hidden');
        }
        if (type == 2) {
            $('#form-toilet').removeAttr('hidden');
        }
        if (type == 3) {
            $('#form-outdoor').removeAttr('hidden');
        }
    }
</script>

@endsection