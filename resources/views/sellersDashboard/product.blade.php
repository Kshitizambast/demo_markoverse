@extends('layouts.shop_admin')
@section('content')
	<h4>Products Details</h4>

    @if($flash = session('message'))
         <div id="session-info" class="alert alert-success" role="alert">
          {{$flash}}
        </div>
    @endif

        
    </div>
	<div class="row mt-3">
	    <div class="col-12 px-4">
	        <div class="card">
	            <div class="card-body" style="overflow:hidden;">
	                <div class="row mb-2">
	                    <div class="col-sm-4">
	                        <a href="{{asset('dashboard/addproducts')}}" class="btn btn-danger mb-2"><span style="font-size: 15px"> Add Products</span></a>
	                    </div>
	                    <div class="col-sm-8">
	                        <div class="text-sm-right">
	                            {{-- <button type="button" class="btn btn-success mb-2 mr-1"><i class="mdi mdi-settings"></i></button> --}}
	                            <button type="button" class="btn btn-secondary mb-2 mr-1">Import</button>
	                            <button type="button" class="btn btn-secondary mb-2">Export</button>
	                        </div>
	                    </div><!-- end col-->
	                
                    <div class="table-responsive">
	              <table id="productDetails" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%; font-size: 15px;">
                    <thead>
                        <tr>
                            <th data-priority="1">Product</th>
                            <th>Price</th>
                            <th>Price Now</th>
                            <th>Status</th>
                            <th>Added Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>
                                @foreach($images as $image)
                                    @if($image->product_id == $product->id)
                                        <img src="https://markoversepublicbasket.s3.ap-south-1.amazonaws.com/{{$image->filename}}" alt="contact-img" title="contact-img" class="rounded mr-3" height="48">
                                    @break
                                    @endif
                                @endforeach
                                <a href="{{asset('dashboard/show_product_details/'.Crypt::encrypt($product->id).'')}}">{{$product->product_name}}</a>
                            </td>
                            <td>{{$product->regular_price}}</td>
                            <td>{{$product->disscount_price}}</td>
                            @if($product->is_available == 1)
                                 <td><span class="badge badge-success" id="activity">Active</span></td>
                            @else
                                <td><span class="badge badge-danger" id="activity">Deactive</span></td>
                            @endif
                            <td>{{$product->created_at}}</td>
                            <td>
                               <div class="custom-control custom-switch">
                                  <input type="checkbox" class="custom-control-input" id="customSwitch{{$product->id}}" <?php if($product->is_available == 1) echo "checked";?> >
                                  <label class="custom-control-label" for="customSwitch{{$product->id}}"></label>
                                </div>
                                {{-- <form method="post" action="{{route('product.activity')}}">
                                    {{csrf_field()}}
                                    <label>
                                        Is Available
                                    </label>
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    
                                    <input type="checkbox" onChange="this.form.submit()">
                                </form> --}}
                                <script type="text/javascript">
                                    $(document).ready(()=>{

                                        $('#customSwitch{{$product->id}}').change(()=>{

                                            axios.post('{{ route('product.activity') }}', {
                                                product_id: {{$product->id}}
                                            })
                                            .then((res)=>{
                                                console.log(res);
                                                window.location.reload();
                                                return false;
                                            })
                                            .catch((err)=>{
                                                console.log(err)
                                            });
                                        });

                                    });
                                </script>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                </div>
	               
	    </div> <!-- end col -->
	</div>
</div>
</div>
<script>
    $(document).ready(function(){
        "use strict";
       $('#productDetails').DataTable({
        responsive : true
       }); 
});
</script>
@endsection