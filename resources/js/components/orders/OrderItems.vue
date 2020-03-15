<template>
    <div>
        <div class="row mb-3 mt-3">
            <div class="col-12 d-flex justify-content-between">
                <h4 class="text-center font-weight-bold">Položky objednávky
                </h4>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Počet</th>
                <th scope="col">Název</th>
                <th scope="col">Cena</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in order_items">
                <td>{{ item.quantity }}</td>
                <td>{{ item.title }}</td>
                <td class="text-right">{{ item.quantity*item.price | toCurrency }}</td>
                <td>
                    <button class="text-danger btn btn-link" @click="deleteOrderItem(item)"><i class="fa fa-times"></i></button>
                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr v-if="order_items.length">
                <td></td>
                <td></td>
                <td class="text-right">
                   <strong> {{ calculateSum(order_items) | toCurrency }} </strong>
                </td>
            </tr>

            </tfoot>
        </table>
        <div class="row">
            <div  class="col-12">
                <button class="btn btn-success" @click="saveOrder(order_items)">Zaplatit</button>

            </div>
        </div>


    </div>

</template>

<script>
    import {mapGetters} from 'vuex'

    export default {
        name: "OrderItems",
        mounted() {
            this.$store.dispatch('fetchOrderItems')
        },
        methods: {
            deleteOrderItem(item) {
                this.$store.dispatch('deleteOrderItem', item)
            },
            calculateSum(order_items) {
                var sum = 0;
                for (let value in order_items) {
                    sum += (order_items[value].quantity * order_items[value].price)
                }
                return sum;
            },
            saveOrder(order_items){
                this.$store.dispatch('saveOrder', order_items)
            }
        },

        computed: {
            ...mapGetters([
                'order_items'
            ])
        }
    }
</script>

<style scoped>
    .table th, .table td{
        padding: 0 0.75rem;
    }
</style>
