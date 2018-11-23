@extends('vendor.backpack.base.layout')

@section('content')
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
                <h2 class="panel-title">{{ __('Penanganan') }}</h2>
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
                                    <td>Nama Ruangan</td>
                                    <td>Jenis Pengaduan</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($penanganan as $log)
                                <tr>
                                    <td>{{ $log->users['name'] }}</td>
                                    <td>{{ $log->pengaduans->users['name'] }}</td>
                                    <td>{{ $log->pengaduans->lokasis->nama }}</td>
                                    <td>{{ $log->pengaduans->pengaduan }}</td>
                                    <td><a class="btn btn-primary" href="{{ route('penanganan.ajukan', $log->id) }}">Ajukan</a></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="2">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                        {{ $penanganan->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
