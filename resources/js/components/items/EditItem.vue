<template>
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Editace položky</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="" @submit="editItem(item)">
                        <div class="form-group">
                            <input type="hidden" v-model="modal.id" class="form-control">

                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Item title" v-model="modal.title" class="form-control">

                        </div>
                        <div class="form-group">
                            <input type="number" v-model="modal.price" placeholder="Price" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <button :disabled="!isValid" class="btn btn-block btn-primary" @click.prevent="editItem(modal)">Upravit
                            </button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>

</template>

<script>
    import {mapGetters} from "vuex";

    export default {
        name: "EditItem",
        data() {
            return {
                item: {
                    title: '',
                    price: ''
                }
            }
        },
        mounted() {

        },
        methods: {
            editItem(item) {
                this.$store.dispatch('updateItem', item)
            }
        },
        computed: {
            isValid() {
                return this.modal.title !== '' && this.modal.price !== ''
            },
            ...mapGetters([
                'modal'
            ])

        }
    }
</script>

<style scoped>

</style>
