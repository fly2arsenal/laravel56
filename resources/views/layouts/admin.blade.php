@extends('adminlte::page')

@section('title', 'Users Manager')

@section('css')
  @parent
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{ asset('source/image/favicon/cf.jpg') }}">
  <link href="{{ asset('source/css/main.css') }}" rel="stylesheet">
@stop


@section('content_header')
    <h1>List of members</h1>
@stop

@section('content')
  @if (count($errors) > 0)
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
  @endif

  <div class="flash-message">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
          <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} 
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
  @endforeach
  </div> <!-- end .flash-message -->
@stop

@section('js')
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.0&appId=2089493071293316&autoLogAppEvents=1';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

  <script src="{{ asset('source/js/jquery.js') }}"></script>
  <script type="text/javascript" src="{{ asset('source/js/ckeditor/ckeditor.js') }}"></script>
  <script src="{{ asset('source/js/bootstrap.min.js') }}"></script>
@stop

