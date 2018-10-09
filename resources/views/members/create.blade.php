@extends('adminlte::layouts.app')

@section('main-content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<ul class="breadcrumb">
					<li><a href="{{ url('/home') }}">Dashboard</a></li>
					<li><a href="{{ url('/admin/members') }}">Member</a></li>
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
@section('script')
<script type="text/javascript">
$(document).ready(function() {

});	
</script>
<script type="text/javascript">
$(document).ready(function() {
      $( "#role" ).change(function () {
	    var str = "";
	    $( "#role option:selected" ).each(function() {
	      str += $( this ).text();
	    });
	    if (str == "Pengawas 5R") {
	    	
	    $("#area").removeClass("hidden").fadeIn();
	    }else{
	    	$("#area").hide();
	    }
	    if (str == "Petugas 5R") {
	    	
	    $("#lokasi").removeClass("hidden").fadeIn();
	    }else {
	    	$("#lokasi").hide();
	    }
	  })
	  .change();
});
</script>
@endsection