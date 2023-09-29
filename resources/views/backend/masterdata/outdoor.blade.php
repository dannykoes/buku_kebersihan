<div class="widget widget-chart-two">
    <div class="widget-content">
        <div class="row p-3">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <button class="btn btn-primary btn-sm" id="add" onclick="addoutdoor()" title="Tambah">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
                        <path
                            d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm5 11h-4v4h-2v-4H7v-2h4V7h2v4h4v2z">
                        </path>
                    </svg>
                </button>
                <div class="table-repsonsive">
                    <table id="masteroutdoor" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kantor</th>
                                <th>Gedung</th>
                                <th>Lantai</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($outdoor as $key => $val)
                            <tr>
                                <td width="1%">{{$key + 1}}</td>
                                <td>{{$val->pic}}</td>
                                <td>{{$val->gedung}}</td>
                                <td>{{$val->lantai}}</td>
                                <td>{{$val->outdoor}}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" id="edit" onclick="addoutdoor({{ $val }})"
                                        title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);">
                                            <path
                                                d="m16 2.012 3 3L16.713 7.3l-3-3zM4 14v3h3l8.299-8.287-3-3zm0 6h16v2H4z">
                                            </path>
                                        </svg></button>
                                    <button onclick="deletedata('{{ 'aoutdoor/'.$val->id }}')" class="btn btn-danger"
                                        title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);">
                                            <path
                                                d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z">
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
        <div class="modal fade" id="modaloutdoor" role="dialog" aria-labelledby="modaloutdoorLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-capitalize" id="modaloutdoorLabel">item outdoor</h5>
                        <button type="button" class="btn btn-secondary" onclick="closemodal('#modaloutdoor')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
                                <path
                                    d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="aoutdoor" method="POST">
                            @csrf
                            <input type="text" name="outdoorid" id="outdoorid" hidden>
                            <input type="text" name="outdoorkantor" id="outdoorkantor" hidden>
                            <input type="text" name="outdoorgedung" id="outdoorgedung" hidden>
                            <input type="text" name="outdoorlantai" id="outdoorlantai" hidden>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group m-0">
                                        <label for="" class="text-uppercase">Kantor</label>
                                        <select name="outdoorkantorid" id="outdoorkantorid" class="form-control"
                                            onchange="changekantor('#outdoorgedungid','#outdoorkantorid','#outdoorkantor')">
                                            <option value="">Pilih</option>
                                            @foreach($kantor as $key => $value)
                                            <option value="{{$value->id}}">{{$value->nama.' - '.$value->pic}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('outdoornama')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group m-0">
                                        <label for="" class="text-uppercase">Gedung</label>
                                        <select name="outdoorgedungid" id="outdoorgedungid" class="form-control"
                                            onchange="changegedung('#outdoorlantaiid','#outdoorgedungid','#outdoorkantorid','#outdoorlantai')">
                                            <option value="">Pilih</option>
                                            {{-- @foreach($gedung as $key => $value)
                                            <option value="{{$value->id}}">{{$value->nama.' - '.$value->pic}}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                    @error('outdoorgedungid')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group m-0">
                                        <label for="" class="text-uppercase">lantai</label>
                                        <select name="outdoorlantaiid" id="outdoorlantaiid" class="form-control">
                                            <option value="">Pilih</option>
                                            {{-- @foreach($lantai as $key => $value)
                                            <option value="{{$value->id}}">{{$value->nama.' - '.$value->pic}}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                    @error('outdoorlantaiid')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="" class="text-uppercase">nama</label>
                                        <input type="text" name="outdoornama" id="outdoornama" class="form-control"
                                            required>
                                    </div>
                                    @error('outdoornama')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        </form>
                    </div>
                    {{-- <div class="modal-footer"> --}}
                        {{-- <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                            Discard</button> --}}
                        {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>