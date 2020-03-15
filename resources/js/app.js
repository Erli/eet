
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
import store from './store/index'

Vue.component('posts', require('./components/Posts.vue'))
Vue.component('items', require('./components/items/Items.vue'))
Vue.component('itemsCart', require('./components/items/ItemsCart.vue'))
Vue.component('orderItems', require('./components/orders/OrderItems.vue'))
Vue.component('createItem', require('./components/items/CreateItem.vue'))
Vue.component('editItem', require('./components/items/EditItem.vue'))
Vue.component('createPost', require('./components/CreatePost.vue'))

const app = new Vue({
    el: '#app',
    store
});

window.Vue.filter('toCurrency', function (value) {
    console.log(value)
    if (typeof value !== "number") {
        return value +',- Kč';
    }
    return Number(value).toLocaleString()+',- Kč';
});
