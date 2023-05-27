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

                                    <a href="{{ '/cetakbuku' }}" target="_blank">
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
                                            <th style="width: 2%;">
                                                <center>No</center>
                                            </th>
                                            <th style="width: 7%;">
                                                <center>Tahun</center>
                                            </th>
                                            <th style="width: 40%;">Data Series</th>
                                            <th style="width: 40%;">Presentase</th>
                                            <th style="width: 20%;">
                                                <center>AKSI</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         
                                            <tr style="font-size: 11px;">
                                                <th>
                                                    <center>1</center>
                                                </th>
                                                <th>
                                                    <a href="" data-toggle="modal"
                                                        data-target="#modal">
                                                        <center>sdhdfh</center>
                                                    </a>
                                                </th>
                                                <th><b>
                                                        <a href="" data-toggle="modal"
                                                            data-target="#modal">
                                                           sdfhsdf
                                                        </a>
                                                    </b>
                                                </th>
                                                <th><b>
                                                    <a href="" data-toggle="modal"
                                                        data-target="#modal">
                                                       sdfhsdf
                                                    </a>
                                                </b>
                                            </th>
                                                <th class="project-actions text-right" style="padding: 5px;">
                                                    <center>
                                                        <a class="btn btn-info btn-sm"
                                                            href="/bukutampil/seo/edit" style="font-size: 10px;">
                                                            <i class="fas fa-pencil-alt"></i> Edit</a> 
                                                    </center>
                                                </th>
                                            </tr>

                                            {{-- VIEW MODAL STAR --}}
                                            <div class="modal fade" id="modal" role="dialog">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content" style="padding:30px;">
                                                        <div class="container" style="padding:30px;">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-4">
                                                                        <img src=""
                                                                            style="width:100%;padding:2px;float:left;">
                                                                    </div>
                                                                    <div class="col-8">
                                                                        <span
                                                                            style="font-size:25px;color:rgb(10, 100, 100);"><b>sdg</b></span>
                                                                        <HR>
                                                                        <div class="row">
                                                                            <div class="col-2">
                                                                                <span
                                                                                    style="font-size:14px;">Pengarang</span><BR>
                                                                                <span
                                                                                    style="font-size:14px;">Penerbit</span><BR>
                                                                                
                                                                            </div>
                                                                            <div class="col-10">
                                                                                <span style="font-size:14px;">: &nbsp;&nbsp;
                                                                                    <b>sdgsdgs</b></span><BR>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                        <HR>
                                                                        <span
                                                                            style="font-size:17px;color:rgb(18, 171, 191);"><b>Sinopsis/Deskripsi
                                                                                :</b></span><BR>
                                                                        <span style="font-size:12px;">
                                                                            <p style="text-align: justify;">
                                                                                 sdgasdg</p>
                                                                        </span>
                                                                        <HR>
                                                                        <img src="{{ asset('home/images/img/qwe.png') }}"
                                                                            style="width: 4%;margin-right:6px;padding:2px;float:left;">
                                                                        <h4 class="modal-title"
                                                                            style="font-size:20px;color:rgb(10, 58, 100);">
                                                                            Buku SMPN 8 Kota Tanjungpinang</h4>
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

























                {{-- VIEW Buku MODAL --}}
                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" style="color:rgb(2, 17, 42)">Input Data Buku SMPN 8 Kota
                                    Tanjungpinang</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form action="{{ '/bukustore' }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Judul Buku</label>
                                        <input type="text" name="judul"
                                            class="form-control @error('judul') is-invalid @enderror"
                                            placeholder="Ketik Judul Buku" required>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-4">
                                                <label>Nomor ISBN</label>
                                                <input type="text" name="isbn"
                                                    class="form-control @error('isbn') is-invalid @enderror"
                                                    placeholder="Nomor ISBN" required>
                                            </div>
                                            <div class="col-8">
                                                <label>Penerbit</label>
                                                <input type="text" name="penerbit"
                                                    class="form-control @error('penerbit') is-invalid @enderror"
                                                    placeholder="Penerbit" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-4">
                                                <label>Pengarang Buku</label>
                                                <input type="text" name="pengarang"
                                                    class="form-control @error('pengarang') is-invalid @enderror"
                                                    placeholder="Pengarang" required>
                                            </div>
                                            <div class="col-4">
                                                <label>Halaman Buku</label>
                                                <input type="text" name="hal"
                                                    class="form-control @error('hal') is-invalid @enderror"
                                                    placeholder="45 Halaman" required>
                                            </div>
                                            <div class="col-4">
                                                <label>Eksemplar Buku</label>
                                                <input type="text" name="eksemplar"
                                                    class="form-control @error('eksemplar') is-invalid @enderror"
                                                    placeholder="12 eksemplar" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-4">
                                                <label>Kode Buku</label>
                                                <input type="text" name="kdbuku"
                                                    class="form-control @error('kdbuku') is-invalid @enderror"
                                                    placeholder="SMP8001" required>
                                            </div>
                                            <div class="col-4">
                                                <label>Lokasi Buku</label>
                                                <input type="text" name="rak"
                                                    class="form-control @error('rak') is-invalid @enderror"
                                                    placeholder="RAK 1" required>
                                            </div>
                                            <div class="col-4">
                                                <label>Kelas</label>
                                                <select name="kelas" class="form-control selectpicker"
                                                    data-live-search="true">
                                                    <option @error('kelas') is-invalid @enderror
                                                        value=".:: Pilih Kelas ::.">.:: Pilih Kelas ::.</option>
                                                    <option @error('kelas') is-invalid @enderror value="Kelas 7">Kelas 7
                                                    </option>
                                                    <option @error('kelas') is-invalid @enderror value="Kelas 8">Kelas 8
                                                    </option>
                                                    <option @error('kelas') is-invalid @enderror value="Kelas 9">Kelas 9
                                                    </option>
                                                    <option @error('kelas') is-invalid @enderror value="Kelas 10">Kelas 10
                                                    </option>
                                                    <option @error('kelas') is-invalid @enderror value="Kelas 11">Kelas 11
                                                    </option>
                                                    <option @error('kelas') is-invalid @enderror value="Kelas 12">Kelas 12
                                                    </option>
                                                    <option @error('kelas') is-invalid @enderror value="Umum">Umum
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-4">
                                                <label>Masuk ke Kategori Buku</label>
                                                
                                            </div>
                                            <div class="col-4">
                                                <label>Menggunakan Bahasa</label>
                                                 
                                            </div>
                                            <div class="col-4">
                                                <label>Tahun Terbit Buku</label>
                                                <input class="form-control" id="date" name="date"
                                                    placeholder="Isi Tanggal Input" type="date" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Sinopsis/Deskripsi</label>
                                        <textarea type="text" class="form-control" name="isi" rows="5" placeholder="Ketik Sinopsis Disini"
                                            required></textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-4">
                                                <label>Input Gambar Cover Buku</label>
                                                <input type="file" name="gambar" class="form-control"
                                                    id="inputGroupFile02" required>
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