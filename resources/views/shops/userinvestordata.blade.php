 <div class="row mt-1">
                <div class="col-xl-5">
                    <div class="row mt-4">
                        <div class="col-lg-6">
                            <div class="card widget-flat">
                                <div class="card-body">
                                    <div class="float-right">
                                        <i class="mdi mdi-account-multiple widget-icon"></i>
                                    </div>
                                    <h5 class="text-muted font-weight-normal mt-0" title="Number of Customers">Customers</h5>
                                    <h3 class="mt-3 mb-3">3,254</h3>
                                    <p class="mb-0 text-muted">
                                        <span class="text-success mr-2"><i class="fas fa-arrow-up" style="font-size: 15px;"></i> 5.27%</span>
                                        <span class="text-nowrap">Since last month</span>  
                                    </p>
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col-->

	        <div class="col-lg-6 ">
	            <div class="card widget-flat">
	                <div class="card-body">
	                    <div class="float-right">
	                        <i class="mdi mdi-cart-plus widget-icon"></i>
	                    </div>
	                    <h5 class="text-muted font-weight-normal mt-0" title="Number of Orders">Investors</h5>
	                    <h3 class="mt-3 mb-3">5,543</h3>
	                    <p class="mb-0 text-muted">
	                        <span class="text-danger mr-2"><i class="fas fa-arrow-down" style="font-size: 15px;"></i> 1.08%</span>
	                        <span class="text-nowrap">Since last month</span>
	                    </p>
	                </div> <!-- end card-body-->
	            </div> <!-- end card-->
	        </div> <!-- end col-->
	    </div> <!-- end row -->

	    <div class="row mt-4">
	        <div class="col-lg-6 mt-3">
	            <div class="card widget-flat">
	                <div class="card-body">
	                    <div class="float-right">
	                        <i class="mdi mdi-currency-usd widget-icon"></i>
	                    </div>
	                    <h5 class="text-muted font-weight-normal mt-0" title="Average Revenue">Socail Platform</h5>
	                    <h3 class="mt-3 mb-3">6,254</h3>
	                    <p class="mb-0 text-muted">
	                        <span class="text-danger mr-2"><i class="fas fa-arrow-down" style="font-size: 15px;"></i> 7.00%</span>
	                        <span class="text-nowrap">Since last month</span>
	                    </p>
	                </div> <!-- end card-body-->
	            </div> <!-- end card-->
	        </div> <!-- end col-->

	        <div class="col-lg-6 mt-3">
	            <div class="card widget-flat">
	                <div class="card-body">
	                    <div class="float-right">
	                        <i class="mdi mdi-pulse widget-icon"></i>
	                    </div>
	                    <h5 class="text-muted font-weight-normal mt-0" title="Growth">Growth</h5>
	                    <h3 class="mt-3 mb-3">+ 30.56%</h3>
	                    <p class="mb-0 text-muted">
	                        <span class="text-success mr-2"><i class="fas fa-arrow-up" style="font-size: 15px;"></i>4.87%</span>
	                        <span class="text-nowrap">Since last month</span>
	                    </p>
	                </div> <!-- end card-body-->
	            </div> <!-- end card-->
	        </div> <!-- end col-->
	    </div> <!-- end row -->

	</div> <!-- end col -->

	<div class="col-xl-7 mt-3">
	    <div class="card">
	        <div class="card-body">
	            <h4 class="header-title mb-3">Top Products Sellings</h4>
	           		<div class="chart-container" style="position: relative; height:40vh; width:40vw">
					    <canvas id="myChart"></canvas>
					    <script>
								var ctx = document.getElementById('myChart').getContext('2d');
								var myChart = new Chart(ctx, {
								    type: 'bar',
								    data: {
								        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
								        datasets: [{
								            label: '# of Votes',
								            data: [12, 19, 3, 5, 2, 3, 45, 67],
								            backgroundColor: [
								                'rgba(255, 99, 132, 0.2)',
								                'rgba(54, 162, 235, 0.2)',
								                'rgba(255, 206, 86, 0.2)',
								                'rgba(75, 192, 192, 0.2)',
								                'rgba(153, 102, 255, 0.2)',
								                'rgba(255, 159, 64, 0.2)',
								                'rgba(0, 0, 0, 0.5)',
								                'rgba(54, 162, 235, 0.2)',
								            ],
								            borderColor: [
								                'rgba(255, 99, 132, 1)',
								                'rgba(54, 162, 235, 1)',
								                'rgba(255, 206, 86, 1)',
								                'rgba(75, 192, 192, 1)',
								                'rgba(153, 102, 255, 1)',
								                'rgba(255, 159, 64, 1)',
								                'rgba(0, 0, 0, 0.5)',
								                'rgba(54, 162, 235, 0.2)',
								            ],
								            borderWidth: 1

								        }]
								    },
								    options: {
								    	maintainAspectRatio: false,
								        scales: {
								            yAxes: [{

								                ticks: {
								                    beginAtZero: true
								                }
								            }]
								        }
								    }
								});
					</script>
					</div>
	            	
					
	        </div> <!-- end card-body-->
	    </div> <!-- end card-->

	</div> 
</div>

