import axios from 'axios'

const state = {
    products: [],
};

const getters = {
    getProduct: (state) => (id_product) => {
        return state.products.find(product => product.id_product === id_product)
    }
};

const actions = {

    getProducts({ commit }) {
        return new Promise((resolve, reject) => {
            axios.get('/api/products').then(response => {
                commit('SET_PRODUCTS', response.data)
                resolve()
            }).catch(error => {
                reject(error)
            })
        })
    },

    createProduct({commit}, product) {
        return new Promise((resolve, reject) => {
            axios.post('/api/products', product).then(response => {
                commit('CREATE_PRODUCT', response.data)
                resolve(response.data)
            }).catch(error => {
                reject(error)
            })
        })
    },

    updateProduct({commit}, product) {
        return new Promise((resolve, reject) => {
            axios.put('/api/products/' + product.id_product, product).then(response => {
                commit('UPDATE_PRODUCT', response.data.product)
                resolve(response.data)
            }).catch(error => {
                reject(error)
            })
        })
    },

    deleteProduct({commit}, product) {
        return new Promise((resolve, reject) => {
            axios.delete('/api/products/' + product.id_product).then(response => {
                commit('DELETE_PRODUCT', product)
                resolve(response.data)
            }).catch(error => {
                reject(error)  
            })
        })
    },
};

const mutations = {

    SET_PRODUCTS(state, products) {
        state.products = products;
    },

    CREATE_PRODUCT(state, product) {
        const productData = {
            id_categorie: product.id_product, 
            description: product.description, 
            price: product.price,
            categorie_id: product.categorie_id
        };
        state.products.unshift(productData);
    },

    UPDATE_PRODUCT(state, product) {
        const productData = state.products.find(stateProduct => stateProduct.id_product == product.id_product);
        Vue.set(productData, product);
    },

    DELETE_PRODUCT(state, product) {
        state.products = state.products.filter(stateProduct => stateProduct.id_product != product.id_product);
    },

};

export default {
    state,
    getters,
    actions,
    mutations
};