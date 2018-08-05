@extends('layouts.admin')

@section('title', 'Create member')

@section('content_header')
    <h1>Create member</h1>
@stop
@section('content')
    @parent
    <div class="row">
        {!! Form::open(['url' => route("users.store"), 'method' => 'post', 'enctype' => "multipart/form-data"]) !!}
          <div class="col-md-8">
            <div class="nav-tabs-custom">
              <div class="tab-content">
                <div class="active tab-pane">
                  <!-- Post -->
                  <div class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-12">
                            {{ Form::label('name', 'Name:', ['class' => 'control-label']) }}
                            <span><strong class="text-danger">*</strong></span>
                            {{ Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Enter name', 'required' => 'required']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            {{ Form::label('email', 'Email:', ['class' => 'control-label']) }}
                            <span><strong class="text-danger">*</strong></span>
                            {{ Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Enter Email', 'required' => 'required']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            {{ Form::label('password', 'Password:', ['class' => 'control-label']) }}
                            <span><strong class="text-danger">*</strong></span>
                            {{ Form::password('password',['class' => 'form-control', 'placeholder' => 'Enter Password', 'required' => 'required']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            {{ Form::label('re_password', 'Re Password:', ['class' => 'control-label']) }}
                            <span><strong class="text-danger">*</strong></span>
                            {{ Form::password('re_password',['class' => 'form-control', 'placeholder' => 'Enter Re Password', 'required' => 'required']) }}
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
            {{-- <div class="box-body box-profile">
                <div class="col-sm-12">
                    <label for="image">Image: </label>
                    <span><strong class="text-danger">*</strong></span>
                    <input type="file" class="form-control" name="image" placeholder=""  id="profile-img">
                    <img  class="img-responsive img-upload" id="profile-img-tag"/>
                </div>
            </div> --}}
           
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