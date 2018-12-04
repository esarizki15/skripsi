{!! Form::open(['url' => route('perusahaan.destroy', $log->id), 'method' => 'delete',  'class'=>'delete form-inline']) !!}
    <a class="btn btn-primary btn-sm" href="{{ route('perusahaan.edit', $log->id) }}">Ubah</a> {{ Form::submit('Hapus', array('class' => 'btn btn-sm btn-warning')) }} 
{!! Form::close() !!}