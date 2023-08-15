@extends('layouts.template')
@section('content')
<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-chart-two">
        <div class="widget-content">
            <p class="text-center"><b>Tugas selesai terhadap jumlah kantor</b></p>
            <div class="row layout-top-spacing">
                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="" id="radialbar1"></div>
                </div>
                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="" id="radialbar2"></div>
                </div>
                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="" id="radialbar3"></div>
                </div>
                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="" id="radialbar4"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    {{-- <div class="widget widget-chart-two">
        <div class="widget-content">
        </div>
    </div> --}}
    <div class="" id="map" style="height: 310px; border-radius:20px">
    </div>
</div>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-chart-two">
        <div class="widget-content">
            <div class="" id="chartline"></div>
        </div>
    </div>
</div>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-chart-two">
        <div class="widget-content">
            <p class="text-center"><b>Approval</b></p>
            <form action="" method="GET" class="ml-4">
                @csrf
                <div class="row">
                    <input type="date" name="tglawal" id="tglawal" class="form-control col-md-2">
                    <input type="date" name="tglakhir" id="tglakhir" class="form-control col-md-2">
                    <span class="btn btn-primary ml-2" type="submit" title="Cari"><svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            style="fill:rgba(255, 255, 255, 0.85);transform: ;msFilter:;">
                            <path
                                d="M19.023 16.977a35.13 35.13 0 0 1-1.367-1.384c-.372-.378-.596-.653-.596-.653l-2.8-1.337A6.962 6.962 0 0 0 16 9c0-3.859-3.14-7-7-7S2 5.141 2 9s3.14 7 7 7c1.763 0 3.37-.66 4.603-1.739l1.337 2.8s.275.224.653.596c.387.363.896.854 1.384 1.367l1.358 1.392.604.646 2.121-2.121-.646-.604c-.379-.372-.885-.866-1.391-1.36zM9 14c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z">
                            </path>
                        </svg></span>
                    <div class="col"></div>
                    <div class="col"></div>
                </div>
            </form>
            <table id="banner" class="table table-hover" style="width:100%">
                <thead>
                    <th width="8%">No</th>
                        <th>Petugas</th>
                        {{-- <th>Kantor</th>
                        <th>Lantai</th>
                        <th>Ruangan</th> --}}
                        <th>Proses</th>
                        <th>Foto</th>
                        <th>Status</th>
                        <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach ($job as $key => $f )
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$f->name}}</td>
                        {{-- <td>
                            @if (json_decode($f->class_id))
                            @foreach (json_decode($f->class_id) as $fe)
                            <span class="badge badge-info">{{$fe}}</span>
                            @endforeach
                            @else
                            All
                            @endif
                        </td> --}}
                        <td>99 %</td>
                        <td>
                            <span onclick="modalfoto({{$f}})">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" style="fill:rgba(0,143,251,0.85);transform: ;msFilter:;">
                                <circle cx="7.499" cy="9.5" r="1.5"></circle>
                                <path d="m10.499 14-1.5-2-3 4h12l-4.5-6z"></path>
                                <path d="M19.999 4h-16c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm-16 14V6h16l.002 12H3.999z"></path>
                                </svg>
                            </span>
                        </td>
                        <td>
                            @if($f->status == 0)
                                <span class="badge badge-warning">Menunggu</span>
                            @endif
                            @if($f->status == 1)
                                <span class="badge badge-warning">Menunggu</span>
                            @endif
                            @if($f->status == 2)
                                <span class="badge badge-warning">Menunggu</span>
                            @endif
                            @if($f->status == 3)
                                <span class="badge badge-warning">Menunggu</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group  mb-2 me-4" role="group">
                                <button id="btndefault" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(240, 240, 240);transform: ;msFilter:;"><path d="m2.344 15.271 2 3.46a1 1 0 0 0 1.366.365l1.396-.806c.58.457 1.221.832 1.895 1.112V21a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1v-1.598a8.094 8.094 0 0 0 1.895-1.112l1.396.806c.477.275 1.091.11 1.366-.365l2-3.46a1.004 1.004 0 0 0-.365-1.366l-1.372-.793a7.683 7.683 0 0 0-.002-2.224l1.372-.793c.476-.275.641-.89.365-1.366l-2-3.46a1 1 0 0 0-1.366-.365l-1.396.806A8.034 8.034 0 0 0 15 4.598V3a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v1.598A8.094 8.094 0 0 0 7.105 5.71L5.71 4.904a.999.999 0 0 0-1.366.365l-2 3.46a1.004 1.004 0 0 0 .365 1.366l1.372.793a7.683 7.683 0 0 0 0 2.224l-1.372.793c-.476.275-.641.89-.365 1.366zM12 8c2.206 0 4 1.794 4 4s-1.794 4-4 4-4-1.794-4-4 1.794-4 4-4z"></path></svg></button>
                                <div class="dropdown-menu" aria-labelledby="btndefault">
                                    <a href="javascript:void(0);" class="dropdown-item" onclick="edit({{$f}})"><i class="flaticon-home-fill-1 mr-1"></i>Edit</a>
                                    <a href="/approval?status={{$f->status==0?1:0}}&tugasid={{$f->id}}&approval=true" class="dropdown-item"><i class="flaticon-home-fill-1 mr-1"></i>{{$f->status==0?'ACC':'BATAL ACC'}}</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-chart-two">
        <div class="widget-content">
            <p class="text-center"><b>Harian</b></p>
            <table id="harianjob" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th width="8%">No</th>
                        <th>Petugas</th>
                        <th>Kantor</th>
                        <th>Lantai</th>
                        <th>Ruangan</th>
                        <th>Proses</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($harian as $k => $h )
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$h->name}}</td>
                        <td>{{$h->nama}}</td>
                        <td>{{$h->lantai}}</td>
                        <td>{{$h->ruangan}}</td>
                        <td>
                            <span class="badge badge-warning">50%</span>
                        </td>
                        <td>
                            <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" style="fill:rgba(0,143,251,0.85);transform: ;msFilter:;">
                                    <circle cx="7.499" cy="9.5" r="1.5"></circle>
                                    <path d="m10.499 14-1.5-2-3 4h12l-4.5-6z"></path>
                                    <path
                                        d="M19.999 4h-16c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm-16 14V6h16l.002 12H3.999z">
                                    </path>
                                </svg></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-chart-two">
        <div class="widget-content">
            <p class="text-center"><b>Mingguan</b></p>
            <table id="mingguanjob" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th width="8%">No</th>
                        <th>Petugas</th>
                        <th>Kantor</th>
                        <th>Lantai</th>
                        <th>Ruangan</th>
                        <th>Proses</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mingguan as $k => $h )
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$h->name}}</td>
                        <td>{{$h->nama}}</td>
                        <td>{{$h->lantai}}</td>
                        <td>{{$h->ruangan}}</td>
                        <td>
                            <span class="badge badge-warning">50%</span>
                        </td>
                        <td>
                            <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" style="fill:rgba(0,143,251,0.85);transform: ;msFilter:;">
                                    <circle cx="7.499" cy="9.5" r="1.5"></circle>
                                    <path d="m10.499 14-1.5-2-3 4h12l-4.5-6z"></path>
                                    <path
                                        d="M19.999 4h-16c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm-16 14V6h16l.002 12H3.999z">
                                    </path>
                                </svg></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-chart-two">
        <div class="widget-content">
            <p class="text-center"><b>Bulanan</b></p>
            <table id="bulananjob" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th width="8%">No</th>
                        <th>Petugas</th>
                        <th>Kantor</th>
                        <th>Lantai</th>
                        <th>Ruangan</th>
                        <th>Proses</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bulanan as $k => $h )
                    <tr>
                        <td>{{$k+1}}</td>
                        <td>{{$h->name}}</td>
                        <td>{{$h->nama}}</td>
                        <td>{{$h->lantai}}</td>
                        <td>{{$h->ruangan}}</td>
                        <td>
                            <span class="badge badge-warning">50%</span>
                        </td>
                        <td>
                            <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" style="fill:rgba(0,143,251,0.85);transform: ;msFilter:;">
                                    <circle cx="7.499" cy="9.5" r="1.5"></circle>
                                    <path d="m10.499 14-1.5-2-3 4h12l-4.5-6z"></path>
                                    <path
                                        d="M19.999 4h-16c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm-16 14V6h16l.002 12H3.999z">
                                    </path>
                                </svg></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal Foto -->
<div class="modal fade" id="detailjob" tabindex="-1" role="dialog" aria-labelledby="detailjobLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="detailjobLabel">Approve</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h4 id="namapetugas"></h4>
          <div class="row" id="detailfotojob">
          </div>
        </div>
      </div>
    </div>
    </div>
<!-- Modal -->
<div class="modal fade" id="modalfotos" tabindex="-1" role="dialog" aria-labelledby="modalfotosLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalfotosLabel">Approve</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h4 id="namapetugasfoto"></h4>
          <div class="row" id="detailfoto">
          </div>
          <form action="/approval" method="POST">
            @csrf
            <input type="text" name="tugasid" id="tugasid" hidden>
            {{-- <input type="text" name="tugasstatus" id="tugasstatus" hidden> --}}
            <textarea name="detaildata" id="detaildata" hidden></textarea>
            <div >
                <table class="table teble-responsive">
                    <thead>
                        <tr>
                            <th>Kantor</th>
                            <th>Lantai</th>
                            <th>Ruangan</th>
                            <th>Objek</th>
                            <th>Komentar</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody id="detail">
                        {{-- <tr>
                            <td>'+e.namakantor+'</td>
                            <td>'+e.lantai+'</td>
                            <td>'+e.ruangan+'</td>
                            <td>'+e.nama_tugas+'</td>
                            <td>
                                <a href="{{asset('image/Login.jpg')}}" target="_blank"><img src="{{asset('image/Login.jpg')}}" alt="" width="60px" height="60px"></a>
                                <a href="{{asset('image/login.png')}}" target="_blank"><img src="{{asset('image/login.png')}}" alt="" width="60px" height="60px"></a>
                            </td>
                            <th><textarea name="detailkomentar[]" id="detailkomentar" cols="30" rows="1" class="form-control" placeholder="Komentar"></textarea></th>
                            <th>
                                <select name="detailnilai[]" id="detailnilai" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="5">Bersih Sekali</option>
                                    <option value="4">Bersih</option>
                                    <option value="3">Cukup</option>
                                    <option value="2">Kurang Bersih</option>
                                    <option value="1">Kotor</option>
                                </select>
                            </th>
                        </tr> --}}
                    </tbody>
                </table>
                {{-- <div class="row">
                        <div class="col"><small>Kantor</small><h5>'+e.namakantor+'</h5></div>
                        <div class="col"><small>Lantai</small><h5>'+e.lantai+'</h5></div>
                        <div class="col"><small>Ruangan</small><h5>'+e.ruangan+'</h5></div>
                        <div class="col"><small>Objek</small><h5>'+e.nama_tugas+'</h5></div>
                        <div class="col-md-2"><small>Komentar</small><textarea name="detailkomentar[]" id="detailkomentar" cols="30" rows="1" class="form-control" placeholder="Komentar"></textarea></div>
                        <div class="col-md-2"><small>Nilai</small>
                            <select name="detailnilai[]" id="detailnilai" class="form-control">
                                <option value="">Pilih</option>
                                <option value="5">Bersih Sekali</option>
                                <option value="4">Bersih</option>
                                <option value="3">Cukup</option>
                                <option value="2">Kurang Bersih</option>
                                <option value="1">Kotor</option>
                            </select>
                        </div>
                    </div> --}}
            </div>
            <hr>
            <div class="col"><button class="btn btn-primary btn-sm" title="Update" type="submit" >Simpan</button></div>
        </form>
          </div>
        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
    </div>
  </div>
@endsection
@section('custom-js')
<script>
    createDataTable('#banner');
    createDataTable('#harianjob');
    createDataTable('#mingguanjob');
    createDataTable('#bulananjob');
    // radialbar(['80'],300,'80%',['label'],'#radialbar1');
    // radialbar(['50'],100,'50%',['label'],'#radialbar2');
    // radialbar(['10'],100,'10%',['label'],'#radialbar3');
    // radialbar(['90'],100,'90%',['label'],'#radialbar4');
    var options1 = {
        chart: {
            height: 220,
            type: "radialBar"
        },
        series: [67],
        plotOptions: {
            radialBar: {
                hollow: {
                    margin: 15,
                    size: "70%"
                },
                dataLabels: {
                    showOn: "always",
                    name: {
                        offsetY: -10,
                        show: true,
                        color: "#888",
                        fontSize: "12px"
                    },
                    value: {
                        color: "#111",
                        fontSize: "20px",
                        show: true
                    }
                }
            }
        },
        stroke: {
            lineCap: "round",
        },
        labels: ["Progress"]
    };
    var chart1 = new ApexCharts(document.querySelector('#radialbar1'), options1);
    chart1.render();

    var options2 = {
        chart: {
            height: 220,
            type: "radialBar"
        },
        series: [67],
        plotOptions: {
            radialBar: {
                hollow: {
                    margin: 15,
                    size: "70%"
                },
                dataLabels: {
                    showOn: "always",
                    name: {
                        offsetY: -10,
                        show: true,
                        color: "#888",
                        fontSize: "12px"
                    },
                    value: {
                        color: "#111",
                        fontSize: "20px",
                        show: true
                    }
                }
            }
        },
        stroke: {
            lineCap: "round",
        },
        labels: ["Progress"]
    };
    var chart2 = new ApexCharts(document.querySelector('#radialbar2'), options2);
    chart2.render();

    var options3 = {
        chart: {
            height: 220,
            type: "radialBar"
        },
        series: [67],
        plotOptions: {
            radialBar: {
                hollow: {
                    margin: 15,
                    size: "70%"
                },
                dataLabels: {
                    showOn: "always",
                    name: {
                        offsetY: -10,
                        show: true,
                        color: "#888",
                        fontSize: "12px"
                    },
                    value: {
                        color: "#111",
                        fontSize: "20px",
                        show: true
                    }
                }
            }
        },
        stroke: {
            lineCap: "round",
        },
        labels: ["Progress"]
    };
    var chart3 = new ApexCharts(document.querySelector('#radialbar3'), options3);
    chart3.render();

    var options4 = {
        chart: {
            height: 220,
            type: "radialBar"
        },
        series: [67],
        plotOptions: {
            radialBar: {
                hollow: {
                    margin: 15,
                    size: "70%"
                },
                dataLabels: {
                    showOn: "always",
                    name: {
                        offsetY: -10,
                        show: true,
                        color: "#888",
                        fontSize: "12px"
                    },
                    value: {
                        color: "#111",
                        fontSize: "20px",
                        show: true
                    }
                }
            }
        },
        stroke: {
            lineCap: "round",
        },
        labels: ["Progress"]
    };
    var chart4 = new ApexCharts(document.querySelector('#radialbar4'), options4);
    chart4.render();

    var chartline = {
          series: [{
            name: "Desktops",
            data: [10, 41, 35, 51, 49, 62, 69, 91, 148,50,55,35]
        }],
          chart: {
          height: 350,
          type: 'line',
          zoom: {
            enabled: false
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'straight'
        },
        title: {
          text: 'Jumlah pembersihan dalam bulan',
          align: 'center'
        },
        grid: {
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        xaxis: {
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep','Okt','Nov','Des'],
        }
        };

        var line = new ApexCharts(document.querySelector("#chartline"), chartline);
        line.render();

    let datalokasi = @json($peta);
    var map = L.map('map').setView([ -6.987502376476729, 110.4225807065836], 11);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    datalokasi.forEach(element => {
        L.marker([element.lat, element.long]).addTo(map)
                .bindPopup(element.nama)
                .openPopup();
    });

    function modalfoto(x) {
        $('#modalfotos').modal('show');
        $('#namapetugasfoto').html(x.name);
    x.photos.forEach(el => {
        b+='<a href="'+el.url+'" target="_blank"><img src="'+el.url+'" alt="" width="120px" height="120px" class="col"></a>';
    });
    $('#detailfotojob').html(b);
    }

    function edit(data) {
        console.log(data);
        let a = '';
        let b = '';
        let no = 0;
        $('#detailjob').modal('show');
        $('#namapetugas').html(data.name);
        $('#tugasid').val(data.id);
        // $('#tugasstatus').val(data.status==0?1:0);
        $('#detaildata').val(data.tugas);
        // $('#btnacc').html(data.status==0?'ACC':'Batal');
        data.job.forEach(e => {
            let komentar = '';
            let select1 = '';
            let select2 = '';
            let select3 = '';
            let select4 = '';
            let select5 = '';
            if (e.komentar) {
                komentar = e.komentar;
            }
            if (e.nilai == 5) {
                select5 = 'selected';
            }
            if (e.nilai == 4) {
                select4 = 'selected';
            }
            if (e.nilai == 3) {
                select3 = 'selected';
            }
            if (e.nilai == 2) {
                select2 = 'selected';
            }
            if (e.nilai == 1) {
                select1 = 'selected';
            }
        // a+='<div class="row">';
            // a+='    <div class="col"><small>Kantor</small><h5>'+e.namakantor+'</h5></div>';
            // a+='    <div class="col"><small>Lantai</small><h5>'+e.lantai+'</h5></div>';
        // a+='    <div class="col"><small>Ruangan</small><h5>'+e.ruangan+'</h5></div>';
        // a+='    <div class="col"><small>Objek</small><h5>'+e.nama_tugas+'</h5></div>';
        // a+='    <div class="col-md-2"><small>Komentar</small><textarea name="detailkomentar[]" id="detailkomentar" cols="30" rows="1" class="form-control" placeholder="Komentar"></textarea></div>';
        // a+='    <div class="col-md-2"><small>Nilai</small>';
        // a+='        <select name="detailnilai[]" id="detailnilai" class="form-control">';
        // a+='            <option value="">Pilih</option>';
        // a+='            <option value="5">Bersih Sekali</option>';
        // a+='            <option value="4">Bersih</option>';
        // a+='            <option value="3">Cukup</option>';
        // a+='            <option value="2">Kurang Bersih</option>';
        // a+='            <option value="1">Kotor</option>';
        // a+='        </select>';
        // a+='    </div>';
        // a+='</div>';
        
        // a+='    <td>';
        // a+='        <a href="'+data.photos?data.photos[no]['url']:''+'" target="_blank"><img src="'+data.photos?data.photos[no]['url']:''+'" alt="" width="60px" height="60px"></a>';
        // a+='    </td>';
        a+='<tr>';
        a+='    <td>'+e.pic+'</td>';
        a+='    <td>'+e.lantai+'</td>';
        a+='    <td>'+e.ruangan+'</td>';
        a+='    <td>'+e.object+'</td>';
        a+='    <th><textarea name="detailkomentar[]" id="detailkomentar" cols="30" rows="1" class="form-control" placeholder="Komentar">'+komentar+'</textarea></th>';
        a+='    <th>';
        a+='        <select name="detailnilai[]" id="detailnilai" class="form-control">';
        a+='            <option value="">Pilih</option>';
        a+='            <option '+select5+' value="5">Bersih Sekali</option>';
        a+='            <option '+select4+' value="4">Bersih</option>';
        a+='            <option '+select3+' value="3">Cukup</option>';
        a+='            <option '+select2+' value="2">Kurang Bersih</option>';
        a+='            <option '+select1+' value="1">Kotor</option>';
        a+='        </select>';
        a+='    </th>';
        a+='</tr>';
        no++;
    });
    $('#detail').html(a);
    data.photos.forEach(el => {
        b+='<a href="'+el.url+'" target="_blank"><img src="'+el.url+'" alt="" width="60px" height="60px" class="col"></a>';
    });
    $('#detailfoto').html(b);
    }
    $(document).ready(function () {
        // $('#detailjob').modal('show');    
        console.log('11.43');
    })
</script>

@endsection