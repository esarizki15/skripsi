@extends('adminlte::layouts.app')

@section('htmlheader_title')
{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
<div class="container-fluid spark-screen">
	<div class="row">
		
		<div class="filtr-container">


			@forelse ($pengaduan as $log)
			<div class="col-md-3">

				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">{{ $log->nama_ruangan }} | {{ $log->pengaduan }}</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
								<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
									<i class="fa fa-times"></i></button>
								</div>
							</div>
							<div class="box-body">
								@if (isset($log) && $log->foto)
								<img class="img-rounded img-responsive" style="width: 10rem; height: 10rem" src="{!!asset('img/'.$log->foto)!!}">
								@else
								<td>Foto belum di upload</td>
								@endif
								<p>
									
									{{ $log->deskripsi }}
								</p>
								<div>
								<div class="pull-left">{{ $log->users['name'] }}</div>
								<div class="pull-right">{{ $log->created_at }}</div>
								</div> 
							</div>
							<!-- /.box-body -->
							<div class="box-footer">
								<div class="pull-right">
									<a class="btn btn-primary btn-xs" href="{{ url('laporan/create') }}">Tangani</a>
									<a class="btn btn-info btn-xs" href="{{ url('laporan/create') }}">Lanjutkan</a>
								</div>
							</div>
						</div>
						<!-- /.box -->

					</div>

					@empty
					<tr>
						<td colspan="2">Tidak ada data</td>
					</tr>
					@endforelse
				</div>
				{{ $pengaduan->links() }}
			</div>
			@endsection
