<template>
    <!-- The Modal -->
    <div class="modal fade printable autoprint " id="printOrder">
        <div class="modal-dialog">
            <div  v-if="modal.receipt" class="modal-content ">

                <!-- Modal body -->
                <div class="modal-body">
                    <table style="width:100%">
                        <tr><td colspan="2" style="text-align:center"><strong>Lucie Uherková</strong></td></tr>
                        <tr><td colspan="2" style="text-align:center">Vidochov 120</td></tr>
                        <tr><td colspan="2" style="text-align:center">509 01 Nová Paka</td></tr>
                        <tr><td colspan="2" style="text-align:center">IČ: 03340830</td></tr>
                        <tr><td colspan="2" style="border-bottom:1px solid #000; width:100%"></td></tr>
                        <tr>
                            <td>Provozovna: {{modal.receipt.id_provoz}}</td>
                            <td style="text-align: right;">Pokladna: {{modal.receipt.id_pokl}}</td>
                        </tr>
                        <tr>
                            <td>Datum: {{modal.receipt.dat_odesl | formatDate }}</td>
                            <td style="text-align: right;">Číslo účetenky: {{modal.receipt.porad_cis}}</td>
                        </tr>
                        <tr v-if="modal.receipt"><td colspan="2">Datum: {{ modal.receipt.dat_odesl | formatTime }}</td></tr>
                        <tr><td  colspan="2" style="border-bottom:1px solid #000; width:100%;text-align: right;"></td></tr>
                    </table>

                    <table style="width:100%" >
                        <tbody>
                        <tr v-for="item in modal.items">
                            <td>{{item.quantity}}x</td>
                            <td>{{item.title}}</td>
                            <td style="text-align: right;">{{item.price| toCurrency}}</td>
                            <td></td>
                        </tr>
                        <tr><td colspan="3" style="border-bottom:1px solid #000; width:100%"></td></tr>
                        </tbody>
                    </table>
                    <table style="width:100%;font-size: 16px;">
                        <tbody>
                        <tr>
                            <td><strong>Celková částka </strong></td>
                            <td style="text-align: right;"><strong>{{modal.receipt.celk_trzba | toCurrency}} </strong></td>
                        </tr>
                        <tr>
                            <td colspan="3" style="border-bottom:1px solid #000; width:100%"></td>
                        </tr>
                        </tbody>
                    </table>
                    <table style="width:100%;text-align: center;">
                        <tbody>
                        <tr>
                            <td style="width:100%;text-align: left;">Režim tržby: běžný</td>
                        </tr>
                        <tr>
                            <td><strong>FIK</strong></td>
                        </tr>
                        <tr>
                            <td>{{modal.receipt.fik}}</td>
                        </tr>

                        <tr>
                            <td><strong>BKP</strong></td>
                        </tr>
                        <tr>
                            <td>{{modal.receipt.bkp}}</td>
                        </tr>

                        <tr v-if="modal.receipt.pkp">
                            <td><strong>PKP</strong></td>
                        </tr>
                        <tr v-if="modal.receipt.pkp">
                            <td>{{modal.receipt.pkp}}</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="row no-print mt-3">
                        <div class="col-12 text-center">
                        <button class="btn btn-success no-print" @click="print()">Tisknout <i style="color:white" class="fa fa-print"></i></button>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from "vuex";

    export default {
        name: "PrintOrder",
        methods: {
            printOrder(item) {
                this.$store.dispatch('printOrder', item)
            },
            print(){
                $('body').addClass('printOrder');
                window.print();

            }
        },
        computed: {
            ...mapGetters([
                'orders',
                'modal'
            ])
        },
    }
</script>

<style scoped>

</style>
