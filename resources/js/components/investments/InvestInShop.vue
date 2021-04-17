<template>
	<div>
		<div class="card" style="width: 18rem;">
		  <img src="..." class="card-img-top" alt="...">
		  <div class="card-body">
		    <h5 class="card-title">{{ shop_name }}</h5>
		    <p class="card-text">{{ intro }}</p>
		    <a href="#" class="btn btn-primary">Get Code</a>
		  </div>
		</div>
	</div>
</template>

<script>
	
	export default {
		props: ['shop_name'],
		data(){
			return {
					intro : 'Get Code and Start Earning Money.',
					shop_name : '',
			}
		
		},
		mounted (){
			console.log('investment_card_mounted')
		}
	}

</script>