@extends('vendor.backpack.base.layout')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('pengaduan.index') }}">Pengaduan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pengaduan</li>
              </ol>
            </nav>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">{{ __('Pengaduan') }}</h2></div>

                <div class="panel-body">
                    {!! Form::open(['url' => route('pengaduan.merges'),
                    'method' => 'post', 'class'=>'form-horizontal']) !!}
                    @if (isset($sudah_ada))
                        <div class="form-group{{ $errors->has('ada') ? ' has-error' : '' }} row">
                        {!! Form::label('ada', 'Pilih', ['class'=>'col-sm-4 control-label']) !!}
                        <div class="col-md-6"> 
                            {!! Form::select('duplicate_id', [''=>'']+App\Duplikat::pluck('nama','id')->all(), null, ['class'=>'form-control col-form-label js-selectize','placeholder' => 'Pilih Pengaduan']) !!}
                            {!! $errors->first('ada', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    @else
                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }} row">
                        {!! Form::label('nama', 'Deskripsi', ['class'=>'col-sm-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::text('nama',null, ['class'=>'form-control']) !!}
                            {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
                        </div>
                    @endif
                        @foreach($pengaduan as $log)
                        <input type="hidden" name="duplikat[]" value="{{ $log->id }}">
                        @endforeach
                    </div>     
                    <div class="form-group row mb-0">
                        <div class="col-md-6 col-md-offset-4">
                        {!! Form::submit('Gabungkan', ['class'=>'btn btn-primary']) !!}
                        </div>
                    </div>           
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
