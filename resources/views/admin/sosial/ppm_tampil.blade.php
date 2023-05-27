@extends('layouts.layoutadmin')

@section('konten')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/depan">Home</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <section style="padding:20px;background:rgb(255, 255, 255);">
                            <div style="margin:10px;">

                                <div class="border-0">
                                    @if ($message = Session::get('sukses'))
                                        <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">X</button>
                                            <strong style="color:rgb(0, 0, 0);font-size:23px;">{{ $message }}</strong>
                                        </div>
                                    @endif
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#modal-default">
                                        <B style="font-size:12px;"> Tambah Data</B>
                                    </button>

                                    <a href="{{ '' }}" target="_blank">
                                        <button style="float:right;margin-right:10px;" type="button"
                                            class="btn btn-success">
                                            <B><i class="fa fa-print"></i></B>
                                        </button>
                                    </a>

                                </div>
                                <BR>
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr style="background:rgb(4, 89, 123);color:white;font-size: 12px;">
                                            <th style="width: 2%;"><center>No</center></th> 
                                            <th style="width: 78%;">Data Series / Presentase</th> 
                                            <th style="width: 20%;"><center>AKSI</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?PHP
                                         $i = 1;
                                         ?>
                                            <tr style="font-size: 11px;">
                                                <th>
                                                    <center>{{$i++}}</center>
                                                </th>
                                                <th>
                                                    <a href="" data-toggle="modal"
                                                        data-target="#modal">
                                                        Tahun : 1998<BR></a>
                                                        Data Series :450<BR>
                                                        Data Presentase : 67%
                                                </th>
                                                 
                                                <th class="project-actions text-right" style="padding: 10px;">
                                                    <center>
                                                        <a class="btn btn-info btn-sm"
                                                            href="/bukutampil/seo/edit" style="font-size: 10px;">
                                                            <i class="fas fa-pencil-alt"></i> Edit</a> 
                                                    </center>
                                                </th>
                                            </tr>
                                            <tr style="font-size: 11px;">
                                                <th>
                                                    <center>{{$i++}}</center>
                                                </th>
                                                <th>
                                                    <a href="" data-toggle="modal"
                                                        data-target="#modal">
                                                        Tahun : 1999<BR></a>
                                                        Data Series : 350<BR>
                                                        Data Presentase : 87%
                                                </th>
                                                 
                                                <th class="project-actions text-right" style="padding: 10px;">
                                                    <center>
                                                        <a class="btn btn-info btn-sm"
                                                            href="/bukutampil/seo/edit" style="font-size: 10px;">
                                                            <i class="fas fa-pencil-alt"></i> Edit</a> 
                                                    </center>
                                                </th>
                                            </tr>

                                            {{-- VIEW MODAL EDIT --}}
                                            <div class="modal fade" id="modal" role="dialog">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content" style="padding:30px;">
                                                        <div class="container" style="padding:30px;">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <span
                                                                            style="font-size:15px;color:rgb(10, 100, 100);"><b>Edit Data {{$title}}</b></span>
                                                                         
                                                                            <form action="{{ '/bukustore' }}" method="POST" enctype="multipart/form-data">
                                                                                @csrf
                                                                                <div class="card-body"> 
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <div class="col-4">
                                                                                                <label>Tahun</label>
                                                                                        <input type="text" name="tahun"
                                                                                            class="form-control @error('tahun') is-invalid @enderror"
                                                                                            value="1912" required>
                                                                                            </div>
                                                                                            <div class="col-4">
                                                                                                <label>Data Series</label>
                                                                                                <input type="text" name="data_series"
                                                                                                    class="form-control @error('data_series') is-invalid @enderror"
                                                                                                    value="234" required>
                                                                                            </div>
                                                                                            <div class="col-4">
                                                                                                <label>Data Presentase</label>
                                                                                                <input type="text" name="data_presentase"
                                                                                                    class="form-control @error('data_presentase') is-invalid @enderror"
                                                                                                    value="34%" required>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                
                                                                                </div>
                                                
                                                                                <div class="modal-footer justify-content-between">
                                                                                    <button type="submit" class="btn btn-info">Simpan</button>
                                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                                                </div>
                                                                            </form> 
                                                                         
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- VIEW MODAL END --}}
                                        
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
                                <h4 class="modal-title" style="color:rgb(2, 17, 42)">Tambah Data {{$title}}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form action="{{ '/bukustore' }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body"> 
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-4">
                                                <label>Tahun</label>
                                        <input type="text" name="tahun"
                                            class="form-control @error('tahun') is-invalid @enderror"
                                            placeholder="Ketik tahun" required>
                                            </div>
                                            <div class="col-4">
                                                <label>Data Series</label>
                                                <input type="text" name="data_series"
                                                    class="form-control @error('data_series') is-invalid @enderror"
                                                    placeholder="Ketik Data Series" required>
                                            </div>
                                            <div class="col-4">
                                                <label>Data Presentase</label>
                                                <input type="text" name="data_presentase"
                                                    class="form-control @error('data_presentase') is-invalid @enderror"
                                                    placeholder="Ketik  Data Presentase" required>
                                            </div>
                                        </div>
                                    </div>
                                    

                                </div>

                                <div class="modal-footer justify-content-between">
                                    <button type="submit" class="btn btn-info">Simpan</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                </div>
                            </form>

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