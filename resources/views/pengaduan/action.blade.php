{!! Form::open(['url' => route('pengaduan.destroy', $log->id),
    'method' => 'delete',  'class'=>'delete form-horizontal']) !!}
    <a class="btn btn-primary btn-xs" href="{{ route('pengaduan.edit', $log->id) }}">Ubah</a> 
    {{ Form::submit('Hapus', array('class' => 'btn btn-xs btn-warning')) }} 
{!! Form::close() !!}