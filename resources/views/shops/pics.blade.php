<div class="row text-center slideanim slide">
  @foreach($shop_images as $s_image)
    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
      <div class="thumbnail">
        <img src="https://markoversepublic.s3.ap-south-1.amazonaws.com/{{$s_image->filename}}" alt="Paris" width="100%" height="250" style="object-fit:cover">
        {{-- <p><strong>Paris</strong></p>
        <p>Yes, we built Paris</p> --}}
      </div>
    </div>
    @endforeach
</div>