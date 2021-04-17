@extends('layouts.covalentadmin')
@section('content')
@include('inc.messages')

<h5>Blog About Markoverse</h5>

<form method="post" action="{{route('upload.blog')}}" enctype="multipart/form-data">
  {{csrf_field()}}
  <div class="form-group">
    <label >Title</label>
    <input type="text" name="title" class="form-control" placeholder="Title">
  </div>
  <div class="form-group">
    <label >Thumbnail Url</label>
    <input type="text" class="form-control" placeholder="https://image.jpg" 
    name="thumbnail_url">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Blog Category</label>
    <select class="form-control" id="exampleFormControlSelect1" name="category_id">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Happy Bloging</label>
    <textarea class="form-control" id="article-ckeditor" name="blogs" rows="5" required></textarea>
  </div>
  <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
  <button type="submit" class="btn btn-md btn-primary">Submit</button>
</form>

@endsection