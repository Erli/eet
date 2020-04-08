let actions = {
    createPost({commit}, post) {
        axios.post('/api/posts', post)
            .then(res => {
                commit('CREATE_POST', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    fetchPosts({commit}) {
        axios.get('/api/posts')
            .then(res => {
                commit('FETCH_POSTS', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    deletePost({commit}, post) {
        axios.delete(`/api/posts/${post.id}`)
            .then(res => {
                if (res.data === 'ok')
                    commit('DELETE_POST', post)
            }).catch(err => {
            console.log(err)
        })
    },
    createItem({commit}, item) {
        axios.post('/api/items', item)
            .then(res => {
                commit('CREATE_ITEM', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    fetchItems({commit}) {
        axios.get('/api/items')
            .then(res => {
                commit('FETCH_ITEMS', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    deleteItem({commit}, item) {
        axios.delete(`/api/items/${item.id}`)
            .then(res => {
                if (res.data === 'ok')
                    commit('DELETE_ITEM', item)
            }).catch(err => {
            console.log(err)
        })
    },
    initForm({commit},item) {
        axios.get('/api/item/'+item)
            .then(res => {
                commit('EDIT_ITEM', res.data)

            }).catch(err => {
            console.log(err)
        })

    },
    updateItem({commit}, item) {
        axios.post('/api/item/update', item)
            .then(res => {
                commit('UPDATED_ITEM', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    fetchOrderItems({commit}) {
        axios.get('/api/order-items')
            .then(res => {
                commit('FETCH_ORDER_ITEMS', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    addItem({commit}, item) {
        axios.post('/api/order-items', item)
            .then(res => {
                commit('ADD_ORDER_ITEM', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    deleteOrderItem({commit}, item) {
        axios.delete(`/api/order-items/${item.id}`)
            .then(res => {
                if (res.data === 'ok')
                    commit('DELETE_ORDER_ITEM', item)
            }).catch(err => {
            console.log(err)
        })
    },
    saveOrder({commit}, order_items) {
        axios.post(`/api/order/`, order_items)
            .then(res => {
                    commit('SAVE_ORDER', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    fetchOrders({commit}) {
        axios.get('/api/order')
            .then(res => {
                commit('FETCH_ORDERS', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    printOrder({commit},item) {
        axios.get('/api/get-order/'+item.order_id)
            .then(res => {

                console.log( res.data)
                commit('PRINT_ORDER', res.data)

            }).catch(err => {
            console.log(err)
        })

    },

}
export default actions
