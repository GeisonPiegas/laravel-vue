import axios from 'axios'
import { router } from '../../routes'

const state = {
    categories: [],
};

const getters = {
    getCategorie: (state) => (id_categorie) => {
        return state.categories.find(categorie => categorie.id_categorie === id_categorie)
    }
};

const actions = {

    getCategories({ commit }) {
        return new Promise((resolve, reject) => {
            axios.get('/api/categories').then(response => {
                commit('SET_CATEGORIES', response.data)
                resolve()
            }).catch(error => {
                reject(error)
            })
        })
    },

    createCategorie({commit}, categorie) {
        return new Promise((resolve, reject) => {
            axios.post('/api/categories', categorie).then(response => {
                commit('CREATE_CATEGORIE', response.data)
                resolve(response.data)
            }).catch(error => {
                reject(error)
            })
        });
    },

    updateCategorie({commit}, categorie) {
        return new Promise((resolve, reject) => {
            axios.put('/api/categories/' + categorie.id_categorie, categorie).then(response => {
                commit('UPDATE_CATEGORIE', response.data.categorie)
                resolve(response.data)
            }).catch(error => {
                reject(error)
            })
        })
    },

    deleteCategorie({commit}, categorie) {
        return new Promise((resolve, reject) => {
            axios.delete('/api/categories/' + categorie.id_categorie).then(response => {
                commit('DELETE_CATEGORIE', categorie)
                resolve(response.data)
            }).catch(error => {
                reject(error)
            })
        })
    },
};

const mutations = {

    SET_CATEGORIES(state, categories) {
        state.categories = categories;
    },

    CREATE_CATEGORIE(state, categorie) {
        const categorieData = {
            name: categorie.name,
        };
        state.categories.unshift(categorieData);
    },

    UPDATE_CATEGORIE(state, categorie) {
        const categorieData = state.categories.find(stateCategorie => stateCategorie.id_categorie == categorie.id_categorie);
        Vue.set(categorieData, categorie);
    },

    DELETE_CATEGORIE(state, categorie) {
        state.categories = state.categories.filter(stateCategorie => stateCategorie.id_categorie != categorie.id_categorie);
    },

};

export default {
    state,
    getters,
    actions,
    mutations
};