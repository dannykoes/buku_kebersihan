<div class="widget widget-chart-two">
    <div class="widget-content">
        <div class="row p-3">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <button class="btn btn-primary btn-sm" id="add" onclick="addpegawai()" title="Tambah">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm5 11h-4v4h-2v-4H7v-2h4V7h2v4h4v2z"></path></svg>
                </button>
                <div class="table-repsonsive">
                    <table id="masterpegawai" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nip</th>
                                <th>Nama</th>
                                <th>Kantor</th>
                                <th>Jabatan</th>
                                <th>Tanggal Bergabung</th>
                                <th>Tanggal Selesai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pegawai as $key => $val)
                            <tr>
                                <td width="1%">{{$key + 1}}</td>
                                <td>{{$val->nip}}</td>
                                <td>{{$val->name}}</td>
                                <td>
                                    @foreach($val->kantor as $key => $v)
                                        <p class="badge badge-info">{{$v->nama}}</p>
                                    @endforeach
                                </td>
                                <td>{{$val->nama}}</td>
                                <td>{{\Carbon\Carbon::parse($val->tgl_bergabung)->format('d-m-Y')}}</td>
                                <td>{{\Carbon\Carbon::parse($val->tgl_selesai)->format('d-m-Y')}}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" id="edit" onclick="addpegawai({{ $val }})" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);">
                                            <path d="m16 2.012 3 3L16.713 7.3l-3-3zM4 14v3h3l8.299-8.287-3-3zm0 6h16v2H4z"></path>
                                        </svg></button>
                                    <button onclick="deletedata('{{ 'ajabatan/'.$val->user_id }}')" class="btn btn-danger" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);">
                                            <path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z">
                                            </path>
                                            <path d="M9 10h2v8H9zm4 0h2v8h-2z"></path>
                                        </svg></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <ul class="nav nav-tabs  mb-3 mt-3" id="simpletab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link text-uppercase @if (Session::get('subtab')==0) active @endif" id="sub-jabatan-tab" data-toggle="tab" href="#sub-jabatan" role="tab" aria-controls="sub-jabatan" aria-selected="true">jabatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase @if (Session::get('subtab')==1) active @endif" id="sub-pegawai-tab" data-toggle="tab" href="#sub-pegawai" role="tab" aria-controls="sub-pegawai" aria-selected="false">pegawai</a>
                    </li>
                </ul>
                <div class="tab-content" id="simpletabContent">
                    <div class="tab-pane fade @if (Session::get('subtab')==0) show active @endif" id="sub-jabatan" role="tabpanel" aria-labelledby="sub-jabatan-tab">
                        <button class="btn btn-primary btn-sm" id="add" onclick="addrole()" title="Tambah">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm5 11h-4v4h-2v-4H7v-2h4V7h2v4h4v2z"></path></svg>
                        </button>
                        <div class="table-repsonsive">
                            <table id="masterjabatan" class="table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Urutan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($jabatan as $key => $val)
                                    <tr>
                                        <td width="1%">{{$key + 1}}</td>
                                        <td>{{$val->nama}}</td>
                                        <td>{{$val->urutan}}</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" id="edit" onclick="addrole({{ $val }})" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);">
                                                    <path d="m16 2.012 3 3L16.713 7.3l-3-3zM4 14v3h3l8.299-8.287-3-3zm0 6h16v2H4z"></path>
                                                </svg></button>
                                            <button onclick="deletedata('{{ 'arole/'.$val->id }}')" class="btn btn-danger" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);">
                                                    <path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z">
                                                    </path>
                                                    <path d="M9 10h2v8H9zm4 0h2v8h-2z"></path>
                                                </svg></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade @if (Session::get('subtab')==1) show active @endif" id="sub-pegawai" role="tabpanel" aria-labelledby="sub-pegawai-tab">
                        
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 layout-spacing">
            </div> --}}
        </div>
        <!-- Modal Jabatan -->
        <div class="modal fade" id="modalrole" role="dialog" aria-labelledby="modalroleLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalroleLabel">Jabatan</h5>
                        <button type="button" class="btn btn-secondary" onclick="closemodal('#modalrole')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="arole" method="POST">
                            @csrf
                            <input type="text" name="roleid" id="roleid" hidden>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="" class="text-uppercase">nama</label>
                                        <input type="text" name="rolenama" id="rolenama" class="form-control" required>
                                    </div>
                                    @error('rolenama')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="" class="text-uppercase">urutan</label>
                                        <input type="number" name="roleurutan" id="roleurutan" class="form-control" required>
                                    </div>
                                    @error('roleurutan')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm mt-2">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Pegawai -->
        <div class="modal fade" id="modalpegawai" role="dialog" aria-labelledby="modalpegawaiLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalpegawaiLabel">Pegawai</h5>
                        <button type="button" class="btn btn-secondary" onclick="closemodal('#modalpegawai')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="ajabatan" method="POST">
                            @csrf
                            <input type="text" name="pegawaiaaa" id="pegawaiaaa" hidden>
                            <input type="text" name="pegawaiuserid" id="pegawaiuserid" hidden>
                            <input type="text" name="pegawaiid" id="pegawaiid" hidden>
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="" class="text-uppercase">nip</label>
                                        <input type="text" name="pegawainip" id="pegawainip" class="form-control" required>
                                    </div>
                                    @error('pegawainip')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="" class="text-uppercase">nama</label>
                                        <input type="text" name="pegawainama" id="pegawainama" class="form-control" required>
                                    </div>
                                    @error('pegawainama')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="" class="text-uppercase">password</label>
                                        <input type="text" name="pegawaipassword" id="pegawaipassword" class="form-control">
                                    </div>
                                    @error('pegawaipassword')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-group m-0">
                                        <label for="" class="text-uppercase" >jabatan</label>
                                        <select name="pegawaitype" id="pegawaitype" class="form-control" onchange="changepegawaitype()">
                                            <option value="">Pilih</option>
                                            <option value="1">Administrator</option>
                                            <option value="2">Direksi</option>
                                            <option value="3">Kepala Cabang</option>
                                            <option value="4">User</option>
                                            <option value="5">Kepala Supervisor</option>
                                            <option value="6">Supervisor</option>
                                            <option value="7">Pegawai</option>
                                            {{-- @foreach($jabatan as $key => $value)
                                                <option value="{{$value->id}}">{{$value->nama}}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                    @error('pegawaitype')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12" id="pegkantor">
                                    <div class="form-group m-0">
                                        <label for="" class="text-uppercase">kantor</label>
                                        <select name="pegawaikantor[]" id="pegawaikantor" class="form-control" multiple>
                                            @foreach($kantor as $key => $value)
                                                <option value="{{$value->id}}">{{$value->pic}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('pegawaikantor')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12" id="pegspv">
                                    <div class="form-group m-0">
                                        <label for="" class="text-uppercase" id="spvtitle">spv</label>
                                        <select name="pegawaispv" id="pegawaispv" class="form-control">
                                            {{-- <option value="">Pilih</option>
                                            @foreach($pegawai as $key => $value)
                                                <option value="{{$value->user_id}}">{{$value->name}}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                    @error('pegawaispv')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12" hidden>
                                    <div class="form-group m-0">
                                        <label for="" class="text-uppercase">pic</label>
                                        <select name="pegawaipic" id="pegawaipic" class="form-control">
                                            <option value="">Pilih</option>
                                            @foreach($pegawai as $key => $value)
                                                <option value="{{$value->user_id}}">{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('pegawaipic')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-group m-0">
                                        <label for="" class="text-uppercase">tgl bergabung</label>
                                        <input type="date" name="pegawaitglbergabung" id="pegawaitglbergabung" class="form-control" />
                                    </div>
                                    @error('pegawaitglbergabung')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                    <div class="form-group m-0">
                                        <label for="" class="text-uppercase">tgl selesai</label>
                                        <input type="date" name="pegawaitglselesai" id="pegawaitglselesai" class="form-control" />
                                    </div>
                                    @error('pegawaitglselesai')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <fieldset style="border: 1px solid #bfc9d4; color: #3b3f5c; font-size: 15px; border-radius: 6px; padding: 0.75rem">
                                        <label>Status</label>
                                        <div class="n-chk">
                                            <label class="new-control new-checkbox new-checkbox-rounded checkbox-outline-primary">
                                                <input type="radio" name="pegawaistatus[]" value="1" id="pegawaistatusactive" class="new-control-input">
                                                <span class="new-control-indicator"></span>Active
                                            </label>
                                            <label class="new-control new-checkbox new-checkbox-rounded checkbox-outline-primary">
                                                <input type="radio" name="pegawaistatus[]" value="0" id="pegawaistatusdeactive" class="new-control-input">
                                                <span class="new-control-indicator"></span>Non-Active
                                            </label>
                                        </div>
                                    </fieldset>
                            </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm mt-2">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>