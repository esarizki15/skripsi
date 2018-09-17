@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-1">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Perusahaan</li>
              </ol>
            </nav>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">{{ __('Daftar Perusahaan') }}</div>

                <div class="panel-body">
                 <p><a class="btn btn-primary" href="{{ route('perusahaan.create') }}">Tambah</a></p> 
                   <div class="table-responsive">
                        <table id="example" class="display responsive nowrap compact" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama Perusahaan</th>
                                    <th>Provinsi</th>
                                    <th>Kota</thd>
                                    <th>Kecamatan</th>
                                    <th>Detail</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($perusahaan as $log)
                                    <tr>   
                                        <td>
                                            {{ $log->nama }}
                                        </td>
                                        <td>{{ $log->provinsi }}</td>
                                        <td>{{ $log->kota }}</td>
                                        <td>{{ $log->kecamatan }}</td>
                                        <td>{{ $log->detail }}</td>
                                        <td><a class="btn btn-primary" href="{{ route('perusahaan.edit', $log->id) }}">Edit</a></td>
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
                                    <th>Provinsi</th>
                                    <th>Kota</thd>
                                    <th>Kecamatan</th>
                                    <th>Detail Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                        {{ $perusahaan->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

