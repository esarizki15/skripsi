{!! Form::open(['url' => route('pengaduan.gabungkan'), 'method' => 'post', 'files'=>'true',  'class'=>'form-horizontal']) !!}
<a class="btn btn-primary" href="{{ route('pengaduan.create') }}">Tambah</a>
{!! Form::submit('Gabungkan', ['class'=>'btn btn-primary']) !!}