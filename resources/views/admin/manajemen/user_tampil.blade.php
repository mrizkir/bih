@extends('layouts.layoutadmin')

@section('konten')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">

            </div><!-- /.container-fluid -->
        </section>

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
                                <div class="col-sm-6">
                                </div>
                            </div><BR>
                            <div style="margin:10px;">
                                <div class="border-0">
                                    @include('layouts.pesan')
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#modal-default">
                                        <b style="font-size:12px;"> Tambah Data</b>
                                    </button>
                                    {{-- <a href="{{ '' }}" target="_blank">
                                        <button style="float:right;margin-right:10px;" type="button"
                                            class="btn btn-success">
                                            <b><i class="fa fa-print"></i></b>
                                        </button>
                                    </a> --}}
                                </div>
                                <br>
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr style="background:rgb(4, 89, 123);color:white;font-size: 12px;">
                                            <th style="width: 2%;" class="text-center">No</th>
                                            <th style="width: 80%;">Manajemen User </th>
                                            <th style="width: 10%;" class="text-center">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        @foreach ($data as $k => $item)
                                            <tr style="font-size: 11px;">
                                                <td class="text-center">{{ $k + 1 }}</th>
                                                <td><img src="{{ asset('storage/img_user/' . $item->foto) }}"
                                                        style="width: 5%;padding:10px;float:left;">
                                                    <strong>Username</strong> : {{ $item->username }} <BR> 
                                                    <strong>No Hp</strong> : {{ $item->nomor_hp }} |
                                                    <strong>No Hp</strong> : {{ $item->email }}
                                                </td>
                                                <td class="project-actions text-center" style="padding: 10px;">
                                                    <a href="" class="btn btn-info btn-sm" data-toggle="modal"
                                                        style="font-size: 10px;"
                                                        data-target="#modaledit{{ $item->id }}">
                                                        <i class="fas fa-pencil-alt"></i> Edit
                                                    </a>


                                                    {{-- VIEW MODAL EDIT --}}
                                                    <div class="modal fade" id="modaledit{{ $item->id }}"
                                                        role="dialog">
                                                        <div class="modal-dialog modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" style="color:rgb(2, 17, 42)">
                                                                        Edit Data {{ $title }}</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                {{-- {!! Form::open([
                                                                    'url' => route('user-iu.update'),
                                                                    'method' => 'put',
                                                                    'id' => 'frmadd',
                                                                    'name' => 'frmadd',
                                                                    'enctype' => 'multipart/form-data'
                                                                ]) !!} --}}
<form action="/iu/{{ $item->id }}" method="POST"
    enctype="multipart/form-data">
    {{-- @method('put') --}}
    @csrf
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-4">
                                                                                <label>Nama Lengkap</label>
                                                                                <input type="text" name="name"
                                                                                    class="form-control @error('name') is-invalid @enderror"
                                                                                    value="{{ $item->name }}" required>
                                                                            </div>
                                                                            <div class="col-4">
                                                                                <label>Username / Nickname</label>
                                                                                <input type="text" name="username"
                                                                                    class="form-control @error('username') is-invalid @enderror"
                                                                                    value="{{ $item->username }}" required>
                                                                            </div>
                                                                            {{-- <div class="col-4">
                                                                                <label>Password</label>
                                                                                <input type="password" name="password"
                                                                                    class="form-control"
                                                                                    value="{{ $item->password }}" disabled required>
                                                                            </div> --}}
                                                                        </div>

                                                                        <div class="row" style="margin-top: 22px;">
                                                                            <div class="col-4">
                                                                                <label>Sebagai</label>
                                                                                <select name="default_role"
                                                                                    class="form-control selectpicker"
                                                                                    data-live-search="true" required>
                                                                                    <option
                                                                                        @error('default_role') is-invalid @enderror
                                                                                        value="{{ $item->default_role }}"
                                                                                        selected>
                                                                                        {{ $item->default_role }}
                                                                                    </option>
                                                                                    <option
                                                                                        @error('default_role') is-invalid @enderror
                                                                                        value="superadmin">Super Admin
                                                                                    </option>
                                                                                    <option
                                                                                        @error('default_role') is-invalid @enderror
                                                                                        value="operator">Operator</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-4">
                                                                                <label>No Hp</label>
                                                                                <input type="text" name="nomor_hp"
                                                                                    class="form-control @error('nomor_hp') is-invalid @enderror"
                                                                                    value="{{ $item->nomor_hp }}" required>
                                                                            </div>
                                                                            <div class="col-4">
                                                                                <label>Email</label>
                                                                                <input type="text" name="email"
                                                                                    class="form-control @error('email') is-invalid @enderror"
                                                                                    value="{{ $item->email }}" required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group mb-3"
                                                                            style="margin-top: 22px;">
                                                                            <div class="row">
                                                                                <div class="col-4">
                                                                                    <label>Ganti Foto</label>
                                                                                    <input type="hidden" name="oldImage" value="{{ $item->foto }}"
                                                                                    class="form-control" id="inputGroupFile02">
                                                                                <input type="file" name="foto"
                                                                                    class="form-control @error('foto') is-invalid @enderror"
                                                                                    id="inputGroupFile02">
                                                                                        
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="row" style="margin-top: 22px;">
                                                                            <div class="col-2">
                                                                                <img src="{{ asset('storage/img_user/' . $item->foto) }}"
                                                                                    style="width: 100%;">
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="submit"
                                                                        class="btn btn-info">Simpan</button>
                                                                    <button type="button" class="btn btn-danger"
                                                                        data-dismiss="modal">Cancel</button>
                                                                </div>
                                                                {!! Form::close() !!}
                                                            </div>
                                                            <!-- /.modal-content -->
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

                        <!-- /.col -->
                    </div>
                </div><!-- /.container-fluid -->





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
                            {!! Form::open([
                                'url' => route('user-iu.store'),
                                'method' => 'post',
                                'id' => 'frmadd',
                                'name' => 'frmadd',
                                'enctype' => 'multipart/form-data',
                            ]) !!}
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-4">
                                            <label>Nama Lengkap</label>
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Ketik Nama Lengkap" required>
                                        </div>
                                        <div class="col-4">
                                            <label>Username / Nickname</label>
                                            <input type="text" name="username"
                                                class="form-control @error('username') is-invalid @enderror"
                                                placeholder="Ketik Username" required>
                                        </div>
                                        <div class="col-4">
                                            <label>Password</label>
                                            <input type="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Ketik Password" required>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top: 22px;">
                                        <div class="col-4">
                                            <label>Sebagai</label>
                                            {!! Form::select('default_role', $daftar_role, null, ['class' => 'form-control selectpicker']) !!}
                                        </div>
                                        <div class="col-4">
                                            <label>No Hp</label>
                                            <input type="text" name="nomor_hp"
                                                class="form-control @error('nomor_hp') is-invalid @enderror"
                                                placeholder="Ketik Nomor Handphone" required>
                                        </div>
                                        <div class="col-4">
                                            <label>Email</label>
                                            <input type="text" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Ketik Email" required>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3" style="margin-top: 22px;">
                                        <div class="row">
                                            <div class="col-4">
                                                <label>Input Foto</label>
                                                <input type="file" name="foto" class="form-control"
                                                    id="inputGroupFile02" required>
                                            </div>
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
