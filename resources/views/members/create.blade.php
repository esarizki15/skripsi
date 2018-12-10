@extends('vendor.backpack.base.layout')

@section('content')
	<div class="container-fluid spark-screen">
		<div class="row justify-content-center">
			<div class="col-md-8 col-md-offset-2">
				<ul class="breadcrumb">
					<li><a href="{{ url('/home') }}">Dashboard</a></li>
					<li><a href="{{ route('member.index') }}">Member</a></li>
					<li class="active">Tambah Member</li>
				</ul>
					
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">Tambah Member</h2>
					</div>
					
					<div class="panel-body">
						{!! Form::open(['url' => route('member.store'),
							'method' => 'post', 'files'=>'true', 'class'=>'form-horizontal']) !!}
							@include('members._form')
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection