let getters = {
     posts: state => {
         return state.posts
     },
    items: state => {
         return state.items
     },
    modal: state => {
         return state.modal
     },
    order_items: state => {
         return state.order_items
     }
}
export default  getters
