@extends('layouts.shop_admin')
@section('content')
<div class="row text-center slideanim slide">
    <a href="#" class="d-inline-block btn btn-sm btn-primary shadow-sm ml-5" data-toggle="modal" data-target="#photo-modal"><i class="fas fa-download fa-sm text-white-50"></i> Add Shop Images.</a>
          </div>
          <!-- Modal -->
            <div class="modal fade" id="photo-modal" tabindex="-1" role="dialog" aria-labelledby="photo-Title" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Choose the photos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="{{route('shop.shop-image')}}" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <label for="Product Name">Shop Photos(can attach more than one):</label>
                      <br>
                      <input type="hidden" name="my_shop_id" value="{{auth()->user()->id}}">
                      <input type="file" class="form-control" name="shop_photos[]" id="imgInp" multiple="">
                      
                      <br><br>
                      <input type="submit" class="btn btn-primary" value="Upload">
                    </form>
                  </div>
                </div>
              </div>
            </div>
 <hr>
 <h3>My Shop Images</h3>
  @foreach($images as $image)
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="https://markoversepublicbasket.s3.ap-south-1.amazonaws.com/{{$image->filename}}" alt="Paris" width="400" height="300">
        <form method="post" action="{{route('admin.remove')}}">
            {{csrf_field()}}
            <input type="hidden" name="image" value="{{$image->id}}">
            <button class="btn btn-sm btn-danger" style="margin-left: 50%">Remove</button>
        </form>
      </div>
    </div>
    @endforeach
</div>
@endsection