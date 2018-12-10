@extends('vendor.backpack.base.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-1">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pengaduan</li>
              </ol>
            </nav>


            <div class="box box-default">
                <div class="box-header with-border">

                    <h2 class="panel-title">{{ __('Pengaduan') }}

                    <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                </div>
                <div class="box-body">
                 
                   <div class="table-responsive">
                        <table style="text-align: center;" id="example" class="table table-condensed table-striped">
                            <thead style="font-weight: bold;">
                                <tr>
                                    <td></td>
                                    <td>Kondisi Sekarang</td>
                                    <td>Setelah Perbaikan</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <tr>
                                        <td><b>Nama Ruangan</b></td>
                                        <td>{{ $pengaduan->lokasis->nama }}</td>
                                        <td>{{ $pengaduan->lokasis->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Nama Pengaduan</b></td>
                                        <td>{{ $pengaduan->pengaduan }}</td>
                                        <td>{{ $pengaduan->pengaduan }}</td>
                                    </tr>

                                    <tr>
                                        <td style="vertical-align: middle; "><b>Foto</b></td>
                                        @if (isset($pengaduan) && $pengaduan->foto)
                                        <td><img class="img-rounded img-responsive center-block" style="width: 15rem; height: 15rem" src="{!!asset('img/'.$pengaduan->foto)!!}"></td>
                                        @else
                                        <td>Foto belum di upload</td>
                                        @endif

                                        @if (isset($pengadu) )
                                        <td>Harus di Tes</td>
                                        @else
                                        <td>Foto belum di upload</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td><b>Pelapor - Petugas</b></td>
                                        <td>{{ $pengaduan->users->name }}</td>
                                        <td>Harus di Tes</td>

                                    </tr>
                                    <tr>
                                        <td><b>Deskripsi</b></td>
                                        <td>{{ $pengaduan->deskripsi }}</td>
                                        <td>Harus di Tes</td>

                                    </tr>
                                    <tr>
                                        <td><b>Waktu</b></td>
                                        <td>{{ $pengaduan->created_at }}</td>
                                    </tr>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
