{!! Form::open(['url' => route('laporan.destroy', $log->id),
    'method' => 'delete',  'class'=>'delete form-horizontal']) !!}
    <a class="btn btn-primary btn-sm" href="{{ route('laporan.edit', $log->id) }}">Ubah</a> 
    {{ Form::submit('Hapus', array('class' => 'btn btn-sm btn-warning')) }} 
{!! Form::close() !!}