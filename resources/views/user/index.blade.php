@extends('adminlte::layouts.app')


@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-1">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Area</li>
              </ol>
            </nav>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">{{ __('Daftar Area') }}</div>

                <div class="panel-body">
                  <p><a class="btn btn-primary" href="{{ route('user.create') }}">Tambah</a></p> 
                   <div class="table-responsive">
                        <table id="example" class="display responsive nowrap compact" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama Perusahaan</th>
                                    <th>Area</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nama Perusahaan</th>
                                    <th>Area</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
