@extends('layouts.admin')

@section('title', 'Edit news')

@section('content_header')
    <h1>Edit news</h1>
@stop
@section('content')
    @parent
    <div class="row">
        {!! Form::open(['url' => route("editNews", $news->id), 'method' => 'post', 'enctype' => "multipart/form-data"]) !!}
          <div class="col-md-8">
            <div class="nav-tabs-custom">
              <div class="tab-content">
                <div class="active tab-pane">
                  <!-- Post -->
                  <div class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-12">
                            {{ Form::label('title', 'Title:', ['class' => 'control-label']) }}
                            <span><strong class="text-danger">*</strong></span>
                            {{ Form::text('title', old('title', $news->title), ['class' => 'form-control', 'placeholder' => 'Enter Title', 'required' => 'required']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                          {{ Form::label('content', 'Content:', ['class' => 'control-label']) }}
                          <span><strong class="text-danger">*</strong></span>
                          {{ Form::text('content', old('content', $news->title), ['class' => 'form-control', 'placeholder' => 'Enter Content', 'required' => 'required']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            {{ Form::submit('Submit', ['id'=>'submit', 'name'=>'submit', 'class' => 'btn btn-success']) }}
                        </div>
                    </div>
                  </div>
                  <!-- /.post -->
                </div>
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
          <div class="col-md-4">
            <!-- Profile Image -->
            <div class="box-body box-profile">
                <div class="col-sm-12">
                    <label for="image">Image: </label>
                    <span><strong class="text-danger">*</strong></span>
                    <input type="file" class="form-control" name="image" placeholder=""  id="profile-img">
                <img src="{{ asset('source/image/news/'. $news->file) }}" class="img-responsive img-upload" id="profile-img-tag"/>
                </div>
            </div>
           
          </div>
          <!-- /.col -->
        {!! Form::close() !!}
    </div>
    <!-- /.row -->
@stop
@section('js')
<script type="text/javascript">
    function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#profile-img-tag').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
      }
    }
    $("#profile-img").change(function(){
        readURL(this);
    });
</script>    
@stop