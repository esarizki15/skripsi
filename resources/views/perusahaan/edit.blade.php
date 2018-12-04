@extends('vendor.backpack.base.layout')

@section('content')
<div class="container-fluid spark-screen">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('perusahaan.index') }}">Perusahaan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ubah Detail Perusahaan</li>
              </ol>
            </nav>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">{{ __('Ubah Detail Perusahaan') }}</h2></div>
                    <div class="panel-body">
                        {!! Form::model($perusahaan, ['url' => route('perusahaan.update', $perusahaan->id),
                        'method' => 'put', 'files'=>'true',  'class'=>'form-horizontal']) !!}
                            @include('perusahaan._form')                 
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
