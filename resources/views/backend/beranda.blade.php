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
                    <tr>
                        <th width="8%">No</th>
                        <th>Kantor</th>
                        <th>Ruangan</th>
                        <th>Foto Sebelum</th>
                        <th>Proses</th>
                        <th>Foto Sesudah</th>
                        <th>Aksi</th>
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
                        <td>
                            <div class="btn-group  mb-2 me-4" role="group">
                            <button title="Aksi" id="btndefault1" type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="m2.344 15.271 2 3.46a1 1 0 0 0 1.366.365l1.396-.806c.58.457 1.221.832 1.895 1.112V21a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1v-1.598a8.094 8.094 0 0 0 1.895-1.112l1.396.806c.477.275 1.091.11 1.366-.365l2-3.46a1.004 1.004 0 0 0-.365-1.366l-1.372-.793a7.683 7.683 0 0 0-.002-2.224l1.372-.793c.476-.275.641-.89.365-1.366l-2-3.46a1 1 0 0 0-1.366-.365l-1.396.806A8.034 8.034 0 0 0 15 4.598V3a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v1.598A8.094 8.094 0 0 0 7.105 5.71L5.71 4.904a.999.999 0 0 0-1.366.365l-2 3.46a1.004 1.004 0 0 0 .365 1.366l1.372.793a7.683 7.683 0 0 0 0 2.224l-1.372.793c-.476.275-.641.89-.365 1.366zM12 8c2.206 0 4 1.794 4 4s-1.794 4-4 4-4-1.794-4-4 1.794-4 4-4z"></path></svg>
                            <div class="dropdown-menu" aria-labelledby="btndefault1">
                                <a href="javascript:void(0);" class="dropdown-item"><i class="flaticon-home-fill-1 mr-1"></i>Edit</a>
                                <a href="javascript:void(0);" class="dropdown-item"><i class="flaticon-gear-fill mr-1"></i>ACC</a>
                                <a href="javascript:void(0);" class="dropdown-item"><i class="flaticon-bell-fill-2 mr-1"></i>Batal</a>
                            </div>
                            </div>
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
                        <td>
                            <div class="btn-group  mb-2 me-4" role="group">
                            <button title="Aksi" id="btndefault2" type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="m2.344 15.271 2 3.46a1 1 0 0 0 1.366.365l1.396-.806c.58.457 1.221.832 1.895 1.112V21a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1v-1.598a8.094 8.094 0 0 0 1.895-1.112l1.396.806c.477.275 1.091.11 1.366-.365l2-3.46a1.004 1.004 0 0 0-.365-1.366l-1.372-.793a7.683 7.683 0 0 0-.002-2.224l1.372-.793c.476-.275.641-.89.365-1.366l-2-3.46a1 1 0 0 0-1.366-.365l-1.396.806A8.034 8.034 0 0 0 15 4.598V3a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v1.598A8.094 8.094 0 0 0 7.105 5.71L5.71 4.904a.999.999 0 0 0-1.366.365l-2 3.46a1.004 1.004 0 0 0 .365 1.366l1.372.793a7.683 7.683 0 0 0 0 2.224l-1.372.793c-.476.275-.641.89-.365 1.366zM12 8c2.206 0 4 1.794 4 4s-1.794 4-4 4-4-1.794-4-4 1.794-4 4-4z"></path></svg>
                            <div class="dropdown-menu" aria-labelledby="btndefault2">
                                <a href="javascript:void(0);" class="dropdown-item"><i class="flaticon-home-fill-1 mr-1"></i>Edit</a>
                                <a href="javascript:void(0);" class="dropdown-item"><i class="flaticon-gear-fill mr-1"></i>ACC</a>
                                <a href="javascript:void(0);" class="dropdown-item"><i class="flaticon-bell-fill-2 mr-1"></i>Batal</a>
                            </div>
                            </div>
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
<div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-chart-two">
        <div class="widget-content">
            <p class="text-center"><b>Harian</b></p>
            <table id="harianjob" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th width="8%">No</th>
                        <th>Kantor</th>
                        <th>Ruangan</th>
                        <th>Foto Sebelum</th>
                        <th>Proses</th>
                        <th>Foto Sesudah</th>
                        <th>Aksi</th>
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
                        <td>
                            <div class="btn-group  mb-2 me-4" role="group">
                            <button title="Aksi" id="btndefault3" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="m2.344 15.271 2 3.46a1 1 0 0 0 1.366.365l1.396-.806c.58.457 1.221.832 1.895 1.112V21a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1v-1.598a8.094 8.094 0 0 0 1.895-1.112l1.396.806c.477.275 1.091.11 1.366-.365l2-3.46a1.004 1.004 0 0 0-.365-1.366l-1.372-.793a7.683 7.683 0 0 0-.002-2.224l1.372-.793c.476-.275.641-.89.365-1.366l-2-3.46a1 1 0 0 0-1.366-.365l-1.396.806A8.034 8.034 0 0 0 15 4.598V3a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v1.598A8.094 8.094 0 0 0 7.105 5.71L5.71 4.904a.999.999 0 0 0-1.366.365l-2 3.46a1.004 1.004 0 0 0 .365 1.366l1.372.793a7.683 7.683 0 0 0 0 2.224l-1.372.793c-.476.275-.641.89-.365 1.366zM12 8c2.206 0 4 1.794 4 4s-1.794 4-4 4-4-1.794-4-4 1.794-4 4-4z"></path></svg>
                            <div class="dropdown-menu" aria-labelledby="btndefault3">
                                <a href="javascript:void(0);" class="dropdown-item"><i class="flaticon-home-fill-1 mr-1"></i>Edit</a>
                                <a href="javascript:void(0);" class="dropdown-item"><i class="flaticon-gear-fill mr-1"></i>ACC</a>
                                <a href="javascript:void(0);" class="dropdown-item"><i class="flaticon-bell-fill-2 mr-1"></i>Batal</a>
                            </div>
                            </div>
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
                        <td>
                            <div class="btn-group  mb-2 me-4" role="group">
                            <button title="Aksi" id="btndefault4" type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="m2.344 15.271 2 3.46a1 1 0 0 0 1.366.365l1.396-.806c.58.457 1.221.832 1.895 1.112V21a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1v-1.598a8.094 8.094 0 0 0 1.895-1.112l1.396.806c.477.275 1.091.11 1.366-.365l2-3.46a1.004 1.004 0 0 0-.365-1.366l-1.372-.793a7.683 7.683 0 0 0-.002-2.224l1.372-.793c.476-.275.641-.89.365-1.366l-2-3.46a1 1 0 0 0-1.366-.365l-1.396.806A8.034 8.034 0 0 0 15 4.598V3a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v1.598A8.094 8.094 0 0 0 7.105 5.71L5.71 4.904a.999.999 0 0 0-1.366.365l-2 3.46a1.004 1.004 0 0 0 .365 1.366l1.372.793a7.683 7.683 0 0 0 0 2.224l-1.372.793c-.476.275-.641.89-.365 1.366zM12 8c2.206 0 4 1.794 4 4s-1.794 4-4 4-4-1.794-4-4 1.794-4 4-4z"></path></svg>
                            <div class="dropdown-menu" aria-labelledby="btndefault4">
                                <a href="javascript:void(0);" class="dropdown-item"><i class="flaticon-home-fill-1 mr-1"></i>Edit</a>
                                <a href="javascript:void(0);" class="dropdown-item"><i class="flaticon-gear-fill mr-1"></i>ACC</a>
                                <a href="javascript:void(0);" class="dropdown-item"><i class="flaticon-bell-fill-2 mr-1"></i>Batal</a>
                            </div>
                            </div>
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
<div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-chart-two">
        <div class="widget-content">
            <p class="text-center"><b>Mingguan</b></p>
            <table id="mingguanjob" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th width="8%">No</th>
                        <th>Kantor</th>
                        <th>Ruangan</th>
                        <th>Foto Sebelum</th>
                        <th>Proses</th>
                        <th>Foto Sesudah</th>
                        <th>Aksi</th>
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
                        <td>
                            <div class="btn-group  mb-2 me-4" role="group">
                            <button title="Aksi" id="btndefault5" type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="m2.344 15.271 2 3.46a1 1 0 0 0 1.366.365l1.396-.806c.58.457 1.221.832 1.895 1.112V21a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1v-1.598a8.094 8.094 0 0 0 1.895-1.112l1.396.806c.477.275 1.091.11 1.366-.365l2-3.46a1.004 1.004 0 0 0-.365-1.366l-1.372-.793a7.683 7.683 0 0 0-.002-2.224l1.372-.793c.476-.275.641-.89.365-1.366l-2-3.46a1 1 0 0 0-1.366-.365l-1.396.806A8.034 8.034 0 0 0 15 4.598V3a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v1.598A8.094 8.094 0 0 0 7.105 5.71L5.71 4.904a.999.999 0 0 0-1.366.365l-2 3.46a1.004 1.004 0 0 0 .365 1.366l1.372.793a7.683 7.683 0 0 0 0 2.224l-1.372.793c-.476.275-.641.89-.365 1.366zM12 8c2.206 0 4 1.794 4 4s-1.794 4-4 4-4-1.794-4-4 1.794-4 4-4z"></path></svg>
                            <div class="dropdown-menu" aria-labelledby="btndefault5">
                                <a href="javascript:void(0);" class="dropdown-item"><i class="flaticon-home-fill-1 mr-1"></i>Edit</a>
                                <a href="javascript:void(0);" class="dropdown-item"><i class="flaticon-gear-fill mr-1"></i>ACC</a>
                                <a href="javascript:void(0);" class="dropdown-item"><i class="flaticon-bell-fill-2 mr-1"></i>Batal</a>
                            </div>
                            </div>
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
                        <td>
                            <div class="btn-group  mb-2 me-4" role="group">
                            <button title="Aksi" id="btndefault6" type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="m2.344 15.271 2 3.46a1 1 0 0 0 1.366.365l1.396-.806c.58.457 1.221.832 1.895 1.112V21a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1v-1.598a8.094 8.094 0 0 0 1.895-1.112l1.396.806c.477.275 1.091.11 1.366-.365l2-3.46a1.004 1.004 0 0 0-.365-1.366l-1.372-.793a7.683 7.683 0 0 0-.002-2.224l1.372-.793c.476-.275.641-.89.365-1.366l-2-3.46a1 1 0 0 0-1.366-.365l-1.396.806A8.034 8.034 0 0 0 15 4.598V3a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v1.598A8.094 8.094 0 0 0 7.105 5.71L5.71 4.904a.999.999 0 0 0-1.366.365l-2 3.46a1.004 1.004 0 0 0 .365 1.366l1.372.793a7.683 7.683 0 0 0 0 2.224l-1.372.793c-.476.275-.641.89-.365 1.366zM12 8c2.206 0 4 1.794 4 4s-1.794 4-4 4-4-1.794-4-4 1.794-4 4-4z"></path></svg>
                            <div class="dropdown-menu" aria-labelledby="btndefault6">
                                <a href="javascript:void(0);" class="dropdown-item"><i class="flaticon-home-fill-1 mr-1"></i>Edit</a>
                                <a href="javascript:void(0);" class="dropdown-item"><i class="flaticon-gear-fill mr-1"></i>ACC</a>
                                <a href="javascript:void(0);" class="dropdown-item"><i class="flaticon-bell-fill-2 mr-1"></i>Batal</a>
                            </div>
                            </div>
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
<div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-chart-two">
        <div class="widget-content">
            <p class="text-center"><b>Bulanan</b></p>
            <table id="bulananjob" class="table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th width="8%">No</th>
                        <th>Kantor</th>
                        <th>Ruangan</th>
                        <th>Foto Sebelum</th>
                        <th>Proses</th>
                        <th>Foto Sesudah</th>
                        <th>Aksi</th>
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
                        <td>
                            <div class="btn-group  mb-2 me-4" role="group">
                            <button title="Aksi" id="btndefault7" type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="m2.344 15.271 2 3.46a1 1 0 0 0 1.366.365l1.396-.806c.58.457 1.221.832 1.895 1.112V21a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1v-1.598a8.094 8.094 0 0 0 1.895-1.112l1.396.806c.477.275 1.091.11 1.366-.365l2-3.46a1.004 1.004 0 0 0-.365-1.366l-1.372-.793a7.683 7.683 0 0 0-.002-2.224l1.372-.793c.476-.275.641-.89.365-1.366l-2-3.46a1 1 0 0 0-1.366-.365l-1.396.806A8.034 8.034 0 0 0 15 4.598V3a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v1.598A8.094 8.094 0 0 0 7.105 5.71L5.71 4.904a.999.999 0 0 0-1.366.365l-2 3.46a1.004 1.004 0 0 0 .365 1.366l1.372.793a7.683 7.683 0 0 0 0 2.224l-1.372.793c-.476.275-.641.89-.365 1.366zM12 8c2.206 0 4 1.794 4 4s-1.794 4-4 4-4-1.794-4-4 1.794-4 4-4z"></path></svg>
                            <div class="dropdown-menu" aria-labelledby="btndefault7">
                                <a href="javascript:void(0);" class="dropdown-item"><i class="flaticon-home-fill-1 mr-1"></i>Edit</a>
                                <a href="javascript:void(0);" class="dropdown-item"><i class="flaticon-gear-fill mr-1"></i>ACC</a>
                                <a href="javascript:void(0);" class="dropdown-item"><i class="flaticon-bell-fill-2 mr-1"></i>Batal</a>
                            </div>
                            </div>
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
                        <td>
                            <div class="btn-group  mb-2 me-4" role="group">
                            <button title="Aksi" id="btndefault8" type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="m2.344 15.271 2 3.46a1 1 0 0 0 1.366.365l1.396-.806c.58.457 1.221.832 1.895 1.112V21a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1v-1.598a8.094 8.094 0 0 0 1.895-1.112l1.396.806c.477.275 1.091.11 1.366-.365l2-3.46a1.004 1.004 0 0 0-.365-1.366l-1.372-.793a7.683 7.683 0 0 0-.002-2.224l1.372-.793c.476-.275.641-.89.365-1.366l-2-3.46a1 1 0 0 0-1.366-.365l-1.396.806A8.034 8.034 0 0 0 15 4.598V3a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v1.598A8.094 8.094 0 0 0 7.105 5.71L5.71 4.904a.999.999 0 0 0-1.366.365l-2 3.46a1.004 1.004 0 0 0 .365 1.366l1.372.793a7.683 7.683 0 0 0 0 2.224l-1.372.793c-.476.275-.641.89-.365 1.366zM12 8c2.206 0 4 1.794 4 4s-1.794 4-4 4-4-1.794-4-4 1.794-4 4-4z"></path></svg>
                            <div class="dropdown-menu" aria-labelledby="btndefault8">
                                <a href="javascript:void(0);" class="dropdown-item"><i class="flaticon-home-fill-1 mr-1"></i>Edit</a>
                                <a href="javascript:void(0);" class="dropdown-item"><i class="flaticon-gear-fill mr-1"></i>ACC</a>
                                <a href="javascript:void(0);" class="dropdown-item"><i class="flaticon-bell-fill-2 mr-1"></i>Batal</a>
                            </div>
                            </div>
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

    var map = L.map('map').setView([ -7.000433527639624, 110.33436565215736], 13);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    L.marker([-7.000433527639624, 110.33436565215736]).addTo(map)
        .bindPopup('A pretty CSS popup.<br> Easily customizable.')
        .openPopup();
</script>

@endsection