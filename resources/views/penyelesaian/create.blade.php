@extends('vendor.backpack.base.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Penyelesaian</li>
              </ol>
            </nav>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">{{ __('Penyelesaian') }}</h2></div>

                <div class="panel-body">
                    {!! Form::open(['url' => route('penyelesaian.store'),
                    'method' => 'post', 'files'=>'true',  'class'=>'form-horizontal']) !!}
                        @include('penyelesaian._form')    

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
