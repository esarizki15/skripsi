@extends('adminlte::layouts.app')

@section('main-content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<ul class="breadcrumb">
					<li><a href="{{ url('/home') }}">Dashboard</a></li>
					<li class="active">Member</li>
				</ul>
				
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">Member</h2>
					</div>
					
					<div class="panel-body">
						<p><a class="btn btn-primary" href="{{ route('member.create') }}">Tambah</a></p>
						<div class="table-responsive">
                        <table id="example" class="display responsive nowrap compact" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ()
                                    <tr>   
                                        <td></td>
                                        <td>
                                            
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nama</th>
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
