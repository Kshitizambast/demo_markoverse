@extends('layouts.app')
@section('content')
<h3 class="mt-3">Provide Feedback Or Bug Report</h3>
<hr>
  @if($flash = session('message'))
         <div class="alert alert-success" role="alert">
          {{$flash}}
        </div>
    @endif
<form method="post" action="{{route('user.feedback')}}">
	{{csrf_field()}}
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Feedback:</label>
    <textarea class="form-control" id="article-ckeditor" name="description" rows="5" required></textarea>
  </div>
  <button class="btn btn-info">Submit</button>

</form>
@endsection