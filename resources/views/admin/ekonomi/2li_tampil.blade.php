@extends('layouts.layoutadmin')

@section('konten')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <br>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <section style="padding:20px;background:rgb(255, 255, 255);">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <li class="breadcrumb-item active" style="font-size: 20px;">
                                        <strong>{{ $title }}</strong>
                                    </li>
                                </div>
                            </div><BR>
                            <div style="margin:10px;">
                                <div class="border-0">
                                    @include('layouts.pesan')
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#modal-default">
                                        <b style="font-size:12px;"> Tambah Data</b>
                                    </button>
                                    <a href="{{ '' }}" target="_blank">
                                        <button style="float:right;margin-right:10px;" type="button"
                                            class="btn btn-success">
                                            <b><i class="fa fa-print"></i></b>
                                        </button>
                                    </a>
                                </div>
                                <br>
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr style="background:rgb(4, 89, 123);color:white;font-size: 12px;">
                                            <th style="width: 2%;" class="text-center">No</th>
                                            <th style="width: 80%;" class="text-center">Data {{ $title }}
                                            </th>
                                            <th style="width: 10%;" class="text-center">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $k => $item)
                                            <tr style="font-size: 11px;">
                                                <td class="text-center">{{ $k + 1 }}</th>
                                                <td><strong>Tahun</strong> : {{ $item->tahun }} |
                                                    <strong>Data Series</strong> :
                                                    {{ Helper::getJenisDataSeries($item->status_data) }} <BR>
                                                    <strong> Data Umum</strong> : {{ $item->umum }} % |
                                                    <strong> Data Bahan Makanan</strong> : {{ $item->bahan_makanan }} % |
                                                    <strong> Data makanan_jadi</strong> : {{ $item->makanan_jadi }} % |
                                                    <strong> Data perumahan</strong> : {{ $item->perumahan }} % |<BR>
                                                    <strong> Data sandang</strong> : {{ $item->sandang }} % |
                                                    <strong> Data kesehatan</strong> : {{ $item->kesehatan }} % |
                                                    <strong> Data pendidikan</strong> : {{ $item->pendidikan }} % |
                                                    <strong> Data transportasi</strong> : {{ $item->transportasi }} % |
                                                </td>
                                                <td class="project-actions text-center" style="padding: 10px;">
                                                    <a href="" class="btn btn-info btn-sm" data-toggle="modal"
                                                        style="font-size: 10px;"
                                                        data-target="#modaledit{{ $item->tahun }}">
                                                        <i class="fas fa-pencil-alt"></i> Edit
                                                    </a>
                                                    {{-- <a href="{{ 'lidel/'.$item->tahun }}" class="btn btn-info btn-sm"  
                                                       style="font-size: 10px;" class="btn btn-danger btn-sm"  
                                                       onclick="return confirm('Anda Yakin Mau Menghapus ?') ">
                                                       <i class="fas fa-pencil-alt"></i> Del
                                                   </a>  --}}

                                                    {{-- VIEW MODAL EDIT --}}
                                                    <div class="modal fade" id="modaledit{{ $item->tahun }}"
                                                        role="dialog">
                                                        <div class="modal-dialog modal-xl">
                                                            <div class="modal-content" style="padding:10px;">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" style="color:rgb(10, 100, 100);">
                                                                        Edit Data {{ $title }}</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="container" style="padding:30px;">
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-12"> 
                                                                                {!! Form::open([
                                                                                    'url' => route('ekonomi-li.update', ['id' => $item->tahun]),
                                                                                    'method' => 'put',
                                                                                    'id' => 'frmedit_' . $item->tahun,
                                                                                    'name' => 'frmedit_' . $item->tahun,
                                                                                ]) !!}
                                                                                <div class="card-body">
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <div class="col-3">
                                                                                                <label>Tahun</label>
                                                                                                <input type="text"
                                                                                                    name="tahun"
                                                                                                    class="form-control @error('tahun') is-invalid @enderror"
                                                                                                    value="{{ $item->tahun }}"
                                                                                                    required>
                                                                                                @if ($errors->has('tahun'))
                                                                                                    <div class="alert alert-danger mt-1 alert-validation-msg"
                                                                                                        role="alert">
                                                                                                        <div
                                                                                                            class="alert-body d-flex align-items-center">
                                                                                                            <i data-feather="info"
                                                                                                                class="me-50"></i>
                                                                                                            {{ $errors->first('tahun') }}
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endif
                                                                                            </div>
                                                                                            <div class="col-3">
                                                                                                <label>Data Series</label>
                                                                                                {!! Form::select('status_data', Helper::getJenisDataSeries(), $item->status_data, [
                                                                                                    'id' => 'status_data',
                                                                                                    'class' => 'form-control',
                                                                                                ]) !!}
                                                                                                @if ($errors->has('status_data'))
                                                                                                    <div class="alert alert-danger mt-1 alert-validation-msg"
                                                                                                        role="alert">
                                                                                                        <div
                                                                                                            class="alert-body d-flex align-items-center">
                                                                                                            <i data-feather="info"
                                                                                                                class="me-50"></i>
                                                                                                            {{ $errors->first('status_data') }}
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endif
                                                                                            </div>
                                                                                        </div><BR>
                                                                                        <div class="row">
                                                                                            <div class="col-3">
                                                                                                <label>Data Umum</label>
                                                                                                <input type="text"
                                                                                                    name="umum"
                                                                                                    class="form-control @error('umum') is-invalid @enderror"
                                                                                                    value="{{ $item->umum }}"
                                                                                                    required>
                                                                                                @if ($errors->has('umum'))
                                                                                                    <div class="alert alert-danger mt-1 alert-validation-msg"
                                                                                                        role="alert">
                                                                                                        <div
                                                                                                            class="alert-body d-flex align-items-center">
                                                                                                            <i data-feather="info"
                                                                                                                class="me-50"></i>
                                                                                                            {{ $errors->first('umum') }}
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endif
                                                                                            </div>
                                                                                            <div class="col-3">
                                                                                                <label>Data Bahan Makanan</label>
                                                                                                <input type="text"
                                                                                                    name="bahan_makanan"
                                                                                                    class="form-control @error('bahan_makanan') is-invalid @enderror"
                                                                                                    value="{{ $item->bahan_makanan }}"
                                                                                                    required>
                                                                                                @if ($errors->has('bahan_makanan'))
                                                                                                    <div class="alert alert-danger mt-1 alert-validation-msg"
                                                                                                        role="alert">
                                                                                                        <div
                                                                                                            class="alert-body d-flex align-items-center">
                                                                                                            <i data-feather="info"
                                                                                                                class="me-50"></i>
                                                                                                            {{ $errors->first('bahan_makanan') }}
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endif
                                                                                            </div>
                                                                                            <div class="col-3">
                                                                                                <label>Data Makanan Jadi</label>
                                                                                                <input type="text"
                                                                                                    name="makanan_jadi"
                                                                                                    class="form-control @error('makanan_jadi') is-invalid @enderror"
                                                                                                    value="{{ $item->makanan_jadi }}"
                                                                                                    required>
                                                                                                @if ($errors->has('makanan_jadi'))
                                                                                                    <div class="alert alert-danger mt-1 alert-validation-msg"
                                                                                                        role="alert">
                                                                                                        <div
                                                                                                            class="alert-body d-flex align-items-center">
                                                                                                            <i data-feather="info"
                                                                                                                class="me-50"></i>
                                                                                                            {{ $errors->first('makanan_jadi') }}
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endif
                                                                                            </div>
                                                                                            <div class="col-3">
                                                                                                <label>Data perumahan</label>
                                                                                                <input type="text"
                                                                                                    name="perumahan"
                                                                                                    class="form-control @error('perumahan') is-invalid @enderror"
                                                                                                    value="{{ $item->perumahan }}"
                                                                                                    required>
                                                                                                @if ($errors->has('perumahan'))
                                                                                                    <div class="alert alert-danger mt-1 alert-validation-msg"
                                                                                                        role="alert">
                                                                                                        <div
                                                                                                            class="alert-body d-flex align-items-center">
                                                                                                            <i data-feather="info"
                                                                                                                class="me-50"></i>
                                                                                                            {{ $errors->first('perumahan') }}
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endif
                                                                                            </div>
                                                                                        </div><BR>
                                                                                        <div class="row">
                                                                                            <div class="col-3">
                                                                                                <label>Data sandang</label>
                                                                                                <input type="text"
                                                                                                    name="sandang"
                                                                                                    class="form-control @error('sandang') is-invalid @enderror"
                                                                                                    value="{{ $item->sandang }}"
                                                                                                    required>
                                                                                                @if ($errors->has('sandang'))
                                                                                                    <div class="alert alert-danger mt-1 alert-validation-msg"
                                                                                                        role="alert">
                                                                                                        <div
                                                                                                            class="alert-body d-flex align-items-center">
                                                                                                            <i data-feather="info"
                                                                                                                class="me-50"></i>
                                                                                                            {{ $errors->first('sandang') }}
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endif
                                                                                            </div>
                                                                                            <div class="col-3">
                                                                                                <label>Data kesehatan</label>
                                                                                                <input type="text"
                                                                                                    name="kesehatan"
                                                                                                    class="form-control @error('kesehatan') is-invalid @enderror"
                                                                                                    value="{{ $item->kesehatan }}"
                                                                                                    required>
                                                                                                @if ($errors->has('kesehatan'))
                                                                                                    <div class="alert alert-danger mt-1 alert-validation-msg"
                                                                                                        role="alert">
                                                                                                        <div
                                                                                                            class="alert-body d-flex align-items-center">
                                                                                                            <i data-feather="info"
                                                                                                                class="me-50"></i>
                                                                                                            {{ $errors->first('kesehatan') }}
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endif
                                                                                            </div>
                                                                                            <div class="col-3">
                                                                                                <label>Data pendidikan</label>
                                                                                                <input type="text"
                                                                                                    name="pendidikan"
                                                                                                    class="form-control @error('pendidikan') is-invalid @enderror"
                                                                                                    value="{{ $item->pendidikan }}"
                                                                                                    required>
                                                                                                @if ($errors->has('pendidikan'))
                                                                                                    <div class="alert alert-danger mt-1 alert-validation-msg"
                                                                                                        role="alert">
                                                                                                        <div
                                                                                                            class="alert-body d-flex align-items-center">
                                                                                                            <i data-feather="info"
                                                                                                                class="me-50"></i>
                                                                                                            {{ $errors->first('pendidikan') }}
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endif
                                                                                            </div>
                                                                                            <div class="col-3">
                                                                                                <label>Data transportasi</label>
                                                                                                <input type="text"
                                                                                                    name="transportasi"
                                                                                                    class="form-control @error('transportasi') is-invalid @enderror"
                                                                                                    value="{{ $item->transportasi }}"
                                                                                                    required>
                                                                                                @if ($errors->has('transportasi'))
                                                                                                    <div class="alert alert-danger mt-1 alert-validation-msg"
                                                                                                        role="alert">
                                                                                                        <div
                                                                                                            class="alert-body d-flex align-items-center">
                                                                                                            <i data-feather="info"
                                                                                                                class="me-50"></i>
                                                                                                            {{ $errors->first('transportasi') }}
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endif
                                                                                            </div>
                                                                                        </div>


                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="modal-footer justify-content-between">
                                                                                    <button type="submit"
                                                                                        class="btn btn-info">Simpan</button>
                                                                                    <button type="button"
                                                                                        class="btn btn-danger"
                                                                                        data-dismiss="modal">Cancel</button>
                                                                                </div>
                                                                                {!! Form::close() !!}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- VIEW MODAL END --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>














                {{-- TAMBAH MODAL --}}
                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" style="color:rgb(2, 17, 42)">Tambah Data {{ $title }}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            {!! Form::open(['url' => route('ekonomi-li.store'), 'method' => 'post', 'id' => 'frmadd', 'name' => 'frmadd']) !!}
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-4">
                                            <label>Tahun</label>
                                            <input type="text" name="tahun"
                                                class="form-control @error('tahun') is-invalid @enderror"
                                                placeholder="Ketik Tahun" required>
                                            @if ($errors->has('tahun'))
                                                <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                                    <div class="alert-body d-flex align-items-center">
                                                        <i data-feather="info" class="me-50"></i>
                                                        {{ $errors->first('tahun') }}
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-4">
                                            <label>Data Series</label>
                                            {!! Form::select('status_data', Helper::getJenisDataSeries(), old('status_data'), [
                                                'id' => 'frmadd_status_data',
                                                'class' => 'form-control',
                                            ]) !!}
                                        </div>
                                    </div><BR>

                                    <div class="row">
                                        <div class="col-3">
                                            <label>Data Pertumbuhan Ekonomi</label>
                                            <input type="text" name="umum"
                                                class="form-control @error('umum') is-invalid @enderror"
                                                placeholder="Ketik Data umum" required>
                                            @if ($errors->has('umum'))
                                                <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                                    <div class="alert-body d-flex align-items-center">
                                                        <i data-feather="info" class="me-50"></i>
                                                        {{ $errors->first('umum') }}
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-3">
                                            <label>Data bahan_makanan</label>
                                            <input type="text" name="bahan_makanan"
                                                class="form-control @error('bahan_makanan') is-invalid @enderror"
                                                placeholder="Ketik Data bahan_makanan" required>
                                            @if ($errors->has('bahan_makanan'))
                                                <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                                    <div class="alert-body d-flex align-items-center">
                                                        <i data-feather="info" class="me-50"></i>
                                                        {{ $errors->first('bahan_makanan') }}
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-3">
                                            <label>Data makanan_jadi</label>
                                            <input type="text" name="makanan_jadi"
                                                class="form-control @error('makanan_jadi') is-invalid @enderror"
                                                placeholder="Ketik Data makanan_jadi" required>
                                            @if ($errors->has('makanan_jadi'))
                                                <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                                    <div class="alert-body d-flex align-items-center">
                                                        <i data-feather="info" class="me-50"></i>
                                                        {{ $errors->first('makanan_jadi') }}
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-3">
                                            <label>Data perumahan</label>
                                            <input type="text" name="perumahan"
                                                class="form-control @error('perumahan') is-invalid @enderror"
                                                placeholder="Ketik Data perumahan" required>
                                            @if ($errors->has('perumahan'))
                                                <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                                    <div class="alert-body d-flex align-items-center">
                                                        <i data-feather="info" class="me-50"></i>
                                                        {{ $errors->first('perumahan') }}
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div><BR>

                                    <div class="row">
                                        <div class="col-3">
                                            <label>Data sandang</label>
                                            <input type="text" name="sandang"
                                                class="form-control @error('sandang') is-invalid @enderror"
                                                placeholder="Ketik Data sandang" required>
                                            @if ($errors->has('sandang'))
                                                <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                                    <div class="alert-body d-flex align-items-center">
                                                        <i data-feather="info" class="me-50"></i>
                                                        {{ $errors->first('sandang') }}
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-3">
                                            <label>Data kesehatan</label>
                                            <input type="text" name="kesehatan"
                                                class="form-control @error('kesehatan') is-invalid @enderror"
                                                placeholder="Ketik Data kesehatan" required>
                                            @if ($errors->has('kesehatan'))
                                                <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                                    <div class="alert-body d-flex align-items-center">
                                                        <i data-feather="info" class="me-50"></i>
                                                        {{ $errors->first('kesehatan') }}
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-3">
                                            <label>Data pendidikan</label>
                                            <input type="text" name="pendidikan"
                                                class="form-control @error('pendidikan') is-invalid @enderror"
                                                placeholder="Ketik Data pendidikan" required>
                                            @if ($errors->has('pendidikan'))
                                                <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                                    <div class="alert-body d-flex align-items-center">
                                                        <i data-feather="info" class="me-50"></i>
                                                        {{ $errors->first('pendidikan') }}
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-3">
                                            <label>Data transportasi</label>
                                            <input type="text" name="transportasi"
                                                class="form-control @error('transportasi') is-invalid @enderror"
                                                placeholder="Ketik Data transportasi" required>
                                            @if ($errors->has('transportasi'))
                                                <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                                    <div class="alert-body d-flex align-items-center">
                                                        <i data-feather="info" class="me-50"></i>
                                                        {{ $errors->first('transportasi') }}
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="submit" class="btn btn-info">Simpan</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
