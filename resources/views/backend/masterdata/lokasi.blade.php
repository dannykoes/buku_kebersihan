<div class="widget widget-chart-two">
    <div class="widget-content">
        <div class="row p-3">
            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="" id="map" style="height: 450px; border-radius:20px"></div>
            </div>
            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <form action="alokasi" method="POST">
                    @csrf
                <input type="text" name="lokasiid" id="lokasiid" hidden>
                <input type="text" name="lokasigedung" id="lokasigedung" hidden>
                <div class="form-group m-0">
                    <label for="" class="text-uppercase">Kantor</label>
                    <select name="lokasikantorid" id="lokasikantorid" class="form-control" required onchange="changekantor('#lokasigedungid','#lokasikantorid','#lokasigedung')">
                        <option value="">Pilih</option>
                        @foreach($kantor as $key => $value)
                            <option value="{{$value->id}}">{{$value->pic}}</option>
                        @endforeach
                    </select>
                    @error('lokasikantorid')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group m-0">
                    <label for="" class="text-uppercase">Gedung</label>
                    <select name="lokasigedungid" id="lokasigedungid" class="form-control" required>
                        <option value="">Pilih</option>
                    </select>
                    @error('lokasigedungid')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group" hidden>
                    <label for="" class="text-uppercase">latitude</label>
                    <input type="text" name="lokasilat" id="lokasilat" class="form-control" required>
                    @error('lokasilat')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group" hidden>
                    <label for="" class="text-uppercase">longitude</label>
                    <input type="text" name="lokasilong" id="lokasilong" class="form-control" required>
                    @error('lokasilong')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="" class="text-uppercase">nama</label>
                    <input type="text" name="lokasinama" id="lokasinama" class="form-control" required>
                    @error('lokasinama')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
                <span class="btn btn-danger btn-sm" id="btndeletelokasi" onclick="deletedata()">Delete</span>
                <span class="btn btn-warning btn-sm" onclick="resetlokasi()">Reset</span>
                </form>
            </div>
        </div>
        <!-- Modal -->
        {{-- <div class="modal fade" id="modallokasi" role="dialog" aria-labelledby="modallokasiLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modallokasiLabel">lokasi</h5>
                        <button type="button" class="btn btn-secondary" onclick="closemodal('#modallokasi')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="alokasi" method="POST">
                            @csrf
                            <input type="text" name="lokasiid" id="lokasiid" hidden>
                            <input type="text" name="lokasigedung" id="lokasigedung" hidden>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group m-0">
                                        <label for="" class="text-uppercase">Kantor</label>
                                        <select name="lokasikantorid" id="lokasikantorid" class="form-control" onchange="changekantor('#lokasigedungid','#lokasikantorid','#lokasigedung')">
                                            <option value="">Pilih</option>
                                            @foreach($kantor as $key => $value)
                                                <option value="{{$value->id}}">{{$value->nama.' - '.$value->pic}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('lokasinama')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group m-0">
                                        <label for="" class="text-uppercase">Gedung</label>
                                        <select name="lokasigedungid" id="lokasigedungid" class="form-control">
                                            <option value="">Pilih</option>
                                        </select>
                                    </div>
                                    @error('lokasinama')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="" class="text-uppercase">nama</label>
                                        <input type="text" name="lokasinama" id="lokasinama" class="form-control" required>
                                    </div>
                                    @error('lokasinama')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>