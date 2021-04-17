<template>
	<div>
		<div class="px-5">
		<div class="bills-field-area">
        <span class="bills-dismiss">
            <h1 class="text-danger"><i class="bi bi-x"></i></h1>
        </span>
        <div class="container-fluid mt-5">
            <div id="search">
                <form id="bills-form" class="d-flex justify-content-center" action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group w-75">
                        <input class="form-control bg-dark text-light border-dark" type="text" placeholder="Search Merchants" v-model='searchString' v-on:keyup="fetchMerchants"/>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-outline-dark text-info"><i class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="row mt-5" id="payMerchantSection" v-if="recentlyPaidShop != null">
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 p-1 merchantCard"  v-for="shop in recentlyPaidShop" :key="shop.id">
                    <div class="merchantCard-background-box">
                        <div class="merchantCard-content p-2">
                            <h2> {{shop.shop_name}} </h2>
                            <div class="sub-category-tab sub-category-tab-Restaurant">
                                <span class="p-3">Restaurant</span>
                                <span class="tab-thumb tab-thumb-Restaurant"></span>
                            </div>
                            <hr />
                            <p class="merchantAddress"><i class="bi bi-compass"></i> {{ shop.address }}</p>
                            <button class="merchantView btn btn-sm btn-light float-right mb-2" @click="showForm = true" >Proceed</button>
                            <br>
                            <div v-if="showForm === true ">
	                            <input class="form-control bg-light text-dark border-dark" type="text" placeholder="Search Merchants" name="amount" v-model='amount'/>
	                           <button class="merchantView btn btn-sm btn-light float-right mb-2" @click="payNow">₹ Pay</button>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
 </div>
</template>


 
<script >
	//import Razorpay from 'https://checkout.razorpay.com/v1/checkout.js';
	export default {
		
		props: ['userName', 'userEmail',  'userContact'],

		data () {
			 
			 let result = ' ';
			 let successfulPayment = 'kskks';
			 //let amount = null;
		  return {
		    searchString: '' ,
		    result: '',
		    amount: null,
		    recentlyPaidShop: null,
		    allShops: null,
		    successfulPayment: successfulPayment,
		    showForm: false,
		    options: {
				    "key": "rzp_test_O2SzqCCWL9aHml", // Enter the Key ID generated from the Dashboard
				    //"amount": amount, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
				    "currency": "INR",
				    "name": "Markoverse",
				    //"description": "To " + result,
				 	 
				    
				    "prefill": {
				        "name": this.userName,
				        "email": this.userEmail,
				        "contact": this.userContact
				    },
				    "handler": function (response){
				    		axios.post('pay-bill/payment-with-razorpay-confirmation',{
				    			razorpay_payment_id : response.razorpay_payment_id,
				    			razorpay_order_id : response.razorpay_order_id,
				    			razorpay_signature : response.razorpay_signature
				    		}).
				    		then( (response) => {
				    			this.successfulPayment = response.data;
				    			console.log()
				    		}).
				    		catch( (errors) => {
				    			console.log(errors);
				    		});
					        
					    },
				    "notes": {
				        "address": "Razorpay Corporate Office"
				    },
				    "theme": {
				        "color": "#010204"
				    }
				}
		  };
		},

		computed: {
		  openForm (id) {
		    return true;
		  }
		},


		methods: {
		 async fetchMerchants () {
		 	const res = await axios.post('/pay-bill/search-merchants',{
		 		shopsearch : this.searchString
		 	}).
		 	then((response) => {
		 		console.log(response.data);

		 		response.data.length >= 0 ? 
		 		this.result = response.data[0].shop_name : this.result = '';
		 		//console.log(this.searchString);
		 	}).
		 	catch((error) => {
		 		console.log(error);
		 	});
		 },
		 async payNow (event) {
		 	//Post the data and  get the order_id
		    //Post request to php
		    const res = await axios.post('/pay-bill/payment-with-razorpay',{
		    	amount: 100 * this.amount,
		    	shop_id: 2,
		    	currency: 'INR',
		    	receipt: 'rcptid_11'
		    }).
		    then((response) => {
		    	console.log(response);
		    	this.options["order_id"] = response.data.rp_order_id;
		     	this.options["amount"]   = response.data.rp_amount;
		     	this.options["description"] = `To ${this.result}`;
		     	//console.log(this.options["amount"]);
		    	const rzp1 = new window.Razorpay(this.options);
				    rzp1.open();
				    event.preventDefault();

		    }).
		    catch((errors) => {
		    	console.log(errors)
		    });
		   
		  },

		  openForm(id){
		  	return true;
		  }
		},

		mounted() {

			axios.post('/pay-bill/recently-paid',{
				user_id : 1
			}).
			then((response) => {
				
				this.recentlyPaidShop = Array.from(response.data.recently_paid);
				this.allShops         = Array.from(response.data.all_shops);
				console.log(this.allShops);


			}).
			catch((errors) => {

			});
		}



	};
</script>
<style type="text/css">
        /* /////////////////////  Bill payment area  //////////////////// */

        .bills-field-area {
            width: 100vw;
            height: 100vh;
            left: 0px;
            top: 0px;
            overflow: auto;
            background-color: #141414;
            color: wheat;
            position: fixed;
            z-index: 25;
            /*visibility: hidden;*/
        }

        .bills-dismiss {
            color: black;
            position: absolute;
            top: 15px;
            right: 15px;
            z-index: 26;
        }


        .merchantCard {
            height: auto;
            overflow: hidden;
        }


        .merchantCard-background-box {
            background: url("https://markoversepublicbasket.s3.ap-south-1.amazonaws.com/shop_images/D1XDb3hTVwUsnGVkt5t97ud4AsqJJApn12X2OqX2.jpeg");
            background-size: cover;
            background-position: center;
            height: 100%;
            border-radius: .35rem !important;
        }


        .merchantCard-content {
            background-color: #141414c0;
            width: 100%;
            height: 100%;
        }

        .merchantCard-content .sub-category-tab {
            font-family: 'Oleo Script Swash Caps';
        }

        .merchantView {
            float: right;
        }

        @media (max-width: 576px) {

            .merchantCard-content h2 {
                font-size: 5vw;
            }

            .merchantCard-content .sub-category-tab {
                font-size: 3.5vw;
                height: 35px;
                width: 112px;
            }

            .merchantCard-content p {
                font-size: 3.5vw;
            }

        }

/* Merchant category tab styling below (Already present in previous stylesheets) */

.sub-category-tab{
    height: 5vw;
    width: 14vw;
    border-radius: .35rem;
    align-items: center;
    display: flex;    
    font-size: 1.4vw;
    margin-top: 15px;
    color: white;
    overflow: hidden;
}

.tab-thumb{
    width: 24%;
    height: 70%;
    margin-left: auto;
    background-size: cover !important;
    background-position: center !important;
    transform: rotateZ(15deg);
}

.sub-category-tab-Restaurant{
    background: linear-gradient(180deg, rgba(140,50,19,1) 0%, rgba(227,100,41,1) 100%);
}

.tab-thumb-Restaurant{
    background: url("https://markoversepublicbasket.s3.ap-south-1.amazonaws.com/shop_images/D1XDb3hTVwUsnGVkt5t97ud4AsqJJApn12X2OqX2.jpeg");    
}

/* Medium devices (tablets, less than 992px) */
@media (max-width: 991.98px) { 
        .sub-category-tab {
        height: 60px;
        width: 180px;
        font-size: 18px;
    }

}
</style>
