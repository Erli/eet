<template>
    <div>
        <div class="row mb-3 mt-3">
            <div class="col-12 d-flex justify-content-between">
                <h4 class="text-center font-weight-bold">Položky
                </h4>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createItem">
                    <i style="color:white" class="fa fa-plus"></i>
                </button>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Název</th>
                <th scope="col">Cena</th>
                <th scope="col">Akce</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in items">
                <td>{{item.title}}</td>
                <td>{{item.price}}</td>
                <td>
                    <button class="btn btn-danger" @click="deleteItem(item)"><i style="color:white" class="fa fa-trash"></i></button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" @click="initForm(item.id)">
                        <i style="color:white" class="fa fa-edit"></i>
                    </button>
                </td>
            </tr>
            </tbody>
        </table>



    </div>

</template>

<script>
    import {mapGetters} from 'vuex'

    export default {
        name: "Items",
        mounted() {
            this.$store.dispatch('fetchItems')
        },
        methods: {
            deleteItem(item) {
                this.$store.dispatch('deleteItem',item)
            },
            initForm(item) {
                this.$store.dispatch('initForm',item)
            }
        },
        computed: {
            ...mapGetters([
                'items'
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

</style>
