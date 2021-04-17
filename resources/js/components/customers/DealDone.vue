<template>
    <div v-if="shopName != '' ">
        <div class="container" style="display: none;">
            <div class="row mt-3">
                <div class="col">
                     <div id="session-info" class="alert alert-success" role="alert">
                      Deal Done With {{shopName}}.
                    </div>
                </div>
            </div>
          
        </div>
    </div>
    <div v-else>
        <h6>Hello</h6>
    </div>
</template>

<script>

    export default {

        props: ['customer_id'],

        data()  {

            return {

                shopName: ''
            }

        },
        mounted() {
            Echo.private(`customer.${this.customer_id}`)
                .listen('CustomerPaidToShop', (shop_name) =>{
                    this.shopName = shop_name 
            });
            
            console.log('Component mounted.');
           
        },
    }
</script>
