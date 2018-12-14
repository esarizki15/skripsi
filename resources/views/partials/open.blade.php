                                       	{{-- expr --}}
{!! Form::open(['url' => route('pengaduan.gabungkan'), 'method' => 'post', 'files'=>'true',  'class'=>'form-horizontal', 'id' => 'gabungkan']) !!}
<a class="btn btn-primary" href="{{ route('pengaduan.create') }}">Tambah</a>
@if (Auth::user()->roles->first()->id == 1)
 <!-- Split button -->
<div class="btn-group">
  <button type="button" class="btn btn-primary">Gabungkan</button>
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
  	<input type="hidden" name="duplikat_id" id="duplikat_id">
    <li><a class="btn btn-primary" onclick="submitBaru()">Baru</a></li>
    <li><a class="btn btn-primary" onclick="submitSudahAda()">Sudah Ada</a></li>
  </ul>
</div> 
@endif 

@section('after_scripts')
<script>
	var form = $('#gabungkan');

	function submitBaru() {
		form.submit();
	}

	function submitSudahAda() {
		form.prepend('<input type="hidden" name="sudah_ada" value="1">');
		form.submit();
	}
</script>
@endsection