{!! Form::open(['url' => route('lokasi.destroy', $log->id),
    'method' => 'delete',  'class'=>'delete form-horizontal']) !!}
    <a class="btn btn-primary btn-sm" href="{{ route('lokasi.edit', $log->id) }}">Ubah</a> <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="{{ '#' . $log->id . '-modal' }}">Generate</a>
    {{ Form::submit('Hapus', array('class' => 'btn btn-sm btn-warning')) }} 
{!! Form::close() !!}