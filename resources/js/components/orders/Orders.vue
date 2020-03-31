<template>
    <div>
        <div class="row mb-3 mt-3">
            <div class="col-12 d-flex justify-content-between">
                <h4 class="text-center font-weight-bold">Objednávky
                </h4>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Datum</th>
                <th scope="col">Cena</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in orders">

                <td class="text-right">{{ new Date(item.created_at) | dateFormat('H:mm DD.MMMM', dateFormatConfig) }}</td>
                <td class="text-right">{{ item.price| toCurrency }}</td>
                <td class="text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#printOrder" @click="printOrder(item)">
                        <i style="color:white" class="fa fa-receipt"></i>
                    </button>

                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr v-if="orders.length">
                <td></td>
                <td class="text-right">
                   <strong> {{ calculateSum(orders) | toCurrency }} </strong>
                </td>
            </tr>

            </tfoot>
        </table>
    </div>

</template>

<script>
    import {mapGetters} from 'vuex'

    export default {
        name: "Orders",
        mounted() {
            this.$store.dispatch('fetchOrders')
        },
        methods: {
            printOrder(item) {
                this.$store.dispatch('printOrder',item)
            },
            calculateSum(orders) {
                var sum = 0;
                for (let value in orders) {
                    sum += orders[value].price
                }
                return sum;
            }
        },

        computed: {
            ...mapGetters([
                'orders',
                'modal'
            ])
        },
        data(){
            return {
                dateFormatConfig: {
                    dayOfWeekNames: [
                        'Neděle', 'Monday', 'Tuesday', 'Wednesday', 'Thursday',
                        'Friday', 'Saturday'
                    ],
                    dayOfWeekNamesShort: [
                        'Su', 'Mo', 'Tu', 'We', 'Tr', 'Fr', 'Sa'
                    ],
                    monthNames: [
                        'Ledna', 'Února', 'Březena', 'Dubna', 'Května', 'Června',
                        'Července', 'Srpna', 'Září', 'Října', 'Listopadu', 'Prosinece'
                    ],
                    monthNamesShort: [
                        'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                    ]
                }
            }
        }

    }
</script>

<style scoped>
    .table th, .table td{
        padding: 0 0.75rem;
    }
</style>
