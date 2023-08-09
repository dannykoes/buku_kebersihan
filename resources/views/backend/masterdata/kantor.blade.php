<div class="widget widget-chart-two">
    <div class="widget-content">
        <div class="row p-3">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <button class="btn btn-primary btn-sm" id="add" onclick="addkantor()" title="Tambah">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm5 11h-4v4h-2v-4H7v-2h4V7h2v4h4v2z"></path></svg>
                </button>
                <div class="table-repsonsive">
                    <table id="masterkantor" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kantor</th>
                                <th>Nama Kantor</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kantor as $key => $val)
                            <tr>
                                <td width="1%">{{$key + 1}}</td>
                                <td>{{$val->nama}}</td>
                                <td>{{$val->pic}}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" id="edit" onclick="addkantor({{ $val }})" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);">
                                            <path d="m16 2.012 3 3L16.713 7.3l-3-3zM4 14v3h3l8.299-8.287-3-3zm0 6h16v2H4z"></path>
                                        </svg></button>
                                    <button onclick="deletedata('{{ 'akantor/'.$val->id }}')" class="btn btn-danger" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);">
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
        <div class="modal fade" id="modalkantor" tabindex="-1" role="dialog" aria-labelledby="modalkantorLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalkantorLabel">Kantor</h5>
                        <button type="button" class="btn btn-secondary" onclick="closemodal('#modalkantor')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="akantor" method="POST">
                            @csrf
                            <input type="text" name="kantorid" id="kantorid" hidden>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="" class="text-uppercase">kantor</label>
                                        <input type="text" name="kantornama" id="kantornama" class="form-control" required>
                                    </div>
                                    @error('kantornama')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="" class="text-uppercase">nama kantor</label>
                                        <input type="text" name="kantorpic" id="kantorpic" class="form-control" required>
                                    </div>
                                    @error('kantorpic')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
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