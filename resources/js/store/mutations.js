let mutations = {
    CREATE_POST(state, post) {
        state.posts.unshift(post)
    },
    FETCH_POSTS(state, posts) {
        return state.posts = posts
    },
    DELETE_POST(state, post) {
        let index = state.posts.findIndex(item => item.id === post.id)
        state.posts.splice(index, 1)
    },
    CREATE_ITEM(state, item) {
        $("#createItem").modal("hide");
        state.items.unshift(item)
    },
    FETCH_ITEMS(state, items) {
        return state.items = items
    },
    DELETE_ITEM(state, item) {
        let index = state.items.findIndex(itemi => itemi.id === item.id)
        state.items.splice(index, 1)
    },
    EDIT_ITEM(state, item) {
        state.modal = item;
    },
    UPDATED_ITEM(state, items) {
        $("#myModal").modal("hide");
        return state.items = items;
    },
    ADD_ORDER_ITEM(state, items) {
        return state.order_items = items;
    },
    FETCH_ORDER_ITEMS(state, items) {
        return state.order_items = items
    },
    DELETE_ORDER_ITEM(state, item) {
        let index = state.order_items.findIndex(itemi => itemi.id === item.id)
        state.order_items.splice(index, 1)
    },
    SAVE_ORDER(state, items) {
        console.log('save_order');
        return state.order_items = items;
    }
}
export default mutations
