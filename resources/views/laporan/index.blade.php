@extends('adminlte::layouts.app')


@section('main-content')
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
                        <h2 class="box-title">Seleksi</h2>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        {{ trans('adminlte_lang::message.logged') }}. Start creating your amazing application!
                    </div>
                    <!-- /.box-body -->
                </div>

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
                 <p><a class="btn btn-primary" href="{{ url('laporan/create') }}">Tambah</a></p> 
                   <div class="table-responsive">
                        <table id="example" class="table table-condensed table-striped">
                            <thead>
                                <tr>
                                    <td>Pelapor</td>
                                    <td>Nama Ruangan</td>
                                    <td>Jenis Pengaduan</td>
                                    <td>Foto</td>
                                    <td>Keamanan</td>
                                    <td>Kerugian</td>
                                    <td>Deskripsi</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pengaduan as $log)
                                    <tr>
                                        
                                        <td>
                                            {{ $log->users['name'] }}
                                            @foreach($log->keywords as $key)
                                                @if($key->pengaduans->count() > 1)
                                                    <small>{{ "Duplikat" }}</small>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $log->lokasis->nama }}</td>
                                        <td>{{ $log->pengaduan }}</td>
                                        @if (isset($log) && $log->foto)
                                        <td><img class="img-rounded img-responsive" style="width: 5rem; height: 5rem" src="{!!asset('img/'.$log->foto)!!}"></td>
                                        @else
                                        <td>Foto belum di upload</td>
                                        @endif
                                        @if ($log->keamanan == 1)
                                        <td>Ada</td>
                                        @else
                                        <td>Tidak ada</td>           
                                        @endif
                                        <td>{{ $log->resiko2 }}</td>
                                        <td>{{ $log->deskripsi }}</td>

                                        @if(!isset( $log->penanganans ))
                                        <td><a class="btn btn-primary" href="{{ route('laporan.tangani', $log->id) }}">Tangani</a></td>
                                        @else
                                        <td><a class="btn btn-info disabled" href="">Sedang Di Tangani</a></td>
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
