<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Gabungkan Pengaduan</h4>
      </div>
      <div class="modal-body">
        
        {!! Form::open(['url' => route('pengaduan.gabungkan'), 'method' => 'post', 'files'=>'true',  'class'=>'form-horizontal']) !!}
          
          <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }} row">
          {!! Form::label('title', 'Judul', ['class'=>'col-sm-4 control-label']) !!}
          <div class="col-md-6"> 
            {!! Form::text('title', null, ['class'=>'form-control col-form-label','placeholder' => 'Masukan Judul']) !!}
            {!! $errors->first('judul', '<p class="help-block">:message</p>') !!}
          </div>
        </div> 
        <input type="hidden" name="duplikat[]" value="">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        {!! Form::submit('Gabungkan', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
      </div>
    </div>

  </div>
</div>