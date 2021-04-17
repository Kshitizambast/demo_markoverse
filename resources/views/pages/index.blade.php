 @extends('layouts.app')
 @section('content')
 @include('inc.messages')
<div class="container-fluid p-0 m-0">



    <div id="homePoster" class="d-flex justify-content-center mt-3 mb-3">
        @include('inc.animatedPoster')
    </div>

   @include('components.codPoster')
    
    @include('components.categoryBrowser')
    
    @include('components.categorytab')

</div>
 
@endsection