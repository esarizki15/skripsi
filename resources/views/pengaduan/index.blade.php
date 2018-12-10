@extends('vendor.backpack.base.layout')

@section('content')
<div class="container-fluid">
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
                 <p><a class="btn btn-primary" href="{{ route('pengaduan.create') }}">Tambah</a>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Gabungkan</button>
                    @include('partials.merge')
                 </p> 
                   <div class="table-responsive">
                        <table id="example" class="display responsive nowrap compact">
                            <thead>
                                <tr>
                                    
                                    <td>Pelapor</td>
                                    <td>Nama Ruangan</td>
                                    <td>Jenis Pengaduan</td>
                                    <td>Foto</td>
                                    <td>Deskripsi</td>
                                    <td></td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pengaduan as $log)
                                    <tr>
                                        
                                        <td><a href="{{ route('pengaduan.show', $log->id) }}">
                                            {{ $log->users['name'] }}
                                            @foreach($log->keywords as $key)
                                                @if($key->pengaduans->count() > 1)
                                                    <small>{{ "Duplikat" }}</small>
                                                @endif
                                            @endforeach
                                            </a>
                                        </td>
                                        <td>{{ $log->tempats->nama }}</td>
                                        <td>{{ $log->pengaduan }}</td>
                                        @if (isset($log) && $log->foto)
                                        <td><img class="img-rounded img-responsive" style="width: 5rem; height: 5rem" src="{!!asset('img/'.$log->foto)!!}"></td>
                                        @else
                                        <td>Foto belum di upload</td>
                                        @endif
                                        <td>{{ $log->deskripsi }}</td>
                                        <td><input type="checkbox" name="duplikat" value="1"></td>
                                        @if(!isset( $log->penanganans ))
                                        <td><a class="btn btn-primary" href="{{ route('pengaduan.tangani', $log->id) }}">Tangani</a></td>
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
