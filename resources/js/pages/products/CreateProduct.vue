<template>
<div class="card">
    <div class="card-header">Novo Produto</div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Nome</label>
                <input type="text" class="form-control" v-model="product.name">
                <div class="alert alert-danger" v-if="errors.name">
                    <div v-for="error in errors.name">
                        {{ error }}
                    </div>
                </div>
            </div>
            <div class="form-group  col-md-6">
                <label>Valor</label>
                <currency-input class="form-control" v-model="product.price" currency="BRL" />
                <div class="alert alert-danger" v-if="errors.price">
                    <div v-for="error in errors.price">
                        {{ error }}
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Categoria</label>
            <select class="form-control" v-model="product.categorie_id">
                <option v-for="categorie in categories" v-bind:value="categorie.id_categorie">
                    {{ categorie.name }}
                </option>
            </select>
            <div class="alert alert-danger" v-if="errors.categorie_id">
                <div v-for="error in errors.categorie_id">
                    {{ error }}
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Descrição</label>
            <textarea class="form-control" rows="3" v-model="product.description"></textarea>
            <div class="alert alert-danger" v-if="errors.description">
                <div v-for="error in errors.description">
                    {{ error }}
                </div>
            </div>
        </div>
        <div class="form-group">
            <button v-on:click="createProduct()" class="btn btn-primary btn-lg btn-block">Cadastrar</button>
        </div>
    </div>
</div>
</template>

<script>
import store from '../../store'

export default {

    data() {
        return {
            product: {
                name: '',
                description: '',
                price: null,
                categorie_id: null
            },
            errors: {}
        }
    },

    mounted() {
        store.dispatch('getCategories')
    },

    computed: {
        categories() {
            return store.state.categories.categories
        }
    },

    methods: {
        createProduct() {
            store.dispatch('createProduct', this.product).then(response => {
                this.$snotify.success(response.success)
                this.$router.back()
            }).catch(error => {
                this.errors = error.response.data.errors
            });
        }
    }

}
</script>
