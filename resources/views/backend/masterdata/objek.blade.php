<div class="widget widget-chart-two">
    <div class="widget-content">
        <div class="row p-3">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <button class="btn btn-primary btn-sm" id="add" onclick="addobjek()" title="Tambah">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm5 11h-4v4h-2v-4H7v-2h4V7h2v4h4v2z"></path></svg>
                </button>
                <div class="table-repsonsive">
                    <table id="masterobjek" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kantor</th>
                                <th>Gedung</th>
                                <th>Lantai</th>
                                <th>Ruangan</th>
                                <th>Kategori</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($objek as $key => $val)
                            <tr>
                                <td width="1%">{{$key + 1}}</td>
                                <td>
                                    @if($val->kantor)
                                        @foreach($val->kantor as $key => $v)
                                            <span class="badge badge-info">{{$v->pic}}</span>
                                        @endforeach
                                    @else
                                        <span class="badge badge-info">Silahkan Update</span>
                                    @endif
                                    {{$val->pic}}
                                </td>
                                <td>{{$val->gedung}}</td>
                                <td>{{$val->lantai}}</td>
                                <td>{{$val->ruangan}}</td>
                                <td>{{$val->namakategori}}</td>
                                <td>
                                    @if($val->pekerjaan)
                                    <?php $nomor = 2; ?>
                                    @foreach($val->pekerjaan as $key => $v)
                                    <span class="badge badge-info">
                                        {{$v->nama}}
                                    </span>
                                    @if($nomor == $key)
                                        <br>
                                        <?php $nomor+=3; ?>
                                    @endif
                                    @endforeach
                                    @else
                                        <span class="badge badge-info">Silahkan Update</span>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-warning btn-sm" id="edit" onclick="addobjek({{ $val }})" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);">
                                            <path d="m16 2.012 3 3L16.713 7.3l-3-3zM4 14v3h3l8.299-8.287-3-3zm0 6h16v2H4z"></path>
                                        </svg></button>
                                    <button onclick="deletedata('{{ 'aobjek/'.$val->id }}')" class="btn btn-danger" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);">
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
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="modalobjek" role="dialog" aria-labelledby="modalobjekLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalobjekLabel">Objek Pekerjaan</h5>
                        <button type="button" class="btn btn-secondary" onclick="closemodal('#modalobjek')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="aobjek" method="POST">
                            @csrf
                            <input type="text" name="objekid" id="objekid" hidden>
                            <input type="text" name="objekkantor" id="objekkantor" hidden>
                            <input type="text" name="objekgedung" id="objekgedung" hidden>
                            <input type="text" name="objeklantai" id="objeklantai" hidden>
                            <input type="text" name="objekruangan" id="objekruangan" hidden>
                            <div class="row mb-2">
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="form-group m-0">
                                        <label for="" class="text-uppercase">Kantor</label>
                                        <select name="objekkantorid[]" id="objekkantorid" class="form-control" onchange="changekantor('#objekgedungid','#objekkantorid','#objekkantor')" multiple>
                                            @foreach($kantor as $key => $value)
                                                <option value="{{$value->id}}">{{$value->nama.' - '.$value->pic}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('objeknama')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="form-group m-0">
                                        <label for="" class="text-uppercase">Gedung</label>
                                        <select name="objekgedungid" id="objekgedungid" class="form-control" onchange="changegedung('#objeklantaiid','#objekgedungid','#objekkantorid','#objeklantai')">
                                            <option value="">Pilih</option>
                                        </select>
                                    </div>
                                    @error('objekgedungid')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="form-group m-0">
                                        <label for="" class="text-uppercase">lantai</label>
                                        <select name="objeklantaiid" id="objeklantaiid" class="form-control" onchange="changelantai('#objekruanganid','#objeklantaiid','#objekgedungid','#objekkantorid','#objekruangan')">
                                            <option value="">Pilih</option>
                                        </select>
                                    </div>
                                    @error('objeklantaiid')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="form-group m-0">
                                        <label for="" class="text-uppercase">ruangan</label>
                                        <select name="objekruanganid" id="objekruanganid" class="form-control">
                                            <option value="">Pilih</option>
                                        </select>
                                    </div>
                                    @error('objekruanganid')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="form-group m-0">
                                        <label for="" class="text-uppercase">object pekerjaan ( cleaning )</label>
                                        <select name="objekpekerjaan[]" id="objekpekerjaan" class="form-control" multiple>
                                            <option value="">Pilih</option>
                                            @foreach($pekerjaan as $key => $v)
                                            <option value="{{$v->id}}">{{$v->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('objekpekerjaan')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                {{-- <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="" class="text-uppercase">object pekerjaan ( cleaning )</label>
                                        <input type="text" name="objeknama" id="objeknama" class="form-control" required>
                                    </div>
                                    @error('objeknama')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div> --}}
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <fieldset style="border: 1px solid #bfc9d4; color: #3b3f5c; font-size: 15px; border-radius: 6px; padding: 0.75rem">
                                            <label>Kategori Kebersihan</label>
                                            <div class="n-chk">
                                                <label class="new-control new-checkbox new-checkbox-rounded checkbox-outline-primary">
                                                    <input type="radio" name="harian[]" value="1" id="harian" class="new-control-input">
                                                    <span class="new-control-indicator"></span>Harian
                                                </label>
                                                <label class="new-control new-checkbox new-checkbox-rounded checkbox-outline-primary">
                                                    <input type="radio" name="harian[]" value="2" id="mingguan" class="new-control-input">
                                                    <span class="new-control-indicator"></span>Mingguan
                                                </label>
                                                <label class="new-control new-checkbox new-checkbox-rounded checkbox-outline-primary">
                                                    <input type="radio" name="harian[]" value="3" id="bulanan" class="new-control-input">
                                                    <span class="new-control-indicator"></span>Bulanan
                                                </label>
                                            </div>
                                        </fieldset>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        </form>
                    </div>
                    {{-- <div class="modal-footer"> --}}
                        {{-- <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button> --}}
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>