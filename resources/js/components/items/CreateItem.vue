<template>
    <!-- The Modal -->
    <div class="modal" id="createItem">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Vytvoření položky</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="" @submit="createItem(item)">
                        <div class="form-group">
                            <input type="text" placeholder="Item title" v-model="item.title" class="form-control">

                        </div>
                        <div class="form-group">
                            <input type="number" v-model="item.price" placeholder="Price" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <button :disabled="!isValid" class="btn btn-block btn-primary" @click.prevent="createItem(item)">Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CreateItem",
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
            createItem(item) {
                this.$store.dispatch('createItem', item)
            },
            editItem(id){
                this.$store.dispatch('editItem', id)
            }
        },
        computed: {
            isValid() {
                return this.item.title !== '' && this.item.content !== ''
            }
        }
    }
</script>

<style scoped>

</style>
