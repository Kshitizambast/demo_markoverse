<div class="row">
                    <div class="col-sm-12 mt-3">
                        <h3>Investment Table</h3>
                            <div class="card" style="border-left:solid red;">
                                <div class="card-body table-overflow">
                                    <div class="row mb-2">
                                        <div class="col-sm-4">
                                            <a href="javascript:void(0);" class="btn btn-danger mb-2">Refresh All</a>
                                        </div>
                                    </div>
                                
                                <table id="productDetails" class="table table-border" style="width:100%; font-size: 19px;">
				                    <thead>
				                        <tr>
				                            <th>Shop Name</th>
				                            <th>Owner Name</th>
				                            <th>Invested</th>
				                            <th>Earned</th>
				                            <th>Status</th>
				                        </tr>
				                    </thead>


				                    <tbody>
				                        @foreach($investedShops as $investedShop)
                                            @if($investedShop->investor_id == auth()->user()->id and $investedShop->is_active == 1)
    				                        <tr>
    				                            <td><a href="">{{$investedShop->shop_name}}</a></td>
    				                            <td>{{App\MyShop::ownerName($investedShop->owner_id)}}</td>
    				                            <td>{{$investedShop->invested_ammount}}</td>
    				                            <td>{{$investedShop->earned_ammount}}</td>
    				                            <td><span class="badge badge-success">Active</span></td>
    				                        </tr>
                                            @endif
                                        @endforeach
                                        
				                    </tbody>
				                </table>
				                
				                <script>
								    $(document).ready(function(){
								        "use strict";
								       $('#productDetails').DataTable({
                                        responsive: true
                                       }); 
									});
								</script>
                                    </div>
                            </div>
                    </div>                    
                </div>

            </div>