<div class="widget widget-chart-two">
    <div class="widget-content">
        <div class="row p-3">
            <div class="col-lg-12">
                <form action="/simpanpembagian" method="post">
                    @csrf
                    <div class="row mb-1">
                        <div class="col-lg-12">
                            <label for="form-control">Pengguna</label>
                            <select name="pengguna" id="pgn" class="form-control">
                                <option value="">Pilih salah satu</option>
                                @foreach($userptg as $key => $val)
                                <option value="{{$val->id}}">{{$val->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-lg-4">
                            <label for="form-control">Tugas harian</label>
                            <input type="hidden" name="idpbgn" id="idpbgn" value="{{old('idpbgn')}}">
                            <select class="form-control basic" name="tugas_harian[]" id="tugasharian" multiple>
                                @foreach ($tugas as $tt => $value)
                                <option value="{{$value->id}}" {{old('tugas_harian')==$value->id?'selected':''}}>{{$value->nama_tugas}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="form-control">Tugas mingguan</label>
                            <select class="form-control basics" name="tugas_mingguan[]" id="tugasmingguan" multiple>
                                @foreach ($tugas as $tt => $value)
                                <option value="{{$value->id}}" {{old('tugas_mingguan')==$value->id?'selected':''}}>{{$value->nama_tugas}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="form-control">Tugas bulanan</label>
                            <select class="form-control basicdsd" name="tugas_bulanan[]" id="tugasbulanan" multiple>
                                @foreach ($tugas as $tt => $value)
                                <option value="{{$value->id}}" {{old('tugas_bulanan')==$value->id?'selected':''}}>{{$value->nama_tugas}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary btn-sm m-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);">
                                    <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm5 11h-4v4h-2v-4H7v-2h4V7h2v4h4v2z">
                                    </path>
                                </svg> Simpan</button>
                            <span class="btn btn-warning btn-sm m-2" onclick="resetclientpembagian()"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);">
                                    <path d="M10 11H7.101l.001-.009a4.956 4.956 0 0 1 .752-1.787 5.054 5.054 0 0 1 2.2-1.811c.302-.128.617-.226.938-.291a5.078 5.078 0 0 1 2.018 0 4.978 4.978 0 0 1 2.525 1.361l1.416-1.412a7.036 7.036 0 0 0-2.224-1.501 6.921 6.921 0 0 0-1.315-.408 7.079 7.079 0 0 0-2.819 0 6.94 6.94 0 0 0-1.316.409 7.04 7.04 0 0 0-3.08 2.534 6.978 6.978 0 0 0-1.054 2.505c-.028.135-.043.273-.063.41H2l4 4 4-4zm4 2h2.899l-.001.008a4.976 4.976 0 0 1-2.103 3.138 4.943 4.943 0 0 1-1.787.752 5.073 5.073 0 0 1-2.017 0 4.956 4.956 0 0 1-1.787-.752 5.072 5.072 0 0 1-.74-.61L7.05 16.95a7.032 7.032 0 0 0 2.225 1.5c.424.18.867.317 1.315.408a7.07 7.07 0 0 0 2.818 0 7.031 7.031 0 0 0 4.395-2.945 6.974 6.974 0 0 0 1.053-2.503c.027-.135.043-.273.063-.41H22l-4-4-4 4z">
                                    </path>
                                </svg> Reset</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row p-3">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-hover" id="tablepgn">
                        <thead>
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Petugas</th>
                                <th colspan="3" class="text-center">Job time</th>
                                <th rowspan="2">Aksi</th>
                            </tr>
                            <tr>
                                <th>Tugas harian</th>
                                <th>Tugas minggu</th>
                                <th>Tugas bulanan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pgntgs as $key => $value)
                            <tr>
                                <td width="1%">{{$key + 1}}</td>
                                <td>{{$value->name}}</td>
                                <td>
                                    @foreach($value->jobharian as $ky => $v)
                                    <li>{{$v->nama_tugas}}</li>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($value->jobmingguan as $ksy => $vs)
                                    <li>{{$vs->nama_tugas}}</li>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($value->jobbulanan as $kay => $va)
                                    <li>{{$va->nama_tugas}}</li>
                                    @endforeach
                                </td>
                                <td>
                                    <button class="btn btn-warning" id="edit" onclick="editpembagianjob({{ $value }})" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;">
                                            <path d="m16 2.012 3 3L16.713 7.3l-3-3zM4 14v3h3l8.299-8.287-3-3zm0 6h16v2H4z"></path>
                                        </svg></button>
                                    <button class="btn btn-danger" onclick="deletedata('{{ 'hapuspembagianjob/'.$value->id }}')" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;">
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
        </div>
    </div>
</div>