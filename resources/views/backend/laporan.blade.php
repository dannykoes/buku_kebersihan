@extends('layouts.template')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-chart-two">
        <div class="widget-content">
            <div class="form-group p-2" style="max-width: 20%">
                <label for="">Kantor</label>
                <select name="selectkantor" id="selectkantor" class="form-control">
                    @foreach ($kantor as $k)
                    <option value="{{$k->id}}">{{$k->nama}}</option>
                    @endforeach
                </select>
            </div>
            <p class="text-center"><b>Laporan Kebersihan per Kantor</b></p>
            <div class="" id="chart"></div>
        </div>
    </div>
</div>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
    <div class="text-center">
        <p><b>Laporan Aktivitas Karyawan</b></p>
        <form action="" method="GET">
            @csrf
            <div class="row">
                <div class="col"></div>
                <div class="col-md-2">
                    <select name="selectkaryawan" id="selectkaryawan" class="form-control">
                        @foreach ($kantor as $k)
                        <option value="{{$k->id}}">{{$k->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <input type="date" name="tglawal" id="tglawal" class="form-control col-md-2">
                <input type="date" name="tglakhir" id="tglakhir" class="form-control col-md-2">
                <span class="btn btn-primary ml-2" type="submit" title="Cari"><svg xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24"
                        style="fill:rgba(255, 255, 255, 0.85);transform: ;msFilter:;">
                        <path
                            d="M19.023 16.977a35.13 35.13 0 0 1-1.367-1.384c-.372-.378-.596-.653-.596-.653l-2.8-1.337A6.962 6.962 0 0 0 16 9c0-3.859-3.14-7-7-7S2 5.141 2 9s3.14 7 7 7c1.763 0 3.37-.66 4.603-1.739l1.337 2.8s.275.224.653.596c.387.363.896.854 1.384 1.367l1.358 1.392.604.646 2.121-2.121-.646-.604c-.379-.372-.885-.866-1.391-1.36zM9 14c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z">
                        </path>
                    </svg></span>
                <div class="col"></div>
            </div>
        </form>
    </div>
</div>
<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-chart-two">
        <div class="widget-content">
            <table id="bannerlap" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th width="8%">No</th>
                        <th>Kantor</th>
                        <th>Ruangan</th>
                        <th>Foto Sebelum</th>
                        <th>Proses</th>
                        <th>Foto Sesudah</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Kantor 1</td>
                        <td>Ruangan 1</td>
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
                        <td>
                            <span class="badge badge-success">100%</span>
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
                    <tr>
                        <td>2</td>
                        <td>Kantor 2</td>
                        <td>Ruangan 2</td>
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
                    {{-- @foreach ($fee as $key => $f )
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>
                            @if (json_decode($f->class_id))
                            @foreach (json_decode($f->class_id) as $fe)
                            <span class="badge badge-info">{{$fe}}</span>
                            @endforeach
                            @else
                            All
                            @endif
                        </td>
                        <td>{{$f->nominal}} %</td>
                        <td>
                            <button class="btn btn-warning" id="edit" onclick="edit({{ $f }})" title="Edit"><i
                                    class='bx bx-edit'></i></button>
                            <button class="btn btn-danger" onclick="hapus('{{ $f->id }}')" title="Delete"> <i
                                    class='bx bx-trash'></i></button>
                        </td>
                    </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-chart-two">
        <div class="widget-content">
            <div class="" id="chart2"></div>
        </div>
    </div>
</div>
@endsection
@section('custom-js')
<script>
    createDataTable('#bannerlap');
    var options = {
          series: [{
          name: 'Inflation',
          data: [2.3, 3.1, 4.0, 10.1, 4.0, 3.6, 3.2, 2.3, 1.4, 0.8, 0.5, 0.2]
        }],
          chart: {
          height: 350,
          type: 'bar',
        },
        plotOptions: {
          bar: {
            borderRadius: 10,
            dataLabels: {
              position: 'top', // top, center, bottom
            },
          }
        },
        dataLabels: {
          enabled: true,
          formatter: function (val) {
            return val + "%";
          },
          offsetY: -20,
          style: {
            fontSize: '12px',
            colors: ["#304758"]
          }
        },
        
        xaxis: {
          categories: ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L"],
          position: 'bottom',
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false
          },
          crosshairs: {
            fill: {
              type: 'gradient',
              gradient: {
                colorFrom: '#D8E3F0',
                colorTo: '#BED1E6',
                stops: [0, 100],
                opacityFrom: 0.4,
                opacityTo: 0.5,
              }
            }
          },
          tooltip: {
            enabled: true,
          }
        },
        yaxis: {
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false,
          },
          labels: {
            show: false,
            formatter: function (val) {
              return val + "%";
            }
          }
        
        },
        // title: {
        //   text: 'Monthly Inflation in Argentina, 2002',
        //   floating: true,
        //   offsetY: 330,
        //   align: 'center',
        //   style: {
        //     color: '#444'
        //   }
        // }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();

        var options2 = {
          series: [{
          name: 'Servings',
          data: [44, 55, 41, 67, 22, 43, 21, 33, 45, 31, 87, 65, 35]
        }],
          annotations: {
        //   points: [{
        //     x: 'Bananas',
        //     seriesIndex: 0,
        //     label: {
        //       borderColor: '#775DD0',
        //       offsetY: 0,
        //       style: {
        //         color: '#fff',
        //         background: '#775DD0',
        //       },
        //       text: 'Bananas are good',
        //     }
        //   }]
        },
        chart: {
          height: 350,
          type: 'bar',
        },
        plotOptions: {
          bar: {
            borderRadius: 10,
            columnWidth: '50%',
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          width: 2
        },
        
        grid: {
          row: {
            colors: ['#fff', '#f2f2f2']
          }
        },
        xaxis: {
          labels: {
            rotate: -45
          },
          categories: ['Apples', 'Oranges', 'Strawberries', 'Pineapples', 'Mangoes', 'Bananas',
            'Blackberries', 'Pears', 'Watermelons', 'Cherries', 'Pomegranates', 'Tangerines', 'Papayas'
          ],
          tickPlacement: 'on'
        },
        yaxis: {
          title: {
            text: 'Servings',
          },
        },
        fill: {
          type: 'gradient',
          gradient: {
            shade: 'light',
            type: "horizontal",
            shadeIntensity: 0.25,
            gradientToColors: undefined,
            inverseColors: true,
            opacityFrom: 0.85,
            opacityTo: 0.85,
            stops: [50, 0, 100]
          },
        }
        };

        var chart2 = new ApexCharts(document.querySelector("#chart2"), options2);
        chart2.render();
</script>

@endsection