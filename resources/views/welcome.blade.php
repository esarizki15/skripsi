@extends('backpack::layout')

@section('header')
    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('backpack::base.dashboard') }}</li>
      </ol>
    </section>
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Halo</div>
                    <div class="panel-body">
                         Selamat datang di Larapus
                    </div>
                </div>
            </div>
        </div>
</div>

@endsection
