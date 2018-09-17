@extends('adminlte::layouts.app')


@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-1">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Lokasi</li>
              </ol>
            </nav>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">{{ __('Lokasi') }}</div>

                <div class="panel-body">
                  <p><a class="btn btn-primary" href="{{ route('lokasi.create') }}">Tambah</a></p> 
                   <div class="table-responsive">
                        <table id="example" class="display responsive nowrap compact" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama Perusahaan</th>
                                    <th>Area</th>
                                    <th>Lokasi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($lokasi as $log)
                                    <tr>   
                                        <td>
                                            {{ $log->areas->perusahaans->nama }}
                                        </td>
                                        <td>{{ $log->areas->nama }}</td>
                                        <td>{{ $log->nama }}</td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="{{ route('lokasi.edit', $log->id) }}">Edit</a>
                                            <a class="btn btn-primary btn-sm" href="{{ route('lokasi.generate', $log->id) }}">Generate</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nama Perusahaan</th>
                                    <th>Area</th>
                                    <th>Lokasi</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                        {{ $lokasi->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
