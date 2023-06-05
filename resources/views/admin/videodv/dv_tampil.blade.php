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
                                        <strong>{{ $title }}</strong></li>
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
                                        {{-- <button style="float:right;margin-right:10px;" type="button"
                                            class="btn btn-success">
                                            <b><i class="fa fa-print"></i></b>
                                        </button> --}}
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
                                                <td>
                                                  
                                                  <iframe width="220" height="125" src="https://www.youtube.com/embed/{{ $item->link }}" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen style="float:left;margin:5px;padding-right:20px;"></iframe> 
                                                  DATA VIDEO :<BR><BR>
                                                  <strong>JUDUL</strong> : {{ $item->judul }} <BR>
                                                  <strong>Link Youtube </strong> : {{ $item->link }}
                                                </td>
                                                <td class="project-actions text-center" style="padding: 10px;">
                                                    <a href="" class="btn btn-info btn-sm" data-toggle="modal"
                                                        style="font-size: 10px;"
                                                        data-target="#modaledit{{ $item->id }}">
                                                        <i class="fas fa-pencil-alt"></i> Edit
                                                    </a>
                                                    <a href="{{ 'dvdel/'.$item->id }}" class="btn btn-info btn-sm"  
                                                       style="font-size: 10px;" class="btn btn-danger btn-sm"  
                                                       onclick="return confirm('Anda Yakin Mau Menghapus ?') ">
                                                       <i class="fas fa-pencil-alt"></i> Del
                                                   </a>

                                                    {{-- VIEW MODAL EDIT --}}
                                                    <div class="modal fade" id="modaledit{{ $item->id }}"
                                                        role="dialog">
                                                        <div class="modal-dialog modal-xl">
                                                            <div class="modal-content" style="padding:30px;">
                                                                <div class="container" style="padding:30px;">
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <span
                                                                                    style="font-size:20px;color:rgb(10, 100, 100);"><b>Edit
                                                                                        Data {{ $title }}</b></span>
                                                                                {!! Form::open([
                                                                                    'url' => route('video-dv.update', ['id' => $item->id]),
                                                                                    'method' => 'put',
                                                                                    'id' => 'frmedit_' . $item->id,
                                                                                    'name' => 'frmedit_' . $item->id,
                                                                                ]) !!}
                                                                                <div class="card-body">
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <div class="col-4">
                                                                                                <label>judul</label>
                                                                                                <input type="text"
                                                                                                    name="judul"
                                                                                                    class="form-control @error('judul') is-invalid @enderror"
                                                                                                    value="{{ $item->judul }}"
                                                                                                    required>
                                                                                                @if ($errors->has('judul'))
                                                                                                    <div class="alert alert-danger mt-1 alert-validation-msg"
                                                                                                        role="alert">
                                                                                                        <div
                                                                                                            class="alert-body d-flex align-items-center">
                                                                                                            <i data-feather="info"
                                                                                                                class="me-50"></i>
                                                                                                            {{ $errors->first('judul') }}
                                                                                                        </div>
                                                                                                    </div>
                                                                                                @endif
                                                                                            </div>
                                                                                             
                                                                                            <div class="col-4">
                                                                                                <label>Link</label>
                                                                                                <input type="text"
                                                                                                    name="link"
                                                                                                    class="form-control @error('link') is-invalid @enderror"
                                                                                                    value="{{ $item->link }}"
                                                                                                    required>
                                                                                                @if ($errors->has('link'))
                                                                                                    <div class="alert alert-danger mt-1 alert-validation-msg"
                                                                                                        role="alert">
                                                                                                        <div
                                                                                                            class="alert-body d-flex align-items-center">
                                                                                                            <i data-feather="info"
                                                                                                                class="me-50"></i>
                                                                                                            {{ $errors->first('link') }}
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
                            {!! Form::open(['url' => route('video-dv.store'), 'method' => 'post', 'id' => 'frmadd', 'name' => 'frmadd']) !!}
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-4">
                                            <label>judul</label>
                                            <input type="text" name="judul"
                                                class="form-control @error('judul') is-invalid @enderror"
                                                placeholder="Ketik judul" required>
                                            @if ($errors->has('judul'))
                                                <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                                    <div class="alert-body d-flex align-items-center">
                                                        <i data-feather="info" class="me-50"></i>
                                                        {{ $errors->first('judul') }}
                                                    </div>
                                                </div>
                                            @endif
                                        </div> 
                                        <div class="col-4">
                                            <label>Data Angka Harapan Hidup</label>
                                            <input type="text" name="link"
                                                class="form-control @error('link') is-invalid @enderror"
                                                placeholder="Ketik Data linkh" required>
                                            @if ($errors->has('link'))
                                                <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                                    <div class="alert-body d-flex align-items-center">
                                                        <i data-feather="info" class="me-50"></i>
                                                        {{ $errors->first('link') }}
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
