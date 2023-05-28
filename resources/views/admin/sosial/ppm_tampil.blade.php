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
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                    <b style="font-size:12px;"> Tambah Data</b>
                  </button>
                  <a href="{{ '' }}" target="_blank">
                    <button style="float:right;margin-right:10px;" type="button" class="btn btn-success">
                      <b><i class="fa fa-print"></i></b>
                    </button>
                  </a>
                </div>
                <br>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr style="background:rgb(4, 89, 123);color:white;font-size: 12px;">
                      <th style="width: 2%;" class="text-center">No</th> 
                      <th style="width: 80%;" class="text-center">Data Tahun / Series / Persentase</th> 
                      <th style="width: 10%;" class="text-center">AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                     @foreach ($data as $k=>$item)
                      <tr style="font-size: 11px;">
                        <td class="text-center">{{$k + 1 }}</th>
                        <td><strong>Tahun</strong> : {{$item->tahun}} | <strong>Series</strong> : {{Helper::getJenisDataSeries($item->data_series)}} | <strong>Persentase</strong> : {{$item->persentase}}%</td>                       
                        <td class="project-actions text-center" style="padding: 10px;">                        
                          <a href="" class="btn btn-info btn-sm" data-toggle="modal" style="font-size: 10px;" data-target="#modaledit{{$item->id}}">
                            <i class="fas fa-pencil-alt"></i> Edit
                          </a>                      
                          {{-- VIEW MODAL EDIT --}}
                          <div class="modal fade" id="modaledit{{$item->id}}" role="dialog">
                            <div class="modal-dialog modal-xl">
                              <div class="modal-content" style="padding:30px;">
                                <div class="container" style="padding:30px;">
                                  <div class="form-group">
                                    <div class="row">
                                      <div class="col-12">
                                        <span style="font-size:20px;color:rgb(10, 100, 100);"><b>Edit Data {{$title}}</b></span>                                    
                                        {!! Form::open(['url'=>route('sosial-ppm.update', ['id' => $item->id]), 'method'=>'put','id'=>'frmedit_' . $item->id,'name'=>'frmedit_' . $item->id])!!}                                       
                                          <div class="card-body"> 
                                            <div class="form-group">
                                              <div class="row">
                                                <div class="col-4">
                                                  <label>Tahun</label>
                                                  <input type="text" name="tahun" class="form-control @error('tahun') is-invalid @enderror" value="{{$item->tahun}}" required>
                                                </div>
                                                <div class="col-4">
                                                  <label>Data Series</label>
                                                  {!! Form::select('data_series', Helper::getJenisDataSeries(), $item->data_series, ['id'=>'data_series', 'class'=>'form-control']) !!}                                              
                                                </div>
                                                <div class="col-4">
                                                  <label>Data Persentase</label>
                                                  <input type="text" name="data_persentase" class="form-control @error('data_persentase') is-invalid @enderror" value="{{$item->persentase}}" required>
                                                </div>
                                              </div>
                                            </div>
                                          </div>                        
                                          <div class="modal-footer justify-content-between">
                                            <button type="submit" class="btn btn-info">Simpan</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                          </div>
                                        {!! Form::close()!!}
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
              {!! Form::open(['url'=>route('sosial-ppm.store'), 'method'=>'post','id'=>'frmadd','name'=>'frmadd'])!!}                                                       
                <div class="card-body"> 
                  <div class="form-group">
                    <div class="row">
                      <div class="col-4">
                        <label>Tahun</label>
                        <input type="text" name="tahun" class="form-control @error('tahun') is-invalid @enderror" placeholder="Ketik tahun" required>
                      </div>
                      <div class="col-4">
                        <label>Data Series</label>
                        {!! Form::select('data_series', Helper::getJenisDataSeries(), old('data_series'), ['id'=>'frmadd_data_series', 'class'=>'form-control']) !!}                                              
                      </div>
                      <div class="col-4">
                        <label>Data Persentase</label>
                        <input type="text" name="data_persentase" class="form-control @error('data_persentase') is-invalid @enderror" placeholder="Ketik Data Persentase" required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="submit" class="btn btn-info">Simpan</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
              {!! Form::close()!!}
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
