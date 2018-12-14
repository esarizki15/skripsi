{!! Form::open(['url' => route('member.destroy', $log->id),
    'method' => 'delete',  'class'=>'delete form-horizontal']) !!}
    <a class="btn btn-primary btn-sm" href="{{ route('member.edit', $log->id) }}">Ubah</a> {{ Form::submit('Hapus', array('class' => 'btn btn-sm btn-warning')) }} 
{!! Form::close() !!}