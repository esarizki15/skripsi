@extends('adminlte::layouts.app')


@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-1">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Daftar Penanganan</li>
            </ol>
        </nav>
        <div class="box box-default">
            <div class="box-header with-border">
                <h2 class="panel-title">{{ __('Pengajuan') }}</h2>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i></button>
                        </div>
                    </div>

                    <div class="box-body">

                        <div class="table-responsive">
                         <table id="example" class="table table-condensed table-striped">
                            <thead>
                                <tr>
                                    <td>Petugas</td>
                                    <td>Pelapor</td>
                                    <td>Deskripsi</td>
                                    <td>Foto</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pengajuan as $log)
                                <tr>
                                    <td>{{ $log->penanganans->users['name'] }}</td>
                                    <td>{{ $log->penanganans->pengaduans->users['name'] }}</td>
                                    <td>{{ $log->deskripsi }}</td>
                                    @if (isset($log) && $log->foto)
                                        <td><img class="img-rounded img-responsive" style="width: 5rem; height: 5rem" src="{!!asset('img/'.$log->foto)!!}"></td>
                                        @else
                                        <td>Foto belum di upload</td>
                                        @endif
                                    <td><a class="btn btn-primary btn-xs" href="{{ route('pengajuan.terima', $log->id) }}">Terima</a> |
                                        <a class="btn btn-primary btn-xs" href="{{ route('pengajuan.tolak', $log->id) }}">Tolak</a>  
                                    </td>
                                        @if(isset($pengajuan))
                                        <td>ada</td>
                                        @else
                                        <td>ga ada</td>
                                        @endif
                                    
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="2">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
