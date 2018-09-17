@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    {!! Form::open(['url' => route('make.qr'),
                    'method' => 'post', 'class'=>'form-horizontal']) !!}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        {!! Form::label('name', 'Nama', ['class'=>'col-md-2 control-label']) !!}
                        <div class="col-md-4">
                            {!! Form::text('name', null, ['class'=>'form-control']) !!}
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <input type="file" accept="image/*" capture="camera" />

                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-2">
                            {!! Form::submit('Buat', ['class'=>'btn btn-primary']) !!}
                        </div>
                    </div>                    
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
