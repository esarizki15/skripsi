@extends('vendor.backpack.base.layout')

@section('content')
	<div class="container-fluid spark-screen">
		<div class="row justify-content-center">
			<div class="col-md-10 col-md-offset-1">
				<ul class="breadcrumb">
					<li><a href="{{ url('/home') }}">Dashboard</a></li>
					<li class="active">Member</li>
				</ul>
				
				<div class="box box-default">
                    <div class="box-header with-border">
                        <h2 class="box-title">Member</h2>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                       <p><a class="btn btn-primary" href="{{ route('member.create') }}">Tambah</a></p> 
                   <div class="table-responsive">
                        <table id="example" class="display responsive nowrap compact" style="width:100%">
                            <thead>
                                <tr>
                                    <td>Nama</td>
                                    <td>Jabatan</td>
                                    <td>Role</td>
                                    <td>Tempat</td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($user as $log)
                                    <tr>
                                        <td>{{ $log->name }}</td>
                                        <td>{{ $log->jabatan }}</td>
                                        <td>{{ $log->formattedRoles() }}</td>
                                        <td>
                                            @php
                                                $show = false;
                                                $str = "";  
                                            @endphp

                                            @foreach ($log->roles as $role)
                                                @foreach ($role->tempats as $tempat)
                                                @php
                                                    $str = $str . $tempat->nama . ", ";
                                                @endphp
                                                @endforeach
                                                @php
                                                    if ($role->tempats->count() != 0) {
                                                        $show = true;
                                                     }
                                                @endphp
                                            @endforeach
                                            {{ substr($str, 0, -2) }}
                                            @if (!$show)
                                                {{ "Bukan Penanggung Jawab" }}
                                            @endif

                                            @php
                                                $show = false;
                                                $str = "";
                                            @endphp
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    </div>
                    <!-- /.box-body -->
                </div>
			</div>
		</div>
	</div>
@endsection
