<template>
    <div class="px-5 mx-5 my-5 card-body">
       <div>
           <p>Hey Man</p>
       </div>
    </div>
</template>
<script>
    export default {

        props: ['shop_id'],

        data() {
            return {
                shop_id: this.shop_id
            }
        },
        mounted() {
            Echo.private('App.MyShop.' +  this.shop_id)
            .notification((notification) => {
                console.log(notification.type);
            });
        }
    }
</script>
