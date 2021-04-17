<template>
    <div class="px-5 mx-5 my-5 card-body">
        <div class="progress">
            <progressbar :now="newProgress" type="success" animated></progressbar>
        </div>
        <div class="ordertatus">
            <strong>Order Status:</strong> {{ newStatus }}
        </div>
    </div>
</template>
<script>

    import { progressbar } from 'vue-strap';

    export default {

        components:{
            progressbar
        },

        props: ['status', 'progress', 'id'],

        data() {
            return {
                newStatus: this.status,
                newProgress: this.progress,
            }
        },

        mounted() {
            Echo.channel('order-tracker.'. this.customer_bag)
            .listen('OrderStatusChanged', (customer_bag) => {
                console.log('omggg real time bro');
            });
        }
    }
</script>
